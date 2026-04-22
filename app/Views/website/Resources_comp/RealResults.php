<!-- Include Swiper CSS -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 font-poppins">

    <!-- Header -->
    <div class="max-w-7xl mx-auto px-4">

        <!-- Badge -->
        <div class="inline-block bg-[#FFDFE4] text-[#FE002A] text-sm px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3 mb-4">
            Real Results
        </div>

        <p class="text-[22px] sm:text-[26px] md:text-[32px] lg:text-[36px] 
           font-semibold text-[#161439] 
           leading-[30px] sm:leading-[36px] md:leading-[42px] lg:leading-[47.88px] 
           tracking-[-0.5px] md:tracking-[-0.75px] 
           capitalize mb-2">
            Our Student Success Stories
        </p>

        <!-- Sub Text -->
        <p
            class="font-normal max-w-3xl mx-auto mb-12 font-poppins text-[#6D6C80]">
            Hear from our students who have successfully cleared the EA exam and transformed their careers.
        </p>

    </div>
    <!-- Swiper -->
    <div class="relative max-w-7xl mx-auto">
        <div class="swiper success-slider">
            <div class="swiper-wrapper">

                <?php
                $testimonials = [
                    ['id' => 'zMBCf3PKSaA', 'name' => 'Mustafa Moomin', 'image' => '1.png'],
                    ['id' => 'zMBCf3PKSaA', 'name' => 'Mustafa Moomin 2', 'image' => '1.png'],
                    ['id' => 'emUgLHYXA50', 'name' => 'Bhabagrahi Jena', 'image' => '3.png'],
                    ['id' => 'uZmibYPyihg', 'name' => 'Akshay Trivedi', 'image' => '4.png'],
                    ['id' => '7JEoXfOcxLc', 'name' => 'Anmol Parmeshwar', 'image' => '5.png'],
                ];
                ?>


                <!-- Dynamic Slides -->
                <?php foreach ($testimonials as $item): ?>
                    <div class="swiper-slide p-2">
                        <div
                            class="relative rounded-[2rem] overflow-hidden aspect-video group">
                            <img src="<?= base_url('public/images/EA/AboutCampushistory/' . $item['image']) ?>"
                                alt="Success Story"
                                class="w-full h-full object-cover" />
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/10 transition-colors group-hover:bg-black/20">
                                <div class="bg-white rounded-full p-4 shadow-xl cursor-pointer hover:scale-110 transition-transform">
                                    <svg
                                        class="w-8 h-8 text-black"
                                        fill="currentColor"
                                        viewBox="0 0 20 20" onclick="openTestimonialVideo('<?= $item['id']; ?>')">
                                        <path
                                            d="M6.3 2.841A1.5 1.5 0 004 4.11v11.78a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.841z"></path>
                                    </svg>
                                </div>
                            </div>

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

    <!-- Video Modal -->
    <div id="TestimonialvideoModal" class="hidden fixed inset-0 bg-black/70 z-50 items-center justify-center">
        <div class="relative w-full max-w-3xl mx-auto">
            <button onclick="closeTestimonialVideo()" class="absolute top-2 right-2 text-white text-2xl font-bold z-50">&times;</button>
            <iframe id="TestimonialvideoFrame" class="w-full aspect-video rounded-lg shadow-2xl" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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