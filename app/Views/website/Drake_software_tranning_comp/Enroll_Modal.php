<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css"/>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

<!-- ===== ENROLLMENT POPUP MODAL ===== -->
<div id="enrollModal" style="display:none; position:fixed; inset:0; z-index:99999;
     align-items:center; justify-content:center; padding:16px; font-family:'Poppins',sans-serif;">

    <!-- Backdrop -->
    <div onclick="closeEnrollModal()"
         style="position:absolute; inset:0; background:rgba(0,0,0,0.6);"></div>

    <!-- Modal Card -->
    <div id="enrollModalCard"
         style="position:relative; background:#fff; border-radius:24px; box-shadow:0 25px 60px rgba(0,0,0,0.3);
                width:100%; max-width:480px; margin:auto; overflow:hidden;
                transform:scale(0.92); opacity:0; transition:transform 0.25s ease, opacity 0.25s ease;">

        <!-- Header -->
        <div style="background:linear-gradient(135deg,#5751E1 0%,#282568 100%); padding:28px 32px; position:relative;">
            <button onclick="closeEnrollModal()"
                    style="position:absolute; top:14px; right:14px; width:30px; height:30px; border-radius:50%;
                           background:rgba(255,255,255,0.2); border:none; cursor:pointer; color:#fff;
                           font-size:16px; display:flex; align-items:center; justify-content:center; line-height:1;">
                ✕
            </button>
            <span style="display:inline-block; background:rgba(255,255,255,0.15); color:#fff;
                         font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px; margin-bottom:10px;">
                🔥 Limited Seats — Enroll Today!
            </span>
            <h2 style="color:#fff; font-size:22px; font-weight:700; margin:0; line-height:1.3;">
                Start Your Tax Software<br>Training Journey
            </h2>
            <p style="color:rgba(255,255,255,0.75); font-size:13px; margin:6px 0 0;">
                Hands-on Drake Tax training with job placement support.
            </p>
        </div>

        <!-- Form Body -->
        <div style="padding:24px 32px;">

            <!-- Error box -->
            <div id="enroll_error"
                 style="display:none; background:#fff5f5; border:1px solid #fca5a5; color:#dc2626;
                        border-radius:10px; padding:10px 14px; font-size:13px; margin-bottom:14px;"></div>

            <!-- Full Name -->
            <div style="margin-bottom:14px;">
                <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:5px;">
                    Full Name <span style="color:red;">*</span>
                </label>
                <input id="enroll_name" type="text" placeholder="Enter your full name"
                       style="width:100%; padding:10px 14px; border:1px solid #d1d5db; border-radius:10px;
                              font-size:13px; outline:none; box-sizing:border-box; background:#f9fafb;"
                       onfocus="this.style.borderColor='#5751E1'" onblur="this.style.borderColor='#d1d5db'">
            </div>

            <!-- Email -->
            <div style="margin-bottom:14px;">
                <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:5px;">
                    Email Address <span style="color:red;">*</span>
                </label>
                <input id="enroll_email" type="email" placeholder="Enter your email"
                       style="width:100%; padding:10px 14px; border:1px solid #d1d5db; border-radius:10px;
                              font-size:13px; outline:none; box-sizing:border-box; background:#f9fafb;"
                       onfocus="this.style.borderColor='#5751E1'" onblur="this.style.borderColor='#d1d5db'">
            </div>

            <!-- Phone -->
            <div style="margin-bottom:14px;">
                <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:5px;">
                    Phone Number <span style="color:red;">*</span>
                    <span style="font-weight:400; color:#9ca3af; font-size:11px;">(Enter a valid number)</span>
                </label>
                <input id="enroll_phone" type="tel" placeholder="Enter phone number"
                       style="width:100%; height:42px; padding:0 14px; border:1px solid #d1d5db; border-radius:10px;
                              font-size:13px; outline:none; box-sizing:border-box; background:#f9fafb;">
            </div>

            <!-- Profession -->
            <div style="margin-bottom:14px;">
                <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:8px;">
                    I am a
                </label>
                <div style="display:flex; gap:10px;">
                    <label style="flex:1; cursor:pointer;">
                        <input type="radio" name="enroll_profession" value="student" id="ep_student"
                               style="display:none;" checked onchange="updateProfessionUI()">
                        <div id="ep_student_div"
                             style="text-align:center; padding:8px; border-radius:20px; font-size:13px;
                                    font-weight:500; border:1px solid #5751E1; background:#5751E1; color:#fff; cursor:pointer;"
                             onclick="document.getElementById('ep_student').click()">
                            Student
                        </div>
                    </label>
                    <label style="flex:1; cursor:pointer;">
                        <input type="radio" name="enroll_profession" value="working" id="ep_working"
                               style="display:none;" onchange="updateProfessionUI()">
                        <div id="ep_working_div"
                             style="text-align:center; padding:8px; border-radius:20px; font-size:13px;
                                    font-weight:500; border:1px solid #d1d5db; background:#fff; color:#374151; cursor:pointer;"
                             onclick="document.getElementById('ep_working').click()">
                            Working Professional
                        </div>
                    </label>
                </div>
            </div>

            <!-- Location -->
            <div style="margin-bottom:18px;">
                <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:5px;">
                    Location <span style="color:red;">*</span>
                </label>
                <input id="enroll_location" type="text" placeholder="Your city / country"
                       style="width:100%; padding:10px 14px; border:1px solid #d1d5db; border-radius:10px;
                              font-size:13px; outline:none; box-sizing:border-box; background:#f9fafb;"
                       onfocus="this.style.borderColor='#5751E1'" onblur="this.style.borderColor='#d1d5db'">
            </div>

            <!-- Submit -->
            <button id="enroll_submitBtn" type="button" onclick="submitEnrollForm()"
                    style="width:100%; background:#5751E1; color:#fff; padding:12px; border:none; border-radius:12px;
                           font-size:14px; font-weight:700; cursor:pointer; display:flex; align-items:center;
                           justify-content:center; gap:8px; box-shadow:0 4px 0 0 #282568;
                           transition:transform 0.15s ease, box-shadow 0.15s ease;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 0 0 #282568';"
                    onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 0 0 #282568';">
                <span id="enroll_btnText">Enroll Now →</span>
                <span id="enroll_spinner" style="display:none;">
                    <svg style="width:16px;height:16px;animation:spin 1s linear infinite;" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.3)" stroke-width="4"/>
                        <path d="M4 12a8 8 0 018-8v8z" fill="#fff"/>
                    </svg>
                </span>
            </button>

        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="enrollSuccess" style="display:none; position:fixed; inset:0; z-index:100000;
     align-items:center; justify-content:center; padding:16px; font-family:'Poppins',sans-serif;">
    <div style="position:absolute; inset:0; background:rgba(0,0,0,0.6);" onclick="closeEnrollSuccess()"></div>
    <div style="position:relative; background:#fff; border-radius:24px; box-shadow:0 25px 60px rgba(0,0,0,0.3);
                width:100%; max-width:360px; text-align:center; padding:40px 32px;">
        <div style="width:64px; height:64px; background:#dcfce7; border-radius:50%; display:flex;
                    align-items:center; justify-content:center; margin:0 auto 16px;">
            <svg style="width:32px;height:32px;color:#22c55e;" fill="none" viewBox="0 0 24 24" stroke="#22c55e" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 style="font-size:20px; font-weight:700; color:#111827; margin:0 0 8px;">You're Enrolled! 🎉</h3>
        <p style="color:#6b7280; font-size:13px; margin:0;">Our team will reach out to you shortly with the next steps.</p>
        <button onclick="closeEnrollSuccess()"
                style="margin-top:20px; width:100%; background:#5751E1; color:#fff; padding:10px; border:none;
                       border-radius:10px; font-size:14px; font-weight:700; cursor:pointer;">
            Done
        </button>
    </div>
