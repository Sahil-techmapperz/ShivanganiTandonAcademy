<?= $this->include('custom/homeMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="min-h-screen">
    <!-- Load banner view -->
    <?= view('website/EA_comp1/EA_heroBanner') ?>
    <?= view('website/EA_comp1/About_EA_Offer') ?>
    <?= view('website/EA_comp1/HowtoBecome') ?>
    <?= view('website/EA_comp1/Who_is_an_IRS') ?>
    <?= view('website/EA_comp1/AboutCampushistory') ?>
    <?= view('website/EA_comp1/WhoisanIRSEnrolledAgent') ?>
    <?= view('website/home_comp/Testimonials') ?>
    <?= view('website/CMA_comp/CMA_faqs') ?>
    <?= view('website/home_comp/News_and_Blogs') ?>




</div>


<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>