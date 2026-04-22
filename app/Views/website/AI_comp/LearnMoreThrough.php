<section class="bg-[radial-gradient(56.25%_196.73%_at_100%_100%,#1A1A48_0%,#021023_100%)] py-8 px-1 sm:py-12 sm:px-2 md:py-16 md:px-4">
    <div class="max-w-7xl mx-auto px-0 py-0 sm:px-4 sm:py-3 md:px-6 md:py-4 text-center text-[#FFFFFF]">


        <!-- Heading -->
        <h2
            data-aos="fade-up"
            class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#FFFFFF] mb-2 sm:mb-3 md:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
            Achieve Your Goal With Skill Grow
        </h2>

        <!-- Sub Text -->
        <p
            data-aos="fade-up" data-aos-delay="200"
            class="font-normal max-w-2xl mx-auto mb-3 sm:mb-8 md:mb-12 font-poppins text-[#FFFFFF]">
            Master the tools of tomorrow by bridging the gap between traditional tax expertise and modern AI automation.
        </p>



        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <?php
            $videos = [
                [
                    'id' => 'c5wBDMh1W3s',
                    'image' => base_url('public/images/AI/LearnMoreThrough/764473f291dba34fbc598ae4484006d4bff49a76.jpg')
                ],
                [
                    'id' => 'OWZo_qqrQIU',
                    'image' => base_url('public/images/AI/LearnMoreThrough/497be9bef23c2349aef7eeb3e60a180f0bdf72b6.jpg')
                ]
            ];
            ?>

            <!-- Card 1 -->
            <?php foreach ($videos as $video): ?>
                <div onclick="openYoutube('<?= $video['id'] ?>')"
                    class="relative rounded-2xl overflow-hidden border border-gray-700/50 shadow-2xl aspect-[16/9] group cursor-pointer">

                    <!-- Image -->
                    <img src="<?= $video['image'] ?>"
                        class="absolute inset-0 w-full h-full object-cover">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-[#000000A1] group-hover:bg-[#000000CC] transition duration-300 z-10"></div>

                    <!-- Play Icon -->
                    <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png"
                        class="absolute inset-0 m-auto w-14 h-14 z-20 opacity-90 group-hover:scale-110 transition duration-300">
                </div>

            <?php endforeach; ?>

        </div>

        <!-- MODAL -->
        <div id="videoModal"
            class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">

            <div class="relative w-[90%] md:w-[800px] aspect-video bg-black rounded-xl overflow-hidden">

                <button onclick="closeYoutube()"
                    class="absolute top-2 right-3 text-white text-3xl z-50">
                    ✕
                </button>

                <iframe id="videoFrame"
                    class="w-full h-full"
                    src=""
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>

            </div>
        </div>

        <script>
            function openYoutube(videoId) {
                const modal = document.getElementById("videoModal");
                const iframe = document.getElementById("videoFrame");

                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            }

            function closeYoutube() {
                const modal = document.getElementById("videoModal");
                const iframe = document.getElementById("videoFrame");

                iframe.src = "";
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            }
        </script>

    </div>


</section>