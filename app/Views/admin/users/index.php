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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-primary text-decoration-none opacity-75">ADMINISTRATION</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">USERS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">User Management</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($users) ?> TOTAL USERS</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Manage administrative and student accounts for the academy.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary rounded-pill px-5 py-3 fw-black shadow-lg hover-lift">
                                <i class="bi bi-person-plus-fill me-2"></i> NEW USER
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
                <div class="col-xl-11 mx-auto">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(empty($users)): ?>
                        <div class="card border-0 shadow-sm rounded-5 py-5 text-center bg-white">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-people display-4 text-muted opacity-50"></i>
                                </div>
                                <h3 class="fw-black text-dark">No Users Found</h3>
                                <p class="text-muted fs-5">There are no user accounts registered in the system yet.</p>
                                <a href="<?= base_url('admin/users/create') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold mt-3">Add First User</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" style="min-width: 1000px;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 35%;">User Profile</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 25%;">Email & Phone</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 20%;">Joined Date</th>
                                            <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 20%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php foreach($users as $user): ?>
                                            <tr class="transition-all hover-row">
                                                <td class="ps-5 py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle overflow-hidden me-3 shadow-sm border border-2 border-white" style="width: 50px; height: 50px;">
                                                            <img src="<?= $user['profile_pic'] ? base_url($user['profile_pic']) : 'https://ui-avatars.com/api/?name='.urlencode($user['full_name']).'&background=5751E1&color=fff' ?>" 
                                                                 class="w-100 h-100 object-cover" alt="Profile">
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-black text-dark mb-0"><?= $user['full_name'] ?></h6>
                                                            <span class="badge bg-light text-primary extra-small fw-bold px-2">ID: #<?= $user['id'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="small fw-bold text-dark mb-1"><i class="bi bi-envelope me-1 text-muted"></i> <?= $user['email'] ?></div>
                                                    <div class="extra-small text-muted"><i class="bi bi-telephone me-1"></i> <?= $user['phone'] ?></div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="fw-black text-dark small mb-0"><?= date('d M, Y', strtotime($user['created_at'])) ?></div>
                                                    <div class="extra-small text-muted"><?= date('h:i A', strtotime($user['created_at'])) ?></div>
                                                </td>
                                                <td class="pe-5 py-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="<?= base_url('admin/users/edit/'.$user['id']) ?>" class="btn btn-outline-primary btn-sm rounded-circle p-2 hover-lift border-0 bg-light" title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>" class="btn btn-outline-danger btn-sm rounded-circle p-2 hover-lift border-0 bg-light" onclick="return confirm('Are you sure you want to delete this user?')" title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

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
    
    .transition-all { transition: all 0.3s ease; }
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }

    .hover-row:hover {
        background-color: rgba(87, 81, 225, 0.02);
    }

    .table thead th {
        border-top: none !important;
        border-bottom: 2px solid #f8f9fa !important;
    }

    .table tbody td {
        border-bottom: 1px solid #f8f9fa !important;
    }

    .btn-outline-primary:hover i, .btn-outline-danger:hover i { 
        color: white !important; 
    }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
