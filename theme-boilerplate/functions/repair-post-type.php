<?php
/**
 * The file for repair post type
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Repair_Post_Type
 * @class Repair_Post_Type
 */
class Repair_Post_Type {
	/**
	 * Initialize custom post type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
	}

	/**
	 * Custom post type definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
	    $labels = array(
	        'name'               => __('Repair', 'repairbuddy'),
	        'singular_name'      => __('Repair', 'repairbuddy'),
	        'menu_name'          => __('Repair', 'repairbuddy'),
	        'name_admin_bar'     => __('Repair', 'repairbuddy'),
	        'parent_item_colon'  => __('Parent Repair:', 'repairbuddy'),
	        'all_items'          => __('All Repair', 'repairbuddy'),
	        'add_new_item'       => __('Add New Repair', 'repairbuddy'),
	        'add_new'            => __('Add New Repair', 'repairbuddy'),
	        'new_item'           => __('New Repair', 'repairbuddy'),
	        'edit_item'          => __('Edit Repair', 'repairbuddy'),
	        'update_item'        => __('Update Repair', 'repairbuddy'),
	        'view_item'          => __('View Repair', 'repairbuddy'),
	        'search_items'       => __('Search Repair', 'repairbuddy'),
	        'not_found'          => __('No Repair Found', 'repairbuddy'),
	        'not_found_in_trash' => __('No Repair found in Trash', 'repairbuddy'),
	    );
	    $args = array(
	        'label'               => __('Repair', 'repairbuddy'),
	        'description'         => __('Custom post type for Repair', 'repairbuddy'),
	        'labels'              => $labels,
	        'supports'            => array('title', 'editor', 'thumbnail', 'comments'),
	        'taxonomies'          => array('post-tag'),
	        'hierarchical'        => true,
	        'public'              => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'menu_position'       => 7,
	        'menu_icon'           => 'dashicons-admin-settings',
	        'show_in_admin_bar'   => true,
	        'show_in_nav_menus'   => true,
	        'can_export'          => true,
	        'has_archive'         => true,
	        'exclude_from_search' => false,
	        'publicly_queryable'  => true,
	        'capability_type'     => 'page',
	    );
	    register_post_type('repair', $args);
	}
}

Repair_Post_Type::init();
