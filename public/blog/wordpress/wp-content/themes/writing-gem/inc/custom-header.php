<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package creative Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses writing_gem_header_style()
 */
function writing_gem_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 155,
		'height'      => 44,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
		) );
	add_theme_support( 'custom-header', array(
    'default-image' => get_stylesheet_directory_uri() . '/images/writing_gem_top-bg.png',
		'default-text-color'	=> 'fff',
		'width'					=> 1400,
		'height'				=> 500,
		'flex-width'			=> true,
		'flex-height'			=> true,
		'wp-head-callback'		=> 'writing_gem_header_style',
		) );
	register_default_headers( array(
		'header-bg' => array(
			'url'           => get_stylesheet_directory_uri() . '/images/writing_gem_top-bg.png',
			'thumbnail_url' => get_stylesheet_directory_uri() . '/images/writing_gem_top-bg.png',
			'description'   => _x( 'Default', 'Default header image', 'creative-gem' )
			),	
		) );

}
add_action( 'after_setup_theme', 'writing_gem_custom_header_setup', 99999 );

if ( ! function_exists( 'writing_gem_header_style' ) ) :

function writing_gem_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

	if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
		return;
	}


	?>
	<style type="text/css">
		#site-header {
			background-image: url(<?php header_image(); ?>);
		    background-size: cover;
		}

	<?php if ( ! display_header_text() ) : ?>
	.site-title,
	.site-description {
		position: absolute;
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php else : ?>
	.site-branding .site-title,
	.site-branding .site-description {
		color: #<?php echo esc_attr( $header_text_color ); ?>;
	}
	.site-branding .site-title:after {
		background: #<?php echo esc_attr( $header_text_color ); ?>;
	}
	<?php endif; ?>
	</style>
	<?php
}
endif;
 