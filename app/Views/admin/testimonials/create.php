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
                    <form action="<?= base_url('admin/testimonials/store') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Student Name</label>
                            <input type="text" name="student_name" class="form-control form-control-lg" required placeholder="e.g. John Doe">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">YouTube Video ID</label>
                            <input type="text" name="youtube_id" class="form-control form-control-lg" required placeholder="e.g. zMBCf3PKSaA">
                            <div class="form-text small">Find this in the URL: youtube.com/watch?v=<b>zMBCf3PKSaA</b></div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
                            <div class="form-text small">Recommended size: 1280x720 pixels (16:9 ratio).</div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Add Testimonial</button>
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
