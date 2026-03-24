<?php
	/**
	* Elementor About Content Tab Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_About_Content_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About Content widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'about_content';
	}

	/**
	* Get widget title.
	*
	* Retrieve About Nav Tab widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'About Content', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve About Nav Tab widget icon.
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
	* Retrieve the list of categories the About Nav Tab widget belongs to.
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
			'about_content',
			[
				'label'		=> esc_html__( 'About Content','cleanu-core' ),
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
					'3' 	=> esc_html__( 'Style Three', 'cleanu-core' ),
					'4' 	=> esc_html__( 'Style Four', 'cleanu-core' ),
				],
			]
		);

		$this->add_control(
			'online_form_title',
			[
				'label' 		=> esc_html__( 'Form Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'online_form_subtitle',
			[
				'label' 		=> esc_html__( 'Form Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);

		$this->add_control(
			'book_online_sc', [
				'label' 		=> esc_html__( 'Form Shortcode', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);

		$this->add_control(
			'service_list_title',
			[
				'label' 		=> esc_html__( 'Service List Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'service_list_content',
			[
				'label' 		=> esc_html__( 'Service List Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
				'condition' 	=> ['style' => '3'],
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subtitle', [
				'label' 		=> esc_html__( 'Sub-Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2','4']],
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','2','4']],
			]
		);
		$this->add_control(
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
				'condition' 	=> ['style' => ['1','2','4']],
			]
		);
		$this->add_control(
			'contact_text',
			[
				'label' 		=> esc_html__( 'Contact Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','3']],
			]
		);
		$this->add_control(
			'contact_number',
			[
				'label' 		=> esc_html__( 'Contact Number', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['1','3']],
			]
		);

		$this->add_control(
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
		$this->add_control(
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
		$this->add_control(
			'custom_icon', [
				'label' 		=> esc_html__( 'Custom Icon', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' => [
                    'icon_style' => '2'
                ]
			]
		);
		$this->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_content_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'about_content_title_txt_color',
			[
				'label' 		=> esc_html__( 'Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one h2' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'about_content_quote_txt_color',
			[
				'label' 		=> esc_html__( 'Quote Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one blockquote' => 'color: {{VALUE}}',
				],

			]
		);

		$this->add_control(
			'about_content_content_txt_color',
			[
				'label' 		=> esc_html__( 'Content Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one p' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'about_content_btm_con_txt_color',
			[
				'label' 		=> esc_html__( 'Bottom Contact Number Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .bottom-info .contact .content h5' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'about_content_btm_con_title_txt_color',
			[
				'label' 		=> esc_html__( 'Bottom Contact Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-one .bottom-info .contact .content span' => 'color: {{VALUE}}',
				],

			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$cleanu_about_content_output = $this->get_settings_for_display();
	if($cleanu_about_content_output['style'] == '1'):
	?>
    <div class="about-style-one info">
        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['title'])); ?></h2>
        <?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['content'])); ?>
        <div class="bottom-info">
        	<?php if(!empty($cleanu_about_content_output['button_text'])):?>
                <div class="button">
                    <a data-animation="animated zoomInUp" class="btn btn-theme primary effect btn-md" href="<?php echo esc_url($cleanu_about_content_output['button_url']['url']);?>"><?php echo esc_html($cleanu_about_content_output['button_text']);?></a>
                </div>
        	<?php endif;?>
            <div class="contact">
                <div class="content">
                    <span><?php echo esc_html($cleanu_about_content_output['contact_text']);?></span>
                    <h5><?php echo esc_html($cleanu_about_content_output['contact_number']);?></h5>
                </div>
            </div>
        </div>
    </div>
    <?php elseif($cleanu_about_content_output['style'] == '2'): ?>
    	<div class="about-style-three">
	        <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['subtitle'])); ?></h4>
	        <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['title'])); ?></h2>
	        <?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['content'])); ?>
	        <?php if(!empty($cleanu_about_content_output['button_text'])):?>
	        	<a class="btn btn-theme primary effect btn-md" href="<?php echo esc_url($cleanu_about_content_output['button_url']['url']);?>"><?php echo esc_html($cleanu_about_content_output['button_text']);?></a>
	        <?php endif;?>
	    </div>
	<?php elseif($cleanu_about_content_output['style'] == '3'): ?>
		<div class="about-style-four-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-5">
                    <div class="about-style-four">
                        <div class="form">
                            <div class="appinment-forms standard">
                                <div class="top-heading">
                                    <h2><?php echo esc_html($cleanu_about_content_output['online_form_title']);?></h2>
                                    <p>
                                       <?php echo esc_html($cleanu_about_content_output['online_form_subtitle']);?>
                                    </p>
                                </div>
                                <?php echo do_shortcode($cleanu_about_content_output['book_online_sc']);?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="about-style-four">
                        <div class="about-list-item">
                            <div class="services-list">
                                <h4><?php echo esc_html($cleanu_about_content_output['service_list_title']);?></h4>
                               <?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['service_list_content'])); ?>
                            </div>
                            <div class="info">
                                <h2><?php echo esc_html($cleanu_about_content_output['title']);?></h2>
                                <?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['content'])); ?>
                                <div class="call-us">
                                    <div class="icon">
                                    <?php if(!empty($cleanu_about_content_output['flat_icon_one'])):?>
	                                <i class="<?php echo esc_attr($cleanu_about_content_output['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_about_content_output['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($cleanu_about_content_output['icon_image_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_about_content_output['custom_icon'])):?>
		                               <i class="<?php echo esc_attr($cleanu_about_content_output['custom_icon']); ?>"></i>
		                            <?php endif;?>
                                    </div>
                                    <div class="content">
                                       <h5><?php echo esc_html($cleanu_about_content_output['contact_text']);?></h5>
                                        <span><?php echo esc_html($cleanu_about_content_output['contact_number']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php elseif($cleanu_about_content_output['style'] == '4'): ?>
    <div class="about-style-six">
        <h4 class="sub-heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['subtitle'])); ?></h4>
	    <h2 class="heading"><?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['title'])); ?></h2>
       	<?php echo htmlspecialchars_decode(esc_html($cleanu_about_content_output['content'])); ?>
       <?php if(!empty($cleanu_about_content_output['button_text'])):?>
        	<a class="btn btn-theme primary effect btn-md" href="<?php echo esc_url($cleanu_about_content_output['button_url']['url']);?>"><?php echo esc_html($cleanu_about_content_output['button_text']);?></a>
        <?php endif;?>
    </div>

    <?php endif;	
    }
}