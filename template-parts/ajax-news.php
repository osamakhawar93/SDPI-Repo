<?php 
              $start_date = get_post_meta( get_the_ID(), 'published_date');
              if($start_date[0]){
                $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);      
?>

            <li class="event" data-date="<?=  $start_date->format('M j, Y') ?>">
                <p class="event-date mt-3 d-none d-mobile">
                    <?php echo $start_date->format('M j, Y') ?>
                </p>
                <h3> 
                    <a class="pl-0" href="<?php the_permalink();?>">
                        <?php echo get_the_title(); ?>
                    </a>
                </h3>
                <p class="training-content"> <?php echo wp_trim_words( get_the_content(), 20); ?></p>
            </li>

        <?php } ?>
      