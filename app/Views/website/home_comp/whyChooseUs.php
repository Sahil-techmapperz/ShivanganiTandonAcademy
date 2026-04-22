<section class="bg-white py-16 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[65%_35%] gap-10 items-center px-2 sm:px-4">

        <!-- LEFT IMAGE -->
        <div class="relative w-full">

            <!-- Image -->
            <div class="rounded-2xl overflow-hidden">
                <img
                    src="<?= base_url('public/images/whyChooseUs_Image/76f559ff70b3f07145711a6a2b80296972c34b9c.jpg') ?>"
                    alt="Course"
                    class="w-full h-full max-h-[250px] md:max-h-[500px] object-cover" />
            </div>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40 rounded-2xl z-10"></div>

            <!-- Play Button -->
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <img
                    src="<?= base_url('public/images/whyChooseUs_Image/553.png') ?>"
                    class="w-10 h-10 md:w-20 md:h-20 cursor-pointer"
                    onclick="openVideo()"
                    alt="play">
            </div>

        </div>

        <!-- Modal -->
        <div id="videoModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-[9999]">

            <div class="relative w-full max-w-3xl mx-4">

                <!-- Close Button -->
                <button onclick="closeVideo()" class="absolute -top-10 right-0 text-white text-3xl">&times;</button>

                <!-- Video -->
                <div class="aspect-video">
                    <iframe id="videoFrame"
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
            <span class="inline-block bg-[#EFEEFE] text-[#5751E1] font-medium font-poppins text-xs sm:text-sm px-3 sm:px-4 py-1 rounded-full mb-3 sm:mb-4">
                Why Choose Us
            </span>

            <p class="mt-1 sm:mt-2 text-[22px] leading-[30px] sm:text-[28px] sm:leading-[36px] md:text-[36px] md:leading-[47px] tracking-[-0.5px] sm:tracking-[-0.75px] font-bold text-gray-800 font-poppins capitalize">
                EA Course Highlights
            </p>

            <div class="mt-6 space-y-3">

                <!-- ITEM -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector1.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">4 Month Course Duration</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector2.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">Only 3 Papers, Single Level</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector3.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">Exams Conducted In India</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector4.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">2000+ MCQs Test Bank</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector5.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">60+ Hours Virtual Training</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-[#FFC224] rounded-full flex items-center justify-center shadow-[4px_3px_0_0_rgba(0,0,0,0.25)]">
                        <img src="<?= base_url('public/images/whyChooseUs_Image/Vector6.png') ?>" class="w-4 h-4" alt="">
                    </div>
                    <p class="text-[#161439] font-medium text-[16px] leading-[20px] capitalize font-poppins md:text-[18px] md:leading-[23.4px]">Unlimited IRS Practice Rights</p>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-8">
                <a href="<?= base_url('EA') ?>">
                    <button class="bg-[#5751E1] text-white px-6 py-2 rounded-full flex items-center gap-2 
                            shadow-[4px_6px_0px_0px_#050071] 
                            transition-all duration-300 ease-in-out 
                            hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                            active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                        Know More →
                    </button>
                </a>
            </div>
        </div>

    </div>
</section>

<script>
    function openVideo() {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');

        // YouTube embed link
        frame.src = "https://www.youtube.com/embed/OWZo_qqrQIU?start=10&autoplay=1";

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Stop scrolling
    }

    function closeVideo() {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');

        frame.src = ""; // stop video
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = ''; // Restore scrolling
    }
</script>