<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'bekko_create_menu' ) ) {
	add_action( 'admin_menu', 'bekko_create_menu' );
	/**
	 * Adds our "Bekko" dashboard menu item
	 *
	 */
	function bekko_create_menu() {
		$bekko_page = add_theme_page( 'Bekko', 'Bekko', apply_filters( 'bekko_dashboard_page_capability', 'edit_theme_options' ), 'bekko-options', 'bekko_settings_page' );
		add_action( "admin_print_styles-$bekko_page", 'bekko_options_styles' );
	}
}

if ( ! function_exists( 'bekko_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Bekko dashboard page
	 *
	 */
	function bekko_options_styles() {
		wp_enqueue_style( 'bekko-options', get_template_directory_uri() . '/css/admin/style.css', array(), BEKKO_VERSION );
	}
}

if ( ! function_exists( 'bekko_settings_page' ) ) {
	/**
	 * Builds the content of our Bekko dashboard page
	 *
	 */
	function bekko_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="bekko-masthead clearfix">
					<div class="bekko-container">
						<div class="bekko-title">
							<a href="<?php echo esc_url(BEKKO_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Bekko', 'bekko' ); ?></a> <span class="bekko-version"><?php echo BEKKO_VERSION; ?></span>
						</div>
						<div class="bekko-masthead-links">
							<?php if ( ! defined( 'BEKKO_PREMIUM_VERSION' ) ) : ?>
								<a class="bekko-masthead-links-bold" href="<?php echo esc_url(BEKKO_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'bekko' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(BEKKO_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'bekko' ); ?></a>
                            <a href="<?php echo esc_url(BEKKO_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'bekko' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * bekko_dashboard_after_header hook.
				 *
				 */
				 do_action( 'bekko_dashboard_after_header' );
				 ?>

				<div class="bekko-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * bekko_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'bekko_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'bekko-settings-group' ); ?>
									<?php do_settings_sections( 'bekko-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="bekko_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'bekko' )
										);
										?>
									</div>

									<?php
									/**
									 * bekko_inside_options_form hook.
									 *
									 */
									 do_action( 'bekko_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Blog' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Colors' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Demo Import' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Hooks' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Import / Export' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Page Header' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Sections' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Spacing' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Typography' => array(
											'url' => BEKKO_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => BEKKO_THEME_URL,
									)
								);

								if ( ! defined( 'BEKKO_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox bekko-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'bekko' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated bekko-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'Learn more', 'bekko' ); ?></a>
													</div>
												</div>
												<div class="bekko-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * bekko_options_items hook.
								 *
								 */
								do_action( 'bekko_options_items' );
								?>
							</div>

							<div class="bekko-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="bekko_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'bekko' )
									);
									?>
								</div>

								<?php
								/**
								 * bekko_admin_right_panel hook.
								 *
								 */
								 do_action( 'bekko_admin_right_panel' );

								  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'bekko_admin_errors' ) ) {
	add_action( 'admin_notices', 'bekko_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function bekko_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_bekko-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'bekko-notices', 'true', esc_html__( 'Settings saved.', 'bekko' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'bekko-notices', 'imported', esc_html__( 'Import successful.', 'bekko' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'bekko-notices', 'reset', esc_html__( 'Settings removed.', 'bekko' ), 'updated' );
		}

		settings_errors( 'bekko-notices' );
	}
}
