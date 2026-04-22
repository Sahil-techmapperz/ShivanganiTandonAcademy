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
        <div id="AboutvideoModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

            <div class="relative w-full max-w-3xl mx-4">

                <!-- Close Button -->
                <button onclick="AboutcloseVideo()" class="absolute -top-10 right-0 text-white text-3xl">&times;</button>

                <!-- Video -->
                <div class="aspect-video">
                    <iframe id="AboutvideoFrame"
                        class="w-full h-full rounded-lg"
                        src=""
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>

        <!-- RIGHT CONTENT -->
        <div>
            <span class="inline-block bg-[#EFEEFE] text-[#5751E1] font-medium font-poppins text-xs sm:text-sm px-3 sm:px-4 py-1 rounded-full mb-3 sm:mb-4">
                Job opportunities
            </span>

            <p class="mt-1 sm:mt-2  mb-3 sm:mb-2 text-[22px] leading-[30px] sm:text-[28px] sm:leading-[36px] md:text-[36px] md:leading-[47px] tracking-[-0.5px] sm:tracking-[-0.75px] font-bold text-gray-800 font-poppins capitalize">
                CMA Job opportunities
            </p>

            <p class="font-normal max-w-2xl mx-auto font-poppins text-[#6D6C80]">The CMA (USA) designation opens doors to high-level strategic roles across the globe. From financial analysis to executive leadership, this certification ensures you are prepared for the most prestigious opportunities in the international corporate landscape.

            <div class="mt-6 space-y-3">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <div>
                        <div class="flex items-center gap-6">
                            <div class="flex-shrink-0">
                                <div class="bg-[#ff6b6b] w-16 h-16 rounded-full flex items-center justify-center border-2 border-[#CE3B3B] shadow-[5px_5px_0px_0px_rgba(0,0,0,0.25)]">
                                    <img src="<?= base_url('public/images/CMA/Jobopportunities/Vector (1).png') ?>" alt="Live Classes" class="w-8 h-8">
                                </div>
                            </div>

                            <div>
                                <p class="text-[20px] font-semibold text-[#161439] leading-[26px] font-poppins"> Virtual Live Classes</p>
                            </div>
                        </div>
                        <p class="mt-3 text-[16px] leading-[28px] text-[#6D6C80] font-normal font-inter">
                            Interactive, real-time sessions with industry expert mentors.
                        </p>
                    </div>


                    <div>
                        <div class="flex items-center gap-6">
                            <div class="flex-shrink-0">
                                <div class="bg-[#17d1e9] w-16 h-16 rounded-full flex items-center justify-center border-2 border-[#019AAF] shadow-[5px_5px_0px_0px_rgba(0,0,0,0.25)]">
                                    <img src="<?= base_url('public/images/CMA/Jobopportunities/Vector (1).png') ?>" alt="Graduation" class="w-8 h-8">
                                </div>
                            </div>

                            <div>
                                <p class="text-[20px] font-semibold text-[#161439] leading-[26px] font-poppins">Get prepared for career roles</p>
                            </div>
                        </div>
                        <p class="mt-3 text-[16px] leading-[28px] text-[#6D6C80] font-normal font-inter">
                            Proven methodology ensuring first-attempt success.
                        </p>
                    </div>


                </div>

            </div>

            <!-- BUTTON -->
            <!-- <div class="mt-8">
                <button class="bg-[#5751E1] text-white 
                            px-4 py-2 sm:px-6 sm:py-3 md:px-8 md:py-4 lg:px-10 lg:py-5
                            text-sm sm:text-base 
                            rounded-full flex items-center gap-2 
                            shadow-[4px_6px_0px_0px_#050071] 
                            transition-all duration-300 ease-in-out  
                            hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                            active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                    Quick Join Now →
                </button>
            </div> -->
        </div>

    </div>
</section>

<script>
    function AboutopenVideo() {
        const modal = document.getElementById('AboutvideoModal');
        const frame = document.getElementById('AboutvideoFrame');

        // YouTube embed link (replace with your video)
        frame.src = "https://www.youtube.com/embed/D8k7Xi71MzU?autoplay=1";

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function AboutcloseVideo() {
        const modal = document.getElementById('AboutvideoModal');
        const frame = document.getElementById('AboutvideoFrame');

        frame.src = ""; // stop video
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>