<?php
$companies = [
    ["name" => "Company 1", "logo" => "1.png"],
    ["name" => "Company 2", "logo" => "2.png"],
    ["name" => "Company 3", "logo" => "3.png"],
    ["name" => "Company 4", "logo" => "4.png"],
    ["name" => "Company 5", "logo" => "5.png"],
    ["name" => "Company 6", "logo" => "6.png"],
    ["name" => "Company 7", "logo" => "7.png"],
    ["name" => "Company 8", "logo" => "8.png"],
    ["name" => "Company 9", "logo" => "9.png"],
    ["name" => "Company 10", "logo" => "10.png"],
    ["name" => "Company 11", "logo" => "11.png"],
    ["name" => "Company 12", "logo" => "12.png"],
    // ["name" => "Company 13", "logo" => "13.png"],
    ["name" => "Company 14", "logo" => "14.png"],
    ["name" => "Company 15", "logo" => "15.png"],
];

// infinite loop (3x for no gap)
$loop = array_merge($companies, $companies, $companies);
$reverseLoop = array_merge(
    array_reverse($companies),
    array_reverse($companies),
    array_reverse($companies)
);
?>

<style>
    @layer utilities {
        @keyframes scroll-left {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-33.333%);
            }

            /* because 3 copies */
        }

        @keyframes scroll-right {
            0% {
                transform: translateX(-33.333%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-infinite-scroll-left {
            animation: scroll-left 40s linear infinite;
        }

        .animate-infinite-scroll-right {
            animation: scroll-right 40s linear infinite;
        }
    }
</style>

<section class="bg-white py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 ">

    <div class="max-w-7xl mx-auto text-center mb-8 md:mb-12">
        <p
            class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-3 md:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
            Top Companies That Hire CMA USA Professionals
        </p>
    </div>

    <div class="relative overflow-hidden flex flex-col gap-8 md:gap-10 [mask-image:linear-gradient(to_right,transparent,black_10%,black_90%,transparent)]">

        <!-- ✅ LEFT -->
        <div class="flex w-max flex-nowrap items-center gap-8 sm:gap-10 md:gap-12
        animate-infinite-scroll-left hover:[animation-play-state:paused]">

            <?php foreach ($loop as $company): ?>
                <img src="<?= base_url('public/images/CMA/TopCompany/' . $company['logo'])  ?>"
                    class="h-10 sm:h-10 md:h-8 w-auto"
                    alt="<?= $company['name'] ?>">
            <?php endforeach; ?>

        </div>

        <!-- ✅ RIGHT -->
        <div class="flex w-max flex-nowrap items-center gap-8 sm:gap-10 md:gap-12
        animate-infinite-scroll-right hover:[animation-play-state:paused]">

            <?php foreach ($reverseLoop as $company): ?>
                <img src="<?= base_url('public/images/CMA/TopCompany/' . $company['logo'])  ?>"
                    class="h-10 sm:h-10 md:h-8 w-auto"
                    alt="<?= $company['name'] ?>">
            <?php endforeach; ?>

        </div>

    </div>
</section>