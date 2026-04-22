<?= $this->include('custom/CMAMeta') ?>
<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="min-h-screen">
    <!-- Load banner view -->
    <?= view('website/CMA_comp/CmaBanner') ?>
    <?= view('website/CMA_comp/HowtoBecomeCertified') ?>
    <?= view('website/CMA_comp/CMA_Salary_In_India_and_USA') ?>
    <?= view('website/CMA_comp/Jobopportunities') ?>
    <?= view('website/CMA_comp/CMA_Form') ?>
    <?= view('website/CMA_comp/WhyUs') ?>
    <?= view('website/CMA_comp/GlobalCareer') ?>
    <?= view('website/CMA_comp/TopCompanies') ?>
    <?= view('website/CMA_comp/CMA_faqs') ?>
    <?= view('website/CMA_comp/CMA_lowe_banner') ?> 
    


</div>


<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>