<section class="bg-white py-5 sm:py-14 md:py-16 px-2 sm:px-3 md:px-4 font-poppins">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 md:px-4">

        <!-- Header -->
        <div class="text-center mb-10">
            <span
                class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
                 News & Blogs
            </span>
            <h2 class="text-2xl md:text-4xl font-bold mt-4 text-[#161439]">
                Our Latest News Feed
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                Stay ahead of the curve with expert insights, industry trends, and practical guides on how AI is revolutionizing US taxation and global finance.
            </p>
        </div>

        <!-- Slider -->
        <div class="grid lg:grid-cols-2 gap-6 items-start">

            <!-- LEFT ACTIVE SLIDE -->
            <div id="activeSlide" class="relative rounded-2xl overflow-hidden shadow-lg">
                <img
                    id="activeImage"
                    class="w-full h-[200px] sm:h-[250px] md:h-[320px] max-h-[350px] object-cover mx-auto rounded-lg">

                <div class="absolute bottom-0 left-0 w-full p-4 sm:p-5 bg-gradient-to-t from-black/80 to-transparent text-white">
                    <p class="text-[12px] sm:text-xs mb-1 sm:mb-2 flex flex-wrap gap-4 items-center text-gray-400">
                        <span class="flex items-center gap-1">
                            <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Vector (1).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                            20 July, 2024
                        </span>
                        <span class="flex items-center gap-1">
                            <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Vector (3).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                            Admin
                        </span>
                    </p>
                    <h3 id="activeTitle" class="text-[16px] leading-[20px] sm:text-[22px] sm:leading-[30px] md:text-[26px] md:leading-[34px] font-poppins font-semibold text-white">
                        <!-- Title Here -->
                    </h3>
                </div>
            </div>

            <!-- RIGHT SIDE (NEXT SLIDES) -->
            <div id="nextSlides" class="space-y-4"></div>

        </div>

        <!-- Dots -->
        <div class="flex justify-center mt-6 gap-2" id="dots"></div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const baseUrl = "<?= base_url() ?>";

        <?php
        $blogs_data = [];
        if (isset($latest_blogs) && !empty($latest_blogs)) {
            foreach ($latest_blogs as $blog) {
                $blogs_data[] = [
                    'title'    => $blog['title'] ?? 'No Title',
                    'image'    => $blog['image'] ? base_url($blog['image']) : base_url('public/images/homePageImages/NewsBlogs/blogimg.png'),
                    'category' => "Academy News",
                    'slug'     => $blog['slug'] ?? '',
                    'date'     => date('d M, Y', strtotime($blog['created_at'] ?? 'now')),
                    'author'   => $blog['author'] ?? 'Admin'
                ];
            }
        }
        ?>
        const blogs = <?= json_encode($blogs_data); ?>;

        let currentIndex = 0;

        function renderSlider() {
            if (!blogs.length) return;

            const total = blogs.length;

            // ✅ CORRECT ROTATION LOGIC
            const active = blogs[currentIndex];
            const next1 = blogs[(currentIndex + 1) % total];
            const next2 = blogs[(currentIndex + 2) % total];

            // ✅ ACTIVE SLIDE
            const activeImage = document.getElementById("activeImage");
            const activeTitle = document.getElementById("activeTitle");
            
            // Add link to active slide
            activeImage.parentElement.onclick = () => window.location.href = baseUrl + "blog/" + active.slug;
            activeImage.parentElement.style.cursor = "pointer";

            activeImage.src = active.image;
            activeTitle.innerText = active.title;
            
            // Update active metadata
            const activeMeta = activeImage.nextElementSibling.querySelector('p');
            activeMeta.innerHTML = `
                <span class="flex items-center gap-1">
                    <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Vector (1).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                    ${active.date}
                </span>
                <span class="flex items-center gap-1">
                    <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Vector (3).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                    ${active.author}
                </span>
            `;

            // ✅ RIGHT SIDE (ONLY NEXT 2)
            const nextContainer = document.getElementById("nextSlides");
            nextContainer.innerHTML = "";

            [next1, next2].forEach((item, index) => {
                const nextIndex = (currentIndex + index + 1) % total;

                const div = document.createElement("div");
                div.className = "flex gap-4 border border-[#E5E7EB] rounded-xl p-2 sm:p-3 md:p-4 cursor-pointer hover:shadow-md transition bg-white";
                div.onclick = (e) => {
                    if (e.target.closest('h4')) {
                        window.location.href = baseUrl + "blog/" + item.slug;
                    } else {
                        setSlide(nextIndex);
                    }
                };

                div.innerHTML = `
                    <img 
                        src="${item.image}" 
                        class="w-24 h-20 sm:w-28 sm:h-24 md:w-32 md:h-28 lg:w-36 lg:h-32 rounded-lg object-cover"
                        />

                    <div class="flex flex-col justify-evenly flex-1">

                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full w-max">
                            ${item.category}
                        </span>

                        <p class="text-[12px] sm:text-xs mb-1 sm:mb-2 flex flex-wrap gap-4 items-center text-gray-400">
                            <span class="flex items-center gap-1">
                                <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Icon (1).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                                ${item.date}
                            </span>
                            <span class="flex items-center gap-1">
                                <img src="<?= base_url('public/images/homePageImages/NewsBlogs/Vector (2).png') ?>" alt="" class="w-3 h-3 sm:w-4 sm:h-4">
                                ${item.author}
                            </span>
                        </p>

                        <h4 class="text-sm font-semibold text-[#161439] hover:text-[#5751E1] transition-colors leading-snug line-clamp-2">
                            ${item.title}
                        </h4>

                    </div>
                `;

                nextContainer.appendChild(div);
            });

            renderDots();
        }

        function renderDots() {
            const dots = document.getElementById("dots");
            dots.innerHTML = "";

            blogs.forEach((_, i) => {
                const dot = document.createElement("span");

                dot.className = `w-2.5 h-2.5 rounded-full cursor-pointer transition ${
        i === currentIndex ? "bg-[#161439]" : "bg-gray-300"
      }`;

                dot.onclick = () => setSlide(i);
                dots.appendChild(dot);
            });
        }

        function setSlide(index) {
            currentIndex = index;
            renderSlider();
        }

        // 🔁 OPTIONAL AUTO SLIDE (uncomment if needed)
        /*
        setInterval(() => {
          currentIndex = (currentIndex + 1) % blogs.length;
          renderSlider();
        }, 5000);
        */

        renderSlider();
    });
</script>