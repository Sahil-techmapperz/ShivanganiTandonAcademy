<style>
    /* Modal Overlay */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        overflow-y: auto;
    }

    /* Modal Box */
    .custom-modal-content {
        background: #fff;
        margin: 5% auto;
        padding: 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 700px;
        position: relative;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            transform: scale(0.9);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Close Button */
    .custom-modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        color: #333;
    }

    .custom-modal-close:hover {
        color: #6a11cb;
    }

    /* Form Heading */
    .hTz924 {
        text-align: center;
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* Form Layout */
    .bQx235 {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .aRt591 {
        flex: 1;
    }

    .aRt591 label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        color: #0C0043;
        font-weight: 500;
    }

    .aRt591 input,
    .aRt591 select {
        width: 100%;
        padding: 10px;
        background: #F8F7FF;
        border: 1px solid #cfcff0;
        border-radius: 6px;
        font-size: 14px;
    }

    /* Extra Fields (SMM / SEO) */
    .hidden-input-field {
        display: none;
    }

    .dLp443 {
        margin: 10px 0;
        font-size: 14px;
        font-weight: 600;
        color: #0C0043;
    }

    .yNw772 {
        display: inline-block;
        padding: 4px 12px;
        margin-left: 5px;
        background: #f5f5ff;
        border: 1px solid #cfcff0;
        border-radius: 5px;
        font-size: 13px;
        font-weight: 600;
    }

    /* Custom Checkbox */
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 8px;
    }

    .checkbox-group label {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        color: #0C0043;
        position: relative;
        padding-left: 28px;
    }

    /* Hide default checkbox */
    .checkbox-group input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Custom box */
    .checkbox-group label span::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 18px;
        height: 18px;
        border: 2px solid #6a11cb;
        border-radius: 4px;
        background: #fff;
        transition: all 0.2s ease-in-out;
    }

    /* Checkmark */
    .checkbox-group input[type="checkbox"]:checked+span::before {
        content: "✔";
        font-size: 13px;
        color: #fff;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        border-color: #2575fc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Submit Button */
    .pOk668 {
        display: block;
        width: 100%;
        margin-top: 20px;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        padding: 12px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .pOk668:hover {
        opacity: 0.9;
    }

    .styled-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        border-radius: 6px;
        background: #F8F7FF;
        border: 1px solid #cfcff0;
        padding: 6px 14px;
        font-size: 14px;
        font-weight: 700;
        color: #0C0043;
        text-align: center;
        cursor: pointer;
        outline: none;
        width: auto;
        min-width: 70px;
        transition: all 0.2s ease;
    }

    .styled-select option {
        font-weight: 600;
        color: #0C0043;
    }


    /* Responsive */
    @media (max-width: 768px) {
        .bQx235 {
            flex-direction: column;
            gap: 10px;
        }

        .custom-modal-content {
            padding: 20px;
        }
    }
</style>

<!-- Modal -->
<div id="quoteModal" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-modal-close" id="closeQuoteModal">&times;</span>
        <h2 class="hTz924">Fill the Form</h2>
        <div id="quoteFormMessage" style="margin-bottom: 15px; display: none; padding: 10px; border-radius: 5px;"></div>


        <form id="quoteForm">
            <!-- Business + Full Name -->
            <div class="bQx235">
                <div class="aRt591">
                    <label>Business Name*</label>
                    <input type="text" name="businessName" required>
                </div>
                <div class="aRt591">
                    <label>Full Name*</label>
                    <input type="text" name="fullName" required>
                </div>
            </div>

            <!-- Mobile + Email -->
            <div class="bQx235">
                <div class="aRt591">
                    <label>Mobile Number*</label>
                    <input type="text" name="mobile" required>
                </div>
                <div class="aRt591">
                    <label>Email Address*</label>
                    <input type="email" name="email" required>
                </div>
            </div>

            <!-- Service Dropdown -->
            <div class="bQx235">
                <div class="aRt591">
                    <label>Services*</label>
                    <select id="services" name="services" required>
                        <option value="">-- Select Service --</option>
                        <option value="smm">SMM</option>
                        <option value="seo">SEO</option>
                    </select>
                </div>
            </div>

            <!-- SMM Fields -->
            <div id="smm-fields" class="hidden-input-field">
                <div class="bQx235">
                    <div class="aRt591">
                        <label>Required Post Per Month*</label>
                        <input type="number" name="posts">
                    </div>
                    <div class="aRt591">
                        <label>Reels/Video Count*</label>
                        <input type="number" name="reels">
                    </div>
                </div>

                <div class="dLp443">
                    ● Paid Advertisement:
                    <select name="paidAdvertisement" class="styled-select">
                        <option value="YES" selected>YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <div class="dLp443">
                    ● Google My Business Profile:
                    <select name="googleMyBusiness" class="styled-select">
                        <option value="YES">YES</option>
                        <option value="NO" selected>NO</option>
                    </select>
                </div>


            </div>

            <!-- SEO Fields -->
            <div id="seo-fields" class="hidden-input-field">
                <div class="bQx235">
                    <div class="aRt591">
                        <label>Website URL*</label>
                        <input type="url" name="website">
                    </div>
                </div>

                <div class="bQx235">
                    <div class="aRt591">
                        <label>Number of Keywords*</label>
                        <input type="number" name="keywords">
                    </div>
                </div>

                <div class="aRt591">
                    <label>SEO Services*</label>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="seoServices[]" value="On-Page">
                            <span>On-Page SEO</span>
                        </label>
                        <label>
                            <input type="checkbox" name="seoServices[]" value="Technical">
                            <span>Technical SEO</span>
                        </label>
                        <label>
                            <input type="checkbox" name="seoServices[]" value="Off-Page">
                            <span>Off-Page SEO</span>
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="pOk668">SUBMIT</button>
        </form>
    </div>
</div>

<script>
    const quoteModal = document.getElementById('quoteModal');
    const openBtn = document.getElementById('openQuoteModal');
    const closeBtn = document.getElementById('closeQuoteModal');

    // Open modal
    if (openBtn) {
        openBtn.onclick = () => {
            quoteModal.style.display = "block";
        }
    }
    // Close modal
    closeBtn.onclick = () => {
        quoteModal.style.display = "none";
    }
    // Click outside closes modal
    window.onclick = (e) => {
        if (e.target === quoteModal) quoteModal.style.display = "none";
    }

    // Toggle fields
    const services = document.getElementById("services");
    const smmFields = document.getElementById("smm-fields");
    const seoFields = document.getElementById("seo-fields");

    services.addEventListener("change", function() {
        smmFields.style.display = "none";
        seoFields.style.display = "none";

        if (this.value === "smm") smmFields.style.display = "block";
        if (this.value === "seo") seoFields.style.display = "block";
    });


    document.getElementById("quoteForm").addEventListener("submit", async (e) => {
        e.preventDefault();

        const form = e.target;
        const messageDiv = document.getElementById("quoteFormMessage");
        const formData = new FormData(form);

        try {
            const response = await fetch("<?= base_url('api/save-quote'); ?>", {
                method: "POST",
                body: formData
            });

            const text = await response.text();
            console.log("Raw response:", text);

            let result;
            try {
                result = JSON.parse(text);
            } catch (err) {
                messageDiv.style.display = "block";
                messageDiv.style.backgroundColor = "#f8d7da"; // red
                messageDiv.style.color = "#842029";
                messageDiv.innerText = "⚠️ Invalid JSON returned by server. Check console/logs.";
                setTimeout(() => messageDiv.style.display = "none", 5000); // hide after 5s
                return;
            }

            if (result.status) {
                messageDiv.style.display = "block";
                messageDiv.style.backgroundColor = "#d1e7dd"; // green
                messageDiv.style.color = "#0f5132";
                messageDiv.innerText = "✅ " + result.message;

                form.reset();

                // Hide message and modal after 5 seconds
                setTimeout(() => {
                    document.getElementById("quoteModal").style.display = "none";
                    messageDiv.style.display = "none";
                }, 5000);

            } else {
                messageDiv.style.display = "block";
                messageDiv.style.backgroundColor = "#f8d7da"; // red
                messageDiv.style.color = "#842029";
                messageDiv.innerText = "❌ " + result.message;

                // Hide message after 5 seconds
                setTimeout(() => messageDiv.style.display = "none", 5000);
            }
        } catch (error) {
            console.error("Error:", error);
            messageDiv.style.display = "block";
            messageDiv.style.backgroundColor = "#f8d7da"; // red
            messageDiv.style.color = "#842029";
            messageDiv.innerText = "⚠️ Something went wrong. Please try again.";

            // Hide message after 5 seconds
            setTimeout(() => messageDiv.style.display = "none", 5000);
        }
    });
</script>

</script>