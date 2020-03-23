<?php /* Template Name: Blog */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2>Blogs</h2>
</section>
<section class="content">
    <div class="sdpi-container-f">
<?php 

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$queryPost = new WP_Query(array('post_type'=>'post', 'paged' => $paged, 'post_status'=>'publish', 'posts_per_page'=>15));

if ( $queryPost->have_posts() ) :

echo '<div class="row">';
while ( $queryPost->have_posts() ) : $queryPost->the_post(); ?>
    <div class="col-md-12">
        <a  class="no-link" href="<?= get_the_permalink() ?>">
        <div class="blog-row clearfix d-flex justify-space-between mb-4">
            <div class="image-block mr-3">
                <div class="date-pin">
                    <p><?= get_the_date( 'M j' );?> </p>
                </div>
            <?php
            if(has_post_thumbnail($id)){
                echo the_post_thumbnail('thumbnail',array( 'class' => '' )); 
            }else{
                echo  '<img width="150" src='.get_template_directory_uri().'/assets/images/team.png />';
            }
            ?>
            </div>
            <div class="blog-content">
				<div class="blog-title mb-3">
					<?= the_title() ?>
				</div>
                <?= wp_trim_words( get_the_content(), 100) ?>
                <div class="blog-authors mt-2">
					<?php
					$count = count(get_field('authors'));
					$counter = 0;
                    if(get_field('authors')): ?>
					By: <strong>
					<?php
					
					
					if( have_rows('authors') ):

						// loop through the rows of data
					   while ( have_rows('authors') ) : the_row(); $counter++; ?>
					   <?php 
					   if(get_sub_field('author_link')){ ?>
						<a href="<?php the_sub_field('author_link') ?>">
							<?= the_sub_field('author_name') ?>
						</a>
					   <?php }else{
						   the_sub_field('author_name');
					   }?>
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
        </a>
    </div>

    <?php
endwhile;
?>
</div>

<div class="pagination">

<?php wp_pagenavi( array( 'query' => $queryPost )); ?>

</div>

<?php
endif;
wp_reset_query(); 
?>


        </div>
</section>
<?php
get_footer();
?>