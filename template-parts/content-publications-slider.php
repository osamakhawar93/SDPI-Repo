<?php 
  $publication_date = get_post_meta( $post->ID, 'publication_date');
  $publication_author = get_post_meta( $post->ID, 'publication_author');
  $publication_file_link = get_post_meta( $post->ID, 'publication_file');
  $publication_file_link = wp_get_attachment_url($publication_file_link[0]);
  $terms = wp_get_object_terms( $post->ID, 'publication_category', array( 'fields' => 'names' ) );
  $class = ' ';
  foreach ($terms as $term) {
    if ($term  === "COVID-19 Policy Review Series") { // Yoshi version 
        $class = "covid-class";
    }
  }

?>

<div class="slide">
    <img src="<?= get_template_directory_uri().'/assets/images/publications-image.jpg'?>" />
    <div class="publication-detail <?php echo $class; ?>">
        <div class="action-btns d-inline-flex justify-content-between align-items-center">
       
        <a target="_blank" href="<?= $publication_file_link ?>"><img src="<?= get_template_directory_uri().'/assets/images/icn-download-white.svg' ?>"></a>
        </div>
        
        <h5>  <a href="<?= the_permalink($post->ID) ?>"> <?= get_the_title() ?>     </a> </h5>
        <p>
          <?php

//$count = count(get_field('publication_author',$post->ID));
$counter = 0;
          if(get_field('publication_author',$post->ID)){ ?>
By:
<?php


$authors = $wpdb->get_results(
	$wpdb->prepare( 
		"
			SELECT * 
			FROM wp_postmeta
			WHERE post_id  = %s
			AND meta_key LIKE %s
			AND meta_value <> %s
		",
		$post->ID,
		'publication_author_%_author_link',
		''
	)
);

$count = 0;
foreach ($authors as $author){ ?>
<a href="<?= get_the_permalink($author->meta_value) ?>">
	<?= get_the_title($author->meta_value) ?>
</a>
<?php
$count++;
if($count!= count($authors)){ ?>
 <span>,</span>
<?php }
}

          }
?>



        </p>
    </div>
</div>