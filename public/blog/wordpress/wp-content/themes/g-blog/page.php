<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package G_Blog
 */

get_header();

/**
* Hook - g_blog_breadcrumb_type.
*
* @hooked g_blog_breadcrumb_type
*/
do_action( 'g_blog_breadcrumb_type' );

global $g_blog_theme_options;
$designlayout = $g_blog_theme_options['g-blog-layout'];
$side_col     = 'right-s-bar ';
if( 'left-sidebar' == $designlayout )
{
	$side_col = 'left-s-bar';
}
?>

	<div id="primary" class="content-area col-sm-8 col-md-8 <?php echo $side_col;?>">
		<main id="main" class="site-main" role="main">

			<?php
			
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
