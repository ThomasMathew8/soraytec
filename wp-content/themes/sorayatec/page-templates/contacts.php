<?php 
/**
 * Template Name: Contacts
 * 
 * @package sorayatec
 */

get_header(); 
?> 


<!-- =============================================
    **Contact**
    =================================================== -->
    <div class="inner-outer contact-outer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <h1><?php echo strtoupper(the_title()); ?></h1>
                    <div class="address-outer">
                        <div class="row">

                            <?php
                            if( have_rows('address') ):
                                while( have_rows('address') ) : the_row();
                            ?>

                                <div class="col-sm-6 address">
                                    <?php if(get_sub_field('country')): ?>
                                    <h2><?php echo get_sub_field('country'); ?></h2>
                                    <?php endif; ?>

                                    <address>

                                        <?php
                                        if( have_rows('address_fields') ):
                                        while( have_rows('address_fields') ) : the_row();

                                        if(get_sub_field('fields')): 
                                        echo get_sub_field('fields');
                                        endif;
                                        ?>

                                        <br>
                                    
                                        <?php
                                        endwhile; endif; 
                                        if(get_sub_field('email')):
                                        ?>    
                                        <span class="mail"><?php echo get_sub_field( 'email' )['text']; ?>
                                        <a href="<?php echo get_sub_field( 'email' )['link']; ?>"><?php echo get_sub_field( 'email' )['link_text']; ?></a>
                                        </span>
                                        <?php endif; ?>
                                    
                                    </address>
                                </div>
                            <?php endwhile; endif; ?> 

                        </div>
                    </div>
                </div>

                <?php if(do_shortcode('[contact-form-7 id="1796" title="Contact form 1"]')): ?>
                <div class="col-md-6">
                    <div class="contact-form">

                        <?php
                        echo do_shortcode('[contact-form-7 id="1796" title="Contact form 1"]');
                        ?>

                        
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 
 
<?php 
get_footer();