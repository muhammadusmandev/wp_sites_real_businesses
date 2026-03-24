<?php
	/**
	* Elementor Workprocess Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Workprocess_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Workprocess widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'workprocess';
	}

	/**
	* Get widget title.
	*
	* Retrieve Workprocess widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Workprocess', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Workprocess widget icon.
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
	* Retrieve the list of categories the Workprocess widget belongs to.
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
			'workprocess_content',
			[
				'label'		=> esc_html__( 'Work-Process Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'workprocess_column',
			[
				'label' 	=> esc_html__( 'Column Type', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '4',
				'options' 	=> [
					'6' 	=> esc_html__( 'Two Column', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Four Column', 'cleanu-core' ),
					'4'  	=> esc_html__( 'Three Column', 'cleanu-core' ),
					
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
			'wordprocess_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		
		$this->add_control(
			'workprocess_list',
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
			'workprocess_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/workprocess.png',
				],
			]
		);
		$this->add_control(
			'workprocess_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/workprocess_2.png',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'workproces_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'workprocess_title_txt_color',
			[
				'label' 		=> esc_html__( 'Workprocess Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-style-one h5' => 'color: {{VALUE}}',
				],

			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_workprocess_output = $this->get_settings_for_display();
	$workprocess_list = $cleanu_workprocess_output['workprocess_list'];
	?>
	<!-- Start Process Area
    ============================================= -->
    <div class="work-process-area text-center">
    	<?php if(!empty($cleanu_workprocess_output['workprocess_shape_one']['url'])):?>
        <!-- Shape -->
        <div class="shape">
            <img src="<?php echo esc_url($cleanu_workprocess_output['workprocess_shape_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <!-- End Shape -->
        <?php endif; ?>
        <div class="container">
            <?php if($cleanu_workprocess_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_workprocess_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_workprocess_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_workprocess_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_workprocess_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_workprocess_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_workprocess_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container">
            <div class="process-items style-two">
            	<?php if(!empty($cleanu_workprocess_output['workprocess_shape_two']['url'])):?>
	                <!-- Shape -->
	                <div class="line-shape">
	                    <img src="<?php echo esc_url($cleanu_workprocess_output['workprocess_shape_two']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                </div>
	                <!-- End Shape -->
            	<?php endif; ?>
                <div class="row">
                	<?php 
                    	$counter=1;
                    	foreach ($workprocess_list as $single_workprocess):
                    ?>
                    <!-- Single Item -->
                    <div class="process-style-one col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <img src="<?php echo esc_url($single_workprocess['wordprocess_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <span><?php echo esc_html__("0",'cleanu-core') ?><?php echo esc_html($counter);?></span>
                            </div>
                            <h5><?php echo esc_html($single_workprocess['title']);?></h5>
                        </div>
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
    <!-- End Process Area -->

	<?php
	}
}