<?php
/**
* @version  1.0
* @package  cleanu
* @author   Validtheme<support@cleanu.com>
*
* Websites: http://www.validtheme.com
*
*/

/**************
* Creating Service Image Widget
*************/

class cleanu_service_img_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'cleanu_service_img_widget',

                // Widget name will appear in UI
                esc_html__( 'Cleanu Service Image', 'cleanu-core' ),

                // Widget description
                array(
                    'classname'                     => 'single-widget quick-contact text-light',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add service Me Widget', 'cleanu' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
            $image_url      = ( !empty( $instance['image_url'] ) ) ? $instance['image_url'] : "";
            $content    = ( !empty( $instance['content'] ) ) ? $instance['content'] : "";
            $content_number   = ( !empty( $instance['content_number'] ) ) ? $instance['content_number'] : "";
           
            //before and after widget arguments are defined by themes
            echo '<div class="single-widget quick-contact text-light" style="background-image: url('.esc_url( $image_url ).');">';
                echo '<div class="content">';
                    echo '<i class="fas fa-phone"></i>';
                    echo '<h4>'.esc_html( $title ).'</h4>';
                    echo '<p>'.esc_html( $content ).'</p>';
                    echo '<h2>'.esc_html( $content_number ).'</h2>';
                echo '</div>';
            echo '</div>';
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // Content 
            if ( isset( $instance[ 'content' ] ) ) {
                $content = $instance[ 'content' ];
            }else {
                $content = '';
            }

            // Number 
            if ( isset( $instance[ 'content_number' ] ) ) {
                $content_number = $instance[ 'content_number' ];
            }else {
                $content_number = '';
            }

            // Image Url 
            if ( isset( $instance[ 'image_url' ] ) ) {
                $image_url = $instance[ 'image_url' ];
            }else {
                $image_url = '';
            }

            

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'cleanu'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content :' ,'cleanu'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="text" value="<?php echo esc_attr( $content ); ?>" />
            </p>

             <p>
                <label for="<?php echo $this->get_field_id( 'content_number' ); ?>"><?php _e( 'Contact Number:' ,'cleanu'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content_number' ); ?>" name="<?php echo $this->get_field_name( 'content_number' ); ?>" type="text" value="<?php echo esc_attr( $content_number ); ?>" />
            </p>

             <p>
                <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image Url:' ,'cleanu'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" />
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['content']    = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
            $instance['content_number']   = ( ! empty( $new_instance['content_number'] ) ) ? strip_tags( $new_instance['content_number'] ) : '';
            $instance['image_url']    = ( ! empty( $new_instance['image_url'] ) ) ? strip_tags( $new_instance['image_url'] ) : '';
            
            return $instance;
        }
    } // Class cleanu_service_img_widget ends here


    // Register and load the widget
    function cleanu_service_me_load_widget() {
        register_widget( 'cleanu_service_img_widget' );
    }
    add_action( 'widgets_init', 'cleanu_service_me_load_widget' );