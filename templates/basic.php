<?php /* Template Name: basic */ ?>
<?php 
get_header();
?>
<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('page_title') ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>

<section class="custom-page-content-blocks mt-5">

    <div class="container">

        <?php while(have_posts()) : the_post(); ?>
        <?php the_content();?>
        <?php endwhile; ?>
        <?php $show_contact_info = get_field('show_contact_information');
        if($show_contact_info == 'yes'){
            echo the_field('contact_details', 'option');
        }    
        ?>

    </div>

</section>

<?php 
get_footer();
?>