<style>
    .about_us_text {
        text-align: center;
        /* default mobile */
    }

    /* Tablets and above */
    @media (min-width: 768px) {
        .about_us_text {
            text-align: left;
        }
    }
</style>


<!-- Top Red Bar -->
<div class="bg-[#FE002A] text-white font-poppins">
    <div class="max-w-7xl mx-auto px-4 sm:px-4 md:px-4 lg:px-6 xl:px-8 2xl:px-10 py-2 flex flex-col md:flex-row justify-between items-center gap-2 md:gap-0">

        <!-- Left Icons -->
        <div class="flex items-center gap-3 text-sm sm:text-base md:text-base">
            <?php if($li = get_setting('linkedin_url')): ?>
            <a href="<?= $li ?>"
                target="_blank" rel="noopener noreferrer"
                class="hover:text-gray-200">
                <i class="fab fa-linkedin"></i>
            </a>
            <?php endif; ?>

            <?php if($yt = get_setting('youtube_url')): ?>
            <a href="<?= $yt ?>"
                target="_blank" rel="noopener noreferrer"
                class="hover:text-gray-200">
                <i class="fab fa-youtube"></i>
            </a>
            <?php endif; ?>

            <?php if($fb = get_setting('facebook_url')): ?>
            <a href="<?= $fb ?>"
                target="_blank" rel="noopener noreferrer"
                class="hover:text-gray-200">
                <i class="fab fa-facebook"></i>
            </a>
            <?php endif; ?>
        </div>

        <!-- Center Text -->
        <div class="md:flex text-center flex-1 justify-center text-xs sm:text-sm md:text-base lg:text-base">
            New Batch Starting Soon — Enroll Now & Get 20% Early Bird Discount!
        </div>

        <!-- Right Contact -->
        <div class="flex items-center gap-2 sm:gap-4 flex-wrap justify-center md:justify-end text-xs sm:text-sm md:text-base">
            <span class="flex items-center gap-1"><i class="fas fa-phone"></i> <?= get_setting('site_phone', '+91 7483279284') ?></span>
            <span class="flex items-center gap-1"><i class="fas fa-envelope"></i> <?= get_setting('site_email', 'info@shivanganitandon.com') ?></span>
        </div>

    </div>
</div>

