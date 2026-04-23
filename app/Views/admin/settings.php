<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold">Global Settings</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm mb-4"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0 shadow-sm mb-4"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="row">
                <!-- Left Column: Site Info & Social Links -->
                <div class="col-lg-8">
                    <form action="<?= base_url('admin/updateSettings') ?>" method="POST">
                        <!-- Site Info Card -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>General Site Information</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Academy Name</label>
                                        <input type="text" class="form-control form-control-lg" name="site_name" value="<?= $settings['site_name'] ?? 'Shivangani Tandon Academy' ?>" placeholder="Enter Academy Name">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Contact Email</label>
                                        <input type="email" class="form-control form-control-lg" name="site_email" value="<?= $settings['site_email'] ?? '' ?>" placeholder="contact@academy.com">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Contact Phone</label>
                                        <input type="text" class="form-control form-control-lg" name="site_phone" value="<?= $settings['site_phone'] ?? '' ?>" placeholder="+91 00000 00000">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Office Address</label>
                                        <textarea class="form-control form-control-lg" name="site_address" rows="3" placeholder="Enter Full Office Address"><?= $settings['site_address'] ?? '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Links Card -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold"><i class="bi bi-share me-2 text-primary"></i>Social Media Links</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Facebook URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-facebook text-primary"></i></span>
                                            <input type="url" class="form-control border-start-0" name="facebook_url" value="<?= $settings['facebook_url'] ?? '' ?>" placeholder="https://facebook.com/...">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">Instagram URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-instagram text-danger"></i></span>
                                            <input type="url" class="form-control border-start-0" name="instagram_url" value="<?= $settings['instagram_url'] ?? '' ?>" placeholder="https://instagram.com/...">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">LinkedIn URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-linkedin text-info"></i></span>
                                            <input type="url" class="form-control border-start-0" name="linkedin_url" value="<?= $settings['linkedin_url'] ?? '' ?>" placeholder="https://linkedin.com/company/...">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-muted small uppercase">YouTube URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-youtube text-danger"></i></span>
                                            <input type="url" class="form-control border-start-0" name="youtube_url" value="<?= $settings['youtube_url'] ?? '' ?>" placeholder="https://youtube.com/c/...">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">Save Global Settings</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right Column: Signature & Branding -->
                <div class="col-lg-4">
                    <!-- Branding Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-patch-check me-2 text-primary"></i>Brand Assets</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?= base_url('admin/updateLogos') ?>" method="POST" enctype="multipart/form-data">
                                <!-- Company Logo -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-muted small uppercase">Company Logo</label>
                                    <div class="mb-3 text-center p-3 bg-light rounded border border-dashed">
                                        <?php if(isset($settings['company_logo'])): ?>
                                            <img src="<?= base_url($settings['company_logo']) ?>" style="max-height: 60px;" class="bg-white p-2 shadow-sm rounded mb-2 d-block mx-auto">
                                        <?php else: ?>
                                            <div class="py-3 text-muted small"><i class="bi bi-image d-block mb-1"></i> No Logo</div>
                                        <?php endif; ?>
                                        <input type="file" class="form-control form-control-sm" name="company_logo" accept="image/*">
                                    </div>
                                </div>

                                <!-- Short Logo -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-muted small uppercase">Short Logo (Favicon/Icon)</label>
                                    <div class="mb-3 text-center p-3 bg-light rounded border border-dashed">
                                        <?php if(isset($settings['short_logo'])): ?>
                                            <img src="<?= base_url($settings['short_logo']) ?>" style="max-height: 40px;" class="bg-white p-2 shadow-sm rounded mb-2 d-block mx-auto">
                                        <?php else: ?>
                                            <div class="py-3 text-muted small"><i class="bi bi-app-indicator d-block mb-1"></i> No Icon</div>
                                        <?php endif; ?>
                                        <input type="file" class="form-control form-control-sm" name="short_logo" accept="image/*">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary shadow-sm">Update Brand Assets</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Signature Card -->
                    <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-pen me-2 text-primary"></i>Director's Signature</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?= base_url('admin/updateSignature') ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-4 text-center p-4 bg-light rounded border border-dashed">
                                    <h6 class="text-muted small mb-3 uppercase fw-bold">Current Signature</h6>
                                    <?php if($signature && $signature['key_value']): ?>
                                        <img src="<?= base_url($signature['key_value']) ?>" style="max-height: 120px;" class="bg-white p-2 shadow-sm rounded">
                                    <?php else: ?>
                                        <div class="p-5 text-muted small">
                                            <i class="bi bi-image d-block mb-2 fs-2"></i>
                                            No signature uploaded
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-muted small uppercase">Upload New Signature</label>
                                    <input type="file" class="form-control" name="signature" accept="image/*" required>
                                    <div class="form-text mt-2 small">Transparent PNG, 300x100 pixels recommended.</div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-primary shadow-sm">Update Signature</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
