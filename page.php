<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sdpi
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
        <section class="title-header d-flex align-items-center justify-content-center mb-0">
            <?php if(get_field('page_heading')): ?>
               <h2><?= get_field('page_heading'); ?></h2>
            <?php else: ?>
                <h2><?php the_title(); ?></h2>
            <?php endif; ?>
        </section>
        
        <!-- Top Banner -->
            <?php if(get_field('top_banner')): ?>
                     <section class="banner-image mb-0" style="background-image:url('<?= get_field('top_banner') ?>')">
  
                     </section>
            <?php else: ?>
             
        <?php endif; ?>
        
        <!--  Content Before Banner -->
          
                     <section class="mb-0 custom-page-content-blocks mt-5">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="shortcode">
                                     <?= get_field('content_before_banner') ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </section>
        
        
             <!-- Middle Banner -->
            <?php if(get_field('middle_banner')): ?>
                     <section class="middle-banner-image" style="background-image:url('<?= get_field('middle_banner') ?>')">
                            
                     </section>
            <?php endif; ?>
        
        <!--  Content After Banner -->
          <?php if(get_field('content_after_banner')): ?>
                     <section class="mb-0 custom-page-content-blocks mb-5 pb-3">
                          <div class="container">
                             <div class="row">
                                 <div class="col-md-12">
                               <?= get_field('content_after_banner') ?>
                                 </div>
                             </div>
                         </div>
                     </section>
        <?php endif; ?>
        
        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
