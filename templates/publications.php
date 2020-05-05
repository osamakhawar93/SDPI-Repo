<?php /* Template Name: Publications */ ?>

<?php 

get_header();
/*  */
?>





<section class="title-header d-flex align-items-center justify-content-center mb-0">

    <h2><?= get_field('page_title') ?></h2>

</section>





<section class="banner-section-abt">

    <div class="banner-img mb-50" style="background-image:url('<?= get_field('page_banner') ?>')">

     

    </div>

</section>


<?php



$authors = $wpdb->get_results(
	$wpdb->prepare( 
		"
		SELECT DISTINCT ID,post_title from wp_posts WHERE ID IN (Select meta_value from wp_postmeta WHERE meta_key LIKE %s AND meta_value <> %s) AND post_status='publish' Order by post_title
        ",
        'publication_author_%_author_link',
        ''		
	)
);

$years = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT distinct substr(meta_value,1,4) AS year FROM wp_postmeta where meta_key LIKE %s AND meta_value <> %s Order by 1",
        'publication_date',
        ''
    )
);

?>









<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
        <p class="publication-disclaimer">
			You may not be able to access all our publications online because we are upgrading our website. We are sorry for the inconvenience. If you require any SDPI publication that you cannot find on our website, please write to us at <a href="mailto:web@sdpi.org">web@sdpi.org</a> and we will send you a soft copy of it. 
			</p>
        </div>
    </div>
<div class="filters-section">

                <ul class="filters-list">

                    <li>

                        <select class="filters-asc" onchange="onSortOrderChange(this)">

                            <option value="Sort Order" selected disabled>Sort Order</option>

                            <option value="DESC">Descending</option>

                            <option value="ASC">Ascending</option>

                        </select>

                    </li>

                    <li>

                        <?php 

                        $terms = get_terms( array(

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

                        <?php   }

                        ?>

                        

                    </li>

                    <li>
                    
                    <select  id="author_select" onchange="onAuthorChange(this)">
                    <option value="Sort By Author" disabled selected>Sort By Author</option>
                    <?php foreach ($authors as $author){ ?>
                        <option value="<?= $author->ID ?>">
                            <?= $author->post_title ?>
                        </option>
                    <?php
                    }
                    ?>
                    </select>
                    </li>


                    <li>

                        <select class="filters-asc" onchange="onYearChange(this)">

                            <option value="Sort By Year" selected disabled>Sort By Year</option>
                            <?php 
                            foreach($years as $year){
                                    echo "<option value=".$year->year.">".$year->year."</option>";
                            }
                            ?>

                        </select>

                    </li>

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

            <div class="shortcode" id="publications-content">

            </div>

        </div>

    </div>

</div>

<?php 

get_footer();

?>