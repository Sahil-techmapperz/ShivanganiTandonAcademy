<footer class="bg-[#06042E] text-gray-400">

  <!-- Main Footer -->
  <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 about_us_text">

    <!-- Logo + About (40%) -->
    <div class="lg:col-span-4 text-left">

      <img src="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>"
        alt="Logo"
        class="block w-auto max-w-full max-h-[100px] sm:max-h-[120px] object-contain mb-4">

      <p class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs sm:text-[16px] sm:leading-[28px]">
        Empowering global finance careers through 17+ years of expert mentorship in US Taxation and Management Accounting. Free AI course Certification.
      </p>

    </div>
    <!-- Courses -->
    <div class="lg:col-span-3 text-left">
      <h3 class="text-white text-[18px] sm:text-[20px] md:text-[22px] leading-[24px] sm:leading-[26px] md:leading-[28.6px] font-semibold inline-block relative font-poppins mb-4">
        Courses
        <span class="absolute left-0 bottom-[-6px] w-8 h-[3px] rounded-full bg-[#5751E1]"></span>
      </h3>
      <ul class="space-y-2">
        <li><a href="<?= base_url('EA') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Enrolled Agent (EA)</a></li>
        <li><a href="<?= base_url('CMA') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Certified Management Accountant (CMA)</a></li>
        <li><a href="<?= base_url('AI') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Artificial Intelligence (AI)</a></li>
      </ul>
    </div>

    <!-- Resources -->
    <div class="lg:col-span-2 text-left">
      <h3 class="text-white text-[18px] sm:text-[20px] md:text-[22px] leading-[24px] sm:leading-[26px] md:leading-[28.6px] font-semibold inline-block relative font-poppins mb-4">
        Resources
        <span class="absolute left-0 bottom-[-6px] w-8 h-[3px] rounded-full bg-[#5751E1]"></span>
      </h3>
      <ul class="space-y-2">
        <li><a href="<?= base_url('signup') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition"> Sign Up</a></li>
        <li><a href="<?= base_url('login') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Login</a></li>
        <li><a href="<?= base_url('blogs') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Blogs</a></li>
        <li><a href="<?= base_url('resources') ?>" class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 hover:text-white transition">Materials</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div class="lg:col-span-3 text-left">
      <h3 class="text-white text-[18px] sm:text-[20px] md:text-[22px] leading-[24px] sm:leading-[26px] md:leading-[28.6px] font-semibold inline-block relative font-poppins mb-4">
        Get In Touch
        <span class="absolute left-0 bottom-[-6px] w-8 h-[3px] rounded-full bg-[#5751E1]"></span>
      </h3>

      <p class="text-[#B2BBCC] font-inter font-normal text-sm leading-7 max-w-xs mx-auto sm:text-[16px] sm:leading-[28px] sm:mx-0 mb-2">
        Ready to scale your career? Connect with our experts today for a career roadmap and global placements.
      </p>

      <!-- Social Icons -->
      <div class="flex justify-center sm:justify-start gap-4 text-base">
        <?php if($ig = get_setting('instagram_url')): ?>
          <a href="<?= $ig ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>
        <?php if($fb = get_setting('facebook_url')): ?>
          <a href="<?= $fb ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>
        <?php if($li = get_setting('linkedin_url')): ?>
          <a href="<?= $li ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white"><i class="fab fa-linkedin-in"></i></a>
        <?php endif; ?>
        <?php if($yt = get_setting('youtube_url')): ?>
          <a href="<?= $yt ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
      </div>
    </div>

  </div>

  <!-- Bottom Bar -->
  <div class="border-t border-gray-700 bg-[#1C1A4A]">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-2 
                flex flex-col md:flex-row items-center justify-between gap-3 text-sm">

      <p class="text-[#8C9AB4] font-inter font-normal text-base leading-7 text-center md:text-left">
        © <?= date('Y'); ?> <?= get_setting('site_name', 'Shivangani Tandon Academy'); ?>. All rights reserved.
      </p>

      <div class="flex items-center gap-2 text-[#8C9AB4] font-inter font-normal text-base leading-7 align-middle">
        <a href="#" class="hover:text-white">Term of Use</a>
        <span class="text-gray-500">|</span>
        <a href="#" class="hover:text-white">Privacy Policy</a>
      </div>

    </div>
  </div>

</footer>