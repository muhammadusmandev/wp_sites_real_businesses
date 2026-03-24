<?php
	/**
	* Elementor Estimate Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Estimate_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Estimate widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'estimate';
	}

	/**
	* Get widget title.
	*
	* Retrieve Estimate widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Estimate', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Estimate widget icon.
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
	* Retrieve the list of categories the Estimate widget belongs to.
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
			'estimate_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'estimate_title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'estimate_shortcode',
			[
				'label' 		=> esc_html__( 'Estimate Shortcode', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__( 'Put your shortcode Here', 'cleanu-core' ),
			]
		);
		$this->add_control(
			'estimate_svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/estimate.png',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'estimate_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'estimate_title_txt_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .estimate-area .estimate-form h2' => 'color: {{VALUE}}',
				],

			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_estimate_output = $this->get_settings_for_display();

	?>
	<!-- Star Get Esimate
    ============================================= -->
    <div class="estimate-area">
        <div class="container">
            <div class="estimate-form default-padding">
                <div class="fixed-shape-left">
                	<?php if(!empty($cleanu_estimate_output['estimate_svg_one']['url'])):?>
                    	<img src="<?php echo esc_url($cleanu_estimate_output['estimate_svg_one']['url']); ?>" alt="<?php echo esc_attr__( 'cleanu', 'cleanu-core' ); ?>">
                	<?php endif;?>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_estimate_output['estimate_title']));?></h2>
                    </div>
                    <div class="col-lg-10">
                         <?php echo do_shortcode($cleanu_estimate_output['estimate_shortcode']);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Get Esimate -->
	<?php 
	}
}