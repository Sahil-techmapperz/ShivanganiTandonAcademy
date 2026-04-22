<section class="max-w-7xl mx-auto px-4 py-12 md:px-10 lg:py-20 flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 pont-poppins">

    <div class="w-full lg:w-[35%] about_us_text">

        <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
            Skilled Introduce
        </span>

        <p class="text-[22px] sm:text-[26px] md:text-[32px] lg:text-[36px] 
           font-semibold text-[#161439] 
           leading-[30px] sm:leading-[36px] md:leading-[42px] lg:leading-[47.88px] 
           tracking-[-0.5px] md:tracking-[-0.75px] 
           capitalize mb-2">
            Our Top Class & <br class="hidden lg:block"> Expert Instructors In One Place
        </p>
        <p class="text-[14px] sm:text-[15px] md:text-[16px] 
           leading-[22px] sm:leading-[24px] md:leading-[28px] 
           text-[#6D6C80] font-normal font-poppins">
            When an unknown printer took a galley of type and scrambled makespecimen book has survived not only five centuries.
        </p>
    </div>

    <div class="hidden lg:grid w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 gap-y-10 gap-x-6 ">
        <?php
        $users = [
            [
                'name' => 'Mark Jukarberg 1',
                'designation' => 'UX Design Lead',
                'rating' => '4.8',
                'image' => '9c4f01f8a6939646438a7c3800cbdd8608b451a5.png',
                'social' => [
                    [
                        'label' => 'Instagram',
                        'link' => '#',
                        'icon' => '1.png'
                    ],
                    [
                        'label' => 'X',
                        'link' => '#',
                        'icon' => '2.png'
                    ],
                    [
                        'label' => 'WhatsApp',
                        'link' => '#',
                        'icon' => '3.png'
                    ]
                ]
            ],
            [
                'name' => 'Mark Jukarberg 2',
                'designation' => 'UX Design Lead',
                'rating' => '4.2',
                'image' => '0a1e113e64a9408fa8f94aa24763d303ecc8d51c.png',
                'social' => [
                    [
                        'label' => 'Instagram',
                        'link' => '#',
                        'icon' => '1.png'
                    ],
                    [
                        'label' => 'X',
                        'link' => '#',
                        'icon' => '2.png'
                    ],
                    [
                        'label' => 'WhatsApp',
                        'link' => '#',
                        'icon' => '3.png'
                    ]
                ]
            ],
            [
                'name' => 'Mark Jukarberg 2',
                'designation' => 'UX Design Lead',
                'rating' => '4.5',
                'image' => '29110926870be4dbf105f962949b9e6cf5dbace5.png',
                'social' => [
                    [
                        'label' => 'Instagram',
                        'link' => '#',
                        'icon' => '1.png'
                    ],
                    [
                        'label' => 'X',
                        'link' => '#',
                        'icon' => '2.png'
                    ],
                    [
                        'label' => 'WhatsApp',
                        'link' => '#',
                        'icon' => '3.png'
                    ]
                ]
            ],
            [
                'name' => 'Mark Jukarberg 4',
                'designation' => 'UX Design Lead',
                'rating' => '4.3',
                'image' => 'b4afb669410707e3959e8b68abbca544400873b6.png',
                'social' => [
                    [
                        'label' => 'Instagram',
                        'link' => '#',
                        'icon' => '1.png'
                    ],
                    [
                        'label' => 'X',
                        'link' => '#',
                        'icon' => '2.png'
                    ],
                    [
                        'label' => 'WhatsApp',
                        'link' => '#',
                        'icon' => '3.png'
                    ]
                ]
            ]
        ];

        ?>

        <?php foreach ($users as $user): ?>
            <div class="flex flex-col sm:flex-row 
                items-center sm:items-start 
                gap-3 sm:gap-4 md:gap-5 
                text-center sm:text-left 
                group">

                <!-- Image -->
                <div class="relative w-32 h-32 md:w-36 md:h-36 flex-shrink-0 rounded-full
                    bg-[linear-gradient(156deg,#F7F6F9_10.62%,#E9F5F5_90.16%)] overflow-hidden group">

                    <img
                        src="<?= base_url('public/images/Resources/SkilledIntroduce/' . $user['image']) ?>"
                        alt="<?= $user['name'] ?>"
                        class="w-full h-full object-contain transition-transform duration-300 scale-95 group-hover:scale-110">
                </div>

                <!-- Content -->
                <div class="flex flex-col justify-center text-left">

                    <!-- Name -->
                    <p class="text-[14px] sm:text-[15px] md:text-[16px] 
                        font-semibold 
                        leading-[22px] sm:leading-[24px] md:leading-[26px] 
                        font-poppins 
                        text-[#161439]">
                        <?= $user['name'] ?>
                    </p>

                    <!-- Designation -->
                    <p class="text-[#5751E1] 
                        text-[12px] sm:text-[13px] md:text-[14px] 
                        font-normal 
                        leading-[16px] sm:leading-[18px] md:leading-[19.2px] 
                        font-poppins 
                        mb-1">
                        <?= $user['designation'] ?>
                    </p>

                    <!-- Rating -->
                    <div class="flex items-center justify-center sm:justify-start gap-1 mb-3">
                        <img class="w-4" src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>" alt="">
                        <span class="text-[#7F7E97] text-[12px] font-normal leading-[18px] font-poppins align-middle">
                            (<?= $user['rating'] ?> Ratings)
                        </span>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex items-center justify-center sm:justify-start gap-3">
                        <?php foreach ($user['social'] as $social): ?>
                            <a href="<?= $social['link'] ?>" target="_blank"
                                class="w-8 h-8 rounded-full 
                            border border-[#9292B4] 
                            shadow-[2.5px_3.34px_0px_0px_#00000040]
                            flex items-center justify-center 
                            text-slate-400 
                            transition-all duration-300">
                                <img
                                    src="<?= base_url('public/images/Resources/SkilledIntroduce/' . $social['icon']) ?>"
                                    alt="<?= $social['label'] ?>"
                                    class="w-auto h-auto">
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Mobile Carousel -->
    <div class="block lg:hidden w-full">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <div class="owl-carousel owl-theme px-2 SkilledIntroducecarosel">

            <?php foreach ($users as $user): ?>
                <div class="flex flex-col sm:flex-row 
                items-center sm:items-start 
                gap-3 sm:gap-4 md:gap-5 
                text-center sm:text-left 
                group p-2">

                    <!-- Image -->
                    <div class="relative w-32 h-32 md:w-36 md:h-36 flex-shrink-0 rounded-full
                    bg-[linear-gradient(156deg,#F7F6F9_10.62%,#E9F5F5_90.16%)] overflow-hidden group">

                        <img
                            src="<?= base_url('public/images/Resources/SkilledIntroduce/' . $user['image']) ?>"
                            alt="<?= $user['name'] ?>"
                            class="w-full h-full object-contain transition-transform duration-300 scale-95 group-hover:scale-110">
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col justify-center text-left">

                        <!-- Name -->
                        <p class="text-[14px] sm:text-[15px] md:text-[16px] 
                        font-semibold 
                        leading-[22px] sm:leading-[24px] md:leading-[26px] 
                        font-poppins 
                        text-[#161439]">
                            <?= $user['name'] ?>
                        </p>

                        <!-- Designation -->
                        <p class="text-[#5751E1] 
                        text-[12px] sm:text-[13px] md:text-[14px] 
                        font-normal 
                        leading-[16px] sm:leading-[18px] md:leading-[19.2px] 
                        font-poppins 
                        mb-1">
                            <?= $user['designation'] ?>
                        </p>

                        <!-- Rating -->
                        <div class="flex items-center justify-center sm:justify-start gap-1 mb-3">
                            <img class="w-4" src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>" alt="">
                            <span class="text-[#7F7E97] text-[12px] font-normal leading-[18px] font-poppins align-middle">
                                (<?= $user['rating'] ?> Ratings)
                            </span>
                        </div>

                        <!-- Social Icons -->
                        <div class="flex items-center justify-center sm:justify-start gap-3">
                            <?php foreach ($user['social'] as $social): ?>
                                <a href="<?= $social['link'] ?>" target="_blank"
                                    class="w-8 h-8 rounded-full 
                            border border-[#9292B4] 
                            shadow-[2.5px_3.34px_0px_0px_#00000040]
                            flex items-center justify-center 
                            text-slate-400 
                            transition-all duration-300">
                                    <img
                                        src="<?= base_url('public/images/Resources/SkilledIntroduce/' . $social['icon']) ?>"
                                        alt="<?= $social['label'] ?>"
                                        class="w-auto h-auto">
                                </a>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <script>
            $(".SkilledIntroducecarosel").owlCarousel({
                loop: true,
                margin: 12,
                dots: false,
                nav: false,
                autoplay: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 2
                    }
                }
            });
        </script>
    </div>


</section>