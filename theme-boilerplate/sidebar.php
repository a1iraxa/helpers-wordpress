<?php
/**
 * sidebar.php
 * The main post loop in Repairbuddy
 * @package Repairbuddy
 * @since 1.0.0
 */
?>
<?php if (is_active_sidebar('right_sidebar')) : ?>
    <?php dynamic_sidebar('right_sidebar'); ?>
<?php endif;