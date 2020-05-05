<?php /* Template Name: About */ ?>
<?php 
get_header();
?>

<section class="banner-section-abt">
    <div class="banner-img mb-50" style="background-image:url('<?= get_field('banner_image') ?>')">
     
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12 about-template-content text-center mb-3">
            <?= get_field('main_heading') ?>
        </div>
        <div class="col-md-12 text-center">
        <img class="about-icon" width="190" src="<?= get_field('main_icon') ?>" alt="Upcoming Trainings Icon"/>
        </div>
    </div>
    <div class="row mt-md-5">
        <div class="col-md-12 col-lg-12 col-xl-12 about-template-content">
            <div class="shortcode">
                <?=  get_field("about_shortcode") ?>
            </div>
        </div>
    </div>
</div>

<?php 
get_footer();
?>