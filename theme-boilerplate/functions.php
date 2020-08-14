<?php
/**
 * Repairbuddy functions and definitions
 * 
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */

/**
 * Define Directories and URL Constants
 * @since Repairbuddy 1.0
 */
$get_theme = wp_get_theme();

define('REPAIRBUDDY_THEME_NAME', $get_theme);
define('REPAIRBUDDY_THEME_VERSION', '1.0');
define('REPAIRBUDDY_THEME_SLUG', 'repairbuddy');
define('REPAIRBUDDY_BASE_URL', get_template_directory_uri());
define('REPAIRBUDDY_BASE', get_template_directory());

define('REPAIRBUDDY_ASSETS', REPAIRBUDDY_BASE . '/assets');
define('REPAIRBUDDY_ASSETS_URL', REPAIRBUDDY_BASE_URL . '/assets');
define('REPAIRBUDDY_JS', REPAIRBUDDY_BASE . '/assets/js');
define('REPAIRBUDDY_JS_URL', REPAIRBUDDY_BASE_URL . '/assets/js');
define('REPAIRBUDDY_CSS', REPAIRBUDDY_BASE . '/assets/css');
define('REPAIRBUDDY_CSS_URL', REPAIRBUDDY_BASE_URL . '/assets/css');
define('REPAIRBUDDY_IMAGES', REPAIRBUDDY_BASE . '/assets/images');
define('REPAIRBUDDY_IMAGES_URL', REPAIRBUDDY_BASE_URL . '/assets/images');
define('REPAIRBUDDY_CORE', REPAIRBUDDY_BASE . '/functions');
define('REPAIRBUDDY_CORE_URL', REPAIRBUDDY_BASE_URL . '/functions');

/**
 * Enque script and css
 * @since Repairbuddy 1.0
 */
if (file_exists(REPAIRBUDDY_ASSETS . '/style_script.php')) {
    require_once REPAIRBUDDY_ASSETS . '/style_script.php';
}

/**
 * All theme support and functions
 * @since Repairbuddy 1.0
 */
if (file_exists(REPAIRBUDDY_CORE . '/core.php')) {
    require_once REPAIRBUDDY_CORE . '/core.php';
}