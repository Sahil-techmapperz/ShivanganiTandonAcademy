<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css" />

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

<style>
    /* Full width */
    .iti {
        width: 100%;
    }

    /* Input style */
    .iti input {
        width: 100%;
        height: 48px;
        padding-left: 85px !important;
        /* space for flag + code */
        border-radius: 12px;
        border: 1px solid #d1d5db;
        font-size: 14px;
    }

    /* Flag container */
    .iti__flag-container {
        left: 0;
        padding: 0;
    }

    /* Selected flag box */
    .iti__selected-flag {
        height: 48px;
        padding: 0 12px;
        display: flex;
        align-items: center;
        border-right: 1px solid #e5e7eb;
        background-color: #f9fafb;
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }

    /* Country code text (+91) */
    .iti__selected-dial-code {
        margin-left: 6px;
        font-size: 14px;
        color: #374151;
    }

    /* Dropdown arrow spacing */
    .iti__arrow {
        margin-left: 6px;
    }

    /* Focus fix */
    .iti input:focus {
        outline: none;
    }
</style>


<section class="bg-[#F5F6FA] py-10 md:py-16 font-poppins">
    <div class="w-full max-w-full sm:max-w-3xl md:max-w-5xl lg:max-w-7xl mx-auto px-1 sm:px-4 md:px-6 lg:px-8 xl:px-10">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <!-- LEFT SIDE -->
            <div class="space-y-4 sm:space-y-5 md:space-y-6 about_us_text">

                <!-- Badge -->
                <div class="inline-block bg-[#FFDFE4] text-[#FE002A] text-sm px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3 mb-4">
                    <img src="<?= base_url('public/images/CMA/FormImage/fire 1.png') ?>" alt="">
                    Limited Seats - Next Batch Start Soon !
                </div>




                <p class="mt-1 sm:mt-2  mb-1 sm:mb-2 text-[22px] leading-[30px] sm:text-[28px] sm:leading-[36px] md:text-[36px] md:leading-[47px] tracking-[-0.5px] sm:tracking-[-0.75px] font-bold text-gray-800 font-poppins capitalize">
                    Thousand Of Top
                    <span class="relative inline-block px-4 py-1 text-white font-bold">

                        <!-- Background -->
                        <span class="absolute inset-0 bg-[url('<?= base_url('public/images/homePageImages/GetMoreAboutUs/Vector (1).png') ?>')] bg-center bg-no-repeat bg-contain"></span>

                        <!-- Text -->
                        <span class="relative z-10">COURSES</span>

                    </span> <br> Now in One Place
                </p>

                <!-- Image -->
                <div class="relative flex justify-center lg:justify-start">
                    <img class="w-[200px] md:w-[260px] object-contain"
                        src="<?= base_url('public/images/CMA/FormImage/student.png') ?>"
                        alt="student">
                </div>

                <!-- Students -->
                <div class="flex items-center justify-center lg:justify-start gap-3 mt-4">

                    <div class="flex -space-x-3">
                        <img class="w-8 h-8 rounded-full border-2 border-white"
                            src="<?= base_url('public/images/homePageImages/home_banner/shivani.png') ?>">
                        <img class="w-8 h-8 rounded-full border-2 border-white"
                            src="<?= base_url('public/images/homePageImages/home_banner/aniket.png') ?>">
                        <img class="w-8 h-8 rounded-full border-2 border-white"
                            src="<?= base_url('public/images/homePageImages/home_banner/shivani.png') ?>">
                        <img class="w-8 h-8 rounded-full border-2 border-white"
                            src="<?= base_url('public/images/homePageImages/home_banner/aniket.png') ?>">
                    </div>

                    <p class="text-gray-600 text-sm font-medium">
                        2,00,000+ Students Placed
                    </p>
                </div>

                <!-- Rating -->
                <div class="flex items-center justify-center lg:justify-start gap-1 sm:gap-2 flex-wrap">

                    <img src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>"
                        class="w-4 h-4 sm:w-5 sm:h-5" alt="">

                    <img src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>"
                        class="w-4 h-4 sm:w-5 sm:h-5" alt="">

                    <img src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>"
                        class="w-4 h-4 sm:w-5 sm:h-5" alt="">

                    <img src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>"
                        class="w-4 h-4 sm:w-5 sm:h-5" alt="">

                    <img src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>"
                        class="w-4 h-4 sm:w-5 sm:h-5" alt="">

                    <p class="text-gray-600 text-xs sm:text-sm font-medium ml-1 sm:ml-2">
                        4.5/5 Rating
                    </p>

                </div>

            </div>


            <!-- RIGHT FORM -->
            <div class="bg-white rounded-2xl p-6 md:p-8 w-full border border-[#E3E3E3] shadow-[0px_0px_30px_0px_#E8E8E8]">

                <h3 class="text-xl md:text-2xl font-semibold mb-6 text-[#161439] text-center">
                    Start Your CMA Journey In USA
                </h3>

                <form class="space-y-5">

                    <!-- Full Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" type="text" placeholder="Enter Your Full Name"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" type="email" placeholder="Enter Your Email Address"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">
                            Phone Number
                            <span class="text-[#FE002A] text-xs">(Enter A Valid Phone Number)</span>
                        </label>
                        <br>

                        <input id="phone" type="tel"
                            class="w-full mt-1 h-11 px-4 rounded-lg outline-none focus:ring-2 focus:ring-[#FE002A] focus:border-[#FE002A]"
                            placeholder="Enter phone number">
                    </div>

                    <!-- Profession -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Profession</label>

                        <div class="flex gap-3 mt-2 flex-col sm:flex-row">

                            <!-- Student -->
                            <label class="flex-1 cursor-pointer">
                                <input id="student" type="radio" name="profession" value="student" class="hidden peer" checked>

                                <div class="flex justify-center items-center gap-3 py-2 rounded-full font-medium 
                         border border-gray-300 text-gray-700
                        peer-checked:bg-[#FE002A] peer-checked:text-white peer-checked:border-[#FE002A] transition">

                                    Student
                                </div>
                            </label>

                            <!-- Working Professional -->
                            <label class="flex-1 cursor-pointer">
                                <input id="working" type="radio" name="profession" value="working" class="hidden peer">

                                <div class="flex justify-center items-center gap-3 py-2 rounded-full font-medium 
                         border border-gray-300 text-gray-700
                        peer-checked:bg-[#FE002A] peer-checked:text-white peer-checked:border-[#FE002A] transition">

                                    Working Professional
                                </div>
                            </label>

                        </div>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Location</label>
                        <input id="location" type="text" placeholder="Enter Your Location"
                            class="w-full mt-1 px-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF0033]">
                    </div>

                    <!-- Submit -->
                    <!-- <button type="button" onclick="form_submit()"
                        class="w-full bg-[#FE002A] text-white py-2 rounded-lg font-semibold text-sm sm:text-md md:text-lg hover:bg-[#FE002A] transition">
                        Get Your Professional Study Plan
                    </button> -->

                    <button id="submitBtn" type="button" onclick="form_submit()"
                        class="w-full bg-[#FE002A] text-white py-2 rounded-lg font-semibold flex justify-center items-center gap-2">

                        <span id="btnText">Get Your Professional Study Plan</span>

                        <!-- Font Awesome Spinner -->
                        <i id="btnSpinner" class="fa fa-spinner fa-spin hidden"></i>

                    </button>

                </form>
            </div>

        </div>
    </div>
</section>

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
        // ❗ STOP FORM RELOAD
        if (event) event.preventDefault();

        let btn = document.getElementById("submitBtn");
        let btnText = document.getElementById("btnText");
        let spinner = document.getElementById("btnSpinner");

        spinner.classList.remove("hidden");
        btnText.innerText = "Processing...";
        btn.disabled = true;

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let location = document.getElementById("location").value.trim();

        if (!iti) {
            showModal("error", "Error", "Phone input not initialized");
            return resetButton();
        }

        let phone = iti.getNumber();

        let profession = "";
        if (document.getElementById("student").checked) {
            profession = "student";
        } else if (document.getElementById("working").checked) {
            profession = "working";
        }

        if (!name || !email || !location) {
            showModal("error", "Error", "Please fill all fields");
            return resetButton();
        }

        if (!iti.isValidNumber()) {
            showModal("error", "Error", "Please enter a valid phone number");
            return resetButton();
        }

        let formDataObj = new FormData();
        formDataObj.append("name", name);
        formDataObj.append("email", email);
        formDataObj.append("phone", phone);
        formDataObj.append("location", location);
        formDataObj.append("profession", profession);

        let url = "<?= base_url('api/form_submit') ?>";

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

                    // ✅ CLEAR FORM
                    document.getElementById("name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("location").value = "";
                    iti.setNumber("");
                    document.getElementById("student").checked = false;
                    document.getElementById("working").checked = false;

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

        function resetButton() {
            spinner.classList.add("hidden");
            btnText.innerText = "Get Your Professional Study Plan";
            btn.disabled = false;
        }
    }
</script>