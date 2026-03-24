<?php
	/**
	* Elementor Featured Image Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Featured_Image_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Featured Image widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'featured_image';
	}

	/**
	* Get widget title.
	*
	* Retrieve Featured Image widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Featured Image', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Featured Image widget icon.
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
	* Retrieve the list of categories the Featured Image widget belongs to.
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
			'featured_iamge__content',
			[
				'label'		=> esc_html__( 'Set Featured Image Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Style Two', 'cleanu-core' ),
				],
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => ['style' => '2']
			]
		);
		
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Subtitle', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => ['style' => '2']
			]
		);
		$this->add_control(
			'year', [
				'label' 		=> esc_html__( 'Year', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => ['style' => '2']
			]
		);

		$this->add_control(
			'feature_image_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' => ['style' => '2']
			]
		);

		$this->add_control(
			'feature_image_style_two',
			[
				'label' 	=> esc_html__( 'Featured Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' => ['style' => '1']
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'featured_image_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'featured_img_bac_color',
			[
				'label' 		=> esc_html__( 'Background Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style-three.award .item' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'featured_img_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style-three.award .item h2' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_featured_image_output = $this->get_settings_for_display();
	if($cleanu_featured_image_output['style'] == '1'):
	?>
	<!-- Star Features Image
    ============================================= -->
    <div class="features-style-two">
        <div class="thumb">
            <img src="<?php echo esc_url($cleanu_featured_image_output['feature_image_style_two']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
    </div>
    <!-- End Features Image -->
	<?php elseif($cleanu_featured_image_output['style'] == '2'): ?>
		<div class="feature-style-three award">
	        <div class="item text-center">
	            <!-- Shape -->
	            <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_featured_image_output['feature_image_shape_one']['url']);?>);">
	            </div>
	            <!-- End Shape -->
				<h4><?php echo esc_html($cleanu_featured_image_output['subtitle']);?></h4>
	            <h2><strong><?php echo esc_html($cleanu_featured_image_output['year']);?></strong> <?php echo esc_html($cleanu_featured_image_output['title']);?></h2>
	        </div>
	    </div>	
	<?php		
	endif;
	}
}