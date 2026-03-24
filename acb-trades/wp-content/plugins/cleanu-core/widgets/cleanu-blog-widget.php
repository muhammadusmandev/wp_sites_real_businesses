<?php
	/**
	* Elementor Blog Widget.
	*
	* Elementor widget that inserts an embbedable content into the page, from any given URL.
	*
	* @since 1.0.0
	*/
class Elementor_Blog_Widget extends \Elementor\Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Blog widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'blog';
	}

	/**
	* Get widget title.
	*
	* Retrieve Blog widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Blog', 'dustra-core' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Blog widget icon.
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
	* Retrieve the list of categories the Blog widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'cleanu-elements' ];
	}

	
	protected function register_controls(){

		$this->start_controls_section(
			'section_heading',
			[
				'label'		=> esc_html__( 'Section Heading','dustra-core' ),
				'tab'		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_show',
			[
				'label' => __( 'Show/Hide Section Heading', 'dustra-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'dustra-core' ),
				'label_off' => __( 'Hide', 'dustra-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> esc_html__( 'Section Title', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Title Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);

		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> esc_html__( 'Section Subtitle', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> esc_html__( 'Type Your Subtitle Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		$this->add_control(
			'section_description',
			[
				'label' 		=> esc_html__( 'Section Description', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' 	=> esc_html__( 'Type Your Content Here', 'dustra-core' ),
				'condition'		=> [ 'section_show'	=>	'yes' ],
			]

		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'blog_section_content',
			[
				'label'		=> esc_html__( 'Set Content','dustra-core' ),
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
			'post_from',
			[
				'label' 		=> esc_html__( 'Post From', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> esc_html__( 'All', 'dustra-core' ),
					'categories' 	=> esc_html__( 'Categories', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__( 'Post Limit', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder'	=> esc_html__( 'Only Number Work. Like 4 or 6', 'dustra-core' ),
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> esc_html__( 'Order', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> esc_html__( 'Ascending', 'dustra-core' ),
					'DESC' 			=> esc_html__( 'Descending', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'order_by',
			[
				'label' 		=> esc_html__( 'Order By', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> esc_html__( 'None', 'dustra-core' ),
					'type' 			=> esc_html__( 'Type', 'dustra-core' ),
					'title' 		=> esc_html__( 'Title', 'dustra-core' ),
					'name' 			=> esc_html__( 'Name', 'dustra-core' ),
					'date' 			=> esc_html__( 'Date', 'dustra-core' ),
				],
			]
		);
		$this->add_control(
			'content_length',
			[
				'label' 		=> esc_html__( 'Content Length', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '16',
				'placeholder' 	=> esc_html__( 'Type Content Length', 'dustra-core' ),
			]
		);

		$this->add_control(
			'read_more_button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'dustra-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> 'Read More',
				'placeholder' 	=> esc_html__( 'Type Button Text', 'dustra-core' ),
			]
		);

		$this->add_control(
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
		$this->add_control(
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
		$this->add_control(
			'icon_image_one',
			[
				'label'			=> esc_html__( 'Add Image','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'condition' => [
                    'icon_style' => '3'
                ]
			]
		);
		$this->add_control(
			'custom_icon',
			[
				'label'			=> esc_html__( 'Custom Icon','cleanu-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'condition' => [
                    'icon_style' => '4'
                ]
			]
		);

		$this->end_controls_section();
		
	}

	// Output For User
	protected function render(){
		
		$cleanu_blog_output = $this->get_settings_for_display();

		global $post;
		$con_length = $cleanu_blog_output['content_length'];

	    if( $cleanu_blog_output['post_from'] == "categories" ){
		   $blog = array(
			   'post_type'         => 'post',
			   'posts_per_page'    => esc_attr( $cleanu_blog_output['post_limit'] ),
			   'order'             => esc_attr( $cleanu_blog_output['order'] ),
			   'orderby'           => esc_attr( $cleanu_blog_output['order_by'] ),
			   'tax_query'         => array(
					   array(
						   'taxonomy'  => 'category',
						   'field'     => 'slug',
						   'terms'     => esc_attr( $cleanu_blog_output['categories'] ),
					   )
				   ),
		   );
		}else{
			$blog = array(
			   'post_type'         => 'post',
			   'posts_per_page'    => esc_attr( $cleanu_blog_output['post_limit'] ),
			   'order'             => esc_attr( $cleanu_blog_output['order'] ),
			   'orderby'           => esc_attr( $cleanu_blog_output['order_by'] ),
		   );
		}
	    $counter= 0;
	    $cleanu_blog = new WP_Query( $blog );
	    if($cleanu_blog_output['style'] == '1'):
	?>
	<!-- Start Blog 
    ============================================= -->
    <div class="blog-area grid-style">
        <div class="container">
        	<?php if($cleanu_blog_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_blog_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_blog_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_blog_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_blog_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_blog_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_blog_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <?php 
                    	$clanio_categories =get_the_category();
	            		while ( $cleanu_blog->have_posts()) :
	       				$cleanu_blog->the_post();
	       				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'cleanu_800x600'); 
	       				
	       			?>
                    <!-- Single Itme -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                        	<?php if(!empty($full_image_url[0])):?>
	                            <div class="thumb">
	                                <img src="<?php echo esc_url($full_image_url[0]);?>" alt="Thumb">
	                            </div>
                            <?php endif;?>
                            <div class="info">
                                <div class="meta">
                                   <ul>
									    <li>
									        <i class="fas fa-calendar-alt"></i><?php the_time('F j, Y');?>
									    </li>
									    <li>
									        <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>">
									            <i class="fas fa-user-circle"></i>
									            <span><?php echo esc_html(get_the_author());?></span>
									        </a>
									    </li>
									</ul>
                                </div>
                                <h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
                                <p>
                                    <?php echo esc_html(wp_trim_words(get_the_content(),$cleanu_blog_output['content_length'],'')); ?>
                                </p>
                                <a href="<?php echo esc_url(get_the_permalink());?>" class="btn-simple"><?php echo esc_html($cleanu_blog_output['read_more_button_text']); ?> <?php if(!empty($cleanu_blog_output['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($cleanu_blog_output['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_blog_output['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($cleanu_blog_output['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_blog_output['custom_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_blog_output['custom_icon']); ?>"></i>
		                            <?php endif;?> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->
    <?php elseif($cleanu_blog_output['style'] == '2'):?>
    <!-- Start Blog 
    ============================================= -->
    <div class="blog-area grid-style home-blog bg-gray default-padding bottom-less">
        <?php if($cleanu_blog_output['section_show'] == 'yes'): ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                    	<?php if(!empty($cleanu_blog_output['section_subtitle'])):?>
                        <h4><?php echo htmlspecialchars_decode(esc_html($cleanu_blog_output['section_subtitle']));?></h4>
                    	<?php endif;?>
                    	<?php if(!empty($cleanu_blog_output['section_title'])):?>
                        <h2><?php echo htmlspecialchars_decode(esc_html($cleanu_blog_output['section_title']));?></h2>
                        <?php endif;?>
                        <div class="devider"></div>
                        <?php if(!empty($cleanu_blog_output['section_description'])):?>
                        <p>
                            <?php echo  htmlspecialchars_decode(esc_html($cleanu_blog_output['section_description']));?>
                        </p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        <div class="container">
            <div class="blog-items">
                <div class="row">
                	<?php 
                    	$clanio_categories =get_the_category();
	            		while ( $cleanu_blog->have_posts()) :
	       				$cleanu_blog->the_post();
	       				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'cleanu_800x600'); 
	       				$categories = get_the_category();
	       			?>
                    <!-- Single Itme -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <img src="<?php echo esc_url($full_image_url[0]);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
                                <div class="date"><?php the_time('F j, Y');?></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                   <ul>
                                       <li>
                                           <span><?php echo esc_html__("By",'cleanu');?> </span>
                                           <a href="<?php echo get_author_posts_url( get_the_ID(), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo esc_html(get_the_author());?></a>
                                       </li>
                                       <li>
                                           <span><?php echo esc_html__("In",'cleanu');?> </span>
                                           <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) );?>"><?php echo esc_html( $categories[0]->name ); ?></a>
                                       </li>
                                   </ul>
                                </div>
                                <h4><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></h4>
                                <p>
                                    <?php echo esc_html(wp_trim_words(get_the_content(),$cleanu_blog_output['content_length'],'')); ?>
                                </p>
                                <a href="<?php echo esc_url(get_the_permalink());?>" class="btn-simple"><?php echo esc_html($cleanu_blog_output['read_more_button_text']); ?> <?php if(!empty($cleanu_blog_output['flat_icon_one'])):?>
                                        <i class="<?php echo esc_attr($cleanu_blog_output['flat_icon_one']); ?>"></i>
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_blog_output['icon_image_one'])):?>
		                                <img src="<?php echo esc_url($cleanu_blog_output['icon_image_one']['url']); ?>">
		                            <?php endif;?>
		                            <?php if(!empty($cleanu_blog_output['custom_icon'])):?>
                                        <i class="<?php echo esc_attr($cleanu_blog_output['custom_icon']); ?>"></i>
		                            <?php endif;?> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->
  	
    <?php 
	endif;
	}
}
