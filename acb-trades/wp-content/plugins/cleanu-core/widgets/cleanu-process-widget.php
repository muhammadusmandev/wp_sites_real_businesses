<?php
	/**
	* Elementor Process Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Process_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Process widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'cleanu_process';
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
		return esc_html__( 'Process', 'cleanu-core' );
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
	* Retrieve the list of categories the Process widget belongs to.
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
			'process_set_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'process_title', [
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

		
		$this->add_control(
			'process_list',
			[
				'label' 	=> esc_html__( 'Process', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Process', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ process_title }}}',
			]
		);

		$this->add_control(
			'process_shape',
			[
				'label' 	=> esc_html__( 'Background Shape ', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);


		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_process_output = $this->get_settings_for_display();
	$process_lists = $cleanu_process_output['process_list'];
	?>
	<!-- Star Process
    ============================================= -->
    <div class="process-style-four-area text-center">
        <div class="container">
            <div class="process-style-four-box">
            	<?php if(!empty($cleanu_process_output['process_shape']['url'])):?>
                <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_process_output['process_shape']['url']);?>);"></div>
            	<?php endif; ?>
                <div class="row">
                	<?php
	            		foreach($process_lists as $single_process):
	            	?>
	                    <!-- Single Item -->
	                    <div class="single-item col-lg-4 col-md-6">
	                        <div class="process-style-four">
	                            <div class="content">
	                                <?php if(!empty($single_process['flat_icon_one'])):?>
	                                <i class="<?php echo esc_attr($single_process['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_process['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_process['icon_image_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($single_process['custom_icon'])):?>
		                               <i class="<?php echo esc_attr($single_process['custom_icon']); ?>"></i>
		                            <?php endif;?>
	                                <h3><?php echo esc_html($single_process['process_title']);?></h3>
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
    <!-- End Process -->
	<?php 
	}
}