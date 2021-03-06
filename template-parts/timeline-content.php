        <?php 
            $post_type = get_post_type($post->ID);
            $start_date = get_post_meta( $post->ID, 'start_date');
            $end_date = get_post_meta( $post->ID, 'end_date');
            $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
            $end_date = DateTime::createFromFormat('Ymd', $end_date[0]); 
        ?>
        <li class="event d-sm-flex" data-date="<?php echo $post_type=="events"?$start_date->format('M j, Y')." - ".$end_date->format('M j, Y'): get_the_date() ?>">
        <?php  
        if($post_type == 'news' ||$post_type == 'publications' ){ ?>
            <p class="event-date mt-3 d-none d-mobile">
                <?php echo get_the_date() ?>
            </p>
        <?php
        }
        ?>
        <?php if($start_date && $end_date==''):?>
            <p class="event-date mt-3 d-none d-mobile">
                <?php echo $start_date->format('M j, Y'); ?>
            </p>
        <?php endif; ?>
        <?php if($start_date && $end_date): ?>
            <p class="event-date mt-3 d-none d-mobile">
                <?php echo $post_type=="events"?$start_date->format('M j, Y')."-".$end_date->format('M j, Y'): get_the_date() ?>
            </p>
        <?php endif; ?>
            <?php
            if($post_type == "events"){
                if(has_post_thumbnail()){
                    echo get_the_post_thumbnail($post->ID ,'thumbnail' );
                }
            }  
            ?>
            <div class="pl-sm-3">
            <h3> 
                <a class="pl-0" href="<?php the_permalink();?>">
                    <?php echo get_the_title(); ?>
                </a>
            </h3>
            <p class="training-content"> <?php echo wp_trim_words( get_the_content(), 20); ?></p>
            </div>
        </li>

