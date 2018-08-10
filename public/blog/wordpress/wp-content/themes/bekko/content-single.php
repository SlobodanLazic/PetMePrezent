<?php
/**
 * The template for displaying single posts.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php bekko_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * bekko_before_content hook.
		 *
		 *
		 * @hooked bekko_featured_page_header_inside_single - 10
		 */
		do_action( 'bekko_before_content' );
		?>

		<header class="entry-header">
			<?php
			/**
			 * bekko_before_entry_title hook.
			 *
			 */
			do_action( 'bekko_before_entry_title' );

			if ( bekko_show_title() ) {
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			}

			/**
			 * bekko_after_entry_title hook.
			 *
			 *
			 * @hooked bekko_post_meta - 10
			 */
			do_action( 'bekko_after_entry_title' );
			?>
		</header><!-- .entry-header -->

		<?php
		/**
		 * bekko_after_entry_header hook.
		 *
		 *
		 * @hooked bekko_post_image - 10
		 */
		do_action( 'bekko_after_entry_header' );
		?>

		<div class="entry-content" itemprop="text">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bekko' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php
		/**
		 * bekko_after_entry_content hook.
		 *
		 *
		 * @hooked bekko_footer_meta - 10
		 */
		do_action( 'bekko_after_entry_content' );

		/**
		 * bekko_after_content hook.
		 *
		 */
		do_action( 'bekko_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
