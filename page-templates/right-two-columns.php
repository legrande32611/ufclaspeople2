<?php
/**
Template Name: Two Columns (Right Sidebar, No Left Column)
*/

get_header(); ?>

	<div id="primary" class="content-area col-sm-9">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('page_right'); ?>
<?php get_footer(); ?>
