<?php
	/**
	* Elementor About Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_About_Image_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve About widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'about_image';
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
		return esc_html__( 'About Image', 'cleanu-core' );
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
			'about_image_style',
			[
				'label'		=> esc_html__( 'About Image Style','cleanu-core' ),
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
			'funfactor_title', [
				'label' 		=> esc_html__( 'Funfactor Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2','4']],
			]
		);
		$this->add_control(
			'funfactor_number', [
				'label' 		=> esc_html__( 'Funfactor Number', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2','4']],
			]
		);
		$this->add_control(
			'funfactor_operator', [
				'label' 		=> esc_html__( 'Funfactor Operator', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' 	=> ['style' => ['2','4']],
			]
		);

		$this->add_control(
			'thumb_image',
			[
				'label' 	=> esc_html__( 'Top Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => ['1','2','4']],
			]
		);
		$this->add_control(
			'thumb_image_2',
			[
				'label' 	=> esc_html__( 'Down Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => ['1','2','4']],
			]
		);

		$this->add_control(
			'before_image',
			[
				'label' 	=> esc_html__( 'Before Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' 	=> ['style' => '3'],
			]
		);
		$this->add_control(
			'after_image',
			[
				'label' 	=> esc_html__( 'After Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'condition' 	=> ['style' => '3'],
			]
		);

		$this->end_controls_section();
	}

	// Output For User
	protected function render(){	
	$cleanu_about_image_output = $this->get_settings_for_display();
	if($cleanu_about_image_output['style'] == '1'):
	?>
	    <div class="about-style-one">
	        <div class="thumb">
	            <img src="<?php echo esc_url($cleanu_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	            <?php if(!empty($cleanu_about_image_output['thumb_image_2']['url'])):?>
	            	<img src="<?php echo esc_url($cleanu_about_image_output['thumb_image_2']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	            <?php endif;?>    
	        </div>
	    </div>
    <?php elseif($cleanu_about_image_output['style'] == '2'): ?>
    	<div class="about-style-two">
            <div class="thumb">
                <img src="<?php echo esc_url($cleanu_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php if(!empty($cleanu_about_image_output['thumb_image_2']['url'])):?>
                	<img src="<?php echo esc_url($cleanu_about_image_output['thumb_image_2']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php endif;?> 
                <?php if(!empty($cleanu_about_image_output['funfactor_number'] || $cleanu_about_image_output['funfactor_operator'] || $cleanu_about_image_output['funfactor_title'])):?>
	                <div class="fun-fact">
	                    <div class="counter">
	                        <div class="timer" data-to="<?php echo esc_attr($cleanu_about_image_output['funfactor_number']); ?>" data-speed="5000"><?php echo esc_html($cleanu_about_image_output['funfactor_number']); ?></div>
	                        <div class="operator"><?php echo esc_html($cleanu_about_image_output['funfactor_operator']); ?></div>
	                    </div>
	                    <span class="medium"><?php echo esc_html($cleanu_about_image_output['funfactor_title']); ?></span>
	                </div>
	            <?php endif;?>
            </div>
        </div>
    <?php elseif($cleanu_about_image_output['style'] == '3'): ?>
    <div class="about-style-four">
	    <div class="thumb">
            <div class="twentytwenty-container">
            	<?php if(!empty($cleanu_about_image_output['before_image']['url'])):?>
                	<img src="<?php echo esc_url($cleanu_about_image_output['before_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php endif;?>
                <?php if(!empty($cleanu_about_image_output['after_image']['url'])):?>
                	<img src="<?php echo esc_url($cleanu_about_image_output['after_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                <?php endif;?>
            </div>      
        </div>
    </div>
    <?php elseif($cleanu_about_image_output['style'] == '4'): ?>
    <div class="about-style-six">
        <div class="thumb">
        	
            <?php if(!empty($cleanu_about_image_output['thumb_image_2']['url'])):?>
            	<img src="<?php echo esc_url($cleanu_about_image_output['thumb_image_2']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            <?php endif;?>
            <?php if(!empty($cleanu_about_image_output['thumb_image']['url'])):?>
            <img src="<?php echo esc_url($cleanu_about_image_output['thumb_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            	<?php endif;?>
            <div class="common-fun-fact">
                <div class="counter">
                	<?php if(!empty($cleanu_about_image_output['funfactor_number'])):?>
                    <div class="timer" data-to="<?php echo esc_html($cleanu_about_image_output['funfactor_number']);?>" data-speed="1000"><?php echo esc_html($cleanu_about_image_output['funfactor_number']);?></div>
                	<?php endif;?>
                    <div class="operator"><?php echo esc_html($cleanu_about_image_output['funfactor_operator']);?></div>
                </div>
                <?php if(!empty($cleanu_about_image_output['funfactor_title'])):?>
                <span class="medium"><?php echo esc_html($cleanu_about_image_output['funfactor_title']);?></span>
            	<?php endif;?>
            </div>
        </div>
    </div>	
    <?php
    endif; 	
    }
}