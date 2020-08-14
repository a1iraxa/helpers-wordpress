<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Repair_Taxonomies
 *
 * @class Repair_Taxonomies
 * @package Tutorial/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Repair_Taxonomies {
	/**
	 * Initialize taxonomy
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
	}

	/**
	 * Widget definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$news_labels = array(
	        'name'                       => __('Repair Categories', 'repairbuddy'),
	        'singular_name'              => __('Repair Category', 'repairbuddy'),
	        'menu_name'                  => __('Repair Category', 'repairbuddy'),
	        'all_items'                  => __('All Categories', 'repairbuddy'),
	        'parent_item'                => __('Parent Category', 'repairbuddy'),
	        'parent_item_colon'          => __('Parent Category:', 'repairbuddy'),
	        'new_item_name'              => __('New Category', 'repairbuddy'),
	        'add_new_item'               => __('Add New Category', 'repairbuddy'),
	        'edit_item'                  => __('Edit Category', 'repairbuddy'),
	        'update_item'                => __('Update Category', 'repairbuddy'),
	        'view_item'                  => __('View Category', 'repairbuddy'),
	        'separate_items_with_commas' => __('Separate categories with commas', 'repairbuddy'),
	        'add_or_remove_items'        => __('Add or remove Categories', 'repairbuddy'),
	        'choose_from_most_used'      => __('Choose from the most used', 'repairbuddy'),
	        'popular_items'              => __('Popular Categories', 'repairbuddy'),
	        'search_items'               => __('Search Categories', 'repairbuddy'),
	        'not_found'                  => __('No Category Found', 'repairbuddy'),
	    );
	    $args = array(
	        'labels'            => $news_labels,
	        'hierarchical'      => true,
	        'public'            => true,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'show_in_nav_menus' => true,
	        'show_tagcloud'     => true,
	    );
	    register_taxonomy('repair-category', array('repair'), $args);

		$tags_labels = array(
	        'name'                       => __('Repair Tags', 'repairbuddy'),
	        'singular_name'              => __('Repair Tags', 'repairbuddy'),
	        'menu_name'                  => __('Repair Tags', 'repairbuddy'),
	        'all_items'                  => __('All Tags', 'repairbuddy'),
	        'parent_item'                => __('Parent Tags', 'repairbuddy'),
	        'parent_item_colon'          => __('Parent Tags:', 'repairbuddy'),
	        'new_item_name'              => __('New Tags', 'repairbuddy'),
	        'add_new_item'               => __('Add New Tags', 'repairbuddy'),
	        'edit_item'                  => __('Edit Tags', 'repairbuddy'),
	        'update_item'                => __('Update Tags', 'repairbuddy'),
	        'view_item'                  => __('View Tags', 'repairbuddy'),
	        'separate_items_with_commas' => __('Separate categories with commas', 'repairbuddy'),
	        'add_or_remove_items'        => __('Add or remove Tags', 'repairbuddy'),
	        'choose_from_most_used'      => __('Choose from the most used', 'repairbuddy'),
	        'popular_items'              => __('Popular Tags', 'repairbuddy'),
	        'search_items'               => __('Search Tags', 'repairbuddy'),
	        'not_found'                  => __('No Tags Found', 'repairbuddy'),
	    );
	    $tags_args = array(
	        'labels'            => $tags_labels,
	        'hierarchical'      => true,
	        'public'            => true,
	        'show_ui'           => true,
	        'update_count_callback' => '_update_post_term_count',
	        'show_admin_column' => true,
	        'query_var' 		=> true,
	        'show_in_nav_menus' => true,
	        'show_tagcloud'     => true,
	    );
	    register_taxonomy('repair-tag', array('repair'), $tags_args);
	}
}

Repair_Taxonomies::init();
