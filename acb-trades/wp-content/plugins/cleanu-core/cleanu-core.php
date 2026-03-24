<?php
/**
 * Plugin Name: Cleanu Core
 * Plugin URI: https://themeforest.net/user/droitthemes/portfolio
 * Description: This plugin adds the core features to the Cleanu WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 1.0
 * Author: ValidThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: cleanu-core
 */

if ( !defined('ABSPATH') )
    die('-1');

define( 'Cleanu_Core_POST_DIR', plugin_dir_path( __FILE__ ) );
define( 'CLEANU_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Cleanu_core' ) ) {
	/**
	 * Main Cleanu Core Class s
	 *
	 * The main class that initiates and runs the Cleanu Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class Cleanu_core {
		/**
		 * Cleanu Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Cleanu_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Cleanu_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Cleanu_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'cleanu-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'cleanu-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Cleanu Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'Cleanu_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Elementor custom field icons
			require_once __DIR__ . '/inc/cleanu-icons.php';
			require_once __DIR__ . '/inc/cleanu-recent-post.php';
			require_once __DIR__ . '/inc/cleanu-service-image.php';
			require_once __DIR__ . '/inc/cleanu-service-brochure.php';
			require_once __DIR__ . '/inc/cleanu-plugin-functions.php';
			require_once __DIR__ . '/inc/builder/builder.php';
			// // Custom post types;
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'cleanu-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init Cleanu Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Cleanu Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'cleanu-core' ),
				'<strong>' . esc_html__( 'Cleanu core', 'cleanu-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'cleanu-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Cleanu Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cleanu-core' ),
				'<strong>' . esc_html__( 'Cleanu Core', 'cleanu-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'cleanu-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		
		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Cleanu Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'cleanu-elements', [
				'title' => __( 'Cleanu Elements', 'cleanu-core' ),
			], 1 );
		}
		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'mainjs', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}
		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {
            wp_enqueue_style( 'cleanu-flaticons', plugins_url( 'assets/vendors/flaticon/flaticon-set.css', __FILE__ ) );
		}

		/**
		 * Register New Widgets
		 *
		 * Include Cleanu Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Cleanu Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
			require_once( __DIR__ . '/widgets/cleanu-slider-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-service-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-estimate-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-featured-coursel-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-choose-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-workprocess-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-funfactor-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-team-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-project-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-testimonial-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-blog-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-features-image-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-pricing-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-contact-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-featured-two-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-appoinment-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-appoinment-form-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-about-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-about-content-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-header-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-project-info-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-shape.php');
			require_once( __DIR__ . '/widgets/cleanu-team-single-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-heading-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-faq-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-process-widget.php');
			require_once( __DIR__ . '/widgets/cleanu-service-details.php');
			require_once( __DIR__ . '/widgets/cleanu-request-electrician-widget.php');
        }
			
		/**
		 * Register Widgets
		 *
		 * Register Cleanu Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Slider_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Service_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Estimate_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Featured_Coursel_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Choose_Us_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Workprocess_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Funfactor_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Team_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Project_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Blog_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Featured_Image_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Pricing_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Contact_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Featured_Two_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Appointment_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Appointment_Form_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_About_Image_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_About_Content_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Header_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Project_Info_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Shape_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Team_Single_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Cleanu_Heading_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_FAQ_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Service_Details_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Process_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Request_Electrician_Widget() );
		}
	}
} 
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'Cleanu_core_load' ) ) {
	/**
	 * Load Cleanu Core
	 *
	 * Main instance of Cleanu_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function Cleanu_core_load() {
		return Cleanu_core::instance();
	}

	// Run Cleanu Core 
    Cleanu_core_load();
}

function cleanu_mime_types( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svgz+xml';
        $mimes['exe'] = 'program/exe';
        $mimes['dwg'] = 'image/vnd.dwg';
        return $mimes;
    }
add_filter('upload_mimes', 'cleanu_mime_types');