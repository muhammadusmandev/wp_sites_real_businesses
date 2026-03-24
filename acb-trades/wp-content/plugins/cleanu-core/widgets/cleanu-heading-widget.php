<?php
	/**
	* Elementor Heading Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Cleanu_Heading_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Heading widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'cleanu_heading';
	}

	/**
	* Get widget title.
	*
	* Retrieve Heading widget title.
	*
	* @since 1.0.0
	* @access public 
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Heading', 'cleanu-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Heading widget icon.
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
	* Retrieve the list of categories the Heading widget belongs to.
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
			'cleanu_heading_content',
			[
				'label'		=> esc_html__( 'Set Content','cleanu-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
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
			]
		);
		$this->add_control(
			'content', [
				'label' 		=> esc_html__( 'Content', 'cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		
		$this->end_controls_section();
	}

	// Output For User
	protected function render(){
	$cleanu_heading_output = $this->get_settings_for_display();

	?>
	<!-- Star Get Heading
    ============================================= -->
    <div class="container">
	    <div class="row">
	        <div class="col-lg-8 offset-lg-2">
	            <div class="site-heading text-center">
	            	<?php if(!empty($cleanu_heading_output['subtitle'])):?>
	                <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_heading_output['subtitle']));?></h4>
	            	<?php endif;?>
	            	<?php if(!empty($cleanu_heading_output['title'])):?>
	                <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_heading_output['title']));?></h2>
	                <?php endif;?>
	                <div class="devider"></div>
	                <?php if(!empty($cleanu_heading_output['content'])):?>
					<p><?php echo  htmlspecialchars_decode(esc_html($cleanu_heading_output['content']));?></p>
	                <?php endif;?>
	            </div>
	        </div>
	    </div>
  	</div>
    <!-- End Get Heading -->
	<?php 
	}
}