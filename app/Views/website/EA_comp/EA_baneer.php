<section class="relative w-full bg-[#F5F7FB] overflow-hidden bg-cover bg-center bg-no-repeat"
    style="background-image: url(<?= base_url('public/images/EA/EA_baneer/Background.png') ?>)">

    <div class="max-w-7xl mx-auto w-full px-4 h-full">
        <div class="grid lg:grid-cols-2 items-center gap-12">

            <!-- LEFT CONTENT -->
            <div class="space-y-4 sm:space-y-6  px-4 lg:px-0  px-4 lg:px-0 py-6 sm:py-8 lg:py-0">

                <!-- HEADING -->
                <h1 class="
                        text-[26px] leading-[36px] 
                        sm:text-[32px] sm:leading-[45px] 
                        md:text-[40px] md:leading-[55px] 
                        lg:text-[40px] lg:leading-[63px] 
                        font-bold text-[#161439] capitalize font-poppins
                    ">
                    Globally
                    <span class="relative inline-block z-10 font-extrabold align-middle">
                        Recognized
                        <img class="w-full absolute bottom-0 sm:bottom-1 left-0 -z-10"
                            src="<?= base_url('public/images/EA/EA_baneer/SVG (1).png') ?>" alt="">
                    </span>
                    Tax <br class="hidden sm:block">
                    Expert With EA
                </h1>

                <!-- SUBTEXT -->
                <p class="
                        text-[#6D6C80] 
                        text-[14px] leading-[22px]
                        sm:text-[16px] sm:leading-[26px]
                        md:text-[18px] md:leading-[27.9px]
                        font-inter font-medium 
                        max-w-full sm:max-w-[500px] mx-auto lg:mx-0
                    ">
                    Learn US Taxation, Get IRS-Certificated and Unlock
                    High-Paying Globally Opportunities.
                </p>

                <!-- BUTTON -->
                <div class="pt-2 flex justify-center lg:justify-start">
                    <a href="javascript:void(0)" onclick="openLetsTalkModal()">
                        <button class="
                        bg-[#5751E1] text-white 
                        px-5 py-2.5 
                        sm:px-6 sm:py-3 
                        md:px-8 md:py-4 
                        text-sm sm:text-base 
                        rounded-full flex items-center gap-2 
                        shadow-[3px_4px_0px_0px_#050071] 
                        transition-all duration-300 ease-in-out  
                        hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                        active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]
                    ">
                            Let's Talk →
                        </button>
                    </a>
                </div>

            </div>
            <!-- RIGHT SECTION -->
            <div class="relative hidden md:flex justify-center items-end h-full">

                <!-- PERSON IMAGE -->
                <img
                    src="<?= base_url('public/images/EA/EA_baneer/heroimage.png') ?>"
                    class="relative z-10 w-[280px] md:w-[360px] lg:w-[420px]"
                    alt="expert">

                <!-- Yellow Shape Background -->
                <div class="absolute -bottom-20 w-[320px] h-[320px] md:w-[400px] md:h-[400px] bg-yellow-400 rounded-full -z-0 left-1/2 -translate-x-1/2"></div>

                <!-- STUDENTS CARD -->
                <div class="absolute top-[25%] left-0 md:-left-20 bg-white rounded-2xl px-3 py-3 w-[200px] border border-[#B2BBCC] shadow-[-8px_8px_0px_0px_#00000026] z-10">

                    <!-- Text -->
                    <p class="text-[14px] font-semibold text-[#6C63FF] leading-tight mb-3 text-center lg:text-left font-poppins">
                        <span class="text-black font-bold">36K+</span> Enrolled Students
                    </p>

                    <!-- Avatars -->
                    <div class="flex items-center justify-center lg:justify-start -space-x-3">
                        <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                            src="<?= base_url('public/images/homePageImages/home_banner/shivani.png') ?>">

                        <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                            src="<?= base_url('public/images/homePageImages/home_banner/aniket.png') ?>">

                        <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                            src="<?= base_url('public/images/homePageImages/home_banner/shivani.png') ?>">

                        <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                            src="<?= base_url('public/images/homePageImages/home_banner/shivani.png') ?>">

                        <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                            src="<?= base_url('public/images/homePageImages/home_banner/aniket.png') ?>">

                        <!-- Last circle with count -->
                        <div class="w-9 h-9 rounded-full bg-[#161439] text-white flex items-center justify-center text-xs font-semibold border-2 border-white">
                            +
                        </div>
                    </div>
                </div>

                <!-- RIGHT STATS BOX -->
                <!-- <div class="absolute bottom-[30%] right-[50px] md:right-[-40px] 
                        bg-[#5B5FEF] text-white px-4 py-3 rounded-xl z-20 font-poppins
                        border border-[#B2BBCC] shadow-[-4px_3px_0px_0px_#00000026]">
                    <p class="text-[36px] font-bold font-poppins leading-[36px] text-center align-middle">12K+</p>
                    <p class="text-[14px] font-medium font-inter leading-[14px] text-center capitalize ">All Recipes </p>
                </div> -->

            </div>

        </div>
    </div>

</section>

<!-- Let's Talk Contact Modal -->
<div id="letsTalkModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[9999] opacity-0 transition-opacity duration-300">
    <div class="relative w-full max-w-md mx-4 bg-white rounded-2xl p-6 md:p-8 border border-[#E3E3E3] shadow-2xl transform scale-95 transition-transform duration-300">
        
        <!-- Close Button -->
        <button onclick="closeLetsTalkModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
        
        <h3 class="text-2xl font-semibold mb-2 text-[#161439] text-center font-poppins">
            Let's Talk!
        </h3>
        <p class="text-gray-500 text-sm text-center mb-6">
            Fill in your details below and our team will get in touch with you shortly.
        </p>
        
        <form class="space-y-4" id="letsTalkForm">
            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 font-poppins">Name *</label>
                <input id="talk_name" type="text" placeholder="Enter your name" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5751E1] focus:border-transparent transition">
            </div>
            
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 font-poppins">Email Address *</label>
                <input id="talk_email" type="email" placeholder="Enter your email" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5751E1] focus:border-transparent transition">
            </div>
            
            <!-- Phone (Optional) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 font-poppins">Contact Number (Optional)</label>
                <input id="talk_phone" type="tel" placeholder="Enter your phone number"
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5751E1] focus:border-transparent transition">
            </div>
            
            <!-- Submit Button -->
            <button id="talkSubmitBtn" type="button" onclick="submitLetsTalkForm()"
                class="w-full bg-[#5751E1] text-white py-3 rounded-xl font-semibold flex justify-center items-center gap-2 shadow-[0_4px_12px_rgba(87,81,225,0.3)] transition-all hover:bg-[#453fc6] active:scale-[0.98]">
                <span id="talkBtnText">Send Message</span>
                <i id="talkBtnSpinner" class="fa fa-spinner fa-spin hidden"></i>
            </button>
        </form>
    </div>
</div>

<script>
    function openLetsTalkModal() {
        const modal = document.getElementById('letsTalkModal');
        const formContainer = modal.querySelector('div');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            formContainer.classList.remove('scale-95');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeLetsTalkModal() {
        const modal = document.getElementById('letsTalkModal');
        const formContainer = modal.querySelector('div');
        modal.classList.add('opacity-0');
        formContainer.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 300);
        document.body.style.overflow = '';
    }

    function submitLetsTalkForm() {
        const name = document.getElementById('talk_name').value.trim();
        const email = document.getElementById('talk_email').value.trim();
        const phone = document.getElementById('talk_phone').value.trim();
        
        const btn = document.getElementById('talkSubmitBtn');
        const btnText = document.getElementById('talkBtnText');
        const spinner = document.getElementById('talkBtnSpinner');
        
        if (!name || !email) {
            showModal('error', 'Validation Error', 'Please fill in all required fields (Name and Email).');
            return;
        }
        
        // Simple email regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showModal('error', 'Validation Error', 'Please enter a valid email address.');
            return;
        }
        
        // Set loading state
        btn.disabled = true;
        spinner.classList.remove('hidden');
        btnText.innerText = 'Sending...';
        
        const payload = {
            name: name,
            email: email,
            phone: phone,
            message: "Request to connect from 'Let's Talk' banner form."
        };
        
        fetch('<?= base_url("api/submitHelp") ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                showModal('success', 'Success', 'Thank you! Your inquiry has been submitted. Our team will get back to you shortly.');
                closeLetsTalkModal();
                // Reset form
                document.getElementById('letsTalkForm').reset();
            } else {
                showModal('error', 'Error', data.message || 'Something went wrong. Please try again.');
            }
        })
        .catch(err => {
            console.error(err);
            showModal('error', 'Server Error', 'Failed to connect to server. Please try again later.');
        })
        .finally(() => {
            btn.disabled = false;
            spinner.classList.add('hidden');
            btnText.innerText = 'Send Message';
        });
    }
</script>