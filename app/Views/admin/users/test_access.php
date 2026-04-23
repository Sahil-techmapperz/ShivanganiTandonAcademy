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
                                    <li class="breadcrumb-item active text-dark" aria-current="page">TEST ACCESS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Access Control</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm">PERMISSIONS CENTER</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Grant or revoke student access to specific mock exams and categories.</p>
                            </div>
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

                    <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-premium">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 35%;">Student Information</th>
                                        <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 45%;">Granted Mock Tests</th>
                                        <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <?php foreach($users as $user): ?>
                                        <tr class="transition-all hover-row">
                                            <td class="ps-5 py-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-md rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-black me-3 shadow-sm" style="width: 45px; height: 45px;">
                                                        <?= strtoupper(substr($user['full_name'] ?? $user['name'] ?? 'U', 0, 1)) ?>
                                                    </div>
                                                    <div>
                                                        <h6 class="fw-black text-dark mb-0"><?= $user['full_name'] ?? $user['name'] ?></h6>
                                                        <p class="text-muted extra-small mb-0 fw-bold"><?= $user['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <?php 
                                                    $allowedIds = !empty($user['access']['allowed_mock_tests']) ? explode(',', $user['access']['allowed_mock_tests']) : [];
                                                    if(empty($allowedIds)):
                                                ?>
                                                    <span class="text-muted small fw-medium">No tests assigned</span>
                                                <?php else: ?>
                                                    <div class="d-flex flex-wrap gap-1">
                                                        <?php 
                                                            foreach($mockTests as $test): 
                                                                if(in_array($test['id'], $allowedIds)):
                                                        ?>
                                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 extra-small fw-black border border-success border-opacity-25">
                                                                <?= $test['title'] ?>
                                                            </span>
                                                        <?php 
                                                                endif;
                                                            endforeach; 
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="pe-5 py-4 text-end">
                                                <button class="btn btn-primary rounded-pill px-4 extra-small fw-black hover-lift" onclick='openAccessModal(<?= json_encode($user) ?>)'>
                                                    <i class="bi bi-shield-lock-fill me-1"></i> MANAGE ACCESS
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Access Modal -->
<div class="modal fade" id="accessModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-dark py-4 px-5 text-white d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="bi bi-person-lock fs-4"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-black mb-0 letter-spacing-tight" id="modal-user-name">STUDENT ACCESS</h4>
                        <div class="extra-small fw-bold opacity-75 letter-spacing-1 text-uppercase">Permission Overrides</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-5 bg-white">
                <form action="<?= base_url('admin/test-access/save') ?>" method="POST">
                    <input type="hidden" name="user_id" id="modal-user-id">
                    
                    <div class="mb-5">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-4 d-block">Available Mock Exams</label>
                        <div class="row g-3">
                            <?php foreach($mockTests as $test): ?>
                                <div class="col-md-6">
                                    <div class="card border-light bg-light rounded-4 p-3 hover-lift transition-all cursor-pointer h-100 access-card" onclick="toggleCheckbox('test_<?= $test['id'] ?>')">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="checkbox" name="allowed_mock_tests[]" value="<?= $test['id'] ?>" id="test_<?= $test['id'] ?>" onclick="event.stopPropagation()">
                                            </div>
                                            <div>
                                                <h6 class="fw-black text-dark mb-0 small"><?= $test['title'] ?></h6>
                                                <p class="extra-small text-muted mb-0 fw-bold"><?= $test['duration_minutes'] ?> Mins</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="btn btn-dark rounded-pill py-3 px-5 shadow-lg fw-black w-100 hover-lift">
                            UPDATE PERMISSIONS <i class="bi bi-check-all ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let accessModal;

    function getModal() {
        if (!accessModal) {
            accessModal = new bootstrap.Modal(document.getElementById('accessModal'));
        }
        return accessModal;
    }

    function openAccessModal(user) {
        document.getElementById('modal-user-id').value = user.id;
        document.getElementById('modal-user-name').textContent = (user.full_name || user.name).toUpperCase();
        
        // Reset checkboxes
        const checkboxes = document.querySelectorAll('input[name="allowed_mock_tests[]"]');
        checkboxes.forEach(cb => cb.checked = false);

        // Check assigned tests
        if (user.access && user.access.allowed_mock_tests) {
            const allowedIds = user.access.allowed_mock_tests.split(',');
            allowedIds.forEach(id => {
                const cb = document.getElementById('test_' + id);
                if (cb) cb.checked = true;
            });
        }

        getModal().show();
    }

    function toggleCheckbox(id) {
        const cb = document.getElementById(id);
        if (cb) cb.checked = !cb.checked;
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    body { font-family: 'Outfit', sans-serif; background-color: #f0f2f5; }
    .fw-black { font-weight: 900; }
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .letter-spacing-tight { letter-spacing: -1.5px; }
    .extra-small { font-size: 0.7rem; }
    .hover-lift { transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .hover-lift:hover { transform: translateY(-3px); }
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-sm { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }
    .cursor-pointer { cursor: pointer; }
    .access-card { border: 2px solid transparent !important; }
    .access-card:has(input:checked) { border-color: #198754 !important; background-color: rgba(25, 135, 84, 0.05) !important; }
    
    /* Override aggressive global table styles */
    .table-premium td, .table-premium th {
        white-space: normal !important;
        text-transform: none !important;
        padding: 1rem 0.5rem !important;
        width: auto !important;
        min-width: 0 !important;
        max-width: none !important;
    }
    .table-premium thead th {
        background: #f8f9fa !important;
        color: #6c757d !important;
        font-size: 0.7rem !important;
        font-weight: 900 !important;
        text-transform: uppercase !important;
        letter-spacing: 1.5px !important;
        text-align: left !important;
    }
    .table-premium thead th:last-child {
        text-align: right !important;
    }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
