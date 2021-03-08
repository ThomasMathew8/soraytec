<?php 
/**
 * Template Name: About
 * 
 * @package sorayatec
 */

get_header(); 
?> 

<?php if( $acf_label ) : ?>

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
                        <h1><?php echo strtoupper($banner['banner_title']); ?></h1>
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
        **History**
        =================================================== -->



        <?php 
        $default = get_field( 'history_default' );
        $default_img = $default['default_img'];
        ?>
        <section class="history">
            <div class="container">
                <h1><?php echo strtoupper($default['default_title']); ?></h1>
                <div class="show-mob">
                    <p><?php echo $default['default_desc']; ?></p>
                </div>
               
                        <ul class="history-cnt" id="bxslider">
                            <li id="default" class="active">
                                <div class="row">
                                    <div class="col-md-5 left">
                                        <p><?php echo $default['default_desc']; ?></p>
                                    </div>
                                    <div class="col-md-7 right">
                                        <figure><img src="<?php echo $default_img['url']; ?>" class="img-fluid" alt=""></figure>
                                    </div>
                                </div>
                            </li>

                            <?php 
                            if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' )):
                            // get posts
                            $loop = new WP_Query( array(
                                'post_type' => 'history',
                                'orderby' => 'meta_value',
                                'meta_type' => 'DATE',
                                'meta_key' => 'history_date',
                                'order'	=> 'ASC'
                            )
                            );
                            if( $loop->have_posts() ):  
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $image = get_field('image');
                            ?>
                                            <li>
                                                    <div class="row">
                                                        <div class="col-md-5 left">
                                                            <div class="title">
                                                                <h2><?php the_field('history_date'); ?></h2>
                                                            </div>
                                                            <p><?php echo the_field('description'); ?></p>
                                                        </div>
                                                        <div class="col-md-7 right">
                                                            <figure><img src="<?php echo $image['url']; ?>" alt=""></figure>
                                                        </div>
                                                    </div>
                                            </li>

                                    <?php 
                                    
                                    endwhile;  
                            endif;
                            wp_reset_query();
                            else:?>

                                <div class="container">

                                    <h2 class="entry-header"><?php _e('Please Install ACF PRO Plugin!', 'Sorayatec'); ?></h2>

                                </div>   

                            <?php endif;
                            ?>
                    
                    </ul>
                



            <div id="content-6" class="content horizontal-images">

                    <?php 
                    $j=0;
                    $years = array();
                    $loop = new WP_Query( array(
                        'post_type' => 'history',
                        'orderby' => 'meta_value',
                        'meta_type' => 'DATE',
                        'meta_key' => 'history_date',
                        'order'	=> 'ASC'
                    )
                    );
                    if( $loop->have_posts() ):  
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $dates = get_field('history_date');
                        $pieces = explode(",", $dates);
                        $years[$j] = $pieces[1];
                        $j++;
                    endwhile; endif; 
                    wp_reset_query();
                    $years = array_unique ( $years);
                    $n = count($years);
                    var_dump($years,$n);
                    ?>

                    <ul class="timeline" id="bxpager">
                            <?php
                            $j=0;
                            $i=0;
                            while( $j < $n ):
                                $current_year = $years[$j];
                            ?>    
                        <li>    
                            <div class="inner" id="inner-content">
                                    <div class="circle"><?php echo $current_year; ?></div>
                                    <div class="timeline-cnt">
                                        <ul>
                                            <?php
                                            $args = array( 
                                                'post_type' => 'history',
                                                'orderby' => 'meta_value',
                                                'meta_type' => 'DATE',
                                                'meta_key' => 'history_date',
                                                'order'	=> 'ASC'
                                            );
                                            $loop = new WP_Query( $args ); 
                                                if( $loop->have_posts() ):  
                                                    while ( $loop->have_posts() ) : $loop->the_post();                                        
                                                        $dates = get_field('history_date');
                                                        $pieces = explode(",", $dates);
                                                        $year = $pieces[1];

                                                        if ( $year == $current_year ):
                                                            $i++;
                                            ?>
                                                            <li>
                                                                <a href="#" data-slide-index="<?php echo $i; ?>"><?php the_field('history_date'); ?></a>
                                                            </li>

                                            <?php 
                                                        endif;
                                                    endwhile; 
                                                endif; 
                                            ?>
                                        </ul>
                                    </div>
                            </div>
                        </li>  
                        <?php
                            $j++; 
                        endwhile; 
                        ?>   
                    </ul>

                    <?php wp_reset_query(); ?>   
                
            </div>
        </section>
   

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
                        <h1><?php echo strtoupper($team_top['team_title']); ?></h1>
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
                            <h1><?php echo strtoupper(get_field('video_title')); ?></h1>
                            <div class="video-outer">
                                <div id="slider" class="flexslider video">

                                    <?php if( is_plugin_active( 'advanced-custom-fields-pro/acf.php' )): ?>

                                    <ul class="slides">
                                        <?php
                                        if( have_rows('youtube') ):
                                            while( have_rows('youtube') ) : the_row();
                                            $yt_id = get_sub_field('id');
                                        ?>

                                            <li>
                                                <div class="youtube-video">
                                                   
                                                  <iframe src="https://www.youtube.com/embed/<?php echo $yt_id; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                
                                                </div>
                                            </li>

                                        <?php endwhile; endif; ?>

                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider thumbnail">
                                    <ul class="slides">

                                        <?php
                                        if( have_rows('youtube') ):
                                            while( have_rows('youtube') ) : the_row();
                                            $yt_id = get_sub_field('id');
                                        ?>
                                        
                                            <li><img src="http://i3.ytimg.com/vi/<?php echo $yt_id; ?>/hqdefault.jpg" class="img-fluid" alt=""></li>
                                        
                                        <?php endwhile; endif;  ?>

                                    </ul>

                                    <?php else:?>

                                        <div class="container">

                                            <h3 class="entry-header"><?php _e('Please Install ACF PRO Plugin!', 'Sorayatec'); ?></h3>

                                        </div>   

                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    </section>

              

        <!-- ==============================================
            **Signup Newsletter**
        =================================================== -->
        <section class="signup-sec">
        <div class="container">
            <div class="inner form-inline signup-form">
                    
                <?php get_template_part( 'template-parts/content', 'signup' ); ?>

            </div>
        </div>
    </section>




</div> 

<?php else:

get_template_part( 'template-parts/acf', 'none'); 

endif;?> 

<?php get_footer(); ?>