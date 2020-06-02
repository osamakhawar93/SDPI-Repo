<?php
/**
 * The template for displaying all single team members 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sdpi
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="single-custom-template">
                <div class="sdpi-container-f">
          
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/single', get_post_type() );

				
        endwhile; // End of the loop.
        
        wp_reset_postdata(); wp_reset_query();
		?>
		
		<hr class="blog-separator" />
	<div class="warfare text-center mt-5">
        <?php  echo do_shortcode('[social_warfare buttons="facebook,twitter"]');?>         
    </div>
                </div>
			</div>
			
			<section id="related-posts" class="clearfix">
			<div class="container">
			<div class="section-heading mb-3"><p class="pt-0 pb-0 font-weight-bold">More News</p></div>
				<div class="row">
				<?php 
					$related = get_posts (array( 'post_type'=>'news','post_status'=>'publish','numberposts'=>3, 'orderby' => 'rand' ));
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
                    if(get_field('author')): ?>
                    By: <strong><?= get_field('author') ?></strong>
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
