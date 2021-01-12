<?php get_header(); ?> 


<!-- ==============================================
    **Banner**
    =================================================== -->
    <?php 
    $banner = get_field('banner');
    if (!empty($banner)):
        $right = $banner['right_img'];
        $left = $banner['left_img'];
    ?>
    <div class="banner prdct-banner">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-4 left">
                    <p><?php echo $banner['banner_desc']; ?></p>
                    <figure>
                        <img src="<?php echo $left['url']; ?>" alt=""/>
                    </figure>
                </div>
                <div class="col-md-8 right">
                    <figure>
                        <img src="<?php echo $right['url']; ?>" alt="">
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
                <h2><?php echo $feature['title']; ?></h2>
                <p><?php echo $feature['desc']; ?></p>
            </div>
            <ul class="row prdct-feature-cnt">

                <?php
                if( have_rows('features_loop') ):
                while( have_rows('features_loop') ) : the_row();
                $img = get_sub_field('feature_img');
                $desc = get_sub_field('feature_desc');
                ?>

                    <li class="col-md-4 col-sm-6">
                        <figure>
                            <img src="<?php echo $img['url']; ?>" class="img-fluid" alt=""/>
                        </figure>
                        <p><?php echo $desc; ?></p>
                    </li>
                    
                <?php endwhile; endif; ?>    

            </ul>
        </div>
        <?php endif; ?>
        <div class="prdct-feature-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <figure>
                            <img src="images/prdct-prortotyp-monitor.png" class="img-fluid" alt=""/>
                        </figure>
                    </div>
                     <div class="col-md-6 right">
                        <figure>
                            <img src="images/prdct-prototype-image.png" class="img-fluid" alt=""/>
                        </figure>
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
                <div class="col-md-6 left">
                    <h2>application</h2>
                    <ul>
                        <li>Legacy substation retrofit</li>
                        <li>Industrial consumers</li>
                        <li>Smart substations</li>
                        <li>MV network monitoring</li>
                        <li>Micro grids</li>
                        <li>Independent power producers</li>
                    </ul>
                    <figure>
                        <img src="images/prdct-photo.jpg" class="img-fluid"/>
                    </figure>
                </div>
                <div class="col-md-6 right">
                    <div class="application-cnt">
                        <h3>TECHNICAL SPECIFICATIONS</h3>
                        <ul>
                            <li>
                                <div class="left-table">
                                    <h4>Electrical frequency</h4>
                                </div>
                                <div class="right-table">
                                    <span>47Hz-55Hz</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Rated Voltage</h4>
                                </div>
                                <div class="right-table">
                                    <span>6kV,10Kv,20Kv</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Measurement Accuracy</h4>
                                </div>
                                <div class="right-table">
                                    <span>0.05s class</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Rated Current</h4>
                                </div>
                                <div class="right-table">
                                    <span>10A-100A</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Maximum current</h4>
                                </div>
                                <div class="right-table">
                                    <span>102A (Continuously)</span>
                                </div>
                            </li>
                             <li>
                                <div class="left-table">
                                    <h4>power quality</h4>
                                </div>
                                <div class="right-table">
                                    <span>Computed amplitude of voltage/corrent up to the 72-th harmonic; total harmonic distortion</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="application-cnt">
                        <h3>PHYSICAL AND ENVIRONMENTAL</h3>
                        <ul>
                            <li>
                                <div class="left-table">
                                    <h4>Weight</h4>
                                </div>
                                <div class="right-table">
                                    <span>Sensor (6 & 10kV) - 2.5 kg </span>
                                    <span>Data collector - 0.5 kg</span>
                                </div>
                            </li>
                           <li>
                                <div class="left-table">
                                    <h4>Operating Temperature</h4>
                                </div>
                                <div class="right-table">
                                    <span>-25°C to +60°C</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Dimension</h4>
                                </div>
                                <div class="right-table">
                                    <span>Swensor (6 & 10kV)-440mm*125mm*40mm</span>
                                    <span>Data collector- 199.4mm*125.6mm*17.5mm</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>IP protection</h4>
                                </div>
                                <div class="right-table">
                                    <span>Sensor - IP54</span>
                                    <span>Data collector - IP64</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="application-cnt">
                        <h3>COMMUNICATION</h3>
                        <ul>
                            <li>
                                <div class="left-table">
                                    <h4>Communication option</h4>
                                </div>
                                <div class="right-table">
                                    <span>Ethernet</span>
                                    <span>RS232,RS485</span>
                                    <span>Cellular Modem Communication Supports $G LTE Network and CDMA/GSM</span>
                                    <span>Wifi</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="application-cnt">
                        <h3>LIFETIME</h3>
                        <ul>
                            <li>
                                <div class="left-table">
                                    <h4>Operation Time</h4>
                                </div>
                                <div class="right-table">
                                    <span>180000 hours</span>
                                </div>
                            </li>
                            <li>
                                <div class="left-table">
                                    <h4>Total Lifespan</h4>
                                </div>
                                <div class="right-table">
                                    <span>20 years</span>
                                </div>
                            </li>
                        </ul>
                    </div>
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
                        <h2>FEATURES</h2>
                        <ul>
 
                            <?php
                            if( have_rows('features_loop') ):
                            while( have_rows('features_loop') ) : the_row();
                            $point = get_sub_field('feature_desc');
                            ?>

                            <li><?php echo $point; ?></li>

                            <?php endwhile; endif; ?>     
                            
                        </ul>
                    </div>
                    <div class="col-md-6 right">
                        <figure>
                            <img src="images/prdct-feature6.jpg" class="img-fluid"/>
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
                    <p>Would you like more information?</p>
                </div>
                <div class="col-md-6 right">

                    <?php $contact = get_field('contact'); ?>

                    <h2><?php echo $contact['contact_title'] ?></h2>

                    <a href="<?php echo $contact['contact_link'] ?>" class="mail"><?php echo $contact['contact_text'] ?></a>
                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>