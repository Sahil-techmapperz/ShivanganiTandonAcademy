<?= view('student_templates/upper_template') ?>

<div class="exam-player bg-light min-vh-100 pb-5">
    <!-- Exam Header -->
    <header class="bg-white border-bottom sticky-top shadow-sm py-3">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-0 text-dark"><?= $test['title'] ?? $test['test_name'] ?></h5>
                    <div class="small text-muted d-flex align-items-center mt-1">
                        <span class="me-3"><i class="bi bi-person me-1"></i> <?= session()->get('full_name') ?></span>
                        <span><i class="bi bi-list-ol me-1"></i> <span id="question-counter">1</span> of <?= count($questions) ?></span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <div class="d-inline-flex align-items-center bg-dark text-white px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-clock-history me-2 fs-5"></i>
                        <span id="exam-timer" class="fw-black fs-5">00:00:00</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4 mt-5">
        <div class="row g-4 justify-content-center">
            <!-- Left: Sidebar / Question Nav -->
            <div class="col-xl-3 order-2 order-xl-1">
                <div class="card border-0 rounded-5 shadow-sm bg-white p-4">
                    <h6 class="fw-black text-muted extra-small text-uppercase letter-spacing-1 mb-4">Exam Progress</h6>
                    <div class="question-nav d-grid gap-2" style="grid-template-columns: repeat(5, 1fr);">
                        <?php foreach($questions as $idx => $q): ?>
                            <button class="btn btn-sm btn-light rounded-4 fw-bold p-2 q-nav-btn" data-q="<?= $idx ?>" id="nav-q-<?= $idx ?>">
                                <?= $idx + 1 ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-danger w-100 rounded-pill py-3 fw-black shadow-sm" onclick="finishExam()">
                            FINISH EXAM <i class="bi bi-check-all ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Middle: Question Display -->
            <div class="col-xl-7 order-1 order-xl-2">
                <form id="exam-form" action="<?= base_url('student/submit-test') ?>" method="POST">
                    <input type="hidden" name="test_type" value="<?= $type ?>">
                    <input type="hidden" name="test_id" value="<?= $id ?>">

                    <div id="questions-container">
                        <?php foreach($questions as $idx => $q): ?>
                            <div class="question-card fade-in" id="question-<?= $idx ?>" style="<?= $idx == 0 ? '' : 'display:none;' ?>">
                                <div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden">
                                    <div class="card-body p-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <span class="badge bg-primary rounded-pill px-4 py-2 fw-black extra-small me-3">QUESTION <?= $idx + 1 ?></span>
                                            <div class="vr opacity-25" style="height: 20px;"></div>
                                        </div>
                                        
                                        <h4 class="fw-bold text-dark mb-5 line-height-base"><?= $q['question_text'] ?></h4>
                                        
                                        <?php 
                                            $options = json_decode($q['options'], true);
                                            foreach($options as $optIdx => $option):
                                        ?>
                                            <div class="option-container mb-3">
                                                <input type="radio" name="answers[<?= $q['id'] ?>]" id="q_<?= $q['id'] ?>_opt_<?= $optIdx ?>" value="<?= $optIdx ?>" class="btn-check" onchange="markAsAnswered(<?= $idx ?>)">
                                                <label class="btn btn-outline-light text-start p-4 w-100 rounded-4 border-2 d-flex align-items-center transition-all" for="q_<?= $q['id'] ?>_opt_<?= $optIdx ?>">
                                                    <span class="option-letter rounded-circle bg-light d-flex align-items-center justify-content-center fw-black me-3 text-muted border" style="width: 35px; height: 35px; flex-shrink: 0;">
                                                        <?= chr(65 + $optIdx) ?>
                                                    </span>
                                                    <span class="fw-medium fs-5"><?= $option ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="card-footer bg-light border-0 p-4 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold" <?= $idx == 0 ? 'disabled' : '' ?> onclick="showQuestion(<?= $idx - 1 ?>)">
                                            <i class="bi bi-arrow-left me-2"></i> Previous
                                        </button>
                                        <?php if($idx == count($questions) - 1): ?>
                                            <button type="button" class="btn btn-success rounded-pill px-4 py-2 fw-bold" onclick="finishExam()">
                                                Finish <i class="bi bi-check-circle ms-2"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold" onclick="showQuestion(<?= $idx + 1 ?>)">
                                                Next <i class="bi bi-arrow-right ms-2"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    body { font-family: 'Outfit', sans-serif; }
    .fw-black { font-weight: 900; }
    .extra-small { font-size: 0.7rem; }
    .letter-spacing-1 { letter-spacing: 1.5px; }
    .line-height-base { line-height: 1.6; }
    .rounded-5 { border-radius: 2rem !important; }
    .rounded-4 { border-radius: 1.25rem !important; }
    .transition-all { transition: all 0.2s ease; }
    
    .option-container .btn-outline-light { border-color: #f1f5f9; background-color: #f8fafc; color: #334155; }
    .option-container .btn-outline-light:hover { border-color: #cbd5e1; transform: translateX(5px); }
    .option-container .btn-check:checked + .btn-outline-light { border-color: #6366f1; background-color: #eef2ff; color: #4338ca; }
    .option-container .btn-check:checked + .btn-outline-light .option-letter { background-color: #6366f1 !important; color: white !important; border-color: #6366f1 !important; }

    .q-nav-btn.active { background-color: #6366f1 !important; color: white !important; }
    .q-nav-btn.answered { background-color: #dcfce7 !important; color: #15803d !important; border-color: #bbf7d0 !important; }

    .fade-in { animation: fadeIn 0.3s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<script>
    let currentQ = 0;
    const totalQ = <?= count($questions) ?>;
    let timeRemaining = <?= ($test['duration_minutes'] ?? 60) * 60 ?>;

    document.addEventListener('DOMContentLoaded', function() {
        startTimer();
        updateNav(0);
    });

    function showQuestion(idx) {
        if(idx < 0 || idx >= totalQ) return;
        
        document.getElementById('question-' + currentQ).style.display = 'none';
        document.getElementById('question-' + idx).style.display = 'block';
        
        currentQ = idx;
        document.getElementById('question-counter').textContent = currentQ + 1;
        updateNav(idx);
    }

    function updateNav(idx) {
        document.querySelectorAll('.q-nav-btn').forEach(btn => btn.classList.remove('active'));
        document.getElementById('nav-q-' + idx).classList.add('active');
    }

    function markAsAnswered(idx) {
        document.getElementById('nav-q-' + idx).classList.add('answered');
    }

    function startTimer() {
        const timerEl = document.getElementById('exam-timer');
        const interval = setInterval(() => {
            timeRemaining--;
            if(timeRemaining <= 0) {
                clearInterval(interval);
                timerEl.textContent = "00:00:00";
                finishExam(true);
                return;
            }

            const h = Math.floor(timeRemaining / 3600);
            const m = Math.floor((timeRemaining % 3600) / 60);
            const s = timeRemaining % 60;
            timerEl.textContent = 
                (h < 10 ? '0' : '') + h + ":" + 
                (m < 10 ? '0' : '') + m + ":" + 
                (s < 10 ? '0' : '') + s;

            if(timeRemaining < 300) { // Red alert for last 5 mins
                timerEl.parentElement.classList.remove('bg-dark');
                timerEl.parentElement.classList.add('bg-danger');
            }
        }, 1000);
    }

    function finishExam(auto = false) {
        if(!auto && !confirm('Are you sure you want to submit your exam?')) return;
        document.getElementById('exam-form').submit();
    }
</script>

<?= view('student_templates/lower_template') ?>
