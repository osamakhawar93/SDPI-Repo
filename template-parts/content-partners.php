<div class="col-6 col-md-2 mb-4 mb-md-0">
    <a href="<?= get_field('organization_link') ?>" target="_blank">
        <?php $title = get_the_title(); ?>
        <div class="partner-organization-img">
        <?php echo the_post_thumbnail('medium',array( 'class' => 'img-fluid',
        'alt' => $title,
        'title' => $title)); ?>
        </div>
    </a>
</div>