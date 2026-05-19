<section class="py-10 md:py-16 font-poppins bg-[#F9F9FB]">
    <div class="w-full max-w-full sm:max-w-3xl md:max-w-5xl mx-auto px-4">

        <div class="text-center mb-8">
            <span class="inline-block bg-[#EFEEFE] text-[#5751E1] font-medium font-poppins text-xs sm:text-sm px-3 sm:px-4 py-1 rounded-full mb-3">
                Hire Talent
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 font-poppins capitalize">
                Submit Your Hiring Requirement
            </h2>
            <p class="text-gray-500 mt-2 text-sm sm:text-base max-w-lg mx-auto">
                Let us know your staffing needs, and we'll connect you with our top certified tax and finance professionals.
            </p>
        </div>

        <!-- RIGHT FORM -->
        <div class="bg-white rounded-2xl p-6 md:p-8 w-full max-w-2xl mx-auto border border-[#E3E3E3] shadow-[0px_0px_30px_0px_#E8E8E8]">

                <h3 class="text-xl md:text-2xl font-semibold mb-6 text-[#161439] text-center">
                    Submit your Hiring Requirement
                </h3>

                <form class="space-y-5">

                    <!-- Organisation Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Organisation Name</label>
                        <input id="organisation_name" type="text" placeholder="Enter Organisation Name"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">
                            Contact Number
                            <span class="text-[#FE002A] text-xs">(Enter A Valid Phone Number)</span>
                        </label>

                        <input id="contact_number" type="tel"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]"
                            placeholder="Enter phone number">
                    </div>

                    <!-- Full Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Full Name</label>
                        <input id="full_name" type="text" placeholder="Enter Full Name"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" type="email" placeholder="Enter Your Email Address"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>


                    <!-- Requirement Type -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Requirement Type</label>
                        <select id="requirement_type"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                            <option value="">Select Requirement Type</option>
                            <option>Full Time</option>
                            <option>Part Time</option>
                            <option>Project-Based</option>
                        </select>
                    </div>

                    <!-- Skills -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Skills</label>
                        <select id="skills"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                            <option value="">Select Skills</option>
                            <option>EA Expert</option>
                            <option>CMA Expert</option>
                            <option>AI Expert</option>
                            <option>Tax Professional</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" rows="3" placeholder="Write your message..."
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]"></textarea>
                    </div>



                    <button id="submitBtn" type="button" onclick="hiring_requests_form_submit()"
                        class="w-full bg-[#FE002A] text-white py-2 rounded-lg font-semibold flex justify-center items-center gap-2">

                        <span id="btnText">Submit Application</span>

                        <!-- Font Awesome Spinner -->
                        <i id="btnSpinner" class="fa fa-spinner fa-spin hidden"></i>

                    </button>

                </form>
            </div>

    </div>
</section>

<script>
    // ✅ function must be OUTSIDE
    function hiring_requests_form_submit(event) {
        if (event) event.preventDefault();

        const btn = document.getElementById("submitBtn");
        const btnText = document.getElementById("btnText");
        const spinner = document.getElementById("btnSpinner");

        function resetButton() {
            spinner.classList.add("hidden");
            btnText.innerText = "Submit Application";
            btn.disabled = false;
        }

        // ✅ SAFE GET VALUE FUNCTION
        function getValue(id) {
            const el = document.getElementById(id);
            return el ? el.value.trim() : "";
        }

        // ✅ START LOADING
        spinner.classList.remove("hidden");
        btnText.innerText = "Processing...";
        btn.disabled = true;

        // ✅ GET VALUES
        const organisation_name = getValue("organisation_name");
        const full_name = getValue("full_name");
        const email = getValue("email");
        const contact_number = getValue("contact_number");
        const requirement_type = getValue("requirement_type");
        const skills = getValue("skills");
        const message = getValue("message");


        // ✅ VALIDATION
        if (!organisation_name || !full_name || !email || !requirement_type) {
            showModal("error", "Error", "Please fill all required fields");
            return resetButton();
        }


        // ✅ JSON OBJECT (MATCH YOUR BACKEND)
        const payload = {
            organisation_name,
            contact_number,
            full_name,
            email,
            requirement_type,
            skills,
            message
        };

        const url = "<?= base_url('api/hiring_requests_form_submit') ?>";

        fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                console.log("Response:", data);

                if (data.status === "success" || data.status === 200) {
                    showModal("success", "Success", data.message || "Form submitted successfully");

                    // ✅ RESET FORM
                    ["organisation_name", "full_name", "email", "requirement_type", "skills", "message"]
                    .forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.value = "";
                    });


                } else {
                    showModal("error", "Error", data.message || "Something went wrong");
                }

                resetButton();
            })
            .catch(error => {
                console.error("Error:", error);
                showModal("error", "Server Error", "Server error or invalid response!");
                resetButton();
            });
    }
</script>