<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #5751E1 0%, #3a34a8 100%);
        --glass-bg: rgba(255, 255, 255, 0.8);
        --glass-border: rgba(255, 255, 255, 0.4);
    }

    .letter-spacing-1 { letter-spacing: 1.5px; }
    .extra-small { font-size: 0.75rem; }
    
    .course-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        content: "\F285";
        font-family: Bootstrap-icons;
        font-size: 10px;
        color: #adb5bd;
    }

    .lesson-card {
        border: none;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        background: #fff;
    }

    .lesson-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 6px; height: 100%;
        background: var(--primary-gradient);
        border-radius: 24px 0 0 24px;
    }

    .lesson-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }

    .number-badge {
        width: 48px;
        height: 48px;
        background: var(--primary-gradient);
        color: white;
        border-radius: 16px;
        font-weight: 800;
        font-size: 1.2rem;
        box-shadow: 0 8px 16px rgba(87, 81, 225, 0.3);
    }

    .objective-box {
        background: #f8f9fc;
        border: 1px solid #edf2f7;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .objective-box::after {
        content: '';
        position: absolute;
        top: 0; right: 0; width: 100px; height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.05) 100%);
        pointer-events: none;
    }

    .resource-item {
        transition: all 0.3s ease;
        border: 1.5px solid #f1f4f8;
        background: #fff;
    }

    .resource-item:hover {
        border-color: #5751E1;
        background: #fbfbff;
        transform: scale(1.02);
    }

    .video-preview-wrapper {
        position: sticky;
        top: 30px;
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        padding: 12px;
        border-radius: 28px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
    }

    .premium-badge {
        background: white;
        color: #1a1a1a;
        font-weight: 700;
        border-radius: 50px;
        padding: 8px 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        display: inline-flex;
        align-items: center;
        border: 1px solid #f0f0f0;
    }

    .btn-modify {
        background: #fff;
        border: 1.5px solid #f0f0f0;
        font-weight: 600;
        color: #4a5568;
        transition: all 0.3s ease;
    }

    .btn-modify:hover {
        background: #f8f9fc;
        border-color: #5751E1;
        color: #5751E1;
    }

    .leading-relaxed { line-height: 1.8; }
</style>

