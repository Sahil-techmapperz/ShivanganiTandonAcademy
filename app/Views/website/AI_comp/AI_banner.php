<section class="py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 bg-[radial-gradient(56.25%_196.73%_at_100%_100%,#1A1A48_0%,#021023_100%)]">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-[60%_40%] gap-10 items-center">

        <!-- Left Content Section -->
        <div class="space-y-8">
            <div class="inline-block px-4 py-1.5 border border-gray-500 rounded-full 
            text-white text-[12px] font-normal leading-[100%] tracking-normal 
            font-poppins mb-2 sm:mb-4 ">
                AI-Powered Finance Career Program
            </div>

            <p class="text-2xl sm:text-3xl lg:text-5xl font-bold leading-snug sm:leading-tight lg:leading-[120%] text-white font-poppins mb-2 sm:mb-4">
                Learn AI-Powered Global Finance Careers
            </p>

            <p class="text-[#6D6C80] text-base sm:text-lg lg:text-[18px] font-medium font-poppins leading-6 sm:leading-7 lg:leading-[27.9px] max-w-full sm:max-w-md align-middle mt-4 mb-2 sm:mb-4">
                Master US Tax (EA), CMA & Industry Software with AI Skills that top firms are already hiring for.
            </p>
<!-- 
            <button class="bg-white text-[#031024] px-6 sm:px-8 py-2 sm:py-3 rounded-md font-poppins font-semibold text-base sm:text-[20px] leading-6 sm:leading-[27.9px] hover:bg-gray-200 transition-colors mt-4">
                Get Started
            </button> -->
        </div>

        <!-- Right Form Section -->
        <div class="relative rounded-2xl shadow-2xl font-poppins overflow-hidden">
            <div class="bg-[#4C5564] sm:p-2 md:p-4">
                <!-- Content Layer -->
                <div class="bg-white p-4 rounded-md">

                    <div class="text-center mb-6">
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">
                            Start Your Global Career Journey
                        </p>
                        <p class="text-[#050b1a] text-[16px] font-semibold leading-[20.9px] text-center capitalize font-poppins">
                            Talk To Our Team And Find The Right Path For Your Career
                        </p>
                    </div>

                    <form class="space-y-4">

                        <input type="text" id="inquiries_first_name" placeholder="First Name*"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">

                        <input type="text" id="inquiries_email" placeholder="Email ID*"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">

                        <input type="tel" id="inquiries_mobile" placeholder="Mobile Number*"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">

                        <!-- Select -->
                        <select id="inquiries_current_status"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em]"
                            style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22currentColor%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3E%3Cpolyline points=%226 9 12 15 18 9%22/%3E%3C/svg%3E');">
                            <option value="">Current Status</option>
                            <option value="STUDENT">Student</option>
                            <option value="FRESHER">Fresher</option>
                            <option value="WORKING_PROFESSIONAL">Working Professional</option>
                            <option value="HOUSE_WIFE">House Wives</option>
                            <option value="OTHERS">Others</option>
                        </select>

                        <select id="inquiries_area_of_interest"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em]"
                            style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22currentColor%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3E%3Cpolyline points=%226 9 12 15 18 9%22/%3E%3C/svg%3E');">
                            <option value="">Area Of Interest</option>
                            <option value="Enrolled Agent (EA)">Enrolled Agent (EA)</option>
                            <option value="CMA">CMA</option>
                            <option value="Tax Software Training">Tax Software Training</option>
                            <option value="AI for Finance">AI for Finance</option>
                            <option value="Not Sure">Not Sure (Need Guidance)</option>
                        </select>

                        <textarea id="inquiries_query" placeholder="Query*" rows="3"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>

                        <button id="inquiries_submitBtn" type="button" onclick="inquiries_form_submit()"
                            class="w-full bg-[#ff002b] text-white py-2 rounded-lg font-bold text-lg hover:bg-[#e60026] transition">
                            <span id="inquiries_btnText">Get Connected</span>

                            <!-- Font Awesome Spinner -->
                            <i id="inquiries_btnSpinner" class="fa fa-spinner fa-spin hidden"></i>

                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function inquiries_form_submit() {

        let btn = document.getElementById("inquiries_submitBtn");
        let btnText = document.getElementById("inquiries_btnText");
        let spinner = document.getElementById("inquiries_btnSpinner");

        function resetButton() {
            spinner.classList.add("hidden");
            btnText.innerText = "Get Connected";
            btn.disabled = false;
        }

        // Start loading
        spinner.classList.remove("hidden");
        btnText.innerText = "Processing...";
        btn.disabled = true;

        let first_name = document.getElementById("inquiries_first_name").value.trim();
        let last_name = document.getElementById("inquiries_email").value.trim();
        let mobile = document.getElementById("inquiries_mobile").value.trim();
        let query = document.getElementById("inquiries_query").value.trim();
        let current_status = document.getElementById("inquiries_current_status").value;
        let area_of_interest = document.getElementById("inquiries_area_of_interest").value;


        // Validation
        // Validation
        if (!first_name || !last_name || !mobile || !query || !current_status || !area_of_interest) {
            showModal("error", "Error", "Please fill all fields");
            resetButton();
            return;
        }

        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let mobilePattern = /^[6-9]\d{9}$/;

        if (!emailPattern.test(last_name)) {
            showModal("error", "Error", "Invalid email");
            resetButton();
            return;
        }

        if (!mobilePattern.test(mobile)) {
            showModal("error", "Error", "Invalid mobile number");
            resetButton();
            return;
        }

        let formDataObj = new FormData();
        formDataObj.append("first_name", first_name);
        formDataObj.append("last_name", last_name);
        formDataObj.append("mobile", mobile);
        formDataObj.append("current_status", current_status);
        formDataObj.append("area_of_interest", area_of_interest);
        formDataObj.append("query", query);

        fetch("<?= base_url('api/submit_inquiry_request') ?>", {
                method: "POST",
                body: formDataObj
            })
            .then(res => res.json())
            .then(data => {

                if (data.status === "success" || data.status === 200) {

                    showModal("success", "Success", data.message || "Submitted!");

                    // Reset fields
                    document.getElementById("inquiries_first_name").value = "";
                    document.getElementById("inquiries_email").value = "";
                    document.getElementById("inquiries_mobile").value = "";
                    document.getElementById("inquiries_query").value = "";
                    document.getElementById("inquiries_current_status").value = "";
                    document.getElementById("inquiries_area_of_interest").value = "";

                } else {
                    showModal("error", "Error", data.message || "Failed");
                }

                resetButton();
            })
            .catch(() => {
                showModal("error", "Error", "Server issue");
                resetButton();
            });
    }
</script>