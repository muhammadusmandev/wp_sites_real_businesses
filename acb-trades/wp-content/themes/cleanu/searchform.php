<?php
/**
 * Template for displaying search forms
 *
 * @package  Cleanu
 * @since    1.0
 */
?>
<div class="sidebar-item search">
    <div class="sidebar-info">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" class="form-control"
	       placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'cleanu' ); ?>"
	       value="<?php echo get_search_query() ?>" name="s"
	       title="<?php echo esc_attr_x( 'Search for:', 'label', 'cleanu' ); ?>"/>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
