<div class="py-8 sm:py-10 md:py-16 px-2 sm:px-3 md:px-4 font-poppins">

    <div class="max-w-7xl mx-auto text-center mb-10">

        <!-- Badge -->
        <div class="inline-block bg-[#FFDFE4] text-[#FE002A] text-sm px-4 py-1 rounded-full font-medium inline-flex justify-center items-center gap-3 mb-4">
            Our Partner
        </div>

        <p class="text-[22px] sm:text-[26px] md:text-[32px] lg:text-[36px] 
           font-semibold text-[#161439] 
           leading-[30px] sm:leading-[36px] md:leading-[42px] lg:leading-[47.88px] 
           tracking-[-0.5px] md:tracking-[-0.75px] 
           capitalize mb-2">
            Collaboration
        </p>

    </div>

    <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8">

        <div id="collabCarousel" class="carousel slide carousel-fade relative" data-bs-ride="carousel">

            <!-- SLIDES -->
            <div class="carousel-inner">

                <!-- Slide 1: HOCK International -->
                <div class="carousel-item active">
                    <div class="bg-white rounded-2xl shadow-sm border w-full py-6 sm:py-8 md:py-10 px-4 sm:px-6">
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">

                            <!-- TEXT -->
                            <div class="w-full md:w-9/12 relative md:pl-8 text-left">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/quotation-mark 1.png') ?>"
                                    class="absolute -top-4 md:-top-6 left-0 w-[20px] md:w-[30px] opacity-80"
                                    alt="quote">
                                <p class="text-base sm:text-lg md:text-[20px] lg:text-[22px] 
                                        leading-relaxed md:leading-[32px] lg:leading-[36px] 
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

                <!-- Slide 2: Rubal Sabharwal -->
                <div class="carousel-item">
                    <div class="bg-white rounded-2xl shadow-sm border w-full py-6 sm:py-8 md:py-10 px-4 sm:px-6">
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">

                            <!-- TEXT -->
                            <div class="w-full md:w-9/12 relative md:pl-8 text-left">
                                <img src="<?= base_url('public/images/CMA/CMA_lowe_banner/quotation-mark 1.png') ?>"
                                    class="absolute -top-4 md:-top-6 left-0 w-[20px] md:w-[30px] opacity-80"
                                    alt="quote">
                                <p class="text-base sm:text-lg md:text-[18px] lg:text-[20px] 
                                        leading-relaxed md:leading-[28px] lg:leading-[32px] 
                                        font-medium text-gray-900">
                                    Collaborated with <strong>Rubal Sabharwal.</strong> She is a Strategy & Digital Transformation expert with 23+ years of global experience across elite firms like BCG, IBM, and Gartner. This partnership ensures that our students don't just learn traditional tax laws, but master the AI-driven analytics and digital transformation strategies required to lead at the highest corporate levels.
                                </p>
                            </div>

                            <!-- DIVIDER -->
                            <div class="hidden md:flex justify-center">
                                <div class="w-[2px] h-[60px] md:h-[80px] 
                                    bg-[linear-gradient(180deg,#161439_51.28%,rgba(255,255,255,0)_100%)] 
                                    rounded-full"></div>
                            </div>

                            <!-- IMAGE -->
                            <div class="w-full md:w-2/12 flex justify-center">
                                <img src="<?= base_url('public/images/AI/AI_lower_banner/0c4b6115a05ba07789f333267358ebd0da872944.jpg') ?>"
                                    class="w-[70px] h-[70px] sm:w-[80px] sm:h-[80px] md:w-[95px] md:h-[95px] object-cover rounded-full border border-gray-300">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- INDICATORS -->
            <div class="carousel-indicators static mt-6 flex justify-center gap-1">
                <button type="button" data-bs-target="#collabCarousel" data-bs-slide-to="0"
                    class="w-2.5 h-2.5 rounded-full bg-gray-300 active" aria-current="true"></button>
                <button type="button" data-bs-target="#collabCarousel" data-bs-slide-to="1"
                    class="w-2.5 h-2.5 rounded-full bg-gray-300"></button>
            </div>

        </div>
    </div>

</div>

<style>
    #collabCarousel .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #d1d5db;
        border: none;
        opacity: 1;
        margin: 0 6px;
        transition: all 0.3s ease;
    }

    #collabCarousel .carousel-indicators button.active {
        background-color: #9ca3af;
        transform: scale(1.2);
    }
</style>