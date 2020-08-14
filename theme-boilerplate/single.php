<?php 
/**
 * The main template file for single post
 * @package Repairbuddy
 * @since 1.0.0
 *
 */

get_header();
?>

<!--single blog-->
<section id="single-blog" <?php post_class('space'); ?> >
	<div class="container">
		<div class="row">
			<div class="sb-base col-sm-8 col-sm-offset-2">
				<?php 
	                if (have_posts()) : 
	                    while (have_posts()) : the_post(); ?>
		                	<article class="col-sm-12 blog-item">
								<div class="bp-into col-sm-12 no-padding">
									<h3><?php the_title(); ?> </h3>
									<?php the_content(); ?>
								</div>
							</article>
	                <?php endwhile;
	                else:
	                    get_template_part('404.php'); 
	                endif;
					wp_link_pages( array(
					    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'four' ) . '</span>',
					    'after'       => '</div>',
					    'link_before' => '<span>',
					    'link_after'  => '</span>',
					    )
					);
                ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>