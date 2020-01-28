<?php /* Template Name: Homepage */ ?>
<?php 
get_header();
?>
<section>
<div class="sdpi-container-f">
    <h3 class="section-heading"><?= get_field('new_heading') ?></h3>
    <div class="row">
        <div class="col-md-9">
            <div class="video-box">
                <img src="<?= get_field('new_section_video_placeholder') ?> "/>
            </div>
        </div>
        <div class="col-md-3">
                <?php
                    $new_arrivals = get_field('new_section_boxes');
                    $count = 0;
                    foreach($new_arrivals as $arrival): 
                    ?>
                    <div class="new-box <?= $count==0?'latest-new-box':'' ?>">
                        <div class="action-icons">
                            <?php 
                            if($count == 0){ ?>
                                <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-red.svg' ?>"></a>
                                <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-blue.svg' ?>"></a>
                            <?php }else{ ?>
                                <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                                <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                            <?php } ?>

                        </div>
                        <h4><?= $arrival['new_div_heading']; ?></h4>
                        <p><?= $arrival['new_div_paragraph']; ?></p>
                        <p class='read-more'>Read More</p>
                    </div>

                    <?php 
                    $count++;
                    endforeach;?>
        </div>
    </div>
</div>
</section>

<section class="events-section">

</section>

<section class="publications">
    <div class="sdpi-container-f">
        <h3 class="section-heading blue"><?= get_field('publications_section_heading') ?></h3>
            <div class="publications-slider">
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <div class="action-btns d-inline-flex justify-content-between align-items-center">
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                        </div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <div class="action-btns d-inline-flex justify-content-between align-items-center">
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                        </div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <div class="action-btns d-inline-flex justify-content-between align-items-center">
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                        </div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <div class="action-btns d-inline-flex justify-content-between align-items-center">
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                        </div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                    <div class="publication-detail">
                        <div class="action-btns d-inline-flex justify-content-between align-items-center">
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-heart-white.svg' ?>"></a>
                            <a href="#"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
                        </div>
                        <h5>Lorem Ipsum Dolor</h5>
                        <p>Author Name</p>
                    </div>
                </div>
            </div>
    </div>
</section>


<section class="latest-news">
    <div class="sdpi-container-f">
        <h3 class="section-heading blue"><?= get_field('latest_news_heading') ?></h3>
            <div class="news-slider">
                    <div class="news-slide">
                        <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                        <div class="date-pin">
                            <p>dec 15th</p>
                        </div>
                        <div class="news-slide-info">
                            <h6>6th January</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur consectetur adipiscing elit. Curabitur egestas vestibulum egestas leo, et feugiat magna dignissim lobortis, egestas leo, et feugiat magna dignissim lobortis, egestas.</p>
                        </div>
                    </div>
                    <div class="news-slide">
                        <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                        <div class="date-pin">
                            <p>dec 15th</p>
                        </div>
                        <div class="news-slide-info">
                            <h6>6th January</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur consectetur adipiscing elit. Curabitur egestas vestibulum egestas leo, et feugiat magna dignissim lobortis, egestas leo, et feugiat magna dignissim lobortis, egestas.</p>
                        </div>
                    </div>
                    <div class="news-slide">
                        <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                        <div class="date-pin">
                            <p>dec 15th</p>
                        </div>
                        <div class="news-slide-info">
                            <h6>6th January</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur consectetur adipiscing elit. Curabitur egestas vestibulum egestas leo, et feugiat magna dignissim lobortis, egestas leo, et feugiat magna dignissim lobortis, egestas.</p>
                        </div>
                    </div>
                    <div class="news-slide">
                        <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                        <div class="date-pin">
                            <p>dec 15th</p>
                        </div>
                        <div class="news-slide-info">
                            <h6>6th January</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur consectetur adipiscing elit. Curabitur egestas vestibulum egestas leo, et feugiat magna dignissim lobortis, egestas leo, et feugiat magna dignissim lobortis, egestas.</p>
                        </div>
                    </div>
                    <div class="news-slide">
                        <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
                        <div class="date-pin">
                            <p>dec 15th</p>
                        </div>
                        <div class="news-slide-info">
                            <h6>6th January</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur consectetur adipiscing elit. Curabitur egestas vestibulum egestas leo, et feugiat magna dignissim lobortis, egestas leo, et feugiat magna dignissim lobortis, egestas.</p>
                        </div>
                    </div>
            </div>
    </div>
</section>

<?php 
get_footer();
?>