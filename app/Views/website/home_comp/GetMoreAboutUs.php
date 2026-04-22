<section class="bg-white py-8 px-1 sm:py-12 sm:px-2 md:py-16 md:px-4">

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[50%_50%] gap-10 items-center px-2 sm:px-4">

        <!-- LEFT IMAGE -->
        <div class="relative w-full flex justify-center">
            <!-- Image Container -->
            <div class="rounded-2xl overflow-hidden max-w-[400px] w-full">
                <img
                    src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/img.png') ?>"
                    alt="Course"
                    class="w-full h-full max-h-[350] md:max-h-[400px] object-contain" />
            </div>

            <!-- Play Button -->
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <img
                    src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/44.png') ?>"
                    class="w-10 h-10 md:w-20 md:h-20 cursor-pointer"
                    onclick="AboutopenVideo()"
                    alt="play" />
            </div>
        </div>

        <!-- Modal -->
        <div id="AboutvideoModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-[9999]">

            <div class="relative w-full max-w-3xl mx-4">

                <!-- Close Button -->
                <button onclick="AboutcloseVideo()" class="absolute -top-10 right-0 text-white text-3xl">&times;</button>

                <!-- Video -->
                <div class="aspect-video">
                    <iframe id="AboutvideoFrame"
                        class="w-full h-full rounded-lg"
                        src=""
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>

        <!-- RIGHT CONTENT -->
        <div>
            <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
                Get More About Us
            </span>

            <p class="mt-1 sm:mt-2  mb-1 sm:mb-2 text-[22px] leading-[30px] sm:text-[28px] sm:leading-[36px] md:text-[36px] md:leading-[47px] tracking-[-0.5px] sm:tracking-[-0.75px] font-bold text-gray-800 font-poppins capitalize">
                Why We Are the
                <span class="relative inline-block px-2 py-2 sm:px-4 sm:py-2 md:px-4 md:py-2 text-white font-bold">

                    <!-- Background -->
                    <span class="absolute inset-0 bg-[url('<?= base_url('public/images/homePageImages/GetMoreAboutUs/Vector (1).png') ?>')] bg-center bg-no-repeat bg-contain"></span>

                    <!-- Text -->
                    <span class="relative z-10">Best tax</span>

                </span>
                <br> Academy in USA and India

            </p>

            <p class="font-normal max-w-2xl mx-auto font-poppins text-[#6D6C80]">We combine traditional tax expertise with modern technology. Our curriculum includes Tax software training and AI in taxation skills to ensure you are day-one ready for global firms</p>

            <div class="mt-3 sm:mt-4 md:mt-6 space-y-2 sm:space-y-3 md:space-y-4">

                <!-- ITEM -->
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]">World-Class Instructors with 17+ Years’ Experience.</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]">EA Course Online in India with 24/7 Portal Access.</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]">Updated Tax Skills With Free AI Course with EA, CMA & Software Training</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]"> 98%+ Result Rate across All Testing Windows</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]"> Life Time Guidance, Flexible Online Classes, Pay in EMIs</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#FFC224] rounded-full flex items-center justify-center 
                        shadow-[2px_2px_0_0_rgba(0,0,0,0.25)] sm:shadow-[4px_3px_0_0_rgba(0,0,0,0.25)] 
                        border-2 border-[#282568]">
                        <img src="<?= base_url('public/images/homePageImages/GetMoreAboutUs/Icon1.png') ?>"
                            class="w-3 h-3 sm:w-4 sm:h-4" alt="">
                    </div>
                    <p class="text-left text-[#161439] font-medium text-[12px] leading-[18px] capitalize font-poppins md:text-[14px] md:leading-[23.4px]">Access Study Materials until you clear the exams</p>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-8">
                <button 
                    data-bs-toggle="modal" 
                    data-bs-target="#demoModal"
                    class="bg-[#5751E1] text-white 
                            px-4 py-2 sm:px-6 sm:py-3 md:px-8 md:py-4 lg:px-10 lg:py-5
                            text-sm sm:text-base 
                            rounded-full flex items-center gap-2 
                            shadow-[4px_6px_0px_0px_#050071] 
                            transition-all duration-300 ease-in-out  
                            hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                            active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                    Book Your Free Class →
                </button>
            </div>
        </div>

    </div>
</section>

<script>
    function AboutopenVideo() {
        const modal = document.getElementById('AboutvideoModal');
        const frame = document.getElementById('AboutvideoFrame');

        // YouTube embed link
        frame.src = "https://www.youtube.com/embed/c5wBDMh1W3s?si=Y061aQivR-OTOobC&autoplay=1";

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Stop scrolling
    }

    function AboutcloseVideo() {
        const modal = document.getElementById('AboutvideoModal');
        const frame = document.getElementById('AboutvideoFrame');

        frame.src = ""; // stop video
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = ''; // Restore scrolling
    }
</script>