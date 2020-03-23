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
			<div class="blog-authors mt-2 mb-4">
			<?php
					
					$count = count(get_field('authors',$post->ID));
					$counter = 0;
                    if(get_field('authors',$post->ID)): ?>
					By: <strong>
					<?php
					
					
					if( have_rows('authors') ):

						// loop through the rows of data
					   while ( have_rows('authors') ) : the_row(); $counter++; ?>
					   <?php 
					   if(get_sub_field('author_link')){ 
						$post_id = url_to_postid(get_sub_field('author_link'));
						   ?>
						<a href="<?php the_sub_field('author_link') ?>">
							<?= get_the_title($post_id) ?>
						</a>
					   <?php } ?>
				   		 <?=  $counter==$count?'':"<span>, </span>" ?>
						<?php
					   endwhile;
				   
					endif;
				   
					   // no rows found
					echo '</strong>';
				   endif;
					
					
					?>
              
            </div>
			<?php
			the_content();


	
	

		endwhile; // End of the loop.

		//Blog approved or not
		$approved = get_field('blog_approved');
		if($approved == 'yes'){
			echo '<div class="row">
			<p class="disclaimer">Approved By SDPI</p>
			</div>';
		}else{
			echo '<div class="row">
				<p class="disclaimer">This is the personal opinion of the author and does not reflect 
				the ideology or thinking of SDPI</p>
			</div>';
		}

		?>   

	
			<hr class="blog-separator" />
			</div>
		</section>
		<section id="related-posts" class="clearfix">
			<div class="container">
				<div class="row">
				<?php 
$related = get_posts (array( 'post_type'=> get_post_type(),'post_status'=>'publish','exclude'=>$post->ID,'numberposts'=> 3, 'orderby' => 'rand' ));
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
						
					<div class="blog-authors mt-2">
			<?php
					
					$count = count(get_field('authors',$post->ID));
					$counter = 0;
                    if(get_field('authors',$post->ID)): ?>
					By: <strong>
					<?php
					
					
					if( have_rows('authors') ):

						// loop through the rows of data
					   while ( have_rows('authors') ) : the_row(); $counter++; ?>
					   <?php 
					   if(get_sub_field('author_link')){ 
						$post_id = url_to_postid(get_sub_field('author_link'));
						   ?>
						<a href="<?php the_sub_field('author_link') ?>">
							<?= get_the_title($post_id) ?>
						</a>
					   <?php } ?>
				   		 <?=  $counter==$count?'':"<span>, </span>" ?>
						<?php
					   endwhile;
				   
					endif;
				   
					   // no rows found
					echo '</strong>';
				   endif;
					
					
					?>
              
            </div>
			
						</div>
						
					</div>
				<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
	</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
