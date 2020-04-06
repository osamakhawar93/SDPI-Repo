<?php

$published_date = get_post_meta( $post->ID, 'published_date');
$published_date = DateTime::createFromFormat('Ymd', $published_date[0]);

?>
<section class="custom-page-content-blocks">
        <div class="sdpi-container-f ">
            <div class="row">
                <div class="col-md-12">

                <?php
				if(has_post_thumbnail($id)){ ?>
				<div class="feat-img mb-5">
					<?php
					echo the_post_thumbnail('large',array( 'class' => 'img-fluid' )); 
					?>
				</div>
				<?php } ?>
            
                <div class="d-sm-flex align-items-center justify-content-between">
                <?php 
                if(get_field('author')){ ?>
                <p class="download-icn mt-0">
                <img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-user.svg'?>"/>
                    <?= get_field('author'); ?>
                </p>
                <?php
                }
                ?>

                <?php 
                if(get_field('newspaper_name')){ ?>
                <p class="download-icn mt-0">
                    <img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-newspaper.svg'?>"/>
                    <?= get_field('newspaper_name'); ?>
                </p>
                <?php } ?>
                <p class="download-icn mt-0">
                <img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-newspaper.svg'?>"/>
                    Published Date: <?= $published_date->format('M j, Y') ?>
                </p>
                <?php 
                if(get_field('source_link')){ ?>
                <p class="download-icn mt-0">
                <img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-link.svg'?>"/>
                   <?=  get_field('source_link'); ?>
                </p>
                <?php } ?>
                </div>
                   
                <h2 class="mb-3 mt-0 mb-sm-3 mt-sm-4"><?= get_the_title(); ?></h2>
                <div class="news-content"><?= the_content(); ?></div>     
                    
                      
                </div>
            </div>
        </div>
  </section>

