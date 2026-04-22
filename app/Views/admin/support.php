<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main bg-light">
    <div class="app-content-header py-4 bg-white border-bottom mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="fw-bold mb-0">Student Support Requests</h3>
                    <p class="text-muted small mb-0">Manage and respond to student technical and academic queries.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="supportTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3 text-muted fw-medium small" style="width: 25%;">STUDENT</th>
                                    <th class="px-4 py-3 text-muted fw-medium small" style="width: 35%;">ISSUE / SUBJECT</th>
                                    <th class="px-4 py-3 text-muted fw-medium small" style="width: 15%;">STATUS</th>
                                    <th class="px-4 py-3 text-muted fw-medium small" style="width: 15%;">DATE</th>
                                    <th class="px-4 py-3 text-muted fw-medium small text-end" style="width: 10%;">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="supportTableBody">
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="spinner-border text-primary" role="status"></div>
                                        <div class="mt-2 text-muted">Loading requests...</div>
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

<!-- Response Modal -->
<div class="modal fade" id="responseModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="modalStudentName">Support Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <div class="mb-3">
                    <label class="text-muted small fw-bold text-uppercase mb-1 d-block">Subject</label>
                    <div id="modalSubject" class="fw-bold fs-5 text-dark"></div>
                </div>

                <div id="conversationHistory" class="conversation-container p-3 rounded-4 bg-white border shadow-sm mb-4" style="height: 400px; overflow-y: auto;">
                    <!-- Messages will be loaded here -->
                </div>
                
                <div class="reply-section bg-white p-3 rounded-4 border shadow-sm">
                    <label class="form-label fw-bold text-primary mb-2"><i class="bi bi-reply-fill me-1"></i> Send a Message</label>
                    <textarea id="modalAdminReply" class="form-control rounded-3 border-0 bg-light mb-3" rows="3" placeholder="Type your response here..." style="resize: none;"></textarea>

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <label class="fw-bold small me-3 text-muted">STATUS:</label>
                                <select id="modalStatusSelect" class="form-select form-select-sm rounded-pill border-primary-subtle" style="width: 130px;">
                                    <option value="pending">Pending</option>
                                    <option value="replied">Replied</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" onclick="saveStatus()">
                                <i class="bi bi-send-fill me-1"></i> Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentRequestId = null;
    let allRequests = [];

    $(document).ready(function() {
        loadRequests();
    });

    function loadRequests() {
        $.ajax({
            url: '<?= base_url('api/getSupportRequests') ?>',
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    allRequests = response.data;
                    renderTable(allRequests);
                }
            }
        });
    }

    function renderTable(requests) {
        let html = '';
        if (requests.length === 0) {
            html = '<tr><td colspan="5" class="text-center py-5 text-muted">No support requests found.</td></tr>';
        } else {
            requests.forEach((req, index) => {
                let statusBadge = '';
                if (req.status === 'pending') {
                    statusBadge = '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 rounded-pill">Pending</span>';
                } else if (req.status === 'replied') {
                    statusBadge = '<span class="badge bg-info-subtle text-info border border-info-subtle px-3 py-2 rounded-pill">Replied</span>';
                } else {
                    statusBadge = '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-2 rounded-pill">Closed</span>';
                }

                html += `
                    <tr>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 38px; height: 38px; font-weight: bold;">
                                    ${req.student_name.charAt(0).toUpperCase()}
                                </div>
                                <div style="min-width: 0;">
                                    <div class="fw-bold text-dark text-truncate">${req.student_name}</div>
                                    <div class="text-muted small text-truncate">${req.student_email}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-bold text-dark text-truncate" title="${req.subject}">${req.subject}</div>
                            <div class="text-muted small text-truncate" style="max-width: 350px;">${req.message}</div>
                        </td>
                        <td class="px-4 py-3">${statusBadge}</td>
                        <td class="px-4 py-3 text-muted small">${new Date(req.created_at).toLocaleDateString('en-GB', {day: '2-digit', month: 'short', year: 'numeric'})}</td>
                        <td class="px-4 py-3 text-end">
                            <button class="btn btn-white btn-sm border rounded-pill px-3 fw-medium shadow-sm hover-elevate" onclick="openRequest(${index})">
                                <i class="bi bi-chat-dots-fill me-1"></i> Open Chat
                            </button>
                        </td>
                    </tr>
                `;
            });
        }
        $('#supportTableBody').html(html);
    }

    function openRequest(index) {
        const req = allRequests[index];
        currentRequestId = req.id;
        $('#modalStudentName').text(`Support: ${req.student_name}`);
        $('#modalSubject').text(req.subject);
        $('#modalStatusSelect').val(req.status);
        $('#modalAdminReply').val('');
        
        loadMessages(req.id);
        new bootstrap.Modal(document.getElementById('responseModal')).show();
    }

    function loadMessages(requestId) {
        $('#conversationHistory').html('<div class="text-center py-4 text-muted"><div class="spinner-border spinner-border-sm me-2"></div>Loading conversation...</div>');
        
        $.ajax({
            url: `<?= base_url('api/getSupportMessages/') ?>${requestId}`,
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    renderMessages(response.data);
                }
            }
        });
    }

    function renderMessages(messages) {
        let html = '';
        if (messages.length === 0) {
            html = '<div class="text-center py-4 text-muted">No messages yet.</div>';
        } else {
            messages.forEach(msg => {
                const isAdmin = msg.sender_role === 'admin';
                const date = new Date(msg.created_at).toLocaleString('en-GB', {day: '2-digit', month: 'short', hour: '2-digit', minute: '2-digit'});
                
                if (isAdmin) {
                    html += `
                        <div class="message-item mb-4 text-end">
                            <div class="d-flex align-items-center justify-content-end mb-1">
                                <span class="fw-bold small text-primary me-2">Support Team</span>
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 22px; height: 22px; font-size: 9px;">A</div>
                            </div>
                            <div class="d-inline-block p-3 rounded-4 bg-primary text-white shadow-sm" style="max-width: 80%; border-top-right-radius: 0 !important; text-align: left;">
                                ${msg.message}
                                <div class="text-white-50 extra-small mt-1" style="font-size: 10px;">${date}</div>
                            </div>
                        </div>
                    `;
                } else {
                    html += `
                        <div class="message-item mb-4">
                            <div class="d-flex align-items-center mb-1">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 22px; height: 22px; font-size: 9px;">S</div>
                                <span class="fw-bold small text-dark">Student</span>
                            </div>
                            <div class="d-inline-block p-3 rounded-4 bg-light border text-dark shadow-sm" style="max-width: 80%; border-top-left-radius: 0 !important;">
                                ${msg.message}
                                <div class="text-muted extra-small mt-1" style="font-size: 10px;">${date}</div>
                            </div>
                        </div>
                    `;
                }
            });
        }
        $('#conversationHistory').html(html);
        // Scroll to bottom
        const container = document.getElementById('conversationHistory');
        container.scrollTop = container.scrollHeight;
    }

    function saveStatus() {
        const newStatus = $('#modalStatusSelect').val();
        const replyText = $('#modalAdminReply').val();
        
        if (replyText.trim() === '') {
            // Just update status if no message
            $.ajax({
                url: `<?= base_url('api/update_support_status/') ?>${currentRequestId}`,
                type: 'POST',
                data: { status: newStatus },
                success: function(response) {
                    if (response.success) {
                        $('#responseModal').modal('hide');
                        loadRequests();
                    }
                }
            });
            return;
        }

        $.ajax({
            url: `<?= base_url('api/update_support_status/') ?>${currentRequestId}`,
            type: 'POST',
            data: { 
                status: newStatus,
                reply: replyText 
            },
            success: function(response) {
                if (response.success) {
                    $('#modalAdminReply').val('');
                    loadMessages(currentRequestId);
                    loadRequests();
                    // Don't close modal, just show the new message in history
                }
            }
        });
    }
</script>

<style>
.extra-small { font-size: 10px; }
.conversation-container::-webkit-scrollbar { width: 5px; }
.conversation-container::-webkit-scrollbar-track { background: transparent; }
.conversation-container::-webkit-scrollbar-thumb { background: #eee; border-radius: 10px; }
.conversation-container::-webkit-scrollbar-thumb:hover { background: #ddd; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
