<?php
/**
 * sorayatec functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sorayatec
 */


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'soraytec_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function soraytec_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on soraytec, use a find and replace
		 * to change 'soraytec' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'soraytec', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'soraytec' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'soraytec_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

    /*******Register Menu Locations*******/
    register_nav_menus( [
      'main-menu' => esc_html__( 'Main Menu', 'sorayatec' ),
    ]);

	}
endif;
add_action( 'after_setup_theme', 'soraytec_setup' );


/*******De-registering wordpress's jQuery********/
add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
    wp_deregister_script('jquery');
}


/*******Loading CSS & JS*********/
function wphierarchy_enqueue_styles_scripts() {

  /*******Loading CSS*********/
  wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Anton|Roboto:300,400,500,700&display=swap', [], '', 'all' );  
  wp_enqueue_style( 'all-min', get_stylesheet_directory_uri() . '/assets/css/all.min.css', [], time(), 'all' );
  wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/assets/css/animate.css', [], time(), 'all' );
  wp_enqueue_style( 'bootstrap-min-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', [], time(), 'all' );
  wp_enqueue_style( 'flexslider-css', get_stylesheet_directory_uri() . '/assets/css/flexslider.css', [], time(), 'all' );
  wp_enqueue_style( 'bxslider-css', get_stylesheet_directory_uri() . '/assets/css/jquery.bxslider.css', [], time(), 'all' );
  wp_enqueue_style( 'jquery-custom-scrollbar-css', get_stylesheet_directory_uri() . '/assets/css/jquery.mCustomScrollbar.css', [], time(), 'all' );
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['roboto'], time(), 'all' );
  wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', ['main-css'], time(), 'all' );
  
  /*******Loading js themes*********/
  wp_enqueue_script( 'mailchimp-js', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js',[], time(), true );
  wp_enqueue_script( 'jquery-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery-3.4.1.min.js', [], time(), true );
  wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], time(), true );
  wp_enqueue_script( 'jquery-flexslider-js', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider.js', [], time(), true );
  wp_enqueue_script( 'custom-scrollbar-js', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), time(), true );
  wp_enqueue_script( 'waypoints-min-js', get_stylesheet_directory_uri() . '/assets/js/waypoints.min.js', [], time(), true );
  wp_enqueue_script( 'bxslider-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', [], time(), true );
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js',[], time(), true );

}
add_action( 'wp_enqueue_scripts', 'wphierarchy_enqueue_styles_scripts' );


/********Adding bootstrap-navwalker*********/
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/*******Custom Post Type Start*******/
function custom_post_type_init() {

  /*******CPT-History start*******/
    //News label
     $labels4 = array(
    'name' => __('History', 'Sorayatec'),
    'singular_name' => __('History', 'Sorayatec'),
    'add_new' => __('Add New Year', 'Sorayatec'),
    'add_new_item' => __('Add New Year', 'Sorayatec'),
    'edit_item' => __('Edit Year', 'Sorayatec'),
    'new_item' => __('New Year', 'Sorayatec'),
    'all_items' => __('All years', 'Sorayatec'),
    'view_item' => __('View Histories', 'Sorayatec'),
    'search_items' => __('Search Year', 'Sorayatec'),
    'not_found' =>  __('No Year Found', 'Sorayatec'),
    'not_found_in_trash' => __('No year found in Trash', 'Sorayatec'), 
    'parent_item_colon' => '',
    'menu_name' => __('history'),
    );

    // register post type
    $args4 = array(
      'labels' => $labels4,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'history'),
      'query_var' => true,
      'menu_icon' => 'dashicons-backup',
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'trackbacks',
          'custom-fields',
          'comments',
          'revisions',
          'thumbnail',
          'author',
          'page-attributes'
      )
    );
    register_post_type( 'history', $args4 );
  /*******CPT-History end*******/

  /*******CPT-News start*******/
    //News label
    $labels5 = array(
    'name' => __('News', 'Sorayatec'),
    'singular_name' => __('News', 'Sorayatec'),
    'add_new' => __('Add New News', 'Sorayatec'),
    'add_new_item' => __('Add New News', 'Sorayatec'),
    'edit_item' => __('Edit News', 'Sorayatec'),
    'new_item' => __('New News', 'Sorayatec'),
    'all_items' => __('All News', 'Sorayatec'),
    'view_item' => __('View News', 'Sorayatec'),
    'search_items' => __('Search News', 'Sorayatec'),
    'not_found' =>  __('No News Found', 'Sorayatec'),
    'not_found_in_trash' => __('No News found in Trash', 'Sorayatec'), 
    'parent_item_colon' => '',
    'menu_name' => __('News', 'Sorayatec'),
    );

    // register post type
    $args5 = array(
      'labels' => $labels5,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'news'),
      'query_var' => true,
      'menu_icon' => 'dashicons-media-interactive',
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'trackbacks',
          'custom-fields',
          'comments',
          'revisions',
          'thumbnail',
          'author',
          'page-attributes'
      )
    );
    register_post_type( 'news', $args5 );
  /*******CPT-News end*******/
}
add_action( 'init', 'custom_post_type_init' );
/*******Custom Post Type End*******/


 /*******Adding Header Footer Options page*******/
 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


/**********URL Redirecting for search_form in 404 page*********/
 function search_url_rewrite() {

    if ( is_search() && ! empty( $_GET['s'] ) ) {

      wp_redirect( home_url( "/" ) . urlencode( get_query_var( 's' ) ) );
      exit();
      
    }	
  
}
add_action( 'template_redirect', 'search_url_rewrite' );