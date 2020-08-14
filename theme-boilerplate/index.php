<?php
/**
 * The main index or blog template file
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */
get_header(); ?>

<div class="wrap">
    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
    <?php else : ?>
    <header class="page-header">
        <h2 class="page-title"><?php _e( 'Posts', 'repairbuddy' ); ?></h2>
    </header>
    <?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <header class="entry-header">
                            <?php
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            ?>
                        </header><!-- .entry-header -->

                        
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->

                    </article><!-- #post-## -->
                <?php

                endwhile;

            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();