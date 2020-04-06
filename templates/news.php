<?php /* Template Name: News */ ?>

<?php 

get_header();

?>





<section class="title-header d-flex align-items-center justify-content-center mb-0">

    <h2><?= get_field('page_title') ?></h2>

</section>





<section class="banner-section-abt">

    <div class="banner-img mb-50" style="background-image:url('<?= get_field('page_banner') ?>')">

     

    </div>

</section>





<div class="container">

<div class="filters-section">

                <ul class="filters-list">

                    <li>

                        <select class="filters-asc" onchange="onSortOrderChange(this)">

                            <option value="Sort Order" selected disabled>Sort Order</option>

                            <option value="DESC">Descending</option>

                            <option value="ASC">Ascending</option>

                        </select>

                    </li>



                    <!-- <li>

                        <?php

                        /* $posts = get_posts(array(

                            'post_type'   => 'team',

                            'post_status' => 'publish',

                            'posts_per_page' => -1,

                            'fields' => 'ids'

                            )

                        );

                        echo '<select class="filters-asc" onchange="onAuthorChange(this)">';

                            echo ' <option value="Sort By Author" selected disabled>Sort By Author</option>';

                        foreach($posts as $p): 

                            if ($p) {

                                echo  '<option value="'.$p.'">'.get_the_title($p).'</option>';  

                            }

                        endforeach; 

                        echo '</select>'; */



                        ?>

                    </li> -->

                    <li>

           

<input type="text" id="from" name="from" placeholder="Search Date From">



<input type="text" id="to" name="to" placeholder="Search Date To">



                    </li>

                  <!--   <li> -->

                        <?php 

                       /*  $terms = get_terms( array(

                            'taxonomy' => 'publication_category',

                            'hide_empty' => true,

                        ) );

                        $count = count( $terms );

                        if ( $count > 0 ) { ?>

                          <select class="filters-asc" onchange="onCategoryChange(this)"> 

                                <option value="Sort Categories" selected disabled>Sort Categories</option>

                                <?php 

                                    foreach ( $terms as $term ) { ?>

                                <option value="<?= $term->term_id ?>"><?= $term->name ?></option>

                                    <?php } ?>

                            </select>

                        <?php   } */

                        ?> 

                        

                 <!--   </li>  -->

                    <!-- <li> -->

                        <?php 

                        /*

                        $posts = get_posts(array(

                            'post_type'   => 'team',

                            'post_status' => 'publish',

                            'posts_per_page' => -1,

                            'fields' => 'ids'

                            )

                        );

                        echo '<select class="filters-asc" onchange="onAuthorChange(this)">';

                            echo ' <option value="Sort By Author" selected disabled>Sort By Author</option>';

                        foreach($posts as $p): 

                            if ($p) {

                                echo  '<option value="'.$p.'">'.get_the_title($p).'</option>';  

                            }

                        endforeach; 

                        echo '</select>';

                        */

                        ?>

                   <!--  </li> -->

                   <!--  <li>

                        <?php



                           /*  $posts = get_posts(array(

                                'post_type'   => 'publications',

                                'post_status' => 'publish',

                                'posts_per_page' => -1,

                                'fields' => 'ids'

                                )

                            ); */

                            ?>



                            <select class="filters-asc" onchange="onAuthorChange(this)">

                                <option value="Sort By Author" selected disabled>Sort By Author</option>

                            <?php 

                          /*   $authors = array();

                            foreach($posts as $p): 

                                $repeater_value = get_post_meta($p,"publication_author",true);

                                if ($repeater_value) {

                                    for ($i=0; $i<$repeater_value;$i++) {

                                        $meta_key = 'publication_author_'.$i.'_author_name';

                                        $sub_field_value = get_post_meta($p, $meta_key, true);

                                        array_push($authors,$sub_field_value);

                                    }

                                }

                            endforeach; 

                            print_r($authors);

                            $authors = array_unique($authors);

                            foreach($authors as $author)

                            echo  '<option value="'.$author.'">'.$author.'</option>'; */



                            ?>

                            </select>

                    </li> -->

                   <!--  <li>

                        <select class="filters-asc" onchange="onYearChange(this)">

                            <option value="Sort By Year" selected disabled>Sort By Year</option>

                            <option value="2018">2018</option>

                            <option value="2019">2019</option>

                            <option value="2020">2020</option>

                            <option value="2021">2021</option>

                            <option value="2022">2022</option>

                            <option value="2023">2023</option>

                            <option value="2024">2024</option>

                            <option value="2025">2025</option>

                        </select>

                    </li> -->

                    <li>

                        <div class="ajax-search">

                            <input type="text" placeholder="Search by Keywords ... " />

                            <button onclick="getSearhedPosts()"><img width="15" src="<?= get_template_directory_uri().'/assets/images/icn-search.svg'?>"/></button>

                        </div>

                    </li>

                    <li class="min-65">

                        <a onclick="clearAllFilters()">

                            Clear

                        </a>

                    </li>

                </ul>

            </div>

    <div class="row mt-md-5">

        <div class="col-md-12 col-lg-12 col-xl-12 about-template-content">

            <?= get_field('main_heading') ?>

            <h4><?= get_field('sub_heading') ?></h4>

            <div class="shortcode" id="news-content">

            </div>

        </div>

    </div>

</div>



<script>

  

  </script>

<?php 

get_footer();

?>