<?php
	/**
	* Elementor Service Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Service_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'service';
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
		return esc_html__( 'Services', 'cleanu-core' );
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
			'section_heading',
			[
				'label'		=> esc_html__( 'Section Heading','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_show',
			[
				'label' => __( 'Show/Hide Section Heading', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cleanu-core' ),
				'label_off' => __( 'Hide', 'cleanu-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'cleanu-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'cleanu-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'section_description',
			[
				'label' 		=> esc_html__( 'Section Description', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'cleanu-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		

		$this->start_controls_section(
			'services_content',
			[
				'label'		=> esc_html__( 'Set Service Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Service Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Style Two', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Style Three', 'cleanu-core' ),
					'4' 	=> esc_html__( 'Style Four', 'cleanu-core' ),
					'5' 	=> esc_html__( 'Style Five', 'cleanu-core' ),
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'cleanu-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
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
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list',
			[
				'label' 	=> esc_html__( 'Service', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => '1'],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_subtitle', [
				'label' 		=> esc_html__( 'SubTitle', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_facilites', [
				'label' 		=> esc_html__( 'Facilities', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'service_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'service_img_txt', [
				'label' 		=> esc_html__( 'Image Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_text', [
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_two',
			[
				'label' 	=> esc_html__( 'Service', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => '2'],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'bc_shape',
			[
				'label' 	=> esc_html__( 'Background Shape ', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'cleanu-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
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
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service Single URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_three',
			[
				'label' 	=> esc_html__( 'Service', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => '3'],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$this->add_control(
			'service_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/bubble-light.png',
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'service_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/service_2.png',
				],
				'condition' 	=> ['style' => '2'],
			]
		);
		$this->add_control(
			'service_shape_three',
			[
				'label' 	=> esc_html__( 'Background Shape ', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '3'],
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'service_content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'cleanu-core' ),
					'2'  	=> esc_html__( 'Custom Icon', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'cleanu-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
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
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);

		$repeater->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'service_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_text', [
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_four',
			[
				'label' 	=> esc_html__( 'Service', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => '4'],
				'title_field' => '{{{ service_title }}}',
			]
		);

		$this->add_control(
			'service_shape_four',
			[
				'label' 	=> esc_html__( 'Background Shape ', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '4'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'icon_style',
			[
				'label' 	=> esc_html__( 'Icon Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'cleanu-core' ),
				],
			]
		);
		$repeater->add_control(
			'flat_icon_one',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
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
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 		=> esc_html__( 'Service Single URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		
		$this->add_control(
			'service_list_five',
			[
				'label' 	=> esc_html__( 'Service', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Service', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => '5'],
				'title_field' => '{{{ service_title }}}',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'service_style',
			[
				'label'			=> esc_html__( 'Heading Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_services_output = $this->get_settings_for_display();
	$services_one = $cleanu_services_output['service_list'];
	$services_two = $cleanu_services_output['service_list_two'];
	$services_three = $cleanu_services_output['service_list_three'];
	$services_four = $cleanu_services_output['service_list_four'];
	$services_five = $cleanu_services_output['service_list_five'];
	if($cleanu_services_output['style'] == '1'):
	?>
	<!-- Start Services Style One
    ============================================= -->
    <div class="services-style-two-area">
        <div class="container">
            <?php if($cleanu_services_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_services_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_services_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_services_output['section_description'])):?>
						<?php echo  htmlspecialchars_decode(esc_html($cleanu_services_output['section_description']));?>
                      
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container-full">
            <div class="services-style-two-box text-center">
                <div class="services-4-col-carousel owl-carousel owl-theme">
                	<?php
                		$counter = 1;
	            		foreach($services_one as $service_one):
	            	?>
	                    <!-- Single Item -->
	                    <div class="sevices-style-two">
	                        <div class="thumb" style="background-image: url(<?php echo esc_url($service_one['service_image']['url']); ?>);"></div>
	                        <h4><a href="<?php echo esc_url( $service_one['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($service_one['service_title'],'cleanu-core')); ?></a></h4>
	                        <?php if(!empty($service_one['flat_icon_one'])):?>
                                <i class="<?php echo esc_attr($service_one['flat_icon_one']); ?>"></i>
                            <?php endif;?>
                            <?php if(!empty($service_one['icon_image_one'])):?>
                                <img src="<?php echo esc_url($service_one['icon_image_one']['url']); ?>">
                            <?php endif;?>
	                        <p>
	                            <?php echo htmlspecialchars_decode(esc_html($service_one['service_content'],'cleanu-core')); ?>
	                        </p>
	                    </div>
	                    <!-- End Single Item -->
                    <?php 
                    	$counter++;
						endforeach;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Style One-->
    <?php elseif($cleanu_services_output['style'] == '2'):?>
    <!-- Start Services Style Two
    ============================================= -->
    <div class="services-types-area overflow-hidden shadow bg-theme text-light default-padding">
    	<?php if(!empty($cleanu_services_output['service_shape_two']['url'])):?>
	        <!-- Shape -->
	        <div class="fixed-shape">
	            <img src="<?php echo esc_url($cleanu_services_output['service_shape_two']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        </div>
	        <!-- Shape -->
        <?php endif;?>
        <div class="container">
            <div class="row align-center">
            	<?php if(!empty($cleanu_services_output['service_shape_one']['url'])):?>
	                <!-- Buble Shape -->
	                <div class="buble-shape">
	                    <img src="<?php echo esc_url($cleanu_services_output['service_shape_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                </div>
	                <!-- Buble Shape -->
            	<?php endif;?>
                <div class="col-lg-12">
                    <div class="services-type-items services-type-carousel owl-carousel owl-theme">
                    <?php
	            		foreach($services_two as $service_two):
	            	?>
                        <!-- Single Item -->
                        <div class="item item services-style-one">
                            <div class="row align-center">
                                <div class="col-lg-6 content">
                                    <h5><?php echo htmlspecialchars_decode(esc_html($service_two['service_subtitle'],'cleanu-core')); ?></h5>
                                    <h2><?php echo htmlspecialchars_decode(esc_html($service_two['service_title'],'cleanu-core')); ?></h2>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($service_two['service_content'],'cleanu-core')); ?>
                                    </p>
                                    <?php echo htmlspecialchars_decode(esc_html($service_two['service_facilites'],'cleanu-core')); ?>
                                    <?php if(!empty($service_two['button_text'])):?>
                                    <a class="btn btn-theme secondary effect btn-md" href="<?php echo esc_url($service_two['button_url']['url']); ?>"><?php echo esc_html($service_two['button_text']);?></a>
                                	<?php endif;?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="thumb">
                                    	<?php if(!empty($service_two['service_image']['url'])):?>
                                        <img src="<?php echo esc_url($service_two['service_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                    	<?php endif;?>
                                    	<?php if(!empty($service_two['service_img_txt'])):?>
                                        <h4><?php echo htmlspecialchars_decode(esc_html($service_two['service_img_txt'],'cleanu-core')); ?></h4>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    <?php 
						endforeach;
					?>   
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Services Area Style Two -->
    <?php elseif($cleanu_services_output['style'] == '3'):?>
    <!-- Star Services Area Style Three
    ============================================= -->
    <div class="services-style-three-area relative text-center default-padding">
        <div class="container">
            <div class="row">
            	<?php
            		$counter = 1;
            		foreach($services_three as $service_three):
            	?>
	                <!-- Signle Item -->
	                <div class="services-style-three col-lg-4 col-md-6">
	                    <div class="style-three-item item <?php if($counter == '2'){echo esc_attr__( "active");}?>">
	                        <div class="shape" style="background-image: url(<?php echo esc_url( $service_three['bc_shape']['url']);?>);"></div>
	                        <div class="thumb">
	                            <?php if(!empty($service_three['flat_icon_one'])):?>
                                <i class="<?php echo esc_attr($service_three['flat_icon_one']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($service_three['icon_image_one'])):?>
	                                <img src="<?php echo esc_url($service_three['icon_image_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            <?php endif;?>
	                        </div>
	                        <h4><a href="<?php echo esc_url( $service_three['service_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($service_three['service_title'],'cleanu-core')); ?></a></h4>
	                        <p><?php echo htmlspecialchars_decode(esc_html($service_three['service_content'],'cleanu-core')); ?>
	                        </p>
	                    </div>
	                </div>
	                <!-- End Signle Item -->
                <?php 
                	$counter++;
					endforeach;
				?>
            </div>
        </div>
        <?php if(!empty($cleanu_services_output['service_shape_three']['url'])):?>
        	<div class="shape-bottom" style="background-image: url(<?php echo esc_url($cleanu_services_output['service_shape_three']['url']);?>);"></div>
    	<?php endif;?>
    </div>
    <!-- End Services Area Style Three -->
    <?php elseif($cleanu_services_output['style'] == '4'):?>
    <!-- Star Services Area Style Four
    ============================================= -->
    <div class="services-style-four-area default-padding bg-gray">
        <div class="container">
            <?php if($cleanu_services_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_services_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_services_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_services_output['section_description'])):?>
						<?php echo  htmlspecialchars_decode(esc_html($cleanu_services_output['section_description']));?>
                      
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services-style-four-carousel owl-carousel owl-theme">
                    	<?php
		            		foreach($services_four as $single_service_four):
		            	?>
	                        <!-- Single Item -->
	                        <div class="services-style-four">
	                            <div class="thumb">
	                                <img src="<?php echo esc_url( $single_service_four['service_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                                <?php if(!empty($single_service_four['flat_icon_one'])):?>
	                                <i class="<?php echo esc_attr($single_service_four['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_service_four['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_service_four['icon_image_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($single_service_four['custom_icon'])):?>
		                               <i class="<?php echo esc_attr($single_service_four['custom_icon']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_services_output['service_shape_four']['url'])):?>
	                                	<div class="shape" style="background-image: url(<?php echo esc_url( $cleanu_services_output['service_shape_four']['url']);?>);"></div>
	                            	<?php endif;?>
	                            </div>
	                            <div class="content">
	                                <h3><a href="<?php echo esc_url($single_service_four['button_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_four['service_title'],'cleanu-core')); ?></a></h3>
	                                <p>
	                                    <?php echo htmlspecialchars_decode(esc_html($single_service_four['service_content'],'cleanu-core')); ?>
	                                </p>
	                                <a class="btn-common" href="<?php echo esc_url($single_service_four['button_url']['url']);?>"><?php echo htmlspecialchars_decode(esc_html($single_service_four['button_text'],'cleanu-core')); ?></a>
	                            </div>
	                        </div>
	                        <!-- End Single Item -->
                        <?php 
							endforeach;
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>	
    <!-- End Services Area Style Four -->
    <?php elseif($cleanu_services_output['style'] == '5'):?>
     <!-- Start Services Area Five
    ============================================= -->
    <div class="services-style-six-area">
    	<?php if($cleanu_services_output['section_show'] == 'yes'): ?>
	        <div class="container">
	            <div class="heading-left">
	                <div class="row">
	                    <div class="col-lg-5">
	                    	<?php if(!empty($cleanu_services_output['section_subtitle'])):?>
	                        	<h5><?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_subtitle']));?></h5>
	                        <?php endif;?>
	                        <?php if(!empty($cleanu_services_output['section_title'])):?>
		                        <h2>
		                           <?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_title']));?>
		                        </h2>
	                        <?php endif;?>
	                    </div>
	                    <?php if(!empty($cleanu_services_output['section_subtitle'])):?>
	                    <div class="col-lg-6 offset-lg-1">
	                        <p>
	                            <?php echo htmlspecialchars_decode(esc_html($cleanu_services_output['section_description']));?>
	                        </p>
	                    </div>
	                	<?php endif;?>
	                </div>
	            </div>
	        </div>
        <?php endif;?>
        <div class="container">
            <div class="row">
            	<?php foreach($services_five as $single_service_five):?>
	                <!-- Single Item -->
	                <div class="services-style-six col-lg-4 col-md-6">
	                    <div class="services-style-six-item">
	                        <a href="<?php echo esc_url($single_service_four['button_url']['url']);?>">
	                            <div class="icon">
	                                <?php if(!empty($single_service_five['flat_icon_one'])):?>
	                                <i class="<?php echo esc_attr($single_service_five['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_service_five['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_service_five['icon_image_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($single_service_five['custom_icon'])):?>
		                               <i class="<?php echo esc_attr($single_service_five['custom_icon']); ?>"></i>
		                            <?php endif;?>
	                            </div>
	                            <div class="content">
	                                <h4><?php echo htmlspecialchars_decode(esc_html($single_service_five['service_title'],'cleanu-core')); ?></h4>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <!-- End Single Item -->
            	<?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- End Services Area Five-->	
	<?php 
	endif;
	}
}