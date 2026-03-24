<?php 
/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cleanu
 */

    get_header();
    cleanu_breadcumb(); 
    global $cleanu_option;
    if( isset( $cleanu_option['blog_sidebar'] ) ) { 
        if( $cleanu_option['blog_sidebar'] == '3' ){
            $layout = 'blog-standard';
        } else {
            $layout = 'right-sidebar';
        }
    } else {
        $layout = 'right-sidebar';
    } 
?>
    <div class="blog-area single full-blog <?php echo esc_attr( $layout ); ?> full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <?php
                    global $cleanu_option;
                    if( isset( $cleanu_option['blog_sidebar'] ) && $cleanu_option['blog_sidebar'] == '3' ) {
                        echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                    }elseif( ! is_active_sidebar( 'blog-sidebar' )) {
                        echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                    }else {
                        echo '<div class="blog-content col-lg-8 col-md-12">';
                    } 
                    ?>

                       <?php
                            if( have_posts() ):
                                while( have_posts() ): the_post();
                                    get_template_part( 'template-parts/content', get_post_format() );
                                endwhile;
                            endif;
                        ?>
                        
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>    