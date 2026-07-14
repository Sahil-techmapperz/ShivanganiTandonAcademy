<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <h3 class="fw-bold">Exam Results & Scores</h3>
        </div>
    </div>

    <div class="app-content pb-5">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white border-0 pt-4 pb-2">
                            <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-journal-text text-primary me-2"></i> Detailed Scores</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Subject / Module</th>
                                            <th>Exam Date</th>
                                            <th>Score</th>
                                            <th class="pe-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($results as $result): ?>
                                        <tr>
                                            <td class="ps-4 fw-bold text-dark"><?= $result['subject'] ?></td>
                                            <td><?= date('d M, Y', strtotime($result['exam_date'])) ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <?php 
                                                        $earned = $result['score'];
                                                        $total = $result['total_points'] > 0 ? $result['total_points'] : ($earned ?? 0);
                                                        $perc = $total > 0 ? round(($earned / $total) * 100) : 0;
                                                    ?>
                                                    <span class="me-2 fw-black text-primary"><?= !is_null($earned) ? $earned.' / '.$total.' <span class="small opacity-50">PTS</span>' : '---' ?></span>
                                                    <div class="progress flex-grow-1" style="height: 5px; max-width: 100px; border-radius: 10px; background: #e9ecef;">
                                                        <div class="progress-bar <?= !is_null($earned) && $earned >= $result['passing_score'] ? 'bg-success' : 'bg-warning' ?>" role="progressbar" style="width: <?= $perc ?>%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pe-4">
                                                <?php if(is_null($earned)): ?>
                                                    <span class="badge rounded-pill bg-light text-muted border py-2 px-3 extra-small fw-bold letter-spacing-1">
                                                        <i class="bi bi-hourglass-split me-1"></i> PENDING 
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill py-2 px-3 extra-small fw-bold letter-spacing-1 <?= $earned >= $result['passing_score'] ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' ?> me-2">
                                                        <?= $earned >= $result['passing_score'] ? 'PASSED' : 'NEEDS REVIEW' ?>
                                                    </span>
                                                    
                                                    <?php if(!empty($result['test_id']) && !empty($result['test_type'])): ?>
                                                    <a href="<?= base_url('student/review-test/'.$result['test_type'].'/'.$result['test_id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill fw-bold">
                                                        Review <i class="bi bi-search ms-1"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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
    </div>
</main>



<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
