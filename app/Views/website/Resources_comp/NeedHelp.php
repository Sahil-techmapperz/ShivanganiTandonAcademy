<section class="bg-[#FFFFFF] pt-0 pb-5 sm:py-14 md:py-16 px-2 sm:px-3 md:px-4 font-poppins">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 md:px-4">

        <!-- Header -->
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-4xl font-bold mt-0 text-[#161439]">
                Need Help?
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                when known printer took a galley of type scramble edmake
            </p>
        </div>

        <div class="relative flex flex-col md:flex-row items-center">

            <div class="bg-gray-100 p-6 sm:p-8 md:p-12 rounded-lg md:w-[60%] shadow-sm">
                <div class="mb-6">
                    <span class="px-4 py-1.5 border-2 border-[#999999] rounded-full text-[16px] leading-[19.2px] text-[#5D666F] font-normal font-dmsans inline-block mb-4 align-middle">
                        Make an Appointment
                    </span>
                    <p class="text-2xl sm:text-3xl md:text-[28px] leading-snug sm:leading-[48px] md:leading-[64.8px] font-medium text-[#1C2539] font-poppins">
                        Request a free quote
                    </p>
                </div>

                <form class="space-y-4" id="contactForm">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input id="full_name_help_need" type="text" placeholder="Your Name" class="w-full px-4 py-2 rounded-lg border border-transparent focus:ring-2 focus:ring-indigo-500 outline-none font-poppins font-normal text-[15px] leading-[100%] tracking-normal text-[#5D666F]">
                        <input id="number_help_need" type="text" placeholder="Number" class="w-full px-4 py-2 rounded-lg border border-transparent focus:ring-2 focus:ring-indigo-500 outline-none font-poppins font-normal text-[15px] leading-[100%] tracking-normal text-[#5D666F]">
                    </div>
                    <input id="email_help_need" type="email" placeholder="Email" class="w-full px-4 py-2 rounded-lg border border-transparent focus:ring-2 focus:ring-indigo-500 outline-none font-poppins font-normal text-[15px] leading-[100%] tracking-normal text-[#5D666F]">
                    <textarea id="message_help_need" placeholder="Type Your Message" rows="5" class="w-full px-4 py-2 rounded-lg border border-transparent focus:ring-2 focus:ring-indigo-500 outline-none font-poppins font-normal text-[15px] leading-[100%] tracking-normal text-[#5D666F]"></textarea>

                    <button id="submitBtn_need_help" type="button" onclick="submitNeedHelpForm(event)" class="bg-[#5751E1] hover:bg-indigo-700 text-[#FFFFFF] font-semibold py-2 px-6 rounded-lg transition-colors relative w-full sm:w-auto">
                        <span id="btnText_need_help">Submit Message</span>
                        <i id="btnSpinner_need_help" class="fa fa-spinner fa-spin hidden"></i>
                    </button>
                </form>
            </div>

            <div class="bg-[#5751E1] text-[#FFFFFF] p-6 md:p-10 rounded-xl w-full md:w-2/5 mt-6 md:mt-0 md:-ml-5 shadow-2xl z-10">

                <p class="text-2xl md:text-3xl font-semibold mb-6 md:mb-8 leading-[36px] md:leading-[54px] text-[#FFFFFF] relative">
                    Contact Us
                    <!-- Lines under text -->
                    <span class="absolute left-0 -bottom-1 flex space-x-1 md:space-x-2">
                        <span class="block h-1 w-8 md:w-12 bg-[#FFFFFF]"></span>
                        <span class="block h-1 w-3 md:w-4 bg-[#FFFFFF]"></span>
                    </span>
                </p>

                <div class="space-y-6 md:space-y-8">

                    <!-- Call Us -->
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-[#FFFFFF] rounded-full flex items-center justify-center flex-shrink-0">
                            <img class="w-4 h-4 md:w-4 md:h-4" src="<?= base_url('public/images/Resources/need_help/Vector1.png') ?>" alt="">
                        </div>
                        <div>
                            <p class="text-[#B3B7C1] font-dmsans font-normal text-sm md:text-base leading-5 md:leading-[22.4px]">Call Us 24/7</p>
                            <p class="text-lg md:text-[22px] leading-6 md:leading-[30.8px] font-medium text-[#FFFFFF] font-dmsans">+256 56778.5678</p>
                        </div>
                    </div>

                    <!-- Work With Us -->
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-[#FFFFFF] rounded-full flex items-center justify-center flex-shrink-0">
                            <img class="w-4 h-4 md:w-4 md:h-4" src="<?= base_url('public/images/Resources/need_help/Vector2.png') ?>" alt="">
                        </div>
                        <div>
                            <p class="text-[#B3B7C1] font-dmsans font-normal text-sm md:text-base leading-5 md:leading-[22.4px]">Work with us</p>
                            <p class="text-lg md:text-[22px] leading-6 md:leading-[30.8px] font-medium text-[#FFFFFF] font-dmsans">info@Invena.com</p>
                        </div>
                    </div>

                    <!-- Your Location -->
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-[#FFFFFF] rounded-full flex items-center justify-center flex-shrink-0">
                            <img class="w-4 h-4 md:w-4 md:h-4" src="<?= base_url('public/images/Resources/need_help/Vector3.png') ?>" alt="">
                        </div>
                        <div>
                            <p class="text-[#B3B7C1] font-dmsans font-normal text-sm md:text-base leading-5 md:leading-[22.4px]">Your location</p>
                            <p class="text-lg md:text-[22px] leading-6 md:leading-[30.8px] font-medium text-[#FFFFFF] font-dmsans">125 Town, United State</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<script>
    async function submitNeedHelpForm(event) {
        if (event) event.preventDefault();

        const btn = document.getElementById("submitBtn_need_help");
        const btnText_need_help = document.getElementById("btnText_need_help");
        const spinner = document.getElementById("btnSpinner_need_help");

        if (!btn || !btnText_need_help || !spinner) {
            console.error("Button elements not found!");
            return;
        }

        const name = document.getElementById("full_name_help_need").value.trim();
        const phone = document.getElementById("number_help_need").value.trim();
        const email = document.getElementById("email_help_need").value.trim();
        const message = document.getElementById("message_help_need").value.trim();

        const apiURL = "<?= base_url('api/submitHelp') ?>";

        // Regex
        const nameRegex = /^[a-zA-Z\s]{3,50}$/;
        const phoneRegex = /^[6-9]\d{9}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validation helper
        const validate = (condition, msg) => {
            if (!condition) {
                showModal("error", "Validation Error", msg);
                toggleButton(false);
                return false;
            }
            return true;
        };

        if (!validate(name, "Full Name is required")) return;
        if (!validate(nameRegex.test(name), "Enter valid name (3-50 letters only)")) return;

        if (!validate(phone, "Phone number is required")) return;
        if (!validate(phoneRegex.test(phone), "Enter valid 10-digit Indian mobile number")) return;

        if (!validate(email, "Email is required")) return;
        if (!validate(emailRegex.test(email), "Enter valid email address")) return;

        if (!validate(message, "Message cannot be empty")) return;
        if (!validate(message.length >= 10, "Message must be at least 10 characters")) return;

        try {
            const res = await fetch(apiURL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    name,
                    phone,
                    email,
                    message
                })
            });

            // Handle HTTP error
            if (!res.ok) {
                throw new Error(`HTTP Error: ${res.status}`);
            }

            let data;
            try {
                data = await res.json();
            } catch (e) {
                const text = await res.text();
                console.log("❌ Raw response:", text);
                throw new Error("Invalid JSON response");
            }

            if (data.status === "success") {
                showModal("success", "Success", data.message);
                document.getElementById("contactForm").reset();
            } else {
                showModal("error", "Error", data.message || "Something went wrong");
            }

        } catch (err) {
            console.error("Fetch Error:", err);
            showModal("error", "Error", err.message || "Server error, try again later");
        } finally {
            toggleButton(false);
        }
    }


    // ✅ Centralized button handler
    function toggleButton(isLoading) {
        const btn = document.getElementById("submitBtn_need_help");
        const btnText_need_help = document.getElementById("btnText_need_help");
        const spinner = document.getElementById("btnSpinner_need_help");

        if (!btn || !btnText_need_help || !spinner) return;

        if (isLoading) {
            spinner.classList.remove("hidden");
            btnText_need_help.innerText = "Processing...";
            btn.disabled = true;
        } else {
            spinner.classList.add("hidden");
            btnText_need_help.innerText = "Submit Message";
            btn.disabled = false;
        }
    }
</script>