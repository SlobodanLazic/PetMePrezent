<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class G_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
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
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/inc/upgrade/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'G_Blog_cstmz_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new G_Blog_cstmz_Section_Pro(
				$manager,
				'g-blog',
				array(
					'title'    => esc_html__( 'Premium Verison', 'g-blog' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'g-blog' ),
					'pro_url'  => 'https://greenturtlelab.com/downloads/g-blog/',
					'priority' => 0
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
		require_once get_template_directory() . '/inc/upgrade/section-pro.php';


		wp_enqueue_script( 'gblog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'gblog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/upgrade/customize-controls.css' );
	}
}

// Doing this customizer thang!
G_Blog_Customize::get_instance();


if ( ! class_exists( 'G_Blog_cstmz_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

class G_Blog_cstmz_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About G Blog', 'g-blog')?></h2>
			<p><?php esc_html_e('G Blog is simple, clean and elegant WordPress Theme for your blog site.', 'g-blog')?> </p>
			<p>
				<a href="<?php echo esc_url('https://demo.greenturtlelab.com/g-blog/'); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'g-blog' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'g-blog')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'g-blog')?> </p>
			<p>
				<a href="<?php echo esc_url('https://docs.greenturtlelab.com/g-blog/'); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'g-blog' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'g-blog')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'g-blog')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://greenturtlelab.com/support/'); ?>" target="_blank"><?php esc_html_e( 'Theme Support', 'g-blog' ); ?></a>
			</p>
			
			</div>
			
		<?php
	}

}
}
