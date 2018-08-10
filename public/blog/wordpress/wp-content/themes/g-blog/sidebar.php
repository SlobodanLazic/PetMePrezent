<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G_Blog
 */
global $g_blog_theme_options;
$designlayout = $g_blog_theme_options['g-blog-layout'];

if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar' == $designlayout ) 
{
	return;
}

$side_col = 'left-s-bar';
if( 'left-sidebar' == $designlayout )
{
	$side_col = 'right-s-bar';
}
?>

<aside id="secondary" class="col-sm-4 col-md-4 widget-area <?php echo $side_col; ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
