<?php
 $publication_date = get_post_meta( $post->ID, 'deadline_date');
 $publication_date = DateTime::createFromFormat('Ymd', $publication_date[0]);
 $publication_file_link = get_post_meta( $post->ID, 'rfq_form');
 $publication_file_link = wp_get_attachment_url($publication_file_link[0]);
?>
<li class="mb-3">
   
        <?php the_title(); ?> (Before <?=  $publication_date->format('M j, Y') ?>)
    <a class="proc-link" title="click to download RFQ Form" href="<?= $publication_file_link ?>" download="<?= $publication_file_link ?>">
        <img width="20" src="<?= get_template_directory_uri()?>/assets/images/icn-download-blue.svg">
    </a>
</li>