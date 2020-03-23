<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sdpi
 */

get_header();
?>
<?php
$id = get_the_ID();
  $start_date = get_post_meta( $id, 'start_date');
  $end_date = get_post_meta( $id , 'end_date');
  $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
  $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
  
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section class="custom-page-content-blocks mt-5">
    		<div class="container">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<?php
				if(has_post_thumbnail($id)){ ?>
				<div class="feat-img mb-5">
					<?php
					echo the_post_thumbnail('large',array( 'class' => 'img-fluid' )); 
					?>
				</div>
				<?php }
			?>
			<div class="blog-single-title mb-4">
					<?= the_title() ?>
			</div>
			<div class="row">
			    <div class="col-12 col-md-4">
			        			    <?php if($start_date->format('M j') == $end_date->format('M j')){ ?>
                    			        <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-calendar-blue.svg' ?>" /></span> <?= $start_date->format('M j') ?></p>
                    			     <?php }else{ ?>
                    			        <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-calendar-blue.svg' ?>" /> <?= $start_date->format('M j') ?> - <?= $end_date->format('M j') ?></p>
                    			   <?php } ?>
			    </div> 
			    <div class="col-12 col-md-4">
			        <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-clock-blue.svg' ?>" /> <?= get_field('start_time') ?> to <?= get_field('end_time') ?></p>
			    </div>
			    <div class="col-12 col-md-4">
			        <p class="download-icn"><img src="<?= get_template_directory_uri().'/assets/images/icn-location.svg' ?>" /> <?= get_field('location') ?></p>
			    </div>
			</div>
			
			<?php
			the_content();

			if(get_field('presenter')){
				if( have_rows('presenter') ):

				// loop through the rows of data
				echo '<h3>Presenters</h3>';
				echo '<div class="custom-page-content-blocks"><div class="container">';
					echo '<ul>';
				   while ( have_rows('presenter') ) : the_row();
					$post_id = url_to_postid(get_sub_field('presenter_details'));
					   // display a sub field value
					echo '<li><a href="'.get_sub_field('presenter_details').'">'.get_the_title($post_id).'</a></li>';
			   
				   endwhile;
				   echo '</ul>';
			   echo '</div></div>';
				   // no rows found
			   endif;
			}

			if(get_field('moderator')){
				if( have_rows('moderator') ):

				// loop through the rows of data
				echo '<h3>Moderators</h3>';
				echo '<div class="custom-page-content-blocks"><div class="container">';
					echo '<ul>';
				   while ( have_rows('moderator') ) : the_row();
					$post_id = url_to_postid(get_sub_field('moderator_details'));
					   // display a sub field value
					echo '<li><a href="'.get_sub_field('moderator_details').'">'.get_the_title($post_id).'</a></li>';
			   
				   endwhile;
				   echo '</ul>';
			   echo '</div></div>';
				   // no rows found
			   endif;
			}
	
	

		endwhile; // End of the loop.
		?>   
			<hr class="blog-separator" />
	<div class="warfare text-center mt-5">
        <?php  echo do_shortcode('[social_warfare buttons="facebook,twitter"]');?>         
    </div>
			</div>
		</section>
		<section id="related-posts" class="clearfix">
			<div class="container">
			<div class="section-heading mb-5"><p class="pt-0 pb-0 font-weight-bold">More Events</p></div>
				<div class="row">
				<?php 
					$today = date( 'Y-m-d' );
					$related = get_posts (array(
						 'post_type'=>get_post_type(),
						 'post_status'=>'publish',
						 'exclude'=>$post->ID,
						 'numberposts'=>3, 
						 'meta_query' => array(
							array(
								'key' => 'end_date',
								'value' => $today,
								'compare' => '>=',
								'type' => 'DATE'
							) 
						)
						 )
						);
					if(count($related)>0):
					foreach($related as $post) :
					$category = get_the_category( $post->ID ); ?>
					<div class="col-sm-4 post-item-sm mb-4 mb-sm-0">
						<div class="blog-thumb text-center">
							<a  href="<?= the_permalink($post->ID); ?>">
								<?php

									if(has_post_thumbnail($post->ID)){
										echo the_post_thumbnail('thumbnail',array( 'class' => 'img-fluid' )); 
										}else{
										echo  '<img width="150" src='.get_template_directory_uri().'/assets/images/team.png />';
									}

								?>
							</a>
							<h4 class="mt-3"><a  href="<?php the_permalink();?>">
							<?= $post->post_title; ?>
						</a></h4>
									

					<?php
	$id = get_the_ID();
	$start_date = get_post_meta( $id, 'start_date');
	$end_date = get_post_meta( $id , 'end_date');
	$start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
	$end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
					?>
						<p><?= $start_date->format('M j')."-".$end_date->format('M j') ?></p>
			
						</div>
						
					</div>
				<?php endforeach;
				else:
					echo '<div class="col-md-12 text-center">No Events to Show</div>';
				endif;
; wp_reset_postdata(); ?>
				</div>
			</div>
	</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
