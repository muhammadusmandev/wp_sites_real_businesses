<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
	/**
	* Elementor Testimonial Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Testimonial_Widget extends Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Testimonial widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'testimonial';
	}

	/**
	* Get widget title.
	*
	* Retrieve Testimonial widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Testimonial', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Testimonial widget icon.
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

	public function get_script_depends() {
		return [ 'mainjs' ];
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
			'testimonial_content',
			[
				'label'		=> esc_html__( 'Testimonial Content','cleanu-core' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Service Style', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( 'Style One', 'cleanu-core' ),
					'2' 	=> esc_html__( 'Style Two', 'cleanu-core' ),
				],
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'testimonial_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_content', [
				'label' 		=> esc_html__( 'Set Testimonial Content', 'cleanu-core' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_name', [
				'label' 		=> esc_html__( 'Person Name', 'cleanu-core' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_rating', [
				'label' 		=> esc_html__( 'Person Rating', 'cleanu-core' ),
				'type' 		    => Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> esc_html__( '1', 'cleanu-core' ),
					'2' 	=> esc_html__( '1.5', 'cleanu-core' ),
					'3'  	=> esc_html__( '2', 'cleanu-core' ),
					'4' 	=> esc_html__( '2.5', 'cleanu-core' ),
					'5'  	=> esc_html__( '3', 'cleanu-core' ),
					'6' 	=> esc_html__( '3.5', 'cleanu-core' ),
					'7'  	=> esc_html__( '4', 'cleanu-core' ),
					'8' 	=> esc_html__( '4.5', 'cleanu-core' ),
					'9'  	=> esc_html__( '5', 'cleanu-core' ),
				],
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'testomonial_list',
			[
				'label' 	=> esc_html__( 'Testimonial', 'cleanu-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Testimonial', 'cleanu-core' ),
					],
				],
				'condition' => [
                    'style' => '1'
                ],
				'title_field' => '{{{ person_name }}}',
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'testimonial_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_content', [
				'label' 		=> esc_html__( 'Set Testimonial Content', 'cleanu-core' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'person_name', [
				'label' 		=> esc_html__( 'Person Name', 'cleanu-core' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'person_designation', [
				'label' 		=> esc_html__( 'Person Designation', 'cleanu-core' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'testomonial_list_two',
			[
				'label' 	=> esc_html__( 'Testimonial', 'cleanu-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Testimonial', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ person_name }}}',
				'condition' => [
                    'style' => '2'
                ],
			]
		);

		$this->add_control(
			'background_image',
			[
				'label'			=> esc_html__( 'Background Shape','cleanu-core' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/quote.png',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonail_style',
			[
				'label'			=> esc_html__( 'Style','cleanu-core' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'testimonial_title_txt_color',
			[
				'label' 		=> esc_html__( 'Testimonial Title Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-carousel .item .provider h5' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'testimonial_content_txt_color',
			[
				'label' 		=> esc_html__( 'Testimonial Content Text Color', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-carousel .item .content p' => 'color: {{VALUE}}',
				],

			]
		);
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_testimonial_output = $this->get_settings_for_display();
	$testomonial_list = $cleanu_testimonial_output['testomonial_list'];
	$testomonial_list_two = $cleanu_testimonial_output['testomonial_list_two'];
	if($cleanu_testimonial_output['style'] == '1'):
	?>

    <!-- Start Testimonials Area 
    ============================================= -->
    <div class="testimonials-area overflow-hidden carousel-shadow relative half-bg">
        <div class="container">
            <?php if($cleanu_testimonial_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_testimonial_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_testimonial_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_testimonial_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_testimonial_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_testimonial_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_testimonial_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container">
            <div class="testimonial-items">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="testimonial-carousel owl-carousel owl-theme">
                        <?php 
	                    	foreach ($testomonial_list as $single_testomonial):
	                    ?>	
                            <!-- Signle Item -->
                            <div class="item">
                                <img src="<?php echo esc_url($single_testomonial['testimonial_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <div class="content">
                                	<?php if(!empty($cleanu_testimonial_output['background_image']['url'])):?>
                                    	<img src="<?php echo esc_url($cleanu_testimonial_output['background_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                	<?php endif;?>
                                    <p>
                                        <?php echo htmlspecialchars_decode(esc_html($single_testomonial['testimonial_content'],'cleanu-core')); ?>
                                    </p>
                                    <div class="provider">
                                        <div class="rating">
                                            <?php 
		                                    if($single_testomonial['person_rating']==1){
		                                    ?> 	
		                                        <i class="fas fa-star"></i>
		                                    <?php     
		                                    }elseif ($single_testomonial['person_rating']==2){
		                                    ?> 	
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star-half-alt"></i>
		                                    <?php 
		                                    }elseif ($single_testomonial['person_rating']==3){
		                                    ?> 	
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                    <?php 
		                                    }elseif ($single_testomonial['person_rating']==4){
		                                    ?> 	
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star-half-alt"></i>
		                                    <?php 
		                                    }elseif ($single_testomonial['person_rating']==5){
		                                    ?> 	
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                    <?php 
		                                    	}elseif ($single_testomonial['person_rating']==6){
		                                    ?>
		                                    	<i class="fas fa-star"></i>
		                                    	<i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star-half-alt"></i>
		                                    <?php 
		                                    	}elseif ($single_testomonial['person_rating']==7){
		                                    ?>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                    <?php 
		                                    	}elseif ($single_testomonial['person_rating']==8){
		                                    ?>
		                                    	<i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star-half-alt"></i>
		                                    <?php 
		                                    	}elseif ($single_testomonial['person_rating']==9){
		                                    ?>
		                                    	<i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                        <i class="fas fa-star"></i>
		                                    <?php 
		                                       }    
		                                    ?>
                                        </div>
                                        <h5><?php echo htmlspecialchars_decode(esc_html($single_testomonial['person_name'],'cleanu-core')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Signle Item -->
                        <?php
	                	 	endforeach;
	                	?>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Area  -->
    <?php elseif($cleanu_testimonial_output['style'] == '2'): ?>
    <!-- Start Testimonials Area 
    ============================================= -->
    <div class="testimonial-style-two-area bg-dark text-light default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 heading-left">
                    <h5 class="sub-title"><?php echo htmlspecialchars_decode(esc_html($cleanu_testimonial_output['section_subtitle']));?></h5>
                    <h2 class="title"><?php echo htmlspecialchars_decode(esc_html($cleanu_testimonial_output['section_title']));?></h2>
                </div>
                <div class="col-lg-8 testimonial-content">
                    <div class="testimonial-style-two-carousel owl-carousel">
                    	<?php 
	                    	foreach ($testomonial_list_two as $single_testomonial_two):
	                    ?>
                        <!-- Signle Item -->
                        <div class="item">
                            <div class="content">
                                <img src="<?php echo esc_url($cleanu_testimonial_output['background_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <p>
                                   <?php echo htmlspecialchars_decode(esc_html($single_testomonial_two['testimonial_content'],'cleanu-core')); ?>
                                </p>
                            </div>
                            <div class="privider">
                            	<?php if(!empty($single_testomonial_two['testimonial_image']['url'])):?>
                                <div class="thumb">
                                    <img src="<?php echo esc_url($single_testomonial_two['testimonial_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                </div>
                                <?php endif;?>
                                <div class="info">
                                    <h5><?php echo htmlspecialchars_decode(esc_html($single_testomonial_two['person_name'],'cleanu-core')); ?></h5>
                                    <span><?php echo htmlspecialchars_decode(esc_html($single_testomonial_two['person_designation'],'cleanu-core')); ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- End Signle Item -->
                        <?php
	                	 	endforeach;
	                	?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area -->	
	<?php
	endif; 
	}
}
?>