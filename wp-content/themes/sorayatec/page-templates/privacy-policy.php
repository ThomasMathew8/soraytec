<?php 
/**
 * Template Name: Privacy Policy
 * 
 * @package sorayatec
 */

get_header(); 
?> 


<!-- ==============================================
    **Post**
    =================================================== -->
    <section class="inner-outer about-outer single-page">
        <div class="about-banner">
            <div class="container">
                <?php if(get_sub_field('more_info_text')): ?>
                <h1><?php echo strtoupper(the_title()); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">

                    <?php                   
                    if( have_rows('privacy_policy') ):
                    while( have_rows('privacy_policy') ) : the_row();
                    ?>
                        <?php if(get_sub_field('main_title')): ?>
                        <h2><?php echo the_sub_field( 'main_title' ); ?></h2>
                        <?php endif; ?>

                            <?php
                            if( have_rows('sub_section') ):
                            while( have_rows('sub_section') ) : the_row();
                            ?>

                            <?php if(get_sub_field('sub_title')): ?>
                            <h3><?php echo the_sub_field( 'sub_title' ); ?></h3>
                            <?php endif; ?>

                                <?php
                                if( have_rows('sub_content') ):
                                while( have_rows('sub_content') ) : the_row();
                                ?>

                                    <?php if(get_sub_field( 'paragraph' )): ?>
                                    <p><?php echo the_sub_field( 'paragraph' ); ?></p>
                                    <?php endif; ?>

                                <?php endwhile; endif; ?>

                            <?php endwhile; endif; ?>    

                    <?php endwhile; endif; ?> 
                  

                </div>
            </div>
        </div>
    </section>
 


<?php get_footer(); ?>
