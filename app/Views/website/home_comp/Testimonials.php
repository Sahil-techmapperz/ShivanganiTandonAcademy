<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<?php
$testimonials = [
    [
        "text" => "A big thank you to Shivangani Tandon Academy for their exceptional support during the EA course. The quality of teaching, mentorship, and continuous encouragement truly sets this academy apart. The practical insights, structured learning, and constant motivation have helped build confidence and clarity in the EA role. Proud to be an alumnus of an academy that genuinely invests in its students' growth and success.",
        "name" => "Shubham Govardhane",
        "role" => "Senior US Tax Accountant",
        "rating" => 5
    ],
    [
        "text" => "I cleared my remaining parts of EA as well. Thank you so much for your warmth and support. Can't thank enough! I really adore how you put efforts and connect to students personally and encouraging them. This means a lot! Grateful for mentors like you!!",
        "name" => "Pooja Rangwani",
        "role" => "Enrolled Agent",
        "rating" => 5
    ],
    [
        "text" => "I'm deeply thankful to Shivangani Tandon and her academy for guiding me through the Enrolled Agent Part 1 exam. I passed my exams in the first attempt on November 26, 2025. Her ability to simplify complex tax concepts with clarity and patience gave me the confidence to succeed.",
        "name" => "Gauri Thakar",
        "role" => "From US",
        "rating" => 5
    ],
    [
        "text" => "As an EA pursuing student, this program changed the way I handle tax work by moving from manual effort to AI-based efficiency. It helped me save time, improve accuracy, and understand practical tax concepts better. I learned how to break down complex tax topics into simple, structured workflows using AI tools. Now, I use AI not just for support, but as a helpful partner in my learning and practice.",
        "name" => "Santhosh S",
        "role" => "EA student",
        "rating" => 5
    ]
];
?>

<section class="py-12 sm:py-20 px-4 font-poppins relative bg-no-repeat bg-center" 
    style="background-image: url('<?= base_url("public/images/homePageImages/Testimonials/IMG1.png") ?>'); background-size: cover;">
    
    <!-- Optional Overlay for better readability if background is too busy -->
    <div class="absolute inset-0 bg-white/40 z-0"></div>

    <div class="max-w-4xl mx-auto text-center relative z-10">

        <!-- Top Badge -->
        <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium text-sm px-4 py-1 rounded-full mb-6">
            Testimonials
        </span>

        <h2 class="text-3xl md:text-4xl font-bold text-[#161439] mb-4">
            What Our Students Say?
        </h2>

        <div class="swiper testimonialSwiper mt-8">
            <div class="swiper-wrapper">

                <?php foreach ($testimonials as $item): ?>
                    <div class="swiper-slide cursor-grab active:cursor-grabbing">
                        <div class="flex flex-col items-center gap-6 pb-4">
                            
                            <!-- Large Quote Icon -->
                            <div class="text-[#5751E1]/20">
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C15.4647 8 15.017 8.44772 15.017 9V12C15.017 12.5523 14.5693 13 14.017 13H13.017V21H14.017ZM6.017 21L6.017 18C6.017 16.8954 6.91243 16 8.017 16H11.017C11.5693 16 12.017 15.5523 12.017 15V9C12.017 8.44772 11.5693 8 11.017 8H8.017C7.46472 8 7.017 8.44772 7.017 9V12C7.017 12.5523 6.56929 13 6.017 13H5.017V21H6.017Z" />
                                </svg>
                            </div>

                            <!-- Star Rating -->
                            <div class="flex gap-1">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <svg class="w-5 h-5 <?= ($i <= $item['rating']) ? 'text-[#FFC224]' : 'text-gray-300' ?>" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                <?php endfor; ?>
                            </div>

                            <!-- Testimonial Text -->
                            <p class="text-lg md:text-xl text-[#343C4D] italic leading-relaxed max-w-2xl px-4">
                                "<?= $item['text'] ?>"
                            </p>

                            <!-- Student Info -->
                            <div class="mt-2">
                                <p class="font-bold text-xl text-[#5751E1]"> <?= $item['name'] ?></p>
                                <p class="text-sm text-[#7F838C] font-medium"> <?= $item['role'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination !static mt-8"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper(".testimonialSwiper", {
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Ensure slides don't overlap during transition
            watchSlidesProgress: true,
        });
    });
</script>

<style>
    /* Prevent slides from overlapping during fade transition */
    .testimonialSwiper .swiper-slide {
        opacity: 0 !important;
        transition: opacity 1s ease-in-out;
        pointer-events: none;
    }

    .testimonialSwiper .swiper-slide-active {
        opacity: 1 !important;
        pointer-events: auto;
    }

    /* Custom pagination styling */
    .testimonialSwiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #D1D5DB !important;
        opacity: 1;
        transition: all 0.3s ease;
    }

    .testimonialSwiper .swiper-pagination-bullet-active {
        background: #5751E1 !important;
        width: 30px;
        border-radius: 5px;
    }
</style>