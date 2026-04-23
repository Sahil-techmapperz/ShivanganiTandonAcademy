<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-5 border-bottom mb-4" style="background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1 text-uppercase">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-success text-decoration-none opacity-75">ASSESSMENT</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">UNIT TESTS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight">Unit Assessment Center</h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-success rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($unitTests) ?> TOTAL TESTS</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Manage unit-specific assessments and knowledge checks.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success rounded-pill px-5 py-3 fw-black shadow-lg hover-lift text-white" onclick="openUnitModal()">
                                <i class="bi bi-plus-circle-fill me-2"></i> CREATE UNIT TEST
                            </button>
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

                    <?php if(empty($unitTests)): ?>
                        <div class="card border-0 shadow-sm rounded-5 py-5 text-center bg-white">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi bi-list-check display-4 text-muted opacity-50"></i>
                                </div>
                                <h3 class="fw-black text-dark">No Unit Tests Found</h3>
                                <p class="text-muted fs-5">Create targeted unit assessments for your courses.</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-white">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-premium">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1" style="width: 35%;">Test Name</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 25%;">Module / Unit</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Questions</th>
                                            <th class="py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-center" style="width: 15%;">Status</th>
                                            <th class="pe-5 py-4 extra-small fw-black text-muted text-uppercase letter-spacing-1 text-end" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php foreach($unitTests as $test): ?>
                                            <tr class="transition-all hover-row">
                                                <td class="ps-5 py-4">
                                                    <div class="d-flex align-items-start">
                                                        <div class="bg-success bg-opacity-10 text-success rounded-4 d-flex align-items-center justify-content-center me-3 shadow-sm flex-shrink-0" style="width: 50px; height: 50px;">
                                                            <i class="bi bi-clipboard-check fs-5"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-black text-dark mb-1"><?= $test['test_name'] ?></h6>
                                                            <p class="text-muted small mb-0">Unit Assessment</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <div class="extra-small fw-black text-muted text-uppercase mb-1">M: <?= $test['module_id'] ?> | U: <?= $test['unit_id'] ?></div>
                                                </td>
                                                <td class="text-center py-4">
                                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-1 extra-small fw-black">Targeted</span>
                                                </td>
                                                <td class="text-center py-4">
                                                    <?php if($test['is_active'] == 1): ?>
                                                        <span class="badge bg-success rounded-pill px-3 py-2 extra-small fw-black letter-spacing-1 text-uppercase shadow-sm">ACTIVE</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary rounded-pill px-3 py-2 extra-small fw-black letter-spacing-1 text-uppercase shadow-sm">INACTIVE</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="pe-5 py-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <a href="<?= base_url('admin/unit-test/questions/'.$test['id']) ?>" class="btn btn-outline-info btn-sm rounded-circle p-2 hover-lift border-0 bg-light" title="Manage Questions">
                                                            <i class="bi bi-list-ol"></i>
                                                        </a>
                                                        <button class="btn btn-outline-primary btn-sm rounded-circle p-2 hover-lift border-0 bg-light" onclick="editUnit(<?= htmlspecialchars(json_encode($test)) ?>)" title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger btn-sm rounded-circle p-2 hover-lift border-0 bg-light" title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
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

<!-- Unit Test Modal -->
<div class="modal fade" id="unitModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-success py-4 px-5 text-white d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="bi bi-list-check fs-4"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-black mb-0 letter-spacing-tight">UNIT TEST CONFIG</h4>
                        <div class="extra-small fw-bold opacity-75 letter-spacing-1 text-uppercase">Module Assessment</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-5 bg-white">
                <form action="<?= base_url('admin/unit-test/save') ?>" method="POST">
                    <input type="hidden" name="id" id="modal-id">
                    
                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Test Name</label>
                        <input type="text" name="test_name" id="modal-test-name" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fw-bold" placeholder="e.g. Unit 1.1 Knowledge Check" required>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Module ID</label>
                            <input type="number" name="module_id" id="modal-module-id" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fw-bold" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Unit ID</label>
                            <input type="number" name="unit_id" id="modal-unit-id" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fw-bold" required>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Visibility Status</label>
                        <div class="d-flex gap-4 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="active-yes" value="1" checked>
                                <label class="form-check-label fw-bold" for="active-yes">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="active-no" value="0">
                                <label class="form-check-label fw-bold" for="active-no">Inactive</label>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="btn btn-success rounded-pill py-3 px-5 shadow-lg fw-black w-100 hover-lift text-white">
                            SAVE UNIT TEST <i class="bi bi-save-fill ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let unitModal;

    function getModal() {
        if (!unitModal) {
            unitModal = new bootstrap.Modal(document.getElementById('unitModal'));
        }
        return unitModal;
    }

    function openUnitModal() {
        document.getElementById('modal-id').value = '';
        document.getElementById('modal-test-name').value = '';
        document.getElementById('modal-module-id').value = '';
        document.getElementById('modal-unit-id').value = '';
        document.getElementById('active-yes').checked = true;
        getModal().show();
    }

    function editUnit(data) {
        document.getElementById('modal-id').value = data.id;
        document.getElementById('modal-test-name').value = data.test_name;
        document.getElementById('modal-module-id').value = data.module_id;
        document.getElementById('modal-unit-id').value = data.unit_id;
        if(data.is_active == 1) document.getElementById('active-yes').checked = true;
        else document.getElementById('active-no').checked = true;
        getModal().show();
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
    .hover-row:hover { background-color: rgba(87, 81, 225, 0.02); }
    
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
    .card { border: none !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
