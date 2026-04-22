<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h3 class="fw-bold m-0 text-primary">Browse Academy</h3>
            <a href="<?= base_url('student/courses') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> My Courses
            </a>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="row">
                <?php if(empty($courses)): ?>
                    <div class="col-12 text-center py-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h3>You're All Caught Up!</h3>
                        <p class="text-muted">You are currently enrolled in all our available programs. Keep up the great work!</p>
                        <a href="<?= base_url('student/courses') ?>" class="btn btn-primary px-4">Go to My Courses</a>
                    </div>
                <?php else: ?>
                    <?php foreach($courses as $course): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm border-0 overflow-hidden academy-card">
                                <div class="bg-gradient-primary p-4 text-center text-white" style="background: linear-gradient(135deg, #5751E1 0%, #3a34a8 100%);">
                                    <i class="bi bi-mortarboard" style="font-size: 4rem;"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?= $course['title'] ?></h5>
                                    <p class="card-text text-muted small" style="height: 60px; overflow: hidden;"><?= $course['description'] ?></p>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-clock text-primary me-2"></i>
                                        <span class="small text-muted"><?= $course['duration'] ?> Duration</span>
                                    </div>

                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary rounded-pill" onclick="openEnrollModal(<?= $course['id'] ?>, '<?= addslashes($course['title']) ?>')">Enroll in Course</button>
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

<!-- Enrollment Modal -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header bg-primary text-white border-0 py-4" style="border-radius: 20px 20px 0 0;">
                <h5 class="modal-title fw-bold" id="enrollModalLabel">Course Enrollment Request</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('student/enroll') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="course_id" id="modal_course_id">
                    <div class="text-center mb-4">
                        <div class="bg-primary-subtle rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-mortarboard text-primary fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-dark" id="modal_course_title">Course Title</h5>
                        <p class="text-muted small">Please tell us why you are interested in this course or add any specific request for the administrator.</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small">Your Message / Reason</label>
                        <textarea name="message" class="form-control border-0 bg-light p-3" rows="4" placeholder="Enter your message here..." required style="border-radius: 12px;"></textarea>
                    </div>
                    
                    <div class="alert alert-info border-0 small py-2" style="border-radius: 10px;">
                        <i class="bi bi-info-circle me-2"></i> Your request will be sent to the administrator for approval.
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openEnrollModal(id, title) {
        document.getElementById('modal_course_id').value = id;
        document.getElementById('modal_course_title').innerText = title;
        new bootstrap.Modal(document.getElementById('enrollModal')).show();
    }
</script>

<style>
    .academy-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .academy-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15)!important;
    }
</style>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
