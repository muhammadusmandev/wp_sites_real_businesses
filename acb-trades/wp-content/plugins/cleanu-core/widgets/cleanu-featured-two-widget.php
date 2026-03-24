<?php
	/**
	* Elementor Featured Two Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Featured_Two_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve featured two widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'featured_two';
	}

	/**
	* Get widget title.
	*
	* Retrieve featured widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Featured Style Two', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve featured widget icon.
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
			'featured_two_content',
			[
				'label'		=> esc_html__( 'Featured Content','cleanu-core' ),
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
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
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
                'default'    => 'flaticon-cleaning-service',
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
				'label'			=> esc_html__( 'Add Custom Icon','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'condition' => [
                    'icon_style' => '4'
                ]
			]
		);
		$repeater->add_control(
			'service_single_url',
			[
				'label' 		=> esc_html__( 'Single Page URL', 'cleanu-core' ),
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
			'feature_two_list',
			[
				'label' 	=> esc_html__( 'Featured List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Featured List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'featured_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'featured_two_title_color',
			[
				'label' 		=> esc_html__( 'Title Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style-three .top h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'featured_two_content_color',
			[
				'label' 		=> esc_html__( 'Content Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style-three p' => 'color: {{VALUE}}',
				],

			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_featured_two_output = $this->get_settings_for_display();
	$featured_lists = $cleanu_featured_two_output['feature_two_list'];
	if($cleanu_featured_two_output['style'] == '1'):
	?>
    <!-- Start Features Area Style Two
    ============================================= -->
    <div class="feature-style-three">
    	<?php foreach($featured_lists as $single_list):?>
	        <div class="item">
	            <div class="top">
	                <?php if(!empty($single_list['flat_icon_one'])):?>
	                    <i class="<?php echo esc_attr($single_list['flat_icon_one']); ?>"></i>
	                <?php endif;?>
	                <?php if(!empty($single_list['icon_image_one'])):?>
	                    <img src="<?php echo esc_url($single_list['icon_image_one']['url']); ?>">
	                <?php endif;?>
	                <?php if(!empty($single_list['custom_icon'])):?>
	                   <i class="<?php echo esc_attr($single_list['custom_icon']); ?>"></i>
	                <?php endif;?>
	                <h4><a href="<?php echo esc_url($single_list['service_single_url']['url']);?>"><?php echo esc_html($single_list['title']);?></a></h4>
	            </div>
	            <p><?php echo esc_html($single_list['content']);?></p>
	        </div>
    	<?php endforeach;?>
    </div>
    <!-- End Features Area Two-->
	<?php elseif($cleanu_featured_two_output['style'] == '2'): ?>
	<!-- Start Features Area Style One -->
	    <div class="feature-style-four">
	    	<?php foreach($featured_lists as $single_list):?>
		        <div class="item">
		            <div class="top">
		                <?php if(!empty($single_list['flat_icon_one'])):?>
	                    <i class="<?php echo esc_attr($single_list['flat_icon_one']); ?>"></i>
		                <?php endif;?>
		                <?php if(!empty($single_list['icon_image_one'])):?>
		                    <img src="<?php echo esc_url($single_list['icon_image_one']['url']); ?>">
		                <?php endif;?>
		                <?php if(!empty($single_list['custom_icon'])):?>
		                   <i class="<?php echo esc_attr($single_list['custom_icon']); ?>"></i>
		                <?php endif;?>
		                <h4><?php echo esc_html($single_list['title']);?></h4>
		            </div>
		            <p>
		                <?php echo esc_html($single_list['content']);?>
		            </p>
		        </div>
	        <?php endforeach;?>
	    </div>
    <!-- End Features Area One -->	
	<?php endif;
	}
}
?>