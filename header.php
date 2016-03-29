<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage japiblog
 * @since japiblog 2.0
 */
?>
<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head data-template-set="html5-reset">
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	<meta name="robots" content="index,follow">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="google-site-verification" content="UA-18221731-3">
	<meta name="author" content="JapiJane">
	<meta name="Copyright" content="JapiJane 2014. All Rights Reserved.">
	<link rel="shortcut icon" href="favicon.png">
	<link rel="apple-touch-icon" href="apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png"/>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script src="<?php bloginfo('template_url'); ?>/js/modernizr-2.8.3.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Oxygen:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font.css" media="screen" />
	
	<!--[if lt IE 9]>
	   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

<div class="page">

	<header id="header">
		
		<div id="top">
			<div class="content-center">
				<ul id="social">
	                <li class="face"><a target="_blank" href="http://facebook.com/japijane">Facebook</a></li>
	                <li class="tw"><a target="_blank" href="http://twitter.com/japijane">Twitter</a></li>
	                <li class="ins"><a target="_blank" href="http://instagram.com/japijane">Instagram</a></li>
	                <li class="yt"><a target="_blank" href="http://www.youtube.com/user/japijane/videos">Youtube</a></li>
	             </ul>
				<nav id="nav-2">
				 <?php  wp_nav_menu( array( 'container_id' => 'menu-secondary', 'theme_location' => 'secondary', 'sort_column' => 'menu_order' ) ); ?>
				</nav>
			</div>
		</div>
		
		<div class="content-center">
			
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo_japiblog.png" alt="JapiJane Blog" /></a>
			
			<a class="open" href="javascript:void(0)"><span></span>MENU</a>
			
			<nav id="access" role="navigation" class="clearfix">
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'japiblog' ); ?></a>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
		
			
		</div>

	</header>
	
	<div id="main" class="content-center" role="main">