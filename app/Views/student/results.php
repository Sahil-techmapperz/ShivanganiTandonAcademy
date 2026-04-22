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
            <!-- Score Chart (Placeholder) -->
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
                                            <th>Status</th>
                                            <th class="pe-4 text-end">Action</th>
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
                                            <td>
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
                                            <td class="pe-4 text-end">
                                                <?php if(!is_null($result['score'])): ?>
                                                    <button onclick="downloadResultPDF('<?= addslashes($result['subject']) ?>', '<?= $result['score'] ?>', '<?= date('d M, Y', strtotime($result['exam_date'])) ?>', event)" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">Download PDF</button>
                                                <?php else: ?>
                                                    <button class="btn btn-sm btn-light rounded-pill px-3 extra-small fw-bold border" disabled>Evaluating...</button>
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

<!-- Hidden Container for PDF Template (Professional Certificate Style) -->
<div id="pdf-template-container" style="position: absolute; left: -9999px; top: -9999px;">
    <div id="result-certificate" style="width: 800px; padding: 50px; background: #fff; border: 20px solid #5751E1; font-family: 'Arial', sans-serif; position: relative;">
        <!-- Watermark -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); font-size: 80px; color: rgba(0,0,0,0.03); z-index: 0; white-space: nowrap; pointer-events: none;">
            SHIVANGANI TANDON ACADEMY
        </div>
        
        <div style="text-align: center; position: relative; z-index: 1;">
            <img src="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 20px;">
            <h1 style="color: #5751E1; margin: 0; text-transform: uppercase; letter-spacing: 2px;">Exam Statement</h1>
            <p style="font-size: 18px; color: #666;">Shivangani Tandon Academy</p>
            
            <hr style="border: 0; border-top: 2px solid #5751E1; width: 100px; margin: 30px auto;">
            
            <p style="font-size: 20px; color: #333; margin-bottom: 5px;">This is to certify the performance of</p>
            <h2 id="pdf-student-name" style="font-size: 32px; color: #000; margin: 10px 0;"><?= session()->get('full_name') ?></h2>
            
            <div style="margin: 40px 0; padding: 30px; border: 1px dashed #ccc; background: #f9f9f9; display: inline-block; min-width: 400px;">
                <p style="margin: 5px 0; font-size: 16px; color: #666;">Subject / Module</p>
                <h3 id="pdf-subject" style="font-size: 24px; color: #5751E1; margin: 5px 0 20px 0;">&nbsp;</h3>
                
                <p style="margin: 5px 0; font-size: 16px; color: #666;">Achieved Score</p>
                <h3 id="pdf-score" style="font-size: 40px; color: #28a745; margin: 5px 0;">&nbsp;</h3>
            </div>
            
            <div style="margin-top: 20px;">
                <p style="font-size: 16px; color: #666;">Exam Date: <span id="pdf-date" style="color: #000; font-weight: bold;">&nbsp;</span></p>
            </div>

            <div style="margin-top: 50px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div style="text-align: left;">
                    <p style="margin: 0; font-size: 11px; color: #999;">Reference ID: #STA-<?= date('Y') ?>-RES-<?= strtoupper(substr(session()->get('id') . session()->get('full_name'), 0, 4)) ?></p>
                    <p style="margin: 0; font-size: 11px; color: #999;">Generated on: <?= date('d M, Y') ?></p>
                </div>
                <div style="text-align: right; width: 200px;">
                    <div style="height: 60px; margin-bottom: 5px; text-align: center;">
                        <?php if($signature): ?>
                            <img id="pdf-signature-img" src="<?= base_url($signature) ?>" style="max-height: 60px; max-width: 150px; display: inline-block;">
                        <?php endif; ?>
                    </div>
                    <div style="border-bottom: 1px solid #000; width: 100%; margin-bottom: 5px;"></div>
                    <p style="margin: 0; font-size: 14px; font-weight: bold;">Academy Director</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- PDF Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php 
            $filteredResults = array_filter($results, fn($r) => !is_null($r['score']));
            $reversed = array_reverse($filteredResults);
            // Calculate percentage for trend line consistency
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

    // PDF Download Function
    window.downloadResultPDF = function(subject, score, date, event) {
        const { jsPDF } = window.jspdf;
        
        // Populate Template
        document.getElementById('pdf-subject').textContent = subject;
        document.getElementById('pdf-score').textContent = score + '%';
        document.getElementById('pdf-date').textContent = date;
        
        const element = document.getElementById('result-certificate');
        const btn = event.currentTarget || event.target;
        const originalText = btn.innerHTML;
        
        // Show loading state
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        btn.disabled = true;

        // Give the DOM a moment to reflow before capturing
        setTimeout(() => {
            html2canvas(element, {
                scale: 3, // Even higher resolution
                useCORS: true,
                backgroundColor: '#ffffff',
                logging: false
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('l', 'mm', 'a4'); // Landscape
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();
                
                // Add image to PDF, filling the page
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save(`Result_${subject.replace(/\s+/g, '_')}.pdf`);
                
                // Reset button
                btn.innerHTML = originalText;
                btn.disabled = false;
            }).catch(err => {
                console.error('PDF Generation Error:', err);
                alert('Failed to generate PDF. Please try again.');
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }, 300); // Increased delay for stability
    };
</script>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
