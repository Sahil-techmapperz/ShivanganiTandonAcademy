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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-primary text-decoration-none opacity-75">ACADEMY OPERATIONS</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">GRADING PORTAL</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Assessment Evaluation</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($submissions) ?> PENDING ENTRIES</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Reviewing and certifying student performance across all active courses.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                <div class="bg-white p-3 rounded-4 shadow-sm border d-flex align-items-center">
                                    <i class="bi bi-clock-history text-warning fs-3 me-3"></i>
                                    <div>
                                        <div class="extra-small fw-black text-muted text-uppercase letter-spacing-1">Pending</div>
                                        <div class="fw-black fs-5 line-height-1 text-dark"><?= count(array_filter($submissions, fn($s) => $s['status'] !== 'graded')) ?></div>
                                    </div>
                                </div>
                                <div class="bg-white p-3 rounded-4 shadow-sm border d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success fs-3 me-3"></i>
                                    <div>
                                        <div class="extra-small fw-black text-muted text-uppercase letter-spacing-1">Certified</div>
                                        <div class="fw-black fs-5 line-height-1 text-dark"><?= count(array_filter($submissions, fn($s) => $s['status'] === 'graded')) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-5 bg-light-subtle">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <?php if(empty($submissions)): ?>
                        <div class="card border-0 shadow-sm rounded-5 py-5 text-center bg-white">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-inbox display-4 text-muted opacity-50"></i>
                                </div>
                                <h3 class="fw-black text-dark">Clean Slate!</h3>
                                <p class="text-muted fs-5">No submissions are currently pending your review.</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-column gap-4">
                            <?php foreach($submissions as $sub): ?>
                                <div class="card border-0 shadow-sm rounded-5 hover-lift transition-all overflow-hidden bg-white submission-card">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-box bg-primary text-white rounded-5 d-flex align-items-center justify-content-center me-4 shadow-sm" style="width: 65px; height: 65px; font-size: 1.5rem; flex-shrink: 0;">
                                                        <?= strtoupper(substr($sub['student_name'], 0, 1)) ?>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <h5 class="fw-black text-dark mb-1 text-truncate"><?= $sub['student_name'] ?></h5>
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-mortarboard-fill text-primary extra-small me-2"></i>
                                                            <div class="text-muted small fw-bold text-truncate"><?= $sub['course_name'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="ps-lg-4 border-start border-light">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <span class="badge <?= $sub['type'] === 'exam' ? 'bg-danger' : 'bg-info' ?> rounded-pill px-3 py-1 extra-small fw-black letter-spacing-1 me-2 shadow-sm text-white">
                                                            <?= strtoupper($sub['type']) ?>
                                                        </span>
                                                        <span class="text-muted extra-small fw-bold letter-spacing-1">MODULE</span>
                                                    </div>
                                                    <h6 class="fw-bold text-dark mb-0 text-truncate"><?= $sub['title'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="text-center px-3">
                                                    <div class="extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-2">POINTS AWARDED</div>
                                                    <?php if($sub['score'] !== null): ?>
                                                        <div class="fw-black text-primary fs-3"><?= $sub['score'] ?><span class="extra-small ms-1 opacity-50">PTS</span></div>
                                                    <?php else: ?>
                                                        <span class="badge bg-light text-muted rounded-pill px-3 py-2 extra-small fw-bold border">PENDING</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <div class="text-end me-4 d-none d-xl-block">
                                                        <div class="fw-black text-dark small mb-0"><?= date('d M, Y', strtotime($sub['created_at'])) ?></div>
                                                        <div class="extra-small text-muted fw-bold"><?= date('h:i A', strtotime($sub['created_at'])) ?></div>
                                                    </div>
                                                    <button type="button" 
                                                            class="btn <?= $sub['status'] === 'graded' ? 'btn-light' : 'btn-primary' ?> rounded-pill px-4 py-3 fw-black shadow-lg hover-lift min-w-160" 
                                                            onclick="openGradeModal(<?= htmlspecialchars(json_encode($sub)) ?>)"
                                                            style="min-width: 160px;">
                                                        <?= $sub['status'] === 'graded' ? '<i class="bi bi-search me-2"></i> REVIEW' : 'EVALUATE <i class="bi bi-arrow-right ms-2"></i>' ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-light border-0 py-2 px-4 d-flex align-items-center justify-content-between">
                                        <div class="extra-small fw-bold text-muted">
                                            <i class="bi bi-check-circle-fill me-1 <?= $sub['status'] === 'graded' ? 'text-success' : 'text-warning' ?>"></i> 
                                            STATUS: <span class="<?= $sub['status'] === 'graded' ? 'text-success' : 'text-warning' ?>"><?= strtoupper($sub['status']) ?></span>
                                        </div>
                                        <div class="extra-small fw-bold text-muted">REF ID: ASSESSMENT_<?= $sub['id'] ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Grading Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-primary py-4 px-5 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #5751E1, #3f38c2) !important;">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="bi bi-file-earmark-check-fill fs-4"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-black mb-0 letter-spacing-tight">ASSESSMENT EVALUATION</h4>
                        <div class="extra-small fw-bold opacity-75 letter-spacing-1 text-uppercase">Submissions Quality Control</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-5 bg-white">
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="bg-light bg-opacity-50 p-4 rounded-5 border d-flex align-items-center">
                            <i class="bi bi-person-badge-fill text-primary fs-3 me-3 opacity-50"></i>
                            <div>
                                <label class="text-muted extra-small text-uppercase fw-black letter-spacing-1 mb-1 d-block opacity-75">STUDENT IDENTITY</label>
                                <div id="modal-student" class="h5 fw-black mb-0 text-dark"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light bg-opacity-50 p-4 rounded-5 border d-flex align-items-center">
                            <i class="bi bi-journals text-primary fs-3 me-3 opacity-50"></i>
                            <div>
                                <label class="text-muted extra-small text-uppercase fw-black letter-spacing-1 mb-1 d-block opacity-75">ASSESSMENT TITLE</label>
                                <div id="modal-title" class="h5 fw-black mb-0 text-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <label class="text-muted extra-small text-uppercase fw-black letter-spacing-1 d-block m-0">STUDENT RESPONSE SUBMISSION</label>
                            <span class="badge bg-light text-muted border extra-small fw-black ms-3 px-3 py-2 rounded-pill letter-spacing-1">INPUT DATA</span>
                        </div>
                    </div>
                    <div id="modal-answers" class="bg-light bg-opacity-30 p-5 rounded-5 text-dark border-dashed mb-4 position-relative overflow-hidden" style="white-space: pre-wrap; min-height: 120px; line-height: 1.8; font-family: 'Outfit', sans-serif;">
                        <i class="bi bi-chat-left-dots-fill display-1 text-primary opacity-5 position-absolute" style="bottom: -20px; right: -10px;"></i>
                    </div>
                    
                    <div id="file-download-container" class="d-none">
                        <div class="p-4 rounded-5 bg-success bg-opacity-10 border border-success border-opacity-10 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px;">
                                    <i class="bi bi-file-earmark-pdf fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-black text-dark mb-0">STUDENT SOLUTION ASSET</h6>
                                    <p class="extra-small text-muted mb-0 fw-bold">Downloadable file provided by student.</p>
                                </div>
                            </div>
                            <a href="#" id="modal-file-link" class="btn btn-success rounded-pill px-4 py-2 extra-small fw-black shadow-sm hover-lift" download>
                                <i class="bi bi-download me-2"></i> DOWNLOAD FILE
                            </a>
                        </div>
                    </div>
                </div>

                <form id="grade-form">
                    <input type="hidden" name="id" id="modal-id">
                    <div class="p-5 rounded-5 border bg-white shadow-lg mx-n2">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-7">
                                <label class="form-label fw-black small text-muted letter-spacing-1 text-uppercase mb-3 d-block">AWARD POINTS / FINAL SCORE</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white border-0 rounded-start-pill px-4 fw-black"><i class="bi bi-trophy-fill"></i></span>
                                    <input type="number" name="score" id="modal-score" class="form-control form-control-lg border-0 bg-light rounded-end-pill px-4 fw-black fs-3 text-primary" min="0" placeholder="Enter points obtained" required style="height: 60px;">
                                </div>
                                <div class="mt-3 d-flex align-items-center">
                                    <i class="bi bi-info-circle me-2 text-primary"></i>
                                    <p class="extra-small text-muted mb-0 fw-bold">Student will be notified immediately upon submission.</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary rounded-pill py-3 px-4 shadow-lg fw-black w-100 hover-lift mt-4" style="height: 60px;">
                                    SUBMIT EVALUATION <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openGradeModal(data) {
        document.getElementById('modal-id').value = data.id;
        document.getElementById('modal-student').textContent = data.student_name;
        document.getElementById('modal-title').textContent = data.title;
        document.getElementById('modal-answers').textContent = data.answers;
        document.getElementById('modal-score').value = data.score || '';
        
        const fileContainer = document.getElementById('file-download-container');
        if (data.file_path) {
            fileContainer.classList.remove('d-none');
            document.getElementById('modal-file-link').href = '<?= base_url() ?>' + data.file_path;
        } else {
            fileContainer.classList.add('d-none');
        }
        
        var modal = new bootstrap.Modal(document.getElementById('gradeModal'));
        modal.show();
    }

    $(document).ready(function() {
        $('#grade-form').on('submit', function(e) {
            e.preventDefault();
            const btn = $(this).find('button[type="submit"]');
            const originalText = btn.html();
            
            btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> PROCESSING...');
            
            $.ajax({
                url: '<?= base_url('admin/grade-submission') ?>',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload();
                    } else {
                        alert(response.message || 'Optimization failed.');
                        btn.prop('disabled', false).html(originalText);
                    }
                },
                error: function() {
                    alert('Evaluation processing error.');
                    btn.prop('disabled', false).html(originalText);
                }
            });
        });
    });
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
    .hover-lift:hover { transform: translateY(-5px); }
    
    .transition-all { transition: all 0.3s ease; }
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }
    
    .submission-card {
        border: 1px solid rgba(0,0,0,0.02) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .submission-card:hover {
        border-color: rgba(87, 81, 225, 0.2) !important;
        box-shadow: 0 15px 35px rgba(87, 81, 225, 0.1) !important;
    }
    
    .avatar-box {
        background: linear-gradient(135deg, #5751E1 0%, #3f38c2 100%);
    }

    .border-dashed {
        border: 2px dashed rgba(87, 81, 225, 0.1) !important;
    }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>

