<section class="relative mt-1 sm:mt-10 md:mt-10 py-6 sm:py-16 md:py-20 px-2 sm:px-6 md:px-8 lg:px-10 font-poppins bg-cover bg-center bg-no-repeat"
    style="background-image: url('<?= base_url("public/images/homePageImages/LearnwithUs/29c01dc804b188871ff65931f368df7bc947e794 (1).jpg") ?>');">

    <img class="absolute bottom-100 left-0 w-full" src="<?= base_url('public/images/homePageImages/LearnwithUs/SVG2.png') ?>" alt="">

    <div class="max-w-7xl mx-auto px-0 py-0 sm:px-4 sm:py-3 md:px-6 md:py-6 text-center">

        <!-- Top Badge -->
        <span class="inline-block bg-[#FFDFE4] px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3 mb-4">
            <span>🎯</span>
            <div class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-[#DB1B2F] to-[#973C00] text-sm">
                FREE AI Certification included
            </div>
        </span>


        <!-- Heading -->
        <p
            class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-1 sm:mb-2 md:mb-3 lg:mb-6 xl:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
            One Program → 4 Powerful Skill Sets
        </p>

        <!-- Sub Text -->
        <p class="text-sm sm:text-base md:text-[18px] leading-relaxed sm:leading-7 md:leading-[28px] text-[#6D6C80] mb-1 sm:mb-2 md:mb-2">
           Whether you want to master US Taxation, lead corporate strategy with a CMA USA, or future-proof your career with AI-driven finance automation, we provide the industry-led training you need to succeed in the global market.

        </p>


        <div class="py-1 sm:py-3 md:py-4 lg:py-6 xl:py-8 ">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-10 max-w-7xl mx-auto w-full ">

                <?php
                $courses = [
                    [
                        'title' => 'Enrolled Agent (EA)',
                        'image' => '633.png',
                        'label' => 'EA',
                        'reviews' => 4.2,
                        'features' => [
                            'US Taxation (Individuals & Businesses)',
                            'IRS Certification',
                            'Corporate Finance Roles'
                        ],
                        'link' => 'EA'
                    ],
                    [
                        'title' => 'CMA (Certified Management Accountant)',
                        'image' => '637.png',
                        'label' => 'CMA',
                        'reviews' => 4.4,
                        'features' => [
                            'Financial Analysis',
                            'Strategic Decision-Making',
                            'Corporate Finance Roles'
                        ],
                        'link' => 'CMA'
                    ],
                    [
                        'title' => 'Tax Software Training',
                        'image' => '641.png',
                        'label' => 'Tax',
                        'reviews' => 4.6,
                        'features' => [
                            'Drake Software',
                            'Live Tax Return Filing',
                            'Practical Exposure'
                        ],
                        'link' => 'TST'
                    ],
                    [
                        'title' => 'AI For Finance Professionals',
                        'image' => '645.png',
                        'label' => 'AI Finance',
                        'reviews' => 4.8,
                        'features' => [
                            'Automating Tax Preparation',
                            'AI Tools For Accounting & Reporting',
                            'Prompt Engineering For Finance',
                            'Productivity & Workflow Automation'
                        ],
                        'link' => 'AI'
                    ],
                ];
                ?>

                <?php foreach ($courses as $course) : ?>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                        <div class="relative h-48">
                            <img src="<?= base_url('public/images/AI/FREEAI_Certification_included/' . $course['image']) ?>"
                                alt="<?= $course['label'] ?>" class="w-full h-full object-cover">
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-[#0000004F]"></div>
                            <span class="absolute top-2 left-2 bg-white px-4 py-1 rounded text-sm font-medium text-[#161439] shadow-sm font-inter"><?= $course['label'] ?></span>
                        </div>
                        <div class="py-2 px-2 flex-grow">
                            <!-- <div class="flex items-center justify-end gap-1 mb-2">
                                <span class="text-yellow-400 text-lg">★</span>
                                <span class="text-[12px] leading-[24.5px] text-[#7F7E97] font-normal font-poppins">(<?= $course['reviews'] ?> Reviews)</span>
                            </div> -->
                            <h3 class="font-poppins font-semibold text-[15px] leading-[26px] text-[#161439] capitalize mb-2 text-left"><?= $course['title'] ?></h3>
                            <ul class="space-y-3 font-poppins font-medium text-[11px] leading-[26px] text-[#5D5D5D] capitalize align-middle">
                                <?php foreach ($course['features'] as $feature) : ?>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#5751E1]">→</span>
                                        <span><?= $feature ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="border-t border-gray-100 p-2 text-center">
                            <a href="<?= base_url($course['link']) ?>" class="font-poppins text-[16px] font-semibold leading-[15px] text-[#5751E1] hover:text-indigo-800 transition-colors">Know More</a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>

    <img class="absolute bottom-0 left-0 w-full" src="<?= base_url('public/images/homePageImages/LearnwithUs/Vector_lower.png') ?>" alt="">

</section>