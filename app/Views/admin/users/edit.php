<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-5 border-bottom mb-4" style="background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1 text-uppercase">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/users') ?>" class="text-primary text-decoration-none opacity-75">USER MANAGEMENT</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">EDIT ACCOUNT</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Update Details</h1>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/users') ?>" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift bg-white">
                                <i class="bi bi-arrow-left me-2"></i> BACK TO LIST
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content py-5 bg-light-subtle">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 mx-auto">
                    <div class="card border-0 shadow-lg rounded-5 overflow-hidden bg-white">
                        <div class="card-body p-4 p-md-5">
                            <?php if(session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger border-0 rounded-4 mb-4 shadow-sm">
                                    <i class="bi bi-exclamation-circle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('admin/users/update/'.$user['id']) ?>" method="POST" enctype="multipart/form-data">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-black text-dark extra-small letter-spacing-1 text-uppercase">Full Name</label>
                                            <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden border">
                                                <span class="input-group-text bg-white border-0"><i class="bi bi-person text-primary"></i></span>
                                                <input type="text" name="full_name" class="form-control border-0 ps-0" placeholder="Enter full name" value="<?= old('full_name', $user['full_name']) ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-black text-dark extra-small letter-spacing-1 text-uppercase">Email Address</label>
                                            <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden border">
                                                <span class="input-group-text bg-white border-0"><i class="bi bi-envelope text-primary"></i></span>
                                                <input type="email" name="email" class="form-control border-0 ps-0" placeholder="name@example.com" value="<?= old('email', $user['email']) ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-black text-dark extra-small letter-spacing-1 text-uppercase">Phone Number</label>
                                            <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden border">
                                                <span class="input-group-text bg-white border-0"><i class="bi bi-telephone text-primary"></i></span>
                                                <input type="text" name="phone" class="form-control border-0 ps-0" placeholder="+1 (555) 000-0000" value="<?= old('phone', $user['phone']) ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-black text-dark extra-small letter-spacing-1 text-uppercase">New Password (Optional)</label>
                                            <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden border">
                                                <span class="input-group-text bg-white border-0"><i class="bi bi-lock text-primary"></i></span>
                                                <input type="password" name="password" class="form-control border-0 ps-0" placeholder="Leave blank to keep current">
                                            </div>
                                            <small class="text-muted extra-small ms-2 mt-1">Only fill this if you want to change the password.</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-black text-dark extra-small letter-spacing-1 text-uppercase">Profile Picture</label>
                                            <div class="d-flex align-items-center p-4 bg-light rounded-5 border border-dashed border-2">
                                                <div class="me-4 position-relative">
                                                    <img id="imgPreview" src="<?= $user['profile_pic'] ? base_url($user['profile_pic']) : 'https://ui-avatars.com/api/?name='.urlencode($user['full_name']).'&background=f0f2f5&color=ccc' ?>" 
                                                         class="rounded-circle shadow-sm border border-3 border-white" 
                                                         style="width: 100px; height: 100px; object-fit: cover;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <input type="file" name="profile_pic" class="form-control shadow-sm rounded-pill mb-2" accept="image/*" onchange="previewImage(this)">
                                                    <small class="text-muted d-block mt-1">Leave blank to keep existing image.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end mt-5">
                                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-black shadow-lg hover-lift">
                                            <i class="bi bi-check2-circle me-2"></i> UPDATE ACCOUNT
                                        </button>
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
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgPreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    
    body { font-family: 'Outfit', sans-serif; background-color: #f0f2f5; }
    .app-main { background-color: #f0f2f5; }

    .fw-black { font-weight: 900; }
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .letter-spacing-tight { letter-spacing: -1.5px; }
    .extra-small { font-size: 0.7rem; }
    
    .hover-lift { transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .hover-lift:hover { transform: translateY(-3px); }
    
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }

    .form-control:focus {
        box-shadow: none;
        background-color: #fcfcfc;
    }

    .input-group-text {
        padding-left: 1.5rem;
    }

    .border-dashed {
        border-style: dashed !important;
    }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
