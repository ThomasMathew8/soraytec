<?php 
/**
 * The template for showing Front page
 *
 * @package sorayatec
 */
get_header(); 
?> 

<div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

      <?php if( $acf_label ) : ?>

        <!-- ==============================================
    **Banner**
    =================================================== -->
    <?php 
    $primary = get_field( 'primary_info' );
    ?> 
    
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h1><?php echo strtoupper($primary['primary_info_title']); ?></h1>
                     <p><?php echo wp_trim_words( $primary['primary_info_desc'], 100, '  .....'); ?></p>

                </div>
                <div class="col-md-6 right">
                    <figure>
                        <img src="<?php echo $primary[ 'primary_info_img' ]['url']; ?>" >
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
            ?>

            <div class="vision">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 order-md-1">
                            <div class="inner">

                                <h2><?php echo strtoupper($even['aim_title']); ?></h2>
                                <p><?php echo wp_trim_words( $even['aim_desc'], 25, '  .....'); ?></p>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo $even[ 'aim_img' ]['url']; ?>" class="rounded-circle" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php $i++;else: ?>

            <?php 
            $odd = get_field( 'aims' );
            ?>
            <div class="vision mission">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 text-right">
                            <div class="inner">

                                <h2><?php echo strtoupper($odd['aim_title']); ?></h2>
                                <p><?php echo wp_trim_words( $odd['aim_desc'], 25, '  .....'); ?></p>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo $odd['aim_img']['url'];?>" class="rounded-circle" alt=""></figure>
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
            <h2><?php echo strtoupper(get_field('ecosystem_title')); ?></h2>
            <ul class="row logos-list">
            
                <?php
                while ( $loop->have_posts() ) : $loop->the_post(); 
                
                $ecosystem = get_field( 'ecosystem_links' );
                
                ?> 
                        <li class="col-sm-6 col-md-4">
                            <a href="<?php echo $ecosystem[ 'link_url' ]; ?>" target="_blank">
                            <img src="<?php echo $ecosystem[ 'link_img' ]['url']; ?>" alt="">
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
 
    
    <section class="signup-sec">
        <div class="container">
            <div class="inner form-inline signup-form">
                
                <?php get_template_part( 'template-parts/content', 'signup' ); ?>

            </div>
        </div>
    </section>


    </main>

</div>

<?php else:

    get_template_part( 'template-parts/acf', 'none'); 

 endif;?> 

<?php 
get_footer();
