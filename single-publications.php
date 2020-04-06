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
  $publication_author = get_post_meta( $id, 'publication_author');
  $published_date = get_post_meta( $post->ID, 'publication_date');
  $publication_date = DateTime::createFromFormat('Ymd', $published_date[0]);
  $publication_file = get_field('publication_file');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section class="custom-page-content-blocks mt-5">
    		<div class="container">
			<?php if($publication_file['url']):?>
            <div class="row">
            <div class="col-md-6">

            	<p class="download-icn mt-0"><img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-download-blue.svg'?>"/><a download="<?= $publication_file['url'] ?>" href="<?= $publication_file['url'] ?>">Download Publication</a></p>
            
			</div>
			<div class="col-md-6 text-right">
			<p class="download-icn mt-0">
                <img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-newspaper.svg'?>"/>
                    Published Date: <?= $publication_date->format('M j, Y') ?>
            </p>
			</div>
            </div>
			<?php endif; ?>

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
					$publication_author = get_field('publication_author');
					$count = $publication_author;
					$counter = 0;
                    if(get_field('publication_author')): ?>
					By: <strong>
					<?php
					
					
					if( have_rows('publication_author') ):

						// loop through the rows of data
					   while ( have_rows('publication_author') ) : the_row(); $counter++; ?>
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
				   
				   else :
				   
					   // no rows found
				   
				   endif;
					
					
					?>
					</strong>
                    <?php else: ?>
					<!--
                       /* Show Admin if you want */
					   By: <strong><?php // ucfirst(get_the_author_meta('display_name', $author_id)); ?></strong>
					-->
                    <?php endif;?> 
              
            </div>


           
			<?php
			the_content();


	
	

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
			<div class="section-heading"><p class="pt-0 pb-5 font-weight-bold">More Publications</p></div>
				<div class="row">
				<?php 
					$related = get_posts (
						array( 
							'post_type'=>'publications',
							'numberposts'=>3, 
							'orderby' => 'rand' )
					);
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
						<div class="blog-authors mt-2 mb-4">
					<?php
					
					$count = count(get_field('publication_author',$post->ID));
					$counter = 0;
                    if(get_field('publication_author',$post->ID)): ?>
					By: <strong>
					<?php
					
					
					if( have_rows('publication_author') ):

						// loop through the rows of data
					   while ( have_rows('publication_author') ) : the_row(); $counter++; ?>
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
				   
				   else :
				   
					   // no rows found
				   
				   endif;
					
					
					?>
					</strong>
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
