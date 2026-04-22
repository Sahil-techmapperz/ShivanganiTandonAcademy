<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<style>
    .active-accordion {
        background-color: #FFC224 !important;
        color: #000;
    }
</style>

<section class="bg-[#F5F5F9] pt-8 px-1 sm:pt-12 sm:px-2 md:pt-16 md:px-4">
    
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[40%_60%] gap-10 items-center px-3 sm:px-4">

        <!-- LEFT -->
        <div class="pb-0 md:pb-16">

            <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-xs sm:text-sm px-3 sm:px-4 py-1 rounded-full mb-3 sm:mb-4">
                Your Path to Success
            </span>

            <h2 class="mt-3 sm:mt-4 text-[22px] leading-[30px] sm:text-[28px] sm:leading-[36px] md:text-[36px] md:leading-[47px] tracking-[-0.5px] sm:tracking-[-0.75px] font-bold text-gray-800 font-poppins capitalize">
                How To Become An Enrolled Agent ?
            </h2>

            <p class="mt-2 sm:mt-3 max-w-full sm:max-w-md text-[14px] sm:text-[16px] leading-[22px] sm:leading-[26px] text-[#6D6C80] font-Inter font-normal">
                Follow these simple steps to earn the prestigious EA certification.
            </p>

            <!-- Accordion -->
            <div class="mt-6 space-y-3 pb-2">

                <!-- Item -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="acc-btn w-full flex items-center gap-3 px-4 py-3 bg-white transition-all duration-300">

                        <!-- Number -->
                        <span class="text-gray-400 font-bold text-2xl md:text-[36px] font-georgia">
                            01
                        </span>

                        <!-- Title -->
                        <span class="flex-1 text-left font-semibold text-sm md:text-[18px] font-poppins leading-snug">
                            Get Your TPIN
                        </span>

                        <!-- Icon -->
                        <span class="text-sm md:text-lg icon transition-transform duration-300">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>

                    <div class="acc-content bg-white max-h-0 overflow-hidden transition-all duration-500 ease-in-out px-4 text-[#6D6C80] text-sm md:text-[16px] leading-relaxed">
                        <div class="py-3 font-poppins">
                            Obtain a Preparer Tax Identification Number from the IRS
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="acc-btn w-full flex items-center gap-3 px-4 py-3 bg-white transition-all duration-300">

                        <span class="text-gray-400 font-bold text-2xl md:text-[36px] font-georgia">
                            02
                        </span>

                        <span class="flex-1 text-left font-semibold text-sm md:text-[18px] font-poppins">
                            Study and Prepare
                        </span>

                        <span class="text-sm md:text-lg icon transition-transform duration-300">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>

                    <div class="acc-content bg-white max-h-0 overflow-hidden transition-all duration-500 ease-in-out px-4 text-[#6D6C80] text-sm md:text-[16px] leading-relaxed">
                        <div class="py-3 font-poppins">
                            Prepare using structured study material and practice tests.
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="acc-btn w-full flex items-center gap-3 px-4 py-3 bg-white transition-all duration-300">

                        <span class="text-gray-400 font-bold text-2xl md:text-[36px] font-georgia">
                            03
                        </span>

                        <span class="flex-1 text-left font-semibold text-sm md:text-[18px] font-poppins">
                            Pass the SEE Exam
                        </span>

                        <span class="text-sm md:text-lg icon transition-transform duration-300">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>

                    <div class="acc-content bg-white max-h-0 overflow-hidden transition-all duration-500 ease-in-out px-4 text-[#6D6C80] text-sm md:text-[16px] leading-relaxed">
                        <div class="py-3 font-poppins">
                            Clear all parts of the Special Enrollment Examination.
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="acc-btn w-full flex items-center gap-3 px-4 py-3 bg-white transition-all duration-300">

                        <span class="text-gray-400 font-bold text-2xl md:text-[36px] font-georgia">
                            04
                        </span>

                        <span class="flex-1 text-left font-semibold text-sm md:text-[18px] font-poppins">
                            Get Licensed
                        </span>

                        <span class="text-sm md:text-lg icon transition-transform duration-300">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>

                    <div class="acc-content bg-white max-h-0 overflow-hidden transition-all duration-500 ease-in-out px-4 text-[#6D6C80] text-sm md:text-[16px] leading-relaxed">
                        <div class="py-3 font-poppins">
                            Apply for enrollment and start your career as an EA.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="hidden lg:flex items-end justify-center lg:justify-end h-full relative">

            <div class="relative w-full max-w-[90%] sm:max-w-[500px] lg:max-w-[550px]">

                <img
                    class="w-full h-auto"
                    src="<?= base_url('public/images/homePageImages/Your_Path_to_Success/Container.png') ?>"
                    alt="">
            </div>
        </div>
    </div>
</section>

<script>
    const buttons = document.querySelectorAll(".acc-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            const content = btn.nextElementSibling;
            const icon = btn.querySelector("i");

            // Close others
            document.querySelectorAll(".acc-content").forEach(c => {
                if (c !== content) {
                    c.style.maxHeight = null;
                    c.previousElementSibling.classList.remove("active-accordion");

                    const ic = c.previousElementSibling.querySelector("i");
                    ic.classList.remove("rotate-180");
                }
            });

            // Toggle current
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                btn.classList.remove("active-accordion");
                icon.classList.remove("rotate-180");
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                btn.classList.add("active-accordion");
                icon.classList.add("rotate-180");
            }
        });
    });

    // ✅ OPEN FIRST ACCORDION BY DEFAULT
    window.addEventListener("load", () => {
        if (buttons.length > 0) {
            buttons[0].click();
        }
    });
</script>