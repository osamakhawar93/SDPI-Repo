<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sdpi
 */

?>

<?php
$id = get_the_ID();
  $start_date = get_post_meta( $id, 'start_date');
  $end_date = get_post_meta( $id , 'end_date');
  $start_date = DateTime::createFromFormat('Ymd', $start_date[0]);
  $end_date = DateTime::createFromFormat('Ymd', $end_date[0]);
  $location = get_post_meta( $id , 'location');
  $registration_deadline_date = get_post_meta( $id , 'registration_deadline');
  $registration_deadline = DateTime::createFromFormat('Ymd', $registration_deadline_date[0]);
  $link = get_post_meta( $id, 'registration_form_link');
?>




    <div class="d-flex align-items-center justify-content-between single-header">
        <h3 class="single-date"><img width='25' src="<?= get_template_directory_uri().'/assets/images/icn-calendar-blue.svg'?>"/><?=  $start_date->format('M j').' - '.$end_date->format('M j')  ?></h3>
         <h3 class="single-date ml-3 ml-sm-0"><img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-location.svg'?>"/><?=  $location[0] ?></h3>
    </div>

    
<?php
        if(has_post_thumbnail($id)){ ?>
        <div class="feat-img mb-5 mt-md-5 mt-3">
            <?php
            echo the_post_thumbnail('large',array( 'class' => 'img-fluid' )); 
            ?>
        </div>
        <?php }
    ?>

    <div class="training-title">
        <h3><?= the_title() ?></h3>
    </div>


	<div class="entry-content">
		<?php
		the_content();
		?>
    </div><!-- .entry-content -->
    
    <div class="meta-info">
        <p>Register Before <?= $registration_deadline->format('F j, Y'); ?></p>
        <?= the_field('training_team_info', 'option'); ?>
        <p><a href="tel:<?= the_field('team_phone_number', 'option')?>"><?= the_field('team_phone_number', 'option')?></a></p>
    </div>

    <div class="downloads clearfi">
       
            <p class="download-icn mt-0"><img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-download-blue.svg'?>"/><a href="<?= get_field('registration_form') ?>">Download Registration Form</a></p>
        


        <?php

// check if the repeater field has rows of data
if( have_rows('brochures') ):

    // loop through the rows of data
    while ( have_rows('brochures') ) : the_row(); ?>


<p class="download-icn"><img width='20' src="<?= get_template_directory_uri().'/assets/images/icn-download-blue.svg'?>"/><a download="<?= the_sub_field('brochure_file_') ?>" href="<?= the_sub_field('brochure_file_') ?>"><?= the_sub_field('brochure_name')?></a></p>


     

    <?php endwhile;

else :



endif;

?>

    </div>
    
  

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'sdpi' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

