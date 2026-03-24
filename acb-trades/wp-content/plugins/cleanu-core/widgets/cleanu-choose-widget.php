<?php
	/**
	* Elementor Choose Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Choose_Us_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Choose widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'choose';
	}

	/**
	* Get widget title.
	*
	* Retrieve Process widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Choose', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Process widget icon.
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

	// Add The Input For User
	protected function register_controls(){

		$this->start_controls_section(
			'choose_content',
			[
				'label'		=> esc_html__( 'Choose Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
	    $this->add_control(
		'left_image',
			[
				'label' 	=> esc_html__( 'Left Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'heading', [
				'label' 		=> esc_html__( 'Heading', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subheading', [
				'label' 		=> esc_html__( 'Sub-Heading', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'cleanu-core' ),
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
					'4' 	=> esc_html__( 'Custom Icon', 'cleanu-core' ),
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
                'default'    => 'flaticon-toilet-brush',
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
			'custom_icon',
			[
				'label'			=> esc_html__( 'Custom Icon','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'condition' => [
                    'icon_style' => '4'
                ]
			]
		);
		
		$this->add_control(
			'choose_list',
			[
				'label' 	=> esc_html__( 'Choose List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Choose List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		

		$this->add_control(
			'choose_video_url',
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
		$this->end_controls_section();

		$this->start_controls_section(
			'chosse_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'choose_title_txt_color',
			[
				'label' 		=> esc_html__( 'Heading Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-style-one .heading' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'choose_subtitle_txt_color',
			[
				'label' 		=> esc_html__( 'Sub-Heading Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .choose-style-one .sub-heading' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'choose_feature_title_txt_color',
			[
				'label' 		=> esc_html__( 'Feature List Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-list h4' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'choose_feature_content_txt_color',
			[
				'label' 		=> esc_html__( 'Feature List Sub-Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-list p' => 'color: {{VALUE}}',
				],

			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_choose_output = $this->get_settings_for_display();
	$choose_list = $cleanu_choose_output['choose_list'];
	?>
	<!-- Start Why Choose Us 
    ============================================= -->
    <div class="choseus-style-one-area bg-fixed default-padding" style="background-image: url(<?php echo esc_url($cleanu_choose_output['left_image']['url']); ?>);">
        <div class="angle-shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5 col-md-7 offset-md-5">
                    <div class="row">
                        <div class="col-lg-8 choose-style-one">
                            <h5 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_choose_output['heading'],'cleanu-core')); ?></h5>
                            <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_choose_output['subheading'],'cleanu-core')); ?></h2>
                            <ul>
                            	<?php
				            		foreach($choose_list as $choose_single):
				            	?>
				            	<li class="feature-list">
                                    <div class="icon">
	                                    <?php if(!empty($choose_single['flat_icon_one'])):?>
	                                    <i class="<?php echo esc_attr($choose_single['flat_icon_one']); ?>"></i>
			                            <?php endif;?>
			                            <?php if(!empty($choose_single['icon_image_one'])):?>
			                                <img src="<?php echo esc_url($choose_single['icon_image_one']['url']); ?>">
			                            <?php endif;?>
			                            <?php if(!empty($choose_single['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($choose_single['custom_icon']); ?>"></i>
			                            <?php endif;?>
                                    </div>
                                    <div class="info">
                                        <h4><?php echo esc_html($choose_single['title']); ?></h4>
                                        <p>
                                            <?php echo esc_html($choose_single['subtitle']); ?>
                                        </p>
                                    </div>
                                </li>
                                <?php 
									endforeach;
								?>
                            </ul>
                        </div>
                        <div class="col-lg-4 choose-style-one">
                        	<?php if(!empty($cleanu_choose_output['choose_video_url']['url'])): ?>
	                            <div class="video">
	                                <a href="<?php echo esc_url($cleanu_choose_output['choose_video_url']['url']); ?>" class="popup-youtube theme primary video-play-button item-center">
	                                    <i class="fa fa-play"></i>
	                                </a>
	                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us -->	
    <?php 
	}			
}
?>