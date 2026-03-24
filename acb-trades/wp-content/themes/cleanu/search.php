<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
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
                        <div class="blog-item-box">
                            <?php
                                if( have_posts() ):
                                    while( have_posts() ): the_post();
                                    get_template_part('template-parts/search', 'content');
                                    endwhile;
                                else :
                                get_template_part( 'template-parts/content', 'none' );
                                endif;
                            ?> 
                        </div>
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                <nav aria-label="navigation">
                                    <?php cleanu_pagination(); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Start Sidebar -->
                    <?php get_sidebar(); ?>
                    <!-- End Start Sidebar -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
<?php get_footer(); ?>