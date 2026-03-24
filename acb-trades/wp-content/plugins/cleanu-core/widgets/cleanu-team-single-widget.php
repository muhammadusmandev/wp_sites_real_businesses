<?php
	/**
	* Elementor Team Single Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Team_Single_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'teamsingle';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Team Single', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
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
	* Retrieve the list of categories the Service widget belongs to.
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
			'team_single_member_content',
			[
				'label'		=> esc_html__( 'Set Member Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'member_img',
			[
				'label' 	=> esc_html__( 'Image', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'member_name', [
				'label' 		=> esc_html__( 'Name', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'member_designation', [
				'label' 		=> esc_html__( 'Designation', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'member_content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'member_contact', [
				'label' 		=> esc_html__( 'Contact', 'cleanu-core' ),
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
			]
		);
		$this->add_control(
            'team_single_sc_divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
		$this->add_control(
            'fb_link',
            [
                'label'         => esc_html__( 'Facebook Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'tw_link',
            [
                'label'         => esc_html__( 'Twitter Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'le_link',
            [
                'label'         => esc_html__( 'Linkedin Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'in_link',
            [
                'label'         => esc_html__( 'Instagram Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'dr_link',
            [
                'label'         => esc_html__( 'Dribbble Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'be_link',
            [
                'label'         => esc_html__( 'Behance Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'yt_link',
            [
                'label'         => esc_html__( 'Youtube Url','cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
            ]
        );
		$this->end_controls_section();
        $this->start_controls_section(
            'team_single_experience_content',
            [
                'label'     => esc_html__( 'Set Member Experience Content','cleanu-core' ),
                'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'member_experience_heading', [
                'label'         => esc_html__( 'Experience Heading', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'member_experience_content', [
                'label'         => esc_html__( 'Experience Content', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'expertise_title', [
                'label'         => esc_html__( 'Title', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'expertise_number', [
                'label'         => esc_html__( 'Number', 'cleanu-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $this->add_control(
            'expertise_list',
            [
                'label'     => esc_html__( 'Experience', 'cleanu-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Experience', 'cleanu-core' ),
                    ],
                ],
                'title_field' => '{{{ expertise_title }}}',
            ]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'teamsingle_style',
			[
				'label'			=> esc_html__( 'Heading Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_team_single_output = $this->get_settings_for_display();
    $cleanu_experices_list = $cleanu_team_single_output['expertise_list'];
	?>
<!-- Start Team Single Area
    ============================================= -->
    <div class="team-single-area default-padding-top">
        <div class="container">
            <div class="team-content-top">
                <div class="row">
                    <div class="col-lg-5 left-info">
                        <div class="thumb">
                            <img src="<?php echo esc_url($cleanu_team_single_output['member_img']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                        </div>
                    </div>
                    <div class="col-lg-7 right-info">
                        <h2><?php echo esc_html($cleanu_team_single_output['member_name']);?></h2>
                        <span><?php echo esc_html($cleanu_team_single_output['member_designation']);?></span>
                        <p><?php echo esc_html($cleanu_team_single_output['member_content']);?></p>
                        <?php echo htmlspecialchars_decode(esc_html($cleanu_team_single_output['member_contact']));?>
                        <div class="social">
                            <?php if(!empty($cleanu_team_single_output['button_text'])):?>
                            <a class="btn btn-theme secondary effect btn-sm" href="<?php echo esc_url($cleanu_team_single_output['button_url']['url']);?>"><?php echo esc_html($cleanu_team_single_output['button_text']);?></a>
                            <?php endif;?>
                            <div class="share-link">
                                <i class="fas fa-share-alt"></i>
                                <ul>
                                	<?php if(!empty($cleanu_team_single_output['fb_link']['url'])):?>
                                    <li class="facebook">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['fb_link']['url']);?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                	<?php endif;?>
                                	<?php if(!empty($cleanu_team_single_output['tw_link']['url'])):?>
                                    <li class="twitter">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['tw_link']['url']);?>">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_team_single_output['yt_link']['url'])):?>
                                    <li class="youtube">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['yt_link']['url']);?>">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_team_single_output['le_link']['url'])):?>
                                     <li class="linkedin">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['le_link']['url']);?>">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_team_single_output['dr_link']['url'])):?>
                                     <li class="dribbble">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['dr_link']['url']);?>">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_team_single_output['in_link']['url'])):?>
                                     <li class="instagram">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['in_link']['url']);?>">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($cleanu_team_single_output['be_link']['url'])):?>
                                     <li class="behance">
                                        <a href="<?php echo esc_url($cleanu_team_single_output['be_link']['url']);?>">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-info bg-gray default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2><?php echo esc_html($cleanu_team_single_output['member_experience_heading']); ?></h2>
                        <p><?php echo esc_html($cleanu_team_single_output['member_experience_content']); ?></p>
                    </div>
                    <div class="col-lg-6">
                        <div class="skill-items">
                            <!-- Progress Bar Start -->
                            <?php foreach($cleanu_experices_list as $cleanu_experice): ?>
                            <div class="progress-box">
                                <h5><?php echo esc_html($cleanu_experice['expertise_title']); ?></h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" data-width="<?php echo esc_attr__($cleanu_experice['expertise_number']); ?>">
                                         <span><?php echo esc_html($cleanu_experice['expertise_number']); ?><?php echo esc_html__("%",'cleanu')?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- End Progressbar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Area -->
	<?php 
	}
}