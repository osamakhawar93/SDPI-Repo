<?php /* Template Name: Test */ ?>
<?php 
get_header();
?>

<?php
 echo do_shortcode( '[searchandfilter post_types="publications" fields="search,category,post_tag"]' );

get_footer();
?>