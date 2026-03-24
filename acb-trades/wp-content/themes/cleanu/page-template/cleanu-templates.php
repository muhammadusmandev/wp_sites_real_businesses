<?php
 /**
 * Template Name: Cleanu Templates
 *
 * The template file for displaying breadcumb with page.
 *
 * @package Cleanu
 */
  get_header();
  cleanu_breadcumb();
?>
<div class="page-content">

            <?php
            if( have_posts() ):
                while(  have_posts() ): the_post();
                    get_template_part('template-parts/content','page');
                endwhile;
                if( comments_open() || get_comments_number() ):
                    comments_template();
                endif;
                else:
                get_template_part('template-parts/content', 'none');
            endif; 
            ?>
</div>
<?php get_footer(); ?>