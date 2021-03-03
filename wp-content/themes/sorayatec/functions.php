<?php
/**
 * sorayatec functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sorayatec
 */

 
/*******Add Theme Support*******/
if ( ! function_exists( 'sorayatec_setup' ) ) :
  function sorayatec_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
    add_theme_support('html5',
                        array(
                          'comment-form',
                          'comment-list',
                          'gallery',
                          'caption',
                          'script',
                          'style',
                          'navigation-widgets',
                        )
                      );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'starter-content' );
  }
endif;
add_action( 'after_setup_theme', 'sorayatec_setup' );


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
  wp_enqueue_script( 'jquery-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery-3.4.1.min.js', [], time(), true );
  wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], time(), true );
  wp_enqueue_script( 'jquery-flexslider-js', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider.js', [], time(), true );
  wp_enqueue_script( 'custom-scrollbar-js', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), time(), true );
  wp_enqueue_script( 'waypoints-min-js', get_stylesheet_directory_uri() . '/assets/js/waypoints.min.js', [], time(), true );
  wp_enqueue_script( 'bxslider-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', [], time(), true );
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js',[], time(), true );

}
add_action( 'wp_enqueue_scripts', 'wphierarchy_enqueue_styles_scripts' );


/*******Register Menu Locations*******/
 register_nav_menus( [
  'main-menu' => esc_html__( 'Main Menu', 'sorayatec' ),
 ]);


/********Adding bootstrap-navwalker*********/
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/*******Custom Post Type Start*******/
function custom_post_type_init() {

  /*******CPT-Ecosystem start*******/
    //ecosystem labels
    $labels = array(
        'name' => 'Ecosystem Links',
        'singular_name' => 'Ecosystem Link',
        'add_new' => 'Add New Ecosystem Link',
        'add_new_item' => 'Add New Ecosystem Link',
        'edit_item' => 'Edit Ecosystem Link',
        'new_item' => 'New Ecosystem Link',
        'all_items' => 'All Ecosystem Links',
        'view_item' => 'View Ecosystem Links',
        'search_items' => 'Search Ecosystem Links',
        'not_found' =>  'No Ecosystem Links Found',
        'not_found_in_trash' => 'No Ecosystem Links found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Ecosystem',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'ecosystem'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
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
    register_post_type( 'ecosystem', $args );
  /*******CPT-Ecosystem end*******/
   
  /*******CPT-Aims start*******/
    //Aims label
    $labels1 = array(
        'name' => 'Aims',
        'singular_name' => 'Aim',
        'add_new' => 'Add New Aim',
        'add_new_item' => 'Add New Aim',
        'edit_item' => 'Edit Aim',
        'new_item' => 'New Aim',
        'all_items' => 'All Aims',
        'view_item' => 'View Aim',
        'search_items' => 'Search Aims',
        'not_found' =>  'No Aims Found',
        'not_found_in_trash' => 'No Aims found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Aims',
    );

    // register post type
    $args1 = array(
        'labels' => $labels1,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'aims'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
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
    register_post_type( 'aims', $args1 );
  /*******CPT-Aims end*******/

  /*******CPT-Team start*******/ 
    //Team label
    $labels2 = array(
      'name' => 'Team Members',
      'singular_name' => 'Team Member',
      'add_new' => 'Add New Team Member',
      'add_new_item' => 'Add New Team Member',
      'edit_item' => 'Edit Team Member',
      'new_item' => 'New Team Member',
      'all_items' => 'All Team Members',
      'view_item' => 'View Team Member',
      'search_items' => 'Search Team Members',
      'not_found' =>  'No Team Member Found',
      'not_found_in_trash' => 'No Team Member found in Trash', 
      'parent_item_colon' => '',
      'menu_name' => 'team',
    );

    // register post type
    $args2 = array(
      'labels' => $labels2,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'team'),
      'query_var' => true,
      'menu_icon' => 'dashicons-randomize',
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
    register_post_type( 'team', $args2 );
  /*******CPT-Team end*******/

  /*******CPT-History start*******/
    //News label
    $labels4 = array(
      'name' => 'History',
      'singular_name' => 'History',
      'add_new' => 'Add New Year',
      'add_new_item' => 'Add New Year',
      'edit_item' => 'Edit Year',
      'new_item' => 'New Year',
      'all_items' => 'All years',
      'view_item' => 'View Histories',
      'search_items' => 'Search Year',
      'not_found' =>  'No Year Found',
      'not_found_in_trash' => 'No year found in Trash', 
      'parent_item_colon' => '',
      'menu_name' => 'history',
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
      'menu_icon' => 'dashicons-randomize',
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
      'name' => 'News',
      'singular_name' => 'News',
      'add_new' => 'Add New News',
      'add_new_item' => 'Add New News',
      'edit_item' => 'Edit News',
      'new_item' => 'New News',
      'all_items' => 'All News',
      'view_item' => 'View News',
      'search_items' => 'Search News',
      'not_found' =>  'No News Found',
      'not_found_in_trash' => 'No News found in Trash', 
      'parent_item_colon' => '',
      'menu_name' => 'News',
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
      'menu_icon' => 'dashicons-randomize',
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


/*******Setting Up Site Logo*******/
function sorayatec_site_logo_setup() {
  $defaults = array(
  'height'      => 100,
  'width'       => 400,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
 'unlink-homepage-logo' => true, 
  );
  add_theme_support( 'site-logo', $defaults );
 }
 add_action( 'after_setup_theme', 'sorayatec_site_logo_setup' );




 /*******Adding Header Footer Customizer*******/
 require get_template_directory() . '/inc/headerfooter-customizer.php';
 new HeaderFooter_Customizer();