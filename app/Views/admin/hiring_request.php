<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <!-- Premium Header -->
    <div class="app-content-header py-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-dark mb-1">Hiring Requests</h1>
                    <p class="text-muted lead mb-0">Manage and review organization hiring inquiries.</p>
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
                        <table id="hiringTable" class="table table-hover align-middle mb-0 custom-table">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small fw-bold border-0">ORGANISATION</th>
                                    <th class="py-3 text-muted small fw-bold border-0">REQUIREMENT</th>
                                    <th class="py-3 text-muted small fw-bold border-0">CONTACT PERSON</th>
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
                        <p class="mt-2 text-muted">Loading requests...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold" id="modalTitle">Request Details</h5>
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
                <h4 class="fw-bold mb-2">Delete Request?</h4>
                <p class="text-muted mb-4">Are you sure you want to delete this hiring request? This action cannot be undone.</p>
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
    .app-main {
        background-color: #f8fafc !important;
    }

    .custom-table td, .custom-table th {
        white-space: normal !important;
        text-transform: none !important;
        padding: 1.25rem 0.75rem !important;
    }

    .custom-table th {
        font-size: 0.75rem !important;
        letter-spacing: 0.05em;
        background-color: #f8fafc !important;
    }

    .custom-table tbody tr {
        transition: all 0.2s ease;
    }

    .custom-table tbody tr:hover {
        background-color: #f1f5f9 !important;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s;
        border: none;
    }

    .btn-view { background-color: #e0e7ff; color: #4338ca; }
    .btn-view:hover { background-color: #4338ca; color: white; }
    
    .btn-delete { background-color: #fee2e2; color: #b91c1c; }
    .btn-delete:hover { background-color: #b91c1c; color: white; }

    .detail-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 0.25rem;
    }

    .detail-value {
        font-size: 0.95rem;
        color: #1e293b;
        margin-bottom: 1.25rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #f1f5f9;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", loaddemorequest);

    let hiringData = [];

    function loaddemorequest() {
        const tbody = document.querySelector("#hiringTable tbody");
        const loading = document.getElementById("loadingState");
        
        loading.style.display = "block";
        tbody.innerHTML = "";

        fetch("<?= base_url('api/hiring_request') ?>")
            .then(res => res.json())
            .then(response => {
                hiringData = response.data || [];
                loading.style.display = "none";

                if (hiringData.length > 0) {
                    hiringData.forEach((item, index) => {
                        const date = item.created_at ? new Date(item.created_at.replace(" ", "T")).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        }) : '-';

                        const row = `
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">${item.organisation_name || '-'}</div>
                                </td>
                                <td><span class="badge bg-primary-subtle text-primary rounded-pill px-3">${item.requirement_type || '-'}</span></td>
                                <td>
                                    <div class="fw-medium">${item.full_name || '-'}</div>
                                    <div class="small text-muted">${item.email || '-'}</div>
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
                    tbody.innerHTML = `<tr><td colspan="5" class="text-center py-5 text-muted">No hiring requests found</td></tr>`;
                }
            })
            .catch(err => {
                loading.style.display = "none";
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-5 text-danger">Failed to load data</td></tr>`;
                console.error(err);
            });
    }

    function viewDetails(index) {
        const item = hiringData[index];
        const modalBody = document.getElementById("modalBody");
        const modalTitle = document.getElementById("modalTitle");
        
        modalTitle.innerText = item.organisation_name || 'Request Details';
        
        modalBody.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-label">Organisation</div>
                    <div class="detail-value">${item.organisation_name || '-'}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Requirement Type</div>
                    <div class="detail-value">${item.requirement_type || '-'}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Full Name</div>
                    <div class="detail-value">${item.full_name || '-'}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Email Address</div>
                    <div class="detail-value">${item.email || '-'}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Contact Number</div>
                    <div class="detail-value">${item.contact_number || '-'}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Submitted On</div>
                    <div class="detail-value">${item.created_at || '-'}</div>
                </div>
                <div class="col-12">
                    <div class="detail-label">Skills Required</div>
                    <div class="detail-value">${item.skills || '-'}</div>
                </div>
                <div class="col-12">
                    <div class="detail-label">Message</div>
                    <div class="detail-value bg-light p-3 rounded-3" style="white-space: pre-line;">${item.message || 'No message provided'}</div>
                </div>
            </div>
        `;
        
        new bootstrap.Modal(document.getElementById('detailsModal')).show();
    }

    function openDeleteModal(id) {
        document.getElementById("deleteId").value = id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    function confirmDelete() {
        const id = document.getElementById("deleteId").value;
        fetch(`<?= base_url('api/hiring_request') ?>/${id}`, { method: 'DELETE' })
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