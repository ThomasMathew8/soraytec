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
                            <img src="<?php if($img['url']): echo $img['url']; endif; ?>" class="img-fluid" alt="">
                        </figure>
                        <div class="source">
                            <span>
                                <?php
                                 if(get_field( 'date' )): 
                                    echo get_field( 'date' ); 
                                 endif; 
                                ?>
                            </span>
                            <?php if(get_field( 'place' )): echo get_field( 'place' ); endif; ?>
                        </div>
                        <h1><a href="#"><?php echo the_title(); ?></a></h1>
                        <div><?php echo the_content(); ?></div>
                        <ul class="follow-us">
                                
                                <?php
                                if( have_rows('follow') ):
                                while( have_rows('follow') ) : the_row();
                                ?>

                                    <li>
                                        <a href="<?php if(the_sub_field( 'link' )): echo the_sub_field( 'link' ); endif; ?>" target="_blank">
                                            <i class="<?php if(the_sub_field( 'icon_class' )): echo the_sub_field( 'icon_class' ); endif; ?>"></i>
                                        </a>
                                    </li>
                                
                                <?php endwhile; endif; ?> 

                        </ul>
                        <div class="pager">
                            <?php $pager = get_field( 'pager_text' ); ?>
                            <a href="<?php if(get_permalink( get_adjacent_post()->ID )): echo get_permalink( get_adjacent_post()->ID ); endif; ?>">
                                &#60; <?php if($pager['previous']): echo $pager['previous']; endif; ?>
                            </a>
                            <a href="<?php if(get_permalink( get_adjacent_post( false, '', false )->ID )): echo get_permalink( get_adjacent_post( false, '', false )->ID ); endif; ?>" class="ml-auto">
                                <?php if($pager['next']): echo $pager['next']; endif; ?> &#62;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>