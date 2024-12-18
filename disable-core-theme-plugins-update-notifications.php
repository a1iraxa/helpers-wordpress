<?php 

define('RAZA_DISABLE_UPDATES', true);

/**
 * Disable theme & plugins update
 */
if ( defined('RAZA_DISABLE_UPDATES') && constant('RAZA_DISABLE_UPDATES') === true) {
    
    // Disable plugins auto-update email notifications .
    add_filter( 'auto_plugin_update_send_email', '__return_false' );

    // Disable themes auto-update email notifications.
    add_filter( 'auto_theme_update_send_email', '__return_false' );

    // Disable the wordpress plugin update notifications.
    remove_action( 'load-update-core.php', 'wp_update_plugins' );
    add_filter( 'pre_site_transient_update_plugins', '__return_null' );

    // Disable the wordpress theme update notifications
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );

    // Disable the wordpress core update notifications
    add_action( 'after_setup_theme', 'remove_core_updates' );

    function remove_core_updates() {
        //fadd_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
        add_filter( 'pre_option_update_core', '__return_null' );
        add_filter( 'pre_site_transient_update_core', '__return_null' );
    }

    add_filter( 'auto_update_plugin', '__return_false' );
    add_filter( 'auto_update_theme', '__return_false' );
}