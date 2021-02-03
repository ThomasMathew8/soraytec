<?php get_header(); ?> 

<?php 
    $loop = new WP_Query( array(
        'post_type' => 'news',
        'posts_per_page' => -1,
        'order' => 'ASC'
    )
    );
    if ( $loop->have_posts() ): ?>

   <section class="inner-outer posts-outer">

            <?php
            $i=0;
            while ( $loop->have_posts() ) : $loop->the_post();                 
            $img = get_field( 'news_img' );
            if ($i!=1): 
            ?> 
            <div class="top-post">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 order-lg-2">
                            <figure>
                                <img src="<?php echo $img['url']; ?>" class="img-fluid" alt="">
                            </figure>
                        </div>
                        <div class="col-lg-4 left">
                            <h1><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h1>
                            <div class="source">
                                <span><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                            </div>
                            <p><?php echo wp_trim_words( get_the_content(), 20, '  .....'); ?></p>
                            <ul class="follow-us">

                                <?php
                                if( have_rows('follow') ):
                                while( have_rows('follow') ) : the_row();
                                ?>

                                    <li><a href="<?php echo the_sub_field( 'link' ); ?>" target="_blank"><i class="<?php echo the_sub_field( 'icon_class' ); ?>"></i></a></li>
                                
                                <?php endwhile; endif; ?> 

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         <?php $i++; ?>

        <!-- ==============================================
        **Posts**
        =================================================== -->
        <?php else: ?>
                <div class="container">
                    <ul class="post-lists">
                        <li class="row">
                            <div class="col-md-4">
                                <figure><img src="<?php echo $img['url']; ?>" alt=""></figure>
                            </div>
                            <div class="col-md-8">
                                <h1><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h1>
                                <span class="date"><?php echo get_field( 'date' ); ?></span>
                                <?php echo get_field( 'place' ); ?>
                                <p><?php echo wp_trim_words( get_the_content(), 20, '  .....'); ?></p>
                                <ul class="follow-us">
                                    <li><a href="https://in.linkedin.com/company/soraytec" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://twitter.com/hashtag/soraytec" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    
                    </ul>
                </div>

        <?php endif; endwhile; ?>
    </section>

    <?php endif; wp_reset_query();?>

    <!-- ==============================================
    **Signup Newsletter**
    =================================================== -->
    
    

    <section class="signup-sec">
        <div class="container">
            <div class="inner">
                <h2><?php echo get_field('signup_text'); ?></h2>
                <form class="form-inline signup-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo get_field('placeholder_text'); ?>">
                    </div>
                    <button type="submit" class="btn btn-signup"><?php echo get_field('button_text'); ?></button>
                </form>
            </div>
        </div>
    </section>


<?php get_footer(); ?>