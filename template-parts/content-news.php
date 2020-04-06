<?php
              $start_date = get_post_meta( $post->ID, 'start_date');
              $end_date = get_post_meta( $post->ID, 'end_date');
              $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
              $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
?>

<div class="news-slide">
 <a href="<?= get_the_permalink() ?>">
    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
  <!--   <div class="date-pin">
        <p><php get_the_date( 'dS M' ); ?></p>
    </div> -->
    <div class="news-slide-info">
        <h6><?= get_the_date( 'dS M' );?></h6>
        <p><?= wp_trim_words( get_the_title(), 25) ?></p>
    </div>
 </a>
</div>