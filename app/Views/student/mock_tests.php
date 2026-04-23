<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 fw-bold">Mock Exams</h3>
                    <p class="text-muted mb-0">Assess your knowledge with full-length practice tests.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="row g-4">
                <?php if(empty($mockTests)): ?>
                    <div class="col-12">
                        <div class="card p-5 text-center shadow-sm border-0 rounded-4">
                            <div class="py-5">
                                <i class="bi bi-journal-x text-muted opacity-25 display-1"></i>
                                <h4 class="mt-4 fw-bold">No Mock Tests Available</h4>
                                <p class="text-muted">You don't have any mock tests assigned to you yet. Please contact support if you believe this is an error.</p>
                                <a href="<?= base_url('student/support') ?>" class="btn btn-primary rounded-pill px-4">Contact Support</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach($mockTests as $test): ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden hover-lift transition-all">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="bg-primary-subtle p-3 rounded-4">
                                            <i class="bi bi-file-earmark-check text-primary fs-3"></i>
                                        </div>
                                        <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-bold small">
                                            <?= $test['duration_minutes'] ?> Mins
                                        </span>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2"><?= $test['title'] ?></h5>
                                    <p class="text-muted small mb-4 line-clamp-3"><?= $test['note'] ?: 'This is a comprehensive mock exam designed to test your proficiency in the subject matter.' ?></p>
                                    
                                    <div class="d-flex align-items-center mb-4 text-muted small">
                                        <div class="me-3"><i class="bi bi-question-circle me-1"></i> Multiple Choice</div>
                                        <div><i class="bi bi-shield-check me-1"></i> Passing: 75%</div>
                                    </div>

                                    <div class="pt-3 border-top">
                                        <a href="<?= base_url('student/take-test/mock/'.$test['id']) ?>" class="btn btn-primary w-100 rounded-pill fw-bold py-2 shadow-sm">
                                            START EXAM <i class="bi bi-play-fill ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<style>
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .transition-all { transition: all 0.3s ease; }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .bg-primary-subtle { background-color: rgba(99, 102, 241, 0.1) !important; }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
