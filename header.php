<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UF CLAS People 2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if( !is_user_logged_in() ) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1145687-25', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>
<nav id="institutional-nav" role="navigation">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ufclaspeople2' ); ?></a>
  <ul id="top" class="container">
    <li id="inst-clas"><a href="http://ufl.edu/">University of Florida</a></li>
    <li id="utility-tabs">
      <ul>
        <li><a class="directory" title="UF Directory" href="https://directory.ufl.edu/">UF Directory</a></li>
        <li><a class="elearning" title="e-Learning" href="https://lss.at.ufl.edu/">e-Learning</a></li>
        <li><a class="webmail" title="WebMail" href="https://webmail.ufl.edu/">WebMail</a></li>
        <li><a class="isis" title="ISIS" href="http://www.isis.ufl.edu/">ISIS</a></li>
        <li><a class="myufl" title="myUFL" href="https://my.ufl.edu/ps/signon.html">myUFL</a></li>
        <li><a class="maps" title="Campus Map" href="http://campusmap.ufl.edu/">Maps</a></li>
      </ul>
    </li>
  </ul> 
</nav>

<div class="container-wrap">
<div id="page" class="hfeed site container">
	<header id="masthead" class="site-header row" role="banner">
		<div class="site-organization col-sm-3 col-sm-push-9 col-md-4 col-md-push-8">
        	<a href="http://clas.ufl.edu/">College <em>of</em> Liberal Arts <em>and</em> Sciences</a>
        </div>
        <hgroup class="header-title col-sm-9 col-sm-pull-3 col-md-8 col-md-pull-4">
        <div class="row">
            <div class="site-logo col-xs-3"><a href="http://ufl.edu/" class="uf">University of Florida</a></div>
            <div class="site-branding col-xs-9">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </div>
          </div>
      </hgroup>
		<!-- #top-navigation -->
	</header><!-- #masthead -->
	<div id="breadcrumb" class="row"></div>
    <div id="mobile-navigation" class="navbar-oncanvas navbar navbar-default row">
      <div class="btn-group btn-group-justified">
      <a class="btn btn-default navbar-toggle" data-placement="left" data-canvas=".container-wrap" data-target=".navmenu" data-toggle="offcanvas" href="#" role="button"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
      <a class="btn btn-default<?php echo (of_get_option('opt_profile_email'))? '':' disabled'; ?>" href="mailto:<?php echo of_get_option('opt_profile_email'); ?>" role="button"><span class="glyphicon glyphicon-envelope"></span></a> 
      <a class="btn btn-default<?php echo (of_get_option('opt_profile_phone'))? '':' disabled'; ?>" href="tel:1-<?php echo of_get_option('opt_profile_phone'); ?>" role="button"><span class="glyphicon glyphicon-earphone"></span></a> 
      <a class="btn btn-default<?php echo (of_get_option('opt_profile_location')=='')? ' disabled':''; ?>" href="http://maps.google.com/maps?q=<?php echo urlencode(of_get_option('opt_profile_location')); ?>" role="button"><span class="glyphicon glyphicon-map-marker"></span></a> 
      </div><!-- .btn-group -->
    </div><!-- #mobile-navigation -->
    <?php if ( is_front_page() || is_home() ) { 
			if( get_theme_mod('header_slideshow') ) { ?>
            <div id="site-image" class="row">
                <?php do_action('slideshow_deploy', get_theme_mod('header_slideshow') ); ?>
            </div>
            <?php } elseif( get_header_image() ) { ?>
            <div id="site-image" class="row">
                <img src="<?php header_image(); ?>" alt="" />
            </div>
	<?php }} ?>
	<div id="content" class="site-content row">
    <div id="site-navigation" class="col-sm-3">
    <div class="navmenu navmenu-offcanvas offcanvas">
        <nav class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => 3 ) ); ?>
        </nav><!-- #main-navigation -->
        <?php 
			if( is_front_page() || is_home() ){ 
				get_sidebar('home_left'); 
			}
			else {
				get_sidebar('page_sidebar'); 
			}
		?>
    </div>
    </div>