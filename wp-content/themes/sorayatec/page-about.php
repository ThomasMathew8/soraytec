<?php get_header(); ?> 

<!-- ==============================================
    **Banner**
    =================================================== -->

    <?php 
    $banner = get_field( 'banner' );
    ?>

    <div class="inner-outer about-outer">
        <div class="about-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <h1><?php echo $banner['banner_title']; ?></h1>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="about-desc">
                            <p><?php echo $banner['banner_desc']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==============================================
        **The Team**
        =================================================== -->
        <section class="the-team">
            <div class="container">
                <div class="row">

                    <?php 
                    $team_top = get_field( 'team_top' );
                    ?>

                    <div class="col-md-5 col-lg-5">
                        <h1><?php echo $team_top['team_title']; ?></h1>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="team-desc">
                            <p><?php echo $team_top['team_desc']; ?> </p>
                        </div>
                    </div>
                </div>

                <?php 
                $loop = new WP_Query( array(
                    'post_type' => 'team',
                    'posts_per_page' => -1,
                    'order' => 'ASC'
                )
                );
                if ( $loop->have_posts() ): ?>

                    <ul class="row team-list">

                        <?php
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $member_img = get_field('member_img');
                        $card = get_field('back_card');
                        $member_info = get_field('member_info');
                        ?>

                            <li class="col-sm-6 col-md-4 col-lg-3">
                                <div class="inner">
                                    <div class="flipper">
                                        <div class="front">
                                            <img src="<?php echo $member_img[ 'url' ]; ?>" alt="">
                                        </div>
                                        <div class="back">
                                            <p><?php echo $card[ 'card_text' ]; ?></p>
                                            <p><?php echo $card[ 'card_desc' ]; ?></p>
                                            <div class="d-flex mt-auto">
                                                <a href="<?php echo get_field('linkedin_link'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="source">
                                        <div class="name"><?php echo $member_info[ 'name' ]; ?></div>
                                        <span><?php echo $member_info[ 'position' ]; ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php  endwhile; ?>
                        
                    </ul>

                <?php endif; wp_reset_query(); ?>    

            </div>
        </section>    


        <!-- ==============================================
        **Video**
        =================================================== -->
        
                    <section class="video-sec">
                        <div class="container">
                            <h1><?php echo get_field('video_title'); ?></h1>
                            <div class="video-outer">
                                <div id="slider" class="flexslider video">
                                    <ul class="slides">
                                    <?php 
                                        $loop = new WP_Query( array(
                                            'post_type' => 'video',
                                            'posts_per_page' => -1,
                                            'order' => 'ASC'
                                        )
                                        );
                                        if ( $loop->have_posts() ): while ( $loop->have_posts() ) : $loop->the_post();
                                        ?>

                                            <li>
                                                <div class="youtube-video">
                                                    <iframe width="100%" height="100%" src="<?php  echo get_field('link'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </li>

                                        <?php endwhile; ?>

                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider thumbnail">
                                    <ul class="slides">

                                        <?php
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                        $thumb = get_field('thumbnail');
                                        ?>
                                        
                                            <li><img src="<?php  echo $thumb['url']; ?>" class="img-fluid" alt=""></li>
                                        
                                        <?php endwhile; endif; wp_reset_query(); ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

              

        <!-- ==============================================
            **Signup Newsletter**
        =================================================== -->
            <?php 
            $signup = get_field( 'signup' );
            ?>
            
            <section class="signup-sec">
                <div class="container">
                    <div class="inner">
                        <h2><?php echo $signup['signup_text']; ?></h2>
                        <form class="form-inline signup-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php echo $signup['placeholder_text']; ?>">
                            </div>
                            <button type="submit" class="btn btn-signup"><?php echo $signup['button_text']; ?></button>
                        </form>
                    </div>
                </div>
            </section>



</div>



<?php get_footer(); ?>
