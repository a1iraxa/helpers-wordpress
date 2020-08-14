<?php 
/**
 * The main template file for pages
 * @package Repairbuddy
 * @since 1.0
 *
 */

get_header(); ?>
<!-- header -->
<div class="header tt-page-header filter dark-6" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full'); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="title text-center"><?php echo get_the_title(  ); ?></h1>
			</div>
		</div>
	</div>
</div>
<!-- end header -->


<?php if (have_posts()): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<!-- Main Content Start -->
		<div class="main main-raised">

			<div class="section-padding section-basic">
		    	<div class="container">
					<div class="row margin-bottom-80 text-center">
		                <div class="col-md-8 col-md-offset-2">
		                    <h2 class="title wow fadeInUp"><?php the_title(  ); ?></h2>
		                    <div class="section-divider"></div>
		                    <p class="description wow fadeInUp"><?php the_content(); ?></p>
		                </div>
		            </div><!-- /.row -->

			        
		    	</div>
		    </div>
		</div>
		<!-- End Main Content -->
	<?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>