<?php
/**
 * sdpi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sdpi
 */


if ( ! function_exists( 'sdpi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, whichs
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sdpi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sdpi, use a find and replace
		 * to change 'sdpi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sdpi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'sdpi' ),
		) );

		//Registering Overview Menu in Footer
		register_nav_menus( array(
			'overview-menu' => esc_html__( 'Overview Menu', 'sdpi' ),
		) );

		//Registering About Us Menu in Footer
		register_nav_menus( array(
			'about-menu-footer' => esc_html__( 'About Menu Footer', 'sdpi' ),
		) );

		//Registering Support Menu in Footer
		register_nav_menus( array(
			'support-menu-footer' => esc_html__( 'Support Menu Footer', 'sdpi' ),
		) );

		//Registering Legal Menu in Footer
		register_nav_menus( array(
			'legal-menu-footer' => esc_html__( 'Legal Menu Footer', 'sdpi' ),
		) );

		//Registering Learn More Menu in Footer
		register_nav_menus( array(
			'learn-more-menu-footer' => esc_html__( 'Learn More Footer', 'sdpi' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sdpi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'sdpi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sdpi_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sdpi_content_width', 640 );
}
add_action( 'after_setup_theme', 'sdpi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sdpi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sdpi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sdpi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sdpi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sdpi_scripts() {

	/*Adding Bootstrap 4 */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false);
	if ( is_page_template( 'templates/policy-outreach.php' ) || is_page_template('templates/homepage.php') ) {
		//Slick
		wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), false);
		wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), false);
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '20151217', true );
	} 
	wp_enqueue_style( 'sdpi-style', get_stylesheet_uri());

	wp_enqueue_style( 'sdpi-responsive',get_template_directory_uri().'/assets/css/responsiveness.css');
	
	wp_enqueue_style( 'helvetica-nue', get_template_directory_uri().'/assets/fonts/helvetica-nue/style.css');

	wp_enqueue_script( 'sdpi-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sdpi-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151220', true );

	//wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20151217', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151218', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151217', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(is_page_template( 'templates/news.php' )){
		wp_enqueue_style( 'jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		wp_enqueue_script( 'jquery-ui','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '20151228', true );
	}
	
}
add_action( 'wp_enqueue_scripts', 'sdpi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* Theme Options */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


/* Adding Custom post type of Trainings */
// Our custom post type function
function create_posttype() {
 
    register_post_type( 'trainings',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Trainings' ),
                'singular_name' => __( 'Training Session' )
            ),
            'public' => true,
			'has_archive' => false,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'           =>'dashicons-lightbulb',
            'rewrite' => array('slug' => 'trainings'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/**
 * Adding Team Post Types
 */
function create_posttype_team() {
 
    register_post_type( 'Team',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team Member' )
            ),
            'public' => true,
			'has_archive' => false,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'=> 'dashicons-admin-users',
            'rewrite' => array('slug' => 'team'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_team' );
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_team_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_team_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Team Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Team Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Team Categories' ),
    'all_items' => __( 'All Team Categories' ),
    'parent_item' => __( 'Parent Team Category' ),
    'parent_item_colon' => __( 'Parent Team Category:' ),
    'edit_item' => __( 'Edit Team Category' ), 
    'update_item' => __( 'Update Team Category' ),
    'add_new_item' => __( 'Add New Team Category' ),
    'new_item_name' => __( 'New Team Category' ),
    'menu_name' => __( 'Team Category' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('team_category',array('team'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'team_category' ),
  ));
 
}

// Adding About sidebar Menu 
register_nav_menus( array(  
	'secondary' => __('About', 'sdpi')  
)); 


/**
 * About Shortcodes: Fetch Upcoming Trainings
 */

function wpb_demo_shortcode() { 
	get_template_part( 'template-parts/upcoming', 'trainings' );
} 
	// register shortcode
add_shortcode('upcomingTrainings', 'wpb_demo_shortcode'); 

/**
 * About Shortcodes : Fetch Training Calendar
 */

/**
 * Adding scripts for Ajax
 */
function filters_training() {
	   if( is_page( array( 'training-calendar' ) ) ){
		wp_enqueue_script( 'about-ajax-script', get_template_directory_uri() . '/assets/js/about.js', array('jquery') );
		wp_localize_script( 'about-ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	   }
}
add_action( 'wp_enqueue_scripts', 'filters_training' );


function training_calendar_function(){

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	if(isset($_POST['page'])){
		/* Pagination vars */
		
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 4;

        $previous_btn = true;

        $next_btn = true;

        $first_btn = true;

		$last_btn = true;
	
		$start = $page * $per_page;


		/**
		 * This code is just to fetch the total posts for Training to help with pagination
		 */
		$totalPosts = count(get_posts(array(
			'post_type' => 'trainings',
			'post_status'=>'publish'
		)));



		$args = array(
			'post_type'=> 'trainings',
			'paged' => $paged,
			'posts_per_page' => $per_page,
			'offset'=> $start
		);
		

	$query = new WP_Query( $args );
	$totalPosts = $query->found_posts;

	$response = '';
	if( $query->have_posts() ) :
		echo '<div id="timeline-content"><ul class="timeline">';
		while( $query->have_posts() ): $query->the_post();
		$response .= get_template_part('template-parts/training','calendar');	
		endwhile;
		echo '</ul></div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Upcoming Trainings';
	endif;


	$no_of_paginations = ceil($totalPosts / $per_page);

	if($totalPosts > $per_page){

		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	
		// Pagination Buttons logic     
		$pag_container .= "
		<div class='cvf-universal-pagination'>
			<ul class='custom-pagination d-flex align-items-center justify-content-center'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

	}
	
	}

	die();
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_training_calendar_function', 'training_calendar_function');
add_action('wp_ajax_nopriv_training_calendar_function', 'training_calendar_function');

add_shortcode('training_calendar', 'training_calendar_function'); 


/**
 * Shortcode To Fetch Team Members for certain category
 */

 function getTeamMembersForGivenCategory($atts){
	$att = shortcode_atts( array(
        'category' => 5,
        'accordion' => false
	), $atts );

	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'team',
			'orderby'=>'title',
			'order'=>'ASC',
			'tax_query' => array(
					array(
						'taxonomy' => 'team_category',
						'field' => 'term_id',
						'terms' => $att['category'],
					)
				)
			);

		
	$query = new WP_Query( $args );
	$response = '';
	if( $query->have_posts() ) :

	
		    if($att['accordion'] == 'true'){
				while( $query->have_posts() ): $query->the_post();
				$response .= get_template_part('template-parts/content','team-accordions');
				endwhile;
		    }else{
				echo '<div  class="row">';
				while( $query->have_posts() ): $query->the_post();
				$response .= get_template_part('template-parts/content','team');
				endwhile;
				echo '</div>';
		    }
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Team Members';
	endif;

 }
 add_shortcode('getTeamMembers','getTeamMembersForGivenCategory');


 /**
 * Adding Partners PostType
 */

function create_posttype_partners() {
 
    register_post_type( 'Partners',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Partners' ),
                'singular_name' => __( 'Partner' )
            ),
            'public' => true,
			'has_archive' => true,
			'supports'           => array( 'title', 'thumbnail' ),
            'rewrite' => array('slug' => 'partners'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_partners' );



/**
 *  Fetch Partner Organizations Shortcode
 */

 function fetchPartnerOrganizationsFunction(){
	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'partners',
			);
	$query = new WP_Query( $args );
	$response = '';
	if( $query->have_posts() ) :
		echo '<div class="row align-items-center justify-content-center mb-5 pb-5">';
		while( $query->have_posts() ): $query->the_post();
		$response .= get_template_part('template-parts/content','partners');	
		endwhile;
		echo '</div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Team Members';
	endif;
 }

 add_shortcode('fetchPartnerOrganizations','fetchPartnerOrganizationsFunction');



 /**
 * Adding Events PostType
 */

function cw_post_type_events() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'thumbnail', // featured images
		'excerpt', // post excerpt
	);
	$labels = array(
			'name' => _x('Events', 'plural'),
			'singular_name' => _x('Event', 'singular'),
			'menu_name' => _x('Events', 'admin menu'),
			'name_admin_bar' => _x('Events', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New Event'),
			'new_item' => __('New Events'),
			'edit_item' => __('Edit Events'),
			'view_item' => __('View Events'),
			'all_items' => __('All Events'),
			'search_items' => __('Search Events'),
			'not_found' => __('No Events found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-calendar-alt',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'events'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('events', $args);
}

add_action('init', 'cw_post_type_events');


 /**
 * Events Calendar Shortcode 
 * 
 */


function localize_calendar() {
     if(is_front_page()){ 
             wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/assets/js/calendar.js', array('jquery') );
             wp_localize_script( 'ajax-script', 'fetch_events', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
     }
 }
 
add_action( 'wp_enqueue_scripts', 'localize_calendar' );
 
add_action( 'wp_ajax_nopriv_fetchEventsForSelectedMonth', 'fetchEventsForSelectedMonth' );
add_action( 'wp_ajax_fetchEventsForSelectedMonth', 'fetchEventsForSelectedMonth' );

 
function fetchEventsForSelectedMonth($atts){
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
	    $selected_date = $_POST['date']; 
	    $selected_year =  date("Y");
	    if($_POST['month']<=9){
	        $_POST['month'] += 1;
	        $selected_month = sprintf("%02s", $_POST['month']); // Adding 1 because months in js start from 0, also adding a trailing 0  
	    }else{
	        $selected_month = $_POST['month']+1;
	    }
	    
	    $todays_date =  current_time($selected_year.$selected_month.$selected_date);// Todays Date is now the date you want events for 
	}else{
	   	$todays_date = current_time('Ymd'); // Todays Date is the date for today
	}

   

	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'events',
			'meta_key' => 'end_date',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key' => 'end_date',
					'compare' => '>=',
					'value' => $todays_date,
				) 
			)
	);
 

	$query = new WP_Query( $args );
	$response = '';

 	if( $query->have_posts() ) :
		echo '<div class="events-slider align-items-center justify-content-center w-100  mt-5 mt-sm-0">';
		while( $query->have_posts() ): $query->the_post();
		$response .= get_template_part('template-parts/content','events');	
		endwhile;
		echo '</div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Upcoming Events';
	endif;
	echo '<script>
	jQuery(".events-slider").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: true,
		autoplay:false,
		responsive:[
			{
				breakpoint: 992,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1,
				  centreMode:true
				}
			},
			{
				breakpoint: 480,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  centreMode:true
				}
			}
		]
	  })
	</script>';
    exit;
 }

 add_shortcode('fetchevents','fetchEventsForSelectedMonth');





  /**
 * Adding Publications PostType
 */

function sdpi_post_type_publications() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'thumbnail', // featured images
	);
	$labels = array(
			'name' => _x('Publications', 'plural'),
			'singular_name' => _x('Publication', 'singular'),
			'menu_name' => _x('Publications', 'admin menu'),
			'name_admin_bar' => _x('Publications', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New Publication'),
			'new_item' => __('New Publications'),
			'edit_item' => __('Edit Publications'),
			'view_item' => __('View Publications'),
			'all_items' => __('All Publications'),
			'search_items' => __('Search Publications'),
			'not_found' => __('No Publications found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-paperclip',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'publications'),
		'has_archive' => false,
		'hierarchical' => false,
	);
	register_post_type('publications', $args);
}

