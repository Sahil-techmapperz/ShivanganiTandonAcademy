<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold">My Profile</h3>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 text-center p-4">
                        <div class="mb-3 position-relative">
                            <img id="profile-img-preview" src="<?= $student['profile_pic'] ? base_url($student['profile_pic']) : base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;" alt="Profile Picture">
                            <div id="upload-loader" class="position-absolute top-50 start-50 translate-middle d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-1"><?= $student['full_name'] ?? 'Student' ?></h4>
                        <div class="d-grid gap-2 mt-4">
                            <input type="file" id="profile-pic-input" accept="image/*" class="d-none">
                            <button type="button" onclick="document.getElementById('profile-pic-input').click()" class="btn btn-outline-primary btn-sm">Change Photo</button>
                        </div>
                        <hr>
                        <div class="text-start">
                            <h6 class="fw-bold mb-2 small text-uppercase">Contact Info</h6>
                            <p class="mb-1 small"><i class="bi bi-envelope me-2"></i><?= $student['email'] ?></p>
                            <p class="mb-0 small"><i class="bi bi-phone me-2"></i><?= $student['phone'] ?? 'Not provided' ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-4 mt-lg-0">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            <span class="fs-5">Edit Profile Details</span>
                        </div>
                        <div class="card-body p-4">
                            <form id="profile-form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" value="<?= $student['full_name'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email Address</label>
                                        <input type="email" class="form-control" value="<?= $student['email'] ?>" disabled>
                                        <div class="form-text small">Email cannot be changed online.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="<?= $student['phone'] ?? '' ?>">
                                    </div>
                                    <div class="col-12 mt-4">
                                        <h6 class="fw-bold mb-3">Security</h6>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label small">Current Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control pe-5" name="current_password" placeholder="Required only if changing password">
                                                    <button type="button" class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-muted toggle-password" style="z-index: 10;">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small">New Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control pe-5" name="password" placeholder="Leave blank to keep current">
                                                    <button type="button" class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-muted toggle-password" style="z-index: 10;">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small">Confirm New Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control pe-5" name="confirm_password" placeholder="Confirm new password">
                                                    <button type="button" class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-muted toggle-password" style="z-index: 10;">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 text-end">
                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('profile-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const $btn = $(this).find('button[type="submit"]');
        $btn.prop('disabled', true).text('Saving...');
        
        $.ajax({
            url: '<?= base_url('student/updateProfile') ?>',
            type: 'POST',
            data: Object.fromEntries(formData),
            success: function(response) {
                if (response.success) {
                    showToast('Profile updated successfully!', 'success');
                } else {
                    showToast('Error: ' + response.message, 'danger');
                }
            },
            error: function() {
                showToast('An error occurred. Please try again.', 'danger');
            },
            complete: function() {
                $btn.prop('disabled', false).text('Save Changes');
            }
        });
    });

    // Profile Picture Upload — instantly update all images on page
    document.getElementById('profile-pic-input').addEventListener('change', function(e) {
        if (!e.target.files.length) return;

        const file = e.target.files[0];

        // Preview locally before upload (instant feedback)
        const localReader = new FileReader();
        localReader.onload = function(ev) {
            updateAllProfileImages(ev.target.result);
        };
        localReader.readAsDataURL(file);

        const formData = new FormData();
        formData.append('profile_pic', file);

        // Show loader overlay
        document.getElementById('upload-loader').classList.remove('d-none');
        document.getElementById('profile-img-preview').style.opacity = '0.6';

        $.ajax({
            url: '<?= base_url('student/uploadProfilePic') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    // Use server-confirmed URL (with cache-bust to force reload)
                    const finalUrl = response.path + '?t=' + Date.now();
                    updateAllProfileImages(finalUrl);
                    showToast('Profile photo updated!', 'success');
                } else {
                    showToast('Error: ' + response.message, 'danger');
                }
            },
            error: function() {
                showToast('Upload failed. Please try again.', 'danger');
            },
            complete: function() {
                document.getElementById('upload-loader').classList.add('d-none');
                document.getElementById('profile-img-preview').style.opacity = '1';
                // Reset input so same file can be picked again
                document.getElementById('profile-pic-input').value = '';
            }
        });
    });

    // Update every profile image element on the page at once
    function updateAllProfileImages(src) {
        // Main preview on profile card
        document.getElementById('profile-img-preview').src = src;
        // Small avatar in navbar (header)
        document.querySelectorAll('.user-menu img.user-image, .user-image.rounded-circle').forEach(function(el) {
            el.src = src;
        });
        // Dropdown popup avatar
        document.querySelectorAll('.user-header img').forEach(function(el) {
            el.src = src;
        });
        // Sidebar profile images (if any)
        document.querySelectorAll('.sidebar-brand img, .user-panel img').forEach(function(el) {
            el.src = src;
        });
    }

    // Non-intrusive toast notification
    function showToast(message, type) {
        const existing = document.getElementById('profile-toast');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.id = 'profile-toast';
        toast.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:9999;min-width:260px;';
        toast.innerHTML = `
            <div class="alert alert-${type} alert-dismissible shadow-lg rounded-3 mb-0 fw-medium" role="alert">
                <i class="bi bi-${type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" onclick="this.closest('#profile-toast').remove()"></button>
            </div>`;
        document.body.appendChild(toast);
        setTimeout(function() { if (toast.parentNode) toast.remove(); }, 3500);
    }

    // Password visibility toggles
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    });
</script>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
