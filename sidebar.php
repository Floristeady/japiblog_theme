<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage simplesteady
 * @since simplesteady 1.0
 */
?>

<aside id="sidebar" class="der">
			
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

	<ul class="widget-list">
		<?php dynamic_sidebar( 'primary-widget-area' ); ?>
	</ul>
	<?php endif; ?>
	
	<?php include('inc/aside-facebook.php'); ?>

	<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

	<ul class="widget-list">
		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
	</ul>

<?php endif; ?>

</aside>