<?php
/**
 * Featured image elements.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'bekko_post_image' ) ) {
	add_action( 'bekko_after_entry_header', 'bekko_post_image' );
	/**
	 * Prints the Post Image to post excerpts
	 */
	function bekko_post_image() {
		// If there's no featured image, return.
		if ( ! has_post_thumbnail() ) {
			return;
		}

		// If we're not on any single post/page or the 404 template, we must be showing excerpts.
		if ( ! is_singular() && ! is_404() ) {
			echo apply_filters( 'bekko_featured_image_output', sprintf( // WPCS: XSS ok.
				'<div class="post-image">
					<a href="%1$s">
						%2$s
					</a>
				</div>',
				esc_url( get_permalink() ),
				get_the_post_thumbnail(
					get_the_ID(),
					apply_filters( 'bekko_page_header_default_size', 'full' ),
					array(
						'itemprop' => 'image',
					)
				)
			) );
		}
	}
}

if ( ! function_exists( 'bekko_featured_page_header_area' ) ) {
	/**
	 * Build the page header.
	 *
	 *
	 * @param string The featured image container class
	 */
	function bekko_featured_page_header_area( $class ) {
		// Don't run the function unless we're on a page it applies to.
		if ( ! is_singular() ) {
			return;
		}

		// Don't run the function unless we have a post thumbnail.
		if ( ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?> grid-parent">
			<?php the_post_thumbnail(
				apply_filters( 'bekko_page_header_default_size', 'full' ),
				array(
					'itemprop' => 'image',
				)
			); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'bekko_featured_page_header' ) ) {
	add_action( 'bekko_after_header', 'bekko_featured_page_header', 10 );
	/**
	 * Add page header above content.
	 *
	 */
	function bekko_featured_page_header() {
		if ( function_exists( 'bekko_page_header' ) ) {
			return;
		}

		if ( is_page() ) {
			bekko_featured_page_header_area( 'page-header-image' );
		} elseif ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
			$blog_header_image =  bekko_get_setting( 'blog_header_image' ); 
			if ($blog_header_image != '') { ?>
			<div class="page-header-image grid-parent">
				<img src="<?php echo esc_url($blog_header_image); ?>"  />
			</div>
			<?php
			}
		}
	}
}

if ( ! function_exists( 'bekko_featured_page_header_inside_single' ) ) {
	add_action( 'bekko_before_content', 'bekko_featured_page_header_inside_single', 10 );
	/**
	 * Add post header inside content.
	 * Only add to single post.
	 *
	 */
	function bekko_featured_page_header_inside_single() {
		if ( function_exists( 'bekko_page_header' ) ) {
			return;
		}

		if ( is_single() ) {
			bekko_featured_page_header_area( 'page-header-image-single' );
		}
	}
}
