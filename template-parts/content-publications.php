<?php 
  $publication_date = get_post_meta( $post->ID, 'publication_date');
  $publication_author = get_post_meta( $post->ID, 'publication_author');
  $publication_file_link = get_post_meta( $post->ID, 'publication_file');
  $publication_file_link = wp_get_attachment_url($publication_file_link[0]);

?>
<?php  //$start_date->format('M j').' - '.$end_date->format('M j') ?>


<div class="new-box <?= $count==0?'latest-new-box':'' ?>">
    <div class="action-icons">
        <?php 
        if($count == 0){ ?>
            <!-- <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-red.svg' ?>"></a> -->
            <a target="_blank" href="<?= $publication_file_link ?>"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-blue.svg' ?>"></a>
        <?php }else{ ?>
           <!--  <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a> -->
            <a target="_blank" href="<?= $publication_file_link ?>"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
        <?php } ?>

    </div>
    <h4><?= get_the_title(); ?></h4>
    <p><?= wp_trim_words( get_the_content(), 25) ?></p>
    <p class='read-more'><a href="<?= get_the_permalink(); ?>">Read More</a></p>
</div>