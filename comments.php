<?php // Do not delete these lines
	global $id_or_email;
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Esta entrada esta protegida por contrase�a, ingresala y podr�s leer los comentarios.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="comentarios">
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Sin Comentarios', 'Un Comentario', '% Comentarios' );?> para &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<span class="gravatar"><?php 
   echo get_avatar( $id_or_email, $size = '80' ); 
   ?>
   
   </span>
			<span class="autor"><?php comment_author_link() ?></span> dice:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario est&aacute; esperando mi aprobaci&oacute;n.</em>
			<?php endif; ?>
			<br />
			
			<p><?php comment_text() ?></p>
			
			<p class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">Escrito el <?php comment_date('d-m-Y') ?> a las <?php comment_time() ?></a></p>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios estan cerrados, vuelve pronto.</p>

	<?php endif; ?>
<?php endif; ?>

<div id="comentar">
<?php if ('open' == $post->comment_status) : ?>

<h3 class="respond">Deja un comentario</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Necesitas estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">identificado</a> para dejar un comentario.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Identificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Salir &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" class="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author">Nombre</label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email">E-mail</label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url">Web</label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Publicar" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
