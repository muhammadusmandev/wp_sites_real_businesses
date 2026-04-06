<?php
	/**
	* Elementor Faq Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_FAQ_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Faq widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'faq';
	}

	/**
	* Get widget title.
	*
	* Retrieve Faq widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Faq', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Faq widget icon.
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
	* Retrieve the list of categories the Faq widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements'];
	}

	public function get_script_depends() {
        return array('main');
    }

	// Add The Input For User
	protected function register_controls(){
		

		$this->start_controls_section(
			'faq_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
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
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'faq_list',
			[
				'label' 	=> esc_html__( 'Faq', 'cleanu-core' ),
				'type' 		=> \Elementor\Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => esc_html__( 'Add Faq', 'cleanu-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'bac_image',
			[
				'label'			=> esc_html__( 'Background Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_faq_output = $this->get_settings_for_display();
	$faq_lists = $cleanu_faq_output['faq_list'];
	?>
	<!-- Star Faq
    ============================================= -->
    <div class="faq-area default-padding bg-cover" style="background-image: url(<?php echo esc_url($cleanu_faq_output['bac_image']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="faq-style-one">
                        <div class="faq-content">
                            <div class="accordion" id="accordionExample">
                            <?php 
                            $counter = 1;
                            foreach($faq_lists as $faq_list):?>	
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h3 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo esc_attr($counter);?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($counter);?>">
                                           <?php echo esc_html($faq_list['title']);?>
                                        </h3>
                                    </div>

                                    <div id="collapse<?php echo esc_attr($counter);?>" class="collapse <?php if($counter == 1) {echo esc_attr__("show",'cleanu-core');}?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo  htmlspecialchars_decode(esc_html($faq_list['content']));?>
                                        </div>
                                    </div>
                                </div>
                            <?php $counter++; endforeach;?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->
	<?php 
	}
}