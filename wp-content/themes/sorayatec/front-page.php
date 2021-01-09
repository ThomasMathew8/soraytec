<?php get_header(); ?> 

<div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <!-- ==============================================
    **Banner**
    =================================================== -->
    
    <?php 
    $primary = get_field( 'primary_info' );
    $primary_img = $primary[ 'primary_info_img' ];
    ?> 
    
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $primary['primary_info_title']; ?></h1>
                    <p><?php echo $primary['primary_info_desc']; ?></p>
                </div>
                <div class="col-md-6 right">
                    <figure>
                        <img src="<?php echo $primary_img['url']; ?>" >
                    </figure>
                </div>
            </div>
        </div> 
    </div>

    <!-- ==============================================
    **About**
    =================================================== -->
    
    <?php 
    $loop = new WP_Query( array(
        'post_type' => 'aims',
        'posts_per_page' => -1,
        'order' => 'ASC'
    )
    );
    $i=0;
    if ( $loop->have_posts() ): ?>
    
     <section class="about-sec">

     <?php  while ( $loop->have_posts() ) : $loop->the_post();if($i%2==0):
            
            $even = get_field( 'aims' );
            $even_img = $even[ 'aim_img' ];
            ?>

            <div class="vision">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 order-md-1">
                            <div class="inner">
                                <h2><?php echo $even['aim_title']; ?></h2>
                                <p><?php echo $even['aim_desc']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo $even_img['url']; ?>" class="rounded-circle" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php $i++;else: ?>

            <?php 
            $odd = get_field( 'aims' );
            $odd_img = $odd[ 'aim_img' ];
            ?>
            <div class="vision mission">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 text-right">
                            <div class="inner">
                                <h2><?php echo $odd['aim_title']; ?></h2>
                                <p><?php echo $odd['aim_desc']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo $odd_img['url'];?>" class="rounded-circle" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php  $i++;endif;endwhile; ?>
        
     </section>

    <?php endif; wp_reset_query(); ?> 

    <!-- ==============================================
    **Soraytec Ecosystem**
    =================================================== -->
    
    <?php 
    $loop = new WP_Query( array(
        'post_type' => 'ecosystem',
        'posts_per_page' => -1,
        'order' => 'ASC'
    )
    );
    if ( $loop->have_posts() ): ?>

    <section class="soraytec-ecosystem">
        <div class="container">
            <h2><?php echo get_field('ecosystem_title'); ?></h2>
            <ul class="row logos-list">
            
                <?php
                while ( $loop->have_posts() ) : $loop->the_post(); 
                
                $ecosystem = get_field( 'ecosystem_links' );
                
                $ecosystem_img = $ecosystem[ 'link_img' ];
                ?> 
                        <li class="col-sm-6 col-md-4">
                            <a href="<?php echo $ecosystem[ 'link_url' ]; ?>" target="_blank">
                            <img src="<?php echo $ecosystem_img['url']; ?>" alt="">
                            </a>
                        </li>
                <?php endwhile; ?> 

            </ul>       
        </div>
    </section>     

    <?php endif; wp_reset_query(); ?>   

    <!-- ==============================================
    **Signup Newsletter**
    =================================================== -->
    <?php 
    $signup = get_field( 'signup' );
    ?>
    
    <section class="signup-sec">
        <div class="container">
            <div class="inner">
                <h2><?php echo $signup['signup_text']; ?></h2>
                <form class="form-inline signup-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo $signup['placeholder_text']; ?>">
                    </div>
                    <button type="submit" class="btn btn-signup"><?php echo $signup['button_text']; ?></button>
                </form>
            </div>
        </div>
    </section>


    </main>

</div>

<?php get_footer(); ?>