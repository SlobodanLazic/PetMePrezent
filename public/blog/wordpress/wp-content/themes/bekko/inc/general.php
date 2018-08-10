<?php
/**
 * General functions.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'bekko_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'bekko_scripts' );
	/**
	 * Enqueue scripts and styles
	 */
	function bekko_scripts() {
		$bekko_settings = wp_parse_args(
			get_option( 'bekko_settings', array() ),
			bekko_get_defaults()
		);

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$dir_uri = get_template_directory_uri();

		wp_enqueue_style( 'bekko-style-grid', $dir_uri . "/css/unsemantic-grid{$suffix}.css", false, BEKKO_VERSION, 'all' );
		wp_enqueue_style( 'bekko-style', $dir_uri . "/style{$suffix}.css", array( 'bekko-style-grid' ), BEKKO_VERSION, 'all' );
		wp_enqueue_style( 'bekko-mobile-style', $dir_uri . "/css/mobile{$suffix}.css", array( 'bekko-style' ), BEKKO_VERSION, 'all' );

		if ( is_child_theme() ) {
			wp_enqueue_style( 'bekko-child', get_stylesheet_uri(), array( 'bekko-style' ), filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
		}

		wp_enqueue_style( 'font-awesome', $dir_uri . "/css/font-awesome{$suffix}.css", false, '5.1', 'all' );

		if ( function_exists( 'wp_script_add_data' ) ) {
			wp_enqueue_script( 'bekko-classlist', $dir_uri . "/js/classList{$suffix}.js", array(), BEKKO_VERSION, true );
			wp_script_add_data( 'bekko-classlist', 'conditional', 'lte IE 11' );
		}

		wp_enqueue_script( 'bekko-menu', $dir_uri . "/js/menu{$suffix}.js", array(), BEKKO_VERSION, true );
		wp_enqueue_script( 'bekko-a11y', $dir_uri . "/js/a11y{$suffix}.js", array(), BEKKO_VERSION, true );

		if ( 'click' == $bekko_settings[ 'nav_dropdown_type' ] || 'click-arrow' == $bekko_settings[ 'nav_dropdown_type' ] ) {
			wp_enqueue_script( 'bekko-dropdown-click', $dir_uri . "/js/dropdown-click{$suffix}.js", array( 'bekko-menu' ), BEKKO_VERSION, true );
		}

		if ( 'enable' == $bekko_settings['nav_search'] ) {
			wp_enqueue_script( 'bekko-navigation-search', $dir_uri . "/js/navigation-search{$suffix}.js", array( 'bekko-menu' ), BEKKO_VERSION, true );
		}

		if ( 'enable' == $bekko_settings['back_to_top'] ) {
			wp_enqueue_script( 'bekko-back-to-top', $dir_uri . "/js/back-to-top{$suffix}.js", array(), BEKKO_VERSION, true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

if ( ! function_exists( 'bekko_widgets_init' ) ) {
	add_action( 'widgets_init', 'bekko_widgets_init' );
	/**
	 * Register widgetized area and update sidebar with default widgets
	 */
	function bekko_widgets_init() {
		$widgets = array(
			'sidebar-1' => __( 'Right Sidebar', 'bekko' ),
			'sidebar-2' => __( 'Left Sidebar', 'bekko' ),
			'header' => __( 'Header', 'bekko' ),
			'footer-1' => __( 'Footer Widget 1', 'bekko' ),
			'footer-2' => __( 'Footer Widget 2', 'bekko' ),
			'footer-3' => __( 'Footer Widget 3', 'bekko' ),
			'footer-4' => __( 'Footer Widget 4', 'bekko' ),
			'footer-5' => __( 'Footer Widget 5', 'bekko' ),
			'footer-bar' => __( 'Footer Bar','bekko' ),
			'top-bar' => __( 'Top Bar','bekko' ),
		);

		foreach ( $widgets as $id => $name ) {
			register_sidebar( array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => apply_filters( 'bekko_start_widget_title', '<h2 class="widget-title">' ),
				'after_title'   => apply_filters( 'bekko_end_widget_title', '</h2>' ),
			) );
		}
	}
}

if ( ! function_exists( 'bekko_smart_content_width' ) ) {
	add_action( 'wp', 'bekko_smart_content_width' );
	/**
	 * Set the $content_width depending on layout of current page
	 * Hook into "wp" so we have the correct layout setting from bekko_get_layout()
	 * Hooking into "after_setup_theme" doesn't get the correct layout setting
	 */
	function bekko_smart_content_width() {
		global $content_width;

		$container_width = bekko_get_setting( 'container_width' );
		$right_sidebar_width = apply_filters( 'bekko_right_sidebar_width', '25' );
		$left_sidebar_width = apply_filters( 'bekko_left_sidebar_width', '25' );
		$layout = bekko_get_layout();

		if ( 'left-sidebar' == $layout ) {
			$content_width = $container_width * ( ( 100 - $left_sidebar_width ) / 100 );
		} elseif ( 'right-sidebar' == $layout ) {
			$content_width = $container_width * ( ( 100 - $right_sidebar_width ) / 100 );
		} elseif ( 'no-sidebar' == $layout ) {
			$content_width = $container_width;
		} else {
			$content_width = $container_width * ( ( 100 - ( $left_sidebar_width + $right_sidebar_width ) ) / 100 );
		}
	}
}

if ( ! function_exists( 'bekko_page_menu_args' ) ) {
	add_filter( 'wp_page_menu_args', 'bekko_page_menu_args' );
	/**
	 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	 *
	 *
	 * @param array $args The existing menu args.
	 * @return array Menu args.
	 */
	function bekko_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
}

if ( ! function_exists( 'bekko_disable_title' ) ) {
	add_filter( 'bekko_show_title', 'bekko_disable_title' );
	/**
	 * Remove our title if set.
	 *
	 *
	 * @return bool Whether to display the content title.
	 */
	function bekko_disable_title() {
		global $post;

		$disable_headline = ( isset( $post ) ) ? get_post_meta( $post->ID, '_bekko-disable-headline', true ) : '';

		if ( ! empty( $disable_headline ) && false !== $disable_headline ) {
			return false;
		}

		return true;
	}
}

if ( ! function_exists( 'bekko_resource_hints' ) ) {
	add_filter( 'wp_resource_hints', 'bekko_resource_hints', 10, 2 );
	/**
	 * Add resource hints to our Google fonts call.
	 *
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * @param string $relation_type  The relation type the URLs are printed.
	 * @return array $urls           URLs to print for resource hints.
	 */
	function bekko_resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'bekko-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
				$urls[] = array(
					'href' => 'https://fonts.gstatic.com',
					'crossorigin',
				);
			} else {
				$urls[] = 'https://fonts.gstatic.com';
			}
		}
		return $urls;
	}
}

