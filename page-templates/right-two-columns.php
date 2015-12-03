<?php
/**
Template Name: Two Columns (Right Sidebar, No Left Column)
*/

get_header(); 
?> 	
	<?php 
		// Set width of primary area, full width when no page_right widgets present
		$primary_width = ( is_active_sidebar( 'page_right' ) )? ' col-sm-9':' col-sm-12';
	?>
 
	<div id="primary" class="content-area<?php echo $primary_width; ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('page_right'); ?>
<?php get_footer(); ?>
