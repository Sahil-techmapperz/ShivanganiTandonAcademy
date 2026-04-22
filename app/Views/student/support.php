<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold">Help & Support</h3>
            <p class="text-muted">Need assistance? Submit a ticket and our team will get back to you.</p>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm rounded-3"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="row g-4">
                <!-- Submit Support Request -->
                <div class="col-lg-5">
                    <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden">
                        <div class="card-header bg-primary py-3">
                            <h5 class="card-title mb-0 text-white fw-bold">New Support Ticket</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?= base_url('student/submit-support') ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-medium">Subject</label>
                                    <input type="text" name="subject" class="form-control rounded-3 py-2 shadow-sm border-light" placeholder="e.g., Course access issue" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-medium">Initial Message</label>
                                    <textarea name="message" class="form-control rounded-3 shadow-sm border-light" rows="6" placeholder="Describe your issue in detail..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm">
                                    <i class="bi bi-send-fill me-2"></i> Submit Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Support History -->
                <div class="col-lg-7">
                    <div class="card border-0 rounded-4 shadow-sm h-100">
                        <div class="card-header bg-white py-3 border-0">
                            <h5 class="card-title mb-0 text-dark fw-bold">My Support History</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light text-muted uppercase small">
                                        <tr>
                                            <th class="px-4 py-3">SUBJECT</th>
                                            <th class="px-4 py-3">STATUS</th>
                                            <th class="px-4 py-3 text-end">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($requests)): ?>
                                            <tr>
                                                <td colspan="3" class="text-center py-5">
                                                    <div class="text-muted opacity-50">
                                                        <i class="bi bi-chat-left-dots fs-1 d-block mb-3"></i>
                                                        No tickets found.
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach($requests as $req): ?>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    <div class="fw-bold text-dark"><?= $req['subject'] ?></div>
                                                    <div class="text-muted small"><?= date('d M Y', strtotime($req['created_at'])) ?></div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <?php if($req['status'] == 'pending'): ?>
                                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-2">Pending</span>
                                                    <?php elseif($req['status'] == 'replied'): ?>
                                                        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-2">Replied</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-2">Closed</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-4 py-3 text-end">
                                                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="openChat(<?= $req['id'] ?>, '<?= addslashes($req['subject']) ?>')">
                                                        <i class="bi bi-chat-fill me-1"></i> View Chat
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Chat Modal -->
<div class="modal fade" id="chatModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="modalSubject">Support Chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <div id="chatHistory" class="chat-container p-3 rounded-4 bg-white border shadow-sm mb-3" style="height: 400px; overflow-y: auto;">
                    <!-- Chat messages -->
                </div>
                
                <div id="replyArea" class="bg-white p-3 rounded-4 border shadow-sm">
                    <textarea id="replyMessage" class="form-control rounded-3 border-0 bg-light mb-3" rows="2" placeholder="Type your message..." style="resize: none;"></textarea>
                    <div class="text-end">
                        <button class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" onclick="sendMessage()">
                            <i class="bi bi-send-fill me-1"></i> Send Message
                        </button>
                    </div>
                </div>
                <div id="closedAlert" class="alert alert-secondary rounded-4 border-0 mb-0 py-3 text-center" style="display: none;">
                    <i class="bi bi-lock-fill me-1"></i> This ticket is closed. Please open a new ticket if you have more questions.
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let activeRequestId = null;

    function openChat(requestId, subject) {
        activeRequestId = requestId;
        $('#modalSubject').text(`Support: ${subject}`);
        loadMessages(requestId);
        new bootstrap.Modal(document.getElementById('chatModal')).show();
    }

    function loadMessages(requestId) {
        $('#chatHistory').html('<div class="text-center py-5 text-muted"><div class="spinner-border spinner-border-sm me-2"></div>Loading conversation...</div>');
        
        $.ajax({
            url: `<?= base_url('student/support-messages/') ?>${requestId}`,
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
            html = '<div class="text-center py-5 text-muted">No messages yet.</div>';
        } else {
            messages.forEach(msg => {
                const isAdmin = msg.sender_role === 'admin';
                const date = new Date(msg.created_at).toLocaleString('en-GB', {day: '2-digit', month: 'short', hour: '2-digit', minute: '2-digit'});
                
                if (isAdmin) {
                    html += `
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-1">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 22px; height: 22px; font-size: 9px;">A</div>
                                <span class="fw-bold small text-primary">Support Team</span>
                            </div>
                            <div class="d-inline-block p-3 rounded-4 bg-primary text-white shadow-sm" style="max-width: 80%; border-top-left-radius: 0 !important;">
                                ${msg.message}
                                <div class="extra-small opacity-50 mt-1" style="font-size: 10px;">${date}</div>
                            </div>
                        </div>
                    `;
                } else {
                    html += `
                        <div class="mb-4 text-end">
                            <div class="d-flex align-items-center justify-content-end mb-1">
                                <span class="fw-bold small text-dark me-2">Me</span>
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 22px; height: 22px; font-size: 9px;">S</div>
                            </div>
                            <div class="d-inline-block p-3 rounded-4 bg-light border text-dark shadow-sm" style="max-width: 80%; border-top-right-radius: 0 !important; text-align: left;">
                                ${msg.message}
                                <div class="text-muted mt-1" style="font-size: 10px;">${date}</div>
                            </div>
                        </div>
                    `;
                }
            });
        }
        $('#chatHistory').html(html);
        const container = document.getElementById('chatHistory');
        container.scrollTop = container.scrollHeight;
    }

    function sendMessage() {
        const msg = $('#replyMessage').val();
        if (msg.trim() === '') return;

        $.ajax({
            url: '<?= base_url('api/add_support_message') ?>',
            type: 'POST',
            data: {
                support_request_id: activeRequestId,
                message: msg,
                role: 'student'
            },
            success: function(response) {
                if (response.success) {
                    $('#replyMessage').val('');
                    loadMessages(activeRequestId);
                }
            }
        });
    }
</script>

<style>
.chat-container::-webkit-scrollbar { width: 5px; }
.chat-container::-webkit-scrollbar-track { background: transparent; }
.chat-container::-webkit-scrollbar-thumb { background: #eee; border-radius: 10px; }
.chat-container::-webkit-scrollbar-thumb:hover { background: #ddd; }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
