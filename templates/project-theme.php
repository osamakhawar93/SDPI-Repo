<?php /* Template Name: Project By Themes */ ?>
<?php 
get_header();

$unit_id = $_GET['theme'];
?>

<section class="title-header d-flex align-items-center justify-content-center mb-0">
    <h2><?php $quantityTermObject = get_term_by( 'id', $unit_id , 'research_theme' );
                $quantityTermName = $quantityTermObject->name;
            echo $quantityTermName;
    
    ?></h2>
</section>
<section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">
  
</section>

<section class="pt-5">
    <div class="container">
    <?= do_shortcode('[getProjectsByTheme term="'.$unit_id.'"]'); ?>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/research-themes" class="career-btns">Back to Research Themes</a>
            </div>
            <div class="col-md-6">
            <a href="/projects" class="career-btns">View All Projects</a>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer();
?>