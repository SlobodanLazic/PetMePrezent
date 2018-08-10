<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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


// define global variable
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

				get_template_part( 'template-parts/content','single');

				

				 /**
                     * g_blog_related_posts hook
                     * @since  1.0.0
                     *
                     * @hooked g_blog_related_posts
                     */
                    do_action('g_blog_related_posts' ,get_the_ID() );

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
