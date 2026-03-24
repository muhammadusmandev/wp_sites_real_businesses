<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleanu_sidebar_areas() {


    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar','cleanu'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Blog Sidebar','cleanu'),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><h4>',
        'after_title'   => '</h4></div>',
    ) );
    if( class_exists( 'ReduxFramework' ) ):
        register_sidebar( array(
            'name'          => esc_html__( 'Service Sidebar','cleanu'),
            'id'            => 'service-sidebar',
            'description'   => esc_html__( 'Service Sidebar','cleanu'),
            'before_widget' => '<div class="single-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title>',
            'after_title'   => '</h4>',
        ) );
        
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar 1', 'cleanu' ),
            'id'            => 'footer-sidebar1',
            'description'   => esc_html__('Widgets will be shown in footer area', 'cleanu'),
            'class'         => '',
            'before_widget' => '<div class="f-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )); 
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar 1 (White Background)', 'cleanu' ),
            'id'            => 'footer-sidebar1-white',
            'description'   => esc_html__('Widgets will be shown in footer area', 'cleanu'),
            'class'         => '',
            'before_widget' => '<div class="f-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )); 
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar 2', 'cleanu' ),
            'id'            => 'footer-sidebar2',
            'description'   => esc_html__('Widgets will be shown in footer area', 'cleanu'),
            'class'         => '',
            'before_widget' => '<div class="f-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )); 
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar 3', 'cleanu' ),
            'id'            => 'footer-sidebar3',
            'description'   => esc_html__('Widgets will be shown in footer area', 'cleanu'),
            'class'         => '',
            'before_widget' => '<div class="f-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )); 
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar 4', 'cleanu' ),
            'id'            => 'footer-sidebar4',
            'description'   => esc_html__('Widgets will be shown in footer area', 'cleanu'),
            'class'         => '',
            'before_widget' => '<div class="f-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));  
    endif;
}
    add_action( 'widgets_init', 'cleanu_sidebar_areas' );


    function cleanu_pagination() {
        global $wp_query;
    
        $links = paginate_links( array(
            'current'   => max( 1, get_query_var( 'paged' ) ),
            'total'     => $wp_query->max_num_pages,
            'type'      => 'list',
            'prev_text' => '<i class="fas fa-angle-double-left"></i>',
            'next_text' => '<i class="fas fa-angle-double-right"></i>',
        ) );
    
        if ( ! empty( $links ) ) {
            $links = str_replace( "page-numbers", "pagination", $links );
            echo wp_kses_post( $links );
        }
    }
  
    /**
    * Wrapper function to deal with backwards compatibility.
    */
    if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
            do_action( 'wp_body_open' );
        }
    }
    
    if (!function_exists('clenu_get_nav_menu')) :
    function clenu_get_nav_menu()
    {
        $menu_list = get_terms(array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($menu_list) && !is_wp_error($menu_list)) {
            foreach ($menu_list as $menu) {
                $options[$menu->slug] = $menu->name;
            }
            return $options;
        }
    }
endif;

?>