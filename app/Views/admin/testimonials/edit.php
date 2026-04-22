<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold mb-0"><?= $title ?></h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm border-0 rounded-4 max-w-2xl">
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/testimonials/update/'.$testimonial['id']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Student Name</label>
                            <input type="text" name="student_name" class="form-control form-control-lg" required value="<?= $testimonial['student_name'] ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">YouTube Video ID</label>
                            <input type="text" name="youtube_id" class="form-control form-control-lg" required value="<?= $testimonial['youtube_id'] ?>">
                            <div class="form-text small">Find this in the URL: youtube.com/watch?v=<b>zMBCf3PKSaA</b></div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Thumbnail Image (Optional)</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            <div class="form-text small">Leave empty to keep existing. Recommended size: 1280x720.</div>
                            <?php if($testimonial['thumbnail']): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url($testimonial['thumbnail']) ?>" class="rounded shadow-sm" style="height: 100px; width: 177px; object-fit: cover">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Save Changes</button>
                            <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-light btn-lg rounded-pill px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
