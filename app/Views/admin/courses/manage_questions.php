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
                                <ol class="breadcrumb mb-2 small fw-bold letter-spacing-1">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/course/lessons/'.$course['id']) ?>" class="text-primary text-decoration-none opacity-75">ACADEMY CURRICULUM</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page"><?= strtoupper($lesson['title']) ?></li>
                                </ol>
                            </nav>
                            <h1 class="fw-black m-0 text-dark display-5 letter-spacing-tight"><?= $lesson['type'] === 'quiz' ? 'Quiz Design' : 'Exam Construction' ?></h1>
                            <div class="d-flex align-items-center mt-3">
                                <span class="badge bg-primary rounded-pill px-4 py-2 me-3 extra-small fw-black letter-spacing-1 shadow-sm"><?= strtoupper($lesson['type']) ?> MODULE</span>
                                <div class="vr me-3 opacity-25" style="height: 20px;"></div>
                                <p class="text-muted small mb-0 fw-medium">Constructing assessment for: <span class="text-dark fw-bold"><?= $lesson['title'] ?></span></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <?php if($lesson['type'] === 'quiz'): ?>
                                <button class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fw-black hover-lift" data-bs-toggle="modal" data-bs-target="#questionModal">
                                    <i class="bi bi-plus-lg me-2"></i> ADD NEW QUESTION
                                </button>
                            <?php elseif(empty($questions)): ?>
                                <button class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fw-black hover-lift" data-bs-toggle="modal" data-bs-target="#questionModal">
                                    <i class="bi bi-gear-fill me-2"></i> INITIALIZE EXAM
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-lg rounded-4 mb-5 p-4 animate__animated animate__fadeIn">
                    <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12 px-xl-5">
                    <?php if(empty($questions)): ?>
                        <div class="card border-0 shadow-sm text-center py-5 rounded-5 mt-4">
                            <div class="card-body py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="bi <?= $lesson['type'] === 'quiz' ? 'bi-patch-question' : 'bi-file-earmark-text' ?> display-4 text-muted opacity-25"></i>
                                </div>
                                <h4 class="fw-bold text-dark"><?= $lesson['type'] === 'quiz' ? 'No Questions Linked' : 'Exam Not Configured' ?></h4>
                                <p class="text-muted mb-4 px-5 mx-auto" style="max-width: 500px;">
                                    <?= $lesson['type'] === 'quiz' ? 'Add questions to this assessment to evaluate student progress.' : 'Set up the instructions and attachment for this exam.' ?>
                                </p>
                                <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#questionModal">
                                    <?= $lesson['type'] === 'quiz' ? 'Create First Question' : 'Set Instructions' ?>
                                </button>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row g-4">
                            <?php if($lesson['type'] === 'exam'): ?>
                                <?php $q = $questions[0]; ?>
                                <div class="col-12">
                                    <div class="card border-0 shadow-lg rounded-5 overflow-hidden exam-config-card">
                                        <div class="row g-0">
                                            <div class="col-lg-4 bg-primary p-5 text-white d-flex flex-column justify-content-center">
                                                <div class="mb-4">
                                                    <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                                        <i class="bi bi-shield-lock-fill fs-3"></i>
                                                    </div>
                                                    <h3 class="fw-black mb-1">EXAM LOGISTICS</h3>
                                                    <p class="small text-white text-opacity-75">Configuration & Grading Parameters</p>
                                                </div>
                                                
                                                <div class="bg-white bg-opacity-10 rounded-4 p-4 mb-4 border border-white border-opacity-10">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i class="bi bi-trophy-fill text-warning me-3 fs-4"></i>
                                                        <div>
                                                            <div class="extra-small fw-black text-uppercase letter-spacing-1 opacity-75">Total Valuation</div>
                                                            <div class="fw-black h4 mb-0"><?= $q['points'] ?> <span class="small fw-bold opacity-50">PTS</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-file-earmark-check-fill text-info me-3 fs-4"></i>
                                                        <div>
                                                            <div class="extra-small fw-black text-uppercase letter-spacing-1 opacity-75">Submission Type</div>
                                                            <div class="fw-black h4 mb-0 uppercase">FILE UPLOAD</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="btn btn-white btn-lg rounded-pill px-4 fw-black w-100 shadow-sm mt-auto" onclick="editQuestion(<?= htmlspecialchars(json_encode($q)) ?>)">
                                                    <i class="bi bi-pencil-square me-2"></i> UPDATE DETAILS
                                                </button>
                                            </div>
                                            <div class="col-lg-8 bg-white p-5">
                                                <div class="instructions-header mb-4 d-flex justify-content-between align-items-center">
                                                    <label class="fw-black text-muted extra-small letter-spacing-1 text-uppercase">EXAM INSTRUCTIONS & SCOPE</label>
                                                    <span class="badge bg-light text-primary rounded-pill px-3 py-2 extra-small fw-bold">ACTIVE MODULE</span>
                                                </div>
                                                <div class="p-5 rounded-5 border bg-light bg-opacity-50 position-relative mb-4" style="min-height: 250px;">
                                                    <i class="bi bi-quote fs-1 text-primary opacity-10 position-absolute" style="top: 20px; left: 20px;"></i>
                                                    <p class="mb-0 text-dark fs-5 fw-medium ps-4 pt-2" style="line-height: 1.8; color: #4a5568 !important;">
                                                        <?= nl2br($q['question_text']) ?>
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center p-3 rounded-4 bg-info bg-opacity-10 border border-info border-opacity-10">
                                                    <i class="bi bi-info-circle-fill text-info me-3 fs-4"></i>
                                                    <p class="small text-dark mb-0 fw-medium">Students will see these instructions before they are prompted to upload their solution papers.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                    <div class="col-12 mb-4 animate__animated animate__fadeInUp" style="animation-delay: <?= $index * 0.1 ?>s">
                                        <div class="card border-0 shadow-sm rounded-5 hover-shadow transition-all overflow-hidden bg-white">
                                            <div class="card-body p-5">
                                                <div class="d-flex justify-content-between align-items-start mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-primary text-white rounded-5 d-flex align-items-center justify-content-center me-4 fw-black shadow-lg" style="width: 55px; height: 55px; font-size: 1.2rem;">
                                                            <?= $index + 1 ?>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-items-center mb-1">
                                                                <span class="badge bg-secondary rounded-pill px-3 py-1 extra-small fw-black letter-spacing-1 me-2">
                                                                    <?= strtoupper($q['question_type']) ?>
                                                                </span>
                                                                <span class="text-muted extra-small fw-bold letter-spacing-1"><i class="bi bi-trophy me-1 text-warning"></i>WORTH <?= $q['points'] ?> POINTS</span>
                                                            </div>
                                                            <h4 class="fw-black text-dark mb-0"><?= $q['question_text'] ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-light rounded-circle shadow-sm hover-lift" data-bs-toggle="dropdown" style="width: 45px; height: 45px;">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 p-2">
                                                            <li><button class="dropdown-item py-3 px-4 rounded-3 fw-bold text-dark" onclick="editQuestion(<?= htmlspecialchars(json_encode($q)) ?>)"><i class="bi bi-pencil-square me-3 text-primary"></i> Modify Content</button></li>
                                                            <li><hr class="dropdown-divider opacity-50 my-2"></li>
                                                            <li><a class="dropdown-item py-3 px-4 rounded-3 fw-black text-danger" href="<?= base_url('admin/question/delete/'.$q['id']) ?>" onclick="return confirm('Purge this question permanently?')"><i class="bi bi-trash3-fill me-3"></i> Purge Data</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <?php if($q['question_type'] === 'mcq' && !empty($q['options'])): ?>
                                                    <?php $options = json_decode($q['options']); ?>
                                                    <div class="row g-4 mt-2 ms-5 ps-2">
                                                        <?php foreach($options as $optIndex => $opt): ?>
                                                            <div class="col-md-6">
                                                                <div class="p-4 border rounded-5 d-flex align-items-center transition-all option-preview-card <?= $opt === $q['correct_option'] ? 'bg-success bg-opacity-10 border-success border-2 shadow-sm' : 'bg-light bg-opacity-50 border-transparent' ?>">
                                                                    <div class="bg-white rounded-circle me-3 border d-flex align-items-center justify-content-center shadow-sm fw-black letter-box <?= $opt === $q['correct_option'] ? 'text-success border-success' : 'text-muted' ?>" style="width: 35px; height: 35px; font-size: 0.8rem;"><?= chr(65 + $optIndex) ?></div>
                                                                    <div class="fw-bold fs-6 <?= $opt === $q['correct_option'] ? 'text-success' : 'text-dark opacity-75' ?>"><?= $opt ?></div>
                                                                    <?php if($opt === $q['correct_option']): ?>
                                                                        <div class="ms-auto bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 25px; height: 25px;">
                                                                            <i class="bi bi-check-lg" style="font-size: 0.7rem;"></i>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Question Modal -->
