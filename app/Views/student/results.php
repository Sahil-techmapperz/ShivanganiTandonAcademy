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
            <!-- Score Chart -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            <span class="fs-5">Performance Trend</span>
                        </div>
                        <div class="card-body">
                            <div id="performance-chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            <span class="fs-5">Detailed Scores</span>
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
                                                    <span class="badge rounded-pill py-2 px-3 extra-small fw-bold letter-spacing-1 <?= $earned >= $result['passing_score'] ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' ?>">
                                                        <?= $earned >= $result['passing_score'] ? 'PASSED' : 'NEEDS REVIEW' ?>
                                                    </span>
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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php 
            $filteredResults = array_filter($results, fn($r) => !is_null($r['score']));
            $reversed = array_reverse($filteredResults);
            $trendData = array_map(function($r) {
                return $r['total_points'] > 0 ? round(($r['score'] / $r['total_points']) * 100) : $r['score'];
            }, $reversed);
        ?>
        var scores = <?= json_encode($trendData) ?>;
        var labels = <?= json_encode(array_values(array_column($reversed, 'subject'))) ?>;

        var options = {
            series: [{
                name: 'Performance (%)',
                data: scores.length > 0 ? scores : [0]
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: { show: false }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', colors: ['#5751E1'] },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100],
                    colorStops: [
                        { offset: 0, color: '#5751E1', opacity: 0.4 },
                        { offset: 100, color: '#5751E1', opacity: 0.1 }
                    ]
                }
            },
            xaxis: {
                categories: labels.length > 0 ? labels : ['No Data'],
            },
            yaxis: {
                max: 100
            }
        };

        var chart = new ApexCharts(document.querySelector("#performance-chart"), options);
        chart.render();
    });
</script>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
