<?= $this->include('custom/homeMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<style>
    :root {
        --primary-red: #FE002A;
        --secondary-blue: #5751E1;
        --glass-bg: rgba(255, 255, 255, 0.9);
        --glass-border: rgba(255, 255, 255, 0.2);
    }

    .auth-page {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .auth-page::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(254, 0, 42, 0.05) 0%, transparent 70%);
        top: -200px;
        left: -200px;
        z-index: 0;
    }

    .auth-page::after {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(87, 81, 225, 0.05) 0%, transparent 70%);
        bottom: -200px;
        right: -200px;
        z-index: 0;
    }

    .auth-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 480px;
        padding: 48px;
        position: relative;
        z-index: 1;
        animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .auth-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .auth-header h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .auth-header p {
        color: #666;
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        background: #fff;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-input:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 4px rgba(254, 0, 42, 0.1);
    }

    .btn-auth {
        width: 100%;
        padding: 14px;
        background: var(--primary-red);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 24px;
        box-shadow: 0 10px 20px rgba(254, 0, 42, 0.2);
    }

    .btn-auth:hover {
        background: #e60026;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(254, 0, 42, 0.25);
    }

    .btn-auth:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .auth-footer {
        text-align: center;
        margin-top: 32px;
        font-size: 14px;
        color: #666;
    }

    .auth-link {
        color: var(--secondary-blue);
        font-weight: 700;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .auth-link:hover {
        color: #4640d0;
        text-decoration: underline;
    }

    .response-msg {
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 24px;
        display: none;
        animation: fadeIn 0.3s ease;
    }

    .msg-success {
        display: block;
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #d1fae5;
    }

    .msg-error {
        display: block;
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fee2e2;
    }

    .msg-info {
        display: block;
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .spinner {
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top: 3px solid #fff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Forgot Password</h2>
            <p>Enter your email address to receive an OTP.</p>
        </div>

        <div id="forgot_response" class="response-msg"></div>

        <form id="forgotForm">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" id="email" class="form-input" placeholder="your@email.com" required>
            </div>

            <button type="submit" class="btn-auth" id="forgotBtn">
                <span class="spinner" id="spinner"></span>
                <span id="btnText">Send OTP</span>
            </button>
        </form>

        <div class="auth-footer">
            Remembered your password? <a href="<?= base_url('login') ?>" class="auth-link">Log In</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('forgotForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const responseBox = document.getElementById('forgot_response');
        const forgotBtn = document.getElementById('forgotBtn');
        const spinner = document.getElementById('spinner');
        const btnText = document.getElementById('btnText');
        
        const email = document.getElementById('email').value.trim();
        
        if (!email) {
            showMsg('Please enter your email.', 'error');
            return;
        }

        // UI Feedback
        forgotBtn.disabled = true;
        spinner.style.display = 'block';
        btnText.innerText = 'Sending...';
        responseBox.style.display = 'none';

        try {
            const res = await fetch('<?= base_url('forgot-password') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email })
            });
            
            const data = await res.json();
            
            if (data.success) {
                let msgClass = data.mocked ? 'info' : 'success';
                showMsg(data.message, msgClass);
                
                setTimeout(() => { 
                    window.location.href = '<?= base_url('reset-password') ?>'; 
                }, data.mocked ? 6000 : 2000); // 6 seconds for mocked so user can read OTP
            } else {
                showMsg(data.message, 'error');
                resetBtn();
            }
        } catch (err) {
            showMsg('An error occurred. Please try again.', 'error');
            resetBtn();
        }

        function showMsg(msg, type) {
            responseBox.innerText = msg;
            responseBox.style.display = 'block';
            if (type === 'success') {
                responseBox.className = 'response-msg msg-success';
            } else if (type === 'error') {
                responseBox.className = 'response-msg msg-error';
            } else if (type === 'info') {
                responseBox.className = 'response-msg msg-info';
            }
        }

        function resetBtn() {
            forgotBtn.disabled = false;
            spinner.style.display = 'none';
            btnText.innerText = 'Send OTP';
        }
    });
</script>

<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>
