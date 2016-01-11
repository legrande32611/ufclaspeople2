<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UF CLAS People 2
 */
?>

	</div><!-- #content -->
</div><!-- #page -->
<footer id="colophon" class="site-footer" role="contentinfo">      
            
            <div id="institutional-footer" class="container">
            <span class="uf-monogram"></span>
			<div class="site-info row">
        	
            <div class="footer-logo col-sm-4 col-sm-push-8 col-md-3 col-md-push-9">
                <a href="http://www.ufl.edu/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/uf_logo_full.png" alt="University of Florida" /></a>
            </div>
		
        	<div id="footer-links" class="col-sm-8 col-sm-pull-4 col-md-8 col-md-pull-3">	
            	<nav id="footer-nav" class="footer-navigation" role="navigation">
                    <h3 class="screen-reader-text"><?php _e( 'Footer Menu', 'ufclaspeople2' ); ?></h3>
                    <a class="skip-link screen-reader-text" href="#sidebar-footer"><?php _e( 'Skip to footer content', 'ufclaspeople2' ); ?></a>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'nav-menu', 'depth' => 1, 'fallback_cb' => false ) ); ?>
				</nav><!-- #footer-navigation -->
                <p>&copy; <?php echo date('Y'); ?> <a href="http://www.ufl.edu/">University of Florida</a>, Gainesville, FL 32611; (352) 392-3261. 
                <?php 
                    if( !is_front_page() ){
                        _e( 'Page Updated: ', 'ufclaspeople2' ); the_modified_date();
                    } else {
                        _e( 'Site Updated: ', 'ufclaspeople2' ); ufl_site_last_updated();
                    }
                 ?>
                 </p>	
                <p>This page uses <a href="http://www.google.com/analytics/">Google Analytics</a> (<a href="http://www.google.com/intl/en_ALL/privacypolicy.html">Google Privacy Policy</a>)</p>
            </div><!-- end #footer-links -->
        
            
            
            </div><!-- .site-info -->
            </div><!-- #institutional-footer -->
	</footer><!-- #colophon -->
</div>
<?php wp_footer(); ?>

</body>
</html>
