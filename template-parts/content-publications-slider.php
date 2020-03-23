<?php 
  $publication_date = get_post_meta( $post->ID, 'publication_date');
  $publication_author = get_post_meta( $post->ID, 'publication_author');
  $publication_file_link = get_post_meta( $post->ID, 'publication_file');
  $publication_file_link = wp_get_attachment_url($publication_file_link[0]);

?>

<div class="slide">
    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
    <div class="publication-detail">
        <div class="action-btns d-inline-flex justify-content-between align-items-center">
        <!--     <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a> -->
        <a download="<?= $publication_file_link ?>" href="<?= $publication_file_link ?>"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
        </div>
        <h5><?= get_the_title() ?></h5>
        <p>
          <?php

$count = count(get_field('publication_author',$post->ID));
$counter = 0;
          if(get_field('publication_author',$post->ID)){ ?>
By:
<?php


if( have_rows('publication_author') ):

  // loop through the rows of data
   while ( have_rows('publication_author') ) : the_row(); $counter++; ?>
   <?php 
   if(get_sub_field('author_link')){ 
  $post_id = url_to_postid(get_sub_field('author_link'));
     ?>
  <a href="<?php the_sub_field('author_link') ?>">
    <?= get_the_title($post_id) ?>
  </a>
   <?php } ?>
      <?=  $counter==$count?'':", " ?>
  <?php
   endwhile;
 
   // no rows found
 
 endif;

}          ?>
        </p>
    </div>
    
</div>