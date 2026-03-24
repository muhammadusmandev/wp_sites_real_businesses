<?php
    /**
     * Class For Builder
     */
    class CleanuBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'cleanu_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'cleanu-core',CLEANU_PLUGDIRURI.'assets/js/cleanu-core.js',array( 'jquery' ),'1.0',true );
		}


        public function cleanu_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'cleanu_header_option',
                [
                    'label'     => __( 'Header Option', 'cleanu' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'cleanu_header_style',
                [
                    'label'     => __( 'Header Option', 'cleanu' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'cleanu' ),
    					'header_builder'       => __( 'Header Builder', 'cleanu' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'cleanu_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'cleanu' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->cleanu_header_choose_option(),
                    'condition' => [ 'cleanu_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'cleanu_footer_option',
                [
                    'label'     => __( 'Footer Option', 'cleanu' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'cleanu_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'cleanu' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'cleanu' ),
    				'label_off'     => __( 'No', 'cleanu' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'cleanu_footer_style',
                [
                    'label'     => __( 'Footer Style', 'cleanu' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'cleanu' ),
    					'footer_builder'       => __( 'Footer Builder', 'cleanu' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'cleanu_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'cleanu_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'cleanu' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->cleanu_footer_choose_option(),
                    'condition' => [ 'cleanu_footer_style' => 'footer_builder','cleanu_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Cleanu Builder', 'cleanu' ),
            	esc_html__( 'Cleanu Builder', 'cleanu' ),
				'manage_options',
				'cleanu',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('cleanu', esc_html__('Footer Builder', 'cleanu'), esc_html__('Footer Builder', 'cleanu'), 'manage_options', 'edit.php?post_type=cleanu_footer');
			add_submenu_page('cleanu', esc_html__('Header Builder', 'cleanu'), esc_html__('Header Builder', 'cleanu'), 'manage_options', 'edit.php?post_type=cleanu_header');
            add_submenu_page('cleanu', esc_html__('Tab Builder', 'cleanu'), esc_html__('Tab Builder', 'cleanu'), 'manage_options', 'edit.php?post_type=cleanu_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','cleanu' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'cleanu' ),
				'singular_name'      => __( 'Footer', 'cleanu' ),
				'menu_name'          => __( 'cleanu Footer Builder', 'cleanu' ),
				'name_admin_bar'     => __( 'Footer', 'cleanu' ),
				'add_new'            => __( 'Add New', 'cleanu' ),
				'add_new_item'       => __( 'Add New Footer', 'cleanu' ),
				'new_item'           => __( 'New Footer', 'cleanu' ),
				'edit_item'          => __( 'Edit Footer', 'cleanu' ),
				'view_item'          => __( 'View Footer', 'cleanu' ),
				'all_items'          => __( 'All Footer', 'cleanu' ),
				'search_items'       => __( 'Search Footer', 'cleanu' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'cleanu' ),
				'not_found'          => __( 'No Footer found.', 'cleanu' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'cleanu' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'cleanu_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'cleanu' ),
				'singular_name'      => __( 'Header', 'cleanu' ),
				'menu_name'          => __( 'cleanu Header Builder', 'cleanu' ),
				'name_admin_bar'     => __( 'Header', 'cleanu' ),
				'add_new'            => __( 'Add New', 'cleanu' ),
				'add_new_item'       => __( 'Add New Header', 'cleanu' ),
				'new_item'           => __( 'New Header', 'cleanu' ),
				'edit_item'          => __( 'Edit Header', 'cleanu' ),
				'view_item'          => __( 'View Header', 'cleanu' ),
				'all_items'          => __( 'All Header', 'cleanu' ),
				'search_items'       => __( 'Search Header', 'cleanu' ),
				'parent_item_colon'  => __( 'Parent Header:', 'cleanu' ),
				'not_found'          => __( 'No Header found.', 'cleanu' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'cleanu' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'cleanu_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'cleanu' ),
				'singular_name'      => __( 'Tab Builder', 'cleanu' ),
				'menu_name'          => __( 'cleanu Tab Builder', 'cleanu' ),
				'name_admin_bar'     => __( 'Tab Builder', 'cleanu' ),
				'add_new'            => __( 'Add New', 'cleanu' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'cleanu' ),
				'new_item'           => __( 'New Tab Builder', 'cleanu' ),
				'edit_item'          => __( 'Edit Tab Builder', 'cleanu' ),
				'view_item'          => __( 'View Tab Builder', 'cleanu' ),
				'all_items'          => __( 'All Tab Builder', 'cleanu' ),
				'search_items'       => __( 'Search Tab Builder', 'cleanu' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'cleanu' ),
				'not_found'          => __( 'No Tab Builder found.', 'cleanu' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'cleanu' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'cleanu_tab_builder', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'cleanu_footer' == $post->post_type || 'cleanu_header' == $post->post_type || 'cleanu_tab_builder' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function cleanu_footer_choose_option(){

			$cleanu_post_query = new WP_Query( array(
				'post_type'			=> 'cleanu_footer',
				'posts_per_page'	    => -1,
			) );

			$cleanu_builder_post_title = array();
			$cleanu_builder_post_title[''] = __('Select a Footer','cleanu');

			while( $cleanu_post_query->have_posts() ) {
				$cleanu_post_query->the_post();
				$cleanu_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $cleanu_builder_post_title;

		}

		public function cleanu_header_choose_option(){

			$cleanu_post_query = new WP_Query( array(
				'post_type'			=> 'cleanu_header',
				'posts_per_page'	    => -1,
			) );

			$cleanu_builder_post_title = array();
			$cleanu_builder_post_title[''] = __('Select a Header','cleanu');

			while( $cleanu_post_query->have_posts() ) {
				$cleanu_post_query->the_post();
				$cleanu_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $cleanu_builder_post_title;

        }

    }

    $builder_execute = new CleanuBuilder();