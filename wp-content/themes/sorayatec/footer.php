

    <!-- ==============================================
    **Footer**
    =================================================== -->

    <?php 
    $logo = get_field( 'footer_logo' );
    $contact = get_field('contact');
    $privacy_policy = get_field('policy');
    $follow = get_field('follow');
    ?>

    <footer class="footer">
        <div class="container">
            <div class="row top">
                <div class="col-md-4">
                    <a href="<?php echo get_home_url(); ?>" class="foot-logo">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('footer-image')); ?>" alt="" />
                   </a>
                </div>
                <div class="col-md-4 contact">
                    <h4><?php echo get_theme_mod('footer_contact_title'); ?></h4>
                    <a href="mailto:<?php echo get_theme_mod('footer_contact_email'); ?>" class="mail"><?php echo get_theme_mod('footer_contact_email'); ?></a>
                </div>
                <div class="col-md-4">
                    <h4><?php echo get_theme_mod('footer-follow-title'); ?></h4>
                    <ul class="follow-us">
                        <li><a href="<?php echo get_theme_mod('footer_url_setting_1'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="<?php echo get_theme_mod('footer_url_setting_2'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?php echo get_theme_mod('footer_url_setting_3'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo get_home_url(); ?>/privacy-policy/" class="privacy"><?php echo get_theme_mod('footer_privacy_policy_title'); ?></a>
                </div>
                <div class="col-md-4 copyright">
                    <p><?php echo get_theme_mod('footer_copyright_title'); ?></p>
                </div>
            </div>
        </div>
    </footer>

  <?php wp_footer(); ?>

  </div>

</body>
</html>