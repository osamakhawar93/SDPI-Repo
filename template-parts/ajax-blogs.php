    <li class="event" data-date="<?=  get_the_date() ?>">
        <p class="event-date mt-3 d-none d-mobile">
            <?php echo get_the_date()  ?>
        </p>
        <h3> 
            <a class="pl-0" href="<?php the_permalink();?>">
                <?php echo get_the_title(); ?>
            </a>
        </h3>
        <p class="training-content"> <?php echo wp_trim_words( get_the_content(), 20); ?></p>
    </li>


      