<div class="modal fade px-3" id="questionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="bg-primary py-4 px-4 text-white d-flex justify-content-between align-items-center">
                <h4 class="modal-title fw-black mb-0" id="qModalTitle"><?= $lesson['type'] === 'quiz' ? 'PROVISION QUESTION' : 'EXAM CONFIGURATION' ?></h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/question/save') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="q_id">
                <input type="hidden" name="lesson_id" value="<?= $lesson['id'] ?>">
                
                <div class="modal-body p-5">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1"><?= $lesson['type'] === 'quiz' ? 'QUESTION CONTENT' : 'EXAM INSTRUCTIONS' ?></label>
                            <textarea class="form-control form-control-lg rounded-4 bg-light border-0 px-4 py-3" name="question_text" id="q_text" rows="3" placeholder="<?= $lesson['type'] === 'quiz' ? 'Enter your question here...' : 'Outline the exam instructions, rules, and scope...' ?>" required></textarea>
                        </div>
                        <div class="col-md-6" id="type-section" <?= $lesson['type'] === 'exam' ? 'style="display:none;"' : '' ?>>
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">QUESTION TYPE</label>
                            <select class="form-select form-select-lg rounded-4 bg-light border-0 px-4" name="question_type" id="q_type" onchange="toggleOptions(this.value)" required>
                                <option value="mcq">Multiple Choice (MCQ)</option>
                                <option value="text">Open Text Response</option>
                            </select>
                        </div>
                        <div class="col-md-<?= $lesson['type'] === 'quiz' ? '6' : '12' ?>">
                            <label class="form-label mb-2 small fw-black text-muted letter-spacing-1">POINT VALUATION</label>
                            <input type="number" class="form-control form-control-lg rounded-4 bg-light border-0 px-4" name="points" id="q_points" value="<?= $lesson['type'] === 'quiz' ? '1' : '10' ?>" min="1" required>
                        </div>
                        <?php if($lesson['type'] === 'exam'): ?>
                            <input type="hidden" name="question_type" value="text">
                        <?php endif; ?>

                        <!-- MCQ Options -->
                        <div id="options-section" class="col-12" <?= $lesson['type'] === 'exam' ? 'style="display:none;"' : '' ?>>
                            <label class="form-label mb-3 small fw-black text-muted letter-spacing-1">OPTIONS & DESIGNATED ANSWER</label>
                            <div class="row g-3" id="options-container">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text bg-white border-0 py-0 pe-0">
                                            <input class="form-check-input mt-0" type="radio" name="temp_correct" value="0" id="corr_0" <?= $lesson['type'] === 'quiz' ? 'required' : '' ?>>
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light rounded-4 ms-2 px-3" name="options[]" placeholder="Option A" id="opt_0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text bg-white border-0 py-0 pe-0">
                                            <input class="form-check-input mt-0" type="radio" name="temp_correct" value="1" id="corr_1">
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light rounded-4 ms-2 px-3" name="options[]" placeholder="Option B" id="opt_1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text bg-white border-0 py-0 pe-0">
                                            <input class="form-check-input mt-0" type="radio" name="temp_correct" value="2" id="corr_2">
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light rounded-4 ms-2 px-3" name="options[]" placeholder="Option C" id="opt_2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text bg-white border-0 py-0 pe-0">
                                            <input class="form-check-input mt-0" type="radio" name="temp_correct" value="3" id="corr_3">
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light rounded-4 ms-2 px-3" name="options[]" placeholder="Option D" id="opt_3">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="correct_option" id="final_correct">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 p-4">
                    <button type="button" class="btn btn-white rounded-pill px-4 fw-bold" data-bs-dismiss="modal">DISCARD</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-black shadow-lg" onclick="syncCorrectAnswer()">FINALIZE QUESTION</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleOptions(type) {
    document.getElementById('options-section').style.display = (type === 'mcq') ? 'block' : 'none';
}

