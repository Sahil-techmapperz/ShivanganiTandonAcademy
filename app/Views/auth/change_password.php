<?= view('admin_templates/upper_template') ?>
<?= view('admin_templates/header') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<?php
$designation = session()->get('designation');

if ($designation === 'admin') {
    echo view('admin_templates/admin_sidebar');
} elseif ($designation === 'reception') {
    echo view('admin_templates/reception_sidebar');
}
?>

<main class="app-main d-flex align-items-center justify-content-center min-vh-90">
    <div class="container" style="max-width: 500px;">
        <div class="rounded shadow" style="border: 2px solid #191497; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <!-- <h4 class="mb-4 text-center text-primary">Change Password</h4> -->
            <div style="background: linear-gradient(90deg,rgba(1, 192, 244, 1) 0%, rgba(25, 20, 151, 1) 50%, rgba(1, 192, 244, 1) 100%); color: white; padding: 15px; text-align: center;">
                <strong>Change Password</strong>
            </div>
            <form id="changePasswordForm" class="p-4">
                <!-- Current Password -->
                <div class="mb-3 position-relative">
                    <label for="current_password" class="form-label">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                        <span class="input-group-text">
                            <i class="fa-solid fa-eye toggle-password" data-target="current_password" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <!-- New Password -->
                <div class="mb-3 position-relative">
                    <label for="new_password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <span class="input-group-text">
                            <i class="fa-solid fa-eye toggle-password" data-target="new_password" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <!-- Confirm New Password -->
                <div class="mb-3 position-relative">
                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <span class="input-group-text">
                            <i class="fa-solid fa-eye toggle-password" data-target="confirm_password" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary w-100" id="updatePasswordBtn">Update Password</button>
            </form>
        </div>
    </div>
</main>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<!-- Toggle password visibility script -->
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });

    $(document).ready(function() {
        // Initialize validation
        $('#changePasswordForm').validate({
            rules: {
                current_password: {
                    required: true,
                    minlength: 6
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password"
                }
            },
            messages: {
                current_password: {
                    required: "Please enter your current password",
                    minlength: "Password must be at least 6 characters"
                },
                new_password: {
                    required: "Please enter a new password",
                    minlength: "Password must be at least 6 characters"
                },
                confirm_password: {
                    required: "Please confirm your new password",
                    equalTo: "Passwords do not match"
                }
            },
            errorClass: "is-invalid",
            validClass: "is-valid",
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                if (element.closest('.input-group').length) {
                    error.insertAfter(element.closest('.input-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });

        // Handle password update
        document.getElementById('updatePasswordBtn').addEventListener('click', function(e) {
            e.preventDefault();

            if (!$('#changePasswordForm').valid()) {
                showToast("Please fix the errors before submitting.", false);
                return;
            }

            const currentPassword = document.getElementById('current_password').value.trim();
            const newPassword = document.getElementById('new_password').value.trim();
            const confirmPassword = document.getElementById('confirm_password').value.trim();

            const form_data = new URLSearchParams();
            form_data.append('current_password', currentPassword);
            form_data.append('new_password', newPassword);
            form_data.append('confirm_password', confirmPassword);

            showLoading();

            fetch("<?= base_url('api/changepassword') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: form_data.toString()
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, true);
                        document.getElementById('changePasswordForm').reset();
                        $('#changePasswordForm .form-control').removeClass("is-valid");
                    } else {
                        showToast(data.message || "An error occurred.", false);
                    }
                })
                .catch(err => {
                    console.error(err);
                    showToast("Something went wrong!", false);
                })
                .finally(() => {
                    hideLoading();
                });
        });
    });
</script>




<?= view('admin_templates/footer') ?>
<?= view('admin_templates/lower_template') ?>