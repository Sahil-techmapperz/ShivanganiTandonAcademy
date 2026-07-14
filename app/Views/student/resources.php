<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4 bg-white border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="<?= base_url('student/courses') ?>">My Courses</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('student/course/'.$course['course_id']) ?>"><?= esc($course['title']) ?></a></li>
                        <li class="breadcrumb-item active">Study Materials</li>
                    </ol>
                </nav>
                <h3 class="fw-bold m-0 text-dark">Study Materials</h3>
            </div>
            <a href="<?= base_url('student/course/'.$course['course_id']) ?>" class="btn btn-primary btn-sm rounded-pill px-4">
                <i class="bi bi-play-fill me-1"></i> Back to Player
            </a>
        </div>
    </div>

    <div class="app-content py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <!-- Downloadable Files -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white py-3 border-0 d-flex align-items-center">
                            <i class="bi bi-folder2-open text-primary fs-5 me-2"></i>
                            <h5 class="fw-bold mb-0">Downloadable Files</h5>
                            <span class="badge bg-primary-subtle text-primary ms-auto rounded-pill px-3"><?= count($resources) ?> file<?= count($resources) !== 1 ? 's' : '' ?></span>
                        </div>

                        <?php if (empty($resources)): ?>
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x fs-1 d-block mb-2 opacity-50"></i>
                                <p class="mb-0">No files have been uploaded for this course yet.</p>
                            </div>
                        <?php else: ?>
                            <div class="list-group list-group-flush">
                                <?php
                                $iconMap = [
                                    'PDF'  => ['icon' => 'bi-file-pdf-fill',   'color' => 'text-danger',  'bg' => 'bg-danger-subtle'],
                                    'DOC'  => ['icon' => 'bi-file-word-fill',  'color' => 'text-primary', 'bg' => 'bg-primary-subtle'],
                                    'DOCX' => ['icon' => 'bi-file-word-fill',  'color' => 'text-primary', 'bg' => 'bg-primary-subtle'],
                                    'XLS'  => ['icon' => 'bi-file-excel-fill', 'color' => 'text-success', 'bg' => 'bg-success-subtle'],
                                    'XLSX' => ['icon' => 'bi-file-excel-fill', 'color' => 'text-success', 'bg' => 'bg-success-subtle'],
                                    'PPT'  => ['icon' => 'bi-file-slides-fill','color' => 'text-warning', 'bg' => 'bg-warning-subtle'],
                                    'PPTX' => ['icon' => 'bi-file-slides-fill','color' => 'text-warning', 'bg' => 'bg-warning-subtle'],
                                    'ZIP'  => ['icon' => 'bi-file-zip-fill',   'color' => 'text-secondary','bg' => 'bg-secondary-subtle'],
                                    'MP4'  => ['icon' => 'bi-file-play-fill',  'color' => 'text-purple',  'bg' => 'bg-purple-subtle'],
                                    'JPG'  => ['icon' => 'bi-file-image-fill', 'color' => 'text-info',    'bg' => 'bg-info-subtle'],
                                    'PNG'  => ['icon' => 'bi-file-image-fill', 'color' => 'text-info',    'bg' => 'bg-info-subtle'],
                                ];
                                foreach ($resources as $res):
                                    $type = strtoupper($res['file_type'] ?? 'FILE');
                                    $icon  = $iconMap[$type]['icon']  ?? 'bi-file-earmark-fill';
                                    $color = $iconMap[$type]['color'] ?? 'text-secondary';
                                    $bg    = $iconMap[$type]['bg']    ?? 'bg-secondary-subtle';
                                ?>
                                <div class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="<?= $bg ?> p-3 rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;flex-shrink:0;">
                                            <i class="bi <?= $icon ?> <?= $color ?> fs-4"></i>
                                        </div>
                                        <div style="min-width:0;">
                                            <h6 class="fw-bold mb-0 text-dark text-truncate"><?= esc($res['file_name']) ?></h6>
                                            <div class="text-muted small mt-1">
                                                <span class="badge bg-light text-secondary border me-1"><?= esc($type) ?></span>
                                                <?php if(!empty($res['file_size'])): ?><span class="me-2"><?= esc($res['file_size']) ?></span><?php endif; ?>
                                                <span><i class="bi bi-book me-1"></i><?= esc($res['lesson_title']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url($res['file_path']) ?>"
                                       target="_blank"
                                       download="<?= esc($res['file_name']) ?>"
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-medium flex-shrink-0">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Helpful Links -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-header bg-white py-3 border-0 d-flex align-items-center">
                            <i class="bi bi-link-45deg text-primary fs-5 me-2"></i>
                            <h5 class="fw-bold mb-0">Helpful Links</h5>
                        </div>
                        <div class="card-body pt-0 pb-3">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <a href="https://www.icmai.in/upload/Institute/Final-CMA-syllabus-2022.pdf"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-decoration-none d-inline-flex align-items-center gap-2 text-primary fw-medium small">
                                        <i class="bi bi-link-45deg fs-5"></i> Official CMA Exam Handbook (ICMAI)
                                        <i class="bi bi-box-arrow-up-right" style="font-size:11px;"></i>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.icmai.in/" target="_blank" rel="noopener noreferrer"
                                       class="text-decoration-none d-inline-flex align-items-center gap-2 text-primary fw-medium small">
                                        <i class="bi bi-link-45deg fs-5"></i> ICMAI Official Website
                                        <i class="bi bi-box-arrow-up-right" style="font-size:11px;"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('student/support') ?>"
                                       class="text-decoration-none d-inline-flex align-items-center gap-2 text-primary fw-medium small">
                                        <i class="bi bi-headset fs-5"></i> Contact Support
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .bg-purple-subtle { background: rgba(111,66,193,0.1); }
    .text-purple      { color: #6f42c1; }
    .list-group-item:hover { background: #f8fafc; }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
