<?php
/**
 * Japiblog functions and definitions
 *
 * @package WordPress
 * @subpackage Japiblog
 * @since Japiblog 2.0
 */
add_action( 'after_setup_theme', 'japiblog_setup' ); 
 
 
if ( ! function_exists( 'japiblog_setup' ) ):


function japiblog_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Navegación Principal', 'japiblog' ),
		'secondary' => __( 'Navegación Secundaria', 'japiblog' ),
		'third' => __( 'Navegación Móvil', 'japiblog' ),
	) );
		
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'japiblog-full-width', 1024, 576, true );
	add_image_size( 'japiblog-all-width', 600 );
	add_image_size( 'japiblog-single-width', 800 );

	
}

endif;

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Japiblog 2.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function japiblog_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'japiblog' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'japiblog_wp_title', 10, 2 );

/**
 * Sets the post excerpt length to 40 characters.
 * @since japiblog 2.0
 * @return int
 */
function japiblog_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'japiblog_excerpt_length' );


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override simplesteady_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since japiblog 2.0
 * @uses register_sidebar
 */
function japiblog_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Widget Lateral Principal', 'japiblog' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Widget para agregar contenidos', 'japiblog' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '<span class="circle"></span></h2>',
	) );

	// Area 2
	register_sidebar( array(
		'name' => __( 'Widget Lateral Secundario', 'japiblog' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Widget para agregar contenidos', 'japiblog' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '<span class="circle"></span></h2>',
	) );
	
	// Footer 1
	register_sidebar( array(
		'name' => __( 'Footer Primero', 'japiblog' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'Widget para agregar contenidos footer', 'japiblog' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s"><div class="inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	// Footer 2
	register_sidebar( array(
		'name' => __( 'Footer Segundo', 'japiblog' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Widget para agregar contenidos footer', 'japiblog' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s"><div class="inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	// Footer 2
	register_sidebar( array(
		'name' => __( 'Footer Tercero', 'japiblog' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Widget para agregar contenidos footer', 'japiblog' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s"><div class="inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
/** Register sidebars by running japiblog_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'japiblog_widgets_init' );

/**
 * Pagination
 * @since japiblog 2.0
 * @return int
 */
function japi_pagination($pages = '', $range = 2) {  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/*
 * Agregar link a admin
 * @since japiblog 2.0
 */
add_filter( 'pre_option_link_manager_enabled', '__return_true' );


/**
 * Display an optional post thumbnail.
 *
 * @since japiblog 2.0
 *
 * @return void
*/
function japiblog_post_thumbnail() {
	if ( post_password_required() || ! has_post_thumbnail() ) {
		return; }
	?>

	<div class="post-thumbnail">
	<?php if (is_single()){
		 the_post_thumbnail('japiblog-single-width'); 
	} else { 
		the_post_thumbnail('japiblog-all-width'); 
	} ?>
	</div>

<?php }


/**
 * Text short
 *
 * @since japiblog 2.0
 *
 * @return void
*/
function wp_new_excerpt($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');


/**
 * Attach a class to linked images' parent anchors
 * Works for existing content
 * @since japiblog 2.0
 *
 * @return void
 */
function give_linked_images_class($content) {

  $classes = 'disabled'; // separate classes by spaces - 'img image-link'

  // check if there are already a class property assigned to the anchor
  if ( preg_match('/<a.*? class=".*?"><img/', $content) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}

add_filter('the_content','give_linked_images_class');

?>