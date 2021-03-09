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
    $banner = get_field('banner');
    if (!empty($banner)):
    ?>
    <div class="banner prdct-banner">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-4 left">
                    <p><?php echo wp_trim_words( $banner['banner_desc'], 15, '  .....'); ?></p>
                    <figure>
                        <img src="<?php echo $banner['left_img']['url']; ?>" alt=""/>
                    </figure>
                </div>
                <div class="col-md-8 right">
                    <figure>
                        <img src="<?php echo $banner['right_img']['url']; ?>" alt="">
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
        $feature = get_field('product_features');
        if (!empty($feature)):
        ?>

        <div class="container">
            <div class="prdct-feature-header">

                <h2><?php echo strtoupper($feature['title']); ?></h2>
                <p><?php echo wp_trim_words( $feature['desc'], 15, '  .....'); ?></p>

            </div>
            <ul class="row prdct-feature-cnt">

                <?php:
                    if( have_rows('features_loop') ):
                    while( have_rows('features_loop') ) : the_row();
                    $img = get_sub_field('img');
                ?>

                    <li class="col-md-4 col-sm-6">
                        <figure>
                            <img src="<?php echo $img['url']; ?>" class="img-fluid" alt=""/>
                        </figure>
                        <p><?php echo wp_trim_words(get_sub_field('desc'), 10, '  .....'); ?></p>
                    </li>
                    
                <?php 
                endwhile; endif; 
                ?>   
            </ul>
        </div>
        <?php endif; ?>
        <div class="prdct-feature-bottom">
            <div class="container">
                <div class="row align-items-center">

                        <?php
                            $i=0;
                            if( have_rows('features_bottom') ):
                                while( have_rows('features_bottom') ) : the_row();
                                $img = get_sub_field('img');
                                if($i%2==0):
                        ?>

                                <div class="col-md-6">
                                    <figure>
                                        <img src="<?php echo $img['url']; ?>" class="img-fluid" alt=""/>
                                    </figure>
                                </div>
                            <?php
                            $i++;
                                else:
                            ?>

                                <div class="col-md-6 right">
                                    <figure>
                                        <img src="<?php echo $img['url']; ?>" class="img-fluid" alt=""/>
                                    </figure>
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
                $application = get_field('application');
                if (!empty($application)):
                ?>
                                    
                    <div class="col-md-6 left">
                        <h2><?php echo strtoupper($application['title']); ?></h2>
                        <ul>
                        
                              <?php
                                  if( have_rows('application_points') ):
                                      while( have_rows('application_points') ) : the_row();
                              ?>

                                         <li><?php echo get_sub_field('application_point'); ?></li>
                          
                                 <?php endwhile; endif; ?>


                        </ul>
                        <figure>
                            <img src="<?php echo $application['image']['url']; ?>" class="img-fluid" alt="" />
                        </figure>
                    </div>
                <?php endif; ?>
                <div class="col-md-6 right">
                    <?php
                        if( have_rows('specification_box') ):
                        while( have_rows('specification_box') ) : the_row();
                        ?>

                            <div class="application-cnt">
                                <h3><?php echo strtoupper(get_sub_field('title')); ?></h3>
                                <ul>
                                    <?php
                                    if( have_rows('rows') ):
                                    while( have_rows('rows') ) : the_row();
                                    ?>
                                        <li>
                                            <div class="left-table">
                                                <h4><?php echo get_sub_field('row_title'); ?></h4>
                                            </div>

                                            <div class="right-table">

                                                <?php
                                                if( have_rows('row_fields') ):
                                                while( have_rows('row_fields') ) : the_row();
                                                ?>

                                                    <span><?php echo get_sub_field('row_field'); ?></span>

                                                <?php endwhile; endif; ?>    
                                            </div>

                                        </li>

                                    <?php endwhile; endif; ?> 

                                </ul>
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
        <div class="features-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left">
                        <?php 
                        $features = get_field('features'); 
                        ?>
                        <h2><?php echo strtoupper($features['title']); ?></h2>

                        <ul>
                            <?php
                                if( have_rows('features_points') ):
                                    while( have_rows('features_points') ) : the_row();
                            ?>

                                <li><?php echo get_sub_field('features_point'); ?></li>

                                <?php endwhile; endif; ?>  

                        </ul> 
                        
                    </div>
                    <div class="col-md-6 right">
                        <figure>
                            <img src="<?php echo $features['img']['url']; ?>" class="img-fluid" alt="" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ==============================================
    **contact-wrapper**
    =================================================== -->

    <section class="contact-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <p><?php the_field('more_info_text'); ?></p>
                </div>
                <div class="col-md-6 right">

                    <?php $contact = get_field('contact_product'); ?>

                    <h2><?php echo strtoupper($contact['contact_title']); ?></h2>

                    <a href="mailto:<?php echo $contact['contact_email']; ?>" class="mail"><?php echo $contact['contact_email']; ?></a>
                </div>
            </div>
        </div>
    </section>





<?php get_footer(); ?>