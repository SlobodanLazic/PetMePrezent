<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Writing_gem_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/upgrade/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Writing_gem_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Writing_gem_Customize_Section_Pro(
				$manager,
				'writing_gem',
				array(
					'title'    => esc_html__( 'Writing Gem Pro', 'writing-gem' ),
					'pro_text' => esc_html__( 'View Pro Features', 'writing-gem' ),
					'pro_url'  => 'http://businessclassthemes.com/writing-gem/'
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'writing-gem-customize-controls', trailingslashit( get_stylesheet_directory_uri() ) . '/inc/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'writing-gem-customize-controls', trailingslashit( get_stylesheet_directory_uri() ) . '/inc/upgrade/customize-controls.css' );
	}
}

// Doing this customizer thang!
Writing_gem_Customize::get_instance();
