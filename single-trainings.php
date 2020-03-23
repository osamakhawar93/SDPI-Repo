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
            <div class="single-custom-template">
                <div class="sdpi-container-f">
          
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/single', get_post_type() );

				
		endwhile; // End of the loop.
		?>
		
		<hr class="blog-separator" />
	<div class="warfare text-center mt-5">
        <?php  echo do_shortcode('[social_warfare buttons="facebook,twitter"]');?>         
    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
