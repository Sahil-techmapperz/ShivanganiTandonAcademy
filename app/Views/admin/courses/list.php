<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-5 bg-white border-bottom mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="fw-bold m-0 text-dark">Course Catalog</h2>
                    <p class="text-muted small mb-0">Manage and organize your academy's curriculum and learning path.</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                        <i class="bi bi-plus-circle me-2"></i> Create New Course
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light border-bottom">
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase extra-small fw-bold text-muted letter-spacing-1 text-start" style="width: 45%;">Course Details</th>
                                    <th class="py-3 text-uppercase extra-small fw-bold text-muted letter-spacing-1 text-start" style="width: 20%;">Duration</th>
                                    <th class="py-3 text-uppercase extra-small fw-bold text-muted letter-spacing-1 text-start" style="width: 15%;">Curriculum</th>
                                    <th class="py-3 text-uppercase extra-small fw-bold text-muted letter-spacing-1 text-start pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php if(empty($courses)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <i class="bi bi-journal-x display-4 text-light mb-3 d-block"></i>
                                            <h6 class="text-muted fw-bold">No courses found</h6>
                                            <p class="small text-muted mb-0">Add your first course to populate the catalog.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($courses as $course): ?>
                                        <tr>
                                            <td class="ps-4 py-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                            <i class="bi bi-mortarboard fs-4"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark fs-6 mb-1"><?= $course['title'] ?></div>
                                                        <div class="small text-muted text-truncate" style="max-width: 400px;"><?= $course['description'] ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-primary border border-primary-subtle rounded-pill px-3 py-2 fw-medium">
                                                    <i class="bi bi-calendar-event me-1"></i> <?= $course['duration'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php 
                                                    $db = \Config\Database::connect();
                                                    $count = $db->table('tbl_lessons')->where('course_id', $course['id'])->countAllResults();
                                                ?>
                                                <div class="d-flex align-items-center text-dark">
                                                    <span class="fw-bold"><?= $count ?></span>
                                                    <span class="ms-1 text-muted small">Lessons</span>
                                                </div>
                                            </td>
                                            <td class="text-end pe-4">
                                                <a href="<?= base_url('admin/course/lessons/'.$course['id']) ?>" class="btn btn-white border shadow-sm rounded-pill btn-sm px-3 py-2 hover-lift">
                                                    <i class="bi bi-list-stars me-2 text-primary"></i> Manage Lessons
                                                </a>
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
</main>

<style>
    .letter-spacing-1 { letter-spacing: 1px; }
    .extra-small { font-size: 0.7rem; }
    .bg-primary-subtle { background-color: rgba(87, 81, 225, 0.1) !important; }
    .text-primary { color: #5751E1 !important; }
    .border-primary-subtle { border-color: rgba(87, 81, 225, 0.2) !important; }
    .hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .hover-lift:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important; }
    .btn-white { background-color: #fff; border-color: #dee2e6; color: #333; }
</style>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= base_url('admin/add-course') ?>" method="POST">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Create New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Course Title</label>
                        <input type="text" class="form-control" name="title" placeholder="e.g. EA Course - Enrolled Agent" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Duration</label>
                        <input type="text" class="form-control" name="duration" placeholder="e.g. 6 Months" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label small fw-bold">Short Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Brief overview of the course..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Create Course</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
