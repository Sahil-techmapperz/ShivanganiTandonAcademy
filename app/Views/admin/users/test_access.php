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
                                <p class="text-muted small mb-0 fw-medium">Grant or revoke student access to specific unit tests and mock exams.</p>
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
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php
                        // Safety fallbacks — prevents "Undefined variable" if controller failed
                        $users     = $users     ?? [];
                        $mockTests = $mockTests ?? [];
                        $unitTests = $unitTests ?? [];
                    ?>

                    <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-premium">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 28%;">Student Information</th>
                                        <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 30%;">
                                            <i class="bi bi-list-check text-success me-1"></i> Granted Unit Tests
                                        </th>
                                        <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 27%;">
                                            <i class="bi bi-file-earmark-check text-primary me-1"></i> Granted Mock Tests
                                        </th>
                                        <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <?php foreach($users as $user): $user['access'] = $user['access'] ?? []; ?>
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

                                            <!-- Granted Unit Tests -->
                                            <td class="py-4">
                                                <?php
                                                    $allowedUnitIds = !empty($user['access']['allowed_unit_tests']) ? explode(',', $user['access']['allowed_unit_tests']) : [];
                                                    if(empty($allowedUnitIds)):
                                                ?>
                                                    <span class="text-muted small fw-medium">No tests assigned</span>
                                                <?php else: ?>
                                                    <div class="d-flex flex-wrap gap-1">
                                                        <?php foreach($unitTests as $ut):
                                                                if(in_array((string)$ut['id'], $allowedUnitIds)): ?>
                                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 extra-small fw-black border border-success border-opacity-25">
                                                                <?= esc($ut['test_name']) ?>
                                                            </span>
                                                        <?php endif; endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Granted Mock Tests -->
                                            <td class="py-4">
                                                <?php
                                                    $allowedMockIds = !empty($user['access']['allowed_mock_tests']) ? explode(',', $user['access']['allowed_mock_tests']) : [];
                                                    if(empty($allowedMockIds)):
                                                ?>
                                                    <span class="text-muted small fw-medium">No tests assigned</span>
                                                <?php else: ?>
                                                    <div class="d-flex flex-wrap gap-1">
                                                        <?php foreach($mockTests as $mt):
                                                                if(in_array((string)$mt['id'], $allowedMockIds)): ?>
                                                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 extra-small fw-black border border-primary border-opacity-25">
                                                                <?= esc($mt['title']) ?>
                                                            </span>
                                                        <?php endif; endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <td class="pe-5 py-4 text-end">
                                                <button class="btn btn-primary rounded-pill px-4 extra-small fw-black hover-lift"
                                                        onclick='openAccessModal(<?= json_encode($user) ?>)'>
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
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
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

                    <div class="row g-5">

                        <!-- ====== UNIT TESTS SECTION ====== -->
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3">
                                    <i class="bi bi-list-check text-success fs-5"></i>
                                </div>
                                <div>
                                    <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-0 d-block">Unit Tests</label>
                                    <span class="extra-small text-muted">Select unit tests to grant access</span>
                                </div>
                            </div>

                            <?php if(empty($unitTests)): ?>
                                <div class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-2 opacity-50"></i>
                                    <p class="small mt-2 mb-0">No active unit tests found</p>
                                </div>
                            <?php else: ?>
                                <div class="row g-2" id="unit-tests-list">
                                    <?php foreach($unitTests as $ut): ?>
                                        <div class="col-12">
                                            <div class="card border-light bg-light rounded-4 p-3 hover-lift transition-all cursor-pointer access-card access-card-unit"
                                                 onclick="toggleCheckbox('unit_<?= $ut['id'] ?>')">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input unit-checkbox" type="checkbox"
                                                               name="allowed_unit_tests[]"
                                                               value="<?= $ut['id'] ?>"
                                                               id="unit_<?= $ut['id'] ?>"
                                                               onclick="event.stopPropagation()">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="fw-black text-dark mb-0 small"><?= esc($ut['test_name']) ?></h6>
                                                        <p class="extra-small text-muted mb-0 fw-bold">Unit Test &nbsp;·&nbsp; Practice Mode</p>
                                                    </div>
                                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2 py-1 extra-small fw-black">UNIT</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- ====== MOCK TESTS SECTION ====== -->
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                                    <i class="bi bi-file-earmark-check text-primary fs-5"></i>
                                </div>
                                <div>
                                    <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1 mb-0 d-block">Mock Exams</label>
                                    <span class="extra-small text-muted">Select mock tests to grant access</span>
                                </div>
                            </div>

                            <?php if(empty($mockTests)): ?>
                                <div class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-2 opacity-50"></i>
                                    <p class="small mt-2 mb-0">No active mock tests found</p>
                                </div>
                            <?php else: ?>
                                <div class="row g-2" id="mock-tests-list">
                                    <?php foreach($mockTests as $mt): ?>
                                        <div class="col-12">
                                            <div class="card border-light bg-light rounded-4 p-3 hover-lift transition-all cursor-pointer access-card access-card-mock"
                                                 onclick="toggleCheckbox('test_<?= $mt['id'] ?>')">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input mock-checkbox" type="checkbox"
                                                               name="allowed_mock_tests[]"
                                                               value="<?= $mt['id'] ?>"
                                                               id="test_<?= $mt['id'] ?>"
                                                               onclick="event.stopPropagation()">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="fw-black text-dark mb-0 small"><?= esc($mt['title']) ?></h6>
                                                        <p class="extra-small text-muted mb-0 fw-bold"><?= $mt['duration_minutes'] ?> Mins &nbsp;·&nbsp; Full Length</p>
                                                    </div>
                                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 rounded-pill px-2 py-1 extra-small fw-black">MOCK</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div><!-- /row -->

                    <div class="pt-5 border-top mt-4">
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-outline-secondary rounded-pill py-3 px-5 fw-black" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-dark rounded-pill py-3 px-5 shadow-lg fw-black flex-grow-1 hover-lift">
                                UPDATE PERMISSIONS <i class="bi bi-check-all ms-2"></i>
                            </button>
                        </div>
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
        document.getElementById('modal-user-name').textContent = (user.full_name || user.name || 'Student').toUpperCase();

        // Reset all checkboxes
        document.querySelectorAll('input[name="allowed_mock_tests[]"]').forEach(cb => cb.checked = false);
        document.querySelectorAll('input[name="allowed_unit_tests[]"]').forEach(cb => cb.checked = false);

        // Pre-check assigned mock tests
        if (user.access && user.access.allowed_mock_tests) {
            user.access.allowed_mock_tests.split(',').forEach(id => {
                const cb = document.getElementById('test_' + id.trim());
                if (cb) cb.checked = true;
            });
        }

        // Pre-check assigned unit tests
        if (user.access && user.access.allowed_unit_tests) {
            user.access.allowed_unit_tests.split(',').forEach(id => {
                const cb = document.getElementById('unit_' + id.trim());
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

    /* Access card states */
    .access-card { border: 2px solid transparent !important; transition: all 0.2s ease; }
    .access-card-unit:has(input:checked)  { border-color: #198754 !important; background-color: rgba(25, 135, 84, 0.06) !important; }
    .access-card-mock:has(input:checked)  { border-color: #0d6efd !important; background-color: rgba(13, 110, 253, 0.06) !important; }

    /* Table overrides */
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
