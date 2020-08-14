<?php
/**
 * Theme heart beat
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */

/*
    ==============================================
    Theme Support
    ==============================================
*/
if (file_exists(get_template_directory() . '/functions/support.php')) {
    require_once get_template_directory() . '/functions/support.php';
}

/*
    ==============================================
    Nav Walker
    ==============================================
*/
if (file_exists(get_template_directory() . '/functions/bootstrap-navwalker.php')) {
    require_once get_template_directory() . '/functions/bootstrap-navwalker.php';
}
/*
    ==============================================
    Sidebar
    ==============================================
*/
if (file_exists(get_template_directory() . '/functions/sidebar.php')) {
    require_once get_template_directory() . '/functions/sidebar.php';
}

/*
    ==============================================
    repair-post-type
    ==============================================
*/
if (file_exists(get_template_directory() . '/functions/repair-post-type.php')) {
    require_once get_template_directory() . '/functions/repair-post-type.php';
}


/*
    ==============================================
    repair-taxonomies
    ==============================================
*/
if (file_exists(get_template_directory() . '/functions/repair-taxonomies.php')) {
    require_once get_template_directory() . '/functions/repair-taxonomies.php';
}
