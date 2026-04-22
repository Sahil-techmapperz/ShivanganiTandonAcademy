<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main bg-light">
    <div class="app-content-header py-4 bg-white border-bottom mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="fw-bold mb-0 text-dark">Enrollment Management</h3>
                    <p class="text-muted small mb-0">View all student enrollments and manage approvals</p>
                </div>
                <div class="col-sm-6 text-end">
                    <button class="btn btn-primary rounded-pill px-4" onclick="loaddemorequest()">
                        <i class="bi bi-arrow-clockwise me-1"></i> Refresh List
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="demorequestTable" class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr class="text-start">
                                    <th class="ps-4 py-3" style="width:50px">#</th>
                                    <th class="py-3 text-start">Student Details</th>
                                    <th class="py-3 text-start">Course Name</th>
                                    <th class="py-3 text-start">Progress</th>
                                    <th class="py-3 text-start">Status</th>
                                    <th class="py-3 text-start">Approved From Admin</th>
                                    <th class="py-3 text-start">Requested Date</th>
                                    <th class="pe-4 py-3 text-start">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="loadingRow">
                                    <td colspan="8" class="text-center py-5">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <p class="mt-2 text-muted">Fetching enrollments...</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Confirm Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-octagon" style="font-size: 4rem;"></i>
                </div>
                <h5>Reject this request?</h5>
                <p class="text-muted">This will remove the enrollment request permanently.</p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer border-0 p-4 pt-0 justify-content-center">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" onclick="confirmDelete()">Reject Request</button>
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold text-success">Confirm Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="text-success mb-3">
                    <i class="bi bi-check2-circle" style="font-size: 4rem;"></i>
                </div>
                <h5>Approve this enrollment?</h5>
                <p class="text-muted">The student will gain immediate access to the course content.</p>
                <input type="hidden" id="approveId">
            </div>
            <div class="modal-footer border-0 p-4 pt-0 justify-content-center">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success rounded-pill px-4" onclick="confirmApprove()">Approve Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Student Details Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Student Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <div class="text-center mb-4">
                    <div id="studentAvatar" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                        S
                    </div>
                    <h4 id="studentName" class="fw-bold mb-0"></h4>
                    <p id="studentEmail" class="text-muted small"></p>
                </div>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 h-100">
                            <label class="text-muted small d-block">Phone Number</label>
                            <span id="studentPhone" class="fw-bold"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 h-100">
                            <label class="text-muted small d-block">Course Interested</label>
                            <span id="studentCourse" class="fw-bold"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 bg-light rounded-3">
                            <label class="text-muted small d-block">Student Message</label>
                            <p id="studentMessage" class="mb-0 small font-italic" style="font-style: italic;"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Status Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3 text-center">
                <div class="mb-3">
                    <label class="form-label small fw-bold d-block text-start ps-2">Select New Status</label>
                    <select id="newStatusSelect" class="form-select rounded-pill border-light bg-light">
                        <option value="pending">Pending (Waiting)</option>
                        <option value="enrolled">Approve (Enrolled)</option>
                        <option value="rejected">Reject</option>
                        <option value="suspended">Suspend</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <input type="hidden" id="editStatusId">
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="updateStatusBtn" class="btn btn-primary rounded-pill px-4" onclick="confirmUpdateStatus()">Update Now</button>
            </div>
        </div>
    </div>
</div>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>

