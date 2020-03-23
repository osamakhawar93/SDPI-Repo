<?php /* Template Name: Units */ ?>
<?php 
get_header();
?>


<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('page_title') ?></h2>
</section>


<section class="banner-section-abt">
    <div class="banner-img mb-50" style="background-image:url('<?= get_field('page_banner') ?>')">
     
    </div>
</section>

<div class="container">

    <div class="row mt-md-5">

            <?php

        // check if the repeater field has rows of data
        if( have_rows('units') ):

            // loop through the rows of data
            while ( have_rows('units') ) : the_row(); 
                if(get_sub_field('unit_name')):
            ?>

        
            <div class="col-md-6 col-6 text-center unit-center mb-5">
                <a href="<?= the_sub_field('unit_link');  ?>">
                <?php 
                    if(the_sub_field('unit_image')){
                        echo  '<img width="100%" src='.the_sub_field('unit_image').' />';
                    }else{
                    echo  '<img width="100%" src='.get_template_directory_uri().'/assets/images/team.png />';
                    }
                    
                    ?>
                    <?= the_sub_field('unit_name'); ?>
                </a>
            </div> 

            <?php
                endif;
            endwhile;

        else :

            // no rows found

        endif;

        ?>

        <div class="col-md-12 col-lg-12 col-xl-12 about-template-content">
            <?= get_field('main_heading') ?>
            <h4><?= get_field('sub_heading') ?></h4>
           
            <div class="shortcode">
                <?=  get_field("about_shortcode") ?>
            </div>
        </div>
    </div>
</div>


<?php 
get_footer();
?>