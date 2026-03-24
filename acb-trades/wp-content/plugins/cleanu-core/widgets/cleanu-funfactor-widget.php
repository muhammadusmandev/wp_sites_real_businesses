<?php
	/**
	* Elementor Funfactor Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Funfactor_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Funfactor widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'funfactor';
	}

	/**
	* Get widget title.
	*
	* Retrieve Funfactor widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Funfactor', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Funfactor widget icon.
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
	* Retrieve the list of categories the Funfactor widget belongs to.
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
			'funfactor_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'funfact_column',
			[
				'label' 	=> esc_html__( 'Column Type', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '4',
				'options' 	=> [
					'6' 	=> esc_html__( 'Two Column', 'cleanu-core' ),
					'4'  	=> esc_html__( 'Three Column', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Four Column', 'cleanu-core' ),

					
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'cleanu-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'number', [
				'label' 		=> esc_html__( 'Number', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'cleanu-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'sign', [
				'label' 		=> esc_html__( 'Sign', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'cleanu-core' ),
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'funfact_list',
			[
				'label' 	=> esc_html__( 'Work-Process', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Work-Process', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'version',
			[
				'label' => __( 'Dark / Light', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Light', 'cleanu-core' ),
				'label_off' => __( 'Dark', 'cleanu-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'funfact_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/funfactor.png',
				],
			]
		);
		$this->add_control(
			'funfact_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/map.svg',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'funfact_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'funfactor_counter_color',
			[
				'label' 		=> esc_html__( 'Counter Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fun-fact .counter .timer' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'funfactor_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .fun-fact span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_funfact_output = $this->get_settings_for_display();
	$funfact_list = $cleanu_funfact_output['funfact_list'];
	?>
	<!-- Start Fun Factor Area
    ============================================= -->
    <div class="fun-factor-area <?php if($cleanu_funfact_output['version'] == 'yes'){echo esc_attr("bg-theme text-light");}?>">
    	<?php if(!empty($cleanu_funfact_output['funfact_shape_one']['url'])):?>
	        <!-- Shape -->
	        <div class="shape-animated-left-right">
	            <img src="<?php echo esc_url($cleanu_funfact_output['funfact_shape_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        </div>
	        <!-- End Shape -->
    	<?php endif;?>
        <div class="container">
            <div class="fun-fact-items text-center default-padding">	
                <div class="row">
                	<?php 
                    	$counter=1;
                    	foreach ($funfact_list as $single_funfact):
                    ?>
                    <div class="col-lg-<?php echo esc_attr($cleanu_funfact_output['funfact_column']);?> col-md-6 item">
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="<?php echo esc_attr($single_funfact['number']);?>" data-speed="5000"><?php echo esc_html($single_funfact['number']);?></div>
                                <div class="operator"><?php echo esc_html($single_funfact['sign']);?></div>
                            </div>
                            <span class="medium"><?php echo esc_html($single_funfact['title']);?></span>
                        </div>
                    </div>
                    <?php
                	    $counter++;
                	    endforeach;
                	?>
                </div>
            </div>
        </div>
		
		<?php if(!empty($cleanu_funfact_output['funfact_shape_two']['url'])):?>
			<!-- Fixed BG -->
			<div class="fixed-bg" style="background-image: url(<?php echo esc_url($cleanu_funfact_output['funfact_shape_two']['url']); ?>);"></div>
			<!-- Fixed BG -->
		<?php endif;?>

    </div>
    <!-- End Fun Factor Area -->
	<?php 
	}
}