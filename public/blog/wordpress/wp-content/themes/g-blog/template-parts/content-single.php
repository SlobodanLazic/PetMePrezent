<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package G_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="g-blog-post-wrapper <?php if ( !has_post_thumbnail () ) { echo "no-feature-image"; } ?>">
	   <!--post thumbnal options-->
		<div class="g-blog-post-thumb">
			<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->
		<div class="single-content-wrap">
			<div class="catagories">
				<?php g_blog_entry_footer(); ?>
			</div>

			<div class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</div><!-- .entry-header -->
			<div class="entry-footer">
				<?php
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php g_blog_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</div>

			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'g-blog' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'g-blog' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'g-blog' ),
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'g-blog' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'g-blog' ),
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>	
</article><!-- #post-## -->