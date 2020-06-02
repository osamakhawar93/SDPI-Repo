<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sdpi
 */

get_header();
?>

	<div class="container not-found-div">
		<div class="row">
			<div class="col-md-12">
				<h1 class="not-found">404<br/>Not Found</h1>
				<p class="help-text">The page you requested was not found on our website. You might want to try our search on the top or
					<a href="<?= home_url() ?>">Click here</a> to navigate back to homepage
				</p>
			</div>
		</div>
	</div>

<?php
get_footer();
