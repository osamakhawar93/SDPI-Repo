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

                    By: <strong>SDPI</strong>

              
            </div>


           
			<?php
			the_content();


	
	

		endwhile; // End of the loop.
        ?>   
            <hr class="blog-separator" />


            <div class="row">
        <div class="col-md-6">
            <a class="career-btns" href="/job-postings">View All Jobs</a>
        </div>
        <div class="col-md-6">
            <a class="career-btns" href="mailto:<?= the_field('sdpi_email', 'option'); ?>">Apply For This Job</a>
        </div>
    </div>

            
    <div class="warfare text-center mt-5">
        <?php  echo do_shortcode('[social_warfare buttons="facebook,twitter"]');?>         
    </div>

	</div>
		</section>
		<section id="related-posts" class="clearfix">
			<div class="container">
				<div class="row">
				<?php 
					$related = get_posts (array( 'post_type'=> get_post_type(),'exclude'=>$post->ID,'numberposts'=> 3, 'orderby' => 'rand' ));
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
                    if(get_field('authors')): ?>
                    By: <strong><?= get_field('authors') ?></strong>
                    <?php else: ?>
                        By: <strong><?= ucfirst(get_the_author_meta('display_name', $author_id)); ?></strong>
                    <?php endif;?> 
              
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
