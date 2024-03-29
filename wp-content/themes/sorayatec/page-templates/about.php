<?php 
/**
 * Template Name: About
 * 
 * @package sorayatec
 */

get_header(); 
?> 


<!-- ==============================================
    **Banner**
    =================================================== -->


    <div class="inner-outer about-outer">
    <?php 
    if(get_field( 'banner' )):
    ?>
        <div class="about-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <?php if(get_field( 'banner' )['banner_title']): ?>
                        <h1><?php echo strtoupper(get_field( 'banner' )['banner_title']); ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="about-desc">
                            <?php if(get_field( 'banner' )['banner_desc']): ?>
                            <p><?php echo wp_trim_words( get_field( 'banner' )['banner_desc'], 100, '  .....'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

      <!-- ==============================================
        **History**
        =================================================== -->



        <?php 
        $default = get_field( 'history_default' );
        ?>
        <section class="history">
            <div class="container">
                <h1><?php echo strtoupper($default['default_title']); ?></h1>
                <div class="show-mob">
                    <p><?php echo wp_trim_words( $default['default_desc'], 30, '  .....'); ?></p>
                </div>
               
                        <ul class="history-cnt" id="bxslider">
                            <li id="default" class="active">
                                <div class="row">
                                    <div class="col-md-5 left">
                                        <p><?php echo wp_trim_words( $default['default_desc'], 30, '  .....'); ?></p>
                                    </div>
                                    <div class="col-md-7 right">
                                        <figure><img src="<?php echo $default['default_img']['url']; ?>" class="img-fluid" alt=""></figure>
                                    </div>
                                </div>
                            </li>

                            <?php 
                            // get posts
                            $loop = new WP_Query( array(
                                'post_type' => 'history',
                                'orderby'=>'title',
                                'order'=>'ASC'
                            )
                            );
                            if( $loop->have_posts() ):  
                                while ( $loop->have_posts() ) : $loop->the_post();

                                
                                    
                                    // Get repeater value
                                    $repeater = get_field('monthly_details');
                                    $date_stamp = array();


                                    // Obtain list of columns
                                    foreach ($repeater as $key => $row):
                                        $dates = $row['date'];

                                        $pieces = explode(",", $dates);
                                        $m = $pieces[0];
                                        $y = $pieces[1];


                                        // create UNIX
                                        $date_stamp[$key] = strtotime("$m,$y");
                                        
                                    endforeach;

                                    // Sort the data by date, ascending
                                    array_multisort($date_stamp, SORT_ASC, $repeater);

                                    // Display newly orded columns
                                    // Unsure if this is the optimal way to do this...
                                    if( $repeater ):
                                        foreach( $repeater as $row ) :
                                            $i++;

                                    ?>
                                            <li>
                                                    <div class="row">
                                                        <div class="col-md-5 left">
                                                            <div class="title">
                                                                <h2><?php echo $row['date']; ?></h2>
                                                            </div>
                                                            <p><?php echo wp_trim_words( $row['desc'], 30, '  .....'); ?></p>
                                                        </div>
                                                        <div class="col-md-7 right">
                                                            <figure><img src="<?php echo $row['image']['url'];?>" alt=""></figure>
                                                        </div>
                                                    </div>
                                            </li>
                                    <?php endforeach; endif; ?>


                                    <?php 
                                    
                                    endwhile;  
                            endif;
                            wp_reset_query();
                            ?>
                    
                    </ul>
                



            <div id="content-6" class="content horizontal-images">

                    <?php 
                    $args = array( 
                        'post_type' => 'history',
                        'orderby'=>'title',
                        'order'=>'ASC');
                    $loop = new WP_Query( $args );
                    ?>

                        <ul class="timeline" id="bxpager">

                            <?php 
                            $i=0;
                            if( $loop->have_posts() ):  
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $date= get_sub_field('date');
                            ?>    
                                
                                <li>
                                    <div class="inner" id="inner-content">
                                        <div class="circle"><?php echo the_title(); ?></div>
                                        <div class="timeline-cnt">
                                            <ul>


                                                <?php                                                 
                                                // Get repeater value
                                                $repeater = get_field('monthly_details');
                                                $date_stamp = array();
                

                                                // Obtain list of columns
                                                foreach ($repeater as $key => $row):
                                                    $dates = $row['date'];

                                                    $pieces = explode(",", $dates);
                                                    $m = $pieces[0];
                                                    $y = $pieces[1];


                                                    // create UNIX
                                                    $date_stamp[$key] = strtotime("$m,$y");
                                                   
                                                endforeach;

                                                // Sort the data by date, ascending
                                                array_multisort($date_stamp, SORT_ASC,  $repeater);

                                                // Display newly orded columns
                                                // Unsure if this is the optimal way to do this...
                                                if( $repeater ):
                                                    foreach( $repeater as $row ) :
                                                        $i++;

                                                ?>
                                                    <li>
                                                        <a href="#" data-slide-index="<?php echo $i; ?>"><?php echo $row['date'];?></a>
                                                    </li>
                                                <?php endforeach; endif; ?>

                                                   
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php  endwhile; endif; ?>     
                        </ul>

                    <?php wp_reset_query(); ?>   
                
            </div>
        </section>
   

        <!-- ==============================================
        **The Team**
        =================================================== -->
        <section class="the-team">
            <div class="container">
                <?php 
                if( have_rows('team_section' ) ): while ( have_rows('team_section')) : the_row();
                ?>
                
                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <?php if(get_sub_field('team_title')): ?>
                        <h1><?php echo strtoupper(get_sub_field('team_title')); ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="team-desc">
                            <?php if(get_sub_field('team_desc')): ?>
                            <p><?php echo wp_trim_words(get_sub_field('team_desc'), 100, '  .....'); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if( have_rows('team_individuals' ) ): ?>
                    <ul class="row team-list">

                        <?php
                        while ( have_rows('team_individuals')) : the_row();               
                        ?>

                            <li class="col-sm-6 col-md-4 col-lg-3">
                                <div class="inner">
                                    <div class="flipper">
                                        <div class="front">
                                            <?php if(get_sub_field('image')): ?>
                                            <img src="<?php echo get_sub_field('image')[ 'url' ]; ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="back">

                                            <?php if(get_sub_field('card')[ 'title' ]): ?>
                                            <p><?php echo get_sub_field('card')[ 'title' ]; ?></p>
                                            <?php endif; ?>
                                            
                                            <?php if(get_sub_field('card')[ 'desc' ]): ?>
                                            <p><?php echo wp_trim_words( get_sub_field('card')[ 'desc' ], 10, '  .....'); ?></p>
                                            <?php endif; ?>

                                            <div class="d-flex mt-auto">
                                                <?php if(get_sub_field('card')['linkedin_link']): ?>
                                                <a href="<?php echo get_sub_field('card')['linkedin_link']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="source">
                                        <?php if(get_sub_field( 'name' )): ?>
                                        <div class="name"><?php echo get_sub_field( 'name' ); ?></div>
                                        <?php endif; ?>

                                        <?php if(get_sub_field( 'position' )): ?>
                                        <span><?php echo get_sub_field( 'position' ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php  endwhile; ?>
                        
                    </ul>

                <?php endif; endwhile; endif; ?>    

            </div>
        </section>    


        <!-- ==============================================
        **Video**
        =================================================== -->
        
        <section class="video-sec">
            <div class="container">
            <?php 
            if( have_rows('video_section' ) ): while ( have_rows('video_section')) : the_row();
            ?>
                <?php if(get_sub_field('title')): ?>
                <h1><?php echo strtoupper(get_sub_field('title')); ?></h1>
                <?php endif; ?>
                <div class="video-outer">
                    <div id="slider" class="flexslider video">

                    <?php if( have_rows('youtube') ): ?>
                        <ul class="slides">
                            <?php
                                while( have_rows('youtube') ) : the_row();
                            ?>
                                <?php if(get_sub_field('id')): ?>
                                <li>
                                    <div class="youtube-video">
                                        
                                        <iframe src="https://www.youtube.com/embed/<?php the_sub_field('id'); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    
                                    </div>
                                </li>
                                <?php endif; ?>

                            <?php endwhile; ?>

                        </ul>
                    <?php endif; ?>
                    </div>

                    <div id="carousel" class="flexslider thumbnail">
                    <?php if( have_rows('youtube') ): ?>
                        <ul class="slides">

                            <?php
                                while( have_rows('youtube') ) : the_row();
                            ?>
                                <?php if(get_sub_field('id')): ?>
                                <li><img src="http://i3.ytimg.com/vi/<?php the_sub_field('id'); ?>/hqdefault.jpg" class="img-fluid" alt=""></li>
                                <?php endif; ?>
                            
                            <?php endwhile; ?>

                        </ul>
                    <?php endif; ?>

                    </div>
                </div>
                <?php endwhile;endif; ?>
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
 

<?php 
get_footer();