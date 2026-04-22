 <!-- Owl Carousel -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


 <style>
     /* --- Carousel Item --- */
     .owl-item {
         transition: all 0.4s ease-in-out;
         display: flex;
         justify-content: center;
         padding: 50px 0;
     }

     /* Card */
     .service-card {
         transition: all 0.4s ease;
         background: transparent;
         width: 100%;
         max-width: 380px;
         border-radius: 1rem;
     }

     /* 🔥 ACTIVE CENTER CARD */
     .owl-item.center .service-card {
         transform: scale(1.1);
         background: #fff;
         padding: 2rem 1rem;
         z-index: 10;
         border: 1px solid #E8E8E8;
         /* indigo-600 */
         box-shadow: 0px 0px 30px 0px #E8E8E8;
         /* ✅ your custom shadow */

     }

     /* Inactive cards */
     .owl-item:not(.center) .service-card {
         padding: 2rem 1rem;
     }

     .service-card span {
         transition: all 0.3s ease;
     }

     .owl-item.center .service-card span {
         background-color: #5751E1 !important;
         color: #fff !important;
         border: none !important;
     }

     /* --- DOTS --- */
     .owl-theme .owl-dots {
         margin-top: 20px !important;
         display: flex;
         justify-content: center;
     }

     .owl-theme .owl-dots .owl-dot span {
         width: 10px;
         height: 10px;
         margin: 5px 8px;
         background: #D1D5DB;
         border-radius: 50%;
         transition: all 0.3s ease;
     }

     .owl-theme .owl-dots .owl-dot.active span {
         width: 10px;
         height: 10px;
         background: #5751E1;
         border: 2px solid white;
         box-shadow: 0 0 0 4px #5751E1;
         margin: 5px 12px;
     }

     .owl-carousel .owl-dots.disabled {
         display: block !important;
     }
 </style>

 <section class="bg-white py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4">

     <div class="text-center mb-10">
         <span
             class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
             Career Path
         </span>
         <p
             class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-1 sm:mb-2 md:mb-3 lg:mb-6 xl:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
             Career Opportunities After EA
         </p>
     </div>

     <div class="bg-cover bg-center h-auto w-full"
         style="background-image: url('<?= base_url('public/images/EA/CareerPath/6d237fe8c802dc0f1d25748ba652a5fb463088ab (1).png') ?>');">
         <div class="max-w-7xl mx-auto py-2">

             <div class="owl-carousel owl-theme">
                 <?php
                    $services = [
                        [
                            'title' => 'US Tax Analyst',
                            'desc'  => 'business goal defines the specific objectives your company aims to achieve.',
                            'icon'  => 'SVG (1).png',
                            'link'  => 'us-tax-analyst'
                        ],
                        [
                            'title' => 'Tax Consultant',
                            'desc'  => 'Our Process Development service focuses on designing, optimizing. and implementing',
                            'icon'  => 'SVG (2).png',
                            'link'  => 'tax-consultant'
                        ],
                        [
                            'title' => 'US Tax Analyst',
                            'desc'  => 'Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero',
                            'icon'  => 'SVG (3).png',
                            'link'  => 'us-tax-analyst-2'
                        ]
                    ];
                    ?>
                 <?php foreach ($services as $service): ?>
                     <div class="item">
                         <div class="service-card flex items-start">

                             <!-- LEFT 20% -->
                             <div class="w-1/5 flex justify-start">
                                 <div class="mb-6 text-indigo-500">
                                     <img class="w-10 h-10 object-contain"
                                         src="<?= base_url('public/images/EA/CareerPath/' . $service['icon']) ?>"
                                         alt="">
                                 </div>
                             </div>

                             <!-- RIGHT 80% -->
                             <div class="w-4/5">
                                 <p class="text-[22px] font-bold text-[#1C2539] mb-6 leading-[22px] font-redhat fornt-bold">
                                     <?= esc($service['title']) ?>
                                 </p>

                                 <p class="text-[#5D666F] mb-4 font-normal text-base leading-6 font-dmsans">
                                     <?= esc($service['desc']) ?>
                                 </p>

                                 <!-- LINK -->
                                 <a href="<?= base_url($service['link']) ?>"
                                     class="flex items-center gap-3 text-[#1C2539] font-normal text-[16px] leading-[27.2px] font-dmsans cursor-pointer group">

                                     <span class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center shadow-[0px_9px_18px_0px_#1810100D]">
                                         →
                                     </span>
                                     Read More
                                 </a>

                             </div>

                         </div>
                     </div>
                 <?php endforeach; ?>

             </div>
         </div>
     </div>
 </section>



 <!-- JS -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

 <script>
     $(document).ready(function() {
         $(".owl-carousel").owlCarousel({
             center: true,
             loop: true,
             margin: 20,
             dots: true,
             autoplay: true,
             autoplayTimeout: 4000,
             smartSpeed: 800,
             responsive: {
                 0: {
                     items: 1
                 },
                 768: {
                     items: 2
                 },
                 1024: {
                     items: 3
                 }
             }
         });
     });
 </script>