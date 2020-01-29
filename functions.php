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
	 * Note that this function is hooked into the after_setup_theme hook, which
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

	//Slick
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), false);
	wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), false);
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '20151217', true );


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
			'has_archive' => true,
			//'menu_icon'           => get_template_directory_uri().'/assets/images/upcoming-trainings.svg',
            'rewrite' => array('slug' => 'trainings'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


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
	wp_enqueue_script( 'about-ajax-script', get_template_directory_uri() . '/assets/js/about.js', array('jquery') );
	wp_localize_script( 'about-ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'filters_training' );

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_training_calendar_function', 'training_calendar_function');
add_action('wp_ajax_nopriv_training_calendar_function', 'training_calendar_function');


function training_calendar_function(){

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	if(isset($_POST['page'])){
		/* Pagination vars */
		$page = sanitize_text_field($_POST['page']);

		$cur_page = $page;

		$next_page = $cur_page + 1;

        $page -= 1;

        $per_page = 1;

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
		echo '<div class="row">';
		while( $query->have_posts() ): $query->the_post();
		$response .= get_template_part('template-parts/training','calendar');			
		endwhile;
		echo '</div>';
		wp_reset_postdata(); wp_reset_query();
	else :
		echo 'No parts found';
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
			<ul class='custom-pagination'>";
	
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<li onClick='changePage(this)' p='$pre' class='active mr-0'><img src='".get_template_directory_uri()."/assets/images/left-page.svg'/></li>";
		} else if ($previous_btn) {
			$pag_container .= "<li  class='inactive mr-0'><img src='".get_template_directory_uri()."/assets/images/left-page.svg'/></li>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
	
			if ($cur_page == $i)
				$pag_container .= "<li onClick='changePage(this)' p='$i' class = 'selected' >{$i}</li>";
			else
				$pag_container .= "<li  onClick='changePage(this)' p='$i' class='active'>{$i}</li>";
		}
	
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<li onClick='changePage(this)' p='$nex' class='active'><img src='".get_template_directory_uri()."/assets/images/right-page.svg'/></li>";
		} else if ($next_btn) {
			$pag_container .= "<li  class='inactive'><img src='".get_template_directory_uri()."/assets/images/right-page.svg'/></li>";
		}
	
	
		$pag_container = $pag_container . "
			</ul>
		</div>";
	
		// We echo the final output
		echo '<hr class="pagination-separator"/><div class = "cvf-pagination-nav">' . $pag_container . '</div>';

	}
	
	}

	die();
}

add_shortcode('training_calendar', 'training_calendar_function'); 