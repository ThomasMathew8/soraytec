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
        *History*
        =================================================== -->

        <section class="history">
            <div class="container">

                <?php if(get_field( 'history_default' )['default_title']): ?>
                <h1><?php echo strtoupper(get_field( 'history_default' )['default_title']); ?></h1>
                <?php endif; ?>

                <div class="show-mob">
                    <?php if(get_field( 'history_default' )['default_desc']): ?>
                    <p><?php echo get_field( 'history_default' )['default_desc']; ?></p>
                    <?php endif; ?>
                </div>
               
                        <ul class="history-cnt" id="bxslider">
                            <li id="default" class="active">
                                <div class="row">
                                    <div class="col-md-5 left"> 
                                        <?php if(get_field( 'history_default' )['default_desc']): ?>
                                        <p><?php echo get_field( 'history_default' )['default_desc']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-7 right">
                                        <?php if(get_field( 'history_default' )['default_img']): ?>
                                        <figure><img src="<?php echo get_field( 'history_default' )['default_img']['url']; ?>" class="img-fluid" alt=""></figure>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>

                            <?php 
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
                            ?>
                                            <li>
                                                    <div class="row">
                                                        <div class="col-md-5 left">
                                                            <div class="title">
                                                                <?php if(get_field('history_date')): ?>
                                                                <h2><?php the_field('history_date'); ?></h2>
                                                                <?php endif; ?>
                                                            </div>

                                                            <?php if(get_field('description')): ?>
                                                            <p><?php echo the_field('description'); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-7 right">
                                                            <?php if(get_field('image')): ?>
                                                            <figure><img src="<?php echo get_field('image')['url']; ?>" alt=""></figure>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                            </li>

                                    <?php 
                                    
                                    endwhile;  
                            endif;
                            wp_reset_query();
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
                        if(get_field('history_date')): 
                        $dates = get_field('history_date');
                        $pieces = explode(",", $dates);
                        $years[$j] = $pieces[1];
                        $j++;
                        endif;
                    endwhile; endif; 
                    wp_reset_query();
                    $years = array_unique ( $years );
                    ?>

                    <ul class="timeline" id="bxpager">
                        <?php                   
                        $i=0;
                        if(!empty($years)):
                        foreach( $years as $year ):                               
                        ?>    
                        <li>    
                            <div class="inner" id="inner-content">
                                    <div class="circle"><?php echo $year; ?></div>
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
                                                        if(get_field('history_date')):                                       
                                                        $dates = get_field('history_date');
                                                        //getting year
                                                        $pieces = explode(",", $dates);
                                                        $y = $pieces[1];

                                                        if ( $year == $y ):
                                                            $i++;
                                            ?>
                                                            <li>
                                                                <a href="#" data-slide-index="<?php echo $i; ?>"><?php the_field('history_date'); ?></a>
                                                            </li>

                                            <?php 
                                                        endif;
                                                        endif;
                                                    endwhile; 
                                                endif; 
                                            ?>
                                        </ul>
                                    </div>
                            </div>
                        </li>  
                        <?php                    
                        endforeach; 
                        endif;
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
                                        
                                        <iframe src="https://www.youtube.com/embed/<?php the_sub_field('id'); ?>?html5=1&enablejsapi=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    
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
 
<!-- Function for pausing videos on selection of another youtube video in about page -->
<script>
    var ytplayerList;

    function onPlayerReady(e) {
        var video_data = e.target.getVideoData(),
            label = video_data.video_id+':'+video_data.title;
        e.target.ulabel = label;
        console.log(label + " is ready!");

    }
    function onPlayerError(e) {
        console.log('[onPlayerError]');
    }
    function onPlayerStateChange(e) {
        var label = e.target.ulabel;
        if (e["data"] == YT.PlayerState.PLAYING) {
            console.log({
                event: "youtube",
                action: "play:"+e.target.getPlaybackQuality(),
                label: label
            });
            //if one video is play then pause other
            pauseOthersYoutubes(e.target);
        }
        if (e["data"] == YT.PlayerState.PAUSED) {
            console.log({
                event: "youtube",
                action: "pause:"+e.target.getPlaybackQuality(),
                label: label
            });
        }
        if (e["data"] == YT.PlayerState.ENDED) {
            console.log({
                event: "youtube",
                action: "end",
                label: label
            });
        }
        //track number of buffering and quality of video
        if (e["data"] == YT.PlayerState.BUFFERING) {
            e.target.uBufferingCount?++e.target.uBufferingCount:e.target.uBufferingCount=1; 
            console.log({
                event: "youtube",
                action: "buffering["+e.target.uBufferingCount+"]:"+e.target.getPlaybackQuality(),
                label: label
            });
            //if one video is play then pause other, this is needed because at start video is in buffered state and start playing without go to playing state
            if( YT.PlayerState.UNSTARTED ==  e.target.uLastPlayerState ){
                pauseOthersYoutubes(e.target);
            }
        }
        //last action keep stage in uLastPlayerState
        if( e.data != e.target.uLastPlayerState ) {
            console.log(label + ":state change from " + e.target.uLastPlayerState + " to " + e.data);
            e.target.uLastPlayerState = e.data;
        }
    }
    function initYoutubePlayers(){
        ytplayerList = null; //reset
        ytplayerList = []; //create new array to hold youtube player
        for (var e = document.getElementsByTagName("iframe"), x = e.length; x-- ;)
 {
            if (/youtube.com\/embed/.test(e[x].src)) {
                ytplayerList.push(initYoutubePlayer(e[x]));
                console.log("create a Youtube player successfully");
            }
        }

    }
    function pauseOthersYoutubes( currentPlayer ) {
        if (!currentPlayer) return;
        for (var i = ytplayerList.length; i-- ;){
            if( ytplayerList[i] && (ytplayerList[i] != currentPlayer) ){
                ytplayerList[i].pauseVideo();
            }
        }  
    }
    //init a youtube iframe
    function initYoutubePlayer(ytiframe){
        console.log("have youtube iframe");
        var ytp = new YT.Player(ytiframe, {
            events: {
                onStateChange: onPlayerStateChange,
                onError: onPlayerError,
                onReady: onPlayerReady
            }
        });
        ytiframe.ytp = ytp;
        return ytp;
    }
    function onYouTubeIframeAPIReady() {
        console.log("YouTubeIframeAPI is ready");
        initYoutubePlayers();
    }
    var tag = document.createElement('script');
    //use https when loading script and youtube iframe src since if user is logging in youtube the youtube src will switch to https.
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);    

  </script>

<?php 
get_footer();