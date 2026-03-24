<?php

function cleanu_page_meta_info(){

	$cmb =new_cmb2_box(array(
     'id'          =>'cleanu_page_meta',
     'title'       =>esc_html('Cleanu Page Meta','cleanu'),
     'object_types'=>array('page'),

	));

    $cmb->add_field(array (
		'name' => esc_html__( 'Header Style', 'cleanu' ),
		'id' => 'header_style',
		'type' => 'select',
		'default' => '1',
		'show_option_none' => false,
		'options' => array(
			'1' => esc_html__( 'Style One', 'cleanu' ),
			'2' => esc_html__( 'Style Two', 'cleanu' ),
            '3' => esc_html__( 'Style Three', 'cleanu' ),
            '5' => esc_html__( 'Style Four', 'cleanu' ),
            '6' => esc_html__( 'Style Five', 'cleanu' ),
            '4' => esc_html__( 'Default', 'cleanu' ),

		),
	   )
    );

    $cmb->add_field(array (
		'name' => esc_html__( 'Footer Style', 'cleanu' ),
		'id' => 'footer_style',
		'type' => 'select',
		'default' => '1',
		'show_option_none' => false,
		'options' => array(
			'1' => esc_html__( 'Style One', 'cleanu' ),
			'2' => esc_html__( 'Style Two', 'cleanu' ),
		),
	   )
    );

}
add_action( 'cmb2_admin_init', 'cleanu_page_meta_info' );

?>