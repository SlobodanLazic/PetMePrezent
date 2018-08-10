<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package G_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function g_blog_body_classes( $classes )
   {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() )
	{
		$classes[] = 'hfeed';
	}
// Add design layout of sidebar
	global $g_blog_theme_options;
    $designlayout=$g_blog_theme_options['g-blog-layout'];
	$classes[] = $designlayout;
	return $classes;
}
add_filter( 'body_class', 'g_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function g_blog_pingback_header()
{
	if ( is_singular() && pings_open() ) 
	{
		?>
	  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php 
	}
}
add_action( 'wp_head', 'g_blog_pingback_header');