if ( ! function_exists( 'bekko_remove_caption_padding' ) ) {
	add_filter( 'img_caption_shortcode_width', 'bekko_remove_caption_padding' );
	/**
	 * Remove WordPress's default padding on images with captions
	 *
	 * @param int $width Default WP .wp-caption width (image width + 10px)
	 * @return int Updated width to remove 10px padding
	 */
	function bekko_remove_caption_padding( $width ) {
		return $width - 10;
	}
}

if ( ! function_exists( 'bekko_enhanced_image_navigation' ) ) {
	add_filter( 'attachment_link', 'bekko_enhanced_image_navigation', 10, 2 );
	/**
	 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
	 */
	function bekko_enhanced_image_navigation( $url, $id ) {
		if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
			return $url;
		}

		$image = get_post( $id );
		if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
			$url .= '#main';
		}

		return $url;
	}
}

if ( ! function_exists( 'bekko_categorized_blog' ) ) {
	/**
	 * Determine whether blog/site has more than one category.
	 *
	 *
	 * @return bool True of there is more than one category, false otherwise.
	 */
	function bekko_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'bekko_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'bekko_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
			return false;
		}
	}
}

if ( ! function_exists( 'bekko_category_transient_flusher' ) ) {
	add_action( 'edit_category', 'bekko_category_transient_flusher' );
	add_action( 'save_post',     'bekko_category_transient_flusher' );
	/**
	 * Flush out the transients used in {@see bekko_categorized_blog()}.
	 *
	 */
	function bekko_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'bekko_categories' );
	}
}

if ( ! function_exists( 'bekko_get_default_color_palettes' ) ) {
	/**
	 * Set up our colors for the color picker palettes and filter them so you can change them.
	 *
	 */
	function bekko_get_default_color_palettes() {
		$palettes = array(
			'#000000',
			'#FFFFFF',
			'#F1C40F',
			'#E74C3C',
			'#1ABC9C',
			'#1e72bd',
			'#8E44AD',
			'#00CC77',
		);

		return apply_filters( 'bekko_default_color_palettes', $palettes );
	}
}

add_filter( 'bekko_fontawesome_essentials', 'bekko_set_font_awesome_essentials' );
/**
 * Check to see if we should include the full Font Awesome library or not.
 *
 *
 * @param bool $essentials
 * @return bool
 */
function bekko_set_font_awesome_essentials( $essentials ) {
	if ( bekko_get_setting( 'font_awesome_essentials' ) ) {
		return true;
	}

	return $essentials;
}