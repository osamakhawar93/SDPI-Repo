<?php /* Template Name: Contact */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('contact_heading') ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('banner_image') ?>')">
  
</section>
<section class="contact-form-section mb-0">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10 contact-form">
                    <?php echo get_field('contact_form_shortcode'); ?>
            </div>
        </div>
    </div>
</section>

<?php 
get_footer();
?>