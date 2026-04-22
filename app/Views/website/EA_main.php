<?= $this->include('custom/EAMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="min-h-screen">
    <!-- Load banner view -->
    <?= view('website/EA_comp/EA_baneer') ?>
    <?= view('website/EA_comp/About_EA_Offer') ?>
    <?= view('website/EA_comp/GetMoreAboutUs') ?>
    <?= view('website/EA_comp/JoinUsNow') ?>
    <?= view('website/EA_comp/GlobalCareer') ?>
    <?= view('website/EA_comp/WhyUs') ?>
    <?= view('website/talent_comp/SuccessStories') ?>
    <?= view('website/EA_comp/CareerPath') ?>
    <?= view('website/EA_comp/1_1_Video') ?>
    <?php // view('website/Resources_comp/NeedHelp') ?>
    <?= view('website/CMA_comp/CMA_faqs') ?>


</div>


<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>