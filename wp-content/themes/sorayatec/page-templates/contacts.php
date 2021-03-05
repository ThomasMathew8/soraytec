<?php 
/**
 * Template Name: Contacts
 * 
 * @package sorayatec
 */

get_header(); 
?> 

<?php if( $acf_label ) : ?>

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
                            if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' )):
                            if( have_rows('address') ):
                                while( have_rows('address') ) : the_row();
                                $country = get_sub_field('country');
                            ?>

                                <div class="col-sm-6 address">
                                    <h2><?php echo $country; ?></h2>
                                    <address>

                                        <?php
                                        if( have_rows('address_fields') ):
                                        while( have_rows('address_fields') ) : the_row();
                                        $field = get_sub_field('fields');
                                        echo $field;
                                        ?>

                                        <br>
                                    
                                        <?php
                                        endwhile; endif;
                                        $email =  get_sub_field( 'email' );
                                        ?> 

                                        <span class="mail"><?php echo $email['text']; ?><a href="<?php echo $email['link']; ?>"><?php echo $email['link_text']; ?></a></span>
                                    
                                    </address>
                                </div>
                            <?php endwhile; endif; ?> 
                            <?php else:?>

                                <div class="container">

                                    <h2 class="entry-header"><?php _e('Please Install ACF PRO Plugin!', 'Sorayatec'); ?></h2>

                                </div>   

                            <?php endif;?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">

                        <?php
                        $contact = '[contact-form-7 id="1796" title="Contact form 1"]';
                        echo do_shortcode($contact);
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else:

   get_template_part( 'template-parts/acf', 'none'); 

endif;?> 
 
<?php 
get_footer();