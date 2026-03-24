<?php
/*
cleanu own hook
 */
if(!function_exists('cleanu_onepage_menu')){
    function cleanu_onepage_menu(){
        global $cleanu_option; 
        $header_menu=get_post_meta( get_the_id(), 'header_style', true);

        if( class_exists( 'ReduxFramework' )){
            $blog_header_style_one = (get_post_type() === 'post' && $cleanu_option['header_style'] == '1');
            $blog_header_style_two = (get_post_type() === 'post' && $cleanu_option['header_style'] == '2');
            $blog_header_style_three = (get_post_type() === 'post' && $cleanu_option['header_style'] == '3');
            $blog_header_style_four = (get_post_type() === 'post' && $cleanu_option['header_style'] == '4');
            $blog_header_style_five = (get_post_type() === 'post' && $cleanu_option['header_style'] == '5');
            $blog_header_style_six = (get_post_type() === 'post' && $cleanu_option['header_style'] == '6');
        }else{
            $blog_header_style_one = '0';
            $blog_header_style_two = '0';
            $blog_header_style_three ='0';
            $blog_header_style_four ='0';
            $blog_header_style_five ='0';
            $blog_header_style_six='0';
        }

    if ($header_menu == '1' || $blog_header_style_one) { ?>
    <!-- Start Header Style One -->
    <div class="top-bar-area multi-content bg-dark text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-3 logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php 
                            global $cleanu_option;
                            if(!empty($cleanu_option['upload_header_logo'] )): ?>
                            <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        <?php endif; ?> 
                    </a>
                </div>
                <div class="col-lg-9 info item-flex space-between">
                    <ul>
                        <?php if(!empty($cleanu_option['header_working_hrs'])):?>
                            <li>
                                <i class="fas fa-clock"></i> <?php echo esc_html($cleanu_option['header_working_hrs']);?>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($cleanu_option['header_info'])):?>
                            <li>
                                <i class="fas fa-envelope-open-text"></i> <?php global $cleanu_option; echo esc_html($cleanu_option['header_info']);?>
                            </li>
                        <?php endif;?>
                    </ul>
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_option['header_fb_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_fb_url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_twitter_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_twitter_url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_linkdin_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_linkdin_url']);?>">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_instagram_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_instagram_url']);?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_pinterest_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_pinterest_url']);?>">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_dribbble_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_dribbble_url']);?>">
                                        <i class="fab fa-dribbble"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_behance_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_behance_url']);?>">
                                        <i class="fab fa-behance"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_youtube_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_youtube_url']);?>">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="home">

        <div class="container box-nav">
            <div class="row">
                <!-- Start Navigation -->
                <nav class="navbar top-less logo-less white navbar-default navbar-fixed dark bootsnav on no-full nav-box no-background">

                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input name="s" type="text" class="form-control"  value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search','cleanu'); ?>">
                                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Top Search -->

                    <div class="container nav-container">
                        <div class="row">
                            <!-- Start Header Navigation -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php 
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['upload_header_logo'])): ?>
                                        <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                        <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php endif; ?> 
                                </a>

                            </div>
                            <!-- End Header Navigation -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="col-lg-9">
                                <div class="collapse navbar-collapse" id="navbar-menu">
                                    <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'onepage',
                                            'container'       => 'ul',
                                            'menu_class'      => 'nav navbar-nav navbar-left',
                                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker'          => new WP_Bootstrap_Navwalker(),
                                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <!-- /.navbar-collapse -->

                            <!-- Start Atribute Navigation -->
                            <div class="col-lg-3">
                                <div class="attr-nav">
                                    <ul>
                                        <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                                    </ul>
                                </div> 
                            </div>       
                            <!-- End Atribute Navigation -->
                        </div>

                    </div>
                </nav>
                <!-- End Navigation -->
            </div>
        </div>

    </header>
    <!-- End Header Style One -->

    <?php }elseif ( $header_menu == '2' || $blog_header_style_two){?>
    <!-- Start Header Style Two -->    
    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area inc-pad bg-gray inc-shape">
        <div class="container-fill">
            <div class="row align-center">
                <div class="col-lg-5 offset-lg-3 info">
                    <ul>
                        <?php if(!empty($cleanu_option['header_working_hrs'])):?>
                            <li>
                                <i class="fas fa-clock"></i> <?php echo esc_html($cleanu_option['header_working_hrs']);?>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($cleanu_option['header_working_hrs'])):?>
                            <li>
                                <i class="fas fa-envelope-open-text"></i> <?php global $cleanu_option; echo esc_html($cleanu_option['header_info']);?>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-lg-4 text-right item-flex">
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_option['header_fb_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_fb_url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_twitter_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_twitter_url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_linkdin_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_linkdin_url']);?>">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_instagram_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_instagram_url']);?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_pinterest_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_pinterest_url']);?>">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_dribbble_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_dribbble_url']);?>">
                                        <i class="fab fa-dribbble"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_behance_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_behance_url']);?>">
                                        <i class="fab fa-behance"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_youtube_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_youtube_url']);?>">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky nav-full-width dark bootsnav">

            <div class="container-fill">

                <div class="row align-center">
                    

                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php 
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['upload_header_logo'])): ?>
                                    <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php endif; ?> 
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-6">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'onepage',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->

                    <!-- Start Atribute Navigation -->
                    <div class="col-lg-3">
                        <div class="attr-nav">
                            <div class="call">
                                <div class="icon">
                                    <?php 
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['header_phone_logo'])): ?>
                                        <img src="<?php echo esc_url($cleanu_option['header_phone_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                        <?php endif; ?>
                                </div>
                                <div class="info">
                                    <?php if(!empty($cleanu_option['header_contact_text'])):?>
                                    <span><?php echo esc_html($cleanu_option['header_contact_text']);?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($cleanu_option['header_contact_number'])):?>
                                    <h5><?php echo esc_html($cleanu_option['header_contact_number']);?></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div> 
                    </div>       
                    <!-- End Atribute Navigation -->

                </div>

            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Two -->

    <?php }elseif( $header_menu == '3' || $blog_header_style_three ){?>

    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area inc-pad bg-theme text-light inc-shape">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 info">
                    <ul>
                        <?php if(!empty($cleanu_option['topbar_info'])):?>
                            <li>
                                <i class="fas fa-envelope-open-text"></i> <?php global $cleanu_option; echo esc_html($cleanu_option['topbar_info']);?>
                            </li>
                        <?php else:?>
                            <li>
                                <i class="fas fa-envelope-open-text"></i> <?php echo esc_html__("Info@gmail.com",'cleanu-core');?>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($cleanu_option['topbar_info'])):?>
                            <li>
                                <i class="fas fa-clock"></i> <?php global $cleanu_option; echo esc_html($cleanu_option['topbar_working_hrs']);?>
                            </li>
                        <?php else:?>
                            <li>
                                <i class="fas fa-clock"></i> <?php echo esc_html__("Working Hours: 8:00 AM – 7:45 PM",'cleanu-core');?>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-lg-4 text-right item-flex">
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_option['fb_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['fb_url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['twitter_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['twitter_url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['linkdin_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['linkdin_url']);?>">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['instagram_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['instagram_url']);?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['pinterest_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['pinterest_url']);?>">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['dribbble_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['dribbble_url']);?>">
                                        <i class="fab fa-dribbble"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['behance_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['behance_url']);?>">
                                        <i class="fab fa-behance"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['youtube_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['youtube_url']);?>">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->    
    <!-- Start Header Style Three -->
    <header id="home" class="common">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-regular navbar-common bootsnav">
            <div class="container">
                <div class="row align-center">
                    
                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url();?>">
                                <?php 
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['upload_header_logo'])): ?>
                                    <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php endif; ?> 
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-9">
                        <div class="collapse navbar-collapse navbar-right" id="navbar-menu">
                           <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'onepage',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Three -->

    <?php }elseif( $header_menu == '4' || $blog_header_style_four ){?>

    <!-- Start Header Style Four -->
    <header id="home" class="common">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-regular navbar-common bootsnav">
            <div class="container">
                <div class="row align-center">
                    
                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url();?>">
                                <?php 
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['upload_header_logo'])): ?>
                                    <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <?php endif; ?> 
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-9">
                        <div class="collapse navbar-collapse navbar-right" id="navbar-menu">
                           <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'onepage',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Four -->
    <?php }elseif( $header_menu == '5' || $blog_header_style_five ){?>

    <!-- Start Header Style Five
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

            <div class="container">

                <div class="row align-center">
                    

                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url();?>">
                                <?php 
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['upload_header_logo_light'])): ?>
                                    <img src="<?php echo esc_url($cleanu_option['upload_header_logo_light']['url']); ?>" class="logo logo-display" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                <?php endif; ?> 
                                <?php 
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['upload_header_logo'])): ?>
                                    <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo logo-scrolled" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                <?php endif; ?> 
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-6">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'onepage',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->

                    <!-- Start Atribute Navigation -->
                    <div class="col-lg-3">
                        <div class="attr-nav">
                            <div class="call">
                                <div class="icon">
                                    <?php 
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['header_phone_logo'])):
                                    ?>
                                        <img src="<?php echo esc_url($cleanu_option['header_phone_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                        <?php endif; ?>
                                </div>
                                <div class="info">
                                    <?php if(!empty($cleanu_option['header_contact_text'])):?>
                                    <span><?php echo esc_html($cleanu_option['header_contact_text']);?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($cleanu_option['header_contact_number'])):?>
                                    <h5><?php echo esc_html($cleanu_option['header_contact_number']);?></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div> 
                    </div>       
                    <!-- End Atribute Navigation -->

                </div>

            </div>
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header Style Five -->
    <?php }elseif( $header_menu == '6' || $blog_header_style_six ){?>
    <!-- Start Header Style Six -->
    <div class="top-bar-area fixed text-light multi-content">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-12 info item-flex space-between">
                     <ul>
                       <?php if(!empty($cleanu_option['header_working_hrs'])):?>
                            <li>
                                <i class="fas fa-clock"></i> <?php echo esc_html($cleanu_option['header_working_hrs']);?>
                            </li>
                        <?php endif;?>
                    </ul>
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_option['header_fb_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_fb_url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_twitter_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_twitter_url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_linkdin_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_linkdin_url']);?>">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_instagram_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_instagram_url']);?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_pinterest_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_pinterest_url']);?>">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_dribbble_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_dribbble_url']);?>">
                                        <i class="fab fa-dribbble"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_behance_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_behance_url']);?>">
                                        <i class="fab fa-behance"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['header_youtube_url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_option['header_youtube_url']);?>">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="home">

        <div class="container box-nav">
            <div class="row">
                <!-- Start Navigation -->
                <nav class="navbar top-less navbar-default navbar-fixed dark bootsnav on no-full nav-box no-background bg-white">

                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input name="s" type="text" class="form-control"  value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search','cleanu'); ?>">
                                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Top Search -->

                    <div class="container nav-container">
                        <div class="row d-flex align-center">
                            <!-- Start Header Navigation -->
                            <div class="col-lg-3">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php 
                                            global $cleanu_option;
                                            if(!empty($cleanu_option['upload_header_logo'])): ?>
                                            <img src="<?php echo esc_url($cleanu_option['upload_header_logo']['url']); ?>" class="logo" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                                            <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri() .'/assets/img/logo.svg' ;?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                        <?php endif; ?> 
                                    </a>
                                </div>
                            </div>
                            <!-- End Header Navigation -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="col-lg-7">
                                <div class="collapse navbar-collapse" id="navbar-menu">
                                    <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'onepage',
                                            'container'       => 'ul',
                                            'menu_class'      => 'nav navbar-nav',
                                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker'          => new WP_Bootstrap_Navwalker(),
                                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <!-- /.navbar-collapse -->

                            <!-- Start Atribute Navigation -->
                            <div class="col-lg-2 right-bar">
                                <div class="attr-nav">
                                    <ul>
                                        <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                                        <?php
                                            if( !empty($cleanu_option['sidemenu_position']) || $cleanu_option['sidemenu_position'] == 1 ) :
                                        ?>
                                        <li class="side-menu">
                                            <a href="#">
                                                <span class="bar-1"></span>
                                                <span class="bar-2"></span>
                                                <span class="bar-3"></span>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div> 
                            </div>       
                            <!-- End Atribute Navigation -->
                        </div>

                    </div>
                    <?php
                        if( !empty($cleanu_option['sidemenu_position']) || $cleanu_option['sidemenu_position'] == 1 ) :
                    ?>
                    <!-- Start Side Menu -->
                    <div class="side">
                        <a href="#" class="close-side"><i class="icon_close"></i></a>
                        <div class="widget">
                            <?php
                            global $cleanu_option;
                            if(!empty($cleanu_option['sb_logo']['url'] )):?>
                            <img src="<?php echo esc_url($cleanu_option['sb_logo']['url']); ?>" alt="<?php echo esc_attr__( 'cleanu', 'cleanu' ); ?>">
                            <?php endif; ?>
                            <?php
                            global $cleanu_option;
                            if(!empty($cleanu_option['sb_content'] ) || !empty($cleanu_option['sb_content'])):?>
                               <p><?php echo esc_html($cleanu_option['sb_content']);?></p>
                            <?php endif; ?> 
                        </div>
                        <div class="widget address">
                            <div>
                                <ul>
                                    <?php
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['sb_field_one_value'] )):
                                    ?>
                                    <li>
                                        <div class="content">
                                            <p><?php echo esc_html($cleanu_option['sb_field_one_text']);?></p> 
                                            <strong><?php echo esc_html($cleanu_option['sb_field_one_value']);?></strong>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['sb_field_two_value'] )):
                                    ?>
                                    <li>
                                        <div class="content">
                                            <p><?php echo esc_html($cleanu_option['sb_field_two_text']);?></p> 
                                            <strong><?php echo esc_html($cleanu_option['sb_field_two_value']);?></strong>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php
                                        global $cleanu_option;
                                        if(!empty($cleanu_option['sb_field_three_value'] )):
                                    ?>
                                    <li>
                                        <div class="content">
                                            <p><?php echo esc_html($cleanu_option['sb_field_three_text']);?></p> 
                                            <strong><?php echo esc_html($cleanu_option['sb_field_three_value']);?></strong>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget newsletter">
                            <?php if(!empty($cleanu_option['sb_subscribe_text'])):?>
                            <h4 class="title"><?php echo esc_html($cleanu_option['sb_subscribe_text']);?></h4>
                            <?php endif;?>
                            <?php if(!empty($cleanu_option['sb_subscribe_sc'])):?>
                            <?php echo do_shortcode($cleanu_option['sb_subscribe_sc']); ?>
                            <?php endif;?>
                        </div>
                        <div class="widget social">
                            <ul class="link">
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_fb_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_fb_url']); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_twitter_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_twitter_url']); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_linkdin_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_linkdin_url']); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_pinterest_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_pinterest_url']); ?>"><i class="fab fa-pinterest"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_behance_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_behance_url']); ?>"><i class="fab fa-behance"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_dribbble_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_dribbble_url']); ?>"><i class="fab fa-dribbble"></i></a></li>
                                <?php endif; ?>
                                <?php
                                    global $cleanu_option;
                                    if(!empty($cleanu_option['sb_youtube_url'])):
                                ?>
                                    <li><a href="<?php echo esc_url($cleanu_option['sb_youtube_url']); ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End Side Menu -->
                    <?php endif; ?>
                </nav>
                <!-- End Navigation -->
            </div>
        </div>

    </header>
    <!-- End Header Style Six -->   
    <?php }else{?>

    <!-- Start Header Style Default -->    
    <header id="home" class="common">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-regular navbar-common bootsnav">
            <div class="container">
                <div class="row align-center">
                    
                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url();?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" class="logo" alt="<?php echo esc_attr__("cleanu",'cleanu' ) ?>">
                            </a>
                        </div>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-9">
                        <div class="collapse navbar-collapse navbar-right" id="navbar-menu">
                           <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'onepage',
                                    'container'       => 'ul',
                                    'menu_class'      => 'nav navbar-nav',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>'
                                ));
                            ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header Style Default -->       
    <?php
       }
    }
}
add_action( 'cleanu_header_onepage', 'cleanu_onepage_menu', 21 );
?>