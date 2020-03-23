<?php /* Template Name: About */ ?>
<?php 
get_header();
?>

<section class="banner-section-abt">
    <div class="banner-img mb-50" style="background-image:url('<?= get_field('banner_image') ?>')">
     
    </div>
</section>

<div class="sdpi-container-f">
    <div class="row">
        <div class="col-md-9 offset-md-3">
        <img class="about-icon" width="190" src="<?= get_field('main_icon') ?>" alt="Upcoming Trainings Icon"/>
        </div>
    </div>
    <div class="row mt-md-5">
        <div class="col-md-4 col-lg-3 col-xl-3">
            <?php
           echo wp_nav_menu( array(
            'menu'   => 'About Menu',
            'menu_class'=>'sidebar_menu mb-3 mb-sm-0'
            ));
            ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 about-template-content">
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