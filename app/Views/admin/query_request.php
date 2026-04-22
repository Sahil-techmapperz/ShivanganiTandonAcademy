<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <!-- Premium Header -->
    <div class="app-content-header py-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-dark mb-1">Student Queries</h1>
                    <p class="text-muted lead mb-0">Manage and respond to student questions and concerns.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Content -->
    <div class="app-content pb-5">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="queryTable" class="table table-hover align-middle mb-0 custom-table">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small fw-bold border-0">STUDENT NAME</th>
                                    <th class="py-3 text-muted small fw-bold border-0">CONTACT INFO</th>
                                    <th class="py-3 text-muted small fw-bold border-0">DATE</th>
                                    <th class="pe-4 py-3 text-muted small fw-bold border-0 text-end">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Loading State -->
                    <div id="loadingState" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Fetching queries...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold">Query Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="modalBody">
                <!-- Content will be injected here -->
            </div>
            <div class="modal-footer bg-light border-0 py-3">
                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-body p-4 text-center">
                <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-triangle display-4"></i>
                </div>
                <h4 class="fw-bold mb-2">Delete Query?</h4>
                <p class="text-muted mb-4">Are you sure you want to delete this query? This action cannot be undone.</p>
                <input type="hidden" id="deleteId">
                <div class="d-flex gap-2 justify-content-center">
                    <button class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger rounded-pill px-4 fw-bold" onclick="confirmDelete()">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .app-main { background-color: #f8fafc !important; }
    .custom-table td, .custom-table th { white-space: normal !important; text-transform: none !important; padding: 1.25rem 0.75rem !important; }
    .custom-table th { font-size: 0.75rem !important; letter-spacing: 0.05em; background-color: #f8fafc !important; }
    .custom-table tbody tr { transition: all 0.2s ease; }
    .custom-table tbody tr:hover { background-color: #f1f5f9 !important; }
    .action-btn { width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; transition: all 0.2s; border: none; }
    .btn-view { background-color: #e0e7ff; color: #4338ca; }
    .btn-view:hover { background-color: #4338ca; color: white; }
    .btn-delete { background-color: #fee2e2; color: #b91c1c; }
    .btn-delete:hover { background-color: #b91c1c; color: white; }
    .detail-label { font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 0.25rem; }
    .detail-value { font-size: 0.95rem; color: #1e293b; margin-bottom: 1.25rem; }
</style>

<script>
    document.addEventListener("DOMContentLoaded", loaddemorequest);
    let queryData = [];

    function loaddemorequest() {
        const tbody = document.querySelector("#queryTable tbody");
        const loading = document.getElementById("loadingState");
        loading.style.display = "block";
        tbody.innerHTML = "";

        fetch("<?= base_url('api/query_request') ?>")
            .then(res => res.json())
            .then(response => {
                queryData = response.data || [];
                loading.style.display = "none";
                if (queryData.length > 0) {
                    queryData.forEach((item, index) => {
                        const date = item.created_at ? new Date(item.created_at.replace(" ", "T")).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        }) : '-';
                        const row = `
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">${item.first_name} ${item.last_name}</div>
                                </td>
                                <td>
                                    <div class="fw-medium">${item.email || '-'}</div>
                                    <div class="small text-muted">${item.phone || '-'}</div>
                                </td>
                                <td><span class="text-muted small">${date}</span></td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button class="action-btn btn-view" onclick="viewDetails(${index})" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="action-btn btn-delete" onclick="openDeleteModal(${item.id})" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });
                } else {
                    tbody.innerHTML = `<tr><td colspan="4" class="text-center py-5 text-muted">No queries found</td></tr>`;
                }
            })
            .catch(err => {
                loading.style.display = "none";
                tbody.innerHTML = `<tr><td colspan="4" class="text-center py-5 text-danger">Failed to load data</td></tr>`;
                console.error(err);
            });
    }

    function viewDetails(index) {
        const item = queryData[index];
        const modalBody = document.getElementById("modalBody");
        modalBody.innerHTML = `
            <div class="detail-label">Student Name</div>
            <div class="detail-value fw-bold">${item.first_name} ${item.last_name}</div>
            <div class="detail-label">Email & Phone</div>
            <div class="detail-value">${item.email} | ${item.phone}</div>
            <div class="detail-label">Query Message</div>
            <div class="bg-light p-3 rounded-3" style="white-space: pre-line;">${item.query || 'No details provided'}</div>
        `;
        new bootstrap.Modal(document.getElementById('detailsModal')).show();
    }

    function openDeleteModal(id) {
        document.getElementById("deleteId").value = id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    function confirmDelete() {
        const id = document.getElementById("deleteId").value;
        fetch(`<?= base_url('api/query_request') ?>/${id}`, { method: 'DELETE' })
            .then(res => res.json())
            .then(resp => {
                showToast(resp.message, true);
                bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                loaddemorequest();
            });
    }
</script>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>