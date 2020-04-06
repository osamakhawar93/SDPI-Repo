<?php
/**
* Template Name: Centers
* 
*/

?>
<?php get_header(); ?>
<section class="title-header d-flex align-items-center justify-content-center mb-0">
<h2><?= get_field('page_title') ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>

<section class="pt-5">
    <div class="container">
            <div class="row">

            <?php

            // check if the repeater field has rows of data
            if( have_rows('centers') ):

                // loop through the rows of data
                while ( have_rows('centers') ) : the_row(); ?>

                <div class="col-md-6 col-12 mb-md-5">
                    <a href="<?= home_url('/').get_sub_field('center_link'); ?>">
                        <div class="icon-box text-center">
                        <img src="<?= get_template_directory_uri().'/assets/images/organization-2.png' ?>" />
                        <p><?= the_sub_field('center_name'); ?></p>
                    </div>
                    </a>
                </div>

                <?php
                endwhile;

            else :

                // no rows found

            endif;

            ?>
            </div>
    </div>
</section>
<?php


 get_footer(); ?>