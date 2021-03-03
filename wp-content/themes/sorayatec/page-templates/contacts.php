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
                                $country = get_sub_field('country');
                            ?>

                                <div class="col-sm-6 address">
                                    <h2>
                                        <?php 
                                        if($country):
                                            echo $country; 
                                        endif;
                                        ?>
                                    </h2>
                                    <address>

                                        <?php
                                        if( have_rows('address_fields') ):
                                        while( have_rows('address_fields') ) : the_row();
                                        $field = get_sub_field('fields');
                                        if($field):
                                            echo $field;                                            
                                        endif;      
                                        ?>

                                        <br>
                                    
                                        <?php
                                        endwhile; endif;
                                        $email =  get_sub_field( 'email' );
                                        ?> 

                                        <span class="mail">
                                            <?php echo $email['text']; ?>
                                            <a href="<?php if($email['link']): echo $email['link']; endif; ?>">
                                                <?php if($email['link_text']): echo $email['link_text']; endif; ?>
                                            </a>
                                        </span>
                                    
                                    </address>
                                </div>
                            <?php endwhile; endif; ?> 
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

<?php 
get_footer();    
