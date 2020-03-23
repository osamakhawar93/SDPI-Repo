<?php 
  $id = get_the_ID();
  $designation = get_post_meta( $id, 'designation');
?>
            <div class="team-accordion mb-3">
                 <p class="mb-0">
                    <button class="accordion-btns mb-0" type="button" data-toggle="collapse" data-target="#collapse_<?= $post->ID ?>" aria-expanded="false" aria-controls="collapseExample">
                        <?php the_title(); ?>
                    </button>
                </p>
                <div class="collapse" id="collapse_<?= $post->ID ?>">
                    <div class="card card-body">
                           <?php the_content(); ?>
                    </div>
                </div>
            </div>
               