<?php /* Template Name: Timeline */ ?>
<?php 
get_header();
?>


<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('banner_title') ?></h2>
</section>


<section class="banner-section-abt">
    <div class="banner-img mb-50" style="background-image:url('<?= get_field('banner_image') ?>')">
     
    </div>
</section>

<div class="container">

    <div class="row mt-md-5">
        <div class="col-md-12 col-lg-12 col-xl-12 about-template-content">
            <?= get_field('main_heading') ?>
            <h4><?= get_field('sub_heading') ?></h4>

            <div class="shortcode">
                <?=  get_field("about_shortcode") ?>
            </div>
        </div>
    </div>
</div>


<?php 
get_footer();
?>