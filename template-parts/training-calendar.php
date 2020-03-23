<?php 
              $start_date = get_post_meta( $post->ID, 'start_date');
              $end_date = get_post_meta( $post->ID, 'end_date');
              $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
              $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
?>



        <li class="event" data-date="<?=  $start_date->format('M j').' - '.$end_date->format('M j') ?>">
            <p class="event-date mt-3 d-none d-mobile">
                <?php echo $start_date->format('M j')."-".$end_date->format('M j'); ?>
            </p>
            <h3> 
                <a class="pl-0" href="<?php the_permalink();?>">
                    <?php echo get_the_title(); ?>
                </a>
            </h3>
            <p class="training-content"> <?php echo wp_trim_words( get_the_content(), 20); ?></p>
        </li>
