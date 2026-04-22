<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-0"><?= $title ?></h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="<?= base_url('admin/testimonials/create') ?>" class="btn btn-primary shadow-sm rounded-pill px-4">
                        <i class="bi bi-plus-lg me-2"></i>Add Testimonial
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm mb-4"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3">Student</th>
                                    <th class="py-3 text-center">Video Preview</th>
                                    <th class="py-3 text-center">YouTube ID</th>
                                    <th class="py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($testimonials)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">No testimonials found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($testimonials as $t): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="fw-bold text-dark"><?= $t['student_name'] ?></div>
                                            <small class="text-muted">Added on <?= date('d M, Y', strtotime($t['created_at'])) ?></small>
                                        </td>
                                        <td class="text-center">
                                            <?php if($t['thumbnail']): ?>
                                                <img src="<?= base_url($t['thumbnail']) ?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-cover">
                                            <?php else: ?>
                                                <span class="badge bg-light text-muted">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="https://youtube.com/watch?v=<?= $t['youtube_id'] ?>" target="_blank" class="text-decoration-none">
                                                <code><?= $t['youtube_id'] ?></code> <i class="bi bi-box-arrow-up-right ms-1"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/testimonials/edit/'.$t['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('admin/testimonials/delete/'.$t['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
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

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
