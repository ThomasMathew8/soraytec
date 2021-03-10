<?php 
/**
 * Template Name: Product
 * 
 * @package sorayatec
 */

get_header(); 
?> 


<!-- ==============================================
    **Banner**
    =================================================== -->
    <?php 
    if (get_field('banner')):
    ?>
    <div class="banner prdct-banner">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-4 left">
                    <p><?php echo wp_trim_words( get_field('banner')['banner_desc'], 15, '  .....'); ?></p>
                    <figure>
                        <img src="<?php echo get_field('banner')['left_img']['url']; ?>" alt=""/>
                    </figure>
                </div>
                <div class="col-md-8 right">
                    <figure>
                        <img src="<?php echo get_field('banner')['right_img']['url']; ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ==============================================
    **prdct-feature**
    =================================================== -->

    <section class="prdct-feature about-sec">

        <?php 
        if (have_rows('product_features')): while( have_rows('product_features') ) : the_row();
        ?>

        <div class="container">
            <div class="prdct-feature-header">
                <?php if(get_sub_field('title')): ?>
                <h2><?php echo strtoupper( get_sub_field('title') ); ?></h2>
                <?php endif ?>

                <?php if(get_sub_field('desc')): ?>
                <p><?php echo wp_trim_words( get_sub_field('desc'), 15, '  .....' ); ?></p>
                <?php endif ?>

            </div>

            <?php if( have_rows('features_loop') ): ?>
            <ul class="row prdct-feature-cnt">

                <?php:
                    while( have_rows('features_loop') ) : the_row();
                ?>

                    <li class="col-md-4 col-sm-6">
                        <?php if(get_sub_field('img')): ?>
                        <figure>
                            <img src="<?php echo get_sub_field('img')['url']; ?>" class="img-fluid" alt=""/>
                        </figure>
                        <?php endif; ?>

                        <?php if(get_sub_field('desc')): ?>
                        <p><?php echo wp_trim_words(get_sub_field('desc'), 10, '  .....'); ?></p>
                        <?php endif; ?>
                    </li>
                    
                <?php endwhile; ?>   
            </ul>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
        <div class="prdct-feature-bottom">
            <div class="container">
                <div class="row align-items-center">

                        <?php
                            $i=0;
                            if( have_rows('features_bottom') ):
                                while( have_rows('features_bottom') ) : the_row();
                                if($i%2==0):
                        ?>

                                <div class="col-md-6">
                                    <?php if(get_sub_field('img')): ?>
                                    <figure>
                                        <img src="<?php echo get_sub_field('img')['url']; ?>" class="img-fluid" alt=""/>
                                    </figure>
                                    <?php endif ?>
                                </div>
                            <?php
                            $i++;
                                else:
                            ?>

                                <div class="col-md-6 right">
                                    <?php if(get_sub_field('img')): ?>
                                    <figure>
                                        <img src="<?php echo get_sub_field('img')['url']; ?>" class="img-fluid" alt=""/>
                                    </figure>
                                    <?php endif ?>
                                </div>

                            <?php $i++; endif; endwhile; endif; ?>

                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ==============================================
    **application**
    =================================================== -->
    <section class="application">
                                
        <div class="container">
            <div class="row">

                <?php 
                if (have_rows('application')): while(have_rows('application')): the_row();
                ?>
                                    
                    <div class="col-md-6 left">
                        <?php if(get_sub_field('title')): ?>
                        <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                        <?php endif; ?>

                        <?php if( have_rows('application_points') ): ?>
                        <ul>
                        
                              <?php
                                while( have_rows('application_points') ) : the_row();
                              ?>
                                        <?php if(get_sub_field('application_point')): ?>
                                         <li><?php echo get_sub_field('application_point'); ?></li>
                                         <?php endif; ?>
                          
                                 <?php endwhile; ?>


                        </ul>
                        <?php endif; ?>

                        <?php if(get_sub_field('image')): ?>
                        <figure>
                            <img src="<?php echo get_sub_field('image')['url']; ?>" class="img-fluid" alt="" />
                        </figure>
                        <?php endif; ?>
                    </div>
                <?php endwhile; endif; ?>

                <div class="col-md-6 right">
                    <?php
                        if( have_rows('specification_box') ):
                        while( have_rows('specification_box') ) : the_row();
                        ?>

                            <div class="application-cnt">
                                <?php if(get_sub_field('title')): ?>
                                <h3><?php echo strtoupper(get_sub_field('title')); ?></h3>
                                <?php endif; ?>

                                <?php if( have_rows('rows') ): ?>
                                <ul>
                                    <?php
                                    while( have_rows('rows') ) : the_row();
                                    ?>
                                        <li>
                                            <div class="left-table">
                                                <?php if(get_sub_field('row_title')): ?>
                                                <h4><?php echo get_sub_field('row_title'); ?></h4>
                                                <?php endif; ?>
                                            </div>

                                            <div class="right-table">

                                                <?php
                                                if( have_rows('row_fields') ):
                                                while( have_rows('row_fields') ) : the_row();
                                                ?>
                                                    <?php if(get_sub_field('row_field')): ?>
                                                    <span><?php echo get_sub_field('row_field'); ?></span>
                                                    <?php endif; ?>

                                                <?php endwhile; endif; ?>    
                                            </div>

                                        </li>

                                    <?php endwhile; ?> 

                                </ul>
                                <?php endif; ?>
                            </div>
                            
                        <?php endwhile; endif; ?> 


                </div>
            </div>
        </div>
    </section>
    <!-- ==============================================
    **features-wrapper**
    =================================================== -->
    <section class="features-wrapper about-sec">
        <?php 
        if (have_rows('features')): while(have_rows('features')): the_row();
        ?>
        <div class="features-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left">
                        <?php if(get_sub_field('title')): ?>
                        <h2><?php echo strtoupper(get_sub_field('title')); ?></h2>
                        <?php endif; ?>

                        <?php if( have_rows('features_points') ): ?>
                        <ul>
                            <?php
                                    while( have_rows('features_points') ) : the_row();
                            ?>

                                <li><?php echo get_sub_field('features_point'); ?></li>

                                <?php endwhile; ?>  

                        </ul> 
                        <?php endif; ?>
                        
                    </div>
                    <div class="col-md-6 right">
                        <?php if(get_sub_field('img')): ?>
                        <figure>
                            <img src="<?php echo get_sub_field('img')['url']; ?>" class="img-fluid" alt="" />
                        </figure>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </section>
    
    <!-- ==============================================
    **contact-wrapper**
    =================================================== -->

    <section class="contact-wrapper">
        <?php if (have_rows('contact_product')): while(have_rows('contact_product')): the_row(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <?php if(get_sub_field('more_info_text')): ?>
                    <p><?php the_sub_field('more_info_text'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 right">
                        <?php if(get_sub_field('contact_title')): ?>
                        <h2><?php echo strtoupper(get_sub_field('contact_title')); ?></h2>
                        <?php endif; ?>
                        
                        <?php if(get_sub_field('contact_email')): ?>
                        <a href="mailto:<?php echo get_sub_field('contact_email'); ?>" class="mail"><?php echo get_sub_field('contact_email'); ?></a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </section>





<?php get_footer(); ?>