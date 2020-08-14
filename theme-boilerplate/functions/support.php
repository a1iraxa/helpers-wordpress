<?php
/**
 * The file for theme registering theme supports
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */
/*
==============================================
Define theme width
==============================================
 */
if (!isset($content_width)) {
    $content_width = 1170;
}
/**
 * Register Theme Features
 * @since Repairbuddy 1.0
 */
if (!function_exists('repairbuddy_theme_after_setup')) {
	function repairbuddy_theme_after_setup() {
	    
	    // Add theme support for Automatic Feed Links and load textdomain
	    add_theme_support('automatic-feed-links');
	    
	    // Add theme support for Featured Images
	    add_theme_support('post-thumbnails');
	    set_post_thumbnail_size(740, 475, true);

	    // Add theme support for HTML5 Semantic Markup
	    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	    
	    // Add theme support for document Title tag
	    add_theme_support('title-tag');
	    // Add theme support for menus
	    add_theme_support('menus');
	}
	add_action('after_setup_theme', 'repairbuddy_theme_after_setup');
}
/**
 * Main Menu
 * @since Repairbuddy 1.0
 */
if (!function_exists('repairbuddy_nav_register_fun')) {
	function repairbuddy_nav_register_fun() {
	    // Add theme support for Nav Manu
	    register_nav_menu('primary', 'Header Menu');
        // register_nav_menu('secondry', 'Secondry Menu');
	}
}
add_action('init', 'repairbuddy_nav_register_fun');
/**
* Page Title
* @since Repairbuddy 1.0
*/
if (!function_exists('repairbuddy_wp_title')) {
   
    function repairbuddy_wp_title($title, $separator) {
        if (is_feed()) return $title;
        
        global $paged, $page;
        
        if (is_search()) {
            $title = sprintf(esc_html__('Search results for %s', 'repairbuddy'), '"' . get_search_query() . '"');
            if ($paged >= 2) $title.= " $separator " . sprintf(esc_html__('Page %s', 'repairbuddy'), $paged);
            $title.= " $separator " . get_bloginfo('name', 'display');
            return $title;
        }
        if (!is_home()) {
            $title.= get_bloginfo('name', 'display');
        } 
        else {
            $title.= '  ' . get_bloginfo('name', 'display');
        }
        
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) $title.= " $separator " . $site_description;
        
        if ($paged >= 2 || $paged >= 2) $title.= " $separator " . sprintf(esc_html__('Page %s', 'repairbuddy'), max($paged, $page));
        
        return $title;
    }
    add_filter('wp_title', 'repairbuddy_wp_title', 10, 2);
}
  if( !function_exists( 'repairbuddy_header_metas' ) )
  {
/*
==============================================
Header metas
==============================================
 */
    function repairbuddy_header_metas()
    {
    	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'."\n";
    	echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">'."\n";
    }
    add_action('wp_head', 'repairbuddy_header_metas',1);
  }