<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package G_Blog
 */

?>
<?php $thumb_class= ( has_post_thumbnail() )?'':'no-post-thumbnail';?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $thumb_class ); ?>>
	<div class="g-blog-post-wrapper">
	   <!--post thumbnal options-->
		<div class="g-blog-post-thumb">
			<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->

		<div class="content-wrap">
			
			<div class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<?php endif; ?>
			</div><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
		
	</div>
</article><!-- #post-## -->
