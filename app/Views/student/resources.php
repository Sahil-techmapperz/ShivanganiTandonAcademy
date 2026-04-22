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
                        <li class="breadcrumb-item"><a href="<?= base_url('student/course/'.$course['course_id']) ?>"><?= $course['title'] ?></a></li>
                        <li class="breadcrumb-item active">Resources</li>
                    </ol>
                </nav>
                <h3 class="fw-bold m-0 text-dark">Study Materials</h3>
            </div>
            <a href="<?= base_url('student/course/'.$course['course_id']) ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-play-fill me-1"></i> Back to Player
            </a>
        </div>
    </div>

    <div class="app-content py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white py-3 border-0">
                            <h5 class="fw-bold mb-0">Downloadable Files</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            <!-- Placeholder Resources -->
                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-primary p-3 rounded-4 me-3">
                                        <i class="bi bi-file-pdf text-primary h4 mb-0"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Course Introduction PDF</h6>
                                        <p class="text-muted small mb-0">Overview and Objectives • 2.5 MB</p>
                                    </div>
                                </div>
                                <button class="btn btn-light rounded-pill px-3 btn-sm">Download</button>
                            </div>

                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-success p-3 rounded-4 me-3">
                                        <i class="bi bi-journal-text text-success h4 mb-0"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Module 1 Study Guide</h6>
                                        <p class="text-muted small mb-0">Detailed notes and exercises • 5.1 MB</p>
                                    </div>
                                </div>
                                <button class="btn btn-light rounded-pill px-3 btn-sm">Download</button>
                            </div>

                            <div class="list-group-item p-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light-warning p-3 rounded-4 me-3">
                                        <i class="bi bi-question-square text-warning h4 mb-0"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0">Practice Exam - Set A</h6>
                                        <p class="text-muted small mb-0">Mock questions for preparation • 1.2 MB</p>
                                    </div>
                                </div>
                                <button class="btn btn-light rounded-pill px-3 btn-sm">Download</button>
                            </div>
                        </div>
                    </div>

                    <!-- Helpful Links -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-header bg-white py-3 border-0">
                            <h6 class="fw-bold mb-0">Helpful Links</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="#" class="text-decoration-none small"><i class="bi bi-link-45deg me-2"></i>Official CMA Exam Handbook</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none small"><i class="bi bi-link-45deg me-2"></i>Study Group Forum</a></li>
                                <li><a href="#" class="text-decoration-none small"><i class="bi bi-link-45deg me-2"></i>Contact Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .bg-light-primary { background: rgba(87, 81, 225, 0.1); }
    .bg-light-success { background: rgba(40, 167, 69, 0.1); }
    .bg-light-warning { background: rgba(255, 193, 7, 0.1); }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
