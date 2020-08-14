<?php
/**
 * The porject archive file for displaying all repairs
 *
 * @package Repairbuddy
 * @since Repairbuddy 1.0
 */
get_header(); ?>
<section id="<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <?php 
                    if (have_posts()):
                        while (have_posts()):
                            the_post(); ?>
                                <?php if ( has_post_thumbnail() ): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button"><h2><?php the_title(); ?></h2></a>
                                <ul>
                                    <?php if (has_term('', 'repair-category')): ?>
                                        <li><strong><?php esc_html_e('Category:', 'repairbuddy') ?></strong> 
                                            <?php echo get_the_term_list( get_the_ID(), 'repair-category', '', ',', '' ); ?>
                                        </li>    
                                    <?php endif ?>
                                </ul>

                                <?php the_content(); ?>
                        <?php
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>