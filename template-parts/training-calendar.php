<div class="col-sm-3 col-6 parts-item">
                        <div class="col-sm w-100 p-0 listing-img">
                            <a href="<?php the_permalink();?>">
                            <?php
                                        if ( has_post_thumbnail() ) { // only print out the thumbnail if it actually has one
                                            the_post_thumbnail('listing-thumbnail', array('class'=>'img-fluid'));
                                        } else {
                                            echo '<img class="img-fluid" alt="No Image Preview" src="'.get_template_directory_uri().'/assets/images/placeholder.png">';
                                        }
                                    ?>
                            </a> 
                        </div>
                        <h5>
                        <?php echo strip_tags(get_the_term_list( $post->ID, 'parts-category', ' ',', ')); ?>
                        </h5>
                        <h4>
                            <a href="<?php the_permalink();?>">
                                <?php echo mb_strimwidth(get_the_title(), 0, 45, '...'); ?>
                            </a>
                        </h4>


                        <a href="<?php the_permalink();?>" class="cd-btn cd-btn-grey">
                            Contact Us for Details
                        </a>
                    </div> 
