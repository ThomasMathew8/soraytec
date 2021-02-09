<?php get_header(); ?> 

<section class="inner-outer posts-outer">

    <div class="top-post">
                
        <div class="container">

            <?php if( have_posts() ):  while( have_posts() ):  the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h1><a href="<?php echo get_permalink(); ?>"><?php echo strtoupper(get_the_title()); ?></a></h1>
        
                    <p><?php echo the_content(); ?></p>

                </article>

            <?php endwhile; endif; ?> 
            
        </div>    

    </div>

</section>

<?php get_footer(); ?>