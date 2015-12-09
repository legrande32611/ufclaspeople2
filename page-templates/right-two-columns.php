<?php
/**
Template Name: Right Sidebar, No Left Navigation
*/

get_header(); 
?> 	
	<div id="primary" class="content-area <?php echo ufclaspeople2_get_content_class(); ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
