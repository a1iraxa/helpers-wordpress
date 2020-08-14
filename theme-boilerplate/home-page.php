<?php 
/**
 * Template Name: Home Page
 * The full page template without container
 * @package Repairbuddy
 * @since 1.0
 *
 */
get_header(); ?>

<!-- Main Content Start -->
<?php get_template_part('home-sections/section','hero'); ?>
<?php get_template_part('home-sections/section','services'); ?>
<?php get_template_part('home-sections/section','about'); ?>
<?php get_template_part('home-sections/section','counters'); ?>
<!-- End Main Content -->

<?php get_footer(); ?>