add_action('init', 'sdpi_post_type_publications');

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_publications_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_publications_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Publication Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Publication Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Pulication Categories' ),
    'all_items' => __( 'All Pulication Categories' ),
    'parent_item' => __( 'Parent Publication Category' ),
    'parent_item_colon' => __( 'Parent Publication Category:' ),
    'edit_item' => __( 'Edit Publication Category' ), 
    'update_item' => __( 'Update Publication Category' ),
    'add_new_item' => __( 'Add New Publication Category' ),
    'new_item_name' => __( 'New Publication Category' ),
    'menu_name' => __( 'Publication Category' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('publication_category',array('publications'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'publication_category' ),
  ));
 
}

/**
 * Shortcode To Fetch Publicaations for certain category
 */

function sdpi_getPublicationsForCategory($atts){

	$att = shortcode_atts( array(
		'category' => 5,
		'slider'=> false
	), $atts );
	
	if ($att['category']!== '')
    {
        $tax_query[] =  array(
			'taxonomy' => 'publication_category',
			'field' => 'term_id',
			'terms' => $att['category'],
		);
	}

	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'publications',
			'tax_query' => $tax_query,
	);
	$query = new WP_Query( $args );
	$response = '';



	if( $query->have_posts() ) :
	
		$count = 0; 
			while( $query->have_posts() ): $query->the_post();
				set_query_var( 'count', $count);
				if($att['slider'] == 'true'){
					$response .= get_template_part('template-parts/content','publications-slider');
				}else{
					$response .= get_template_part('template-parts/content','publications');
				}	
				$count++;
			endwhile;
	
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Publications Found';
	endif;

 }
 add_shortcode('getPublicationsForCategory','sdpi_getPublicationsForCategory');



