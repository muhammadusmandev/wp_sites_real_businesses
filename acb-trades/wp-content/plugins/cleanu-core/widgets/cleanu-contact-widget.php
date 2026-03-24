<?php
	/**
	* Elementor Contact Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Contact_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Contact widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'contact';
	}

	/**
	* Get widget title.
	*
	* Retrieve Contact widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Contact', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Contact widget icon.
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
	* Retrieve the list of categories the Contact widget belongs to.
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
				'label'		=> esc_html__( 'Content','cleanu-core' ),
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
			'contact_title',
			[
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
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
			'contact_shortcode',
			[
				'label' 		=> esc_html__( 'Contact Form Shortcode', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> esc_html__( 'Put your shortcode Here', 'cleanu-core' ),
			]

		);
		$this->add_control(
			'contact_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'contact_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info', [
				'label' 		=> esc_html__( 'Info', 'cleanu-core' ),
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
                'default'    => 'flaticon-location',
                'condition' => [
                    'icon_style' => '1'
                ]
            ]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Font Awesome Icon', 'cleanu-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
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
		$repeater->add_control(
            'custom_icon',
            [
                'label'         => esc_html__( 'Add Custom Icon','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_style' => '4'
                ]
            ]
        );
		

		$this->add_control(
			'contact_list',
			[
				'label' 	=> esc_html__( 'Contact Info', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Contact Info', 'cleanu-core' ),
					],
				],
				'title_field' => esc_html__( '{{{ info }}}', 'cleanu-core' ),
			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_contact_output = $this->get_settings_for_display();
	if($cleanu_contact_output['style'] == '1'):
	?>
    <!-- Start Contact Area 
    ============================================= -->
    <div id="contact" class="contact-area default-padding">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-lg-4 info">
                        <div class="content text-light text-center">
                        	<?php if($cleanu_contact_output['contact_image']['url']):?>
                            <div class="thumb">
                                <img src="<?php echo esc_url($cleanu_contact_output['contact_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </div>
                            <?php endif;?>
                            <ul>
                            	<?php
									foreach( $cleanu_contact_output['contact_list'] as $single_contact):
								?>
                                <li>
                                    <?php if(!empty($single_contact['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($single_contact['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_contact['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_contact['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php 
	                                if(!empty($single_contact['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_contact['custom_icon']); ?>"></i>
	                                <?php endif;?>
                                    <?php echo htmlspecialchars_decode(esc_html($single_contact['info']));?>
                                </li>
                                <?php
									endforeach;
								?> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 contact-form-box">
                        <div class="form-box">
                            <h2><?php echo esc_html($cleanu_contact_output['contact_title']);?></h2>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_contact_output['content']));?>
                            <?php echo do_shortcode($cleanu_contact_output['contact_shortcode']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
    <?php elseif($cleanu_contact_output['style'] == '2'):?>

    <!-- Start Contact Area 
    ============================================= -->
    <div id="contact" class="contact-area bg-theme text-light default-padding">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-lg-4 info">
                        <div class="content text-light text-center">
                        	<?php if($cleanu_contact_output['contact_image']['url']):?>
                            <div class="thumb">
                               <img src="<?php echo esc_url($cleanu_contact_output['contact_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                            </div>
                            <?php endif;?>
                            <ul>
                                <?php
									foreach( $cleanu_contact_output['contact_list'] as $single_contact):
								?>
                                <li>
                                    <?php if(!empty($single_contact['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($single_contact['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($single_contact['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($single_contact['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php 
	                                if(!empty($single_contact['custom_icon'])):?>
	                                    <i class="<?php echo esc_attr($single_contact['custom_icon']); ?>"></i>
	                                <?php endif;?>
                                    <?php echo htmlspecialchars_decode(esc_html($single_contact['info']));?>
                                </li>
                                <?php
									endforeach;
								?> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 contact-form-box">
                        <div class="form-box">
                            <h2><?php echo esc_html($cleanu_contact_output['contact_title']);?></h2>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_contact_output['content']));?>
                             <?php echo do_shortcode($cleanu_contact_output['contact_shortcode']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
	<?php
	endif;
	}
}