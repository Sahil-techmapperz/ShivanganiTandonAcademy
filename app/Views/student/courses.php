<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold">My Courses</h3>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('info')): ?>
                <div class="alert alert-info border-0"><?= session()->getFlashdata('info') ?></div>
            <?php endif; ?>

            <div class="row">
                <?php foreach($courses as $course): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden course-card">
                        <?php 
                            $status = strtolower($course['status']);
                            $badgeClass = 'bg-primary-subtle text-primary';
                            $statusIcon = 'bi-clock-fill';
                            $canAccess = true;

                            if ($status === 'pending') {
                                $badgeClass = 'bg-warning-subtle text-warning';
                                $statusIcon = 'bi-hourglass-split';
                                $canAccess = false;
                            } else if ($status === 'completed') {
                                $badgeClass = 'bg-success-subtle text-success';
                                $statusIcon = 'bi-check-circle-fill';
                            } else if ($status === 'rejected') {
                                $badgeClass = 'bg-danger-subtle text-danger';
                                $statusIcon = 'bi-x-circle-fill';
                                $canAccess = false;
                            } else if ($status === 'suspended') {
                                $badgeClass = 'bg-dark-subtle text-dark';
                                $statusIcon = 'bi-pause-circle-fill';
                                $canAccess = false;
                            }
                        ?>
                        <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height: 160px; background: <?= $canAccess ? 'linear-gradient(135deg, #5751E1 0%, #3a34a8 100%)' : 'linear-gradient(135deg, #6c757d 0%, #495057 100%)' ?> !important; position: relative;">
                            <i class="bi bi-mortarboard text-white" style="font-size: 4.5rem;"></i>
                            <?php if (!$canAccess): ?>
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                                    <i class="bi bi-lock-fill text-white fs-1"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0 text-dark"><?= $course['name'] ?></h5>
                                <span class="badge rounded-pill <?= $badgeClass ?> px-3 py-2" style="font-size: 0.7rem;">
                                    <i class="bi <?= $statusIcon ?> me-1"></i>
                                    <?= strtoupper($status) ?>
                                </span>
                            </div>
                            <p class="text-muted small mb-4" style="height: 48px; overflow: hidden; line-height: 1.5;"><?= $course['description'] ?></p>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small fw-medium">Course Progress</span>
                                    <span class="text-primary small fw-bold"><?= $course['progress'] ?>%</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 6px; background-color: #f0f0f0;">
                                    <div class="progress-bar rounded-pill bg-primary" role="progressbar" style="width: <?= $course['progress'] ?>%" aria-valuenow="<?= $course['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <div class="row g-2">
                                <div class="col-12">
                                    <?php if ($canAccess): ?>
                                        <a href="<?= base_url('student/course/'.$course['course_id']) ?>" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm <?= $course['progress'] == 100 ? 'disabled' : '' ?>">
                                            <?= $course['progress'] == 0 ? 'Start Course' : ($course['progress'] == 100 ? 'Course Completed' : 'Continue Learning') ?>
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary w-100 rounded-pill py-2 fw-bold opacity-50" disabled>
                                            <i class="bi bi-lock-fill me-1"></i> Waiting for Approval
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <a href="<?= $canAccess ? base_url('student/resources/'.$course['course_id']) : 'javascript:void(0)' ?>" 
                                       class="btn btn-light w-100 rounded-pill py-2 fw-medium text-muted <?= !$canAccess ? 'opacity-50 disabled' : '' ?>">
                                        <i class="bi bi-folder2-open me-1"></i> View Resources
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Placeholder for new courses -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 rounded-4 shadow-sm bg-light d-flex align-items-center justify-content-center" style="border: 2px dashed #d1d1d1 !important; min-height: 380px;">
                        <div class="text-center p-4">
                            <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 80px; height: 80px;">
                                <i class="bi bi-plus-lg text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark">Enroll in New Course</h5>
                            <p class="text-muted small px-3">Explore our professional EA and CMA programs to advance your career.</p>
                            <a href="<?= base_url('student/academy') ?>" class="btn btn-primary rounded-pill px-4 mt-2">Browse Academy</a>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .course-card {
                    transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                }
                .course-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
                }
                .bg-primary-subtle { background-color: #E0E7FF !important; }
                .bg-success-subtle { background-color: #DCFCE7 !important; }
            </style>
        </div>
    </div>
</main>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
