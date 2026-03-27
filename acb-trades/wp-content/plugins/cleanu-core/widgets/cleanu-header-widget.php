<?php
	/**
	* Elementor Header Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Header_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Header widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'cleanu_header';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Header', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	* Get widget categories.
	*
	* Retrieve the list of categories the Service widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements'];
	}

	public function get_script_depends() {
        return array('main');
    }

	// Add The Input For User
	protected function register_controls(){
		

		$this->start_controls_section(
			'cleanu_header_content',
			[
				'label'		=> esc_html__( 'Set Header Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
            'style',
            [
                'label'     => esc_html__( 'Header Style', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '2',
                'options'   => [
                    '1'     => esc_html__( 'Style One', 'cleanu-core' ),
                    '2'     => esc_html__( 'Style Two', 'cleanu-core' ),
                    '3'     => esc_html__( 'Style Three', 'cleanu-core' ),
                    '4'     => esc_html__( 'Style Four', 'cleanu-core' ),
                    '5'     => esc_html__( 'Style Five', 'cleanu-core' ),
                    '6'     => esc_html__( 'Style Six', 'cleanu-core' ),
                ],
            ]
        );
        $this->add_control(
            'topbar_logo',
            [
                'label'         => esc_html__( 'Topbar Logo','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'style' => ['1','2']
                ],
            ]
        );
        
        $this->add_control(
            'header_fixed_logo',
            [
                'label'         => esc_html__( 'Fixed Logo','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'style' => ['3','4','5','6']
                ]
            ]
        );
        
        $this->add_control(
            'header_scroll_logo',
            [
                'label'         => esc_html__( 'Scroll Logo','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'style' => '3'
                ]
            ]
        );

        $this->add_control(
            'topbar_logo_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'topbar_info', [
                'label'         => esc_html__( 'Topbar Info', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_style',
            [
                'label'     => esc_html__( 'Icon Style', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'     => esc_html__( 'Flaticon', 'cleanu-core' ),
                    '3'     => esc_html__( 'Icon Image', 'cleanu-core' ),
                    '4'     => esc_html__( 'Custom Icon', 'cleanu-core' ),
                ],
            ]
        );

        $repeater->add_control(
            'flat_icon_one',
            [
                'label'      => esc_html__('Flat Icon', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => cleanu_flaticons(),
                'include'    => cleanu_include_flaticons(),
                'default'    => 'flaticon-location',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
        );

        $repeater->add_control(
            'icon_image',
            [
                'label'         => esc_html__( 'Add Image Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'icon_style' => '3'
                ]
            ]
        );

        $repeater->add_control(
            'custom_icon',
            [
                'label'         => esc_html__( 'Add Custom Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_style' => '4'
                ]
            ]
        );
        
        $this->add_control(
            'topbar_info_list',
            [
                'label'     => esc_html__( 'Topabr Info List', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Topabr Info List', 'cleanu-core' ),
                    ],
                ],
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
                'title_field' => '{{{ topbar_info }}}',
            ]
        );

        $this->add_control(
            'topbar_info_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );

        $this->add_control(
            'topbar_fb_link',
            [
                'label'         => esc_html__( 'Topabr Facebook Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_tw_link',
            [
                'label'         => esc_html__( 'Topabr Twitter Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_le_link',
            [
                'label'         => esc_html__( 'Topabr Linkedin Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_in_link',
            [
                'label'         => esc_html__( 'Topabr Instagram Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_dr_link',
            [
                'label'         => esc_html__( 'Topabr Dribbble Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_be_link',
            [
                'label'         => esc_html__( 'Topabr Behance Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                   'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_yt_link',
            [
                'label'         => esc_html__( 'Topabr Youtube Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition' => [
                   'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'topbar_social_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                   'style' => ['1','2','4','5']
                ],
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => __( 'Show/Hide Search Button', 'cleanu-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'cleanu-core' ),
                'label_off' => __( 'Hide', 'cleanu-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition'     => [ 'style' => ['1','5'] ],
            ]
        );

        $this->add_control(
            'header_2_content', [
                'label'         => esc_html__( 'Header Content', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'condition' => [
                    'style' => ['3','2','4']
                ],
            ]
        );

        $this->add_control(
            'header_2_icon_style',
            [
                'label'     => esc_html__( 'Icon Style', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'     => esc_html__( 'Flaticon', 'cleanu-core' ),
                    '3'     => esc_html__( 'Icon Image', 'cleanu-core' ),
                    '4'     => esc_html__( 'Cutom Icon', 'cleanu-core' ),
                ],
                'condition' => [
                    'style' => ['3','2','4']
                ],
            ]
        );

        $this->add_control(
            'header_2_flat_icon',
            [
                'label'      => esc_html__('Flat Icon', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => cleanu_flaticons(),
                'include'    => cleanu_include_flaticons(),
                'default'    => 'flaticon-location',
                'condition' => [
                    'header_2_icon_style' => '1'
                ]
            ]
        );

        $this->add_control(
            'header_2_icon_image',
            [
                'label'         => esc_html__( 'Add Image Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'header_2_icon_style' => '3'
                ]
            ]
        );

        $this->add_control(
            'header_2_custom_icon',
            [
                'label'         => esc_html__( 'Add Custom Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'header_2_icon_style' => '4'
                ]
            ]
        );  
        
        $this->add_control(
		    'nav_menu',
		    [
		        'label' => __('Select Nav Menu', 'consua-addon'),
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'options' => clenu_get_nav_menu(),
		        'label_block' => true,
		    ]
		);

        
		$this->end_controls_section();

        $this->start_controls_section(
            'cleanu_sidemenu_style',
            [
                'label'         => esc_html__( 'Sidemenu Content','cleanu-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition'     => [ 'style' => ['1','5'] ],
            ]
        );

        $this->add_control(
            'header_side_menu',
            [
                'label' => __( 'Show/Hide Side Menu', 'cleanu-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'cleanu-core' ),
                'label_off' => __( 'Hide', 'cleanu-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sidemenu_logo',
            [
                'label'         => esc_html__( 'Add Sidemenu Logo','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $this->add_control(
            'sidemenu_content', [
                'label'         => esc_html__( 'Sidemenu Content', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sidemenu_info', [
                'label'         => esc_html__( 'Sidemenu Info', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'sidemenu_info_list',
            [
                'label'     => esc_html__( 'Sidemenu Info List', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Sidemenu Info', 'cleanu-core' ),
                    ],
                ],
                'title_field' => '{{{ sidemenu_info }}}',
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $this->add_control(
            'sidemenu_sc_heading', [
                'label'         => esc_html__( 'Sidemenu Subscribe Heading', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $this->add_control(
            'sidemenu_sc', [
                'label'         => esc_html__( 'Sidemenu Shortcode', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $this->add_control(
            'sidemenu_fb_link',
            [
                'label'         => esc_html__( 'Sidemenu Facebook Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_tw_link',
            [
                'label'         => esc_html__( 'Sidemenu Twitter Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_le_link',
            [
                'label'         => esc_html__( 'Sidemenu Linkedin Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_in_link',
            [
                'label'         => esc_html__( 'Sidemenu Instagram Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_dr_link',
            [
                'label'         => esc_html__( 'Sidemenu Dribbble Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_be_link',
            [
                'label'         => esc_html__( 'Sidemenu Behance Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );
        $this->add_control(
            'sidemenu_yt_link',
            [
                'label'         => esc_html__( 'Sidemenu Youtube Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'condition'     => [ 'header_side_menu' =>  'yes' ],
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'design_option',
			[
				'label'			=> esc_html__( 'Design Option','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_header_output = $this->get_settings_for_display();
    $cleanu_topbar_info_list = $cleanu_header_output['topbar_info_list'];
    $cleanu_sidebar_info_list = $cleanu_header_output['sidemenu_info_list'];

    if($cleanu_header_output['style'] == '1'):
	?>
	 <!-- Start Header Style One
    ============================================= -->
    <div class="top-bar-area multi-content bg-dark text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-4 logo">
                    <?php if(!empty($cleanu_header_output['topbar_logo']['url'])): ?>
                        <a href="<?php echo esc_url(home_url());?>">
                            <img src="<?php echo esc_html($cleanu_header_output['topbar_logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif;?>
                </div>
                <div class="col-lg-8 info item-flex space-between">
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_yt_link']['url']);?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            
                        </ul>
                    </div>
                    <ul>
                        <?php foreach($cleanu_topbar_info_list as $single_topbar_info):?>
                            <li>
                                <?php 
                                if(!empty($single_topbar_info['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['flat_icon_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_topbar_info['icon_image']['url'])):?>
                                    <img src="<?php echo esc_url($single_topbar_info['icon_image']['url']); ?>">
                                <?php endif;?>
                                <?php 
                                if(!empty($single_topbar_info['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['custom_icon']); ?>"></i>
                                <?php endif;?>
                                <?php echo htmlspecialchars_decode(esc_html($single_topbar_info['topbar_info']));?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->
    <!-- Header 
    ============================================= -->
    <header id="home">

        <div class="container box-nav">
            <div class="row">
                <!-- Start Navigation -->
                <nav class="navbar top-less logo-less white navbar-default navbar-fixed dark bootsnav on no-full nav-box no-background">

                    <?php if($cleanu_header_output['search_icon'] == 'yes'):?>
                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input name="s" type="text" class="form-control"  value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search','cleanu-core'); ?>">
                                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Top Search -->
                    <?php endif;?>

                    <div class="container nav-container">
                        <div class="row">
                            <!-- Start Header Navigation -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                    <img src="<?php echo esc_html($cleanu_header_output['topbar_logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                </a>
                            </div>
                            <!-- End Header Navigation -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="col-lg-9">
                                <div class="collapse navbar-collapse" id="navbar-menu">
                                    <?php
                                        wp_nav_menu(array(
                                            'menu' => $cleanu_header_output['nav_menu'],
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
                                        <?php if($cleanu_header_output['search_icon'] == 'yes'):?>
                                            <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                                        <?php endif;?>
                                        <?php if($cleanu_header_output['header_side_menu'] == 'yes'):?>
                                        <li class="side-menu">
                                            <a href="#">
                                                <span class="bar-1"></span>
                                                <span class="bar-2"></span>
                                                <span class="bar-3"></span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </div> 
                            </div>       
                            <!-- End Atribute Navigation -->
                        </div>

                    </div>

                    <?php if($cleanu_header_output['header_side_menu'] == 'yes'):?>
                    <!-- Start Side Menu -->
                    <div class="side">
                        <a href="#" class="close-side"><i class="icon_close"></i></a>
                        <div class="widget">
                            <?php if(!empty($cleanu_header_output['sidemenu_logo']['url'])): ?>    
                                <img src="<?php echo esc_html($cleanu_header_output['sidemenu_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif;?>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_header_output['sidemenu_content'],'cleanu-core')); ?>
                        </div>
                        <div class="widget address">
                            <div>
                                <ul>
                                <?php foreach($cleanu_sidebar_info_list as $single_sidemanu_info):?>  
                                    <li>
                                        <div class="content">
                                           <?php echo htmlspecialchars_decode(esc_html($single_sidemanu_info['sidemenu_info'])); ?>
                                        </div>
                                    </li>
                                    
                                <?php endforeach;?>    
                                </ul>
                            </div>
                        </div>
                        <div class="widget newsletter">
                            <h4 class="title"><?php echo esc_html($cleanu_header_output['sidemenu_sc_heading']); ?></h4>
                            <div class="input-group stylish-input-group">
                                <?php echo do_shortcode($cleanu_header_output['sidemenu_sc']); ?>
                            </div>
                        </div>
                        <div class="widget social">
                            <ul class="link">
                            <?php if(!empty($cleanu_header_output['sidemenu_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['sidemenu_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['sidemenu_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_yt_link']['url']);?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            
                        </ul>
                        </div>
                    </div>
                    <!-- End Side Menu -->
                    <?php endif;?>
                </nav>
                <!-- End Navigation -->
            </div>
        </div>

    </header>
    <!-- End Header Style One -->
	<?php 
    elseif ($cleanu_header_output['style'] == '2'):
    ?>
    <!-- Start Header Style Two
    ============================================= -->
    <div class="top-bar-area inc-pad bg-theme text-light inc-shape">
        <div class="container-fill">
            <div class="row align-center">
                <div class="col-lg-5 offset-lg-3 info">
                    <ul>
                        <?php foreach($cleanu_topbar_info_list as $single_topbar_info):?>
                            <li>
                                <?php 
                                if(!empty($single_topbar_info['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['flat_icon_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_topbar_info['icon_image']['url'])):?>
                                    <img src="<?php echo esc_url($single_topbar_info['icon_image']['url']); ?>">
                                <?php endif;?>
                                <?php 
                                if(!empty($single_topbar_info['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['custom_icon']); ?>"></i>
                                <?php endif;?>
                                <?php echo htmlspecialchars_decode(esc_html($single_topbar_info['topbar_info']));?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-lg-4 text-right item-flex">
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_yt_link']['url']);?>">
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

    <!-- Header 
    ============================================= -->
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
                            <?php if(!empty($cleanu_header_output['topbar_logo']['url'])): ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                <img src="<?php echo esc_html($cleanu_header_output['topbar_logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-6">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <?php
                                wp_nav_menu(array(
                                               'menu' => $cleanu_header_output['nav_menu'],
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
                                    if(!empty($cleanu_header_output['header_2_flat_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_flat_icon']); ?>"></i>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_header_output['header_2_icon_image']['url'])):?>
                                        <img src="<?php echo esc_url($cleanu_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php endif;?>
                                    <?php 
                                    if(!empty($cleanu_header_output['header_2_custom_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_custom_icon']); ?>"></i>
                                    <?php endif;?>
                                </div>
                                <div class="info">
                                   <?php echo htmlspecialchars_decode(esc_html($cleanu_header_output['header_2_content'],'cleanu-core')); ?>
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
    <?php 
    elseif ($cleanu_header_output['style'] == '3'):
    ?>
    <!-- Header Style Three
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
                            <?php if(!empty($cleanu_header_output['header_fixed_logo']['url'])): ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                <img src="<?php echo esc_html($cleanu_header_output['header_fixed_logo']['url']);?>" class="logo logo-display" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <img src="<?php echo esc_html($cleanu_header_output['header_scroll_logo']['url']);?>" class="logo logo-scrolled" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-6">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <?php
                                wp_nav_menu(array(
                                               'menu' => $cleanu_header_output['nav_menu'],
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
                                    if(!empty($cleanu_header_output['header_2_flat_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_flat_icon']); ?>"></i>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_header_output['header_2_icon_image']['url'])):?>
                                        <img src="<?php echo esc_url($cleanu_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php endif;?>
                                    <?php 
                                    if(!empty($cleanu_header_output['header_2_custom_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_custom_icon']); ?>"></i>
                                    <?php endif;?>
                                </div>
                                <div class="info">
                                    <?php echo htmlspecialchars_decode(esc_html($cleanu_header_output['header_2_content'],'cleanu-core')); ?>
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
    <!-- End Header Style Three -->
    <?php 
    elseif ($cleanu_header_output['style'] == '4'):
    ?>
    <!-- Start Header Style Four
    ============================================= -->
    <div class="top-bar-area inc-pad bg-theme text-light inc-shape">
        <div class="container-full">
            <div class="row align-center">
                <div class="col-lg-8 info">
                    <ul>
                        <?php foreach($cleanu_topbar_info_list as $single_topbar_info):?>
                            <li>
                                <?php 
                                if(!empty($single_topbar_info['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['flat_icon_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_topbar_info['icon_image']['url'])):?>
                                    <img src="<?php echo esc_url($single_topbar_info['icon_image']['url']); ?>">
                                <?php endif;?>
                                <?php 
                                if(!empty($single_topbar_info['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['custom_icon']); ?>"></i>
                                <?php endif;?>
                                <?php echo htmlspecialchars_decode(esc_html($single_topbar_info['topbar_info']));?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-lg-4 text-right item-flex">
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_yt_link']['url']);?>">
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

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky dark bootsnav">

            <div class="container-full">

                <div class="row align-center">
                    

                    <!-- Start Header Navigation -->
                    <div class="col-lg-3 brand-item">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <?php if(!empty($cleanu_header_output['header_fixed_logo']['url'])): ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                <img src="<?php echo esc_html($cleanu_header_output['header_fixed_logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-6">
                        <div class="collapse navbar-collapse" id="navbar-menu">
                           <?php
                                wp_nav_menu(array(
                                               'menu' => $cleanu_header_output['nav_menu'],
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

                    <!-- Start Atribute Navigation -->
                    <div class="col-lg-3">
                        <div class="attr-nav">
                            <div class="call">
                                <div class="icon">
                                    <?php 
                                    if(!empty($cleanu_header_output['header_2_flat_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_flat_icon']); ?>"></i>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_header_output['header_2_icon_image']['url'])):?>
                                        <img src="<?php echo esc_url($cleanu_header_output['header_2_icon_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    <?php endif;?>
                                    <?php 
                                    if(!empty($cleanu_header_output['header_2_custom_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_header_output['header_2_custom_icon']); ?>"></i>
                                    <?php endif;?>
                                </div>
                                <div class="info">
                                   <?php echo htmlspecialchars_decode(esc_html($cleanu_header_output['header_2_content'],'cleanu-core')); ?>
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
    <!-- End Header Style Four -->
    <?php 
    elseif ($cleanu_header_output['style'] == '5'):
    ?>
    <!-- Start Header Style Five 
    ============================================= -->
    <div class="top-bar-area fixed text-light multi-content">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-12 info item-flex space-between">
                    <ul>
                        <?php foreach($cleanu_topbar_info_list as $single_topbar_info):?>
                            <li>
                                <?php 
                                if(!empty($single_topbar_info['flat_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['flat_icon_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_topbar_info['icon_image']['url'])):?>
                                    <img src="<?php echo esc_url($single_topbar_info['icon_image']['url']); ?>">
                                <?php endif;?>
                                <?php 
                                if(!empty($single_topbar_info['custom_icon'])):?>
                                    <i class="<?php echo esc_attr($single_topbar_info['custom_icon']); ?>"></i>
                                <?php endif;?>
                                <?php echo htmlspecialchars_decode(esc_html($single_topbar_info['topbar_info']));?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <div class="social">
                        <ul>
                            <?php if(!empty($cleanu_header_output['topbar_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['topbar_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['topbar_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['topbar_yt_link']['url']);?>">
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

    <!-- Header 
    ============================================= -->
    <header id="home">

        <div class="container box-nav">
            <div class="row">
                <!-- Start Navigation -->
                <nav class="navbar top-less navbar-default navbar-fixed dark bootsnav on no-full nav-box no-background bg-white">

                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <form method="get">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search">
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
                                    <?php if(!empty($cleanu_header_output['header_fixed_logo']['url'])): ?>
                                    <a class="navbar-brand" href="<?php echo esc_url(home_url());?>">
                                        <img src="<?php echo esc_html($cleanu_header_output['header_fixed_logo']['url']);?>" class="logo" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    </a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <!-- End Header Navigation -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="col-lg-7">
                                <div class="collapse navbar-collapse" id="navbar-menu">
                                    <?php
                                        wp_nav_menu(array(
                                                      'menu' => $cleanu_header_output['nav_menu'],
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
                                        <?php if($cleanu_header_output['search_icon'] == 'yes'):?>
                                            <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                                        <?php endif;?>
                                        <?php if($cleanu_header_output['header_side_menu'] == 'yes'):?>
                                        <li class="side-menu">
                                            <a href="#">
                                                <span class="bar-1"></span>
                                                <span class="bar-2"></span>
                                                <span class="bar-3"></span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </div> 
                            </div>       
                            <!-- End Atribute Navigation -->
                        </div>

                    </div>

                    <?php if($cleanu_header_output['header_side_menu'] == 'yes'):?>
                    <!-- Start Side Menu -->
                    <div class="side">
                        <a href="#" class="close-side"><i class="icon_close"></i></a>
                        <div class="widget">
                            <?php if(!empty($cleanu_header_output['sidemenu_logo']['url'])): ?>    
                                <img src="<?php echo esc_html($cleanu_header_output['sidemenu_logo']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif;?>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_header_output['sidemenu_content'],'cleanu-core')); ?>
                        </div>
                        <div class="widget address">
                            <div>
                                <ul>
                                <?php foreach($cleanu_sidebar_info_list as $single_sidemanu_info):?>  
                                    <li>
                                        <div class="content">
                                           <?php echo htmlspecialchars_decode(esc_html($single_sidemanu_info['sidemenu_info'])); ?>
                                        </div>
                                    </li>
                                    
                                <?php endforeach;?>    
                                </ul>
                            </div>
                        </div>
                        <div class="widget newsletter">
                            <h4 class="title"><?php echo esc_html($cleanu_header_output['sidemenu_sc_heading']); ?></h4>
                            <div class="input-group stylish-input-group">
                                <?php echo do_shortcode($cleanu_header_output['sidemenu_sc']); ?>
                            </div>
                        </div>
                        <div class="widget social">
                            <ul class="link">
                            <?php if(!empty($cleanu_header_output['sidemenu_fb_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['sidemenu_fb_link']['url']);?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_tw_link']['url'])):?>
                                <li>
                                    <a href="<?php echo esc_url($cleanu_header_output['sidemenu_tw_link']['url']);?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_le_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_le_link']['url']);?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_in_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_in_link']['url']);?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_dr_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_dr_link']['url']);?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_be_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_be_link']['url']);?>">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($cleanu_header_output['sidemenu_yt_link']['url'])):?>
                            <li>
                                <a href="<?php echo esc_url($cleanu_header_output['sidemenu_yt_link']['url']);?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <?php endif;?>
                            
                        </ul>
                        </div>
                    </div>
                    <!-- End Side Menu -->
                    <?php endif;?>
                </nav>
                <!-- End Navigation -->
            </div>
        </div>

    </header>
    <!-- End Header Style Five -->
    <?php 
    elseif ($cleanu_header_output['style'] == '6'):
    ?>
    <!-- Start Header Style Six
    ============================================= -->
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
                            <?php if(!empty($cleanu_header_output['header_fixed_logo']['url'])): ?>
                            <a class="navbar-brand" href="<?php echo home_url();?>">
                                <img src="<?php echo esc_html($cleanu_header_output['header_fixed_logo']['url']);?>" class="logo" alt="<?php echo esc_attr__("cleanu",'cleanu' ) ?>">
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="col-lg-9">
                        <div class="collapse navbar-collapse navbar-right" id="navbar-menu">
                           <?php
                                wp_nav_menu(array(
                                              'menu' => $cleanu_header_output['nav_menu'],
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
    <!-- End Header Style Six -->
    <?php
    endif;
	}
}