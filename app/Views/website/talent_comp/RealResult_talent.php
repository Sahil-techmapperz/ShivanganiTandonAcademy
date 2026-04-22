<!-- Include Swiper CSS -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 font-poppins">

    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4 text-center">

        <!-- Badge -->
        <div class="inline-block bg-[#FFDFE4] text-[#FE002A] text-sm px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3 mb-4">
            Real Results
        </div>

        <p class="text-[22px] sm:text-[26px] md:text-[32px] lg:text-[36px] 
           font-semibold text-[#161439] 
           leading-[30px] sm:leading-[36px] md:leading-[42px] lg:leading-[47.88px] 
           tracking-[-0.5px] md:tracking-[-0.75px] 
           capitalize mb-2">
            Score of our students for 2024
        </p>

        <!-- Sub Text -->
        <p
            class="font-normal mb-12 font-poppins text-[#6D6C80]">
            Hear from our students who have successfully cleared the EA exam and transformed their careers.
        </p>

    </div>

    <!-- Swiper -->
    <div class="relative max-w-7xl mx-auto">
        <div class="swiper success-slider">
            <div class="swiper-wrapper">

                <?php
                // $scores = [
                //     ['image' => '1.jpg'],
                //     ['image' => '1.jpg'],
                //     ['image' => '3.jpg'],
                //     ['image' => '4.jpg'],
                //     ['image' => '5.jpg'],
                //     ['image' => '6.jpg'],
                //     ['image' => '7.jpg'],
                //     ['image' => '8.jpg'],
                //     ['image' => '9.jpg'],
                //     ['image' => '10.jpg'],
                //     ['image' => '11.jpg'],
                //     ['image' => '12.jpg'],
                //     ['image' => '13.jpg'],
                //     ['image' => '14.jpg'],
                //     ['image' => '15.jpg'],
                // ];

                $scores = get_scores();
                
                // Remove duplicates by image name
                $unique_scores = [];
                $seen_images = [];
                foreach ($scores as $item) {
                    if (!in_array($item['image'], $seen_images)) {
                        $unique_scores[] = $item;
                        $seen_images[] = $item['image'];
                    }
                }
                $scores = $unique_scores;
                ?>

                <!-- Dynamic Slides -->
                <?php foreach ($scores as $item): ?>
                    <div class="swiper-slide p-2">
                        <div
                            class="overflow-hidden group">
                            <img src="<?= base_url('public/images/talent/RealResult_talent/' . $item['image']) ?>"
                                alt="Success Story"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Navigation Buttons -->
            <div class="flex items-center gap-2 sm:gap-4 w-full mt-4 sm:mt-8 px-2 sm:px-0">
                <!-- Previous Button -->
                <div
                    class="prev-btn flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 bg-[#5751E1] hover:bg-[#5751E1] text-white rounded-full transition-transform active:scale-95 cursor-pointer z-10">
                    <img src="<?= base_url('public/images/Resources/RealResults/left.png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                </div>

                <!-- Progress Bar -->
                <div class="flex-grow h-1 sm:h-1.5 bg-gray-200 rounded-full relative overflow-hidden">
                    <div id="progress-bar" class="absolute top-0 left-0 h-full bg-[#5751E1] transition-all duration-500 ease-out" style="width: 33%"></div>
                </div>

                <!-- Next Button -->
                <div
                    class="next-btn flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 bg-[#5751E1] hover:bg-[#5751E1] text-white rounded-full transition-transform active:scale-95 cursor-pointer z-10">
                    <img src="<?= base_url('public/images/Resources/RealResults/right.png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.success-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        breakpoints: {
            640: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            },
        },
        on: {
            slideChange: updateProgressBar,
        },
    });

    // Navigation buttons
    document.querySelector('.next-btn').addEventListener('click', () => swiper.slideNext());
    document.querySelector('.prev-btn').addEventListener('click', () => swiper.slidePrev());

    function updateProgressBar() {
        const total = swiper.slides.length;
        const current = swiper.activeIndex + swiper.params.slidesPerView;
        const percent = Math.min((current / total) * 100, 100);
        document.getElementById('progress-bar').style.width = percent + '%';
    }

    // Initialize progress bar
    updateProgressBar();


    function openTestimonialVideo(videoId) {
        const modal = document.getElementById('TestimonialvideoModal');
        const iframe = document.getElementById('TestimonialvideoFrame');
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeTestimonialVideo() {
        const modal = document.getElementById('TestimonialvideoModal');
        const iframe = document.getElementById('TestimonialvideoFrame');
        iframe.src = '';
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>