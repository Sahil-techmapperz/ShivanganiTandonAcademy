<!--begin::Header-->
<nav class="app-header navbar navbar-expand">
    <!--begin::Container-->
    <div class="container-fluid px-0">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">

            <?php $user = logged_in_user(); ?>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="<?= base_url('dist/assets/img/user2-160x160.jpg') ?>" class="user-image rounded-circle shadow" alt="User Image" />
                    <span class="d-none d-md-inline fw-semibold"><?= esc($user['name'] ?? '') ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <p>
                            <?= esc($user['name'] ?? '') ?><br>
                            <?= esc($user['email'] ?? '') ?>
                        </p>
                    </li>
                    <!-- <li class="user-footer">
                        <a class="btn btn-default btn-flat float-end" href="<?= base_url('changepassword') ?>">Change Password</a>
                    </li> -->
                    <li class="user-footer">
                        <button type="button" onclick="sign_out()" class="btn btn-default btn-flat float-end">
                            <i class="bi bi-box-arrow-right me-2"></i> Sign out
                        </button>
                    </li>
                </ul>
            </li>

        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->

<!-- Global Loading Spinner -->
<div id="loadingSpinner"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(255,255,255,0.6); z-index:1055; align-items:center; justify-content:center;">
    <div class="spinner-border text-secondary" role="status" style="width:3rem; height:3rem;">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 bottom-0 p-3 d-flex flex-column-reverse justify-content-end"
    style="z-index:1100; pointer-events:none;">
</div>

<!-- Template Toast (hidden) -->
<div id="toastTemplate" class="toast align-items-center text-white bg-success border-0 fade"
    role="alert" aria-live="assertive" aria-atomic="true" style="display:none;">
    <div class="d-flex">
        <div class="toast-body"></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto"
            data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<script>
    function sign_out() {
        showLoading();

        fetch("<?= base_url('logout') ?>", {
                method: "GET",
                headers: {
                    "Accept": "application/json"
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("HTTP error " + response.status);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showToast("Logged out successfully.", true);
                    setTimeout(() => {
                        window.location.href = "<?= base_url('login') ?>"; // Redirect using base_url
                    }, 500); // short delay to show toast
                } else {
                    showToast("Logout failed: " + (data.message || ""), false);
                }
            })
            .catch(error => {
                console.error("Error during logout:", error);
                showToast("An error occurred during logout.", false);
            })
            .finally(() => {
                hideLoading();
            });
    }

    function showToast(message, isSuccess = true) {
        const container = document.querySelector('.toast-container');
        const template = document.getElementById('toastTemplate');

        // Clone a fresh toast
        const toastEl = template.cloneNode(true);
        toastEl.style.display = "block";
        toastEl.id = ""; // remove duplicate id

        const toastBody = toastEl.querySelector('.toast-body');
        toastBody.textContent = message;

        toastEl.classList.remove('bg-success', 'bg-danger');
        toastEl.classList.add(isSuccess ? 'bg-success' : 'bg-danger');

        container.appendChild(toastEl);

        const toast = new bootstrap.Toast(toastEl, {
            animation: true,
            autohide: true,
            delay: 3000
        });
        toast.show();

        // Remove from DOM after hidden
        toastEl.addEventListener('hidden.bs.toast', () => {
            toastEl.remove();
        });
    }

    function showLoading() {
        document.getElementById('loadingSpinner').style.display = 'flex';
    }

    function hideLoading() {
        document.getElementById('loadingSpinner').style.display = 'none';
    }
</script>