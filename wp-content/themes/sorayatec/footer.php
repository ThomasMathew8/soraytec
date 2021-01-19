

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
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('basic-footer-image')); ?>" alt="" />
                   </a>
                </div>
                <div class="col-md-4 contact">
                    <h4><?php echo $contact['contact_title']; ?></h4>
                    <a href="<?php echo $contact['contact_link']; ?>" class="mail"><?php echo $contact['contact_text']; ?></a>
                </div>
                <div class="col-md-4">
                    <h4>Follow Us</h4>
                    <ul class="follow-us">
                        <li><a href="https://in.linkedin.com/company/soraytec" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://twitter.com/hashtag/soraytec" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                     <?php $link = get_permalink( get_page_by_title( 'PRIVACY POLICY' ) ); ?>
                    <a href="<?php echo $link; ?>" class="privacy"><?php echo $privacy_policy['privacy_policy_text'] ?></a>
                </div>
                <div class="col-md-4 copyright">
                    <p><?php echo get_field('copyright'); ?></p>
                </div>
            </div>
        </div>
    </footer>

  <?php wp_footer(); ?>

  </div>

</body>
</html>