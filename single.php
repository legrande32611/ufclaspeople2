<?php
/**
 * The template for displaying all single posts.
 *
 * @package UF CLAS People 2
 */

get_header(); ?>

<?php $content_width = ( is_active_sidebar( 'post_sidebar' ) )? "col-sm-6 col-md-6":"col-sm-8 col-md-9"; ?>

	<div id="primary" class="content-area <?php echo $content_width; ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php ufclaspeople2_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>