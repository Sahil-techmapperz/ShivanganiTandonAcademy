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
                                            <div class="col-md-6">
                                                <label class="form-label small">New Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small">Confirm New Password</label>
                                                <input type="password" class="form-control" name="confirm_password">
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
        
        $.ajax({
            url: '<?= base_url('student/updateProfile') ?>',
            type: 'POST',
            data: Object.fromEntries(formData),
            success: function(response) {
                if (response.success) {
                    alert('Profile updated successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Profile Picture Upload
    document.getElementById('profile-pic-input').addEventListener('change', function(e) {
        if (!e.target.files.length) return;

        const file = e.target.files[0];
        const formData = new FormData();
        formData.append('profile_pic', file);

        // Show loader
        document.getElementById('upload-loader').classList.remove('d-none');
        document.getElementById('profile-img-preview').style.opacity = '0.5';

        $.ajax({
            url: '<?= base_url('student/uploadProfilePic') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    document.getElementById('profile-img-preview').src = response.path;
                    // Also update header/sidebar images if they have IDs
                    const sidebarImg = document.querySelector('.sidebar-brand img');
                    const headerImg = document.querySelector('.user-menu img');
                    if(sidebarImg) sidebarImg.src = response.path;
                    if(headerImg) headerImg.src = response.path;
                    
                    alert('Profile photo updated!');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            complete: function() {
                document.getElementById('upload-loader').classList.add('d-none');
                document.getElementById('profile-img-preview').style.opacity = '1';
            }
        });
    });
</script>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