</div>

<style>
    @keyframes spin { to { transform: rotate(360deg); } }
    .iti { width: 100% !important; }
    .iti__flag-container { z-index: 100001 !important; }
</style>

<script>
    var enrollIti = null;

    document.addEventListener('DOMContentLoaded', function () {
        var phoneInput = document.getElementById('enroll_phone');
        if (phoneInput && window.intlTelInput) {
            enrollIti = window.intlTelInput(phoneInput, {
                initialCountry: 'in',
                separateDialCode: true,
                preferredCountries: ['in', 'us', 'gb'],
                utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js'
            });
        }
    });

    window.openEnrollModal = function() {
        var modal = document.getElementById('enrollModal');
        var card  = document.getElementById('enrollModalCard');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        // Animate card in
        setTimeout(function () {
            card.style.transform = 'scale(1)';
            card.style.opacity   = '1';
        }, 20);
    };

    window.closeEnrollModal = function() {
        var modal = document.getElementById('enrollModal');
        var card  = document.getElementById('enrollModalCard');
        card.style.transform = 'scale(0.92)';
        card.style.opacity   = '0';
        document.body.style.overflow = '';
        setTimeout(function () { modal.style.display = 'none'; }, 250);
    };

    window.closeEnrollSuccess = function() {
        document.getElementById('enrollSuccess').style.display = 'none';
        document.body.style.overflow = '';
    };

    function updateProfessionUI() {
        var sDiv = document.getElementById('ep_student_div');
        var wDiv = document.getElementById('ep_working_div');
        var sChecked = document.getElementById('ep_student').checked;
        sDiv.style.background    = sChecked ? '#5751E1' : '#fff';
        sDiv.style.color         = sChecked ? '#fff' : '#374151';
        sDiv.style.borderColor   = sChecked ? '#5751E1' : '#d1d5db';
        wDiv.style.background    = !sChecked ? '#5751E1' : '#fff';
        wDiv.style.color         = !sChecked ? '#fff' : '#374151';
        wDiv.style.borderColor   = !sChecked ? '#5751E1' : '#d1d5db';
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeEnrollModal();
    });

    window.submitEnrollForm = function() {
        var name     = document.getElementById('enroll_name').value.trim();
        var email    = document.getElementById('enroll_email').value.trim();
        var location = document.getElementById('enroll_location').value.trim();
        var errorEl  = document.getElementById('enroll_error');
        var btn      = document.getElementById('enroll_submitBtn');
        var btnText  = document.getElementById('enroll_btnText');
        var spinner  = document.getElementById('enroll_spinner');

        errorEl.style.display = 'none';

        if (!name || !email || !location) {
            errorEl.textContent = 'Please fill in all required fields.';
            errorEl.style.display = 'block';
            return;
        }
        if (enrollIti && !enrollIti.isValidNumber()) {
            errorEl.textContent = 'Please enter a valid phone number.';
            errorEl.style.display = 'block';
            return;
        }

        var phone      = enrollIti ? enrollIti.getNumber() : document.getElementById('enroll_phone').value;
        var profEl     = document.querySelector('input[name="enroll_profession"]:checked');
        var profession = profEl ? profEl.value : 'student';

        btn.disabled = true;
        btnText.textContent = 'Submitting...';
        spinner.style.display = 'inline-flex';

        var formData = new FormData();
        formData.append('name',       name);
        formData.append('email',      email);
        formData.append('phone',      phone);
        formData.append('location',   location);
        formData.append('profession', profession);

        fetch('<?= base_url('api/form_submit') ?>', { method: 'POST', body: formData })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.status === 'success' || data.status === 200) {
                    closeEnrollModal();
                    document.getElementById('enroll_name').value     = '';
                    document.getElementById('enroll_email').value    = '';
                    document.getElementById('enroll_location').value = '';
                    if (enrollIti) enrollIti.setNumber('');
                    var successEl = document.getElementById('enrollSuccess');
                    successEl.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                } else {
                    errorEl.textContent = data.message || 'Something went wrong. Please try again.';
                    errorEl.style.display = 'block';
                }
            })
            .catch(function() {
                errorEl.textContent = 'Server error. Please try again later.';
                errorEl.style.display = 'block';
            })
            .finally(function() {
                btn.disabled = false;
                btnText.textContent = 'Enroll Now →';
                spinner.style.display = 'none';
            });
    }
</script>
