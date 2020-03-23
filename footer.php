<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sdpi
 */

?>

	</div><!-- #content -->




<!-- Websites Modal -->
<div class="modal fade" id="other-websites" tabindex="-1" role="dialog" aria-labelledby="other-websites" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	<div class="close-modal"> <button type="button" class="close" data-dismiss="modal">×</button> </div>
      <div class="modal-body">
		  <h2>SDPI Websites</h2>
		  <h3>Projects Websites</h3>
		  <?php $projects_websites =  get_field('projects_websites', 'option');
		  $other_links =  get_field('other_links', 'option'); ?>

			<ul>
				<?php
			 foreach ( $projects_websites as $website): ?>
				<li>
					<a href="<?= $website['projects_websites_links'] ?>" target="_blank">
						<?= $website['projects_websites_name'] ?>
					</a>
				</li>
			<?php endforeach; ?>
			 </ul>
		 <h3>Other Websites</h3>
		 <ul>
		 <?php 
		foreach ( $other_links as $website): ?>

			<li>
				<a href="<?= $website['other_links'] ?>" target="_blank">
					<?= $website['other_websites_name'] ?>
				</a>
			</li>
	
		<?php endforeach; ?>
		</ul>
      </div>
    </div>
  </div>
</div>
 <!-- Websites Modal -->

	<footer id="colophon" class="site-footer">
		<div class="chev-down">
			<img src="<?= get_template_directory_uri().'/assets/images/chevron-arrow-down.svg'?>"/>
			<img src="<?= get_template_directory_uri().'/assets/images/chevron-arrow-down.svg'?>"/>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-12 copyrights order-9 order-md-1 order-sm-1 order-lg-1">
					<?= the_field('copyrights_text', 'option'); ?>
				</div>
				<div class="col-md-2 col-6 order-2 order-md-2 order-sm-2 order-lg-2">
					<h3>Overview</h3>
					<?php
                        wp_nav_menu( array(
                            'theme_location' => 'overview-menu',
                            'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                            'menu_id'        => 'overview-menu'
                        ) );
					?>
				</div>
				<div class="col-md-2 col-6 order-md-3 order-sm-3 order-lg-3">
					<h3>About Us</h3>
					<?php
                        wp_nav_menu( array(
                            'theme_location' => 'about-menu-footer',
                            'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                            'menu_id'        => 'about-menu-footer'
                        ) );
                    ?>
					<h3>Support</h3>
					<ul>
					<?php
                        wp_nav_menu( array(
                            'theme_location' => 'support-menu-footer',
                            'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                            'menu_id'        => 'support-menu-footer'
                        ) );
                    ?>
					</ul>
				</div>
				<div class="col-md-2 col-6 order-md-4 order-sm-4 order-lg-4">
					<h3>Learn More</h3>
					<?php
                        wp_nav_menu( array(
                            'theme_location' => 'learn-more-menu-footer',
                            'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                            'menu_id'        => 'learn-more-menu-footer'
                        ) );
                    ?>
					<h3>Legal</h3>
					<?php
                        wp_nav_menu( array(
                            'theme_location' => 'legal-menu-footer',
                            'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                            'menu_id'        => 'legal-menu-footer'
                        ) );
                    ?>
				</div>
				<div class="col-md-4 col-12 order-md-5 order-sm-5 order-lg-5">
					<h3>Connect</h3>
					<ul class="connect">
						<li>
						<a target="_blank" class="twitter" href="<?= the_field('twitter_url', 'option'); ?>" title="Twitter Link">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="97.637px" height="97.637px" viewBox="0 0 97.637 97.637" style="enable-background:new 0 0 97.637 97.637;" xml:space="preserve">
                            <g>
                                <path d="M97.523,18.526c-0.14-0.165-0.371-0.221-0.568-0.131c-2.919,1.295-5.99,2.226-9.153,2.776
										c3.358-2.526,5.86-6.024,7.143-10.035c0.062-0.192-0.002-0.402-0.159-0.527c-0.158-0.125-0.377-0.141-0.55-0.038
										c-3.782,2.243-7.878,3.824-12.18,4.701c-3.812-3.956-9.135-6.219-14.644-6.219c-11.204,0-20.318,9.114-20.318,20.317
										c0,1.355,0.131,2.697,0.391,4c-15.518-0.958-30.028-8.408-39.894-20.509c-0.101-0.124-0.254-0.193-0.414-0.177
										c-0.159,0.012-0.301,0.102-0.381,0.239c-1.8,3.088-2.751,6.621-2.751,10.215c0,6.229,2.83,12.053,7.649,15.896
										c-2.481-0.298-4.904-1.079-7.089-2.292c-0.147-0.083-0.33-0.082-0.477,0.003c-0.147,0.084-0.24,0.24-0.244,0.41l-0.002,0.26
										c0,8.946,5.895,16.801,14.282,19.409c-2.209,0.356-4.501,0.332-6.754-0.098c-0.166-0.031-0.34,0.026-0.454,0.154
										c-0.113,0.128-0.151,0.307-0.099,0.469c2.515,7.85,9.503,13.355,17.637,14.041c-6.785,4.971-14.805,7.59-23.279,7.59
										c-1.561,0-3.133-0.093-4.673-0.274c-0.22-0.025-0.438,0.106-0.514,0.317c-0.076,0.213,0.005,0.451,0.195,0.572
										c9.17,5.881,19.773,8.988,30.664,8.988c35.625,0,56.913-28.938,56.913-56.914c0-0.779-0.015-1.554-0.046-2.327
										c3.843-2.811,7.142-6.252,9.802-10.235C97.675,18.929,97.662,18.692,97.523,18.526z" />
                            </g>
                        </svg>
					</a>
					<a target="_blank" class="facebook" href="<?= the_field('facebook_url', 'option'); ?>" title="Facebook Link">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="96.124px" height="96.123px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve">
                            <g>
                                <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
										c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
										c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
										c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z" />
                            </g>
                        </svg>
					</a>
					<a target="_blank" class="youtube" href="<?= the_field('youtube_url', 'option'); ?>" title="Twitter Link">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="96.875px" height="96.875px" viewBox="0 0 96.875 96.875" style="enable-background:new 0 0 96.875 96.875;" xml:space="preserve">
                            <g>
                                <path d="M95.201,25.538c-1.186-5.152-5.4-8.953-10.473-9.52c-12.013-1.341-24.172-1.348-36.275-1.341
										c-12.105-0.007-24.266,0-36.279,1.341c-5.07,0.567-9.281,4.368-10.467,9.52C0.019,32.875,0,40.884,0,48.438
										C0,55.992,0,64,1.688,71.336c1.184,5.151,5.396,8.952,10.469,9.52c12.012,1.342,24.172,1.349,36.277,1.342
										c12.107,0.007,24.264,0,36.275-1.342c5.07-0.567,9.285-4.368,10.471-9.52c1.689-7.337,1.695-15.345,1.695-22.898
										C96.875,40.884,96.889,32.875,95.201,25.538z M35.936,63.474c0-10.716,0-21.32,0-32.037c10.267,5.357,20.466,10.678,30.798,16.068
										C56.434,52.847,46.23,58.136,35.936,63.474z" />
                            </g>
                        </svg>
					</a>
					<a target="_blank" class="rss" href="<?= the_field('rss_url', 'option'); ?>" title="RSS Link">
					<svg id="Bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><circle cx="3.429" cy="20.571" r="3.429"/><path d="m11.429 24h4.57c0-8.821-7.178-15.999-15.999-16v4.572c6.302.001 11.429 5.126 11.429 11.428z"/><path d="m24 24c0-13.234-10.766-24-24-24v4.571c10.714 0 19.43 8.714 19.43 19.429z"/></svg>
					</a>
						</li>
					
					</ul>

					<h3>Newsletter</h3>
				 	<div class="newsletter d-flex align-items-center justify-content-center mb-4 mb-md-0">
						<?php
						 $shortcode = the_field('newsletter_form_shortcode', 'option');
							echo do_shortcode($shortcode);
						 ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
