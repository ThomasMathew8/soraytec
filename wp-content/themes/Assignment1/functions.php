
<?php

// Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );

// Load in our CSS
function wphierarchy_enqueue_styles() {

  wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Anton|Roboto:300,400,500,700&display=swap', [], '', 'all' );  
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['roboto'], time(), 'all' );
  wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', ['main-css'], time(), 'all' );
  wp_enqueue_style( 'all-min', get_stylesheet_directory_uri() . '/assets/css/all.min.css', [], time(), 'all' );
  wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/assets/css/animate.css', [], time(), 'all' );
  wp_enqueue_style( 'bootstrap-min-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', [], time(), 'all' );
  wp_enqueue_style( 'flexslider-css', get_stylesheet_directory_uri() . '/assets/css/flexslider.css', [], time(), 'all' );
  wp_enqueue_style( 'jquery-custom-scrollbar-css', get_stylesheet_directory_uri() . '/assets/css/jquery.mCustomScrollbar.css.css', [], time(), 'all' );

}
add_action( 'wp_enqueue_scripts', 'wphierarchy_enqueue_styles' );

//Load js themes 
function wphierarchy_enqueue_scripts() {

  wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], time(), true );
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', [], time(), true );
  wp_enqueue_script( 'jquery-min-js', get_stylesheet_directory_uri() . '/assets/js/jquery-3.4.1.min.js', [], time(), true );
  wp_enqueue_script( 'jquery-flexslider-js', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider.js', [], time(), true );
  wp_enqueue_script( 'custom-scrollbar-js', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', [], time(), true );
  wp_enqueue_script( 'waypoints-min-js', get_stylesheet_directory_uri() . '/assets/js/waypoints.min.js', [], time(), true );

}
add_action( 'wp_enqueue_scripts', 'wphierarchy_enqueue_scripts' );

// Register Menu Locations
// register_nav_menus( [
//   'main-menu' => esc_html__( 'Main Menu', 'wpheirarchy' ),
// ]);


// // Setup Widget Areas
// function wphierarchy_widgets_init() {
//   register_sidebar([
//     'name'          => esc_html__( 'Main Sidebar', 'wphierarchy' ),
//     'id'            => 'main-sidebar',
//     'description'   => esc_html__( 'Add widgets for main sidebar here', 'wphierarchy' ),
//     'before_widget' => '<section class="widget">',
//     'after_widget'  => '</section>',
//     'before_title'  => '<h2 class="widget-title">',
//     'after_title'   => '</h2>',
//   ]);
//   register_sidebar([
//     'name'          => esc_html__( 'Page Sidebar', 'wphierarchy' ),
//     'id'            => 'page-sidebar',
//     'description'   => esc_html__( 'Add widgets for page sidebar here', 'wphierarchy' ),
//     'before_widget' => '<section class="widget">',
//     'after_widget'  => '</section>',
//     'before_title'  => '<h2 class="widget-title">',
//     'after_title'   => '</h2>',
//   ]); 
//   register_sidebar([
//     'name'          => esc_html__( 'Front Page widgets', 'wphierarchy' ),
//     'id'            => 'front-page',
//     'description'   => esc_html__( 'Add widgets for Front Page sidebar here', 'wphierarchy' ),
//     'before_widget' => '<section class="widget">',
//     'after_widget'  => '</section>',
//     'before_title'  => '<h2 class="widget-title">',
//     'after_title'   => '</h2>',
//   ]); 
// }
// add_action( 'widgets_init', 'wphierarchy_widgets_init' );






?>