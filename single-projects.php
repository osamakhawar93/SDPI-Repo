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
			the_content(); ?>

			<div class="blog-authors mt-2 mb-4">
					<?php
					
					//$count = get_field('contact_persons',$post->ID);
					$counter = 0;
                    if(get_field('contact_persons',$post->ID)): ?>
					<p class="mb-3"><strong>For More Information, Contact the Following Person:</strong></p>
					<ul>
						
					<strong>
					<?php
					
					
					if( have_rows('contact_persons') ):

						// loop through the rows of data
					   while ( have_rows('contact_persons') ) : the_row(); $counter++; ?>
					   <?php 
					   if(get_sub_field('contact_person_link')){ 
						$post_id = url_to_postid(get_sub_field('contact_person_link'));
						   ?>
						<li>
						<a href="<?php the_sub_field('contact_person_link') ?>">
							<?= get_the_title($post_id) ?>
						</a>
						</li>
					   <?php } ?>
						<?php
					   endwhile;
				   
				   else :
				   
					   // no rows found
				   
				   endif;
					
					
					?>
					</strong>
					</ul>
                    <?php else: ?>
                        
                    <?php endif;?> 
              
            </div>
	
		<?php

		endwhile; // End of the loop.
        ?>   

<ul class="nav nav-pills mb-5 projects-navs" id="pills-tab" role="tablist">


<!-- Related Pictures -->
<?php 
	if(have_rows('picture_gallery')){ ?>
  <li class="nav-item">
    <a class="nav-link active" id="pills-pictures-tab" data-toggle="pill" data-target="#pills-pictures" role="tab" aria-controls="pills-pictures" aria-selected="true">Pictures</a>
  </li>

<?php } ?>
<!-- Related Pictures -->

<!-- Related Videos -->
<?php 
	if(have_rows('videos')){ ?>
	<li class="nav-item">
    	<a class="nav-link" id="pills-videos-tab" data-toggle="pill" data-target="#pills-videos" role="tab" aria-controls="pills-videos" aria-selected="false">Videos</a>
	</li>

<?php } ?>
<!-- Related Videos -->

<!-- Related Publications -->
	<?php 
	if(have_rows('publications_links')){ ?>
	<li class="nav-item">
    <a class="nav-link" id="pills-publications-tab" data-toggle="pill" data-target="#pills-publications" role="tab" aria-controls="pills-publications" aria-selected="false">Publications</a>
  </li>
	<?php
	}
	?>
<!-- Related Publications -->


<!-- Related Material -->
<?php 
	if(get_field('related_material')){ ?>
	<li class="nav-item">
    	<a class="nav-link" id="pills-related-material-tab" data-toggle="pill" data-target="#pills-related-material" role="tab" aria-controls="pills-related-material" aria-selected="false">Related Material</a>
  	</li>
	<?php
	}
	?>
<!-- Related Material -->


  <!-- Related News -->
  <?php 

	if(have_rows('related_news')){ ?>
	<li class="nav-item">
		<a class="nav-link" id="pills-related-material-tab" data-toggle="pill" data-target="#pills-related-news" role="tab" aria-controls="pills-related-material" aria-selected="false">Related News</a>
	  </li>
	<?php
	}

   ?>
	<!-- Related News -->


	<!-- Related Files -->
	<?php 

	if(have_rows('related_files')){ ?>
	<li class="nav-item">
		<a class="nav-link" id="pills-related-files-tab" data-toggle="pill" data-target="#pills-related-files" role="tab" aria-controls="pills-related-files" aria-selected="false">Related Files</a>
	</li>
	<?php
	}

	?>
	<!-- Related Files -->


	<!-- Related Articles -->
	<?php 

	if(have_rows('related_articles_links')){ ?>
	<li class="nav-item">
		<a class="nav-link" id="pills-related-articles-tab" data-toggle="pill" data-target="#pills-related-articles" role="tab" aria-controls="pills-articles-files" aria-selected="false">Related Articles</a>
	</li>
	<?php
	}

	?>
	<!-- Related Articles -->


	<!-- Related Links -->
	<?php 

	if(have_rows('related_links')){ ?>
	<li class="nav-item">
		<a class="nav-link" id="pills-related-links-tab" data-toggle="pill" data-target="#pills-related-links" role="tab" aria-controls="pills-links-files" aria-selected="false">Related Links</a>
	</li>
	<?php
	}

	?>
	<!-- Related Links -->


	<!-- Related Events -->
	<?php 
	if(have_rows('related_events')){ ?>
	<li class="nav-item">
		<a class="nav-link" id="pills-related-events-tab" data-toggle="pill" data-target="#pills-related-events" role="tab" aria-controls="pills-links-files" aria-selected="false">Related Events</a>
	</li>
	<?php
	}

	?>
