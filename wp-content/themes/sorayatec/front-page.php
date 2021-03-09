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

    $i=0;
    if( have_rows('aims') ):?>
    
     <section class="about-sec">

     <?php   while( have_rows('aims') ) : the_row();if($i%2==0):
            

            ?>

            <div class="vision">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 order-md-1">
                            <div class="inner">

                                <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                                <p><?php echo wp_trim_words( get_sub_field('desc'), 25, '  .....'); ?></p>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo get_sub_field('image')['url']; ?>" class="rounded-circle" alt=""></figure>
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

                                <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                                <p><?php echo wp_trim_words( get_sub_field('desc'), 25, '  .....'); ?></p>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo get_sub_field('image')['url'];?>" class="rounded-circle" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php  $i++;endif;endwhile; ?>
        
     </section>

    <?php endif; ?> 

    <!-- ==============================================
    **Soraytec Ecosystem**
    =================================================== -->
    
    <?php 
    if( have_rows('ecosystem') ): while ( have_rows('ecosystem') ) : the_row();  ?>

    <section class="soraytec-ecosystem">
        <div class="container">
            <h2><?php echo strtoupper(get_sub_field('ecosystem_title')); ?></h2>
            <ul class="row logos-list">
            
                <?php
                if( have_rows('ecosystem_links' ) ): while ( have_rows('ecosystem_links')) : the_row(); 
                
                ?> 
                        <li class="col-sm-6 col-md-4">
                            <a href="<?php echo get_sub_field( 'link' ); ?>" target="_blank">
                            <img src="<?php echo get_sub_field( 'logo' )['url']; ?>" alt="">
                            </a>
                        </li>
                <?php endwhile; endif; ?> 

            </ul>       
        </div>
    </section>     

    <?php endwhile; endif; ?>   

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


<?php 
get_footer();
