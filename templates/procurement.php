<?php /* Template Name: Procurement */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('page_title') ?></h2>
</section>


<section class="banner-section-abt mb-0">
    <div class="banner-img mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
     
    </div>
</section>

<section class="procurement-team mb-0">
<div class="section-heading"><?= get_field('team_heading') ?></div>
        <div class="sdpi-container-f">
            <?= get_field('team_shortcode') ?>
          </div>
</section>

<section class="procurement-shortcode mb-0">
        <div class="sdpi-container-f">
            <div class="row">
                <div class="col-md-12">
                <?= get_field('procurements_shortcode') ?>
                </div>
            </div>
          </div>
</section>

<section class="contact-info custom-page-content-blocks">
        <div class="sdpi-container-f mb-150">
            <?= the_field('contact_details', 'option'); ?>
          </div>
</section>

<?php 
get_footer();
?>