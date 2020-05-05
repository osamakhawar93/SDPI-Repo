 <?php
              $start_date = get_post_meta( $post->ID, 'start_date');
              $end_date = get_post_meta( $post->ID, 'end_date');
              $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
              $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
    ?>
                                       
<!-- <div class="col-12 col-md-4 mb-4 mb-md-0"> -->
    <?php $title = get_the_title(); ?>
    <div class="events-list">
    <?php
				if(has_post_thumbnail($id)){
                    echo the_post_thumbnail('medium',array( 'class' => 'img-fluid',
                    'alt' => $title,
                    'title' => $title));
				}else{ ?>
                <img width="150" src="<?= get_template_directory_uri()?>.'/assets/images/conference.jpg'">;
                <?php }
			?>
        <div class="event-detail">
            <?php if($start_date->format('M j') !== $end_date->format('M j')): ?>
                <h5><?=  $start_date->format('M j').' - '.$end_date->format('M j') ?></h5>
            <?php else:?>
                <h5><?=  $start_date->format('M j') ?></h5>
            <?php endif; ?>
            <p><?= $title ?></p>
            <a href="<?= get_the_permalink() ?>" class="event-details-a">
                Details
            </a>
        </div>
    </div>
<!-- </div> -->