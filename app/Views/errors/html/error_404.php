<?php include(APPPATH . 'Views/custom/upper_template.php'); ?>
<?php include(APPPATH . 'Views/custom/navbar.php'); ?>

<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 px-4 text-center font-poppins">
    <!-- Message -->
    <p class="mt-4 text-2xl sm:text-3xl font-semibold text-gray-700">
        Oops! Page Not Found
    </p>

    <!-- Description -->
    <p class="mt-2 text-gray-500 max-w-md">
        The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
    </p>

    <!-- Image or Illustration -->
    <div class="mt-6">
        <img src="<?= base_url('public/images/404 Error-pana.svg') ?>" alt="404 Illustration" class="w-64 mx-auto">
    </div>

    <!-- Home Button -->
    <a href="<?= base_url() ?>" class="bg-[#5751E1] text-white px-6 py-2 rounded-full flex items-center gap-2 
                        shadow-[4px_6px_0px_0px_#050071] 
                        transition-all duration-300 ease-in-out  hover:-translate-y-1 hover:shadow-[6px_8px_0px_0px_#050071] active:translate-y-1 active:shadow-[2px_3px_0px_0px_#050071]">
        Go Back Home
    </a>
</div>

<?php include(APPPATH . 'Views/custom/footer.php'); ?>
<?php include(APPPATH . 'Views/custom/lower_template.php'); ?>