<section class="py-8 px-4 sm:py-8 sm:px-6 md:py-18 md:px-8 lg:py-20 lg:px-12 font-poppins">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">

        <div id="customCarousel" class="carousel slide carousel-fade relative" data-bs-ride="carousel">

            <!-- SLIDES -->
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="bg-white rounded-2xl shadow-sm border w-full py-6 sm:py-8 md:py-10 px-4 sm:px-6">
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">

                            <!-- TEXT -->
                            <div class="w-full md:w-9/12 relative md:pl-8">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/quotation-mark 1.png') ?>"
                                    class="absolute -top-4 md:-top-6 left-0 w-[20px] md:w-[30px] opacity-80"
                                    alt="quote">
                                <p class="text-base sm:text-lg md:text-[22px] lg:text-[26px] 
                                        leading-relaxed md:leading-[36px] lg:leading-[42px] 
                                        font-medium text-gray-900">
                                    Official Global Learning Partner of HOCK International, providing world-class study materials and elite test banks.
                                </p>
                            </div>

                            <!-- DIVIDER -->
                            <div class="hidden md:flex justify-center">
                                <div class="w-[2px] h-[60px] md:h-[80px] 
                                    bg-[linear-gradient(180deg,#161439_51.28%,rgba(255,255,255,0)_100%)] 
                                    rounded-full"></div>
                            </div>

                            <!-- LOGO -->
                            <div class="w-full md:w-2/12 text-center">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/1.png') ?>"
                                    class="mx-auto max-h-[50px] sm:max-h-[60px] md:max-h-[70px] object-contain">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <!-- <div class="carousel-item">
                    <div class="bg-white rounded-2xl shadow-sm border w-full py-6 sm:py-8 md:py-10 px-4 sm:px-6">
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">

         
                            <div class="w-full md:w-9/12 relative md:pl-8">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/quotation-mark 1.png') ?>"
                                    class="absolute -top-4 md:-top-6 left-0 w-[20px] md:w-[30px] opacity-80"
                                    alt="quote">
                                <p class="text-base sm:text-lg md:text-[22px] lg:text-[26px] 
                                        leading-relaxed md:leading-[36px] lg:leading-[42px] 
                                        font-medium text-gray-900">
                                    2 We provide academy like Hock International to bring you world class EA & CMA exam preparation.
                                </p>
                            </div>

                         
                            <div class="hidden md:flex justify-center">
                                <div class="w-[2px] h-[60px] md:h-[80px] 
                                        bg-[linear-gradient(180deg,#161439_51.28%,rgba(255,255,255,0)_100%)] 
                                        rounded-full"></div>
                            </div>

                   
                            <div class="w-full md:w-2/12 text-center">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/2.png') ?>"
                                    class="mx-auto max-h-[50px] sm:max-h-[60px] md:max-h-[70px] object-contain">
                            </div>

                        </div>
                    </div>
                </div> -->

            </div>

            <!-- INDICATORS -->
            <!-- <div class="carousel-indicators static mt-6 flex justify-center gap-1">
                <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="0"
                    class="w-2.5 h-2.5 rounded-full bg-gray-300 active" aria-current="true"></button>
                <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="1"
                    class="w-2.5 h-2.5 rounded-full bg-gray-300"></button>
            </div> -->

        </div>
    </div>
</section>

<style>
    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #d1d5db;
        border: none;
        opacity: 1;
        margin: 0 6px;
        transition: all 0.3s ease;
    }

    .carousel-indicators button.active {
        background-color: #9ca3af;
        transform: scale(1.2);
    }
</style>