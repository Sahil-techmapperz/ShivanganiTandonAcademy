<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body shadow-sm">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <?php $profilePic = session()->get('profile_pic') ? base_url(session()->get('profile_pic')) : base_url('public/images/commonImages/SivanganiTandon12.jpg'); ?>
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="<?= $profilePic ?>" class="user-image rounded-circle shadow" alt="User Image" />
                    <span class="d-none d-md-inline"><?= session()->get('full_name') ?? 'Student' ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="<?= $profilePic ?>" class="rounded-circle shadow" alt="User Image" />
                        <p>
                            <?= session()->get('full_name') ?? 'Student' ?>
                            <small>Member since <?= date('M Y') ?></small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="<?= base_url('student/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                        <button onclick="logout()" class="btn btn-default btn-flat float-end">Sign out</button>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>

<script>
    function logout() {
        $.ajax({
            url: '<?= base_url('logout') ?>',
            type: 'GET',
            success: function(response) {
                window.location.href = '<?= base_url('login') ?>';
            }
        });
    }
</script>
<!--end::Header-->
