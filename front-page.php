<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UF CLAS People 2
 */

get_header(); ?>

<?php $content_width = ( is_active_sidebar( 'home_right' ) )? "col-sm-6":"col-sm-8 col-md-9"; ?>

	<div id="primary" class="content-area <?php echo $content_width; ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('home_right'); ?>
<?php get_footer(); ?>