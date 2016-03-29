<?php
/**
 * The template for index.php
 *
 * @package WordPress
 * @subpackage japiblog
 * @since japiblog 2.0
 */

get_header(); ?>	
	
<div id="content">

	<?php if (have_posts()) : ?>
	    
	   <div class="blog-content">
       
        <?php while (have_posts()) : the_post(); ?>
	
		<article>
				
			 <p class="cat"><?php the_category(', ') ?> /  <span class="por">por</span> <?php the_author_posts_link(); ?> </p>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace a <?php the_title(); ?>"><?php the_title(); ?></a></h1>
				
			<div class="entry">
				<?php if ( has_post_thumbnail() ) {
				
				 	japiblog_post_thumbnail();
				 	$content = $post->post_content; ?>
				 	<p><?php echo wp_trim_words( $content, 80 ); ?></p>
				 	<p><a href="<?php the_permalink() ?>" title=""><?php _e('Leer más &raquo;', 'japiblog'); ?></a></p>
				 	
				<?php } else {
				 	the_content('Leer más &raquo;'); 
				 }
				 
				 ?>
			</div> 
			
			<div class="join">
				<div class="comentarios">
					 <?php comments_popup_link('Comenta', '1 Comentario', '% Comentarios'); ?> | <?php the_time('d - m - Y') ?>
				</div>
				<?php include('inc/share-social.php'); ?>
			</div>
		
		</article>
	
	 <?php endwhile; ?>
	 
	</div>
    
    
    <?php japi_pagination($pages = '', $range = 2); ?>  
             
    <?php else : ?>
    
        <h2 class="center">No se ha encontrado nada relacionado. </h2>
        <p style="margin-bottom:2em;" class="center">Por favor intenta con el buscador nuevamente.</p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>
        
    <?php endif; ?>

	
</div><!--#content-->

<?php get_sidebar(); ?>	

<?php get_footer(); ?>