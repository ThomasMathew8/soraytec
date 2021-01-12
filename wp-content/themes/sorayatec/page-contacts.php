<?php get_header(); ?> 

<!-- =============================================
    **Contact**
    =================================================== -->
    <div class="inner-outer contact-outer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <h1><?php echo the_title(); ?></h1>
                    <div class="address-outer">
                        <div class="row">
                            <div class="col-sm-6 address">
                                <h2>Norway</h2>
                                <address>
                                    Soraytec Scandinavia AS<br>
                                    Uniongata 18<br>
                                    3732 Skien, Norway<br>
                                    <span class="mail">E-Mail: <a href="mailto:info@soraytec.com">info@soraytec.com</a></span>
                                </address>
                            </div>
                            <div class="col-sm-6 address">
                                <h2>Armenia</h2>
                                <address>
                                    Soarytec LLC<br>
                                    Miasnikyan 5/1<br>
                                    Yerevan, Armenia<br>
                                    <span class="mail">E-Mail: <a href="mailto:info@soraytec.com">info@soraytec.com</a></span>
                                </address>
                            </div>
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

    <?php get_footer(); ?>    
