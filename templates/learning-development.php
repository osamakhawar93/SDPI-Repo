<?php /* Template Name: Learning & Development */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?= get_field('page_heading') ?></h2>
</section>

<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>

<section class="tabs-section d-flex align-items-center justify-content-center mb-0 flex-column">
    <div class="tabs-list-strip w-100 d-flex align-items-center justify-content-center">
      <!-- Nav pills -->
    
        <ul class="nav nav-pills advocacy-pills four-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#team">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#partnership">Partnerships</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#specialisedtrainings">Specialised Trainings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#customtrainings">Customised Trainings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#inhousecapacitybuilding">In-house Capacity Building</a>
            </li>
        </ul>
    </div>
</section>
<section class="tabs-content mb-0">
    <div class="tab-content">
        <div id="partnership" class="tab-pane">
        

<section class="side-by-side d-none">

<?php      
        
            // check if the repeater field has rows of data
            if( have_rows('two_side_partnerships') ): 

                $count = 0;
           $totalcount = count(get_field('two_side_partnerships'));
           
                // loop through the rows of data ?>
          <div class="two-siders"> 
            <?php while ( have_rows('two_side_partnerships') ) : the_row();?>
            
                <div class="two-sides-box row"> 
                  <div class="container">
                    <div class="row h-v-center">
                    <div class="col-md-4 col-2 <?= $count == 1?'order-2':'order-1' ?>"> 
                         <img width='180' src="<?= the_sub_field('image') ?>"/> 
                    </div>
                    <div class="col-md-8 col-10 <?= $count == 1?'order-1':'order-2' ?>"> 
                        <?=  the_sub_field('content'); ?>
                    </div>
                    </div>
                    <?php 
                      $count++;
                    if($totalcount == $count){ ?>
                        <div class="row">
                          <div class="col-md-6 offset-md-3  text-center">
                            <a href="<?= get_field('read_more_url') ?>" class="link-on-yellow mt50mb120">
                              <?= get_field('read_more_text') ?>
                            </a>
                          </div>
                        </div>
                        <?php
                    }?>
                  </div> 
                </div>
               
            <?php
         
            endwhile; ?>

          </div> 

          <?php  else :

            // no rows found

            endif;
        ?>

        </section>


        <section class="partners-section mb-0 pb-5" id="partners-section">
            <div class="section-heading text-center">
                <?= get_field('partner_organizations_heading') ?>
            </div>
            <div class="container">
                    <?php echo do_shortcode('[fetchPartnerOrganizations]'); ?> 
            </div>
        </section>

        </div><!-- Partnerships Content Ends -->
        <div id="specialisedtrainings" class="tab-pane">
            <section class="partners-section custom-page-content-blocks mb-0 pb-5">
                <div class="section-heading text-center">
                    <?= get_field('specialised_training_heading') ?>
                </div>
                <div class="container">
                    <?= get_field('specialized_training_content') ?>
                </div>
            </section>
        </div>
        <div id="customtrainings" class="tab-pane">
        <section class="partners-section custom-page-content-blocks mb-0 pb-5">
                <div class="section-heading text-center">
                    <?= get_field('customized_training_heading') ?>
                </div>
                <div class="container">
                    <?= get_field('customized_training_content') ?>
                </div>
            </section>
        </div>

        <div id="team" class="tab-pane fade active show">         
        <section class="team-section mb-0">
            <div class="section-heading text-center">
                <?= get_field('team_heading') ?>
            </div>
            <div class="container">
                <?= get_field('team_shortcode') ?>
            </div>
        </section>
        <section class="mandate mb-0 pb-md-5 pb-sm-5 pb-lg-5">
        <div class="section-heading heading-no-padding text-center">
            <?= get_field('content_heading') ?>
        </div>
            <div class="container">
                <div class="row mt-0 mt-sm-5 mb-5">
                
                    <?php
                        // check if the repeater field has rows of data
                        if( have_rows('icon-text-content') ):
                            $count = 0;
                            // loop through the rows of data
                            while ( have_rows('icon-text-content') ) : the_row(); ?>
                            <div class="col-md col-sm">
                                <div class="icon-boxes text-center">
                                    <img width="180" src="<?= get_sub_field('icon_image')?>"/>
                                    <h3><?= get_sub_field('icon_text')?></h3>
                                    <?= get_sub_field('icon_content')?>
                                </div>
                            </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    
                </div>
            </div>
</section>
        </div>

        <div id="inhousecapacitybuilding" class="tab-pane">
        <section class="partners-section custom-page-content-blocks mb-0 pb-5">
                <div class="section-heading text-center">
                    <?= get_field('in_house_capacity_building_heading') ?>
                </div>
                <div class="container">
                    <?= get_field('in_house_capacity_building_content') ?>
                </div>
            </section>
        </div>
    </div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($){
    var turl = window.location.href;
    var url = new URL(turl);
    var tab = url.searchParams.get("tab");

    if(tab) {
            var top = $('#'+tab).offset().top; //Getting Y of target element
            top -= 100;
            $('html, body').animate({
                scrollTop: top
        }, 2000);
    }
});
</script>
<?php
get_footer();
?>