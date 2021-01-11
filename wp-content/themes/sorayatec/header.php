

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
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

                <?php 
                $logo = get_field( 'header_logo' );
                ?>

                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
                }
                ?>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                


                 <!-- <div class="navbar-collapse collapse" id="navbarCollapse"> -->


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

