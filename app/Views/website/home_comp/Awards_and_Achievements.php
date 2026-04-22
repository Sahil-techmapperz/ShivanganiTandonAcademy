<section class="py-8 px-1 sm:py-12 sm:px-2 md:py-16 md:px-4 font-poppins bg-cover bg-center bg-no-repeat relative"
    style="background-image: url('<?= base_url("public/images/homePageImages/Awards_and_Achievements/Section1.png") ?>');">

    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-6 sm:gap-8 lg:flex-row lg:gap-12 mb-4">

        <div class="w-full md:w-1/2 lg:w-1/3">

            <!-- Heading -->
            <p class="text-[28px] sm:text-[34px] md:text-[40px] lg:text-[48px] 
              leading-[36px] sm:leading-[44px] md:leading-[52px] lg:leading-[62.4px] 
              font-bold text-[#161439] mb-4 sm:mb-5 md:mb-6 lg:mb-8 xl:mb-10 capitalize font-poppins about_us_text">

                Awards & <br />

                <span class="relative inline-block z-10">
                    Achievements
                    <span class="absolute left-0 bottom-1.5 md:bottom-2.5 w-[70%] h-1 sm:h-1.5 md:h-3 bg-[#5751E1] -z-10"></span>
                </span>
            </p>

            <!-- Button Wrapper -->
            <div class="mt-6 hidden lg:flex justify-center lg:justify-start">
                <button class="bg-[#5751E1] text-white px-6 py-2 rounded-full 
                       flex items-center gap-2 
                       shadow-[4px_6px_0px_0px_#050071] 
                       transition-all duration-300 ease-in-out 
                       hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                       active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                    Know More →
                </button>
            </div>

        </div>

        <div class="lg:w-2/3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card -->
            <div class="group bg-white px-2 py-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center justify-evenly 
                transition-all duration-500 ease-in-out 
                hover:-translate-y-3 hover:shadow-xl hover:border-amber-300">

                <!-- Icon -->
                <div class="w-16 h-16 bg-[#FFC224] rounded-full flex items-center justify-center mb-6 shadow-md
                    transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                    <img src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/lets-icons_trophy.png') ?>"
                        alt="Trophy"
                        class="w-8 h-8 object-contain transition-transform duration-500 group-hover:scale-125" />
                </div>

                <p class="text-[#000000] font-poppins text-[16px] transition-colors duration-300 group-hover:text-amber-500">
                    Best EA Academy
                </p>

                <p class="text-[#6D6C80] font-poppins text-[12px] leading-[19px]">
                    Recognized as India's leading EA training institute
                </p>
            </div>

            <!-- Repeat with delay -->
            <div class="group bg-white px-2 py-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center justify-evenly 
                transition-all duration-500 ease-in-out 
                hover:-translate-y-3 hover:shadow-xl hover:border-amber-300 delay-75">

                <div class="w-16 h-16 bg-[#FFC224] rounded-full flex items-center justify-center mb-6 shadow-md
                    transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                    <img src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/iconoir_security-pass.png') ?>"
                        class="w-8 h-8 object-contain transition-transform duration-500 group-hover:scale-125" />
                </div>

                <p class="text-[#000000] font-poppins text-[16px] transition-colors duration-300 group-hover:text-amber-500">
                    95% Pass Rate
                </p>

                <p class="text-[#6D6C80] font-poppins text-[12px] leading-[19px]">
                    Consistently highest pass rates in the industry
                </p>
            </div>

            <div class="group bg-white px-2 py-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center justify-evenly 
                transition-all duration-500 ease-in-out 
                hover:-translate-y-3 hover:shadow-xl hover:border-amber-300 delay-150">

                <div class="w-16 h-16 bg-[#FFC224] rounded-full flex items-center justify-center mb-6 shadow-md
                    transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                    <img src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/material-symbols_star-outline-rounded.png') ?>"
                        class="w-8 h-8 object-contain transition-transform duration-500 group-hover:scale-125" />
                </div>

                <p class="text-[#000000] font-poppins text-[16px] transition-colors duration-300 group-hover:text-amber-500">
                    500+ Students Trained
                </p>

                <p class="text-[#6D6C80] font-poppins text-[12px] leading-[19px]">
                    Successfully guided hundreds of professionals
                </p>
            </div>

            <div class="group bg-white px-2 py-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center justify-evenly 
                transition-all duration-500 ease-in-out 
                hover:-translate-y-3 hover:shadow-xl hover:border-amber-300 delay-200">

                <div class="w-16 h-16 bg-[#FFC224] rounded-full flex items-center justify-center mb-6 shadow-md
                    transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                    <img src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/lets-icons_paper.png') ?>"
                        class="w-8 h-8 object-contain transition-transform duration-500 group-hover:scale-125" />
                </div>

                <p class="text-[#000000] font-poppins text-[16px] transition-colors duration-300 group-hover:text-amber-500">
                    Published Author
                </p>

                <p class="text-[#6D6C80] font-poppins text-[12px] leading-[19px]">
                    India's first published books on US taxation
                </p>
            </div>

        </div>

        <div class="flex justify-center lg:hidden">
            <button class="bg-[#5751E1] text-white px-6 py-2 rounded-full 
                       flex items-center gap-2 
                       shadow-[4px_6px_0px_0px_#050071] 
                       transition-all duration-300 ease-in-out 
                       hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                       active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                Know More →
            </button>
        </div>
    </div>

    <img class="absolute top-10 right-0 w-[50px] h-[50px]" style="animation: floatSlow 5s ease-in-out infinite;" src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/shape.png') ?>" alt="">
    <img class="absolute bottom-5 left-[5%] sm:left-1/2 sm:-translate-x-1/2 w-[50px] h-[50px]" style="animation: floatSlow 5s ease-in-out infinite;" src="<?= base_url('public/images/homePageImages/Awards_and_Achievements/h3_fact_shape01.8c238254.svg fill.png') ?>" alt="">
    <!-- Top Right -->

    <style>
        @keyframes float {
            0% {
                transform: translate(-50%, 0px);
            }

            50% {
                transform: translate(-50%, -12px);
            }

            100% {
                transform: translate(-50%, 0px);
            }
        }

        @keyframes floatSlow {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>

</section>