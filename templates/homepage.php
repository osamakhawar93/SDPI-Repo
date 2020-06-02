<?php /* Template Name: Homepage */ ?>
<?php 
get_header();
?>
<?php
if(get_field('covid_banner_toggle') == 'yes'):?>
<div class="sdpi-container-f mt-5">
    <a href="<?= get_field('covid_banner_link') ?>" style="text-decoration:none">
    <section class="mb-0">
        <div class="banner-img-small" style="background-image:url('<?= get_field('covid_banner') ?>')">
            <h2><?= get_field('covid_banner_text') ?></h2>
        </div>
    </section>
    </a>
</div>
<?php endif; ?>
<section>
<div class="sdpi-container-f">
    <h3 class="section-heading"><?= get_field('new_heading') ?></h3>
    <div class="row">
    <div class="col-sm-7 col-md-7 col-lg-8">

        <?php
        // check if the repeater field has rows of data
        if( have_rows('homepage_slider') ): ?>

        <div class="homepage_slider"> 
            <?php while ( have_rows('homepage_slider') ) : the_row(); ?>
            <div class="video-box" style="background-image:url('<?= get_sub_field('slider_image') ?>')">
                <?php if(get_sub_field('isvideo') == 'yes'): ?>
                <div class="play-button" data-src="<?= get_sub_field('video_url') ?>">
                        <div class="right-arrow"></div>
                </div>
                <?php endif; ?>
            </div>

            <?php endwhile;

        else :

            // no rows found

        endif;

        ?>
        </div>
    </div>
        <div class="col-sm-5 col-md-5 col-lg-4">
            <div class="publications-small">
                    <?php
                        echo do_shortcode('[fetch_new_arrivals]');
                    ?>
            </div>     
        </div>
    </div>
</div>
</section>

<section class="events-section mb-0 d-flex align-items-center">
	<div class="sdpi-container-f w-100">
        <h3 class="section-heading"><p>upcoming&nbsp;<strong>events</strong></p></h3>

		<div class="row">
			<div class="col-md-4">
				<!-- Calendar -->
		            <div class="calendar-wrapper">
		                  <div class="text-right">
		                         <select class="calendar-select" id="monthSelect">
                                        <option value="0">January</option>
                                        <option value="1">February</option>
                                        <option value="2">March</option>
                                        <option value="3">April</option>
                                        <option value="4">May</option>
                                        <option value="5">June</option>
                                        <option value="6">July</option>
                                        <option value="7">August</option>
                                        <option value="8">Septembar</option>
                                        <option value="9">October</option>
                                        <option value="10">November</option>
                                        <option value="11">December</option>
                                </select>
		                    </div>
                      <div id="divCal"></div>
                    </div>
				<!-- Calendar -->
			</div>
			<div class="col-md-8 events-carousel">
				 
				
			</div>
		</div>

        <p class="text-center mt-5">
        <a class="viewall_whitebg" href="<?= home_url('/').get_field('events_link') ?>">View all Events</a>
        </p>
	</div>
   
</section>

<section class="publications">
    <div class="sdpi-container-f">
        <h3 class="section-heading blue"><?= get_field('publications_section_heading') ?></h3>
            <div class="publications-slider">
                <?php
                        echo do_shortcode('[getPublicationsForCategory category="" slider="true"]');
                ?>
            </div>
            <p class="text-center mt-5">
            <a class="viewall_yellowbg " href="<?= home_url('/'),get_field('publications_link')  ?>">View all Publications</a>
             </p>


    </div>
</section>


<section class="latest-news mb-0">
    <div class="sdpi-container-f">
        <h3 class="section-heading blue"><?= get_field('latest_news_heading') ?></h3>
            <div class="news-slider">
                <?= get_field('latest_news_shortcode'); ?>
            </div>

            <p class="text-center mt-5">
            <a class="viewall_whitebg" href="<?= home_url('/').get_field('latest_news_link')  ?>">View all News</a>
            </p>
    </div>
</section>

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

				<div class="close-modal"> <button type="button" class="close" data-dismiss="modal">×</button> </div>
				<!-- Modal body -->
				<div class="modal-body">
				<iframe class="embed-responsive-item" width="100%" height="500px" src="" id="video_in_modal" allowscriptaccess="always"></iframe>
				</div>


				</div>
  </div>
</div>
<div class="sdpi-container-f yellow-filled">
  <div class="media-hub">
  <h3 class="search-heading mb-5">@Media <strong>Hub</strong></h3>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="twitter-hub">
            <h4>Tweets By SDPI Pakistan</h4>
            <hr>
            <?php
                echo do_shortcode("[fts_twitter twitter_name=SDPIPakistan tweets_count=6 cover_photo=no stats_bar=no show_retweets=no show_replies=no]");
            ?>
            </div>
        </div>
    </div>
  </div>
</div>	
<?php 
get_footer();
?>