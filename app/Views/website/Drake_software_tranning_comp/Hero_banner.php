<section class="relative h-[70vh] flex items-center justify-center overflow-hidden font-poppins">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img
            src="<?= base_url('public/images/Drake_software_tranning/Hero_banner/BannerIMG.png') ?>"
            alt="Academy Chronicle Hero"
            class="w-full h-full object-cover">

        <!-- Dark Overlay -->
        <!-- <div class="absolute inset-0 bg-black/40"></div> -->
    </div>

    <!-- Hero Content -->
    <div class="bg-[#FFFFFFAD] border-2 border-white backdrop-blur-[2px] 
    !p-4 sm:!p-6 md:!p-16
    rounded-[1.5rem] md:rounded-[2.5rem] 
    shadow-2xl max-w-5xl mx-auto">

        <!-- Heading -->
        <p class="text-[#161439] font-poppins font-semibold 
        text-[24px] sm:text-[32px] md:text-[40px] 
        leading-[34px] sm:leading-[42px] md:leading-[51px] 
        tracking-normal text-center uppercase mb-4">
            Master Real-Time U.S. Tax Preparation &
            Build a Global Career
        </p>

        <!-- Description -->
        <p class="text-[#161439] 
        text-[14px] sm:text-[16px] md:text-[17px] 
        leading-[22px] 
        tracking-[0.03em] 
        font-bold font-poppins text-center">
            Learn practical U.S. tax filing using Drake Tax and become job-ready with hands-on experience.
        </p>

        <!-- Buttons -->
        <div class="pt-6 flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-6 md:gap-10">
            <a href="<?= base_url('') ?>"><button class="bg-[#5751E1] text-white px-10 py-2 rounded-full flex items-center gap-2 font-semibold
                    shadow-[4px_6px_0px_0px_#050071] 
                    transition-all duration-300 ease-in-out  
                    hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                    active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                    Enroll Now →
                </button></a>

            <a href="<?= base_url('') ?>"><button class="bg-[#FFFFFF] text-[#5751E1] px-6 py-2 rounded-full flex items-center gap-2 font-semibold
                    shadow-[4px_6px_0px_0px_#050071] 
                    transition-all duration-300 ease-in-out  
                    hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                    active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                    Book Free Demo →
                </button></a>
        </div>

    </div>
</section>