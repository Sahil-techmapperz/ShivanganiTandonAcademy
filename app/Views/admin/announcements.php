<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-5 border-bottom mb-4" style="background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1 text-uppercase">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-primary text-decoration-none opacity-75">COMMUNICATION</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">ANNOUNCEMENTS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Broadcast Center</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($announcements) ?> TOTAL LOGS</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Dispatch important updates to all students or target individual learners.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary rounded-pill px-5 py-3 fw-black shadow-lg hover-lift" onclick="openAnnouncementModal()">
                                <i class="bi bi-megaphone-fill me-2"></i> NEW ANNOUNCEMENT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-5 bg-light-subtle">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 mx-auto">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(empty($announcements)): ?>
                        <div class="card border-0 shadow-sm rounded-5 py-5 text-center bg-white">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-megaphone display-4 text-muted opacity-50"></i>
                                </div>
                                <h3 class="fw-black text-dark">No Announcements Yet</h3>
                                <p class="text-muted fs-5">Start by sending your first broadcast to the academy.</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" style="min-width: 1000px;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 40%;">Announcement Details</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 20%;">Target Audience</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Priority</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Timeline</th>
                                            <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php foreach($announcements as $ann): ?>
                                            <tr class="transition-all hover-row">
                                                <td class="ps-5 py-4">
                                                    <div class="d-flex align-items-start">
                                                        <div class="bg-<?= $ann['type'] ?> bg-opacity-10 text-<?= $ann['type'] ?> rounded-4 d-flex align-items-center justify-content-center me-3 shadow-sm flex-shrink-0" style="width: 50px; height: 50px;">
                                                            <i class="bi bi-chat-square-text-fill fs-5"></i>
                                                        </div>
                                                        <div class="overflow-hidden">
                                                            <h6 class="fw-black text-dark mb-1"><?= $ann['title'] ?></h6>
                                                            <p class="text-muted small mb-0 line-clamp-2" style="max-width: 350px; line-height: 1.4;"><?= $ann['content'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <?php if($ann['target_type'] === 'all'): ?>
                                                        <div class="d-inline-flex align-items-center bg-dark text-white rounded-pill px-3 py-1 extra-small fw-black letter-spacing-1 shadow-sm">
                                                            <i class="bi bi-people-fill me-2"></i> ALL STUDENTS
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="d-inline-flex flex-column align-items-center">
                                                            <div class="d-inline-flex align-items-center bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 extra-small fw-black letter-spacing-1 mb-1">
                                                                <i class="bi bi-person-fill me-2"></i> INDIVIDUAL
                                                            </div>
                                                            <div class="extra-small text-muted fw-bold"><?= $ann['student_name'] ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center py-4">
                                                    <span class="badge bg-<?= $ann['type'] ?> rounded-pill px-3 py-2 extra-small fw-black letter-spacing-1 text-uppercase shadow-sm" style="min-width: 80px;">
                                                        <?= $ann['type'] ?>
                                                    </span>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="fw-black text-dark small mb-0"><?= date('d M, Y', strtotime($ann['created_at'])) ?></div>
                                                    <div class="extra-small text-muted fw-bold opacity-75"><?= date('h:i A', strtotime($ann['created_at'])) ?></div>
                                                </td>
                                                <td class="pe-5 py-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <button class="btn btn-outline-primary btn-sm rounded-circle p-2 hover-lift border-0 bg-light" onclick="editAnnouncement(<?= htmlspecialchars(json_encode($ann)) ?>)" title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        <a href="<?= base_url('admin/announcement/delete/'.$ann['id']) ?>" class="btn btn-outline-danger btn-sm rounded-circle p-2 hover-lift border-0 bg-light" onclick="return confirm('Archive this announcement?')" title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Announcement Modal -->
<div class="modal fade" id="announcementModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-primary py-4 px-5 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #5751E1, #3f38c2) !important;">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="bi bi-megaphone-fill fs-4"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-black mb-0 letter-spacing-tight">COMPOSE BROADCAST</h4>
                        <div class="extra-small fw-bold opacity-75 letter-spacing-1 text-uppercase">Dispatch Notification</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-5 bg-white">
                <form action="<?= base_url('admin/announcement/save') ?>" method="POST">
                    <input type="hidden" name="id" id="modal-id">
                    
                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Broadcast Title</label>
                        <input type="text" name="title" id="modal-title" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fw-bold" placeholder="e.g. Exam Schedule Updated" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Message Content</label>
                        <textarea name="content" id="modal-content" class="form-control border-0 bg-light rounded-4 px-4 py-3 fw-medium" rows="4" placeholder="Write your announcement here..." required></textarea>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Notification Priority</label>
                            <select name="type" id="modal-type" class="form-select form-select-lg border-0 bg-light rounded-4 px-4 fw-bold shadow-none">
                                <option value="info">Information (Blue)</option>
                                <option value="success">Success (Green)</option>
                                <option value="warning">Warning (Yellow)</option>
                                <option value="danger">Critical (Red)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Target Audience</label>
                            <select name="target_type" id="modal-target-type" class="form-select form-select-lg border-0 bg-light rounded-4 px-4 fw-bold shadow-none" onchange="toggleStudentSelect()">
                                <option value="all">All Students</option>
                                <option value="individual">Specific Student</option>
                            </select>
                        </div>
                    </div>

                    <div id="student-select-container" class="mb-5 d-none">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Select Recipient Student</label>
                        <select name="student_id" id="modal-student-id" class="form-select form-select-lg border-0 bg-light rounded-4 px-4 fw-bold shadow-none">
                            <option value="">-- Choose a Student --</option>
                            <?php foreach($students as $student): ?>
                                <option value="<?= $student['id'] ?>"><?= $student['full_name'] ?> (<?= $student['email'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 shadow-lg fw-black w-100 hover-lift">
                            DISPATCH ANNOUNCEMENT <i class="bi bi-send-fill ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let announcementModal;

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize modal only after Bootstrap JS is loaded (it's in lower_template)
        // Since lower_template is included AFTER this script, we need to wait or check
    });

    // Helper to get or create modal instance
    function getModal() {
        if (!announcementModal) {
            announcementModal = new bootstrap.Modal(document.getElementById('announcementModal'));
        }
        return announcementModal;
    }

    function openAnnouncementModal() {
        document.getElementById('modal-id').value = '';
        document.getElementById('modal-title').value = '';
        document.getElementById('modal-content').value = '';
        document.getElementById('modal-type').value = 'info';
        document.getElementById('modal-target-type').value = 'all';
        document.getElementById('modal-student-id').value = '';
        toggleStudentSelect();
        getModal().show();
    }

    function editAnnouncement(data) {
        document.getElementById('modal-id').value = data.id;
        document.getElementById('modal-title').value = data.title;
        document.getElementById('modal-content').value = data.content;
        document.getElementById('modal-type').value = data.type;
        document.getElementById('modal-target-type').value = data.target_type;
        document.getElementById('modal-student-id').value = data.student_id || '';
        toggleStudentSelect();
        getModal().show();
    }

    function toggleStudentSelect() {
        const target = document.getElementById('modal-target-type').value;
        const container = document.getElementById('student-select-container');
        if (target === 'individual') {
            container.classList.remove('d-none');
            document.getElementById('modal-student-id').required = true;
        } else {
            container.classList.add('d-none');
            document.getElementById('modal-student-id').required = false;
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    
    body { font-family: 'Outfit', sans-serif; background-color: #f0f2f5; }
    .app-main { background-color: #f0f2f5; }

    .fw-black { font-weight: 900; }
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .letter-spacing-tight { letter-spacing: -1.5px; }
    .extra-small { font-size: 0.7rem; }
    .line-height-1 { line-height: 1; }
    
    .hover-lift { transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .hover-lift:hover { transform: translateY(-3px); }
    
    .transition-all { transition: all 0.3s ease; }
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .hover-row:hover {
        background-color: rgba(87, 81, 225, 0.02);
    }

    .form-control:focus, .form-select:focus {
        background-color: #e9ecef !important;
        box-shadow: none !important;
        border: 1px solid rgba(87, 81, 225, 0.2) !important;
    }

    .table thead th {
        border-top: none !important;
        border-bottom: 2px solid #f8f9fa !important;
    }

    .table tbody td {
        border-bottom: 1px solid #f8f9fa !important;
    }

    .bg-info.bg-opacity-10 { background-color: rgba(13, 202, 240, 0.1) !important; }
    .text-info { color: #0dcaf0 !important; }

    .btn-outline-primary:hover i { color: white !important; }
    .btn-outline-danger:hover i { color: white !important; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
