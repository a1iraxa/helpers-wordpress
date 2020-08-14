<?php
/**
 * The file for registering sidebars
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */

add_action( 'widgets_init', 'repairbuddy_widgets_init' );
/*
===========================================================
Left & Right Sidebars
===========================================================
*/

function repairbuddy_widgets_init() {
    if ( function_exists('register_sidebar')) {
    
        // Right Sidebar     
        register_sidebar(array(
            'name' => 'Right Sidebar',
            'id' => 'right_sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s post-block col-sm-12 no-padding">',
            'after_widget' => '</div>',
            'before_title' => '<div class="title col-sm-12 no-padding"><h4 class="title">',
            'after_title' => '</h4></div>',
        ));
    } 
}


   