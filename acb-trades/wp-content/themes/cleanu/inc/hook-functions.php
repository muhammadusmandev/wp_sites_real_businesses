<?php
// Header Hook function
    if( !function_exists('cleanu_header_cb') ) {
        function cleanu_header_cb( ) {
        	global $cleanu_option;
		    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
		        if( is_page() || is_page_template('template-builder.php') ) {
		            $cleanu_post_id = get_the_ID();

		            // Get the page settings manager
		            $cleanu_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

		            // Get the settings model for current post
		            $cleanu_page_settings_model = $cleanu_page_settings_manager->get_model( $cleanu_post_id );

		            // Retrieve the color we added before
		            $cleanu_header_style = $cleanu_page_settings_model->get_settings( 'cleanu_header_style' );
		            $cleanu_header_builder_option = $cleanu_page_settings_model->get_settings( 'cleanu_header_builder_option' );

		            if( $cleanu_header_style == 'header_builder'  ) {

		                if( !empty( $cleanu_header_builder_option ) ) {
		                    $cleanuheader = get_post( $cleanu_header_builder_option );
		                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $cleanuheader->ID );
		                }
		            } else {
		                // global options
		                $cleanu_header_builder_trigger = $cleanu_option['cleanu_header_options'];
		                if( $cleanu_header_builder_trigger == '2' ) {
		                    $cleanu_global_header_select = get_post( $cleanu_option['cleanu_header_select_options' ] );
		                    $header_post = get_post( $cleanu_global_header_select );
		                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
		                } else {
		                    // wordpress Header
		                    cleanu_global_header_option();
		                }
		            }
		        } else {
		            $cleanu_header_options = $cleanu_option['cleanu_header_options'];
		            if( $cleanu_header_options == '1' ) {
		                cleanu_global_header_option();
		            } else {
		                $cleanu_header_select_options = $cleanu_option['cleanu_header_select_options'];
		                $cleanuheader = get_post( $cleanu_header_select_options );
		                echo '<header>';
		                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $cleanuheader->ID );
		                echo '</header>';
		            }
		        }
		    } else {
		        cleanu_global_header_option();
		    }
	    }
    }


// global header
function cleanu_global_header_option() {
?>
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
                                    'theme_location'  => 'primary',
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
<?php }



// footer content Function
    if( !function_exists('cleanu_footer_content_cb') ) {
        function cleanu_footer_content_cb( ) {
        	global $cleanu_option;	
            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'cleanu_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'cleanu_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'cleanu_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $cleanu_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $cleanu_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $cleanu_footer_builder_trigger = $cleanu_option['cleanu_footer_builder_trigger'];
                            if( $cleanu_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $cleanu_global_footer_select = get_post( $cleanu_option['cleanu_footer_builder_select' ] );
                                $footer_post = get_post( $cleanu_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                cleanu_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $cleanu_footer_builder_trigger = $cleanu_option['cleanu_footer_builder_trigger'];
                    if( $cleanu_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $cleanu_global_footer_select = get_post( $cleanu_option['cleanu_footer_builder_select' ] );
                        $footer_post = get_post( $cleanu_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        cleanu_footer_global_option();
                    }
                }
            } else {
                echo '<footer>';
                    echo '<div class="footer-bottom bg-dark">';
                        echo '<div class="container">';
                            echo '<p class="text-center text-white">'.esc_html__( 'Copyright', 'cleanu' ).' <i class="fal fa-copyright"></i> '.esc_html( date('Y') ).' <a href="'.esc_url( '#' ).'">'.esc_html( 'cleanu', 'cleanu' ).'</a>'.esc_html__( ' All Rights Reserved by', 'cleanu' ).' <a href="'.esc_url('#').'">'.esc_html__( 'Validthemes', 'cleanu' ).'</a></p>';
                        echo '</div>';
                    echo '</div>';
                echo '</footer>';
            }

        }
    } 

    function cleanu_footer_global_option(){
    global $cleanu_option;	
    // cleanu Footer Bottom Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $cleanu_footer_bottom_active = $cleanu_option['cleanu_disable_footer_bottom' ];
    }else{
        $cleanu_footer_bottom_active = '1';
    }


    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );       
    echo '<footer class="bg-theme text-light">';
        if( ( is_active_sidebar( 'footer-sidebar1' ) || is_active_sidebar( 'footer-sidebar2' ) || is_active_sidebar( 'footer-sidebar3' ) || is_active_sidebar( 'footer-sidebar4' ) )) {
            echo '<div class="container">';
                echo '<div class="f-items default-padding">';
                    echo '<div class="row">';
                     if(is_active_sidebar('footer-sidebar1')):
                    echo '<div class="col-lg-4 col-md-6 item">';
                        dynamic_sidebar('footer-sidebar1');
                    echo '</div>';  
                     endif;
                     if(is_active_sidebar('footer-sidebar2')):
                        echo '<div class="col-lg-2 col-md-6 item">';
                            dynamic_sidebar('footer-sidebar2');
                        echo '</div>';
                     endif;
                     if(is_active_sidebar('footer-sidebar3')):
                        echo '<div class="col-lg-3 col-md-6 item">';
                             dynamic_sidebar('footer-sidebar3');
                        echo '</div>';
                     endif;
                     if(is_active_sidebar('footer-sidebar4')):
                        echo '<div class="col-lg-3 col-md-6 item">';
                             dynamic_sidebar('footer-sidebar4');
                        echo '</div>';
                     endif;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

        if( $cleanu_footer_bottom_active == '1' ){
            if( ! empty( $cleanu_option['cleanu_copyright_text' ] ) ){
                echo '<!-- Start Footer Bottom -->';
                echo '<div class="footer-bottom">';
                    echo '<div class="container">';
                    	echo '<div class="footer-bottom-box">';
                        	echo '<div class="row">';
	                            echo '<div class="col-lg-6">';
	                                echo '<p class="text-start">'.wp_kses( $cleanu_option['cleanu_copyright_text' ], $allowhtml ).'</p>';
	                            echo '</div>';
	                            if( has_nav_menu( 'footer-menu' ) ){
	                            	
	                                echo '<div class="col-lg-6 text-right link>';
	                                    wp_nav_menu( array(
	                                        'theme_location'  => 'footer-menu',
	                                    ) );

	                                echo '</div>';
	                            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<!-- End Footer Bottom -->';
            }
        }
    echo '</footer>';
}