<?php
/**
 * Functions and hooks
 *
 * @package Henge
 */


function henge_scripts() {
	wp_enqueue_style( 'architectonic-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'henge-style',get_stylesheet_directory_uri() . '/style.css',array( 'architectonic-style', 'slick-theme' ) );
}
add_action( 'wp_enqueue_scripts', 'henge_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function henge_body_classes( $classes ) {

	$classes[] = 'second-design';

	return $classes;
}
add_filter( 'body_class', 'henge_body_classes' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function henge_customize_register( $wp_customize ) {

	// topbar phone setting and control
	$wp_customize->add_setting( 'slider_btn_label', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> esc_html__( 'Learn More', 'henge' ),
	) );

	$wp_customize->add_control( 'slider_btn_label', array(
		'label'           	=> esc_html__( 'Slider Btn Label', 'henge' ),
		'section'        	=> 'architectonic_slider_section',
		'priority'			=> 100,
		'active_callback' 	=> 'architectonic_is_slider_section_enable',
		'type'				=> 'text',
	) );

}
add_action( 'customize_register', 'henge_customize_register' );


if ( ! function_exists( 'architectonic_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since henge 1.0.0
   *
   */
   function architectonic_render_slider_section( $content_details = array() ) {
   		$btn_label = get_theme_mod( 'slider_btn_label', esc_html__( 'Learn More', 'henge' ) );
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="main-slider" class="relative">
            <div class="wrapper">
                <div class="main-slider-wrapper" data-effect="cubic-bezier(0.680, 0, 0.265, 1)" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": true, "fade": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="slick-item" data-title="<?php echo esc_attr( $content['title'] ); ?>" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="slider-content">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php echo esc_html( $content['excerpt'] ); ?>
                            </div><!-- .entry-content -->

                            <?php if ( ! empty( $btn_label ) ) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_label ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .slider-content -->
                    </article><!-- .slick-item -->
                <?php endforeach; ?>
                </div><!-- .main-slider-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #main-slider -->
        
    <?php }
endif;

add_action( 'init', 'architectonic_render_slider_section', 100 );