<?= view('student_templates/upper_template') ?>
<?= view('student_templates/header') ?>
<?= view('student_templates/student_sidebar') ?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header py-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 fw-bold">Welcome back, <?= session()->get('full_name') ?? 'Student' ?>!</h3>
                    <p class="text-muted mb-0">Here's what's happening with your learning today.</p>
                </div>
                <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                    <div id="dashboard-clock" class="h5 fw-light text-primary"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content pb-5">
        <div class="container-fluid">
            <!-- Summary Slots -->
            <div class="row">
                <!-- Courses Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card p-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-primary-subtle p-3 rounded-circle me-3">
                                <i class="bi bi-journal-check text-primary fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-muted">Courses</h6>
                                <h4 class="mb-0 fw-bold"><?= $courseCount ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card p-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-success-subtle p-3 rounded-circle me-3">
                                <i class="bi bi-award text-success fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-muted">Overall Progress</h6>
                                <h4 class="mb-0 fw-bold"><?= $avgProgress ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Lessons Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card p-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-warning-subtle p-3 rounded-circle me-3">
                                <i class="bi bi-check2-all text-warning fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-muted">Completed Lessons</h6>
                                <h4 class="mb-0 fw-bold"><?= $completedLessonsCount ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Support Card -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card p-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 bg-danger-subtle p-3 rounded-circle me-3">
                                <i class="bi bi-chat-dots text-danger fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-muted">Support</h6>
                                <h4 class="mb-0 fw-bold"><?= $supportCount > 0 ? $supportCount . ' Pending' : 'Active' ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="card shadow-sm h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="fs-5">Recent Activity</span>
                            <a href="<?= base_url('student/courses') ?>" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <?php if(empty($activities)): ?>
                                    <div class="text-center py-5">
                                        <i class="bi bi-activity text-muted fs-1 opacity-25"></i>
                                        <p class="text-muted mt-2">No recent activity yet. Start learning!</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach($activities as $act): ?>
                                    <div class="list-group-item px-0 py-3 d-flex align-items-start border-0 border-bottom">
                                        <div class="me-3 flex-shrink-0">
                                            <div class="<?= $act['bg'] ?> text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi <?= $act['icon'] ?> text-white fs-5"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1" style="min-width: 0;">
                                            <h6 class="mb-1 fw-bold text-dark text-truncate"><?= $act['title'] ?></h6>
                                            <p class="mb-0 text-muted small text-truncate"><?= $act['desc'] ?></p>
                                        </div>
                                        <div class="text-muted small ms-3 flex-shrink-0">
                                            <?php 
                                                $time = strtotime($act['time']);
                                                $diff = time() - $time;
                                                if ($diff < 60) echo "Just now";
                                                elseif ($diff < 3600) echo floor($diff/60) . "m ago";
                                                elseif ($diff < 86400) echo floor($diff/3600) . "h ago";
                                                else echo date('d M', $time);
                                            ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <span class="fs-5">Announcements</span>
                        </div>
                        <div class="card-body">
                            <?php foreach($announcements as $ann): ?>
                            <div class="alert alert-<?= $ann['type'] ?> border-0 shadow-none mb-3">
                                <h6 class="alert-heading fw-bold"><?= $ann['title'] ?></h6>
                                <p class="mb-0 small"><?= $ann['content'] ?></p>
                            </div>
                            <?php endforeach; ?>
                            
                            <?php if(empty($announcements)): ?>
                                <p class="text-muted text-center">No new announcements.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function updateDashboardClock() {
        const clock = document.getElementById('dashboard-clock');
        if(!clock) return;
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        clock.textContent = now.toLocaleDateString('en-US', options);
    }
    setInterval(updateDashboardClock, 1000);
    updateDashboardClock();
</script>

<?= view('student_templates/footer') ?>
<?= view('student_templates/lower_template') ?>