/**
 * Adding News PostType
 */

function sdpi_post_type_news() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'thumbnail', // featured images
	);
	$labels = array(
			'name' => _x('News', 'plural'),
			'singular_name' => _x('News', 'singular'),
			'menu_name' => _x('News', 'admin menu'),
			'name_admin_bar' => _x('News', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New News Item'),
			'new_item' => __('New News'),
			'edit_item' => __('Edit News'),
			'view_item' => __('View News'),
			'all_items' => __('All News'),
			'search_items' => __('Search News'),
			'not_found' => __('No News found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-media-text',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'news'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('news', $args);
}

add_action('init', 'sdpi_post_type_news');



/**
 * Shortcode To Fetch Latest News
 */

function sdpi_getLatestNewsShortcode($atts){

$today = getdate();
$args = array(
	'post_type' => 'news',
	'post_status'=>'publish',
    /* 'date_query' => array(
        array(
            'year'  => $today['year'],
            'month' => $today['mon'],
            'day'   => $today['mday'],
        ),
    ), */
);
$query = new WP_Query( $args );
if( $query->have_posts() ) :
	$count = 0; 
		while( $query->have_posts() ): $query->the_post();
			set_query_var( 'count', $count);
			$response .= get_template_part('template-parts/content','news');	
			$count++;
		endwhile;

	wp_reset_postdata(); wp_reset_query();
else :
	echo 'No Upcoming News';
endif;

 }

 add_shortcode('getLatestNewsShortcode','sdpi_getLatestNewsShortcode');

// Timeline designs for pages 

function getTimeLineTemplateForGivenType_function($atts){
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$att = shortcode_atts( array(
		'type'=> 'post'
	), $atts );

	if($att['type'] == 'publications'){
			$args = array(
				'post_type' => $att['type'],
				'post_status'=>'publish',
				'paged' => $paged,
				'posts_per_page'=>10
			);
	}else{
			$today = getdate();
			$args = array(
			'post_type' => $att['type'],
			'post_status'=>'publish',
			'paged' => $paged,
			'posts_per_page'=>10,
			/* 'date_query' => array(
				array(
					'year'  => $today['year'],
					'month' => $today['mon'],
					'day'   => $today['mday'],
				),
			), */
		);
	}

		$query = new WP_Query( $args );

		if( $query->have_posts() ) :
			$count = 0; 
			echo '<div id="timeline-content" class="mb-3"><ul class="timeline">';
				while( $query->have_posts() ): $query->the_post();
					set_query_var( 'count', $count);
					$response .= get_template_part('template-parts/timeline','content');	
					$count++;
				endwhile;
				echo '</ul></div>';
			echo '<div class="pagination mt-5 mb-5">';

				wp_pagenavi( array( 'query' => $query)); 
			
			echo '</div>';

			wp_reset_postdata(); wp_reset_query();
		else :
			echo 'No Upcoming '.$att['type'];
		endif;

}
add_shortcode('getTimeLineTemplateForGivenType','getTimeLineTemplateForGivenType_function');





 /**
 *Adding Procurement custom posttype
 */

function cw_post_type_procurements() {
	$supports = array(
		'title', // post title
		//'editor', // post content
		//'thumbnail', // featured images
		//'excerpt', // post excerpt
	);
	$labels = array(
			'name' => _x('Procurements', 'plural'),
			'singular_name' => _x('Procurement', 'singular'),
			'menu_name' => _x('Procurements', 'admin menu'),
			'name_admin_bar' => _x('Procurements', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New Procurement'),
			'new_item' => __('New Procurement'),
			'edit_item' => __('Edit Procurement'),
			'view_item' => __('View Procurements'),
			'all_items' => __('All Procurements'),
			'search_items' => __('Search Procurements'),
			'not_found' => __('No Procurements found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-editor-quote',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'procurements'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('procurements', $args);
}

add_action('init', 'cw_post_type_procurements');



/**
 * Getting Upcoming Procurements
 */
function getUpcomingProcurements_function(){
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$today = date( 'Y-m-d' );
	$args = array(
		'post_type' => 'procurements',
		'post_status'=> 'publish',
		'paged' => $paged,
		'posts_per_page'=>20,
		'meta_query' => array(
			array(
				'key' => 'deadline_date',
				'value' => $today,
				'compare' => '>=',
				'type' => 'DATE'
			)
		)
			);
	$query = new WP_Query( $args );
		
	$response="";
	if( $query->have_posts() ) :
		$count = 0; 
		echo '<p class="mb-3"><strong>Procurement</strong></p>';
		echo '<ul class="procurements">';
			while( $query->have_posts() ): $query->the_post();
				set_query_var( 'count', $count);
				$response .= get_template_part('template-parts/procurement','content');	
				$count++;
			endwhile;
		echo '</ul>';
		echo '<div class="pagination mt-5 mb-5">';
	
			wp_pagenavi( array( 'query' => $query)); 
		
		echo '</div>';
		return $response;
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Upcoming Procurements';
	endif;

}
add_shortcode('getUpcomingProcurements','getUpcomingProcurements_function');



/**
 *Adding Careers custom posttype
 */

function cw_post_type_careers() {
	$supports = array(
		'title', // post title
		'editor', // post content
		//'thumbnail', // featured images
		//'excerpt', // post excerpt
	);
	$labels = array(
			'name' => _x('Careers', 'plural'),
			'singular_name' => _x('Careers', 'singular'),
			'menu_name' => _x('Careers', 'admin menu'),
			'name_admin_bar' => _x('Careers', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New Item'),
			'new_item' => __('New Job Posting'),
			'edit_item' => __('Edit Job Posting'),
			'view_item' => __('View Job Postings'),
			'all_items' => __('All Job Postings'),
			'search_items' => __('Search Job Postings'),
			'not_found' => __('No Jobs found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-welcome-learn-more',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'careers'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('careers', $args);
}

add_action('init', 'cw_post_type_careers');



/**
 *Adding Projects custom posttype
 */

function cw_post_type_projects() {
	$supports = array(
		'title', // post title
		'editor', // post content
		//'thumbnail', // featured images
		//'excerpt', // post excerpt
	);
	$labels = array(
			'name' => _x('Projects', 'plural'),
			'singular_name' => _x('Projects', 'singular'),
			'menu_name' => _x('Projects', 'admin menu'),
			'name_admin_bar' => _x('Projects', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New Project'),
			'new_item' => __('New Project'),
			'edit_item' => __('Edit Project'),
			'view_item' => __('View Projects'),
			'all_items' => __('All Projects'),
			'search_items' => __('Search Projects'),
			'not_found' => __('No Projects found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'menu_icon'=>'dashicons-welcome-write-blog',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'projects'),
		'has_archive' => false,
		'hierarchical' => false,
	);
	register_post_type('projects', $args);
}

add_action('init', 'cw_post_type_projects');


/**
 * Shortcode To Fetch New Arrivals
 */

function sdpi_fetchNewArrivals($atts){

	$args = array(
			'post_type' => array( 'news', 'publications', 'events','careers','projects','post'),
			'posts_per_page' => 20,
			'orderby' => 'publish_date',
			'order' => 'Desc',
			'post_status'=> 'publish'
	);
	$query = new WP_Query( $args );
	$response = '';



	if( $query->have_posts() ) :
	
		$count = 0; 
			while( $query->have_posts() ): $query->the_post();
				set_query_var( 'count', $count);
				$current_post_type  = get_post_type();
				$response .= get_template_part('template-parts/cards/card',$current_post_type);	
	//echo $current_post_type.'----';
				
				$count++;
			endwhile;
		
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Publications Found';
	endif;

 }
 add_shortcode('fetch_new_arrivals','sdpi_fetchNewArrivals');


 /**
 * Shortcode To Fetch Team Categories
 */

function sdpi_fetchTeamCategories($atts){

	$terms = get_terms( 'team_category' );
	$count = count( $terms );
	if ( $count > 0 ) {
		echo '<div class="row mt-md-5">';
		foreach ( $terms as $term ) {
			echo '<div class="col-md-6 col-6 text-center unit-center mb-5">';
				echo '<a href="'.home_url().'/team-categories?category='.$term->term_id.'">';
                    echo  '<img width="100%" src='.get_template_directory_uri().'/assets/images/team.png />';
                    echo '<p>'.$term->name.'</p>';
				echo '</a>';
			echo '</div>';
		}
		echo '</div>';
	}

 }
 add_shortcode('getTeamCategories','sdpi_fetchTeamCategories');



 /**
 * Adding scripts for Ajax Publications
 */
function filters_publications() {
	if( is_page( array( 'all-publications' ) ) || is_page(array( 'publications' ) ) ){
	 wp_enqueue_script( 'publications-ajax-script', get_template_directory_uri() . '/assets/js/publications.js', array('jquery') );
	 wp_localize_script( 'publications-ajax-script', 'publications_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'filters_publications' );


// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_publications_ajax_function', 'publications_ajax_function_call');
add_action('wp_ajax_nopriv_publications_ajax_function', 'publications_ajax_function_call');

add_shortcode('publications_ajax_shortcode', 'publications_ajax_function_call'); 

 /**
  * Publications ajax 
  */
  function publications_ajax_function_call(){

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	if(isset($_POST['page'])){
		/* Pagination vars */
		
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 12;

        $previous_btn = true;

        $next_btn = true;

        $first_btn = true;

		$last_btn = true;
	
		$start = $page * $per_page;


		/**
		 * This code is just to fetch the total posts for Training to help with pagination
		 */
		$totalPosts = count(get_posts(array(
			'post_type' => 'publications',
			'post_status'=>'publish',
		)));

		if($_POST['category_id']){
			$tax_query = array(
					array(
						'taxonomy' => 'publication_category',
						'field' => 'term_id',
						'terms' => $_POST['category_id']
					)
				);
		}else{
			$tax_query = '';
		}

		if($_POST['author']){
			/* $author_query = array(
				array(
					'key'       => 'publication_author_$_author_name',
					'value'     => $_POST['author'],
					'compare'   => '='
				),
			); */
			$author_query = array(
				array(
					'key'       => 'publication_author_$_author_link',
					'value'     => $_POST['author'],
					'compare'   => '='
				),
			);
		}else{
			$author_query = '';
		}

		if($_POST['year']){
		$next_year = $_POST['year']+1;
			//Today's date$next_year
$start_date = date('Ymd', strtotime(date($_POST['year'].'-01-01'))); 
//Future date - the arg will look between today's date and this future date to see if the post fall within the 2 dates.
$end_date = date('Ymd', strtotime(date($next_year.'-12-31')));


			$year_array = array(
				array(
					'key'		=> 'publication_date',
					'compare'	=> 'BETWEEN',
					'type'		=> 'numeric',
					'value'		=> array($start_date, $end_date),
				)
			);
		}else{
			$year_array = '';
		}


		$args = array(
			'post_type'=> 'publications',
			'post_status'=>'publish',
			'paged' => $paged,
			'posts_per_page' => $per_page,
			'offset'=> $start,
			'meta_or_tax' => true,
			'meta_key'          => 'publication_date',
			'orderby'          => 'meta_value_num',
			'order'             => $_POST['sort_order'],
			'meta_query' => array(
				'relation' => 'OR', 
				$year_array,
				$author_query
			),
			'tax_query' => $tax_query
		);
		
		if($_POST['search_query'] != ''){
			$args = array(
				'post_type'=> 'publications',
				'post_status'=>'publish',
				's' => $_POST['search_query'],
				'paged' => $paged,
				'posts_per_page' => $per_page,
				'offset'=> $start,
				'meta_key'          => 'publication_date',
				'orderby'          => 'meta_value_num',
				'order'             => $_POST['sort_order'],
			);
		}

	$query = new WP_Query( $args );
	$totalPosts = $query->found_posts;
	ob_start();
	$response = '';
	if( $query->have_posts() ) :
		echo '<div id="timeline-content"><ul class="timeline">';
		while( $query->have_posts() ): $query->the_post();
		 $response .= get_template_part('template-parts/ajax','publications');	
		endwhile;
		echo '</ul></div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Publications';
	endif;


	$no_of_paginations = ceil($totalPosts / $per_page);

	if($totalPosts > $per_page){

		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	
		// Pagination Buttons logic     
		$pag_container .= "
		<div class='cvf-universal-pagination mb-5'>
			<ul class='custom-pagination d-flex align-items-center justify-content-center'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

		}
	}	
	die();
}


function add_cond_to_where( $where ) {

	//Replace showings_$ with repeater_slug_$
	$where = str_replace("meta_key = 'publication_author_$", "meta_key LIKE 'publication_author_%", $where);

	return $where;
}

add_filter('posts_where', 'add_cond_to_where');


 /**
 * Adding scripts for Blog
 */
function filters_blogs() {
	if( is_page( array( 'blogs' ) ) ){
	 wp_enqueue_script( 'blogs-ajax-script', get_template_directory_uri() . '/assets/js/blogs.js', array('jquery') );
	 wp_localize_script( 'blogs-ajax-script', 'blogs_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'filters_blogs' );


// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_blogs_ajax_function', 'blogs_ajax_function_call');
add_action('wp_ajax_nopriv_blogs_ajax_function', 'blogs_ajax_function_call');

 /**
  * Publications Blog 
  */
  function blogs_ajax_function_call(){
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	if(isset($_POST['page'])){
		/* Pagination vars */
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 12;

        $previous_btn = true;

        $next_btn = true;

        $first_btn = true;

		$last_btn = true;
	
		$start = $page * $per_page;

		/**
		 * This code is just to fetch the total posts for Training to help with pagination
		 */
		$totalPosts = count(get_posts(array(
			'post_type' => 'post',
			'post_status'=>'publish',
		)));

		if($_POST['author']){
			$author_query = array(
				array(
					'key'       => 'authors_$_author_link',
					'value'     => $_POST['author'],
					'compare'   => '='
				),
			);
		}else{
			$author_query = '';
		}

		if($_POST['year']){
			$year_array = array(
			array(
				'year'  => $_POST['year']
			),
		);
		}else{
			$year_array = '';
		}


		$args = array(
			'post_type'=> 'post',
			'post_status'=>'publish',
			'paged' => $paged,
			'date_query'=>$year_array,
			'posts_per_page' => $per_page,
			'offset'=> $start,
			'orderby' => 'publish_date',
			'order' => $_POST['sort_order'],
			'meta_query' => array(
				$author_query
			),
		);

		if($_POST['search_query'] != ''){
			$args = array(
				'post_type'=> 'post',
				'post_status'=>'publish',
				's' => $_POST['search_query'],
				'paged' => $paged,
				'posts_per_page' => $per_page,
				'offset'=> $start,
				'orderby' => 'publish_date',
				'order' => $_POST['sort_order'],
				'meta_query' => array(
					$author_query
				),
			);
	}
		
	$query = new WP_Query( $args );
	//echo $query->request;
	$totalPosts = $query->found_posts;
/* 	echo '<pre>';
	print_r($args);
	exit; */
	ob_start();
	$response = '';
	if( $query->have_posts() ) :
		echo '<div id="timeline-content"><ul class="timeline">';
		while( $query->have_posts() ): $query->the_post();
		 $response .= get_template_part('template-parts/ajax','blogs');	
		endwhile;
		echo '</ul></div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Blogs';
	endif;


	$no_of_paginations = ceil($totalPosts / $per_page);

	if($totalPosts > $per_page){

		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	
		// Pagination Buttons logic     
		$pag_container .= "
		<div class='cvf-universal-pagination mb-5'>
			<ul class='custom-pagination d-flex align-items-center justify-content-center'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

		}
	}	
	die();
}


function add_cond_to_where_2( $where ) {

	//Replace showings_$ with repeater_slug_$
	$where = str_replace("meta_key = 'authors_$", "meta_key LIKE 'authors_%", $where);

	return $where;
}

add_filter('posts_where', 'add_cond_to_where_2');


/////////





 /**
 * Adding scripts for Projects
 */
function filters_projects() {
	if( is_page( array( 'projects' ) ) ){
	 wp_enqueue_script( 'projects-ajax-script', get_template_directory_uri() . '/assets/js/projects.js', array('jquery') );
	 wp_localize_script( 'projects-ajax-script', 'projects_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'filters_projects' );


// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_projects_ajax_function', 'projects_ajax_function_call');
add_action('wp_ajax_nopriv_projects_ajax_function', 'projects_ajax_function_call');

 /**
  * Publications Blog 
  */
  function projects_ajax_function_call(){
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	if(isset($_POST['page'])){
		/* Pagination vars */
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 12;

        $previous_btn = true;

        $next_btn = true;

        $first_btn = true;

		$last_btn = true;
	
		$start = $page * $per_page;

		/**
		 * This code is just to fetch the total posts for Training to help with pagination
		 */
		$totalPosts = count(get_posts(array(
			'post_type' => 'projects',
			'post_status'=>'publish',
		)));

		if($_POST['author']){
			$author_query = array(
				array(
					'key'       => 'authors_$_author_link',
					'value'     => $_POST['author'],
					'compare'   => '='
				),
			);
		}else{
			$author_query = '';
		}

		if($_POST['year']){
			$year_array = array(
			array(
				'year'  => $_POST['year']
			),
		);
		}else{
			$year_array = '';
		}


		$args = array(
			'post_type'=> 'projects',
			'post_status'=>'publish',
			'paged' => $paged,
			'date_query'=>$year_array,
			'posts_per_page' => $per_page,
			'offset'=> $start,
			'orderby' => 'publish_date',
			'order' => $_POST['sort_order'],
			'meta_query' => array(
				$author_query
			),
		);

		if($_POST['search_query'] != ''){
			$args = array(
				'post_type'=> 'projects',
				'post_status'=>'publish',
				's' => $_POST['search_query'],
				'paged' => $paged,
				'posts_per_page' => $per_page,
				'offset'=> $start,
				'orderby' => 'publish_date',
				'order' => $_POST['sort_order'],
				'meta_query' => array(
					$author_query
				),
			);
	}
		
	$query = new WP_Query( $args );
	//echo $query->request;
	$totalPosts = $query->found_posts;
 	/* echo '<pre>';
	print_r($args);
	exit; */
	ob_start();
	$response = '';
	if( $query->have_posts() ) :
		echo '<div id="timeline-content"><ul class="timeline">';
		while( $query->have_posts() ): $query->the_post();
		 $response .= get_template_part('template-parts/ajax','blogs');	
		endwhile;
		echo '</ul></div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No Projects';
	endif;


	$no_of_paginations = ceil($totalPosts / $per_page);

	if($totalPosts > $per_page){

		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	
		// Pagination Buttons logic     
		$pag_container .= "
		<div class='cvf-universal-pagination mb-5'>
			<ul class='custom-pagination d-flex align-items-center justify-content-center'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

		}
	}	
	die();
}




////////////


 /**
 * Adding scripts for News
 */
function filters_news() {
	if( is_page( array( 'latest-news' ) ) ){
	 wp_enqueue_script( 'news-ajax-script', get_template_directory_uri() . '/assets/js/news.js', array('jquery') );
	 wp_localize_script( 'news-ajax-script', 'news_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'filters_news' );


// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_news_ajax_function', 'news_ajax_function_call');
add_action('wp_ajax_nopriv_news_ajax_function', 'news_ajax_function_call');

 /**
  * Publications Blog 
  */
  function news_ajax_function_call(){
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	if(isset($_POST['page'])){
		/* Pagination vars */
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 12;

        $previous_btn = true;

        $next_btn = true;

        $first_btn = true;

		$last_btn = true;
	
		$start = $page * $per_page;

		/**
		 * This code is just to fetch the total posts for Training to help with pagination
		 */
		$totalPosts = count(get_posts(array(
			'post_type' => 'news',
			'post_status'=>'publish',
		)));

		/* if($_POST['author']){
			$author_query = array(
				array(
					'key'       => 'authors_$_author_link',
					'value'     => $_POST['author'],
					'compare'   => '='
				),
			);
		}else{
			$author_query = '';
		} */

		if($_POST['FromDate'] || $_POST['ToDate']){
			$year_array = array(
				'relation' => 'OR',
				array(
					'key'     => 'published_date',
					'value'   => $_POST['FromDate'],
					'compare' => '>=',
					'type'    => 'DATE',
				),
				array(
					'key'     => 'published_date',
					'value'   => $_POST['ToDate'],
					'compare' => '<=',
					'type'    => 'DATE',
				),
			);
		}else{
			$year_array = '';
		}


	/* 	echo $_POST['FromDate'].'--------------'.$_POST['ToDate'];
		exit;  */
 

		$args = array(
			'post_type'=> 'news',
			'post_status'=>'publish',
			'paged' => $paged,
			'posts_per_page' => $per_page,
			'offset'=> $start,
			'orderby' => 'published_date',
			'order' => $_POST['sort_order'],
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => 'published_date',
					'value'   => $_POST['FromDate'],
					'compare' => '>=',
					'type'    => 'DATE',
				),
				array(
					'key'     => 'published_date',
					'value'   => $_POST['ToDate'],
					'compare' => '<=',
					'type'    => 'DATE',
				),
			),
		);
	 	
		if($_POST['search_query'] != ''){
			$args = array(
				'post_type'=> 'news',
				'post_status'=>'publish',
				's' => $_POST['search_query'],
				'paged' => $paged,
				'posts_per_page' => $per_page,
				'offset'=> $start,
				'orderby' => 'publish_date',
				'order' => $_POST['sort_order'],
				'meta_query' => array(
					$year_array
				),
			);
		}
		
	$query = new WP_Query( $args );
	$totalPosts = $query->found_posts;
	ob_start();
	$response = '';
	if( $query->have_posts() ) :
		echo '<div id="timeline-content"><ul class="timeline">';
		while( $query->have_posts() ): $query->the_post();
		 $response .= get_template_part('template-parts/ajax','news');	
		endwhile;
		echo '</ul></div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No News for selected range';
	endif;


	$no_of_paginations = ceil($totalPosts / $per_page);

	if($totalPosts > $per_page){

		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	
		// Pagination Buttons logic     
		$pag_container .= "
		<div class='cvf-universal-pagination mb-5'>
			<ul class='custom-pagination d-flex align-items-center justify-content-center'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-left.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img width='25' src='".get_template_directory_uri()."/assets/images/icn-chevron-right.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

		}
	}	
	die();
}
