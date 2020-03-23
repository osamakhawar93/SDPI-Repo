<?php
/**
* Template Name: Team Categories
* Description: The template for displaying all  posts and attachments
*/

$term_id = $_GET['category'];

?>
<?php get_header(); ?>
<section class="title-header d-flex align-items-center justify-content-center mb-0">
<h2><?= $term_name = get_term( $term_id )->name ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>

<section class="pt-5">
    <div class="container">
        <?php    echo do_shortcode('[getTeamMembers category="'.$term_id.'"]'); ?>
            <div class="row">
                <div class="offset-md-4 col-md-4 col-12">
                    <a class="mt-5 mb-5 career-btns" href="<?= home_url('/').'team' ?>">Back to Categories</a>
                </div>
            </div>
    </div>
</section>
<?php


 get_footer(); ?>