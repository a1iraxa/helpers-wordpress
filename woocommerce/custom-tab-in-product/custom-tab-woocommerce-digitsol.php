<?php
/*
	Plugin Name: Custom Tab Woocommerce DigitSol
	Plugin URI: https://digitsol.co/
	Description: Custom Tab Woocommerce
	Version: 1.0
	Author: digitsol
	Author URI: https://digitsol.co/
	License: GPL v2
*/

class CustomTabInWoocommerce {

	/**
	 * Method run on plugin activation
	 */
	public static function plugin_activation() {
		// include nag class
		require_once( plugin_dir_path( __FILE__ ) . '/classes/class-custom-metabox.php' );
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'frontend_hooks' ) );
		add_action( 'admin_init', array( $this, 'admin_hooks' ) );
	}

	/**
	 * Setup the admin hooks
	 *
	 * @return void
	 */
	public function admin_hooks() {

		// Check if user is an administrator
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		// include nag class
		require_once( plugin_dir_path( __FILE__ ) . '/classes/class-custom-metabox.php' );

	}

	/**
	 * Setup the frontend hooks
	 *
	 * @return void
	 */
	public function frontend_hooks() {
		// Don't run in admin or if the admin bar isn't showing
		if ( is_admin() || ! is_admin_bar_showing() ) {
			return;
		}

		// WooCommerce support
		if ( class_exists( 'WooCommerce' ) ) {

			add_filter( 'woocommerce_product_tabs', 'specification_woo_extra_tab' );
				
			function specification_woo_extra_tab( $tabs ) {
			
				global $post;
				$product_specification = get_post_meta( $post->ID, '_product_specification_tab_key', true );

				if ( ! empty( $product_specification ) ) {
				
					$tabs['product_specification'] = array(
						'title'    => apply_filters( 'woocommerce_product_specification_tab_title', __( 'Specifications', 'woocommerce' ) ),
						'priority' => 15,
						'callback' => 'specification_woo_extra_tab_content'
					);
					
				}
				
				return $tabs;
			 
			}
			
			function specification_woo_extra_tab_content() {
			
				global $post;
				$product_specification = get_post_meta( $post->ID, '_product_specification_tab_key', true );
			 
				if ( ! empty( $product_specification ) ) {
					
					echo apply_filters( 'the_content', $product_specification );
					
				}
			 
			}
			
		}
	}


}

/**
 * What The File main function
 */
function __custom_tab_in_woocommerce() {
	new CustomTabInWoocommerce();
}

// Init plugin
add_action( 'plugins_loaded', '__custom_tab_in_woocommerce' );