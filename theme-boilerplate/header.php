<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

    <!-- Basic Page Needs -->
  <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('home-2 body-innerwrapper'); ?>>
        <section class="main">
            <header class="header-2">
                <nav class="navbar active" data-spy="affix" data-offset-top="1" id="slide-nav">
                    <div class="container">
                        <div class="navbar-header col-sm-2 col-md-3 col-xs-12">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo get_home_url(); ?>" class="menu-logo"><img src="<?php echo REPAIRBUDDY_IMAGES_URL; ?>/logo.svg" alt="logo"></a>
                        </div>
                        <!--Nav links-->
                        <div class=" navbar-collapse col-sm-9 col-md-9" id="menu_nav">
                            <div class="closs-button text-right">
                                <a href="#" class="closs"><i class="icofont icofont-close-line"></i></a>
                            </div>
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'primary',
                                        'menu_id'         => 'main-menu',
                                        'menu_class'      => 'nav navbar-nav',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'fallback_cb'     => 'bootstrap_navwalker::fallback',
                                        'walker'          => new bootstrap_navwalker()
                                    )
                                );
                            ?>
                        </div>
                        <!--/.navbar-collapse-->
                    </div>
                </nav>
            </header>
        