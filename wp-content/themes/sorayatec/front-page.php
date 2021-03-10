<?php 
/**
 * The template for showing Front page
 *
 * @package sorayatec
 */
get_header(); 
?> 

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
                    <?php if(get_field( 'primary_info' )['primary_info_title']): ?>
                    <h1><?php echo strtoupper(get_field( 'primary_info' )['primary_info_title']); ?></h1>
                    <?php endif; ?>

                    <?php if(get_field( 'primary_info' )['primary_info_desc']): ?>
                    <p><?php echo wp_trim_words( get_field( 'primary_info' )['primary_info_desc'], 100, '  .....'); ?></p>
                    <?php endif; ?>

                </div>
                <div class="col-md-6 right">
                    <?php if(get_field( 'primary_info' )[ 'primary_info_img' ]): ?>
                    <figure>
                        <img src="<?php echo get_field( 'primary_info' )[ 'primary_info_img' ]['url']; ?>" >
                    </figure>
                    <?php endif; ?>
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
                                <?php if(get_sub_field('title')): ?>
                                <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                                <?php endif; ?>

                                <?php if(get_sub_field('desc')): ?>
                                <p><?php echo wp_trim_words( get_sub_field('desc'), 25, '  .....'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <?php if(get_sub_field('image')): ?>
                            <figure><img src="<?php echo get_sub_field('image')['url']; ?>" class="rounded-circle" alt=""></figure>
                            <?php endif; ?>
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
                                <?php if(get_sub_field('title')): ?>
                                <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                                <?php endif; ?>

                                <?php if(get_sub_field('desc')): ?>
                                <p><?php echo wp_trim_words( get_sub_field('desc'), 25, '  .....'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <?php if(get_sub_field('image')): ?>
                            <figure><img src="<?php echo get_sub_field('image')['url'];?>" class="rounded-circle" alt=""></figure>
                            <?php endif; ?>
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

            <?php if( have_rows('ecosystem_links' ) ): ?>
            <ul class="row logos-list">
            
                <?php
                 while ( have_rows('ecosystem_links')) : the_row(); 
                
                ?> 
                        <li class="col-sm-6 col-md-4">
                            <?php if(get_sub_field('link')): ?>
                            <a href="<?php echo get_sub_field( 'link' ); ?>" target="_blank">
                            <?php if(get_sub_field('logo')): ?>
                            <img src="<?php echo get_sub_field( 'logo' )['url']; ?>" alt="">
                            <?php endif; ?> 
                            </a>
                            <?php endif; ?> 
                        </li>
                <?php endwhile; ?> 

            </ul>  
            <?php endif; ?>     
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

<?php 
get_footer();
