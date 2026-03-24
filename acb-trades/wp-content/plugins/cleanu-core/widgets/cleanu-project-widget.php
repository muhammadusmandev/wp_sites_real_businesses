<?php
	/**
	* Elementor Project Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Project_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name. 
	*
	* Retrieve Project widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'projectwidget';
	}

	/**
	* Get widget title.
	*
	* Retrieve Project widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Project', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Project widget icon.
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
	* Retrieve the list of categories the Project widget belongs to.
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
			'project_content',
			[
				'label'		=> esc_html__( 'Project Content','cleanu-core' ),
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
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'category', [
				'label' 		=> esc_html__( 'Category', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		
		$repeater->add_control(
			'project_image',
			[
				'label'			=> esc_html__( 'Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'project_single_url',
			[
				'label' 		=> esc_html__( 'Project Single URL', 'cleanu-core' ),
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
			'project_list',
			[
				'label' 	=> esc_html__( 'Project', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Project', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'projects_shape_one',
			[
				'label' 	=> esc_html__( 'Background Shape', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> get_template_directory_uri().'/assets/img/project.png',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'project_style',
			[
				'label'			=> esc_html__( 'Heading Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

       	$this->end_controls_section();
	}

	// Output For User
	protected function render(){
		
	$cleanu_project_output = $this->get_settings_for_display();
	$project_list = $cleanu_project_output['project_list'];
	if($cleanu_project_output['style'] == 1):
	?>
  	<!-- Start Project Area Style One
    ============================================= -->
    <div class="project-area overflow-hidden">
    	<?php if($cleanu_project_output['section_show'] == 'yes'): ?>
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                    	<?php if(!empty($cleanu_project_output['section_subtitle'])):?>
                        <h5><?php echo htmlspecialchars_decode(esc_html($cleanu_project_output['section_subtitle']));?></h5>
                        <?php endif;?>
                        <?php if(!empty($cleanu_project_output['section_title'])):?>
                        <h2>
                            <?php echo htmlspecialchars_decode(esc_html($cleanu_project_output['section_title']));?> 
                        </h2>
                        <?php endif;?>
                    </div>
                    <?php if(!empty($cleanu_project_output['section_description'])):?>
                    <div class="col-lg-6 offset-lg-1">
                        <?php echo  htmlspecialchars_decode(esc_html($cleanu_project_output['section_description']));?>  
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="project-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="gallery-items colums-3">
                        <?php 
	                    	foreach ($project_list as $single_project):
	                    ?>
	                        <!-- Single Item -->
	                        <div class="pf-item">
	                            <div class="project-style-two">
	                                <img src="<?php echo esc_url($single_project['project_image']['url']); ?>" alt="<<?php echo get_bloginfo( 'name' ); ?>">
	                                <div class="info">
	                                    <span><?php echo esc_html($single_project['category']);?></span>
	                                    <h4><a href="<?php echo esc_url($single_project['project_single_url']['url']);?>"><?php echo esc_html($single_project['title']);?></a></h4>
	                                </div>
	                            </div>
	                        </div>
	                        <!-- Single Item -->
                        <?php
		                	endforeach;
		                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Projects Area Style One-->
	<?php elseif($cleanu_project_output['style'] == 2):?>
    <!-- Start Projects Area Style Two
    ============================================= -->
    <div class="projects-area">
        <div class="container">
            <div class="heading-left">
                <?php if($cleanu_project_output['section_show'] == 'yes'): ?>
	                <div class="row">
	                    <div class="col-lg-5">
	                    	<?php if(!empty($cleanu_project_output['section_subtitle'])):?>
	                        <h5><?php echo htmlspecialchars_decode(esc_html($cleanu_project_output['section_subtitle']));?></h5>
	                        <?php endif;?>
	                        <?php if(!empty($cleanu_project_output['section_title'])):?>
	                        <h2>
	                            <?php echo htmlspecialchars_decode(esc_html($cleanu_project_output['section_title']));?> 
	                        </h2>
	                        <?php endif;?>
	                    </div>
	                    <?php if(!empty($cleanu_project_output['section_description'])):?>
	                    <div class="col-lg-6 offset-lg-1">
	                        <p>
	                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_project_output['section_description']));?>
	                        </p>
	                    </div>
	                    <?php endif;?>
	                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="container-fill">
            <div class="project-items project-carousel owl-carousel owl-theme">
            	<?php 
                	foreach ($project_list as $single_project):
                ?>
                <!-- Single Item -->
                <div class="project-style-one">
                    <img src="<?php echo esc_url($single_project['project_image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                    <div class="info">
                        <h4><a href="<?php echo esc_url($single_project['project_single_url']['url']);?>"><?php echo esc_html($single_project['title']);?></a></h4>
                        <span><?php echo esc_html($single_project['category']);?></span>
                        <?php if(!empty($cleanu_project_output['projects_shape_one']['url'])):?>
	                        <!-- Shape -->
	                        <div class="shape" style="background-image: url(<?php echo esc_url($cleanu_project_output['projects_shape_one']['url']);?>);"></div>
	                        <!-- End Shape -->
                    	<?php endif;?>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php
                	endforeach;
                ?>
            </div>
        </div>
    </div>
    <!-- End Projects Area Style Two -->
	<?php endif;?>
	<?php }
}