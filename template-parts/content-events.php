 <?php
              $start_date = get_post_meta( $post->ID, 'start_date');
              $end_date = get_post_meta( $post->ID, 'end_date');
              $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
              $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
    ?>
                                       
<!-- <div class="col-12 col-md-4 mb-4 mb-md-0"> -->
    <?php $title = get_the_title(); ?>
    <div class="events-list">
        <?php echo the_post_thumbnail('medium',array( 'class' => 'img-fluid',
        'alt' => $title,
        'title' => $title)); ?>
        <div class="event-detail">
            <h5><?=  $start_date->format('M j').' - '.$end_date->format('M j') ?></h5>
            <p><?= $title ?></p>
            <a href="<?= get_the_permalink() ?>" class="event-details-a">
                Details
            </a>
        </div>
    </div>
<!-- </div> -->