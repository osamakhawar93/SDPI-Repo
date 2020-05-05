<?php /* Template Name: Blogs */ ?>

<?php 

get_header();

?>


<?php



$authors = $wpdb->get_results(
	$wpdb->prepare( 
		"
		SELECT DISTINCT ID,post_title from wp_posts WHERE ID IN (Select meta_value from wp_postmeta WHERE meta_key LIKE %s AND meta_value <> %s) AND post_status='publish' Order by post_title
        ",
        'authors_%_author_link',
        ''		
	)
);

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

                    <li>
                    
                    <select id="blog_author_select" onchange="onAuthorChange(this)">
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

                            <option value="2018">2018</option>

                            <option value="2019">2019</option>

                            <option value="2020">2020</option>

                            <option value="2021">2021</option>

                            <option value="2022">2022</option>

                            <option value="2023">2023</option>

                            <option value="2024">2024</option>

                            <option value="2025">2025</option>

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

            <div class="shortcode" id="blogs-content">

            </div>

        </div>

    </div>

</div>

<?php 

get_footer();

?>