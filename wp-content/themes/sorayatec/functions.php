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
      'name' => __('Ecosystem Links', 'Sorayatec'),
      'singular_name' => __('Ecosystem Link', 'Sorayatec'),
      'add_new' => __('Add New Ecosystem Link', 'Sorayatec'),
      'add_new_item' => __('Add New Ecosystem Link', 'Sorayatec'),
      'edit_item' => __('Edit Ecosystem Link', 'Sorayatec'),
      'new_item' => __('New Ecosystem Link', 'Sorayatec'),
      'all_items' => __('All Ecosystem Links', 'Sorayatec'),
      'view_item' => __('View Ecosystem Links', 'Sorayatec'),
      'search_items' => __('Search Ecosystem Links', 'Sorayatec'),
      'not_found' =>  __('No Ecosystem Links Found', 'Sorayatec'),
      'not_found_in_trash' => __('No Ecosystem Links found in Trash', 'Sorayatec'), 
      'parent_item_colon' => '',
      'menu_name' => __('Ecosystem', 'Sorayatec'),
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
    'name' => __('Aims', 'Sorayatec'),
    'singular_name' => __('Aim', 'Sorayatec'),
    'add_new' => __('Add New Aim', 'Sorayatec'),
    'add_new_item' => __('Add New Aim', 'Sorayatec'),
    'edit_item' => __('Edit Aim', 'Sorayatec'),
    'new_item' => __('New Aim', 'Sorayatec'),
    'all_items' => __('All Aims', 'Sorayatec'),
    'view_item' => __('View Aim', 'Sorayatec'),
    'search_items' => __('Search Aims', 'Sorayatec'),
    'not_found' =>  __('No Aims Found', 'Sorayatec'),
    'not_found_in_trash' => __('No Aims found in Trash', 'Sorayatec'), 
    'parent_item_colon' => '',
    'menu_name' => __('Aims', 'Sorayatec'),
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
    'name' => __('Team Members', 'Sorayatec'),
    'singular_name' => __('Team Member', 'Sorayatec'),
    'add_new' => __('Add New Team Member', 'Sorayatec'),
    'add_new_item' => __('Add New Team Member', 'Sorayatec'),
    'edit_item' => __('Edit Team Member', 'Sorayatec'),
    'new_item' => __('New Team Member', 'Sorayatec'),
    'all_items' => __('All Team Members', 'Sorayatec'),
    'view_item' => __('View Team Member', 'Sorayatec'),
    'search_items' => __('Search Team Members', 'Sorayatec'),
    'not_found' =>  __('No Team Member Found', 'Sorayatec'),
    'not_found_in_trash' => __('No Team Member found in Trash', 'Sorayatec'), 
    'parent_item_colon' => '',
    'menu_name' => __('team', 'Sorayatec'),
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