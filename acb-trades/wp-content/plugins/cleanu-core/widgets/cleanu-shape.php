<?php
	/**
	* Elementor Service Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Shape_Widget extends \Elementor\Widget_Base {

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
		return 'shape';
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
		return esc_html__( 'Shape', 'cleanu-core' );
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
			'shape_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Shape Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  	=> esc_html__( 'Star Shape', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Animate Ilustration Shape', 'cleanu-core' ),
				],
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'animation_top',
			[
				'label' => esc_html__( 'Top', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-right-left' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'2' ],
			]
		);

		$this->add_control(
			'animation_buttom',
			[
				'label' => esc_html__( 'Buttom', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-right-left' => 'buttom: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'2' ],
			]
		);

		$this->add_control(
			'animation_right',
			[
				'label' => esc_html__( 'Right', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-right-left' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'2' ],
			]
		);

		$this->add_control(
			'animation_left',
			[
				'label' => esc_html__( 'Left', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-right-left' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'2' ],
			]
		);

		$this->add_control(
			'animation_top_2',
			[
				'label' => esc_html__( 'Top', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-blink' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'1' ],
			]
		);

		$this->add_control(
			'animation_buttom_2',
			[
				'label' => esc_html__( 'Buttom', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-blink' => 'buttom: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'1' ],
			]
		);

		$this->add_control(
			'animation_right_2',
			[
				'label' => esc_html__( 'Right', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-blink' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'1' ],
			]
		);

		$this->add_control(
			'animation_left_2',
			[
				'label' => esc_html__( 'Left', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .animate-blink' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition'		=> [ 'style'	=>	'1' ],
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_shape_output = $this->get_settings_for_display();

	?>
	<?php if($cleanu_shape_output['style'] == '1'):?>
	<!-- Star Shape
    ============================================= -->
    <div class="animate-blink">
        <img src="<?php echo esc_url($cleanu_shape_output['shape_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
    </div>
    <!-- End Star Shape -->
    <?php elseif($cleanu_shape_output['style'] == '2'):?>
    <!-- illustration -->
        <div class="animate-right-left">
            <img src="<?php echo esc_url($cleanu_shape_output['shape_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
    <!-- End illustration -->
	<?php
	endif;
	}
}