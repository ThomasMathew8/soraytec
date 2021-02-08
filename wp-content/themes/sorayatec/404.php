<?php get_header(); ?> 

<div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <div class="Error404">

             <header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'sorayatec' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sorayatec' ); ?></p>

					<?php get_search_form(); ?>
                </div><!-- .page-content -->
                
			</div><!-- .page-wrapper -->

        </div>
        
    </main>

</div>


<?php get_footer(); ?>