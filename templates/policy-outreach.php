<?php /* Template Name: Policy Outreach */ ?>
<?php 
get_header();
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <?= get_field('page_heading'); ?>
</section>

<section class="banner-slider mb-0">
    <div class="learning_and_development mb-0">
        <?php 
            $images = get_field('page_banner_slider');
            $size = 'large'; // (thumbnail, medium, large, full or custom size)
            if( $images ): ?>
                
                    <?php foreach( $images as $image_id ): ?>
                          <div class="banner-slider-bg" style="background-image:url('<?= $image_id;?>')">

                          </div>
                    <?php endforeach; ?>
               
        <?php endif; ?>
    </div>
</section>

<section class="tabs-section d-flex align-items-center justify-content-center mb-0 flex-column">
    <div class="tabs-list-strip w-100 d-flex align-items-center justify-content-center">
      <!-- Nav pills -->
    <ul class="nav nav-pills advocacy-pills" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" data-target="#advocacy">Advocacy</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" data-target="#reactive_advocacy">Reactive Advocacy</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" data-target="#proactive_advocacy">Proactive Advocacy</a>
        </li>
        <li>
        <a class="nav-link" data-toggle="pill" data-target="#staff">Team</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="<?= home_url('/').'all-events'; ?>">Events</a>
        </li>
    </ul>
    </div>
</section>
<section class="tabs-content mb-0">
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="advocacy" class="tab-pane active">
      <h2 class="tabs-heading">Advocacy</h2>
      <div class="banner mb-5 mt-5" alt="Advocacy Banner" style="background-image:url('<?= get_field('advocacy_banner') ?>)"></div>
    <?php  $count = 0;
           $totalcount = count(get_field('two_side_columns'));
        
            // check if the repeater field has rows of data
            if( have_rows('two_side_columns') ): 
                // loop through the rows of data ?>
                <div class="two-siders"> 
            <?php while ( have_rows('two_side_columns') ) : the_row();?>

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
            <?php
            else :

            // no rows found

            endif;
        ?>
       
    </div>
    <div id="reactive_advocacy" class="tab-pane fade">
      <h2 class="tabs-heading">Reactive Advocacy</h2>
      <?php
    // check if the repeater field has rows of data
            if( have_rows('single_row_advocacy') ): 
                // loop through the rows of data
              echo '<div class="single-advocacy d-flex align-items-center"><div class="container-fluid"><div class="row justify-content-center"">';
              
            while ( have_rows('single_row_advocacy') ) : the_row();?>
                <div class="icon-text-box col-6 col-md text-center mb-3 mb-md-3 mb-lg-0">
                  <div class="circular-filled-icons yellow-filled">
                    <img width='150' src="<?= the_sub_field('icon') ?>" alt="<?= the_sub_field('content');  ?>"/>
                  </div>
                  <p class="icon-content"><?=  the_sub_field('content'); ?></p>
                </div>
                
            <?php
              
            endwhile;

            echo '</div></div></div>';
          
            else :

            // no rows found

            endif;
        ?>


<?php
    // check if the repeater field has rows of data
            if( have_rows('second_row_advocacy') ): 
                // loop through the rows of data
              echo '<div class="single-advocacy yellow-filled d-flex align-items-center"><div class="container-fluid"><div class="row justify-content-center mb-5 mb-md-0">';
              
            while ( have_rows('second_row_advocacy') ) : the_row();?>
                <div class="icon-text-box col-6 col-sm-4 col-md text-center mb-3 mb-md-3 mb-lg-0">
                  <div class="circular-filled-icons">
                    <img width='150' src="<?= the_sub_field('icon') ?>" alt="<?= the_sub_field('content');  ?>"/>
                  </div>
                  <p class="icon-content"><?=  the_sub_field('content'); ?></p>
                </div>
                
            <?php
              
            endwhile;

            echo '</div></div></div>';
          
            else :


            endif;
        ?>
    </div>
    <div id="proactive_advocacy" class="tab-pane fade"><br>
      <h2 class="tabs-heading" id="faculty">Proactive Advocacy</h2>
          <?php if(get_field('team_heading')){ ?>
            <h3 class="tabs-subheading"><?= get_field('team_heading') ?></h3>
          <?php } ?>

          <?php  $count = 0;
           $totalcount = count(get_field('two_side_columns_proactive'));
        
            // check if the repeater field has rows of data
            if( have_rows('two_side_columns_proactive') ): 
                // loop through the rows of data ?>
          <div class="two-siders mb-5 mb-md-0 mt-5"> 
            <?php while ( have_rows('two_side_columns_proactive') ) : the_row();?>
            
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
                  
                  </div> 
                </div>
               
            <?php
                $count++;
            endwhile; ?>

          </div> 

          <?php  else :

            // no rows found

            endif;
        ?>
    </div>
    <div id="staff" class="tab-pane fade">
    <h3 class="tabs-heading mb-5"><?= get_field('staff_heading') ?></h3>
        <div class="sdpi-container-f">
        <?= get_field('staff_shortcode'); ?>
        </div>
    </div>
  </div>
</section>

<script type="text/javascript">
jQuery(document).ready(function($){
    var turl = window.location.href;
    var url = new URL(turl);
    var tab = url.searchParams.get("tab");
    var id = url.searchParams.get("id");
    tab = '#'+tab;
      if(tab && id) {
        if( $('a[data-target="'+ tab +'"]').length > 0 ) {
            $('a[data-target="'+ tab +'"]').trigger('click');
            var top = document.getElementById(id).offsetTop; //Getting Y of target element
           window.scrollTo(0, top); 
        }
    }else{
      console.log("not found")
    }
 
    
});
</script>

<?php 
get_footer();
?>