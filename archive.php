<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sdpi
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
	
	
			<section class="title-header d-flex align-items-center justify-content-center mb-0">
			<p><?php single_cat_title( __( '<span style="font-size: 20px;font-weight: 300;">Publications By:</span>  ', 'textdomain' ) ); ?>.</p>
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</section><!-- .page-header -->
			<?php 
			$current_category = get_queried_object();
			if($current_category->term_id == 29){  //if covid category  ?>
				<section class="banner-section-abt">

				<div class="banner-img mb-50" style="background-image:url('<?= home_url('/').'wp-content/uploads/2020/04/CoronaVirusHeader.jpg' ?>')">
				</div>
			
				</section>
			<?php
			}
			?>
			<section>
				<div class="container">
					<div class="row">
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							?>
							<div class="col-md-6 mb-3">
							<?php
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );
							?>
							</div>
							<?php

						endwhile;

						//the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div>
					
				</div>
			<div class="cust-nav mt-3">
				<div class="nav-previous text-left"><?php next_posts_link( 'Prev Page' ); ?></div>
				<div class="nav-next text-right"><?php previous_posts_link( 'Next Page' ); ?></div>
			</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
