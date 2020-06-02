<?php /* Template Name: Covid-19 */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
<h2><?= get_field('page_title') ?></h2>
</section>

<section class="banner-section-abt">
    <div class="banner-img mb-50" style="background-image:url('<?= get_field('banner_image') ?>')">
     
    </div>
</section>

<div class="container mb-100">

    <div class="row mt-md-5">

    <?php

            // check if the repeater field has rows of data
            if( have_rows('covid_categories') ):

                // loop through the rows of data
                while ( have_rows('covid_categories') ) : the_row(); ?>
                <div class="col-md-3 col-6">
                    <div class="sdc-series">
                            <img src="<?= get_sub_field('image') ?>" class="w-100"/>
                            <h4>
                            <a href="<?= get_sub_field('category_link') ?>">View</a>
                            </h4>
                            <p><?= get_sub_field('sdc_title') ?></p>
                    </div>
                </div>
                <?php 
                endwhile;

            else :

                // no rows found

            endif;

            ?>

        
    </div>
</div>

<?php 
get_footer();
?>