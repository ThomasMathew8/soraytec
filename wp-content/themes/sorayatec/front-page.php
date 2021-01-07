<?php get_header(); ?> 

<div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <!-- ==============================================
    **Banner**
    =================================================== -->
    
    <?php 
    $primary = get_field( 'primary_info' );
    $primary_img = $primary[ 'primary_info_img' ];
    ?> 
    
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $primary['primary_info_title']; ?></h1>
                    <p><?php echo $primary['primary_info_desc']; ?></p>
                </div>
                <div class="col-md-6 right">
                    <figure>
                        <img src="<?php echo $primary_img['url']; ?>" >
                    </figure>
                </div>
            </div>
        </div> 
    </div>

    <!-- ==============================================
    **About**
    =================================================== -->
    <section class="about-sec">
        <!-- Vision -->
   
        <?php 
        $vision = get_field( 'vision' );
        $vision_img = $vision[ 'vision_img' ];
        ?>

            <div class="vision">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 order-md-1">
                            <div class="inner">
                                <h2><?php echo $vision['vision_title']; ?></h2>
                                <p><?php echo $vision['vision_desc']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure><img src="<?php echo $vision_img['url']; ?>" class="rounded-circle" alt=""></figure>
                        </div>
                    </div>
                </div>
        </div>
     
    
        <!-- Mission -->

        <?php 
        $mission = get_field( 'mission' );
        $mission_img = $mission[ 'mission_img' ];
        ?>

        <div class="vision mission">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-right">
                        <div class="inner">
                            <h2><?php echo $mission['mission_title']; ?></h2>
                            <p><?php echo $mission['mission_desc']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <figure><img src="<?php echo $mission_img['url'];?>" class="rounded-circle" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- Values -->

        <?php 
        $values = get_field( 'values' );
        $values_img = $values[ 'values_img' ];
        ?>

        <div class="vision values">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 order-md-1">
                        <div class="inner">
                            <h2><?php echo $values['values_title']; ?></h2>
                            <p><?php echo $values['values_desc']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <figure><img src="<?php echo $values_img['url'];?>" class="rounded-circle" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
    **Soraytec Ecosystem**
    =================================================== -->
    <section class="soraytec-ecosystem">
        <div class="container">
            <h2>SORAYTEC ECOSYSTEM</h2>
            <ul class="row logos-list">
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.usn.no/english/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo1.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="http://en.greenbusiness.no/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo2.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.proventia.no/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo3.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.innovasjonnorge.no/en/start-page/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo4.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.regionaleforskningsfond.no/oslofjordfondet/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo5.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.vig.no/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo6.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.climate-kic.org/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo7.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.skagerakenergi.no/frontpage/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo8.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.le.lt/index.php?lang=2" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo9.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://ec.europa.eu/programmes/horizon2020/en" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo10.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.kragerøenergi.net/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo11.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://erigrid.eu/" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo12.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="#" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo13.jpg" alt=""></a>
                </li>
                <li class="col-sm-6 col-md-4">
                    <a href="https://www.eso.lt/en/home.html" target="_blank"><img src="<?php bloginfo("template_directory");?>/assets/images/se-logo14.jpg" alt=""></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
    **Signup Newsletter**
    =================================================== -->
    <section class="signup-sec">
        <div class="container">
            <div class="inner">
                <h2>Sign up to our newsletter</h2>
                <form class="form-inline signup-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email*">
                    </div>
                    <button type="submit" class="btn btn-signup">SIGN UP</button>
                </form>
            </div>
        </div>
    </section>


    </main>

</div>



<?php get_footer(); ?>