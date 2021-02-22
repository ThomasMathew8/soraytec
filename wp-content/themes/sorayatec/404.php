<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sorayatec
 */

get_header();
?>

<section class="inner-outer posts-outer">
	<div class="top-post">
		<div class="container">

        <article class="error-404">

             <header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'sorayatec' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sorayatec' ); ?></p>

					<?php get_search_form(); ?>
                </div><!-- .page-content -->
                
			</div><!-- .page-wrapper -->

		</article>
		</div>    
    </div>
</section>


<?php get_footer(); ?>