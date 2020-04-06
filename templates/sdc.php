<?php /* Template Name: SDC */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('page_title') ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">

</section>

<div class="container mb-150 mt-5">
    <div class="row">
    <?php
    // check if the repeater field has rows of data
    if( have_rows('sdc_series') ):

        // loop through the rows of data
        while ( have_rows('sdc_series') ) : the_row(); ?>

        <div class="col-md-4">
            <div class="sdc-series">
                <a href="<?= get_sub_field('sdc_link') ?>">
                    <img src="<?= get_sub_field('sdc_image') ?>" />
                    <h4><?= get_sub_field('sdc_year') ?></h4>
                    <p><?= get_sub_field('sdc_title') ?></p>
                </a>
            </div>
        </div>
        <?php endwhile;

    else :

        // no rows found

    endif;

    ?>
    </div>
</div>

<?php 
get_footer();
?>