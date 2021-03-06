<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
	
$side_col = 'right-s-bar ';
$designlayout = $g_blog_theme_options['g-blog-layout'];
if( 'left-sidebar' == $designlayout ){
	$side_col = 'left-s-bar';
}
?>
	<div id="primary" class="content-area col-md-9">
		<main id="main" class="site-main" role="main">
		  	<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'g-blog' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'g-blog' ); ?></p>

					<?php
						get_search_form();
						
					?>				

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
