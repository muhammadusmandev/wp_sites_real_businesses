<?php
	/**
	* Elementor Team Member Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Team_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Team Member widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'team';
	}

	/**
	* Get widget title.
	*
	* Retrieve Team Member widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Team Member', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Team Member widget icon.
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
	* Retrieve the list of categories the Team Member widget belongs to.
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
			'team_content',
			[
				'label'		=> esc_html__( 'Set Team Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'team_column',
			[
				'label' 	=> esc_html__( 'Column Type', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '3',
				'options' 	=> [
					'6' 	=> esc_html__( 'Two Column', 'cleanu-core' ),
					'3' 	=> esc_html__( 'Four Column', 'cleanu-core' ),
					'4'  	=> esc_html__( 'Three Column', 'cleanu-core' ),
					
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> esc_html__( 'Name', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'cleanu-core' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> esc_html__( 'Designation', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'type title', 'cleanu-core' ),
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'team_image',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'team_single',
			[
				'label' 		=> esc_html__( 'Team Single URL', 'cleanu-core' ),
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
			'facebook_url',
			[
				'label' 		=> esc_html__( 'Facebook URL', 'cleanu-core' ),
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
			'twitter_url',
			[
				'label' 		=> esc_html__( 'Twitter URL', 'cleanu-core' ),
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
			'linedin_url',
			[
				'label' 		=> esc_html__( 'Linkedin URL', 'cleanu-core' ),
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
			'dribbble_url',
			[
				'label' 		=> esc_html__( 'Dribbble URL', 'cleanu-core' ),
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
			'instagram_url',
			[
				'label' 		=> esc_html__( 'Instagram URL', 'cleanu-core' ),
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
			'youtube_url',
			[
				'label' 		=> esc_html__( 'Youtube URL', 'cleanu-core' ),
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
			'team_list',
			[
				'label' 	=> esc_html__( 'Team Member', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Team Member', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);
		$this->add_control(
			'team_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape One', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/team.png',
				],
			]
		);
		$this->add_control(
			'team_shape_two',
			[
				'label' 	=> esc_html__( 'Background Shape Two', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/team_2.png',
				],
			]
		);
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_team_output = $this->get_settings_for_display();
	$team_list= $cleanu_team_output['team_list'];
	?>
	 <!-- Start Team 
    ============================================= -->
    <div class="team-area">
    	<?php if(!empty($cleanu_team_output['team_shape_one']['url'])): ?>
        <!-- Fixed Shape -->
        <div class="fixed-sahpe-bottom">
            <img src="<?php echo esc_url($cleanu_team_output['team_shape_one']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <!-- End Fixed Shape -->
        <?php endif; ?>
        <div class="container">
           <?php if($cleanu_team_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_team_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_team_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_team_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_team_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_team_output['section_description'])):?>
                        <?php echo  htmlspecialchars_decode(esc_html($cleanu_team_output['section_description']));?>
                        
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container">
            <div class="team-style-one-box">
                <div class="row">
                    <?php
                    	$counter = 1;
                        foreach($team_list as $single_team):
                    ?>
	                    <!-- Single Item -->
	                    <div class="col-lg-<?php echo esc_attr($cleanu_team_output['team_column']);?> col-md-6 text-center team-style-one">
	                        <div class="item">
	                            <div class="thumb">
	                                <img src="<?php echo esc_url($single_team['team_image']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	                                <div class="social">
	                                    <input type="checkbox" id="toggle<?php echo esc_attr($counter); ?>" class="share-toggle" hidden>
	                                    <label for="toggle<?php echo esc_attr($counter); ?>" class="share-button">
	                                        <i class="fas fa-plus"></i>
	                                    </label>
	                                    <?php if(!empty($single_team['facebook_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['facebook_url']['url']);?>" class="share-icon facebook">
		                                        <i class="fab fa-facebook-f"></i>
		                                    </a>
	                                	<?php endif;?>
	                                	<?php if(!empty($single_team['twitter_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['twitter_url']['url']);?>" class="share-icon twitter">
		                                        <i class="fab fa-twitter"></i>
		                                    </a>
	                                    <?php endif;?>
	                                    <?php if(!empty($single_team['instagram_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['instagram_url']['url']);?>" class="share-icon instagram">
		                                        <i class="fab fa-instagram"></i>
		                                    </a>
	                                    <?php endif;?>
	                                    <?php if(!empty($single_team['linedin_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['linedin_url']['url']);?>" class="share-icon linkedin">
		                                        <i class="fab fa-linkedin"></i>
		                                    </a>
	                                    <?php endif;?>
	                                    <?php if(!empty($single_team['dribbble_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['dribbble_url']['url']);?>" class="share-icon dribbble">
		                                        <i class="fab fa-dribbble"></i>
		                                    </a>
	                                    <?php endif;?>
	                                    <?php if(!empty($single_team['youtube_url']['url'])):?>
		                                    <a href="<?php echo esc_url($single_team['youtube_url']['url']);?>" class="share-icon youtube">
		                                        <i class="fab fa-youtube"></i>
		                                    </a>
	                                    <?php endif;?>
	                                </div>
	                                <?php if(!empty($cleanu_team_output['team_shape_two']['url'])): ?>
	                                <!-- Shape -->
	                                <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_team_output['team_shape_two']['url']); ?>);"></div>
	                                <!-- End Shape -->
	                            	<?php endif; ?>
	                            </div>
	                            <div class="info">
	                                <h4><a href="<?php echo esc_url($single_team['team_single']['url']); ?>"><?php echo esc_html($single_team['name']); ?></a></h4>
	                                <p>
	                                    <?php echo esc_html($single_team['designation']); ?>
	                                </p>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- End Single Item -->
                	<?php $counter++; endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team-->

	<?php 
    }
}
?>