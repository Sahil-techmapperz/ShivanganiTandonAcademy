<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<?= view('admin_templates/admin_sidebar') ?>

<main class="app-main">
    <!-- Premium Header -->
    <div class="app-content-header py-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-dark mb-1">Welcome back, Admin!</h1>
                    <p class="text-muted lead mb-0" id="current-date-full"></p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="glass-clock p-3 rounded-4 shadow-sm d-inline-block bg-white bg-opacity-75 border border-white">
                        <div id="clock-large" class="fw-bold text-primary fs-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- App Content -->
    <div class="app-content pb-5">
        <div class="container-fluid">
            
            <!-- Primary Stats Row -->
            <div class="row g-4 mb-5">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card p-4 rounded-4 shadow-sm border-0 h-100 bg-gradient-primary text-white">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-uppercase fw-bold opacity-75 small">Total Students</h6>
                                <h2 class="display-6 fw-bold mb-0"><?= $total_students ?></h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25 rounded-3 p-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3 small opacity-75">
                            <i class="bi bi-arrow-up-right me-1"></i> Lifetime active
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card p-4 rounded-4 shadow-sm border-0 h-100 bg-gradient-success text-white">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-uppercase fw-bold opacity-75 small">Active Courses</h6>
                                <h2 class="display-6 fw-bold mb-0"><?= $total_courses ?></h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25 rounded-3 p-3">
                                <i class="bi bi-mortarboard-fill fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3 small opacity-75">
                            <i class="bi bi-book me-1"></i> Available in catalog
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card p-4 rounded-4 shadow-sm border-0 h-100 bg-gradient-warning text-white">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-uppercase fw-bold opacity-75 small">Pending Enrolls</h6>
                                <h2 class="display-6 fw-bold mb-0"><?= $pending_enroll ?></h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25 rounded-3 p-3">
                                <i class="bi bi-person-plus-fill fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3 small opacity-75">
                            <i class="bi bi-clock-history me-1"></i> Awaiting approval
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card p-4 rounded-4 shadow-sm border-0 h-100 bg-gradient-danger text-white">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-uppercase fw-bold opacity-75 small">Open Support</h6>
                                <h2 class="display-6 fw-bold mb-0"><?= $pending_support ?></h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25 rounded-3 p-3">
                                <i class="bi bi-headset fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3 small opacity-75">
                            <i class="bi bi-exclamation-circle me-1"></i> Tickets to resolve
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row g-4 mb-5">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0">Growth Trends</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border" type="button">Last 7 Days</button>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <div id="growthChart" style="min-height: 350px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-white">
                        <div class="card-header bg-transparent border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Request Distribution</h5>
                        </div>
                        <div class="card-body">
                            <div id="distributionChart" style="min-height: 300px;"></div>
                            <div class="mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-2 small">
                                    <span class="text-muted"><i class="bi bi-circle-fill text-primary me-2" style="font-size: 8px;"></i> USA Journey</span>
                                    <span class="fw-bold"><?= $usa_journey_count ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 small">
                                    <span class="text-muted"><i class="bi bi-circle-fill text-success me-2" style="font-size: 8px;"></i> Hiring</span>
                                    <span class="fw-bold"><?= $hiring_count ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 small">
                                    <span class="text-muted"><i class="bi bi-circle-fill text-warning me-2" style="font-size: 8px;"></i> Help</span>
                                    <span class="fw-bold"><?= $help_count ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center small">
                                    <span class="text-muted"><i class="bi bi-circle-fill text-info me-2" style="font-size: 8px;"></i> Queries/Inq</span>
                                    <span class="fw-bold"><?= $query_count + $inquiry_count ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Enrollments & Activity -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
                        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fw-bold mb-0">Recent Enrollments</h5>
                            <a href="<?= base_url('admin/enrollments') ?>" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">Manage All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 custom-table">
                                    <thead class="bg-light bg-opacity-50">
                                        <tr>
                                            <th class="ps-4 py-3 text-muted small fw-bold border-0">STUDENT</th>
                                            <th class="py-3 text-muted small fw-bold border-0">COURSE</th>
                                            <th class="py-3 text-muted small fw-bold border-0 text-center">STATUS</th>
                                            <th class="pe-4 py-3 text-muted small fw-bold border-0 text-end">DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($recent_enroll)): ?>
                                            <tr><td colspan="4" class="text-center py-5 text-muted">No recent enrollments found.</td></tr>
                                        <?php else: ?>
                                            <?php foreach($recent_enroll as $enroll): ?>
                                            <tr>
                                                <td class="ps-4 py-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm rounded-circle bg-primary-subtle text-primary me-3 d-flex align-items-center justify-content-center fw-bold">
                                                            <?= substr($enroll['full_name'], 0, 1) ?>
                                                        </div>
                                                        <div>
                                                            <div class="fw-bold text-dark"><?= $enroll['full_name'] ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3">
                                                    <span class="text-muted small"><?= $enroll['course_name'] ?></span>
                                                </td>
                                                <td class="py-3 text-center">
                                                    <?php 
                                                        $badge_class = 'bg-secondary';
                                                        if($enroll['status'] == 'approved' || $enroll['status'] == 'enrolled') $badge_class = 'bg-success';
                                                        if($enroll['status'] == 'pending') $badge_class = 'bg-warning text-dark';
                                                        if($enroll['status'] == 'in-progress') $badge_class = 'bg-info text-white';
                                                    ?>
                                                    <span class="badge <?= $badge_class ?> rounded-pill px-3 py-2 small fw-bold" style="min-width: 80px; font-size: 10px;">
                                                        <?= strtoupper($enroll['status']) ?>
                                                    </span>
                                                </td>
                                                <td class="pe-4 py-3 text-end">
                                                    <span class="text-muted small"><?= date('d M, Y', strtotime($enroll['enrolled_at'])) ?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="card border-0 shadow-sm rounded-4 bg-white mb-4">
                        <div class="card-header bg-transparent border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="<?= base_url('admin/announcements') ?>" class="action-btn d-flex flex-column align-items-center justify-content-center p-3 rounded-4 border text-decoration-none transition-all h-100">
                                        <i class="bi bi-megaphone text-primary fs-3 mb-2"></i>
                                        <span class="text-dark small fw-bold">Announce</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="<?= base_url('admin/courses') ?>" class="action-btn d-flex flex-column align-items-center justify-content-center p-3 rounded-4 border text-decoration-none transition-all h-100">
                                        <i class="bi bi-plus-circle text-success fs-3 mb-2"></i>
                                        <span class="text-dark small fw-bold">Add Course</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="<?= base_url('admin/support') ?>" class="action-btn d-flex flex-column align-items-center justify-content-center p-3 rounded-4 border text-decoration-none transition-all h-100">
                                        <i class="bi bi-chat-dots text-warning fs-3 mb-2"></i>
                                        <span class="text-dark small fw-bold">Support</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="<?= base_url('admin/settings') ?>" class="action-btn d-flex flex-column align-items-center justify-content-center p-3 rounded-4 border text-decoration-none transition-all h-100">
                                        <i class="bi bi-gear text-info fs-3 mb-2"></i>
                                        <span class="text-dark small fw-bold">Settings</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Support Activity -->
                    <div class="card border-0 shadow-sm rounded-4 bg-white">
                        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex align-items-center justify-content-between mb-3">
                            <h5 class="fw-bold mb-0">Active Support</h5>
                            <a href="<?= base_url('admin/support') ?>" class="text-primary small fw-bold text-decoration-none">View Chat</a>
                        </div>
                        <div class="card-body pt-0">
                            <div class="activity-timeline">
                                <?php if(empty($recent_support)): ?>
                                    <div class="text-center py-4 text-muted small">No active support tickets.</div>
                                <?php else: ?>
                                    <?php foreach($recent_support as $support): ?>
                                    <div class="activity-item d-flex mb-4">
                                        <div class="activity-marker bg-primary rounded-circle mt-1 me-3" style="width: 10px; height: 10px; flex-shrink: 0;"></div>
                                        <div class="activity-content border-start ps-3 pb-2" style="border-width: 2px !important; margin-left: -18px; padding-left: 23px !important;">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span class="fw-bold text-dark small"><?= $support['full_name'] ?></span>
                                                <span class="extra-small text-muted"><?= date('H:i', strtotime($support['created_at'])) ?></span>
                                            </div>
                                            <div class="text-muted small text-truncate" style="max-width: 180px;"><?= $support['subject'] ?></div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        --success-gradient: linear-gradient(135deg, #22c55e 0%, #10b981 100%);
        --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
    }

    .app-main .custom-table td:first-child,
    .app-main .custom-table th:first-child {
        width: auto !important;
        max-width: none !important;
        min-width: auto !important;
        text-align: left !important;
    }

    .app-main .custom-table td, 
    .app-main .custom-table th {
        white-space: normal !important;
        text-transform: none !important;
        padding: 1rem 0.75rem !important;
    }

    .app-main .custom-table th {
        font-size: 0.75rem !important;
        font-weight: 700 !important;
        color: #64748b !important;
    }

    .app-main .custom-table td {
        font-size: 0.875rem !important;
    }

    /* Column Widths */
    .custom-table th:nth-child(1) { width: 35%; }
    .custom-table th:nth-child(2) { width: 35%; }
    .custom-table th:nth-child(3) { width: 15%; }
    .custom-table th:nth-child(4) { width: 15%; }

    .app-main .card {
        background-color: #ffffff !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        border: none !important;
    }

    .stat-card {
        border: none !important;
    }

    .bg-gradient-primary { background: var(--primary-gradient) !important; }
    .bg-gradient-success { background: var(--success-gradient) !important; }
    .bg-gradient-warning { background: var(--warning-gradient) !important; }
    .bg-gradient-danger { background: var(--danger-gradient) !important; }

    .app-main {
        background-color: #f8fafc !important;
        min-height: 100vh;
    }

    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        top: -20%;
        right: -10%;
        width: 150px;
        height: 150px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        pointer-events: none;
    }

    .avatar-sm {
        width: 38px;
        height: 38px;
        font-size: 14px;
    }

    .bg-primary-subtle { background-color: rgba(99, 102, 241, 0.1) !important; }
    
    .custom-table th {
        font-size: 11px;
        letter-spacing: 0.05em;
    }
    
    .custom-table td {
        padding: 1.25rem 0.75rem;
    }

    .action-btn {
        background: #ffffff;
        border: 1px solid #e2e8f0 !important;
    }

    .action-btn:hover {
        background: #f8fafc;
        border-color: #6366f1 !important;
        transform: scale(1.05);
    }

    .extra-small { font-size: 10px; }
    
    .transition-all { transition: all 0.3s ease; }

    /* Custom ApexCharts styling */
    .apexcharts-canvas {
        margin: 0 auto;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Clock functionality
        function updateClock() {
            const clock = document.getElementById('clock-large');
            const dateEl = document.getElementById('current-date-full');
            const now = new Date();

            let hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            
            const formattedTime = (hours < 10 ? '0' : '') + hours + ':' + 
                                  (minutes < 10 ? '0' : '') + minutes + ':' + 
                                  (seconds < 10 ? '0' : '') + seconds + ' ' + ampm;
            
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = now.toLocaleDateString('en-US', options);

            if(clock) clock.textContent = formattedTime;
            if(dateEl) dateEl.textContent = formattedDate;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Growth Trends Chart (Area)
        const growthOptions = {
            series: [{
                name: 'Enrollments',
                data: <?= json_encode($enroll_trends) ?>
            }, {
                name: 'Registrations',
                data: <?= json_encode($reg_trends) ?>
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: { show: false },
                zoom: { enabled: false },
                fontFamily: 'Inter, sans-serif'
            },
            colors: ['#6366f1', '#22c55e'],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 3 },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            xaxis: {
                categories: <?= json_encode(array_map(function($d) { return date('d M', strtotime($d)); }, $chart_dates)) ?>,
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    formatter: function(val) { return val.toFixed(0); }
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            },
            tooltip: {
                x: { format: 'dd MMM' }
            }
        };

        const growthChart = new ApexCharts(document.querySelector("#growthChart"), growthOptions);
        growthChart.render();

        // Request Distribution Chart (Donut)
        const distOptions = {
            series: [<?= $usa_journey_count ?>, <?= $hiring_count ?>, <?= $help_count ?>, <?= $query_count + $inquiry_count ?>],
            chart: {
                type: 'donut',
                height: 300,
            },
            labels: ['USA Journey', 'Hiring', 'Help', 'Queries/Inq'],
            colors: ['#6366f1', '#22c55e', '#f59e0b', '#0ea5e9'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            legend: { show: false },
            stroke: { width: 0 }
        };

        const distributionChart = new ApexCharts(document.querySelector("#distributionChart"), distOptions);
        distributionChart.render();
    });
</script>

<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>