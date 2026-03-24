<?php
/**
 * The template for displaying the header
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleanu
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?> >

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cleanu - Cleaning Services Template">
    <?php 
        $fav_icon = get_template_directory_uri() .'/assets/img/favicon.png'; ?>
        <link rel="shortcut icon" href="<?php global $cleanu_option; if(isset($cleanu_option['favicon'])){ echo esc_url($cleanu_option['favicon']['url']);} else { echo esc_url( $fav_icon );}?>">
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action( 'cleanu_topbar'); ?>
<!-- MainMenu Start -->
<?php do_action( 'cleanu_header'); ?>
<!-- MainMenu Ends -->