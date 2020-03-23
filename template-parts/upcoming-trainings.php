<?php 

$args = array(
        'post_type'=> 'trainings',
        'post_status'=>'publish',
		'order'    => 'DESC'
		);              

	$posts =  get_posts($args);
	if(count($posts)>0):
		foreach($posts as $post): 
			setup_postdata( $post );  ?>
<p>
                    <button class="accordion-btns" type="button" data-toggle="collapse" data-target="#collapse_<?= $post->ID ?>" aria-expanded="false" aria-controls="collapseExample">
                        <?php the_title(); ?>
                    </button>
                    </p>
                    <div class="collapse" id="collapse_<?= $post->ID ?>">
                        <div class="card card-body">
                             <ul class="form-body">
                                 <li class="form-deadline text-uppercase">Registration Deadline: <?php $deadline = get_post_meta( $post->ID, 'registration_deadline');
                                    $date = DateTime::createFromFormat('Ymd', $deadline[0]);
                                    echo $date->format('F j, Y'); ?></li>
                                    <li><?php 
                                    $start_date = get_post_meta( $post->ID, 'start_date');
                                    $end_date = get_post_meta( $post->ID, 'end_date');
                                    $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
                                    $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
                                    echo $start_date->format('F j, Y').' - '.$end_date->format('F j, Y') ; ?></li>
                                    <li>
                                       <?php  $location = get_post_meta( $post->ID, 'location'); 
                                       echo $location[0];?>
                                    </li>
                                    <li>
                                        <?php $registration_form = get_field( 'registration_form'); 
                                        if( $registration_form ): ?>
                                            <p class="download-icn mt-50"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-grey.svg'?>"/>
                                            <a download="<?= $registration_form ?>" href="<?= $registration_form ?>">Download Registration Form</a>
                                            </p>
                                        <?php endif; ?>
                                     
                                      <?php

                                        // check if the repeater field has rows of data
                                        if( have_rows('brochures') ):

                                            // loop through the rows of data
                                            while ( have_rows('brochures') ) : the_row(); ?>

                                                <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-grey.svg'?>"/><a download="<?= the_sub_field('brochure_file_') ?>" href="<?= the_sub_field('brochure_file_') ?>"><?= the_sub_field('brochure_name')?></a></p>
                                               

                                            <?php endwhile;

                                        else :

                                          

                                        endif;

                                        ?>

                                    </li>
                             </ul>
                        </div>
                    </div>
                    <?php
        endforeach;
            wp_reset_postdata();
            wp_reset_query();
	endif;