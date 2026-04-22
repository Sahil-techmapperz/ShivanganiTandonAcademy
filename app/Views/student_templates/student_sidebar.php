<!--begin::Sidebar-->
<aside class="app-sidebar shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= base_url('student/dashboard') ?>" class="brand-link border-0">
            <!--begin::Brand Image-->
            <img src="<?= base_url('public/images/commonImages/fcabd6f88b0c3e59d8b5c7fea57132f417ff1545.png') ?>" alt="STA Logo" class="brand-image" style="max-height: 40px; width: auto;" />
            <!--end::Brand Image-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('student/dashboard') ?>" class="nav-link <?= (uri_string() == 'student/dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('student/courses') ?>" class="nav-link <?= (uri_string() == 'student/courses') ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-book"></i>
                        <p>My Courses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('student/results') ?>" class="nav-link <?= (uri_string() == 'student/results') ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-graph-up-arrow"></i>
                        <p>Results / Scores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('student/support') ?>" class="nav-link <?= (uri_string() == 'student/support') ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-headset"></i>
                        <p>Help & Support</p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?= base_url('student/profile') ?>" class="nav-link <?= (uri_string() == 'student/profile') ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="logout()" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