function syncCorrectAnswer() {
    const optionsSection = document.getElementById('options-section');
    if (optionsSection && optionsSection.style.display === 'none') {
        return; // Skip for exams
    }

    const radios = document.getElementsByName('temp_correct');
    const options = document.getElementsByName('options[]');
    let selectedValue = '';
    
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            selectedValue = options[i].value;
            break;
        }
    }
    document.getElementById('final_correct').value = selectedValue;
}

function editQuestion(q) {
    document.getElementById('qModalTitle').textContent = 'RECONFIGURE DETAILS';
    document.getElementById('q_id').value = q.id;
    document.getElementById('q_text').value = q.question_text;
    if(document.getElementById('q_type')) document.getElementById('q_type').value = q.question_type;
    document.getElementById('q_points').value = q.points;
    
    if(document.getElementById('options-section')) toggleOptions(q.question_type);
    
    if (q.question_type === 'mcq' && q.options) {
        const opts = JSON.parse(q.options);
        const radioGroup = document.getElementsByName('temp_correct');
        const optInputs = document.getElementsByName('options[]');
        
        for (let i = 0; i < 4; i++) {
            if (opts[i]) {
                optInputs[i].value = opts[i];
                if (opts[i] === q.correct_option) {
                    radioGroup[i].checked = true;
                }
            } else {
                optInputs[i].value = '';
                radioGroup[i].checked = false;
            }
        }
    }
    
    var modal = new bootstrap.Modal(document.getElementById('questionModal'));
    modal.show();
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
    .hover-lift:hover { transform: translateY(-5px); }
    
    .transition-all { transition: all 0.3s ease; }
    .card { border: none !important; }
    .shadow-lg { box-shadow: 0 20px 40px rgba(0,0,0,0.05) !important; }
    
    .exam-config-card { box-shadow: 0 30px 60px rgba(0,0,0,0.1) !important; border: 1px solid rgba(87, 81, 225, 0.1) !important; }
    
    .option-preview-card:hover {
        background-color: #f8f9fa !important;
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0,0,0,0.02);
    }
    
    .btn-white { background: #fff; color: #5751E1; border: none; }
    .btn-white:hover { background: #f8f9fa; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    
    .rounded-5 { border-radius: 2rem !important; }
    
    #q_text { line-height: 1.6; }
</style>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>

