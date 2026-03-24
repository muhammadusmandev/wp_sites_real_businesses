<?php
 /**
 * Template Name: Cleanu Team Single
 *
 * The template file for displaying breadcumb with service single page.
 *
 * @package Cleanu
 */
 
  get_header();
  cleanu_breadcumb(); 
?>
<!-- Star Project Details Area
    ============================================= -->
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
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
        </div>
    </div>
    <!-- End Project Details Area -->
<?php get_footer(); ?>