<?= view('student_templates/upper_template') ?>

<div class="exam-player bg-light min-vh-100 pb-5">
    <!-- Exam Header -->
    <header class="bg-white border-bottom sticky-top shadow-sm py-3">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-0 text-dark"><?= $test['title'] ?? $test['test_name'] ?> - Review</h5>
                    <div class="small text-muted d-flex align-items-center mt-1">
                        <span class="me-3"><i class="bi bi-person me-1"></i> <?= session()->get('full_name') ?></span>
                        <span><i class="bi bi-list-ol me-1"></i> <?= $totalCount ?> Questions</span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <div class="d-inline-flex align-items-center bg-dark text-white px-4 py-2 rounded-pill shadow-sm">
                        <span class="fw-black fs-5">Score: <?= $correctCount ?> / <?= $totalCount ?></span>
                    </div>
                    <a href="<?= base_url('student/results') ?>" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-bold ms-3">
                        Back to Results
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid px-4 mt-5">
        <div class="row g-4 justify-content-center">
            
            <div class="col-xl-8">
                <?php foreach($questions as $idx => $q): ?>
                    <div class="question-card mb-4" id="question-<?= $idx ?>">
                        <div class="card border-0 rounded-5 shadow-sm bg-white overflow-hidden">
                            <div class="card-body p-5">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="badge bg-primary rounded-pill px-4 py-2 fw-black extra-small me-3">QUESTION <?= $idx + 1 ?></span>
                                    <div class="vr opacity-25" style="height: 20px;"></div>
                                </div>
                                
                                <h4 class="fw-bold text-dark mb-5 line-height-base"><?= $q['question_text'] ?></h4>
                                
                                <?php 
                                    $options = json_decode($q['options'], true);
                                    $correctOption = $q['correct_option'];
                                    $selectedOption = $user_answers[$q['id']] ?? null;
                                    
                                    foreach($options as $optIdx => $option):
                                        $isCorrect = ($optIdx == $correctOption);
                                        $isSelected = ($optIdx == $selectedOption);
                                        
                                        $btnClass = 'btn-outline-light';
                                        $icon = '';
                                        if ($isCorrect) {
                                            $btnClass = 'btn-success bg-success text-white border-success';
                                            $icon = '<i class="bi bi-check-circle-fill text-white ms-auto fs-4"></i>';
                                        } elseif ($isSelected && !$isCorrect) {
                                            $btnClass = 'btn-danger bg-danger text-white border-danger';
                                            $icon = '<i class="bi bi-x-circle-fill text-white ms-auto fs-4"></i>';
                                        }
                                ?>
                                    <div class="option-container mb-3">
                                        <div class="btn <?= $btnClass ?> text-start p-4 w-100 rounded-4 border-2 d-flex align-items-center transition-all" style="<?= $isCorrect || ($isSelected && !$isCorrect) ? 'opacity: 1;' : 'opacity: 0.6;' ?>">
                                            <span class="option-letter rounded-circle bg-light d-flex align-items-center justify-content-center fw-black me-3 text-dark border" style="width: 35px; height: 35px; flex-shrink: 0;">
                                                <?= chr(65 + $optIdx) ?>
                                            </span>
                                            <span class="fw-medium fs-5"><?= $option ?></span>
                                            <?= $icon ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    body { font-family: 'Outfit', sans-serif; }
    .fw-black { font-weight: 900; }
    .extra-small { font-size: 0.7rem; }
    .line-height-base { line-height: 1.6; }
    .rounded-5 { border-radius: 2rem !important; }
    .rounded-4 { border-radius: 1.25rem !important; }
    
    .option-container .btn-outline-light { border-color: #f1f5f9; background-color: #f8fafc; color: #334155; }
</style>

<?= view('student_templates/lower_template') ?>
