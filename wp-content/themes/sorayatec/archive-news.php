<?php 
/**
 * The template for displaying archive page for News CPT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sorayatec
 */

get_header(); 
?> 

<?php 

    if( $acf_label) :

    $loop = new WP_Query( array(
        'post_type' => 'news',
        'posts_per_page' => -1,
        'order' => 'ASC'
    )
    );
    if ( $loop->have_posts() ): ?>

   <section class="inner-outer posts-outer">

            <?php
            $i=0;
            while ( $loop->have_posts() ) : $loop->the_post();                 
            $img = get_field( 'news_img' );
            if ($i!=1): 
            ?> 
            <div class="top-post">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 order-lg-2">
                            <figure>
                                <img src="<?php echo $img['url']; ?>" class="img-fluid" alt="">
                            </figure>
                        </div>
                        <div class="col-lg-4 left">
                            <h1><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h1>
                            <div class="source">
                                <span><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                            </div>
                            <?php echo the_excerpt(); ?>
                            <ul class="follow-us">

                            <?php
                                if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' )):
                                    if( have_rows('follow') ):
                                    while( have_rows('follow') ) : the_row();
                                    ?>

                                        <li><a href="<?php echo the_sub_field( 'link' ); ?>" target="_blank"><i class="<?php echo the_sub_field( 'icon_class' ); ?>"></i></a></li>
                                    
                                    <?php endwhile; endif; ?>                             
                                <?php else:?>

                                    <div class="container">

                                        <h3 class="entry-header"><?php _e('Please Install ACF PRO Plugin!', 'Sorayatec'); ?></h3>

                                    </div>   

                                <?php endif;?> 

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         <?php $i++; ?>

        <!-- ==============================================
        **Posts**
        =================================================== -->
        <?php else: ?>
                <div class="container">
                    <ul class="post-lists">
                        <li class="row">
                            <div class="col-md-4">
                                <figure><img src="<?php echo $img['url']; ?>" alt=""></figure>
                            </div>
                            <div class="col-md-8">
                                <h1><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h1>
                                <span class="date"><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                                <p><?php echo the_excerpt(); ?></p>
                                <ul class="follow-us">
                                
                                <?php
                                if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' )):
                                    if( have_rows('follow') ):
                                    while( have_rows('follow') ) : the_row();
                                    ?>

                                        <li><a href="<?php echo the_sub_field( 'link' ); ?>" target="_blank"><i class="<?php echo the_sub_field( 'icon_class' ); ?>"></i></a></li>
                                    
                                    <?php endwhile; endif; ?>                             
                                <?php else:?>

                                    <div class="container">

                                        <h3 class="entry-header"><?php _e('Please Install ACF PRO Plugin!', 'Sorayatec'); ?></h3>

                                    </div>   

                                <?php endif;?>
                                
                                </ul>
                            </div>
                        </li>
                    
                    </ul>
                </div>

        <?php endif; endwhile; ?>
    </section>

    <?php endif; wp_reset_query();?>

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

<?php else:

get_template_part( 'template-parts/acf', 'none'); 

endif;?> 

<?php
get_footer();