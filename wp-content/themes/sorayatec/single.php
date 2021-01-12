<?php get_header(); ?> 

<section class="inner-outer posts-outer news-single">
        <div class="top-post">
            <div class="container">

                <?php 
                $img = get_field( 'news_img' );
                ?> 

                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-8">
                        <figure>
                            <img src="<?php echo $img['url']; ?>" class="img-fluid" alt="">
                        </figure>
                        <div class="source">
                            <span><?php echo get_field( 'date' ); ?></span>
                            <?php echo get_field( 'place' ); ?>
                        </div>
                        <h1><a href="#"><?php echo get_field( 'news_title' ); ?></a></h1>
                        <p><?php echo get_field( 'content' ); ?></p>
                        <ul class="follow-us">
                            <li><a href="https://in.linkedin.com/company/soraytec" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="https://twitter.com/hashtag/soraytec" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                        <div class="pager">
                            <a href="<?php echo get_permalink( get_adjacent_post()->ID ); ?>">&#60; PREVIOUS</a>
                            <a href="<?php echo get_permalink( get_adjacent_post( false, '', false )->ID ); ?>" class="ml-auto">NEXT &#62;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>