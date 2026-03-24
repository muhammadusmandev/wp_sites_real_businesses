<?php
/*
cleanu own hook
 */
if(!function_exists('cleanu_main_footer')){
    function cleanu_main_footer(){
        global $cleanu_option; 
        $footer_menu=get_post_meta( get_the_id(), 'footer_style', true);

        if( class_exists( 'ReduxFramework' )){
            $blog_footer_style_one = (get_post_type() === 'post' && $cleanu_option['footer_style'] == '1');
            $blog_footer_style_two = (get_post_type() === 'post' && $cleanu_option['footer_style'] == '2');
        }else{
            $blog_footer_style_one = '0';
            $blog_footer_style_two = '0';

        }

    if ($footer_menu == '1' || $blog_footer_style_one  || is_404()) { ?>
    <!-- Start Footer Style One
    ============================================= -->
     <footer class="bg-theme text-light">
        <?php if(is_active_sidebar('footer-sidebar1') || is_active_sidebar('footer-sidebar2') || is_active_sidebar('footer-sidebar3') || is_active_sidebar('footer-sidebar4')): ?>
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <?php if(is_active_sidebar('footer-sidebar1')):?>
                    <div class="col-lg-4 col-md-6 item">
                        <?php dynamic_sidebar('footer-sidebar1');?>
                    </div>    
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar2')):?>
                        <div class="col-lg-2 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar2')?>
                        </div>
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar3')):?>
                        <div class="col-lg-3 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar3')?>
                        </div>
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar4')):?>
                        <div class="col-lg-3 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar4')?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if(!empty($cleanu_option['fotter_txt'])):?>
                            <p><?php echo html_entity_decode(esc_html($cleanu_option['fotter_txt']));?></p>
                            <?php else:?>
                            <p><?php echo esc_html__("© Copyright 2022. All Rights Reserved by validthemes",'cleanu');?></p>
                            <?php endif;?>
                        </div>
                        <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
                            <div class="col-lg-6 text-right link">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer-menu',
                                    'container'       => 'ul',
                                ) );
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
        <?php if(!empty($cleanu_option['fotter_bg_one']['url'])):?>
        <!-- Fixed Shape -->
        <div class="animate-right-left">
            <img src="<?php echo esc_url($cleanu_option['fotter_bg_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <!-- End Fixed Shape -->
        <?php endif;?>
    </footer>    
    <!-- End Footer Style One -->

    <?php }elseif ( $footer_menu == '2' || $blog_footer_style_two || is_404()){?>
    <!-- Start Footer Style Two -->    
     <footer>
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <?php if(is_active_sidebar('footer-sidebar1-white')):?>
                    <div class="col-lg-4 col-md-6 item">
                        <?php dynamic_sidebar('footer-sidebar1-white');?>
                    </div>    
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar2')):?>
                        <div class="col-lg-2 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar2')?>
                        </div>
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar3')):?>
                        <div class="col-lg-3 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar3')?>
                        </div>
                    <?php endif;?>
                    <?php if(is_active_sidebar('footer-sidebar4')):?>
                        <div class="col-lg-3 col-md-6 item">
                            <?php dynamic_sidebar('footer-sidebar4')?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if(!empty($cleanu_option['fotter_txt'])):?>
                            <p><?php echo html_entity_decode(esc_html($cleanu_option['fotter_txt']));?></p>
                            <?php else:?>
                            <p><?php echo esc_html__("© Copyright 2022. All Rights Reserved by validthemes",'cleanu');?></p>
                            <?php endif;?>
                        </div>
                        <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
                            <div class="col-lg-6 text-right link">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer-menu',
                                    'container'       => 'ul',
                                ) );
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
        <?php if(!empty($cleanu_option['fotter_bg_one']['url'])):?>
        <!-- Fixed Shape -->
        <div class="animate-right-left">
            <img src="<?php echo esc_url($cleanu_option['fotter_bg_one']['url']);?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </div>
        <!-- End Fixed Shape -->
        <?php endif; ?>
    </footer>
    <!-- End Footer Style Two -->
    <?php }else{?>

    <!-- Start Footer Style Default -->    
    <footer class="bg-theme text-light">
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-box">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p><?php echo esc_html__("© Copyright 2022. All Rights Reserved by validthemes",'cleanu');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    <!-- End Footer Style Default -->       
    <?php
       }
    }
}
add_action( 'cleanu_footer_cb', 'cleanu_main_footer', 21 );
?>