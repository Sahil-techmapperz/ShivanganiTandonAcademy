<?= $this->include('custom/ResourcesMeta') ?>

<?= $this->include('custom/upper_template') ?>
<?= $this->include('custom/navbar') ?>

<div class="min-h-screen">
    <!-- Load banner view -->
    <?= view('website/Resources_comp/ResourcesBanner') ?>
    <?= view('website/Resources_comp/resources_AboutUs') ?>
    <?= view('website/Resources_comp/StudyMaterials') ?>
    <?= view('website/Resources_comp/OurMCQPracticesSeries') ?>
    <?= view('website/Resources_comp/EAExamMock') ?>
    <?= view('website/Resources_comp/SkilledIntroduce') ?>
    <?= view('website/Resources_comp/RealResults') ?>
    <?= view('website/Resources_comp/Collaboration') ?>
    <?= view('website/Resources_comp/Webinars') ?>
    <?= view('website/Resources_comp/Easy3StepsToWork') ?>
    <?= view('website/home_comp/News_and_Blogs') ?>
    <?= view('website/Resources_comp/NeedHelp') ?> 


</div>


<?= $this->include('custom/footer') ?>
<?= $this->include('custom/lower_template') ?>