<style>
    .cursor-pointer { cursor: pointer; }
    .bg-light-blue { background-color: #f0f4ff; }
    .btn-icon { width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center; }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        loaddemorequest();
    });

    function loaddemorequest() {
        let tbody = document.querySelector("#demorequestTable tbody");
        tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </td>
            </tr>
        `;

        fetch("<?= base_url('api/enrollments') ?>")
            .then(res => res.json())
            .then(resp => {
                const data = resp.data;
                tbody.innerHTML = "";

                if (data && data.length > 0) {
                    let rows = "";

                    data.forEach((req, index) => {
                        const date = new Date(req.enrolled_at);
                        const formattedDate = date.toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        const status = (req.status || 'pending').toLowerCase();

                        if (status === 'pending') {
                            statusBadge = `<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 rounded-pill">${req.source === 'lead' ? 'Guest Lead' : 'Pending Request'}</span>`;
                            approvalStatus = `<span class="text-muted small"><i class="bi bi-clock me-1"></i> Waiting</span>`;
                        } else if (status === 'enrolled' || status === 'in-progress') {
                            statusBadge = `<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill">Active</span>`;
                            approvalStatus = `<span class="text-success fw-bold small"><i class="bi bi-patch-check-fill me-1"></i> Approved</span>`;
                        } else if (status === 'completed') {
                            statusBadge = `<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">Completed</span>`;
                            approvalStatus = `<span class="text-success fw-bold small"><i class="bi bi-patch-check-fill me-1"></i> Approved</span>`;
                        } else if (status === 'rejected') {
                            statusBadge = `<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill">Rejected</span>`;
                            approvalStatus = `<span class="text-danger fw-bold small"><i class="bi bi-x-circle-fill me-1"></i> Rejected</span>`;
                        } else if (status === 'suspended') {
                            statusBadge = `<span class="badge bg-dark-subtle text-dark border border-dark-subtle px-3 py-2 rounded-pill">Suspended</span>`;
                            approvalStatus = `<span class="text-dark fw-bold small"><i class="bi bi-pause-circle-fill me-1"></i> Suspended</span>`;
                        } else {
                            statusBadge = `<span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">${status}</span>`;
                            approvalStatus = `<span class="text-muted small">Unknown</span>`;
                        }

                        rows += `
                            <tr>
                                <td class="ps-4 fw-bold text-muted">${index + 1}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle btn-icon me-3 fw-bold cursor-pointer" onclick='showStudentDetails(${JSON.stringify(req)})'>
                                            ${req.full_name.charAt(0)}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark cursor-pointer hover-text-primary" onclick='showStudentDetails(${JSON.stringify(req)})'>${req.full_name}</div>
                                            <div class="small text-muted">${req.email}</div>
                                            <div class="small text-muted">${req.phone}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-dark fw-medium">${req.course_name || 'N/A'}</span></td>
                                <td>
                                    <div class="d-flex align-items-center" style="width: 100px;">
                                        <div class="progress flex-grow-1" style="height: 6px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: ${req.progress}%"></div>
                                        </div>
                                        <span class="small text-muted ms-2">${req.progress}%</span>
                                    </div>
                                </td>
                                <td>${statusBadge}</td>
                                <td>${approvalStatus}</td>
                                <td class="small text-dark fw-medium">${formattedDate}</td>
                                <td class="pe-4 text-end">
                                    <button class="btn btn-sm btn-outline-primary btn-icon rounded-circle me-1" onclick="openEditStatusModal(${req.id}, '${req.source}', '${req.status}')" title="Edit Status">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-icon rounded-circle" onclick="openDeleteModal(${req.id}, '${req.source}')" title="Terminate Enrollment">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });

                    tbody.innerHTML = rows;
                } else {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="bi bi-clipboard-x fs-1 opacity-25 d-block mb-2"></i>
                                <span class="text-muted">No enrollments found</span>
                            </td>
                        </tr>
                    `;
                }
            })
            .catch(err => {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-5 text-danger">Failed to load enrollments</td></tr>`;
                console.error(err);
            });
    }

    let currentSource = 'enrollment';

    function showStudentDetails(student) {
        document.getElementById("studentAvatar").innerText = student.full_name.charAt(0);
        document.getElementById("studentName").innerText = student.full_name;
        document.getElementById("studentEmail").innerText = student.email;
        document.getElementById("studentPhone").innerText = student.phone || 'N/A';
        document.getElementById("studentCourse").innerText = student.course_name || 'N/A';
        document.getElementById("studentMessage").innerText = student.message ? `"${student.message}"` : 'No message provided';
        
        new bootstrap.Modal(document.getElementById('studentDetailsModal')).show();
    }

    function openEditStatusModal(id, source, currentStatus) {
        document.getElementById("editStatusId").value = id;
        document.getElementById("newStatusSelect").value = currentStatus;
        currentSource = source;
        new bootstrap.Modal(document.getElementById('editStatusModal')).show();
    }

    function confirmUpdateStatus() {
        let id = document.getElementById("editStatusId").value;
        let status = document.getElementById("newStatusSelect").value;
        const btn = document.getElementById("updateStatusBtn");
        
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Updating...';

        fetch(`<?= base_url('api/update_enrollment_status') ?>/${id}?source=${currentSource}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ status: status })
        })
        .then(res => res.json())
        .then(resp => {
            if(resp.status) {
                showToast(resp.message, true);
                bootstrap.Modal.getInstance(document.getElementById('editStatusModal')).hide();
                loaddemorequest();
            } else {
                showToast(resp.message, false);
            }
        })
        .catch(err => {
            showToast("Server error occurred", false);
            console.error(err);
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = 'Update Now';
        });
    }

    function openApproveModal(id, source) {
        document.getElementById("approveId").value = id;
        currentSource = source;
        new bootstrap.Modal(document.getElementById('approveModal')).show();
    }

    function confirmApprove() {
        let id = document.getElementById("approveId").value;
        const btn = event.target;
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';

        fetch(`<?= base_url('api/approve_enrollment') ?>/${id}?source=${currentSource}`, { method: 'POST' })
            .then(res => res.json())
            .then(resp => {
                if(resp.status) {
                    showToast(resp.message, true);
                    bootstrap.Modal.getInstance(document.getElementById('approveModal')).hide();
                    loaddemorequest();
                } else {
                    showToast(resp.message, false);
                }
            })
            .catch(err => {
                showToast("Server error occurred", false);
                console.error(err);
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = 'Approve Now';
            });
    }

    function openDeleteModal(id, source) {
        document.getElementById("deleteId").value = id;
        currentSource = source;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    function confirmDelete() {
        let id = document.getElementById("deleteId").value;
        fetch(`<?= base_url('api/enrollments') ?>/${id}?source=${currentSource}`, { method: 'DELETE' })
            .then(res => res.json())
            .then(resp => {
                showToast(resp.message, true);
                bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                loaddemorequest();
            });
    }

    // Reuse the toast from header/layout if available, otherwise simplified version
    function showToast(msg, success) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: success ? 'success' : 'error',
                title: msg,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        } else {
            alert(msg);
        }
    }
</script>