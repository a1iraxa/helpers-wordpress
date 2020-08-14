<?php


if ( is_admin() ) {
    add_action( 'load-post.php',     'call_custom_tab_woo_class' );
    add_action( 'load-post-new.php', 'call_custom_tab_woo_class' );
}

/**
 * Calls the class on the post edit screen.
 */
function call_custom_tab_woo_class() {
    new CustomTabInWoocommerceMetaBox();
}
 
/**
 * The Class.
 */
class CustomTabInWoocommerceMetaBox {
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save' ) );
    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'product' );
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'specification_meta_box_in_woo',
                __( 'Product Specification ', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        // $mydata = sanitize_text_field( $_POST['woocommerce_product_specification_tab'] );
        $mydata = $_POST['woocommerce_product_specification_tab'];
 
        // Update the meta field.
        update_post_meta( $post_id, '_product_specification_tab_key', $mydata );
    }
 
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {
 
        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, '_product_specification_tab_key', true );
        $settings = array(
            'textarea_name'=>'woocommerce_product_specification_tab',
            'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ),
            'media_buttons' => true,
            // 'teeny' => true,
            'tinymce' => true,
            'dfw' => true,
            'quicktags' => true,
            'drag_drop_upload' => false,
        );
        
        wp_editor( htmlspecialchars_decode( $value ), 'woocommerce_product_specification_tab', $settings );
    }
}