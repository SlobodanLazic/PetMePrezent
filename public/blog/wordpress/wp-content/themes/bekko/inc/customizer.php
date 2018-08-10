<?php
/**
 * Builds our Customizer controls.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'customize_register', 'bekko_set_customizer_helpers', 1 );
/**
 * Set up helpers early so they're always available.
 * Other modules might need access to them at some point.
 *
 */
function bekko_set_customizer_helpers( $wp_customize ) {
	// Load helpers
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';
}

if ( ! function_exists( 'bekko_customize_register' ) ) {
	add_action( 'customize_register', 'bekko_customize_register' );
	/**
	 * Add our base options to the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function bekko_customize_register( $wp_customize ) {
		// Get our default values
		$defaults = bekko_get_defaults();

		// Load helpers
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';

		if ( $wp_customize->get_control( 'blogdescription' ) ) {
			$wp_customize->get_control('blogdescription')->priority = 3;
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'blogname' ) ) {
			$wp_customize->get_control('blogname')->priority = 1;
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'custom_logo' ) ) {
			$wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
		}

		// Add control types so controls can be built using JS
		if ( method_exists( $wp_customize, 'register_control_type' ) ) {
			$wp_customize->register_control_type( 'Bekko_Customize_Misc_Control' );
			$wp_customize->register_control_type( 'Bekko_Range_Slider_Control' );
		}

		// Add upsell section type
		if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'Bekko_Upsell_Section' );
		}

		// Add selective refresh to site title and description
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.main-title a',
				'render_callback' => 'bekko_customize_partial_blogname',
			) );

			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => 'bekko_customize_partial_blogdescription',
			) );
		}

		// Remove title
		$wp_customize->add_setting(
			'bekko_settings[hide_title]',
			array(
				'default' => $defaults['hide_title'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'bekko_settings[hide_title]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hide site title', 'bekko' ),
				'section' => 'title_tagline',
				'priority' => 2
			)
		);

		// Remove tagline
		$wp_customize->add_setting(
			'bekko_settings[hide_tagline]',
			array(
				'default' => $defaults['hide_tagline'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'bekko_settings[hide_tagline]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hide site tagline', 'bekko' ),
				'section' => 'title_tagline',
				'priority' => 4
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[retina_logo]',
			array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'bekko_settings[retina_logo]',
				array(
					'label' => __( 'Retina Logo', 'bekko' ),
					'section' => 'title_tagline',
					'settings' => 'bekko_settings[retina_logo]',
					'active_callback' => 'bekko_has_custom_logo_callback'
				)
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[text_color]', array(
				'default' => $defaults['text_color'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bekko_settings[text_color]',
				array(
					'label' => __( 'Text Color', 'bekko' ),
					'section' => 'colors',
					'settings' => 'bekko_settings[text_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[link_color]', array(
				'default' => $defaults['link_color'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bekko_settings[link_color]',
				array(
					'label' => __( 'Link Color', 'bekko' ),
					'section' => 'colors',
					'settings' => 'bekko_settings[link_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[link_color_hover]', array(
				'default' => $defaults['link_color_hover'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bekko_settings[link_color_hover]',
				array(
					'label' => __( 'Link Color Hover', 'bekko' ),
					'section' => 'colors',
					'settings' => 'bekko_settings[link_color_hover]'
				)
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[link_color_visited]', array(
				'default' => $defaults['link_color_visited'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bekko_settings[link_color_visited]',
				array(
					'label' => __( 'Link Color Visited', 'bekko' ),
					'section' => 'colors',
					'settings' => 'bekko_settings[link_color_visited]'
				)
			)
		);

		if ( ! function_exists( 'bekko_colors_customize_register' ) && ! defined( 'BEKKO_PREMIUM_VERSION' ) ) {
			$wp_customize->add_control(
				new Bekko_Customize_Misc_Control(
					$wp_customize,
					'colors_get_addon_desc',
					array(
						'section' => 'colors',
						'type' => 'addon',
						'label' => __( 'More info', 'bekko' ),
						'description' => __( 'More colors are available in Bekko premium version. Visit WPKoi for more info.', 'bekko' ),
						'url' => BEKKO_THEME_URL,
						'priority' => 30,
						'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
					)
				)
			);
		}

		if ( class_exists( 'WP_Customize_Panel' ) ) {
			if ( ! $wp_customize->get_panel( 'bekko_layout_panel' ) ) {
				$wp_customize->add_panel( 'bekko_layout_panel', array(
					'priority' => 25,
					'title' => __( 'Layout', 'bekko' ),
				) );
			}
		}

		// Add Layout section
		$wp_customize->add_section(
			'bekko_layout_container',
			array(
				'title' => __( 'Container', 'bekko' ),
				'priority' => 10,
				'panel' => 'bekko_layout_panel'
			)
		);

		// Container width
		$wp_customize->add_setting(
			'bekko_settings[container_width]',
			array(
				'default' => $defaults['container_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_integer',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new Bekko_Range_Slider_Control(
				$wp_customize,
				'bekko_settings[container_width]',
				array(
					'type' => 'bekko-range-slider',
					'label' => __( 'Container Width', 'bekko' ),
					'section' => 'bekko_layout_container',
					'settings' => array(
						'desktop' => 'bekko_settings[container_width]',
					),
					'choices' => array(
						'desktop' => array(
							'min' => 700,
							'max' => 2000,
							'step' => 5,
							'edit' => true,
							'unit' => 'px',
						),
					),
					'priority' => 0,
				)
			)
		);

		// Add Top Bar section
		$wp_customize->add_section(
			'bekko_top_bar',
			array(
				'title' => __( 'Top Bar', 'bekko' ),
				'priority' => 15,
				'panel' => 'bekko_layout_panel',
			)
		);

		// Add Top Bar width
		$wp_customize->add_setting(
			'bekko_settings[top_bar_width]',
			array(
				'default' => $defaults['top_bar_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Top Bar width control
		$wp_customize->add_control(
			'bekko_settings[top_bar_width]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Width', 'bekko' ),
				'section' => 'bekko_top_bar',
				'choices' => array(
					'full' => __( 'Full', 'bekko' ),
					'contained' => __( 'Contained', 'bekko' )
				),
				'settings' => 'bekko_settings[top_bar_width]',
				'priority' => 5,
				'active_callback' => 'bekko_is_top_bar_active',
			)
		);

		// Add Top Bar inner width
		$wp_customize->add_setting(
			'bekko_settings[top_bar_inner_width]',
			array(
				'default' => $defaults['top_bar_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Top Bar width control
		$wp_customize->add_control(
			'bekko_settings[top_bar_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Inner Width', 'bekko' ),
				'section' => 'bekko_top_bar',
				'choices' => array(
					'full' => __( 'Full', 'bekko' ),
					'contained' => __( 'Contained', 'bekko' )
				),
				'settings' => 'bekko_settings[top_bar_inner_width]',
				'priority' => 10,
				'active_callback' => 'bekko_is_top_bar_active',
			)
		);

		// Add top bar alignment
		$wp_customize->add_setting(
			'bekko_settings[top_bar_alignment]',
			array(
				'default' => $defaults['top_bar_alignment'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[top_bar_alignment]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Alignment', 'bekko' ),
				'section' => 'bekko_top_bar',
				'choices' => array(
					'left' => __( 'Left', 'bekko' ),
					'center' => __( 'Center', 'bekko' ),
					'right' => __( 'Right', 'bekko' )
				),
				'settings' => 'bekko_settings[top_bar_alignment]',
				'priority' => 15,
				'active_callback' => 'bekko_is_top_bar_active',
			)
		);

		// Add Header section
		$wp_customize->add_section(
			'bekko_layout_header',
			array(
				'title' => __( 'Header', 'bekko' ),
				'priority' => 20,
				'panel' => 'bekko_layout_panel'
			)
		);

		// Add Header Layout setting
		$wp_customize->add_setting(
			'bekko_settings[header_layout_setting]',
			array(
				'default' => $defaults['header_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Header Layout control
		$wp_customize->add_control(
			'bekko_settings[header_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Header Width', 'bekko' ),
				'section' => 'bekko_layout_header',
				'choices' => array(
					'fluid-header' => __( 'Full', 'bekko' ),
					'contained-header' => __( 'Contained', 'bekko' )
				),
				'settings' => 'bekko_settings[header_layout_setting]',
				'priority' => 5
			)
		);

		// Add Inside Header Layout setting
		$wp_customize->add_setting(
			'bekko_settings[header_inner_width]',
			array(
				'default' => $defaults['header_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Header Layout control
		$wp_customize->add_control(
			'bekko_settings[header_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Header Width', 'bekko' ),
				'section' => 'bekko_layout_header',
				'choices' => array(
					'contained' => __( 'Contained', 'bekko' ),
					'full-width' => __( 'Full', 'bekko' )
				),
				'settings' => 'bekko_settings[header_inner_width]',
				'priority' => 6
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[header_alignment_setting]',
			array(
				'default' => $defaults['header_alignment_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[header_alignment_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Header Alignment', 'bekko' ),
				'section' => 'bekko_layout_header',
				'choices' => array(
					'left' => __( 'Left', 'bekko' ),
					'center' => __( 'Center', 'bekko' ),
					'right' => __( 'Right', 'bekko' )
				),
				'settings' => 'bekko_settings[header_alignment_setting]',
				'priority' => 10
			)
		);

		$wp_customize->add_section(
			'bekko_layout_navigation',
			array(
				'title' => __( 'Primary Navigation', 'bekko' ),
				'priority' => 30,
				'panel' => 'bekko_layout_panel'
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_layout_setting]',
			array(
				'default' => $defaults['nav_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Width', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'fluid-nav' => __( 'Full', 'bekko' ),
					'contained-nav' => __( 'Contained', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_layout_setting]',
				'priority' => 15
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_inner_width]',
			array(
				'default' => $defaults['nav_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Navigation Width', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'contained' => __( 'Contained', 'bekko' ),
					'full-width' => __( 'Full', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_inner_width]',
				'priority' => 16
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_alignment_setting]',
			array(
				'default' => $defaults['nav_alignment_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_alignment_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Alignment', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'left' => __( 'Left', 'bekko' ),
					'center' => __( 'Center', 'bekko' ),
					'right' => __( 'Right', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_alignment_setting]',
				'priority' => 20
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_position_setting]',
			array(
				'default' => $defaults['nav_position_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => ( '' !== bekko_get_setting( 'nav_position_setting' ) ) ? 'postMessage' : 'refresh'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_position_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Location', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'nav-below-header' => __( 'Below Header', 'bekko' ),
					'nav-above-header' => __( 'Above Header', 'bekko' ),
					'nav-float-right' => __( 'Float Right', 'bekko' ),
					'nav-float-left' => __( 'Float Left', 'bekko' ),
					'nav-left-sidebar' => __( 'Left Sidebar', 'bekko' ),
					'nav-right-sidebar' => __( 'Right Sidebar', 'bekko' ),
					'' => __( 'No Navigation', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_position_setting]',
				'priority' => 22
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_dropdown_type]',
			array(
				'default' => $defaults['nav_dropdown_type'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_dropdown_type]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Dropdown', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'hover' => __( 'Hover', 'bekko' ),
					'click' => __( 'Click - Menu Item', 'bekko' ),
					'click-arrow' => __( 'Click - Arrow', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_dropdown_type]',
				'priority' => 22
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'bekko_settings[nav_search]',
			array(
				'default' => $defaults['nav_search'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'bekko_settings[nav_search]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Search', 'bekko' ),
				'section' => 'bekko_layout_navigation',
				'choices' => array(
					'enable' => __( 'Enable', 'bekko' ),
					'disable' => __( 'Disable', 'bekko' )
				),
				'settings' => 'bekko_settings[nav_search]',
				'priority' => 23
			)
		);

		// Add content setting
		$wp_customize->add_setting(
			'bekko_settings[content_layout_setting]',
			array(
				'default' => $defaults['content_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'bekko_settings[content_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Content Layout', 'bekko' ),
				'section' => 'bekko_layout_container',
				'choices' => array(
					'separate-containers' => __( 'Separate Containers', 'bekko' ),
					'one-container' => __( 'One Container', 'bekko' )
				),
				'settings' => 'bekko_settings[content_layout_setting]',
				'priority' => 25
			)
		);

		$wp_customize->add_section(
			'bekko_layout_sidebars',
			array(
				'title' => __( 'Sidebars', 'bekko' ),
				'priority' => 40,
				'panel' => 'bekko_layout_panel'
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'bekko_settings[layout_setting]',
			array(
				'default' => $defaults['layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'bekko_settings[layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Sidebar Layout', 'bekko' ),
				'section' => 'bekko_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'bekko' ),
					'right-sidebar' => __( 'Content / Sidebar', 'bekko' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'bekko' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'bekko' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'bekko' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'bekko' )
				),
				'settings' => 'bekko_settings[layout_setting]',
				'priority' => 30
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'bekko_settings[blog_layout_setting]',
			array(
				'default' => $defaults['blog_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'bekko_settings[blog_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Blog Sidebar Layout', 'bekko' ),
				'section' => 'bekko_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'bekko' ),
					'right-sidebar' => __( 'Content / Sidebar', 'bekko' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'bekko' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'bekko' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'bekko' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'bekko' )
				),
				'settings' => 'bekko_settings[blog_layout_setting]',
				'priority' => 35
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'bekko_settings[single_layout_setting]',
			array(
				'default' => $defaults['single_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'bekko_settings[single_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Single Post Sidebar Layout', 'bekko' ),
				'section' => 'bekko_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'bekko' ),
					'right-sidebar' => __( 'Content / Sidebar', 'bekko' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'bekko' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'bekko' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'bekko' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'bekko' )
				),
				'settings' => 'bekko_settings[single_layout_setting]',
				'priority' => 36
			)
		);

		$wp_customize->add_section(
			'bekko_layout_footer',
			array(
				'title' => __( 'Footer', 'bekko' ),
				'priority' => 50,
				'panel' => 'bekko_layout_panel'
			)
		);

		// Add footer setting
		$wp_customize->add_setting(
			'bekko_settings[footer_layout_setting]',
			array(
				'default' => $defaults['footer_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'bekko_settings[footer_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Width', 'bekko' ),
				'section' => 'bekko_layout_footer',
				'choices' => array(
					'fluid-footer' => __( 'Full', 'bekko' ),
					'contained-footer' => __( 'Contained', 'bekko' )
				),
				'settings' => 'bekko_settings[footer_layout_setting]',
				'priority' => 40
			)
		);

		// Add footer setting
		$wp_customize->add_setting(
			'bekko_settings[footer_inner_width]',
			array(
				'default' => $defaults['footer_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'bekko_settings[footer_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Footer Width', 'bekko' ),
				'section' => 'bekko_layout_footer',
				'choices' => array(
					'contained' => __( 'Contained', 'bekko' ),
					'full-width' => __( 'Full', 'bekko' )
				),
				'settings' => 'bekko_settings[footer_inner_width]',
				'priority' => 41
			)
		);

		// Add footer widget setting
		$wp_customize->add_setting(
			'bekko_settings[footer_widget_setting]',
			array(
				'default' => $defaults['footer_widget_setting'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add footer widget control
		$wp_customize->add_control(
			'bekko_settings[footer_widget_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Widgets', 'bekko' ),
				'section' => 'bekko_layout_footer',
				'choices' => array(
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				),
				'settings' => 'bekko_settings[footer_widget_setting]',
				'priority' => 45
			)
		);

		// Copyright
		$wp_customize->add_setting(
			'bekko_settings[footer_copyright]',
			array(
				'default' => $defaults['footer_copyright'],
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'bekko_settings[footer_copyright]',
			array(
				'type' 		 => 'textarea',
				'label'      => __( 'Copyright', 'bekko' ),
				'section'    => 'bekko_layout_footer',
				'settings'   => 'bekko_settings[footer_copyright]',
				'priority' => 50,
			)
		);

		// Add footer widget setting
		$wp_customize->add_setting(
			'bekko_settings[footer_bar_alignment]',
			array(
				'default' => $defaults['footer_bar_alignment'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add footer widget control
		$wp_customize->add_control(
			'bekko_settings[footer_bar_alignment]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Bar Alignment', 'bekko' ),
				'section' => 'bekko_layout_footer',
				'choices' => array(
					'left' => __( 'Left','bekko' ),
					'center' => __( 'Center','bekko' ),
					'right' => __( 'Right','bekko' )
				),
				'settings' => 'bekko_settings[footer_bar_alignment]',
				'priority' => 47,
				'active_callback' => 'bekko_is_footer_bar_active'
			)
		);

		// Add back to top setting
		$wp_customize->add_setting(
			'bekko_settings[back_to_top]',
			array(
				'default' => $defaults['back_to_top'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_choices'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'bekko_settings[back_to_top]',
			array(
				'type' => 'select',
				'label' => __( 'Back to Top Button', 'bekko' ),
				'section' => 'bekko_layout_footer',
				'choices' => array(
					'enable' => __( 'Enable', 'bekko' ),
					'' => __( 'Disable', 'bekko' )
				),
				'settings' => 'bekko_settings[back_to_top]',
				'priority' => 50
			)
		);

		// Add Layout section
		$wp_customize->add_section(
			'bekko_blog_section',
			array(
				'title' => __( 'Blog', 'bekko' ),
				'priority' => 55,
				'panel' => 'bekko_layout_panel'
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[blog_header_image]',
			array(
				'default' => $defaults['blog_header_image'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'bekko_settings[blog_header_image]',
				array(
					'label' => __( 'Blog Header Image', 'bekko' ),
					'section' => 'bekko_blog_section',
					'settings' => 'bekko_settings[blog_header_image]',
				)
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'bekko_settings[post_content]',
			array(
				'default' => $defaults['post_content'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_blog_excerpt'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'blog_content_control',
			array(
				'type' => 'select',
				'label' => __( 'Content Type', 'bekko' ),
				'section' => 'bekko_blog_section',
				'choices' => array(
					'full' => __( 'Full', 'bekko' ),
					'excerpt' => __( 'Excerpt', 'bekko' )
				),
				'settings' => 'bekko_settings[post_content]',
				'priority' => 10
			)
		);

		if ( ! function_exists( 'bekko_blog_customize_register' ) && ! defined( 'BEKKO_PREMIUM_VERSION' ) ) {
			$wp_customize->add_control(
				new Bekko_Customize_Misc_Control(
					$wp_customize,
					'blog_get_addon_desc',
					array(
						'section' => 'bekko_blog_section',
						'type' => 'addon',
						'label' => __( 'Learn more', 'bekko' ),
						'description' => __( 'More options are available for this section in our premium version.', 'bekko' ),
						'url' => BEKKO_THEME_URL,
						'priority' => 30,
						'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
					)
				)
			);
		}

		// Add Performance section
		$wp_customize->add_section(
			'bekko_general_section',
			array(
				'title' => __( 'General', 'bekko' ),
				'priority' => 99
			)
		);

		if ( ! apply_filters( 'bekko_fontawesome_essentials', false ) ) {
			$wp_customize->add_setting(
				'bekko_settings[font_awesome_essentials]',
				array(
					'default' => $defaults['font_awesome_essentials'],
					'type' => 'option',
					'sanitize_callback' => 'bekko_sanitize_checkbox'
				)
			);

			$wp_customize->add_control(
				'bekko_settings[font_awesome_essentials]',
				array(
					'type' => 'checkbox',
					'label' => __( 'Load essential icons only', 'bekko' ),
					'description' => __( 'Load essential Font Awesome icons instead of the full library.', 'bekko' ),
					'section' => 'bekko_general_section',
					'settings' => 'bekko_settings[font_awesome_essentials]',
				)
			);
		}

		// Add heder section
		$wp_customize->add_section(
			'bekko_header_section',
			array(
				'title' => __( 'Header', 'bekko' ),
				'priority' => 100
			)
		);

		$wp_customize->add_setting(
			'bekko_settings[header_date]',
			array(
				'default' => $defaults['header_date'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'bekko_settings[header_date]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Display date', 'bekko' ),
				'description' => __( 'Check if You want to display the time in the header.', 'bekko' ),
				'section' => 'bekko_header_section',
			)
		);
		$wp_customize->add_setting(
			'bekko_settings[header_date_format]',
			array(
				'default' => $defaults['header_date_format'],
				'type' => 'option',
				'sanitize_callback' => 'bekko_sanitize_date_format'
			)
		);

		$wp_customize->add_control(
			'bekko_settings[header_date_format]',
			array(
				'type' => 'select',
				'label' => __( 'Date Format', 'bekko' ),
				'section' => 'bekko_header_section',
				'choices' => array(
					'M d, Y' => __( 'Dec 31, 1999', 'bekko' ),
					'Y M d' => __( '1999 Dec 31', 'bekko' ),
					'Y.m.d.' => __( '1999.12.31.', 'bekko' ),
					'd F Y' => __( '12 December 1999', 'bekko' ),
					'd/m/Y' => __( '31/12/1999', 'bekko' )
				),
			)
		);
	}
}

if ( ! function_exists( 'bekko_customizer_live_preview' ) ) {
	add_action( 'customize_preview_init', 'bekko_customizer_live_preview', 100 );
	/**
	 * Add our live preview scripts
	 *
	 */
	function bekko_customizer_live_preview() {
		wp_enqueue_script( 'bekko-themecustomizer', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/js/customizer-live-preview.js', array( 'customize-preview' ), BEKKO_VERSION, true );
	}
}
