<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sdpi
 */

get_header();
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container mt-5 mb-5">
		<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<h1 class="search-heading text-center">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'sdpi' ), '<span class="section-heading"><strong>' . get_search_query() . '</strong></span>' );
					?>
				</h1>
			</div><!-- .page-header -->

			<div class="found-posts pb-5">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<p class="search-post-title mb-3"><?php the_title(); ?></p>
					<?= wp_trim_words( get_the_content(), 100) ?>
				</a>
				<hr>
				<?php endwhile;
				?>
			</div>
<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
