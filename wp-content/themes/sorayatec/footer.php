<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sorayatec
 */

?>

    <!-- ==============================================
    **Footer**
    =================================================== -->

    <footer class="footer">
        <div class="container">
            <div class="row top">
                <div class="col-md-4">

                    <?php if(get_field('footer_logo', 'option')): ?>
                        <a href="<?php echo get_home_url(); ?>" class="foot-logo">
                            <img src="<?php echo get_field('footer_logo', 'option')['url']; ?>" alt="" />
                        </a>
                    <?php endif; ?>

                </div>
                <div class="col-md-4 contact">
                    <h4><?php _e('Contact', 'Sorayatec'); ?></h4>
                    <a href="mailto:<?php if(get_field('contact_email', 'option')): the_field('contact_email', 'option'); endif; ?>" class="mail">
                        <?php if(get_field('contact_email', 'option')): the_field('contact_email', 'option'); endif; ?>
                    </a>
                </div>
                <div class="col-md-4">
                    <h4><?php _e('Follow Us', 'Sorayatec') ?></h4>

                    <?php if( have_rows('follow', 'option') ): ?>
                        <ul class="follow-us">
                            <?php while( have_rows('follow', 'option') ): the_row(); ?>
                                <li>
                                    <a href="<?php if(get_sub_field('link')): the_sub_field('link'); endif; ?>" target="_blank">
                                        <i class="<?php if(get_sub_field('icon_class')): the_sub_field('icon_class'); endif;?>"></i>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>  

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                <?php if(get_field('privacy_policy_link', 'option')): ?>
                    <a href="<?php echo get_field('privacy_policy_link', 'option')['url']; ?>"  class="privacy">
                        <?php echo get_field('privacy_policy_link', 'option')['title'];  ?>
                    </a>
                <?php endif; ?>

                </div>
                <div class="col-md-4 copyright">
                    <p><?php if(get_field('copyright', 'option')): the_field('copyright', 'option'); endif; ?></p>
                </div>
            </div>
        </div>
    </footer>

  </div><!-- main -->

<?php wp_footer(); ?>

</body>
</html>