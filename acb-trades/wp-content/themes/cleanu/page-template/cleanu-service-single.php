<?php
 /**
 * Template Name: Cleanu Service Single
 *
 * The template file for displaying breadcumb with service single page.
 *
 * @package Cleanu
 */
 
  get_header();
  cleanu_breadcumb(); 
?>
<div class="services-details-area default-padding">
    <div class="container">
        <div class="services-details-items">
            <div class="row">
                
                <div class="col-lg-8 services-single-content">
                    <?php 
                        the_content(); 
                        $defaults = array(
                            'before'           => '<nav class="page-links">',
                            'after'            => '</nav>',
                            'link_before'      => '',
                            'link_after'       => '',
                            'separator'        => ' ',
                            'pagelink'         => '%',
                            'echo'             => 1
                        );
                        wp_link_pages($defaults);
                    ?>
                </div>

                <div class="col-lg-4 services-sidebar">
                    <!-- Single Widget -->
                    <?php dynamic_sidebar('service-sidebar')?>
                    <!-- End Single Widget -->
                </div>

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>