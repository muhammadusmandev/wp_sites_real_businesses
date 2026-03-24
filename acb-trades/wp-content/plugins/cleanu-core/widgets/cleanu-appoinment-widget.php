<?php
	/**
	* Elementor Appointment Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Appointment_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Appointment widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'appointment';
	}

	/**
	* Get widget title.
	*
	* Retrieve Appointment widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Appointment Image', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Appointment widget icon.
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
	* Retrieve the list of categories the Appointment widget belongs to.
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
			'appointment_content',
			[
				'label'		=> esc_html__( 'Set Appointment Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'appoinment_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'appoinment_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/app.png',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'appoinment_style',
			[
				'label'			=> esc_html__( 'Heading Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_appoinment_output = $this->get_settings_for_display();

	?>
	<!-- Start Appoinment Area
    ============================================= -->
	    <div class="thumb">
	    	<?php if(!empty($cleanu_appoinment_output['appoinment_image']['url'])):?>
	        <img src="<?php echo esc_url($cleanu_appoinment_output['appoinment_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        <?php endif; ?>
	        <?php if(!empty($cleanu_appoinment_output['appoinment_shape_one']['url'])):?>
	        <!-- Shape -->
	        <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_appoinment_output['appoinment_shape_one']['url']);?>);"></div>
	        <!-- End Shape -->
	        <?php endif; ?>
	    </div>
    <!-- End Appoinment Area -->
	<?php 
	}
}