<!-- Sticky Wrapper -->
<div class="sticky top-0 z-50">
    <!-- Main Navbar -->
    <nav class="bg-gray-100 shadow-sm font-poppins">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

            <!-- Logo -->
            <div class="flex items-center gap-2">
                <a href="<?= base_url('/') ?>">
                    <img src="<?= base_url(get_setting('company_logo', 'public/images/commonImages/fcabd6f88b0c3e59d8b5c7fea57132f417ff1545.png')) ?>"
                        alt="Shivangani Tandon Logo"
                        class="h-10 sm:h-12 md:h-14 w-auto"></a>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-gray-700 font-medium text-sm sm:text-base md:text-base">
                <li>
                    <a href="<?= base_url('/') ?>" class="hover:text-[#FE002A]">Home</a>
                </li>

                <li class="relative">
                    <!-- Button -->
                    <button class="courses-btn hover:text-[#FE002A] cursor-pointer">
                        Courses
                    </button>

                    <!-- Dropdown -->
                    <ul class="courses-menu absolute left-0 top-full mt-2 w-40 bg-white border rounded-lg shadow-lg hidden z-50">
                        <li>
                            <a href="<?= base_url('CMA') ?>" class="block px-4 py-2 hover:text-[#FE002A]">CMA</a>
                        </li>
                        <li>
                            <a href="<?= base_url('EA') ?>" class="block px-4 py-2 hover:text-[#FE002A]">EA</a>
                        </li>
                        <li>
                            <a href="<?= base_url('AI') ?>" class="block px-4 py-2 hover:text-[#FE002A]">AI</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('resources') ?>" class="hover:text-[#FE002A]">Resources</a>
                </li>
                <li>
                    <a href="<?= base_url('talent') ?>" class="hover:text-[#FE002A]">Talent</a>
                </li>
            </ul>

            <!-- Desktop Buttons -->
            <div class="hidden md:flex items-center gap-3">
                <button class="bg-[#FE002A] text-white px-4 py-1.5 rounded-md text-sm hover:bg-red-700 transition shadow-md"
                    data-bs-toggle="modal"
                    data-bs-target="#demoModal">
                    Book a Free Demo
                </button>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url(session()->get('designation') == 'admin' ? 'admin/dashboard' : 'student/dashboard') ?>" 
                       class="text-gray-700 hover:text-[#FE002A] text-sm font-semibold">Dashboard</a>
                    <a href="<?= base_url('logout') ?>" 
                       class="border-2 border-[#FE002A] text-[#FE002A] px-4 py-1 rounded-md text-sm hover:bg-[#FE002A] hover:text-white transition font-semibold">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" 
                       class="text-gray-700 hover:text-[#FE002A] text-sm font-semibold">Login</a>
                    <a href="<?= base_url('signup') ?>" 
                       class="border-2 border-[#FE002A] text-[#FE002A] px-4 py-1 rounded-md text-sm hover:bg-[#FE002A] hover:text-white transition font-semibold">Sign Up</a>
                <?php endif; ?>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-700 focus:outline-none text-2xl">
                    <i class="fas fa-bars" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 transition-all duration-300 ease-in-out">
            <ul class="flex flex-col gap-3 text-gray-700 font-medium text-sm sm:text-base">
                <li>
                    <a href="<?= base_url('/') ?>" class="hover:text-[#FE002A]">Home</a>
                </li>

                <li class="relative">
                    <!-- Button -->
                    <button class="courses-btn hover:text-[#FE002A] cursor-pointer">
                        Courses
                    </button>

                    <!-- Dropdown -->
                    <ul class="courses-menu absolute left-0 top-full mt-2 w-40 bg-white border rounded-lg shadow-lg hidden z-50">
                        <li>
                            <a href="<?= base_url('CMA') ?>" class="block px-4 py-2 hover:text-[#FE002A]">CMA</a>
                        </li>
                        <li>
                            <a href="<?= base_url('EA') ?>" class="block px-4 py-2 hover:text-[#FE002A]">EA</a>
                        </li>
                        <li>
                            <a href="<?= base_url('AI') ?>" class="block px-4 py-2 hover:text-[#FE002A]">AI</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('resources') ?>" class="hover:text-[#FE002A]">Resources</a>
                </li>
                <li>
                    <a href="<?= base_url('talent') ?>" class="hover:text-[#FE002A]">Talent</a>
                </li>

                <li>
                    <button class="w-full bg-[#FE002A] text-white px-4 py-2 rounded-md hover:bg-red-700 transition text-sm shadow-md"
                        data-bs-toggle="modal"
                        data-bs-target="#demoModal">
                        Book a Free Demo
                    </button>
                </li>
                <?php if (session()->get('isLoggedIn')): ?>
                    <li>
                        <a href="<?= base_url(session()->get('designation') == 'admin' ? 'admin/dashboard' : 'student/dashboard') ?>" 
                           class="block py-2 text-gray-700 hover:text-[#FE002A]">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('logout') ?>" 
                           class="block py-2 text-[#FE002A] font-bold">Logout</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= base_url('login') ?>" 
                           class="block py-2 text-gray-700 hover:text-[#FE002A]">Login</a>
                    </li>
                    <li>
                        <a href="<?= base_url('signup') ?>" 
                           class="block py-2 text-gray-700 hover:text-[#FE002A]">Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>


<div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 rounded-[1.5rem] shadow-2xl p-4 md:p-8">

            <div class="flex justify-between items-center mb-4">
                <!-- Badge -->
                <div class="inline-block bg-[#FFDFE4] text-[#FE002A] text-sm px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3">
                    <img src="<?= base_url('public/images/CMA/FormImage/fire 1.png') ?>" alt="">
                    Limited Seats - Next Batch Start Soon !
                </div>

                <!-- <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <button type="button"
                    class="p-2 bg-[#FFDFE4] hover:bg-[#FCD2D9] rounded-full transition-colors border-0"
                    data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#FE002A] stroke-[3px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <p class="mt-1 mb-1 sm:mt-2 sm:mb-2
                        text-[14px] leading-[16px]
                        sm:text-[16px] sm:leading-[20px]
                        md:text-[18px] md:leading-[47.88px]
                        tracking-[-0.3px] 
                        sm:tracking-[-0.5px] 
                        md:tracking-[-0.75px]
                        font-semibold text-gray-800 font-poppins capitalize text-center">

                Thousand Of Top Now in One Place
                <span class="relative inline-block px-2 py-2 sm:px-4 sm:py-2 md:px-6 md:py-2 text-white font-bold">

                    <!-- Background -->
                    <span class="absolute inset-0 bg-[url('<?= base_url('public/images/homePageImages/GetMoreAboutUs/Vector (1).png') ?>')] bg-center bg-no-repeat bg-contain"></span>

                    <!-- Text -->
                    <span class="relative z-10">Enroll Now</span>

                </span>

            </p>

            <div class="modal-body p-0 font-poppins">

                <div id="modal_form_response"></div>

                <form id="modalForm" class="space-y-4">
                    <!-- <div>
                        <label class="block text-sm font-bold mb-1">Title*</label>
                        <input id="title_modal" type="text" class="form-control rounded-lg border-gray-200 py-1.5 focus:border-red-500 focus:ring-0" placeholder="Title">
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-1">Description*</label>
                        <textarea id="desc_modal" class="form-control rounded-lg border-gray-200 focus:border-red-500 focus:ring-0" rows="3" placeholder="Enter Your Description Here"></textarea>
                    </div> -->

                    <div>
                        <label class="block text-sm font-bold mb-1">Full Name*</label>
                        <input id="full_name_modal" type="text" class="form-control rounded-lg border-gray-200 py-1.5 focus:border-red-500 focus:ring-0" 
                            placeholder="Enter Your Full Name" 
                            value="<?= session()->get('full_name') ?>" 
                            <?= session()->get('isLoggedIn') ? 'readonly' : '' ?>>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Email Address*</label>
                        <input id="email_modal" type="email" class="form-control rounded-lg border-gray-200 py-1.5 focus:border-red-500 focus:ring-0" 
                            placeholder="Enter Your Email Address" 
                            value="<?= session()->get('email') ?>" 
                            <?= session()->get('isLoggedIn') ? 'readonly' : '' ?>>
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-1">Contact Number*</label>
                        <input id="contact_modal" type="tel" class="form-control rounded-lg border-gray-200 py-1.5 focus:border-red-500 focus:ring-0" 
                            placeholder="Enter Your Contact Number" 
                            value="<?= session()->get('phone') ?>" 
                            <?= session()->get('isLoggedIn') ? 'readonly' : '' ?>>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Course Interested In*</label>
                        <select id="course_modal" class="form-control rounded-lg border-gray-200 py-1.5 focus:border-red-500 focus:ring-0">
                            <option value="">Select a Course</option>
                            <option value="EA">Enrolled Agent (EA)</option>
                            <option value="CMA">US CMA Course</option>
                            <option value="AI">AI in Taxation</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1">Message*</label>
                        <textarea id="message_modal" class="form-control rounded-lg border-gray-200 py-2 focus:border-red-500 focus:ring-0" 
                            rows="4" placeholder="Enter Your Message"></textarea>
                    </div>

                    <div class="pt-2">

                        <button id="submitBtn_modal" type="button"
                            onclick="submitModalForm(event)"
                            class="w-full bg-[#FE002A] text-white px-4 sm:px-5 py-1.5 rounded-md 
                            text-xs sm:text-sm md:text-base hover:bg-red-700 transition 
                            shadow-[0px_4px_4px_0px_#00000040] flex items-center justify-center gap-2">

                            <span id="btnText_modal">Register Now</span>

                            <!-- Spinner (hidden by default) -->
                            <span id="btnSpinner_modal" class="hidden">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4" fill="none" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Mobile Menu Script -->
<script>
    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('menu-icon');

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.classList.toggle('hidden');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    // Courses dropdown toggle (supports multiple buttons)
    document.querySelectorAll('.courses-btn').forEach((button) => {
        const dropdown = button.nextElementSibling;
        button.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });
    });

    // Close menus when clicking outside
    document.addEventListener('click', (e) => {
        // Close all courses dropdowns
        document.querySelectorAll('.courses-menu').forEach((menu) => {
            if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });

        // Close mobile menu if clicked outside
        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            menu.classList.add('hidden');
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-times');
        }
    });

    async function submitModalForm(event) {
        if (event) event.preventDefault();


        const btn_modal = document.getElementById("submitBtn_modal");
        const btnText_modal = document.getElementById("btnText_modal");
        const spinner_modal = document.getElementById("btnSpinner_modal");
        const responseBox = document.getElementById("modal_form_response");



        if (!btn_modal || !btnText_modal || !spinner_modal) {
            console.error("Button elements not found!");
            return;
        }

        responseBox.innerHTML = "";

        // Show loader
        spinner_modal.classList.remove("hidden");
        btnText_modal.innerText = "Processing...";
        btn_modal.disabled = true;

        // Get values
        // const title_modal = document.getElementById("title_modal").value.trim();
        // const desc_modal = document.getElementById("desc_modal").value.trim();
        const full_name_modal = document.getElementById("full_name_modal").value.trim();
        const email_modal = document.getElementById("email_modal").value.trim();
        const contact_modal = document.getElementById("contact_modal").value.trim();
        const course_modal = document.getElementById("course_modal").value;
        const message_modal = document.getElementById("message_modal").value.trim();

        const apiURL = "<?= base_url('api/modalFormSubmit') ?>";

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^[0-9]{10,15}$/;

        // 🔁 Response with countdown
        function showResponse(msg, type = "success") {
            let style = "bg-green-100 text-green-700";
            if (type === "error") style = "bg-red-100 text-red-700";
            if (type === "warning") style = "bg-yellow-100 text-yellow-700";

            let seconds = 3;

            responseBox.innerHTML = `
                <div id="responseMsg" class="${style} px-3 py-2 rounded mb-2 flex justify-between items-center">
                    <span>${msg}</span>
                    <span id="countdown">${seconds}s</span>
                </div>
            `;

            const countdownEl = document.getElementById("countdown");

            const interval = setInterval(() => {
                seconds--;
                if (seconds > 0) {
                    countdownEl.innerText = seconds + "s";
                } else {
                    clearInterval(interval);
                    responseBox.innerHTML = "";
                }
            }, 1000);
        }

        // ❌ Validation
        // if (!title_modal) return handleError("⚠️ Title is required");
        // if (!desc_modal) return handleError("⚠️ Description is required");
        if (!full_name_modal || full_name_modal.length < 3) return handleError("⚠️ Enter valid full name");
        if (!email_modal || !emailRegex.test(email_modal)) return handleError("⚠️ Enter valid email");
        if (!contact_modal || !phoneRegex.test(contact_modal)) return handleError("⚠️ Enter valid phone number");
        if (!course_modal) return handleError("⚠️ Please select a course");
        if (!message_modal || message_modal.length < 5) return handleError("⚠️ Message too short");

        try {
            const res = await fetch(apiURL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    // title: title_modal,
                    // desc: desc_modal,
                    name: full_name_modal,
                    phone: contact_modal,
                    email: email_modal,
                    course: course_modal,
                    message: message_modal
                })
            });

            const data = await res.json();

            if (data.status === "success") {
                showResponse("✅ " + data.message, "success");
                document.getElementById("modalForm").reset();
                
                // Automatically close modal after 1.5 seconds
                setTimeout(() => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('demoModal'));
                    if (modal) modal.hide();
                }, 1500);
            } else {
                showResponse("❌ " + data.message, "error");
            }

        } catch (error) {
            console.error("Fetch Error:", error);
            showResponse("❌ Server error, try again later", "error");
        } finally {
            spinner_modal.classList.add("hidden");
            btnText_modal.innerText = "Register Now";
            btn_modal.disabled = false;
        }

        function handleError(msg) {
            showResponse(msg, "warning");
            spinner_modal.classList.add("hidden");
            btnText_modal.innerText = "Register Now";
            btn_modal.disabled = false;
            return;
        }
    }
</script>