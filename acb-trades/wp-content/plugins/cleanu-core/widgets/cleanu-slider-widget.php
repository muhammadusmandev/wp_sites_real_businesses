<?php
	/**
	* Elementor Slider Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Slider widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'slider';
	}

	/**
	* Get widget title.
	*
	* Retrieve Slider widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Slider', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Slider widget icon.
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
	* Retrieve the list of categories the Slider widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements' ];
	}

	public function get_script_depends() {
		return [ 'mainjs' ];
	}
	// Add The Input For User
	protected function register_controls(){
		$this->start_controls_section(
			'slider_content',
			[
				'label'		=> esc_html__( 'Slider Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Slider Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Style Two', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Style Three', 'cleanu-core' ),
					'4' 	=> esc_html__( 'Style Four', 'cleanu-core' ),
					'5' 	=> esc_html__( 'Style Five', 'cleanu-core' ),
					'6' 	=> esc_html__( 'Style Six', 'cleanu-core' ),
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> esc_html__( 'Slider Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'slider_video_url',
			[
				'label' 		=> esc_html__( 'Video URL', 'cleanu-core' ),
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
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			'slider_one',
			[
				'label' 	=> esc_html__( 'Slider', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
				'condition' 	=> ['style' => ['1']],
			]
		);

		$this->add_control(
			'sliderone_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => ['1']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'bubble_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'slider_one_bubble',
			[
				'label' 	=> esc_html__( 'Add Bubble Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Bubble Image', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => ['1']],
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'slider_title', [
				'label' 		=> esc_html__( 'Slider Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_content', [
				'label' 		=> esc_html__( 'Slider Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image_slider',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'slider_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_button_url',
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
			'slider_two',
			[
				'label' 	=> esc_html__( 'Slider', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Slider', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ slider_title }}}',
				'condition' 	=> ['style' => ['2']],
			]
		);
		
		$this->add_control(
			'slider_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/slider_2.png',
				],
				'condition' 	=> ['style' => ['2']],
			]
		);

		$this->add_control(
			'banner_image',
			[
				'label' 	=> esc_html__( 'Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'banner_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);
		$this->add_control(
			'banner_subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);
		$this->add_control(
			'banner_video_url',
			[
				'label' 		=> esc_html__( 'Video URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition' 	=> ['style' => ['3']],
			]
		);
		$this->add_control(
			'banner_video_txt', [
				'label' 		=> esc_html__( 'Video Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'banner_form_title', [
				'label' 		=> esc_html__( 'Form Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);
		$this->add_control(
			'banner_form_subtitle', [
				'label' 		=> esc_html__( 'Form Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'banner_sc', [
				'label' 		=> esc_html__( 'Form ShortCode', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['3']],
			]
		);
		
		$this->add_control(
			'slider_shape_three',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['3']],
			]
		);

		$this->add_control(
			'banner_title_v4', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'banner_content_v4', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['4']],
			]
		);

		$this->add_control(
			'banner_video_txt_v4', [
				'label' 		=> esc_html__( 'Video Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'banner_video_url_v4',
			[
				'label' 		=> esc_html__( 'Video URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'slider_v4_banner_img_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'banner_image_v4',
			[
				'label' 	=> esc_html__( 'Banner Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['4']],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon_style_v4',
			[
				'label' 	=> esc_html__( 'Icon Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Flaticon', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Icon Image', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Custom Icon', 'cleanu-core' ),
				],
			]
		);

		$repeater->add_control(
			'flat_icon_v4',
			[
                'label'      => esc_html__('Icon One', 'cleanu-core'),
                'type'       => \Elementor\Controls_Manager::ICON,
                'options'    => cleanu_flaticons(),
                'include'    => cleanu_include_flaticons(),
                'default'    => 'flaticon-cleaning-2',
                'condition' => [
                    'icon_style_v4' => '1'
                ]
            ]
		);

		$repeater->add_control(
			'icon_image_v4',
			[
				'label'			=> esc_html__( 'Add Image Icon','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style_v4' => '3'
                ]
			]
		);
		$repeater->add_control(
			'custom_icon_v4', [
				'label' 		=> esc_html__( 'Custom Icon', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style_v4' => '2'
                ]
			]
		);

		$this->add_control(
			'slider_v4_icons',
			[
				'label' 	=> esc_html__( 'Icons', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Icon', 'cleanu-core' ),
					],
				],
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'slider_v4_shape_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'slider_shape_v4_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['4']],
			]
		);
		$this->add_control(
			'slider_shape_v4_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['4']],
			]
		);


		$this->add_control(
			'banner_title_v5', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['5']],
			]
		);
		$this->add_control(
			'banner_subtitle_v5', [
				'label' 		=> esc_html__( 'Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['5']],
			]
		);
		$this->add_control(
			'banner_content_v5', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['5']],
			]
		);
		
		$this->add_control(
			'banner_image_v5',
			[
				'label' 	=> esc_html__( 'Banner Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['5']],
			]
		);
		$this->add_control(
			'banner_shape_v5',
			[
				'label' 	=> esc_html__( 'Background Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['5']],
			]
		);
		$this->add_control(
			'banner_button_text_v5',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['5']],
			]
		);
		$this->add_control(
			'banner_button_url_v5',
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
				'condition' 	=> ['style' => ['5']],
			]
		);

		$this->add_control(
			'banner_title_v6', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_subtitle_v6', [
				'label' 		=> esc_html__( 'Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_title_image_v6',
			[
				'label' 	=> esc_html__( 'Title Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_content_v6', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_image_v6',
			[
				'label' 	=> esc_html__( 'Banner Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_video_txt_v6', [
				'label' 		=> esc_html__( 'Video Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_video_url_v6',
			[
				'label' 		=> esc_html__( 'Video URL', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'cleanu-core' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition' 	=> ['style' => ['6']],
			]
		);

		$this->add_control(
			'banner_shape_v6',
			[
				'label' 	=> esc_html__( 'Background Image One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['6']],
			]
		);
		$this->add_control(
			'banner_shape_v6_two',
			[
				'label' 	=> esc_html__( 'Background Image Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['6']],
			]
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sldr_one_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content h2' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'sldr_one_subtitle_color',
			[
				'label' 		=> esc_html__( 'Sub-Title Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content h4' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'style' =>	'1'],
			]
		);
		$this->add_control(
			'sldr_one_description_color',
			[
				'label' 		=> esc_html__( 'Slider Description Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-inner .box-cell .content p' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'style' =>	'2'],
			]
		);
		$this->add_control(
			'slider_one_btn_txt_color',
			[
				'label' 		=> esc_html__( 'Slider Button Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .carousel-inner .box-cell .content a' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'slider_btn_background_color',
			[
				'label' 		=> esc_html__( 'Slider Button Background Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .carousel-inner .box-cell .content a' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_slider_output = $this->get_settings_for_display();
	$sliders_one = $cleanu_slider_output['slider_one'];
	$sliders_two = $cleanu_slider_output['slider_two'];
	$slider_one_bubbles = $cleanu_slider_output['slider_one_bubble'];
	$sliders_v4_icons = $cleanu_slider_output['slider_v4_icons'];
	if($cleanu_slider_output['style'] == 1){
	?>
	<!-- Start Banner Style One 
    ============================================= -->
    <div class="banner-area top-pad-extra text-regular right-shape content-less">
        <!-- Animated Bubble -->
        <div class="animated-bubble">
        	<?php foreach($slider_one_bubbles as $slider_one_bubble): ?>
        		<?php if(!empty($slider_one_bubble['bubble_image']['url'])):?>
            		<img src="<?php echo esc_url($slider_one_bubble['bubble_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            	<?php endif;?>
        	<?php endforeach; ?> 
        </div>
        <!-- End Animated Bubble -->
        <div id="bootcarousel" class="carousel text-light slide animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php
            		$counter = 1;
            		foreach($sliders_one as $slider_one):
            	?>
	                <div class="carousel-item <?php if($counter == 1){echo esc_attr("active");}?> bg-cover" style="background-image: url(<?php echo esc_url($slider_one['image_slider']['url']); ?>);">
	                    <div class="box-table">
	                        <div class="box-cell shadow gradient">
	                            <div class="container">
	                                <div class="row">
	                                    <div class="col-lg-8">
	                                        <div class="content">
	                                            <h4 data-animation="animated slideInRight"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_subtitle'],'cleanu-core')); ?></h4>
	                                            <h2 data-animation="animated slideInLeft"><?php echo htmlspecialchars_decode(esc_html($slider_one['slider_title'],'cleanu-core')); ?></h2>
	                                            <div class="bottom" data-animation="animated slideInUp">
	                                            	<?php if(!empty($slider_one['slider_button_text'])):?>
	                                                <a class="btn btn-theme primary effect btn-md" href="<?php echo esc_url($slider_one['slider_button_url']['url']); ?>"><?php echo esc_html($slider_one['slider_button_text'],'cleanu-core'); ?></a>
	                                                <?php endif;?>
	                                                <?php if(!empty($slider_one['slider_video_url']['url'])):?>
	                                                <a href="<?php echo esc_url($slider_one['slider_video_url']['url']); ?>" class="popup-youtube theme secondary relative video-play-button">
	                                                    <i class="fa fa-play"></i>
	                                                </a>
	                                                <?php endif;?>
	                                            </div>  
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php 
	                $counter++;
					endforeach;
				?> 
            </div>
            <!-- End Wrapper for slides -->
            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <span class="sr-only"><?php echo esc_html__("Previous",'cleanu-core'); ?></span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <span class="sr-only"><?php echo esc_html__("Next",'cleanu-core'); ?></span>
            </a>
        </div>
    </div>
    <!-- End Banner Style One  -->

    <?php
	}elseif($cleanu_slider_output['style'] == 2){
	?>

	<!-- Start Banner Style Two
    ============================================= -->
    <div class="banner-area inc-shape text-multi-weight">
        
        <div id="bootcarousel" class="carousel slide carousel-fade animate_text" data-ride="carousel">
            <!-- Indicators for slides -->
            <div class="carousel-indicator">
                <ol class="carousel-indicators right">
                	<?php 
		              $counter = 0;
		              foreach ($sliders_two as $slider_two) :
		            ?>
                    	<li data-target="#bootcarousel" data-slide-to="<?php echo $counter;?>" class="<?php if($counter == 0){echo esc_attr("active");}?>"></li>
                    <?php 
		                $counter++;
						endforeach;
					?>
                </ol>
            </div>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            	<?php
            		$counter = 1;
            		foreach($sliders_two as $slider_two):
            	?>
                <div class="carousel-item bg-cover <?php if($counter == 1){echo esc_attr("active");}?>" style="background-image: url(<?php echo esc_url($slider_two['image_slider']['url']); ?>);">
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="content">
                                            <h2 data-animation="animated slideInRight"><?php echo htmlspecialchars_decode(esc_html($slider_two['slider_title'],'cleanu-core')); ?></h2>
                                            <p data-animation="animated slideInLeft">
                                               <?php echo htmlspecialchars_decode(esc_html($slider_two['slider_content'],'cleanu-core')); ?>
                                            </p>
                                            <?php if(!empty($slider_two['slider_button_text'])):?>
                                            <a data-animation="animated zoomInUp" class="btn btn-theme effect primary btn-md" href="<?php echo esc_url($slider_two['slider_button_url']['url']); ?>"><?php echo esc_html($slider_two['slider_button_text'],'cleanu-core'); ?></a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($cleanu_slider_output['slider_shape_two']['url'])):?>
	                            <!-- Shape -->
	                            <div class="shape-border" style="background-image: url(<?php echo esc_url($cleanu_slider_output['slider_shape_two']['url']);?>);"></div>
	                            <!-- End Shape -->
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
                <?php 
	                $counter++;
					endforeach;
				?> 
            </div>
            <!-- End Wrapper for slides -->

        </div>
    </div>
    <!-- End Banner Banner Style Two -->
    <?php }elseif($cleanu_slider_output['style'] == 3){ ?>

    <!-- Start Banner Style Three
    ============================================= -->
    <div class="banner-area bg-cover shadow theme-hard text-light text-multi-weight" style="background-image: url(<?php echo esc_url($cleanu_slider_output['banner_image']['url']); ?>);">
        
        <div class="banner-items">
            <div class="box-table">
                <div class="box-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="content">
                                    <h2 data-animation="animated slideInRight"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_title'],'cleanu-core')); ?></h2>
                                    <p data-animation="animated slideInLeft">
                                        <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_subtitle'],'cleanu-core')); ?>
                                    </p>
                                    <?php if(!empty($cleanu_slider_output['banner_video_url']['url'])):?>
	                                    <div class="video-button">
	                                        <a href="<?php echo esc_url($cleanu_slider_output['banner_video_url']['url']); ?>" class="popup-youtube video-btn theme"><i class="fal fa-play"></i><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_video_txt'],'cleanu-core')); ?></a>
	                                    </div>
                                	<?php endif;?>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="appinment-forms">
                                    <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_form_title'],'cleanu-core')); ?></h2></h2>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_form_subtitle'],'cleanu-core')); ?></h2>
                                    </p>
                                    <?php echo do_shortcode($cleanu_slider_output['banner_sc']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($cleanu_slider_output['slider_shape_three']['url'])):?>
	                <!-- Shape -->
	                <div class="shape-bottom-center" style="background-image: url(<?php echo esc_url($cleanu_slider_output['slider_shape_three']['url']);?>);"></div>
	                <!-- Shape -->
            	<?php endif;?>
            </div>
        </div>    
    </div>
    <!-- End Banner -->
	<?php }elseif($cleanu_slider_output['style'] == 4){ ?>
	<!-- Start Banner 
    ============================================= -->
    <div class="banner-area banner-style-four auto-height bg-dark text-light text-multi-weight">
        
        <div class="banner-items">
        	<?php if(!empty($cleanu_slider_output['slider_shape_v4_one']['url'])):?>
	            <div class="shape">
	                <img src="<?php echo esc_url($cleanu_slider_output['slider_shape_v4_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	            </div>
       		<?php endif;?>
       		<?php if(!empty($cleanu_slider_output['slider_shape_v4_two']['url'])):?>
            	<div class="shape-right-bottom" style="background-image: url(<?php echo esc_url($cleanu_slider_output['slider_shape_v4_two']['url']);?>);"></div>
            <?php endif;?>

            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h2 class="wow slideInRight"> <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_title_v4'],'cleanu-core')); ?></h2>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_content_v4'],'cleanu-core')); ?>
                            <?php if(!empty($cleanu_slider_output['banner_video_url_v4']['url'])):?>
                            <div class="video-button wow fadeInDown" data-wow-delay="900ms">
                                <a href="<?php echo esc_url($cleanu_slider_output['banner_video_url_v4']['url']);?>" class="popup-youtube video-btn theme"><i class="fal fa-play"></i><?php echo esc_html($cleanu_slider_output['banner_video_txt_v4']);?></a>
                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp">
                        	<?php if(!empty($cleanu_slider_output['banner_image_v4']['url'])):?>
                            <img src="<?php echo esc_url($cleanu_slider_output['banner_image_v4']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        	<?php endif;?>
                        	<?php
				        		foreach($sliders_v4_icons as $sliders_v4_icon):
				        	?>
	                            <?php if(!empty($sliders_v4_icon['flat_icon_v4'])):?>
			                        <i class="<?php echo esc_attr($sliders_v4_icon['flat_icon_v4']); ?>"></i>
			                    <?php endif;?>
			                    <?php if(!empty($sliders_v4_icon['custom_icon_v4'])):?>
			                        <i class="<?php echo esc_attr($sliders_v4_icon['custom_icon_v4']); ?>"></i>
			                    <?php endif;?>
			                    <?php if(!empty($sliders_v4_icon['icon_image_v4'])):?>
			                        <img src="<?php echo esc_url($sliders_v4_icon['icon_image_v4']['url']); ?>">
			                    <?php endif;?>
		                    <?php 
								endforeach;
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
    </div>
    <!-- End Banner -->	
    <?php }elseif($cleanu_slider_output['style'] == 5){ ?>
    <!-- Strat Banner style Five -->		
    <div class="banner-area banner-style-five auto-height bg-dark text-light text-multi-weight">
        <div class="shape-top-right" style="background-image: url(<?php echo esc_url($cleanu_slider_output['banner_image_v5']['url']); ?>);"></div>
        <div class="banner-items">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h4 class="wow slideInLeft"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_subtitle_v5'],'cleanu-core')); ?></h4>
                            <h2 class="wow slideInRight"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_title_v5'],'cleanu-core')); ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="500ms">
                               <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_content_v5'],'cleanu-core')); ?>
                            </p>
                            <?php if(!empty($cleanu_slider_output['banner_button_text_v5'])): ?>
                            	<a class="btn btn-light primary effect btn-md wow fadeInDown" data-wow-delay="900ms" href="<?php echo esc_url($cleanu_slider_output['banner_button_url_v5']);?>"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_button_text_v5'],'cleanu-core')); ?></a>
                        	<?php endif;?>
                        </div>
                    </div>
                    <?php if(!empty($cleanu_slider_output['banner_shape_v5']['url'])):?>
                    <div class="col-lg-6">
                        <div class="thumb wow fadeInUp">
                            <img src="<?php echo esc_url($cleanu_slider_output['banner_shape_v5']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </div>
                    </div>
                <?php endif;?>
                </div>
            </div>
        </div>
    </div>	
    <!-- End Banner style Five -->

	<?php }elseif($cleanu_slider_output['style'] == 6){ ?>
    <!-- Start Banner Style Six
    ============================================= -->
    <div class="banner-area bg-gray bg-cover banner-style-six auto-height">
    	<?php if(!empty($cleanu_slider_output['banner_shape_v6_two']['url'])):?>	
	        <div class="fixed-shape">
	            <img class="wow fadeInUp" data-wow-delay="600ms" src="<?php echo esc_url($cleanu_slider_output['banner_shape_v6_two']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        </div>
        <?php endif;?>
        
        <div class="banner-items">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-7">
                        <div class="content">
                            <h2 class="wow slideInLeft"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_subtitle_v6'],'cleanu-core')); ?></h2>
							<h1 style="background-image: url(<?php echo esc_url($cleanu_slider_output['banner_title_image_v6']['url']) ?>); color: #1d2746; -webkit-background-clip: unset; -webkit-text-fill-color: unset; font-size: 70px; margin-top: 15px; text-transform: uppercase;"><?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_title_v6'],'cleanu-core')); ?></h1>
                            <p class="wow fadeInUp" data-wow-delay="900ms">
                               <?php echo htmlspecialchars_decode(esc_html($cleanu_slider_output['banner_content_v6'],'cleanu-core')); ?>
                            </p>
                            <?php if(!empty($cleanu_slider_output['banner_video_url_v6']['url'])):?>
								<a class="btn btn-light primary effect btn-md wow fadeInDown" data-wow-delay="900ms" href="<?php echo esc_url($cleanu_slider_output['banner_video_url_v6']['url']); ?>"><?php echo esc_html($cleanu_slider_output['banner_video_txt_v6']); ?></a>
	                            <a href="javascript:void(0)" class="video-btn"><i class="fal fa-phone"></i> Call Now: +971 544015796</a>
	                            
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="thumb">
                        	<?php if(!empty($cleanu_slider_output['banner_image_v6']['url'])):?>
                            <img class="wow fadeInUp" data-wow-delay="1000ms" src="<?php echo esc_url($cleanu_slider_output['banner_image_v6']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif;?>
                            <?php if(!empty($cleanu_slider_output['banner_shape_v6']['url'])):?>
	                            <div class="sub-thumb wow fadeInUp">
	                                <img src="<?php echo esc_url($cleanu_slider_output['banner_shape_v6']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                            </div>
                        	<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
    </div>
    <!-- End Banner Style Six -->
	<?php	
	}
}
}