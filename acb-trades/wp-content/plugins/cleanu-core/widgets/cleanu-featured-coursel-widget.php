<?php
	/**
	* Elementor Featured Coursel Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Featured_Coursel_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve featured Coursel widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'featured_coursel';
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
		return esc_html__( 'Featured Coursel', 'cleanu-core' );
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
			'featured_coursel_content',
			[
				'label'		=> esc_html__( 'Featured Coursel Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'years', [
				'label' 		=> esc_html__( 'Years', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'yr_bac_image',
			[
				'label'			=> esc_html__( 'Add Background Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> esc_html__( 'Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
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
			'flat_icon',
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
			'icon_image',
			[
				'label'			=> esc_html__( 'Add Icon Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'custom_icon',
			[
				'label'			=> esc_html__( 'Custom Icon','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$repeater->add_control(
			'coursel_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'coursel_button_url',
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

		$this->add_control(
			'featured_coursel_list',
			[
				'label' 	=> esc_html__( 'Coursel List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Coursel List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'featured_coursel_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_featured_coursel_output = $this->get_settings_for_display();
	$coursel_list = $cleanu_featured_coursel_output['featured_coursel_list'];
	?>
    <!-- Star Features Content
    ============================================= -->
    <div class="features-style-two">
        <div class="experience">
            <div class="year">
                <h2 style="background-image: url(<?php echo esc_url($cleanu_featured_coursel_output['yr_bac_image']['url']); ?>);"><?php echo esc_html($cleanu_featured_coursel_output['years']);?></h2>
                <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_featured_coursel_output['title']));?></h4>
            </div>
            <p>
               <?php echo htmlspecialchars_decode(esc_html($cleanu_featured_coursel_output['content']));?>
            </p>
        </div>
        <div class="features-style-two-box">
            <div class="item-carousel feature-service-carousel owl-carousel owl-theme text-light">
                <?php foreach($coursel_list as $single_coursel):?>
                    <!-- Single Item-->
                    <div class="item">
                        <div class="icon">
                            <?php if(!empty($single_coursel['flat_icon'])):?>
                                <i class="<?php echo esc_attr($single_coursel['flat_icon']); ?>"></i>
                            <?php endif;?>
                            <?php if(!empty($single_coursel['icon_image'])):?>
                                <img src="<?php echo esc_url($single_coursel['icon_image']['url']); ?>">
                            <?php endif;?>
                            <?php if(!empty($single_coursel['custom_icon'])):?>
                                <i class="<?php echo esc_attr($single_coursel['custom_icon']); ?>"></i>
                            <?php endif;?>
                        </div>
                        <div class="info">
                            <h4><?php echo esc_html($single_coursel['title']);?></h4>
                            <p>
                               <?php echo esc_html($single_coursel['content']); ?>
                            </p>
                            <?php if(!empty($single_coursel['coursel_button_text'])):?>
                            <a href="<?php echo esc_url($single_coursel['coursel_button_url']['url']);?>" class="btn-regular"><?php echo esc_html($single_coursel['coursel_button_text']);?> <i class="fas fa-angle-right"></i></a>
                        	<?php endif;?>
                        </div>
                    </div>
                    <!-- End Single Item-->
            	<?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- End Features Content -->
	<?php 
	}
}
?>