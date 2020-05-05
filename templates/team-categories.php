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

<?php

if($term_id == 34): ?>
<section class="banner-image mb-0" style="background-image:url('<?= home_url('/').'wp-content/uploads/2020/05/visitingFaculty__1588506616_54819.jpg'; ?>')">
  
  </section>
<?php 
elseif($term_id == 20): ?>
<section class="banner-image mb-0" style="background-image:url('<?= home_url('/').'wp-content/uploads/2020/02/sdc20191720192-1.jpg'; ?>')">
  
</section>
<?php else: ?>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>
<?php 
endif;
?>

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