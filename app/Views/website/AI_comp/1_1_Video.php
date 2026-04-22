<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.min.css" />
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<style>
    .iti {
        width: 100%;
    }

    .custom-input {
        width: 100%;
        border: 1px solid #E3E3E3;
        border-radius: 8px;
        padding: 12px 14px;
        font-size: 14px;
        outline: none;
        transition: 0.3s;
    }

    .custom-input:focus {
        border-color: #FF002B;
        box-shadow: 0 0 0 2px rgba(255, 0, 43, 0.1);
    }

    .custom-input::placeholder {
        color: #999;
        font-size: 13px;
    }

    textarea.custom-input {
        resize: none;
    }
</style>

<div class="bg-white py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 ">

    <div class="max-w-7xl mx-auto px-0 py-0 text-center">

        <!-- Top Badge -->
        <span
            class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
            1:1 Video
        </span>


        <!-- Heading -->
        <h2
            class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-3 md:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
            “Confused if Taxation is right for you?”
        </h2>

        <!-- Sub Text -->
        <p
            class="font-normal max-w-3xl mx-auto mb-8 font-poppins text-[#6D6C80]">
            Book a FREE 1:1 Career Counseling
        </p>

    </div>

    <div class="bg-white rounded-xl shadow-2xl flex flex-col md:flex-row max-w-7xl mx-auto w-full  overflow-hidden border border-gray-100">

        <!-- LEFT 35% -->
        <div class="w-full md:w-[30%] p-4 sm:p-6 md:p-10 flex flex-col items-center md:items-center">
            <div class="relative">
                <div class="w-40 h-40 rounded-full overflow-hidden shadow-lg mb-2">
                    <img src="<?= base_url('public/images/EA/1_1_Video/c58b480491e6b1a4f75342b6d0c6c79131ee5730.jpg') ?>" alt="Career Expert"
                        class="w-full h-full object-cover">
                </div>
                <p class="font-medium text-[15px] leading-[47.88px] tracking-[-0.75px] text-gray-800 capitalize text-center font-poppins">Career Expert</p>
            </div>


            <div class="w-full font-poppins">
                <p class="font-medium text-[18px] leading-[47.88px] tracking-[-0.75px] text-gray-900 capitalize mb-1">How It Works :</p>
                <ul class="space-y-2">
                    <li class="flex items-start font-normal text-[14px] leading-[40.88px] tracking-[-0.75px] text-gray-600 capitalize">
                        <span class="mr-2">→</span>
                        <span>Submit your details to book a free 1:1 session.</span>
                    </li>
                    <li class="flex items-start font-normal text-[14px] leading-[40.88px] tracking-[-0.75px] text-gray-600 capitalize">
                        <span class="mr-2">→</span>
                        <span>Connect directly with our tax mentors.</span>
                    </li>
                    <li class="flex items-start font-normal text-[14px] leading-[40.88px] tracking-[-0.75px] text-gray-600 capitalize">
                        <span class="mr-2">→</span>
                        <span>Receive a personalized roadmap for your EA career.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- RIGHT 65% -->
        <div class="w-full md:w-[70%] p-3 font-poppins">
            <div class="p-[2px] rounded-xl bg-[linear-gradient(116.15deg,#FE002A_0%,#5751E1_97.55%)]">
                <div class="bg-white rounded-[14px] px-3 py-3 sm:px-6 sm:py-6 md:px-8 md:py-8">
                    <h2 class="font-poppins text-[16px] sm:text-[18px] font-semibold text-center text-gray-900 leading-[28px] sm:leading-[64.8px] mb-4 sm:mb-8">Submit Your Query and Get a Call</h2>

                    <form class="p-0 md:p-3">

                        <!-- NAME -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="custom-input" placeholder="First Name*">
                            </div>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="custom-input" placeholder="Last Name*">
                            </div>
                        </div>

                        <!-- PHONE + EMAIL -->
                        <div class="row g-3 mb-3">

                            <!-- PHONE -->
                            <div class="col-md-6">
                                <input id="phone" type="tel" class="custom-input">
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-6">
                                <input id="email" type="email" class="custom-input" placeholder="Email Address">
                            </div>
                        </div>

                        <!-- MESSAGE -->
                        <div class="mb-3">
                            <textarea id="query" rows="6" class="custom-input" placeholder="Query type here....."></textarea>
                        </div>

                        <!-- SUBMIT -->

                        <button id="submitBtn" type="button" onclick="form_submit()" class="w-full bg-[#FE002A] text-white py-2 rounded-lg font-semibold flex justify-center items-center gap-2">

                            <span id="btnText">Send Query & Book Counselling</span>

                            <!-- Font Awesome Spinner -->
                            <i id="btnSpinner" class="fa fa-spinner fa-spin hidden"></i>

                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    let iti; // ✅ global

    document.addEventListener("DOMContentLoaded", function() {

        const input = document.querySelector("#phone");

        // ✅ store instance
        iti = window.intlTelInput(input, {
            initialCountry: "in",
            separateDialCode: true,
            preferredCountries: ["in", "us", "gb"],
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
        });

    });

    // ✅ function must be OUTSIDE

    function form_submit(event) {
        if (event) event.preventDefault();

        let btn = document.getElementById("submitBtn");
        let btnText = document.getElementById("btnText");
        let spinner = document.getElementById("btnSpinner");

        function resetButton() {
            spinner.classList.add("hidden");
            btnText.innerText = "Get Your Professional Study Plan";
            btn.disabled = false;
        }

        // Start loading
        spinner.classList.remove("hidden");
        btnText.innerText = "Processing...";
        btn.disabled = true;

        let first_name = document.getElementById("first_name").value.trim();
        let last_name = document.getElementById("last_name").value.trim();
        let email = document.getElementById("email").value.trim();
        let query = document.getElementById("query").value.trim();

        if (!iti) {
            showModal("error", "Error", "Phone input not initialized");
            return resetButton();
        }

        let phone = iti.getNumber();

        // ✅ FIXED VALIDATION
        if (!first_name || !last_name || !email || !query) {
            showModal("error", "Error", "Please fill all fields");
            return resetButton();
        }

        if (!iti.isValidNumber()) {
            showModal("error", "Error", "Please enter a valid phone number");
            return resetButton();
        }

        let formDataObj = new FormData();
        formDataObj.append("first_name", first_name);
        formDataObj.append("last_name", last_name);
        formDataObj.append("email", email);
        formDataObj.append("phone", phone);
        formDataObj.append("query", query);


        let url = "<?= base_url('api/submit_Query_form') ?>";

        fetch(url, {
                method: "POST",
                body: formDataObj
            })
            .then(async response => {
                let text = await response.text();
                try {
                    return JSON.parse(text);
                } catch {
                    throw new Error("Invalid JSON response: " + text);
                }
            })
            .then(data => {
                console.log("Response:", data);

                if (data.status === "success" || data.status === 200) {
                    showModal("success", "Success", data.message || "Form submitted successfully");

                    // ✅ CORRECT RESET
                    document.getElementById("first_name").value = "";
                    document.getElementById("last_name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("query").value = "";
                    iti.setNumber("");

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