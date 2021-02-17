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
                    <p>
                        <?php 
                        if($banner['banner_desc']): 
                            echo $banner['banner_desc']; 
                        endif; 
                        ?>
                    </p>
                    <figure>
                        <img src="<?php if($left['url']): echo $left['url']; endif;?>" alt=""/>
                    </figure>
                </div>
                <div class="col-md-8 right">
                    <figure>
                        <img src="<?php if($right['url']): echo $right['url']; endif; ?>" alt="">
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

                <h2>
                    <?php 
                    if($feature['title']): 
                        echo strtoupper($feature['title']); 
                    endif; 
                    ?>
                </h2>
                <p>
                    <?php 
                    if($feature['desc']): 
                        echo $feature['desc']; 
                    endif; 
                    ?>
                </p>

            </div>
            <ul class="row prdct-feature-cnt">

                <?php
                if( have_rows('features_loop') ):
                while( have_rows('features_loop') ) : the_row();
                $img = get_sub_field('img');
                $desc = get_sub_field('desc');
                ?>

                    <li class="col-md-4 col-sm-6">
                        <figure>
                            <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid" alt=""/>
                        </figure>
                        <p>
                            <?php 
                            if($desc): 
                                echo $desc; 
                            endif; 
                            ?>
                        </p>
                    </li>
                    
                <?php endwhile; endif; ?>    

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
                                    <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid" alt=""/>
                                </figure>
                            </div>
                        <?
                        $i++;
                            else:
                        ?>

                            <div class="col-md-6 right">
                                <figure>
                                    <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid" alt=""/>
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
                    $img = $application['image'];
                ?>
                                    
                    <div class="col-md-6 left">

                        <h2>
                            <?php 
                            if($application['title']): 
                                echo strtoupper($application['title']); 
                            endif; 
                            ?>
                        </h2>

                        <ul>

                        
                                <?php
                                if( have_rows('application_points') ):
                                while( have_rows('application_points') ) : the_row();
                                $point = get_sub_field('application_point');
                                ?>

                                <li>
                                    <?php
                                     if($point): 
                                        echo $point; 
                                     endif; 
                                    ?>
                                </li>

                                <?php endwhile; endif; ?> 

                        </ul>
                        <figure>
                            <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid"/>
                        </figure>
                    </div>
                <?php endif; ?>

                <div class="col-md-6 right">
                    <?php
                    if( have_rows('specification_box') ):
                    while( have_rows('specification_box') ) : the_row();
                    $title = get_sub_field('title');                
                    ?>

                        <div class="application-cnt">

                            <h3>
                                <?php
                                 if($title): 
                                    echo $title; 
                                 endif; 
                                ?>
                            </h3>

                            <ul>
                                <?php
                                if( have_rows('rows') ):
                                while( have_rows('rows') ) : the_row();
                                $row_title = get_sub_field('row_title');
                                ?>
                                    <li>
                                        <div class="left-table">
                                            <h4>
                                                <?php 
                                                if($row_title): 
                                                    echo $row_title; 
                                                endif; 
                                                ?>
                                            </h4>
                                        </div>

                                        <div class="right-table">

                                            <?php
                                            if( have_rows('row_fields') ):
                                            while( have_rows('row_fields') ) : the_row();
                                            $column = get_sub_field('row_field');
                                            ?>

                                                <span>
                                                    <?php
                                                    if($column): 
                                                        echo $column; 
                                                    endif; 
                                                    ?>
                                                </span>

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
                        $img = $features['img'];
                        ?>

                        <h2>
                            <?php
                             if($features['title']): 
                                echo strtoupper($features['title']); endif; 
                             ?>
                        </h2>


                        <ul>
                            <?php
                            if( have_rows('features_points') ):
                                while( have_rows('features_points') ) : the_row();
                                $point = get_sub_field('features_point');
                            ?>

                            <li>
                                <?php 
                                if($point): 
                                    echo $point; 
                                endif;?>
                            </li>

                            <?php endwhile; endif; ?>     
                            
                        </ul> 
                        
                    </div>
                    <div class="col-md-6 right">
                        <figure>
                            <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid"/>
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
                    <p>
                        <?php 
                        if(the_field('more_info_text')): 
                            the_field('more_info_text'); 
                        endif; 
                        ?>
                    </p>
                </div>
                <div class="col-md-6 right">

                    <?php $contact = get_field('contact_product'); ?>


                    <h2>
                        <?php 
                        if($contact['contact_title']): 
                            echo strtoupper($contact['contact_title']); 
                        endif; ?>
                    </h2>

                    <a href="mailto:<?php if($contact['contact_email']): echo $contact['contact_email']; endif; ?>" class="mail">
                        <?php if($contact['contact_email']): echo $contact['contact_email']; endif; ?>
                    </a>

                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>