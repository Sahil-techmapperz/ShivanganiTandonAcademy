<?= $this->include('custom/homeMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="min-full">
    <!-- Load banner view -->
    <?= view('website/home_comp/home_banner') ?>
    <?= view('website/home_comp/About_Us') ?>
    <?= view('website/home_comp/LearnwithUs') ?>
    <?= view('website/home_comp/GetMoreAboutUs') ?>
    <?= view('website/home_comp/Join_Us_Now') ?>
    <?= view('website/home_comp/Resources') ?>
    <?= view('website/talent_comp/RealResult_talent') ?>
    <?= view('website/home_comp/Your_Path_to_Success') ?>
    <?= view('website/home_comp/whyChooseUs') ?>
    <?= view('website/home_comp/Awards_and_Achievements') ?>
    <?= view('website/home_comp/Testimonials') ?>
    <?= view('website/home_comp/News_and_Blogs') ?>
    <?= view('website/home_comp/faqs') ?>
    <?= view('website/home_comp/Starttodayandgetcertified') ?>

</div>


<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>