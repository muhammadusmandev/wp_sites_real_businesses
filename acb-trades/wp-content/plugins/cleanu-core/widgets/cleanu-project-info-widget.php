<?php
	/**
	* Elementor Service Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Project_Info_Widget extends \Elementor\Widget_Base {

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
		return 'project_info';
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
		return esc_html__( 'Project Info', 'cleanu-core' );
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
			'project_info_content',
			[
				'label'		=> esc_html__( 'Set Project Info Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'left_content', [
				'label' 		=> esc_html__( 'Left Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'right_title', [
				'label' 		=> esc_html__( 'Right Title', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'2'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info_heading', [
				'label' 		=> esc_html__( 'Info Heading', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'2'
			]
		);
		$repeater->add_control(
			'info_content', [
				'label' 		=> esc_html__( 'Info Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'rows'			=>'3'
			]
		);
		
		$this->add_control(
			'info_list',
			[
				'label' 	=> esc_html__( 'Info List', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Info List', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ info_heading }}}',
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
		$this->end_controls_section();

		$this->start_controls_section(
			'project_info_style',
			[
				'label'			=> esc_html__( 'Design Style','cleanu-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
	$cleanu_project_info_output = $this->get_settings_for_display();
	$cleanu_info_list = $cleanu_project_info_output['info_list'];
	?>
	 <div class="top-info">
        <div class="row">
            <div class="col-lg-8 left-info">
                <?php echo htmlspecialchars_decode(esc_html($cleanu_project_info_output['left_content'],'cleanu-core')); ?>
            </div>
            <div class="col-lg-4 right-info">
                <div class="project-info">
                    <h3><?php echo esc_html($cleanu_project_info_output['right_title']);?></h3>
                    <ul>
                    	<?php foreach ($cleanu_info_list as $single_info):?>
	                        <li>
	                           <?php echo esc_html($single_info['info_heading']);?><span><?php echo esc_html($single_info['info_content']);?></span>
	                        </li>
                    	<?php endforeach;?>
                    </ul>
                    <?php if(!empty($cleanu_project_info_output['button_text'])):?>
                    	<a class="btn btn-theme primary effect btn-md" href="<?php echo esc_url($cleanu_project_info_output['button_url']['url']);?>"><?php echo esc_html($cleanu_project_info_output['button_text']);?></a>
                	<?php endif;?>
                </div>
            </div>
        </div>
    </div>
	<?php 
	}
}