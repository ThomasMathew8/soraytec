<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sorayatec
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="main">

     <!-- ==============================================
    **Header**
    =================================================== -->
    <header class="header">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">

                <?php if(get_field('header_logo', 'option')): ?>
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('header_logo', 'option')['url']; ?>" alt="">
                    </a>
                <?php endif; ?>
                    
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                        <?php 
                        $args = [
                            'theme_location' => 'main-menu',
                            'menu_class'        => "navbar-nav ml-auto",
                            'container'         => "div",
                            'container_class'   => "navbar-collapse collapse",
                            'container_id'      => "navbarCollapse",
                            'walker'            => new WP_Bootstrap_Navwalker()
                            ];
                        wp_nav_menu( $args ); 
                        ?>
    
           </div>
        </nav>
    </header>

