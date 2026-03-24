<?php
/**
 * The template for displaying 404 pages (not found) ok
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cleanu
 */

  get_header();
  cleanu_breadcumb(); 
?>
 	<div class="error-page-area text-center overflow-hidden default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 offset-lg-2">
                    <div class="error-box">
                        
                        <?php if(!empty($cleanu_option['404_back'])):?>
                            <h1><?php global $cleanu_option; echo esc_html($cleanu_option['404_back']); ?></h1>
                        <?php else:?>
                            <h1><?php echo esc_html__("404",'cleanu');?></h1>
                        <?php endif;?>     
                        <?php if(!empty($cleanu_option['404_title'])):?>
                            <h2><?php global $cleanu_option; echo esc_html($cleanu_option['404_title']); ?></h2>
                        <?php else:?>
                            <h2><?php echo esc_html__("Oops! That page can’t be found.",'cleanu') ?></h2>
                        <?php endif;?>  

                        <?php if(!empty($cleanu_option['404_description'])):?>
                            <p><?php global $cleanu_option; echo esc_html($cleanu_option['404_description']); ?></p>
                        <?php else:?>
                            <p><?php echo esc_html__("The page you are looking for might have been removed had its name changed or its temporarily unavailable.",'cleanu') ?></p>
                        <?php endif;?>    
                        <a class="btn btn-theme effect btn-md" href="<?php echo esc_url(home_url('/'));?> "><?php echo esc_html("Back To Home",'cleanu');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>