<!-- Related Links -->


</ul>

<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-pictures" role="tabpanel" aria-labelledby="pills-pictures"><!-- Tab 1 -->
	<div class="row">
  <?php
// check if the repeater field has rows of data
if( have_rows('picture_gallery') ):

 	// loop through the rows of data
    while ( have_rows('picture_gallery') ) : the_row(); ?>
		<div class="col-md-4">
		 <div class="gallery_box text-center">
		 	<div class="gallery-image" role="button">
					<img rel="lightbox" src="<?= the_sub_field('image_url') ?>" />
			</div>
			<p class="mt-3"><?= the_sub_field('image_title') ?></p>
		 </div>
		</div>
    <?php endwhile;

else :

    // no rows found

endif;
?>
	</div>
  </div> <!-- Tab 1 -->

  <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab"><!-- Tab 2 -->
  <div class="row">
  <?php
// check if the repeater field has rows of data
if( have_rows('videos') ):

 	// loop through the rows of data
    while ( have_rows('videos') ) : the_row(); ?>
		<div class="col-md-4">
		 <div class="gallery_box text-center">
			 <a href="<?= the_sub_field('video_url') ?>" target="_blank">
		 	<div class="gallery-image">
					<img rel="lightbox" src="<?= the_sub_field('video_cover') ?>" />
			</div>
			<p class="mt-3"><?= the_sub_field('video_title') ?></p>
			</a>
		 </div>
		</div>
    <?php endwhile;

else :

    // no rows found

endif;
?>
	</div>
  </div><!-- Tab 2 -->

  <div class="tab-pane fade" id="pills-publications" role="tabpanel" aria-labelledby="pills-publications-tab"><!-- Tab 3 -->

  <ul class="publications-links">
  <?php
// check if the repeater field has rows of data
if( have_rows('publications_links') ):

 	// loop through the rows of data
    while ( have_rows('publications_links') ) : the_row(); ?>
		<li>
			<p class="related-publications mb-2">
				<?php 
				$post_id = url_to_postid(get_sub_field('publications_link'));

				?>
				<a href="<?= the_sub_field('publications_link') ?>">
					<?= get_the_title($post_id) ?> 
				</a>
			</p>
		</li>
    <?php endwhile;

else :

    // no rows found

endif;
?>
	</ul>
  
  </div><!-- Tab 3 -->

  <div class="tab-pane fade" id="pills-related-material" role="tabpanel" aria-labelledby="pills-related-material"><!-- Tab 4 -->
		<div>
			<?= get_field('related_material') ?>
		</div>
  </div><!-- Tab 4 -->

  <div class="tab-pane fade" id="pills-related-news" role="tabpanel" aria-labelledby="pills-related-news">

  <?php
		// check if the repeater field has rows of data
		if( have_rows('related_news') ):

			// loop through the rows of data
			while ( have_rows('related_news') ) : the_row(); ?>
				<li>
					
						<?php 
						$post_id = url_to_postid(get_sub_field('related_news_links'));

						?>
						<a href="<?= the_sub_field('related_news_links') ?>">
							<?= get_the_title($post_id) ?> 
						</a>
					
				</li>
			<?php endwhile;

		else :

			// no rows found

		endif;
		?>

  </div> <!-- Tab 5 -->


  <div class="tab-pane fade" id="pills-related-files" role="tabpanel" aria-labelledby="pills-related-files">

