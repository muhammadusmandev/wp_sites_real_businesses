<?php
	/**
	* Elementor Pricing Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Pricing_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Pricing widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'pricing';
	}

	/**
	* Get widget title.
	*
	* Retrieve Pricing widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Pricing', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Pricing widget icon.
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
	* Retrieve the list of categories the Pricing widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements'];
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
			'pricing_content',
			[
				'label'		=> esc_html__( 'Set Pricing Content','cleanu-core' ),
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
			'pricing_column',
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
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'SubTitle', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'price', [
				'label' 		=> esc_html__( 'Price', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'currency', [
				'label' 		=> esc_html__( 'Currency', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'offer', [
				'label' 		=> esc_html__( 'Offering', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'cleanu-core' ),
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
		$repeater->add_control(
			'highlight',
			[
				'label' => __( 'Highlight Pricing', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Active', 'cleanu-core' ),
				'label_off' => __( 'Deactive', 'cleanu-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'pricing_list',
			[
				'label' 	=> esc_html__( 'Pricing List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Pricing List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '1'],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'SubTitle', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'price', [
				'label' 		=> esc_html__( 'Price', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'currency', [
				'label' 		=> esc_html__( 'Currency', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'offer', [
				'label' 		=> esc_html__( 'Offering', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
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
                'default'    => 'flaticon-cleaning-6',
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
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button URL', 'cleanu-core' ),
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
		$repeater->add_control(
			'highlight',
			[
				'label' => __( 'Highlight Pricing', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Active', 'cleanu-core' ),
				'label_off' => __( 'Deactive', 'cleanu-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'pricing_list_two',
			[
				'label' 	=> esc_html__( 'Pricing List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Pricing List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
				'condition' 	=> ['style' => '2'],
			]
		);

		$this->add_control(
			'pricing_svg_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/pricing.png',
				],
			]
		);
		$this->add_control(
			'pricing_svg_two',
			[
				'label' 	=> esc_html__( 'Pricing Active Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/bubble-right.png',
				],
				'condition' 	=> ['style' => '1'],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'estimate_style',
			[
				'label'			=> esc_html__( 'Heading Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_pricing_output = $this->get_settings_for_display();
	$pricing_list = $cleanu_pricing_output['pricing_list'];
	$pricing_lists_two = $cleanu_pricing_output['pricing_list_two'];
	if($cleanu_pricing_output['style'] == '1'):
	?>
	<!-- Start Pricing Area 
    ============================================= -->
    <div class="pricing-area shadow">
    	<?php if(!empty($cleanu_pricing_output['pricing_svg_one']['url'])):?>
	        <!-- Fixed Shape -->
	        <div class="fixed-sahpe-bottom">
	            <img src="<?php echo esc_url($cleanu_pricing_output['pricing_svg_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        </div>
	        <!-- End Fixed Shape -->
    	<?php endif?>
    	<?php if($cleanu_pricing_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_pricing_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_pricing_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_pricing_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="pricing pricing-simple">
                <div class="row">
                    <?php
                		$counter = 1;
	            		foreach($pricing_list as $single_pricing):
	            	?>
                    <div class="col-lg-<?php echo esc_attr($cleanu_pricing_output['pricing_column']);?> col-md-6 single-item">
                        <div class="pricing-item <?php if($single_pricing['highlight'] == 'yes'){echo esc_attr("active");}?>">
                            <div class="pricing-header">
                                <h4><?php echo esc_html($single_pricing['title']); ?></h4>
                            </div>
                            <div class="price">
                                <h2><sup><?php echo esc_html($single_pricing['currency'],'cleanu-core'); ?></sup><?php echo esc_html($single_pricing['price'],'cleanu-core'); ?></h2>
                                <p>
                                   <?php echo esc_html($single_pricing['subtitle'],'cleanu-core'); ?>
                                </p>
                            </div>
                            <?php echo htmlspecialchars_decode(esc_html($single_pricing['offer'],'cleanu-core')); ?>
                            <?php if(!empty($single_pricing['button_text'])):?>
                            	<a class="btn <?php if($single_pricing['highlight'] == 'yes'){echo esc_attr("btn-theme secondary");}else echo esc_attr("btn-dark") ?> effect btn-sm" href="<?php echo esc_url($single_pricing['button_url']['url']); ?>"><?php echo esc_html($single_pricing['button_text'],'cleanu-core'); ?></a>
                        	<?php endif?>
                        	<!-- Shape -->
                            <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_pricing_output['pricing_svg_two']['url']);?>);"></div>
                            <!-- Shape -->
                        </div>
                    </div>
                    <?php 
                    	$counter++;
						endforeach;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->
    <?php elseif($cleanu_pricing_output['style'] == '2'):?>
    <!-- Start Pricing Area 
    ============================================= -->
    <div class="pricing-area shadow default-padding-top bottom-less">
    	<?php if(!empty($cleanu_pricing_output['pricing_svg_one']['url'])):?>
	        <!-- Fixed Shape -->
	        <div class="fixed-sahpe-bottom">
	           <img src="<?php echo esc_url($cleanu_pricing_output['pricing_svg_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	        </div>
	        <!-- End Fixed Shape -->
        <?php endif?>
        <?php if($cleanu_pricing_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_pricing_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_pricing_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_pricing_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_pricing_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="pricing pricing-simple">
                <div class="row">
                	<?php
                		$counter = 1;
	            		foreach($pricing_lists_two as $single_pricing_two):
	            	?>
	                    <div class="col-lg-6 col-md-6 pricing-style-two">
	                        <div class="pricing-item <?php if($single_pricing_two['highlight'] == 'yes'){echo esc_attr("active");}?>">
	                            <?php if(!empty($single_pricing_two['flat_icon_one'])):?>
                                <i class="<?php echo esc_attr($single_pricing_two['flat_icon_one']); ?>"></i>
	                            <?php endif;?>
	                            <?php if(!empty($single_pricing_two['icon_image_one'])):?>
	                                <img src="<?php echo esc_url($single_pricing_two['icon_image_one']['url']); ?>">
	                            <?php endif;?>
	                            <div class="pricing-header">
	                                <h4><?php echo esc_html($single_pricing_two['title']); ?></h4>
	                            </div>
	                            <div class="price">
	                                <h2><sup><?php echo esc_html($single_pricing_two['currency']); ?></sup><?php echo esc_html($single_pricing_two['price']); ?></h2>
	                                <p>
	                                    <?php echo esc_html($single_pricing_two['subtitle']); ?>
	                                </p>
	                            </div>
	                            <?php echo htmlspecialchars_decode(esc_html($single_pricing_two['offer'],'cleanu-core')); ?>
	                            <?php if(!empty($single_pricing_two['button_text'])):?>
		                            <div class="button">
		                                <a class="btn <?php if($single_pricing_two['highlight'] == 'yes'){echo esc_attr("btn-theme secondary");}else echo esc_attr("btn-dark") ?> effect btn-sm" href="<?php echo esc_url($single_pricing_two['button_url']['url']); ?>"><?php echo esc_html($single_pricing_two['button_text']); ?></a>
		                            </div>
	                            <?php endif?>
	                        </div>
	                    </div>
                    <?php 
                    	$counter++;
						endforeach;
					?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->
	<?php 
	endif;
	}
}