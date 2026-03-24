<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "cleanu_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Cleanu Options', 'cleanu' ),
        'page_title'           => __( 'Cleanu Options', 'cleanu' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'cleanu' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'cleanu' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'cleanu' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'cleanu' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'cleanu' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'cleanu' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'cleanu' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'cleanu' );
    Redux::set_help_sidebar( $opt_name, $content );

    // -> START Basic Fields
    Redux::setSection($opt_name, array(
        'title'     => __('General Option', 'cleanu'),
        'id'        => 'general-options',
        'icon' => 'el-icon-cogs',
        'fields'    => array(
            array(
               'id'      => 'favicon',
               'title'   => __('Upload  Favicon Logo','cleanu'), 
               'type'    => 'media',
               'default' => array(
                 'url' => get_template_directory_uri().'/assets/img/favicon.png',
               ),
            ), 

            array(
                'id'       => 'breadcumb_position',
                'type'     => 'switch',
                'title'    => __( 'Breadcumb Hide/Show', 'cleanu' ),
                'default'  => 1,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),

            array(
                'id'      => 'breadcumb_bg',
                'title'   => __('Upload Breadcumb Image','cleanu'), 
                'type'    => 'media',
                'required' => array( 'breadcumb_position', '=', '1' ),
            ),
        )
    ));  
     
    Redux::setSection($opt_name, array(
        'title'     => __('Topbar Options', 'cleanu'),
        'id'        => 'topbar-options',
        'icon'      => 'el-icon-paper-clip',
        'fields'    => array(
            array(
                'id'      => 'topbar_working_hrs',
                'type'    => 'text',
                'title'   => __('Working Hours', 'cleanu'),  
            ),
            array(
                'id'       => 'topbar_info',
                'type'     => 'text',
                'title'    => __('Info', 'cleanu'),   
            ),

            array(
                'id'       => 'fb_url',
                'type'     => 'text',
                'title'    => 'Facebook Url',
            ),
            array(
                'id'       => 'twitter_url',
                'type'     => 'text',
                'title'    => 'Twitter Url',
            ),
            array(
                'id'       => 'pinterest_url',
                'type'     => 'text',
                'title'    => 'Pinterest Url',
            ),
            array(
                'id'       => 'linkdin_url',
                'type'     => 'text',
                'title'    => 'Linkedin Url',
            ),
            array(
                'id'       => 'dribbble_url',
                'type'     => 'text',
                'title'    => 'Dribbble Url',
            ),
            array(
                'id'       => 'behance_url',
                'type'     => 'text',
                'title'    => 'Behance Url',
            ),
            array(
                'id'       => 'instagram_url',
                'type'     => 'text',
                'title'    => 'Instagram Url',
            ),
            array(
                'id'       => 'youtube_url',
                'type'     => 'text',
                'title'    => 'Youtube Url'
            )   
        )
    ));

     Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'cleanu' ),
        'id'               => 'cleanu_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'cleanu_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'Prebuilt', 'cleanu' ),
                    "2"         => esc_html__( 'Header Builder', 'cleanu' ),
                ),
                'title'    => esc_html__( 'Header Options', 'cleanu' ),
                'subtitle' => esc_html__( 'Select header options.', 'cleanu' ),
            ),
            array(
                'id'       => 'cleanu_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'cleanu_header'
                ),
                'title'    => esc_html__( 'Header', 'cleanu' ),
                'subtitle' => esc_html__( 'Select header.', 'cleanu' ),
                'required' => array( 'cleanu_header_options', 'equals', '2' )
            ),
        ),
    ) );

    Redux::setSection($opt_name, array(
        'title'     => __('Menu Sidebar Options', 'dustra'),
        'id'        => 'sidebar-options',
        'icon'      => 'el-icon-paper-clip',
        'fields'    => array(
            array(
                'id'       => 'sidemenu_position',
                'type'     => 'switch',
                'title'    => __( 'SideMenu Hide/Show', 'dustra' ),
                'default'  => 1,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'      => 'sb_logo',
                'title'   => __('Sidebar Logo','dustra'), 
                'type'    => 'media',
            ),
            array(
                'title'     => 'Sidebar Content',
                'id'        => 'sb_content',
                'type'      => 'textarea',        
            ),
            array(
                'id'       => 'sb_field_one_text',
                'type'     => 'text',
                'title'    => 'Field One Text',
            ),
            array(
                'id'       => 'sb_field_one_value',
                'type'     => 'text',
                'title'    => 'Field One Value',
            ),
            array(
                'id'       => 'sb_field_two_text',
                'type'     => 'text',
                'title'    => 'Field Two Text',
            ),
            array(
                'id'       => 'sb_field_two_value',
                'type'     => 'text',
                'title'    => 'Field Two Value',
            ),
            array(
                'id'       => 'sb_field_three_text',
                'type'     => 'text',
                'title'    => 'Field Three Text',
            ),
            array(
                'id'       => 'sb_field_three_value',
                'type'     => 'text',
                'title'    => 'Field Three Value',
            ),
            array(
                'id'       => 'sb_subscribe_text',
                'type'     => 'text',
                'title'    => 'Subscribe',
            ),
            array(
                'id'       => 'sb_subscribe_sc',
                'type'     => 'text',
                'title'    => 'Subscribe Shortcode',
            ),   
            
            array(
                'id'       => 'sb_fb_url',
                'type'     => 'text',
                'title'    => 'Facebook Url',
            ),
            array(
                'id'       => 'sb_twitter_url',
                'type'     => 'text',
                'title'    => 'Twitter Url',
            ),
            array(
                'id'       => 'sb_pinterest_url',
                'type'     => 'text',
                'title'    => 'Pinterest Url',
            ),
            array(
                'id'       => 'sb_linkdin_url',
                'type'     => 'text',
                'title'    => 'Linkedin Url',
            ),
            array(
                'id'       => 'sb_dribbble_url',
                'type'     => 'text',
                'title'    => 'Dribbble Url',
            ),
            array(
                'id'       => 'sb_behance_url',
                'type'     => 'text',
                'title'    => 'Behance Url',
            ),
            array(
                'id'       => 'sb_youtube_url',
                'type'     => 'text',
                'title'    => 'Youtube Url',
            ),
        )
    ));  
     
    Redux::setSection($opt_name, array(
        'title'     => __('Blog', 'cleanu'),
        'icon' => 'el-icon-picture',
        'id'        => 'blog-options',
        'fields'    => array(

            array(
                'id'       => 'blog_sidebar',
                'type'     => 'select',
                'title'    => __( 'Select Option', 'cleanu' ),
                'subtitle' => __( 'No validation can be done on this field type', 'cleanu' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'cleanu' ),
            
                'options'  => array(
                    '2' => 'Right Sidebar',
                    '3' => 'No Sidebar',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'content_length',
                'type'     => 'text',
                'title'    => 'Blog Content Length',   
            ),
            array(
                'id'       => 'blog_readmore',
                'type'     => 'text',
                'title'    => 'Blog Read More Text',   
            ),
            array(
                'id'       => 'header_style',
                'type'     => 'select',
                'title'    => __( 'Select Header Style', 'dustra' ),
                'options'  => array(
                    '1' => 'Style One',
                    '2' => 'Style Two',
                    '3' => 'Style Three',
                    '5' => 'Style Four',
                    '4' => 'Default',
                ),
                'default'  => '4',
            ),
            array(
                'id'       => 'footer_style',
                'type'     => 'select',
                'title'    => __( 'Select Footer Style', 'dustra' ),
                'options'  => array(
                    '1' => 'Style One',
                    '2' => 'Style Two',
                ),
                'default'  => '1',
            ),
        )
    ));
    
     Redux::setSection($opt_name, array(
        'title'     => __('404 Options', 'cleanu'),
        'id'        => '404-options',
        'icon'      => 'el-icon-paper-clip',
        'fields'    => array(
            array(
                'id'       => '404_back',
                'type'     => 'text',
                'title'    => 'Background Text',
            ), 
            array(
                'id'       => '404_title',
                'type'     => 'text',
                'title'    => 'Title',   
            ), 
            array(
                'id'       => '404_description',
                'type'     => 'text',
                'title'    => 'Description',
            ), 
        )
    )); 

    Redux::setSection($opt_name, array(
        'title'     => __('Footer Options', 'cleanu'),
        'icon'      =>   'el-icon-credit-card',
        'id'        => 'footer-options',
         'fields'     => array(
            array(
               'id'       => 'cleanu_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','cleanu'),
                   'prebuilt'              => esc_html__('Pre-built Footer','cleanu'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'cleanu' ),
            ),
            array(
               'id'       => 'cleanu_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'cleanu_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'cleanu_footer'
               ),
               'on'       => esc_html__( 'Enabled', 'cleanu' ),
               'off'      => esc_html__( 'Disable', 'cleanu' ),
               'title'    => esc_html__( 'Select Footer', 'cleanu' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'cleanu' )
            ),
            array(
               'id'       => 'cleanu_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'cleanu' ),
               'default'  => 0,
               'on'       => esc_html__( 'Enabled', 'cleanu' ),
               'off'      => esc_html__( 'Disable', 'cleanu' ),
               'required' => array( 'cleanu_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'cleanu_footer_background',
               'type'     => 'background',
               'default'  => '#202942',
               'title'    => esc_html__( 'Footer Background', 'cleanu' ),
               'subtitle' => esc_html__( 'Set footer background.', 'cleanu' ),
               'output'   => array( 'background' => 'footer .bg-theme' ),
               'required' => array( 'cleanu_footerwidget_enable','=','1' ),
            ),
            array(
               'id'       => 'cleanu_footer_background2',
               'type'     => 'color',
               'title'    => esc_html__( 'End Footer Background', 'cleanu' ),
               'required' => array('cleanu_footerwidget_enable','=','1'),
               'output'   => array( 'background'   =>   'footer .f-items .f-item.contact-widget::after' ),
            ),
            array(
               'id'       => 'cleanu_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'cleanu' ),
               'required' => array('cleanu_footerwidget_enable','=','1'),
               'output'   => array( 'footer .f-items .f-item h4' ),
            ),
            array(
               'id'       => 'cleanu_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'cleanu' ),
               'required' => array('cleanu_footerwidget_enable','=','1'),
               'output'   => array( 'footer .f-items .f-item ul > li > a' ),
            ),
            array(
               'id'       => 'cleanu_disable_footer_bottom',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Bottom?', 'cleanu' ),
               'default'  => 1,
               'on'       => esc_html__('Enabled','cleanu'),
               'off'      => esc_html__('Disable','cleanu'),
               'required' => array('cleanu_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'cleanu_footer_bottom_background',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Bottom Background Color', 'cleanu' ),
               'required' => array( 'cleanu_disable_footer_bottom','=','1' ),
               'output'   => array( 'background-color'   =>   '.footer-bottom' ),
            ),
            array(
               'id'       => 'cleanu_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'cleanu' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'cleanu' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'cleanu.','cleanu' ),esc_url('#'),__( 'Validthemes', 'cleanu' ) ),
               'required' => array( 'cleanu_disable_footer_bottom','equals','1' ),
            ),
            array(
                'id'      => 'fotter_bg_one',
                'title'   => __('Background Shape One','cleanu'), 
                'type'    => 'media',
                'required' => array( 'cleanu_disable_footer_bottom','equals','1'),
            ),
            array(
               'id'       => 'cleanu_footer_copyright_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Text Color', 'cleanu' ),
               'subtitle' => esc_html__( 'Set footer copyright text color', 'cleanu' ),
               'required' => array( 'cleanu_disable_footer_bottom','equals','1'),
               'output'   => array( 'footer .footer-bottom p' ),
            ),

            

       ),

    ));

     Redux::setSection($opt_name, array(
        'title' => esc_html__('Styling', 'cleanu') ,
        'id' => esc_html__('cleanu_color_', 'cleanu') ,
        'icon' => 'el-icon-cogs',
        'fields' => array(
        array(
                'id'        => 'main_color_cleanu',
                'title'     => esc_html__( 'Main Theme Color', 'cleanu' ),
                'subtitle'  => esc_html__( 'The main color of the site.', 'cleanu' ),
                'type'      => 'select',
                'options'   => array(
                    '1'     => esc_html__( 'Default', 'cleanu' ),
                    '2'     => esc_html__( 'Custom Colors', 'cleanu' ),
                ),
                'default'   => '1',
                'indent'    => false,
            ),

        array(
                'title'     => esc_html__( 'Choose Primary Color', 'cleanu' ),
                'id'        => 'colorcode',
                'type'      => 'color',
                'default'  => '#FA6943',
                'validate' => 'color',
                'transparent' => false,
                'required'  => array( 'main_color_cleanu', 'equals', '2' ),
        ),
        array(
                'title'     => esc_html__( 'Choose Primary Dark Color', 'cleanu' ),
                'id'        => 'primary_dark',
                'type'      => 'color',
                'default'  => '#06278A',
                'validate' => 'color',
                'transparent' => false,
                'required'  => array( 'main_color_cleanu', 'equals', '2' ),
        ),
        array(
                'title'     => esc_html__( 'Choose Seceondary Color', 'cleanu' ),
                'id'        => 'sec_colorcode',
                'type'      => 'color',
                'default'  => '#00235a',
                'validate' => 'color',
                'transparent' => false,
                'required'  => array( 'main_color_cleanu', 'equals', '2' ),
            )          
        ),
    ));
    
    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'cleanu' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'cleanu' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'cleanu' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    } 
    ?>