<main class="app-main bg-light-subtle">
    <div class="app-content-header py-5 bg-white border-bottom shadow-sm mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <nav class="course-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2 small fw-bold">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/courses') ?>" class="text-primary text-decoration-none">ACADEMY</a></li>
                            <li class="breadcrumb-item active text-muted" aria-current="page"><?= strtoupper($course['title']) ?></li>
                        </ol>
                    </nav>
                    <h1 class="fw-black m-0 text-dark display-6"><?= $course['title'] ?></h1>
                    <div class="d-flex align-items-center mt-2">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 me-2 extra-small fw-bold">ADMIN CONTROL</span>
                        <p class="text-muted small mb-0 opacity-75 italic">Refining the curriculum for excellence.</p>
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fw-bold hover-lift" onclick="resetLessonForm()" data-bs-toggle="modal" data-bs-target="#lessonModal">
                        <i class="bi bi-plus-lg me-2"></i> RESERVE NEW LESSON
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-lg rounded-4 mb-5 p-4 d-flex align-items-center animate__animated animate__fadeInDown">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <span class="fw-medium"><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12 px-xl-5">
                    <?php if(empty($lessons)): ?>
                        <div class="card border-0 shadow-sm text-center py-5 rounded-5 mt-4">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                                    <i class="bi bi-journal-code display-3 text-muted opacity-25"></i>
                                </div>
                                <h3 class="fw-bold text-dark">Your Curriculum is Empty</h3>
                                <p class="text-muted mb-4 px-5 mx-auto" style="max-width: 500px;">Every great journey begins with a single step. Start building your educational path by adding the first lesson today.</p>
                                <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#lessonModal">Initialize First Lesson</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php foreach($lessons as $lesson): ?>
                            <div class="lesson-card card shadow-sm mb-5 p-2 border-0">
                                <div class="card-header bg-transparent py-4 px-4 d-flex justify-content-between align-items-start border-0">
                                    <div class="d-flex align-items-center">
                                        <div class="number-badge d-flex align-items-center justify-content-center me-4">
                                            <?= $lesson['sort_order'] ?>
                                        </div>
                                        <div>
                                            <h3 class="fw-bold mb-1 text-dark"><?= $lesson['title'] ?></h3>
                                            <div class="d-flex align-items-center">
                                                <span class="extra-small text-primary text-uppercase fw-black letter-spacing-1">Module Sequence</span>
                                                <span class="mx-2 text-muted opacity-25">•</span>
                                                <span class="extra-small text-muted fw-bold"><?= $lesson['duration'] ?> Duration</span>
                                                <?php if($lesson['type'] !== 'video'): ?>
                                                    <span class="mx-2 text-muted opacity-25">•</span>
                                                    <span class="extra-small text-danger fw-black letter-spacing-1">PASSING: <?= $lesson['passing_score'] ?> PTS</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-modify rounded-pill px-4 py-2 shadow-sm" data-bs-toggle="dropdown">
                                            CONTROL <i class="bi bi-gear-fill ms-2 small"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 p-2 animate__animated animate__fadeIn animate__faster">
                                            <li><button class="dropdown-item py-2 px-3 rounded-3 mb-1" onclick="editLesson(<?= htmlspecialchars(json_encode($lesson)) ?>)"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit Metadata</button></li>
                                            <li><button class="dropdown-item py-2 px-3 rounded-3 mb-1" onclick="openResourceModal(<?= $lesson['id'] ?>)"><i class="bi bi-file-earmark-plus me-2 text-success"></i> Manage Materials</button></li>
                                            <li><hr class="dropdown-divider opacity-50"></li>
                                            <li><a class="dropdown-item py-2 px-3 rounded-3 text-danger fw-bold" href="<?= base_url('admin/lesson/delete/'.$lesson['id']) ?>" onclick="return confirm('WARNING: This will permanently purge the lesson and all its assets. Proceed?')"><i class="bi bi-trash3-fill me-2"></i> Purge Lesson</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div class="row g-5">
                                        <div class="col-lg-7">
                                            <div class="d-flex flex-wrap gap-3 mb-4">
                                                <span class="badge bg-danger text-white rounded-pill px-3 py-2 fw-medium shadow-sm">
                                                    <i class="bi bi-youtube me-2"></i><?= $lesson['video_id'] ?>
                                                </span>
                                                <span class="badge bg-white text-dark border rounded-pill px-3 py-2 fw-bold shadow-sm">
                                                    <i class="bi bi-clock-history me-2 text-primary"></i>HD Quality
                                                </span>
                                                <?php if($lesson['type'] !== 'video'): ?>
                                                    <a href="<?= base_url('admin/lesson/questions/'.$lesson['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-black shadow-sm animate__animated animate__pulse animate__infinite">
                                                        <i class="bi bi-list-check me-2"></i> MANAGE ASSESSMENT
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="objective-box p-4 mb-5 border-0 shadow-sm transition-all">
                                                <h6 class="fw-black mb-3 small text-uppercase letter-spacing-1 text-primary">Lesson Synopsis</h6>
                                                <p class="text-dark mb-0 fs-6 leading-relaxed opacity-75 fw-medium">
                                                    <?= $lesson['description'] ?>
                                                </p>
                                            </div>
                                            
                                            <div class="bg-white rounded-5 p-4 border shadow-sm mt-2">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h6 class="fw-black mb-0 text-dark small text-uppercase letter-spacing-1">Educational Assets</h6>
                                                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold extra-small" onclick="openResourceModal(<?= $lesson['id'] ?>)">
                                                        <i class="bi bi-cloud-arrow-up-fill me-2"></i> UPLOAD ASSET
                                                    </button>
                                                </div>
                                                <div class="row g-3">
                                                    <?php if(empty($lesson['resources'])): ?>
                                                        <div class="col-12 text-center py-4 bg-light rounded-4 border border-dashed">
                                                            <i class="bi bi-files text-muted opacity-25 fs-1 mb-2 d-block"></i>
                                                            <p class="text-muted small italic mb-0">No active assets linked to this module.</p>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php foreach($lesson['resources'] as $res): ?>
                                                            <div class="col-md-6">
                                                                <div class="resource-item d-flex align-items-center p-3 rounded-4 shadow-sm">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="bg-primary-subtle text-primary rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                                            <i class="bi bi-file-earmark-<?= strtolower($res['file_type']) === 'pdf' ? 'pdf text-danger' : (strtolower($res['file_type']) === 'xlsx' ? 'excel text-success' : 'text text-primary') ?> fs-4"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <div class="fw-bold extra-small text-dark text-truncate mb-0" title="<?= $res['file_name'] ?>"><?= $res['file_name'] ?></div>
                                                                        <div class="text-muted d-flex align-items-center mt-1" style="font-size: 0.65rem;">
                                                                            <span class="text-uppercase fw-black"><?= $res['file_type'] ?></span>
                                                                            <span class="mx-1">•</span>
                                                                            <span><?= $res['file_size'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <a href="<?= base_url('admin/resource/delete/'.$res['id']) ?>" class="btn btn-link text-muted hover-danger p-2 rounded-circle" onclick="return confirm('Purge Asset?')">
                                                                        <i class="bi bi-trash3 text-danger"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="video-preview-wrapper shadow-lg border-0">
                                                <div class="ratio ratio-16x9 rounded-4 overflow-hidden bg-black shadow-inner">
                                                    <iframe src="https://www.youtube.com/embed/<?= $lesson['video_id'] ?>" title="HD Preview" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <div class="premium-badge animate__animated animate__pulse animate__infinite mt-1">
                                                        <div class="spinner-grow spinner-grow-sm text-primary me-3" role="status"></div>
                                                        <span class="extra-small text-uppercase letter-spacing-1">Live Curriculum Review</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modals & Scripts remain functional -->
<div class="modal fade px-3" id="lessonModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-primary py-4 px-4 text-white d-flex justify-content-between align-items-center">
                <h4 class="modal-title fw-black mb-0" id="modalTitle">RESERVE NEW LESSON</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/lesson/save') ?>" method="POST">
                <input type="hidden" name="id" id="lesson_id">
                <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
                
                <div class="modal-body p-5">
                    <div class="row g-4">
                        <div class="col-md-9">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">TITULAR DESIGNATION</label>
                            <input type="text" class="form-control form-control-lg rounded-4 bg-light border-0 px-4" name="title" id="l_title" placeholder="e.g. Mastery of US Tax Laws" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">SEQUENCE</label>
                            <input type="number" class="form-control form-control-lg rounded-4 bg-light border-0 px-3" name="sort_order" id="l_order" value="1" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">LESSON TYPE</label>
                            <select class="form-select form-select-lg rounded-4 bg-light border-0 px-4" name="type" id="l_type" onchange="toggleLessonFields(this.value)" required>
                                <option value="video">🎥 Video Lesson</option>
                                <option value="quiz">❓ Interactive Quiz</option>
                                <option value="exam">📝 Gradeable Exam</option>
                            </select>
                        </div>
                        <div class="col-md-7" id="video-field-container">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">YOUTUBE SOURCE (URL/ID)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-4 px-3"><i class="bi bi-youtube text-danger fs-5"></i></span>
                                <input type="text" class="form-control form-control-lg border-0 bg-light rounded-end-4 px-3" name="video_id" id="l_video" placeholder="Paste link...">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1" id="duration-label">TIME VALUATION</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-4 px-3"><i class="bi bi-clock-fill text-primary fs-5"></i></span>
                                <input type="text" class="form-control form-control-lg border-0 bg-light rounded-end-4 px-3" name="duration" id="l_duration" placeholder="e.g. 45:00" required>
                            </div>
                        </div>
                        <div class="col-md-3 d-none" id="passing-score-container">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">PASSING PTS</label>
                            <input type="number" class="form-control form-control-lg rounded-4 bg-light border-0 px-3" name="passing_score" id="l_passing" value="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">CURRICULUM OBJECTIVES</label>
                            <textarea class="form-control rounded-4 bg-light border-0 px-4 py-3" name="description" id="l_desc" rows="5" placeholder="Elaborate on the outcomes of this module..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-white rounded-pill px-4 fw-bold" data-bs-dismiss="modal">RETAIN STATE</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-black shadow-lg">FINALIZE MODULE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Resource Modal -->
<div class="modal fade px-3" id="resourceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-success py-4 px-4 text-white d-flex justify-content-between align-items-center">
                <h4 class="modal-title fw-black mb-0">PROVISION ASSET</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/resource/upload') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="lesson_id" id="res_lesson_id">
                <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
                
                <div class="modal-body p-5">
                    <div class="mb-4">
                        <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">ASSET NOMENCLATURE</label>
                        <input type="text" class="form-control form-control-lg rounded-4 bg-light border-0 px-4" name="file_name" placeholder="e.g. Comprehensive Guide.pdf" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">FILE SELECTION (PDF/XLSX)</label>
                        <div class="bg-light p-4 rounded-4 border-dashed text-center">
                            <i class="bi bi-cloud-upload-fill text-muted display-4 mb-3 d-block opacity-25"></i>
                            <input type="file" class="form-control border-0 bg-transparent" name="resource_file" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-white rounded-pill px-4 fw-bold" data-bs-dismiss="modal">DISCARD</button>
                    <button type="submit" class="btn btn-success rounded-pill px-5 fw-black shadow-lg">UPLOAD ASSET</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleLessonFields(type) {
    const videoContainer = document.getElementById('video-field-container');
    const passingContainer = document.getElementById('passing-score-container');
    const durationLabel = document.getElementById('duration-label');
    const videoInput = document.getElementById('l_video');
    
    if (type === 'video') {
        videoContainer.classList.remove('d-none');
        passingContainer.classList.add('d-none');
        durationLabel.textContent = 'TIME VALUATION';
    } else {
        videoContainer.classList.add('d-none');
        passingContainer.classList.remove('d-none');
        durationLabel.textContent = 'ALLOCATED TIME';
        videoInput.value = ''; // Clean up video ID for assessments
    }
}

function resetLessonForm() {
    document.getElementById('modalTitle').textContent = 'RESERVE NEW LESSON';
    document.getElementById('lesson_id').value = '';
    document.getElementById('l_title').value = '';
    document.getElementById('l_order').value = '1';
    document.getElementById('l_type').value = 'video';
    document.getElementById('l_video').value = '';
    document.getElementById('l_duration').value = '';
    document.getElementById('l_passing').value = '0';
    document.getElementById('l_desc').value = '';
    toggleLessonFields('video');
}

function editLesson(lesson) {
    document.getElementById('modalTitle').textContent = 'RECONFIGURE MODULE';
    document.getElementById('lesson_id').value = lesson.id;
    document.getElementById('l_title').value = lesson.title;
    document.getElementById('l_order').value = lesson.sort_order;
    document.getElementById('l_type').value = lesson.type || 'video';
    document.getElementById('l_video').value = lesson.video_id;
    document.getElementById('l_duration').value = lesson.duration;
    document.getElementById('l_passing').value = lesson.passing_score || '0';
    document.getElementById('l_desc').value = lesson.description;
    
    toggleLessonFields(lesson.type || 'video');
    
    var modal = new bootstrap.Modal(document.getElementById('lessonModal'));
    modal.show();
}

function openResourceModal(lessonId) {
    document.getElementById('res_lesson_id').value = lessonId;
    var modal = new bootstrap.Modal(document.getElementById('resourceModal'));
    modal.show();
}
</script>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
