<?php
/**
 * Cleanu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cleanu
 */
if ( ! function_exists( 'cleanu_basic_function' ) ) :

    require_once( get_theme_file_path( "/lib/class-tgm-plugin-activation.php" ) );
    require_once get_template_directory() . '/inc/cleanu_navwalker.php';

    if(class_exists('CMB2_Bootstrap_260')){
        require_once(dirname(__FILE__) . '/inc/init.php');
    }

   

    function cleanu_basic_function() {
        load_theme_textdomain( 'cleanu', get_template_directory() . '/languages');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'editor-style' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );

         // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'assets/css/style-editor.css' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'cleanu' ),
        ) );
        
        if( class_exists( 'ReduxFramework' ) ){
            register_nav_menus( array(
                'footer-menu' => esc_html__( 'Footer Copyright Menu', 'cleanu' ),
            ) );
            register_nav_menus( array(
                'onepage' => esc_html__( 'One Page Menu', 'cleanu' ),
            ) );
        }

        add_image_size('cleanu_850x450', 850,450,true);
        add_image_size('cleanu_800x600', 800,600,true);
        add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'video',
            'audio',
        ) );

       
        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        function cleanu_content_width() {
            // This variable is intended to be overruled from themes.
            // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
            // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
            $GLOBALS['content_width'] = apply_filters( 'cleanu_content_width', 640 );
        }
        add_action( 'after_setup_theme', 'cleanu_content_width', 0 );
		add_filter('wpcf7_autop_or_not', '__return_false');
		
		 if(file_exists(dirname(__FILE__) . '/simple/cleanu-config.php')){
            require_once(dirname(__FILE__) . '/simple/cleanu-config.php');
        }
    
    }
    add_action( 'after_setup_theme', 'cleanu_basic_function' );
    endif;

    function cleanu_google_fonts() {
        $font_url = '';

        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'cleanu' ) ) {
            $font_url =  'https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap';
        }
        return $font_url;
    }

    function cleanu_add_script() {
    
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), "1.0" );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), "1.0" );
        wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), "1.0" );
         wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/assets/css/elegant-icons.css', array(), "1.0" );
        wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon-set.css', array(), "1.0" );
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), "1.0" );
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
        wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), "1.0" );
        wp_enqueue_style( 'bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', array(), "1.0" );
        wp_enqueue_style( 'cleanu-core', get_template_directory_uri() . '/assets/css/style.css', array(), "1.0" );
        wp_enqueue_style( 'cleanu-unit', get_template_directory_uri() . '/assets/css/cleanu-unit.css', array(), "1.0" );
        wp_enqueue_style( 'cleanu-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), "1.0");
        wp_enqueue_style( 'cleanu-fonts', cleanu_google_fonts() );
        wp_enqueue_style( 'cleanu-style', get_stylesheet_uri() );
        
        // Js File
        wp_enqueue_script( 'popper-min', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'easing-min', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'imagesloaded-pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'count-to', get_template_directory_uri() . '/assets/js/count-to.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'jquery.event.move.js', get_template_directory_uri() . '/assets/js/jquery.event.move.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'jquery.twentytwenty.js', get_template_directory_uri() . '/assets/js/jquery.twentytwenty.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'cleanu-main-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
          }
        }

    add_action('wp_enqueue_scripts', 'cleanu_add_script', 88 );

    require_once get_template_directory() . '/inc/cleanu_helper.php';
    require_once get_template_directory() . '/inc/cleanu_plugin_activation.php';
    require_once get_template_directory() . '/inc/cleanu_breadcumb.php';
    require_once get_template_directory() . '/inc/cleanu_demo_config.php';
    // require_once get_template_directory() . '/inc/cleanu-header.php';
    require_once get_template_directory() . '/inc/cleanu-header-onepage.php';
    // require_once get_template_directory() . '/inc/cleanu-footer.php';
    require_once get_template_directory() . '/inc/cleanu-custom-meta.php';
    require_once get_template_directory() . '/inc/hooks.php';
    require_once get_template_directory() . '/inc/hook-functions.php';
    require_once get_template_directory() . '/simple/cleanu-color.php';

?>