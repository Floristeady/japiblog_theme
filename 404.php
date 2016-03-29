<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage japiblog
 * @since japiblog 2.0
 */

get_header(); ?>

<div id="content">

			<article style="margin:30px 0 120px;" id="post-0" class="post error404 not-found" role="main">
				<h1 class="entry-title"><?php _e( 'Esta página no tiene contenido.', 'japiblog' ); ?></h1>
				<p><?php _e( 'Parece que la página que buscas no existe.<br> Puedes intentar con el buscador o con el menú superior.', 'japiblog' ); ?></p>

			</article>

</div>
	
<?php get_sidebar();
get_footer(); ?>
