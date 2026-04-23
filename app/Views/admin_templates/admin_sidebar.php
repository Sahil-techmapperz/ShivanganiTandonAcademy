<?php
$uri = service('uri');

// Remove base_url segment (e.g., 'visitors_management1') dynamically
$matchedurl = implode('/', array_slice($uri->getSegments(), 0, 2)); // Example: admin/dashboard
?>

<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow " data-bs-theme="light">

    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="<?= base_url('admin/dashboard') ?>" class="brand-link logo_image_parent">
            <img src="<?= base_url(get_setting('company_logo', 'public/images/commonImages/fcabd6f88b0c3e59d8b5c7fea57132f417ff1545.png')) ?>" alt="Logo" class="brand-image" />
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false" id="navigation">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>"
                        class="nav-link <?= $matchedurl == 'admin/dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-house nav-icon me-2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/users') ?>"
                        class="nav-link <?= $matchedurl == 'admin/users' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-people me-2"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                
                <!-- Announcements -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/announcements') ?>"
                        class="nav-link <?= $matchedurl == 'admin/announcements' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-megaphone me-2"></i>
                        <p>Announcements</p>
                    </a>
                </li>

                <!-- Blogs -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/blogs') ?>"
                        class="nav-link <?= $matchedurl == 'admin/blogs' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-journal-text me-2"></i>
                        <p>Manage Blogs</p>
                    </a>
                </li>

                <!-- Testimonials -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/testimonials') ?>"
                        class="nav-link <?= $matchedurl == 'admin/testimonials' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-star-fill me-2"></i>
                        <p>Testimonials</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/usa_journey') ?>"
                        class="nav-link <?= $matchedurl == 'admin/usa_journey' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-text me-2"></i>
                        <p>USA JOURNEY Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/help_request') ?>"
                        class="nav-link <?= $matchedurl == 'admin/help_request' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-text me-2"></i>
                        <p>Help Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/enrollments') ?>"
                        class="nav-link <?= $matchedurl == 'admin/enrollments' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-person-check me-2"></i>
                        <p>Enrollments</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url('admin/support') ?>"
                        class="nav-link <?= $matchedurl == 'admin/support' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-headset me-2"></i>
                        <p>Student Support</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/hiring_request') ?>"
                        class="nav-link <?= $matchedurl == 'admin/hiring_request' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-text me-2"></i>
                        <p>Hiring Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/query_request') ?>"
                        class="nav-link <?= $matchedurl == 'admin/query_request' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-text me-2"></i>
                        <p>QUERIES Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/inquiry_request') ?>"
                        class="nav-link <?= $matchedurl == 'admin/inquiry_request' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-text me-2"></i>
                        <p>INQUERY Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/scores') ?>"
                        class="nav-link <?= $matchedurl == 'admin/scores' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-image me-2"></i>
                        <p>Real Results (Images)</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/courses') ?>"
                        class="nav-link <?= $matchedurl == 'admin/courses' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-mortarboard me-2"></i>
                        <p>Manage Academy</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/submissions') ?>"
                        class="nav-link <?= $matchedurl == 'admin/submissions' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-pencil-square me-2"></i>
                        <p>Grade Exams</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/settings') ?>"
                        class="nav-link <?= $matchedurl == 'admin/settings' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-gear me-2"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <!-- Test Management Section -->
                <li class="nav-header">TEST MANAGEMENT</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/mock-tests') ?>"
                        class="nav-link <?= $matchedurl == 'admin/mock-tests' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-file-earmark-check me-2"></i>
                        <p>Mock Tests</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/unit-tests') ?>"
                        class="nav-link <?= $matchedurl == 'admin/unit-tests' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-list-check me-2"></i>
                        <p>Unit Tests</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/test-access') ?>"
                        class="nav-link <?= $matchedurl == 'admin/test-access' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-person-lock me-2"></i>
                        <p>Test Access</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon bi bi-box-arrow-right me-2"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->

</aside>
<!--end::Sidebar-->