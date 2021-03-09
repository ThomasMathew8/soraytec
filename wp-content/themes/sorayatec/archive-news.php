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


    if ( have_posts() ): ?>

   <section class="inner-outer posts-outer">

            <?php
            $i=0;
            while ( have_posts() ) : the_post();                 
            if ($i!=1): 
            ?> 
            <div class="top-post">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 order-lg-2">
                            <figure>
                                <img src="<?php echo get_field( 'news_img' )['url']; ?>" class="img-fluid" alt="">
                            </figure>
                        </div>
                        <div class="col-lg-4 left">
                            <h1><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="source">
                                <span><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                            </div>
                            <p><?php echo wp_trim_words( get_the_content(), 20, '  .....'); ?></p>
                            <ul class="follow-us">

                            <?php                       
                                    if( have_rows('follow') ):
                                    while( have_rows('follow') ) : the_row();
                                    ?>

                                        <li><a href="<?php the_sub_field( 'link' ); ?>" target="_blank"><i class="<?php the_sub_field( 'icon_class' ); ?>"></i></a></li>
                                    
                                    <?php endwhile; endif; ?>                             

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
                                <figure><img src="<?php echo get_field( 'news_img' )['url']; ?>" alt=""></figure>
                            </div>
                            <div class="col-md-8">
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <span class="date"><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                                <p><?php echo wp_trim_words( get_the_content(), 20, '  .....'); ?></p>
                                <ul class="follow-us">
                                
                                <?php
                                    if( have_rows('follow') ):
                                    while( have_rows('follow') ) : the_row();
                                    ?>

                                        <li><a href="<?php the_sub_field( 'link' ); ?>" target="_blank"><i class="<?php the_sub_field( 'icon_class' ); ?>"></i></a></li>
                                    
                                    <?php endwhile; endif; ?>                             
                                
                                </ul>
                            </div>
                        </li>
                    
                    </ul>
                </div>

        <?php endif; endwhile; ?>
    </section>

    <?php endif; ?>

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