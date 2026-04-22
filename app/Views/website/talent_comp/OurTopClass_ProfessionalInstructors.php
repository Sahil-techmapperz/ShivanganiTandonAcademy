<style>
    /* Blob shape */
    .blob {
        background: #fbbf24;
        border-radius: 40% 60% 60% 40% / 50% 40% 60% 50%;
    }

    /* Active avatar */
    .active-avatar {
        border: 3px solid #5751E1;
    }
</style>

<section class="py-8 px-4 sm:py-8 sm:px-6 md:py-18 md:px-8 lg:py-20 lg:px-12 bg-cover bg-center bg-no-repeat relative mt-8 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-20" 
style="background-image: url('<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/7d1e75e9117d08e3f22deb2b2b0f3c3250afffb8.jpg')?>');">

    <div class="max-w-6xl mx-auto px-4 text-center">

        <div class="text-center mb-10">
            <span class="inline-block bg-[#FFDFE4] text-[#FE002A] font-medium font-poppins text-sm px-4 py-1 rounded-full mb-4">
                Skilled Introduce
            </span>
            <p class="text-[24px] sm:text-[32px] md:text-[36px] font-semibold text-[#161439] mb-1 sm:mb-2 md:mb-3 lg:mb-6 xl:mb-6 leading-[1.33] tracking-[-0.75px] capitalize font-poppins">
                Our Top Class & Professional Instructors In One Place
            </p>
        </div>

        <!-- MAIN -->
        <div class="grid md:grid-cols-2 gap-10 items-center text-left">
            <!-- LEFT IMAGE -->
            <div class="relative flex justify-center">

                <img class="w-[250px] h-[300px] md:w-[400px] md:h-[250px] absolute bottom-0 object-contain" src="<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/yellowSVG.png') ?>" alt="">

                <img
                    id="mainImage"
                    src="<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/8e49ad058ca1f903e0c7b73e4099bbe143ab5163.png') ?>"
                    alt="Instructor"
                    class="relative z-10 
                    w-[220px] h-[260px] 
                    sm:w-[240px] sm:h-[280px] 
                    md:w-[300px] md:h-[300px] 
                    object-contain 
                    rounded-xl 
                    mx-auto" />
            </div>

            <!-- RIGHT CONTENT -->
            <div>

                <!-- Rating -->
                <div class="flex items-center gap-2 mb-3 border rounded-full px-4 w-max bg-[#FFFFFF]">
                    <div id="stars" class="flex gap-2"></div>
                    <span id="reviews" class="text-gray-500 text-sm"></span>
                </div>

                <!-- Name -->
                <h3 id="name" class="font-poppins font-semibold text-[24px] leading-[31.2px] text-[#161439]">Olivia Mia</h3>

                <!-- Role -->
                <p id="role" class="font-poppins text-[#5751E1] font-normal text-[18px] leading-[18px] mt-1">Web Design</p>

                <!-- Description -->
                <p id="desc" class="text-[#6D6C80] mt-4 leading-[28px] text-[16px] font-normal font-inter">
                    SkillGro The standard chunk of Lorem Ipsum used since the 1500s is
                    reproduced below for those interested.
                </p>

                <!-- Social -->
                <div class="flex gap-3 mt-6">
                    <a id="facebook" target="_blank" class="w-10 h-10 flex items-center justify-center cursor-pointer">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="53"
                                height="54"
                                viewBox="0 0 53 54"
                                fill="none">
                                <g filter="url(#filter0_d_646_981)">
                                    <rect
                                        width="50"
                                        height="50"
                                        rx="25"
                                        fill="white"
                                        shape-rendering="crispEdges" />
                                    <rect
                                        x="0.5"
                                        y="0.5"
                                        width="49"
                                        height="49"
                                        rx="24.5"
                                        stroke="#9292B4"
                                        shape-rendering="crispEdges" />
                                    <path
                                        d="M29.6484 25.75H26.7188V34.5H22.8125V25.75H19.6094V22.1562H22.8125V19.3828C22.8125 16.2578 24.6875 14.5 27.5391 14.5C28.9062 14.5 30.3516 14.7734 30.3516 14.7734V17.8594H28.75C27.1875 17.8594 26.7188 18.7969 26.7188 19.8125V22.1562H30.1953L29.6484 25.75Z"
                                        fill="#7F7E97" />
                                </g>
                                <defs>
                                    <filter
                                        id="filter0_d_646_981"
                                        x="0"
                                        y="0"
                                        width="52.5043"
                                        height="53.3391"
                                        filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix
                                            in="SourceAlpha"
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                            result="hardAlpha" />
                                        <feOffset dx="2.50435" dy="3.33913" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend
                                            mode="normal"
                                            in2="BackgroundImageFix"
                                            result="effect1_dropShadow_646_981" />
                                        <feBlend
                                            mode="normal"
                                            in="SourceGraphic"
                                            in2="effect1_dropShadow_646_981"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </a>
                    <a id="twitter" target="_blank" class="w-10 h-10 flex items-center justify-center cursor-pointer">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="53"
                                height="54"
                                viewBox="0 0 53 54"
                                fill="none">
                                <g filter="url(#filter0_d_646_983)">
                                    <rect
                                        width="50"
                                        height="50"
                                        rx="25"
                                        fill="white"
                                        shape-rendering="crispEdges" />
                                    <rect
                                        x="0.5"
                                        y="0.5"
                                        width="49"
                                        height="49"
                                        rx="24.5"
                                        stroke="#9292B4"
                                        shape-rendering="crispEdges" />
                                    <g clip-path="url(#clip0_646_983)">
                                        <mask
                                            id="mask0_646_983"
                                            style="mask-type: luminance"
                                            maskUnits="userSpaceOnUse"
                                            x="16"
                                            y="16"
                                            width="17"
                                            height="17">
                                            <path d="M16 16H33V33H16V16Z" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_646_983)">
                                            <path
                                                d="M29.3875 16.7964H31.9946L26.2996 23.322L33 32.2032H27.7543L23.6427 26.8179L18.9434 32.2032H16.3339L22.4248 25.2211L16 16.7976H21.3793L25.0901 21.7191L29.3875 16.7964ZM28.4707 30.6392H29.9157L20.59 18.279H19.0406L28.4707 30.6392Z"
                                                fill="#7F7E97" />
                                        </g>
                                    </g>
                                </g>
                                <defs>
                                    <filter
                                        id="filter0_d_646_983"
                                        x="0"
                                        y="0"
                                        width="52.5043"
                                        height="53.3391"
                                        filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix
                                            in="SourceAlpha"
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                            result="hardAlpha" />
                                        <feOffset dx="2.50435" dy="3.33913" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend
                                            mode="normal"
                                            in2="BackgroundImageFix"
                                            result="effect1_dropShadow_646_983" />
                                        <feBlend
                                            mode="normal"
                                            in="SourceGraphic"
                                            in2="effect1_dropShadow_646_983"
                                            result="shape" />
                                    </filter>
                                    <clipPath id="clip0_646_983">
                                        <rect
                                            width="17"
                                            height="17"
                                            fill="white"
                                            transform="translate(16 16)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </a>

                    <a id="whatsapp" target="_blank" class="w-10 h-10 flex items-center justify-center cursor-pointer">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="53"
                                height="54"
                                viewBox="0 0 53 54"
                                fill="none">
                                <g filter="url(#filter0_d_646_985)">
                                    <rect
                                        width="50"
                                        height="50"
                                        rx="25"
                                        fill="white"
                                        shape-rendering="crispEdges" />
                                    <rect
                                        x="0.5"
                                        y="0.5"
                                        width="49"
                                        height="49"
                                        rx="24.5"
                                        stroke="#9292B4"
                                        shape-rendering="crispEdges" />
                                    <path
                                        d="M31.0938 18.3281C32.7344 19.9688 33.75 22.1172 33.75 24.4609C33.75 29.2266 29.7656 33.1328 24.9609 33.1328C23.5156 33.1328 22.1094 32.7422 20.8203 32.0781L16.25 33.25L17.4609 28.7578C16.7188 27.4688 16.2891 25.9844 16.2891 24.4219C16.2891 19.6562 20.1953 15.75 24.9609 15.75C27.3047 15.75 29.4922 16.6875 31.0938 18.3281ZM24.9609 31.6484C28.9453 31.6484 32.2656 28.4062 32.2656 24.4609C32.2656 22.5078 31.4453 20.7109 30.0781 19.3438C28.7109 17.9766 26.9141 17.2344 25 17.2344C21.0156 17.2344 17.7734 20.4766 17.7734 24.4219C17.7734 25.7891 18.1641 27.1172 18.8672 28.2891L19.0625 28.5625L18.3203 31.2188L21.0547 30.4766L21.2891 30.6328C22.4219 31.2969 23.6719 31.6484 24.9609 31.6484ZM28.9453 26.2578C29.1406 26.375 29.2969 26.4141 29.3359 26.5312C29.4141 26.6094 29.4141 27.0391 29.2188 27.5469C29.0234 28.0547 28.1641 28.5234 27.7734 28.5625C27.0703 28.6797 26.5234 28.6406 25.1562 28.0156C22.9688 27.0781 21.5625 24.8906 21.4453 24.7734C21.3281 24.6172 20.5859 23.6016 20.5859 22.5078C20.5859 21.4531 21.1328 20.9453 21.3281 20.7109C21.5234 20.4766 21.7578 20.4375 21.9141 20.4375C22.0312 20.4375 22.1875 20.4375 22.3047 20.4375C22.4609 20.4375 22.6172 20.3984 22.8125 20.8281C22.9688 21.2578 23.4375 22.3125 23.4766 22.4297C23.5156 22.5469 23.5547 22.6641 23.4766 22.8203C23.0859 23.6406 22.6172 23.6016 22.8516 23.9922C23.7109 25.4375 24.5312 25.9453 25.8203 26.5703C26.0156 26.6875 26.1328 26.6484 26.2891 26.5312C26.4062 26.375 26.8359 25.8672 26.9531 25.6719C27.1094 25.4375 27.2656 25.4766 27.4609 25.5547C27.6562 25.6328 28.7109 26.1406 28.9453 26.2578Z"
                                        fill="#7F7E97" />
                                </g>
                                <defs>
                                    <filter
                                        id="filter0_d_646_985"
                                        x="0"
                                        y="0"
                                        width="52.5043"
                                        height="53.3391"
                                        filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix
                                            in="SourceAlpha"
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                            result="hardAlpha" />
                                        <feOffset dx="2.50435" dy="3.33913" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend
                                            mode="normal"
                                            in2="BackgroundImageFix"
                                            result="effect1_dropShadow_646_985" />
                                        <feBlend
                                            mode="normal"
                                            in="SourceGraphic"
                                            in2="effect1_dropShadow_646_985"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </a>

                    <a id="instagram" target="_blank" class="w-10 h-10 flex items-center justify-center cursor-pointer">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="53"
                                height="54"
                                viewBox="0 0 53 54"
                                fill="none">
                                <g filter="url(#filter0_d_646_987)">
                                    <rect
                                        width="50"
                                        height="50"
                                        rx="25"
                                        fill="white"
                                        shape-rendering="crispEdges" />
                                    <rect
                                        x="0.5"
                                        y="0.5"
                                        width="49"
                                        height="49"
                                        rx="24.5"
                                        stroke="#9292B4"
                                        shape-rendering="crispEdges" />
                                    <path
                                        d="M25 20.0078C27.4609 20.0078 29.4922 22.0391 29.4922 24.5C29.4922 27 27.4609 28.9922 25 28.9922C22.5 28.9922 20.5078 27 20.5078 24.5C20.5078 22.0391 22.5 20.0078 25 20.0078ZM25 27.4297C26.6016 27.4297 27.8906 26.1406 27.8906 24.5C27.8906 22.8984 26.6016 21.6094 25 21.6094C23.3594 21.6094 22.0703 22.8984 22.0703 24.5C22.0703 26.1406 23.3984 27.4297 25 27.4297ZM30.7031 19.8516C30.7031 20.4375 30.2344 20.9062 29.6484 20.9062C29.0625 20.9062 28.5938 20.4375 28.5938 19.8516C28.5938 19.2656 29.0625 18.7969 29.6484 18.7969C30.2344 18.7969 30.7031 19.2656 30.7031 19.8516ZM33.6719 20.9062C33.75 22.3516 33.75 26.6875 33.6719 28.1328C33.5938 29.5391 33.2812 30.75 32.2656 31.8047C31.25 32.8203 30 33.1328 28.5938 33.2109C27.1484 33.2891 22.8125 33.2891 21.3672 33.2109C19.9609 33.1328 18.75 32.8203 17.6953 31.8047C16.6797 30.75 16.3672 29.5391 16.2891 28.1328C16.2109 26.6875 16.2109 22.3516 16.2891 20.9062C16.3672 19.5 16.6797 18.25 17.6953 17.2344C18.75 16.2188 19.9609 15.9062 21.3672 15.8281C22.8125 15.75 27.1484 15.75 28.5938 15.8281C30 15.9062 31.25 16.2188 32.2656 17.2344C33.2812 18.25 33.5938 19.5 33.6719 20.9062ZM31.7969 29.6562C32.2656 28.5234 32.1484 25.7891 32.1484 24.5C32.1484 23.25 32.2656 20.5156 31.7969 19.3438C31.4844 18.6016 30.8984 17.9766 30.1562 17.7031C28.9844 17.2344 26.25 17.3516 25 17.3516C23.7109 17.3516 20.9766 17.2344 19.8438 17.7031C19.0625 18.0156 18.4766 18.6016 18.1641 19.3438C17.6953 20.5156 17.8125 23.25 17.8125 24.5C17.8125 25.7891 17.6953 28.5234 18.1641 29.6562C18.4766 30.4375 19.0625 31.0234 19.8438 31.3359C20.9766 31.8047 23.7109 31.6875 25 31.6875C26.25 31.6875 28.9844 31.8047 30.1562 31.3359C30.8984 31.0234 31.5234 30.4375 31.7969 29.6562Z"
                                        fill="#7F7E97" />
                                </g>
                                <defs>
                                    <filter
                                        id="filter0_d_646_987"
                                        x="0"
                                        y="0"
                                        width="52.5043"
                                        height="53.3391"
                                        filterUnits="userSpaceOnUse"
                                        color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix
                                            in="SourceAlpha"
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                            result="hardAlpha" />
                                        <feOffset dx="2.50435" dy="3.33913" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix
                                            type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend
                                            mode="normal"
                                            in2="BackgroundImageFix"
                                            result="effect1_dropShadow_646_987" />
                                        <feBlend
                                            mode="normal"
                                            in="SourceGraphic"
                                            in2="effect1_dropShadow_646_987"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </a>
                </div>


                <!-- Button -->
                <div class="mt-8 flex justify-center lg:justify-start">
                    <a id="btnLink">
                        <button class="bg-[#5751E1] text-white 
                            px-4 py-2 sm:px-6 sm:py-3 md:px-8 md:py-4 lg:px-10 lg:py-5
                            text-sm sm:text-base 
                            rounded-full flex items-center gap-2 
                            shadow-[4px_6px_0px_0px_#050071] 
                            transition-all duration-300 ease-in-out  
                            hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] 
                            active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
                            Know More →
                        </button>
                    </a>
                </div>
            </div>

        </div>

        <!-- AVATAR SLIDER -->
        <div
            class="mt-16 bg-white/60 backdrop-blur-lg px-4 py-3 rounded-full flex items-center justify-between">

            <!-- Left Arrow -->
            <button
                onclick="prevSlide()"
                class="w-10 h-10 flex items-center justify-center bold
                    rounded-full
                    bg-[#FFC224]
                    border-2 border-[#333333] 
                    shadow-[2px_2px_0px_0px_#382900]
                    transition hover:scale-105 active:scale-95">
                ←
            </button>

            <!-- Avatars -->
            <div id="avatars" class="flex w-[70%] justify-evenly overflow-hidden">
                <!-- JS Inject -->
            </div>

            <!-- Right Arrow -->
            <button
                onclick="nextSlide()"
                class="w-10 h-10 flex items-center justify-center bold
                rounded-full 
                bg-[#FFC224] 
                border-2 border-[#333333] 
                shadow-[2px_2px_0px_0px_#382900]
                transition hover:scale-105 active:scale-95">
                →
            </button>
        </div>
    </div>

    <script>
        const data = [{
                name: "Sophia Brown",
                role: "SEO Expert",
                image: "<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/8e49ad058ca1f903e0c7b73e4099bbe143ab5163.png') ?>",
                rating: 4.9,
                desc: "Expert in SEO with 10+ years experience.",
                buttonLink: "#",
                social: {
                    facebook: "#",
                    twitter: "#",
                    whatsapp: "#",
                    instagram: "#"
                }
            },
            {
                name: "Olivia Mia",
                role: "Web Design",
                image: "<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/9f6c34001d655abc62ca3a1df8c0d13d127cc1c9.png') ?>",
                rating: 4.2,
                desc: "Expert in SEO with 10+ years experience.",
                buttonLink: "#",
                social: {
                    facebook: "#",
                    twitter: "#",
                    whatsapp: "#",
                    instagram: "#"
                }
            },
            {
                name: "John Smith",
                role: "UI/UX Designer",
                image: "<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/e389abe92915077a9e83ee5d2cdf26172003f571.png') ?>",
                rating: 4.5,
                desc: "Expert in SEO with 10+ years experience.",
                buttonLink: "#",
                social: {
                    facebook: "#",
                    twitter: "#",
                    whatsapp: "#",
                    instagram: "#"
                }
            },
            {
                name: "Emma Watson",
                role: "Frontend Dev",
                image: "<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/9f91187b25558db519d2f5cd09f61b8d918afe8f.png') ?>",
                rating: 4.2,
                desc: "Expert in SEO with 10+ years experience.",
                buttonLink: "#",
                social: {
                    facebook: "#",
                    twitter: "#",
                    whatsapp: "#",
                    instagram: "#"
                }
            },
            {
                name: "Michael Lee",
                role: "Backend Dev",
                image: "<?= base_url('public/images/talent/OurTopClass_ProfessionalInstructors/80e03e9145dda4189fe2db17b633e5a60b2d5598.png') ?>",
                rating: 3.9,
                desc: "Expert in SEO with 10+ years experience.",
                buttonLink: "#",
                social: {
                    facebook: "#",
                    twitter: "#",
                    whatsapp: "#",
                    instagram: "#"
                }
            }
        ];

        let current = 0;

        const avatarsContainer = document.getElementById("avatars");

        function getStars(rating = 0) {
            let starsHTML = "";

            for (let i = 1; i <= 5; i++) {
                starsHTML += `
                <img 
                    src="<?= base_url('public/images/homePageImages/Testimonials/Symbol.png') ?>" 
                    class="w-4 h-4 ${i <= rating ? 'opacity-100' : 'opacity-30'}"
                    alt="star"
                >
            `;
            }

            return starsHTML;
        }

        function renderAvatars() {
            avatarsContainer.innerHTML = "";

            data.forEach((item, index) => {
                const img = document.createElement("img");
                img.src = item.image;
                img.className = `w-14 h-14 rounded-full cursor-pointer border-2 ${
                index === current ? "border-indigo-500" : "border-[#ABABAB]"
            }`;
                img.onclick = () => setSlide(index);
                avatarsContainer.appendChild(img);
            });
        }

        function updateMain() {
            const d = data[current];

            document.getElementById("mainImage").src = d.image;
            document.getElementById("name").innerText = d.name;
            document.getElementById("role").innerText = d.role;
            document.getElementById("desc").innerText = d.desc;

            // ✅ FIXED: use innerHTML instead of innerText
            document.getElementById("stars").innerHTML = getStars(d.rating);

            document.getElementById("reviews").innerText = `(${d.rating} Ratings)`;

            document.getElementById("btnLink").href = d.buttonLink;

            document.getElementById("facebook").href = d.social.facebook;
            document.getElementById("twitter").href = d.social.twitter;
            document.getElementById("whatsapp").href = d.social.whatsapp;
            document.getElementById("instagram").href = d.social.instagram;
        }

        function setSlide(index) {
            current = index;
            updateMain();
            renderAvatars();
        }

        function nextSlide() {
            current = (current + 1) % data.length;
            updateMain();
            renderAvatars();
        }

        function prevSlide() {
            current = (current - 1 + data.length) % data.length;
            updateMain();
            renderAvatars();
        }

        renderAvatars();
        updateMain();
    </script>
</section>
</script>
</section>