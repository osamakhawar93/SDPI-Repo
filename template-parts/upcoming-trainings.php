<?php 

$args = array(
		'post_type'=> 'trainings',
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
                                        <?php $link = get_post_meta( $post->ID, 'registration_form_link');
                                      
                                   ?>
                                       <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-grey.svg'?>"/><a href="<?= $link[0]['url'] ?>">Download Registration Form</a></p>
                                    </li>
                             </ul>
                        </div>
                    </div>
                    <?php
        endforeach;
            wp_reset_postdata();
	endif;