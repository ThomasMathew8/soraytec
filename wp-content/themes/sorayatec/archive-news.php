<?php get_header(); ?> 

<?php echo do_shortcode('[sp_news grid="list" limit="3" pagination_type="numeric" content_words_limit="20"]'); ?>



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


<?php get_footer(); ?>