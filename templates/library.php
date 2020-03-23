<?php /* Template Name: Library */ ?>
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
        <ul class="nav nav-pills advocacy-pills two-pills" role="tablist">
        <?php
            // check if the repeater field has rows of data
            if( have_rows('library_tabs') ):
                $count = 0;
                // loop through the rows of data
                while ( have_rows('library_tabs') ) : the_row();
                    
                    // display a sub field value
                    ?>

                <li class="nav-item">
                    <a class="nav-link <?= $count==0?'active':'' ?>" data-toggle="pill" id="btn-tab<?= $count ?>" href="#tab<?= $count ?>"><?= the_sub_field('tab_heading');  ?></a>
                </li>
                <?php
                $count++;
                endwhile;

            else :

                // no rows found

            endif;

        ?>
        </ul>
    </div>
</section>
<section class="tabs-content mb-0 custom-page-content-blocks mt-5">
    <div class="tab-content">
 
        <!-- Content-->
        <?php
            // check if the repeater field has rows of data
            if( have_rows('library_tabs') ):
                $count = 0;
                // loop through the rows of data
                while ( have_rows('library_tabs') ) : the_row();

                    // display a sub field value
                ?>

                <div id="tab<?= $count ?>" class="tab-pane <?= $count==0?'active':'' ?>">
                    <!-- Content Before Banner -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    $tabs = get_sub_field('tab_content');
                                    $content_before_banner = $tabs['content_before_banner'];
                                    $middle_banner = $tabs['banner_image'];
                                    $content_after_banner = $tabs['content_after_banner'];
                                    echo $content_before_banner;  
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Banner -->
                    <?php if($middle_banner): ?>
                            <section class="middle-banner-image" style="background-image:url('<?= $middle_banner?>')">
                                    
                            </section>
                    <?php endif; ?>

                <!-- Content After Banner -->
                    <div class="container mb-5 pb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    echo $content_after_banner;  
                                ?>
                                  <?= 
                                   get_sub_field('shortcode')
                                ?>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <?php
                $count++;
                endwhile;

            else :

                // no rows found

            endif;

        ?>
    </div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($){
    var turl = window.location.href;
    var url = new URL(turl);
    var tab = url.searchParams.get("tab");
    var id = url.searchParams.get("id");
    var withoutHash = tab;
    tab = '#'+tab;
    if(window.location.hash) {
    if(tab) {
        if( $('a[href="'+ tab +'"]').length > 0 ) {
            $('a[href="'+ tab +'"]').trigger('click');
            $(".tab-content .tab-pane").removeClass("active")
            $("#"+withoutHash).addClass("active");
            var top = $('#btn-'+withoutHash).offset().top; //Getting Y of target element
            top -= 200;
            $('html, body').animate({
                scrollTop: $('#btn-'+withoutHash).offset().top
        }, 2000);
        }
    }
    }
});
</script>

<?php 
get_footer();
?>