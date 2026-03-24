<?php
	/**
	* Elementor Appointment Form Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Appointment_Form_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Appointment Form widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'appointment_form';
	}

	/**
	* Get widget title.
	*
	* Retrieve Appointment Form widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Appointment Form', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Appointment Form widget icon.
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
	* Retrieve the list of categories the Appointment Form widget belongs to.
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
			'appointment_form_content',
			[
				'label'		=> esc_html__( 'Set Appointment Form Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows' 			=> 2,
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'app_form_shortcode',
			[
				'label' 		=> esc_html__( 'Form Shortcode', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__( 'Put your shortcode Here', 'cleanu-core' ),
			]

		);

		$this->end_controls_section();

		$this->start_controls_section(
			'appoinment_form_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'app_frm_title_txt_color',
			[
				'label' 		=> esc_html__( 'Form Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appoinment-form h2' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'app_frm_subtitle_txt_color',
			[
				'label' 		=> esc_html__( 'Form SubTitle Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .appoinment-form p' => 'color: {{VALUE}}',
				],

			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_appoinment_form_output = $this->get_settings_for_display();
	?>
	<!-- Start Appoinment Form Area
    ============================================= -->
    <div class="appoinment-form">
        <h2><?php echo esc_html($cleanu_appoinment_form_output['title']);?></h2>
        <p>
            <?php echo esc_html($cleanu_appoinment_form_output['content']);?>
        </p>
        <?php echo do_shortcode($cleanu_appoinment_form_output['app_form_shortcode']);?>
    </div>
    <!-- End Appoinment Form Area -->

	<?php 
	}
}