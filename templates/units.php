<?php
/**
* Template Name: Units
* Description: The template for displaying all  posts and attachments
*/

$unit_id = $_GET['unit_id'];

?>
    <?php get_header(); ?>
        <section class="title-header d-flex align-items-center justify-content-center mb-0">
            <h2><?= get_the_title($unit_id)?></h2>
        </section>
        <section class="banner-image mb-0" style="background-image:url('<?= get_field('page_banner') ?>')">

        </section>

        <section class="pt-5">
            <div class="container">
                <div class="unit-detail">
                <?php 
                $unit_detail = get_post_meta( $unit_id, 'unit_detail');
                echo  $unit_detail[0];
                ?>
                </div>
                <h3 class="unit-headings text-left">Research Lead</h3>
                <?php 
            $leadTeamMember = get_post_meta( $unit_id, 'lead_team_member');
            $leadTeamMember = $leadTeamMember[0];

            $staff = get_post_meta($unit_id, 'staff');
            $staff = $staff[0];
            $designation = get_post_meta( $leadTeamMember, 'designation');
            ?>
                <?php if($leadTeamMember){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <a class="team-links" href="<?= get_the_permalink($leadTeamMember); ?>">
                                                <p class="name">
                                                    <?= get_the_title($leadTeamMember) ?>
                                                </p>
                        </a>
                    </div>
                </div>

                                                                    <?php }else{ ?>
<p class="text-left">No Team Lead Assigned</p>
                                                                   <?php } ?>

               
            <h3 class="unit-headings mt-5 mb-5 text-left">Research Staff Members</h3>
                <?php
                
                if ($staff) { ?>


                <p><?php the_field('staff', $leadTeamMember); ?></p>
                <div class="row">

                    <?php 
                    for ($i=0; $i<$staff;$i++) { 
                      $meta_key = 'staff_'.$i.'_staff_posts';
                      $sub_field_value = get_post_meta($unit_id, $meta_key, true);
                      $designation2 = get_post_meta( $sub_field_value, 'designation');
                      ?>

                    <div class="col-md-12  mb-3">
                    <a class="team-links" href="<?= get_the_permalink($sub_field_value); ?>">
                        <p class="name">
                            <?= get_the_title($sub_field_value) ?> (<?= $designation2[0] ?>)
                        </p>
                    </a>
                    </div>

                    <?php }
                  }else{ ?>
    <p class="text-left">No Team Members assigned</p>
                  <?php }
                    ?>
                    
                </div>
            </div>
        </section>
        <?php

 get_footer(); ?>