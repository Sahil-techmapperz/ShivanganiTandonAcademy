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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/mock-tests') ?>" class="text-primary text-decoration-none opacity-75">MOCK TESTS</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">QUESTIONS</li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight"><?= $test['title'] ?></h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= count($questions) ?> QUESTIONS</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Manage the question bank for this mock exam.</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary rounded-pill px-5 py-3 fw-black shadow-lg hover-lift" onclick="openQuestionModal()">
                                <i class="bi bi-plus-circle-fill me-2"></i> ADD QUESTION
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

                    <div class="row g-4">
                        <?php if(empty($questions)): ?>
                            <div class="col-12 text-center py-5">
                                <div class="bg-white rounded-5 p-5 shadow-sm">
                                    <i class="bi bi-patch-question display-1 text-muted opacity-25"></i>
                                    <h3 class="mt-4 fw-black">No Questions Yet</h3>
                                    <p class="text-muted">Start building your exam by adding your first question.</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach($questions as $index => $q): ?>
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white hover-row transition-all">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-primary rounded-pill px-3 py-1 extra-small fw-black me-2">Q<?= $index + 1 ?></span>
                                                    <?php if($q['is_active'] != 1): ?>
                                                        <span class="badge bg-secondary rounded-pill px-3 py-1 extra-small fw-black">INACTIVE</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold" onclick='editQuestion(<?= json_encode($q) ?>)'>
                                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-light text-danger rounded-pill px-3 fw-bold">
                                                        <i class="bi bi-trash me-1"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                            <h5 class="fw-bold text-dark mb-4"><?= $q['question_text'] ?></h5>
                                            
                                            <div class="row g-3">
                                                <?php 
                                                    $options = json_decode($q['options'], true);
                                                    foreach($options as $optIndex => $option):
                                                ?>
                                                    <div class="col-md-6">
                                                        <div class="p-3 rounded-4 border <?= ($optIndex == $q['correct_option']) ? 'bg-success bg-opacity-10 border-success' : 'bg-light border-light' ?> d-flex align-items-center">
                                                            <div class="avatar-xs rounded-circle me-3 d-flex align-items-center justify-content-center fw-bold <?= ($optIndex == $q['correct_option']) ? 'bg-success text-white' : 'bg-white text-muted border' ?>" style="width: 25px; height: 25px; font-size: 10px;">
                                                                <?= chr(65 + $optIndex) ?>
                                                            </div>
                                                            <span class="small fw-medium <?= ($optIndex == $q['correct_option']) ? 'text-success' : 'text-dark' ?>"><?= $option ?></span>
                                                            <?php if($optIndex == $q['correct_option']): ?>
                                                                <i class="bi bi-check-circle-fill text-success ms-auto"></i>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>

                                            <?php if($q['explanation']): ?>
                                                <div class="mt-4 p-3 bg-light rounded-4 border-start border-primary border-4">
                                                    <div class="extra-small fw-black text-primary text-uppercase mb-1"><i class="bi bi-info-circle-fill me-1"></i> Explanation</div>
                                                    <p class="small text-muted mb-0"><?= $q['explanation'] ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Question Modal -->
<div class="modal fade" id="questionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-primary py-4 px-5 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(to right, #5751E1, #3f38c2) !important;">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="bi bi-patch-question fs-4"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-black mb-0 letter-spacing-tight">QUESTION BUILDER</h4>
                        <div class="extra-small fw-bold opacity-75 letter-spacing-1 text-uppercase">Assessment Editor</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-5 bg-white">
                <form action="<?= base_url('admin/mock-test/question/save') ?>" method="POST">
                    <input type="hidden" name="id" id="modal-id">
                    <input type="hidden" name="mock_test_id" value="<?= $test['id'] ?>">
                    
                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Question Text</label>
                        <textarea name="question_text" id="modal-question-text" class="form-control border-0 bg-light rounded-4 px-4 py-3 fw-bold" rows="3" placeholder="Enter your question here..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Options (Fill at least 2)</label>
                        <div class="row g-3">
                            <?php for($i=0; $i<4; $i++): ?>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-white fw-black text-primary"><?= chr(65 + $i) ?></span>
                                        <input type="text" name="options[]" class="form-control border-0 bg-light rounded-4 px-3 fw-medium modal-option" placeholder="Option <?= $i+1 ?>" <?= $i < 2 ? 'required' : '' ?>>
                                        <div class="input-group-text border-0 bg-white">
                                            <input class="form-check-input" type="radio" name="correct_option" value="<?= $i ?>" <?= $i==0 ? 'checked' : '' ?> title="Mark as correct">
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Explanation (Optional)</label>
                        <textarea name="explanation" id="modal-explanation" class="form-control border-0 bg-light rounded-4 px-4 py-3 fw-medium" rows="2" placeholder="Explain the correct answer..."></textarea>
                    </div>

                    <div class="mb-5">
                        <label class="form-label extra-small fw-black text-muted text-uppercase letter-spacing-1">Status</label>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" id="modal-is-active" value="1" checked>
                            <label class="form-check-label fw-bold" for="modal-is-active">Active in this Test</label>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 shadow-lg fw-black w-100 hover-lift">
                            SAVE QUESTION <i class="bi bi-save-fill ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let questionModal;

    function getModal() {
        if (!questionModal) {
            questionModal = new bootstrap.Modal(document.getElementById('questionModal'));
        }
        return questionModal;
    }

    function openQuestionModal() {
        document.getElementById('modal-id').value = '';
        document.getElementById('modal-question-text').value = '';
        document.getElementById('modal-explanation').value = '';
        document.getElementById('modal-is-active').checked = true;
        
        const optionInputs = document.querySelectorAll('.modal-option');
        optionInputs.forEach(input => input.value = '');
        
        const radios = document.querySelectorAll('input[name="correct_option"]');
        radios[0].checked = true;

        getModal().show();
    }

    function editQuestion(data) {
        document.getElementById('modal-id').value = data.id;
        document.getElementById('modal-question-text').value = data.question_text;
        document.getElementById('modal-explanation').value = data.explanation || '';
        document.getElementById('modal-is-active').checked = data.is_active == 1;

        const options = JSON.parse(data.options);
        const optionInputs = document.querySelectorAll('.modal-option');
        optionInputs.forEach((input, index) => {
            input.value = options[index] || '';
        });

        const radios = document.querySelectorAll('input[name="correct_option"]');
        radios.forEach((radio, index) => {
            radio.checked = (index == data.correct_option);
        });

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
    .card { border: none !important; }
    .rounded-4 { border-radius: 1.5rem !important; }
    .rounded-5 { border-radius: 2rem !important; }
    .shadow-sm { box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important; }
    .hover-row:hover { background-color: rgba(87, 81, 225, 0.02); }
    .avatar-xs { background-color: #eee; }
    .input-group-text { background: transparent; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>