<?php
	  // check if the repeater field has rows of data
	  if( have_rows('related_files') ):

		  // loop through the rows of data
		  while ( have_rows('related_files') ) : the_row(); ?>
			  <li>
				  
					  <?php 
					  $file = get_sub_field('related_files_links')[0];
					  ?>
					  <a href="<?= $file['related_files']['url'] ?>" download="<?= $file['related_files']['url'] ?>">
						  <?= $file['related_files']['title'] ?> 
					  </a>
				  
			  </li>
		  <?php endwhile;

	  else :

		  // no rows found

	  endif;
	  ?>

</div> <!-- Tab 6 -->

<div class="tab-pane fade" id="pills-related-articles" role="tabpanel" aria-labelledby="pills-related-articles">

<?php
	  // check if the repeater field has rows of data
	  if( have_rows('related_articles_links') ):

		  // loop through the rows of data
		  while ( have_rows('related_articles_links') ) : the_row(); ?>
			 <li>
					
					<?php 
					$post_id = url_to_postid(get_sub_field('related_blogs'));

					?>
					<a href="<?= the_sub_field('related_blogs') ?>">
						<?= get_the_title($post_id) ?> 
					</a>
				
			</li>
		  <?php endwhile;

	  else :

		  // no rows found

	  endif;
	  ?>

</div> <!-- Tab 7 -->


<div class="tab-pane fade" id="pills-related-links" role="tabpanel" aria-labelledby="pills-related-links">

<?php
	  // check if the repeater field has rows of data
	  if( have_rows('related_links') ):

		  // loop through the rows of data
		  while ( have_rows('related_links') ) : the_row(); ?>
			 <li>
					
					<?php 

					?>
					<a target="_blank" href="<?= get_sub_field('related_links') ?>">
						<?= get_sub_field('related_links') ?>
					</a>
				
			</li>
		  <?php endwhile;

	  else :

		  // no rows found

	  endif;
	  ?>

</div> <!-- Tab 8 -->

<div class="tab-pane fade" id="pills-related-events" role="tabpanel" aria-labelledby="pills-related-events">

<?php
	  // check if the repeater field has rows of data
	  if( have_rows('related_events') ):

		  // loop through the rows of data
		  ?>
		  <div class="row">
		  <?php
		  while ( have_rows('related_events') ) : the_row(); 
		  
		  $start_date = get_post_meta( get_sub_field('related_events'), 'start_date');
		  $end_date = get_post_meta( get_sub_field('related_events'), 'end_date');
		  $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
		  $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
		 
		 ?>
			
		<div class="col-12 col-md-4 mb-4 mb-md-0">
			<?php $title = get_the_title(get_sub_field('related_events')); ?>
			<div class="events-list">
				<?php echo get_the_post_thumbnail(get_sub_field('related_events'),'medium',array( 'class' => 'img-fluid',
				'alt' => $title,
				'title' => $title)); ?>
				<div class="event-detail">
					<h5><?=  $start_date->format('M j').' - '.$end_date->format('M j') ?></h5>
					<p><?= $title ?></p>
					<a href="<?= get_the_permalink(get_sub_field('related_events')) ?>" class="event-details-a">
						Details
					</a>
				</div>
			</div>
 		</div>
					
				
			
		  <?php endwhile; ?>

		  </div>

		<?php 

	  else :

		  // no rows found

	  endif;
	  ?>

</div> <!-- Tab 9 -->

</div>

<hr class="blog-separator" />



            
<div class="warfare text-center mt-5">
	<?php  echo do_shortcode('[social_warfare buttons="facebook,twitter"]');?>         
</div>

	</div>
		</section>
		<section id="related-posts" class="clearfix">
			<div class="container">
            <div class="section-heading"><p class="pt-0 pb-5 font-weight-bold">Other Projects</p></div>
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
										//echo  '<img width="150" src='.get_template_directory_uri().'/assets/images/team.png />';
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


	 <!-- The Modal -->
	<div class="modal fade" id="image-modal">
		<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
		
			
			<!-- Modal body -->
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<img src="" class="imagepreview" style="max-width:100%;">
		
			
		</div>
		</div>
	</div>
<script>
	jQuery(document).ready(function($){
		$(".gallery-image").click(function(){
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#image-modal').modal('show');   
		})
	})
</script>
<?php
get_footer();
