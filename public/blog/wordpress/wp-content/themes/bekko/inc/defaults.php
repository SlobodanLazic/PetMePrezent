<?php
/**
 * Sets all of our theme defaults.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'bekko_get_defaults' ) ) {
	/**
	 * Set default options
	 *
	 */
	function bekko_get_defaults() {
		$bekko_defaults = array(
			'hide_title' => '',
			'hide_tagline' => true,
			'top_bar_width' => 'full',
			'top_bar_inner_width' => 'contained',
			'top_bar_alignment' => 'left',
			'container_width' => '1170',
			'header_layout_setting' => 'fluid-header',
			'header_inner_width' => 'contained',
			'nav_alignment_setting' => 'right',
			'header_alignment_setting' => 'left',
			'nav_layout_setting' => 'fluid-nav',
			'nav_inner_width' => 'contained',
			'nav_position_setting' => 'nav-float-right',
			'nav_dropdown_type' => 'hover',
			'nav_search' => 'enable',
			'content_layout_setting' => 'one-container',
			'layout_setting' => 'right-sidebar',
			'blog_layout_setting' => 'right-sidebar',
			'single_layout_setting' => 'right-sidebar',
			'blog_header_image' => '',
			'post_content' => 'excerpt',
			'footer_layout_setting' => 'fluid-footer',
			'footer_inner_width' => 'contained',
			'footer_widget_setting' => '3',
			'footer_copyright' => __( '&copy; 2018 All rights reserved.', 'bekko' ),
			'footer_bar_alignment' => 'right',
			'back_to_top' => 'enable',
			'text_color' => '#7a7a7a',
			'link_color' => '#f74e30',
			'link_color_hover' => '#303030',
			'link_color_visited' => '',
			'font_awesome_essentials' => true,
			'header_date' => false,
			'header_date_format' => 'M d, Y'
		);

		return apply_filters( 'bekko_option_defaults', $bekko_defaults );
	}
}

if ( ! function_exists( 'bekko_get_color_defaults' ) ) {
	/**
	 * Set default options
	 */
	function bekko_get_color_defaults() {
		$bekko_color_defaults = array(
			'top_bar_background_color' => '#0f0f0f',
			'top_bar_text_color' => '#c7c7c7',
			'top_bar_link_color' => '#c7c7c7',
			'top_bar_link_color_hover' => '#7a7a7a',
			'header_background_color' => '#f74e30',
			'header_text_color' => '#ffffff',
			'header_link_color' => '#0f0f0f',
			'header_link_hover_color' => '',
			'site_title_color' => '#ffffff',
			'site_tagline_color' => '#eaeaea',
			'navigation_background_color' => '#f74e30',
			'navigation_text_color' => '#ffffff',
			'navigation_background_hover_color' => '#0f0f0f',
			'navigation_text_hover_color' => '#ffffff',
			'navigation_background_current_color' => 'rgba(255,255,255,0)',
			'navigation_text_current_color' => '#ffffff',
			'subnavigation_background_color' => '#0f0f0f',
			'subnavigation_text_color' => '#ffffff',
			'subnavigation_background_hover_color' => '#505050',
			'subnavigation_text_hover_color' => '#ffffff',
			'subnavigation_background_current_color' => '#505050',
			'subnavigation_text_current_color' => '#ffffff',
			'content_background_color' => '#ffffff',
			'content_text_color' => '',
			'content_link_color' => '',
			'content_link_hover_color' => '',
			'content_title_color' => '',
			'blog_post_title_color' => '',
			'blog_post_title_hover_color' => '',
			'entry_meta_text_color' => '',
			'entry_meta_link_color' => '#f74e30',
			'entry_meta_link_color_hover' => '#0f0f0f',
			'h1_color' => '',
			'h2_color' => '',
			'h3_color' => '',
			'h4_color' => '',
			'h5_color' => '',
			'h6_color' => '',
			'sidebar_widget_background_color' => '#ffffff',
			'sidebar_widget_text_color' => '',
			'sidebar_widget_link_color' => '',
			'sidebar_widget_link_hover_color' => '',
			'sidebar_widget_title_color' => '#0f0f0f',
			'footer_widget_background_color' => '#f74e30',
			'footer_widget_text_color' => '#ffffff',
			'footer_widget_link_color' => '#ffffff',
			'footer_widget_link_hover_color' => '#eaeaea',
			'footer_widget_title_color' => '#ffffff',
			'footer_background_color' => '#0f0f0f',
			'footer_text_color' => '#c7c7c7',
			'footer_link_color' => '#c7c7c7',
			'footer_link_hover_color' => '#7a7a7a',
			'form_background_color' => '#fafafa',
			'form_text_color' => '#555555',
			'form_background_color_focus' => '#ffffff',
			'form_text_color_focus' => '#555555',
			'form_border_color' => '#cccccc',
			'form_border_color_focus' => '#bfbfbf',
			'form_button_background_color' => '#555555',
			'form_button_background_color_hover' => '#3f3f3f',
			'form_button_text_color' => '#ffffff',
			'form_button_text_color_hover' => '#ffffff',
			'back_to_top_background_color' => 'rgba(15,15,15,0.5)',
			'back_to_top_background_color_hover' => '#0f0f0f',
			'back_to_top_text_color' => '#ffffff',
			'back_to_top_text_color_hover' => '#ffffff',
		);

		return apply_filters( 'bekko_color_option_defaults', $bekko_color_defaults );
	}
}

if ( ! function_exists( 'bekko_get_default_fonts' ) ) {
	/**
	 * Set default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function bekko_get_default_fonts( $filter = true ) {
		$bekko_font_defaults = array(
			'font_body' => 'Merriweather',
			'font_body_category' => 'serif',
			'font_body_variants' => '300,300italic,regular,italic,700,700italic,900,900italic',
			'body_font_weight' => '300',
			'body_font_transform' => 'none',
			'body_font_size' => '15',
			'body_line_height' => '1.5', // no unit
			'paragraph_margin' => '1.5', // em
			'font_top_bar' => 'inherit',
			'font_top_bar_category' => '',
			'font_top_bar_variants' => '',
			'top_bar_font_weight' => 'normal',
			'top_bar_font_transform' => 'none',
			'top_bar_font_size' => '13',
			'font_site_title' => 'Open Sans Condensed',
			'font_site_title_category' => 'serif',
			'font_site_title_variants' => '300,300italic,700',
			'site_title_font_weight' => '700',
			'site_title_font_transform' => 'uppercase',
			'site_title_font_size' => '50',
			'mobile_site_title_font_size' => '30',
			'font_site_tagline' => 'Open Sans',
			'font_site_tagline_category' => 'sans-serif',
			'font_site_tagline_variants' => 'regular',
			'site_tagline_font_weight' => 'normal',
			'site_tagline_font_transform' => 'none',
			'site_tagline_font_size' => '16',
			'font_navigation' => 'Merriweather',
			'font_navigation_category' => 'serif',
			'font_navigation_variants' => '300,300italic,regular,italic,700,700italic,900,900italic',
			'navigation_font_weight' => '500',
			'navigation_font_transform' => 'uppercase',
			'navigation_font_size' => '15',
			'font_widget_title' => 'inherit',
			'font_widget_title_category' => '',
			'font_widget_title_variants' => '',
			'widget_title_font_weight' => 'normal',
			'widget_title_font_transform' => 'none',
			'widget_title_font_size' => '20',
			'widget_title_separator' => '30',
			'widget_content_font_size' => '17',
			'font_buttons' => 'inherit',
			'font_buttons_category' => '',
			'font_buttons_variants' => '',
			'buttons_font_weight' => 'normal',
			'buttons_font_transform' => 'none',
			'buttons_font_size' => '',
			'font_heading_1' => 'Josefin Sans',
			'font_heading_1_category' => 'serif',
			'font_heading_1_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_1_weight' => 'normal',
			'heading_1_transform' => 'none',
			'heading_1_font_size' => '55',
			'heading_1_line_height' => '1.2', // em
			'mobile_heading_1_font_size' => '30',
			'font_heading_2' => 'Josefin Sans',
			'font_heading_2_category' => 'serif',
			'font_heading_2_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_2_weight' => 'normal',
			'heading_2_transform' => 'none',
			'heading_2_font_size' => '40',
			'heading_2_line_height' => '1.2', // em
			'mobile_heading_2_font_size' => '25',
			'font_heading_3' => 'Josefin Sans',
			'font_heading_3_category' => 'serif',
			'font_heading_3_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_3_weight' => '300',
			'heading_3_transform' => 'none',
			'heading_3_font_size' => '30',
			'heading_3_line_height' => '1.2', // em
			'font_heading_4' => 'Josefin Sans',
			'font_heading_4_category' => 'serif',
			'font_heading_4_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_4_weight' => 'normal',
			'heading_4_transform' => 'none',
			'heading_4_font_size' => '',
			'heading_4_line_height' => '', // em
			'font_heading_5' => 'Josefin Sans',
			'font_heading_5_category' => 'serif',
			'font_heading_5_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_5_weight' => 'normal',
			'heading_5_transform' => 'none',
			'heading_5_font_size' => '',
			'heading_5_line_height' => '', // em
			'font_heading_6' => 'Josefin Sans',
			'font_heading_6_category' => 'serif',
			'font_heading_6_variants' => '100,100italic,300,300italic,regular,italic,600,600italic,700,700italic',
			'heading_6_weight' => 'normal',
			'heading_6_transform' => 'none',
			'heading_6_font_size' => '',
			'heading_6_line_height' => '', // em
			'font_footer' => 'Merriweather',
			'font_footer_category' => 'serif',
			'font_footer_variants' => '300,300italic,regular,italic,700,700italic,900,900italic',
			'footer_weight' => 'normal',
			'footer_transform' => 'none',
			'footer_font_size' => '15',
		);

		if ( $filter ) {
			return apply_filters( 'bekko_font_option_defaults', $bekko_font_defaults );
		}

		return $bekko_font_defaults;
	}
}

if ( ! function_exists( 'bekko_spacing_get_defaults' ) ) {
	/**
	 * Set the default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function bekko_spacing_get_defaults( $filter = true ) {
		$bekko_spacing_defaults = array(
			'top_bar_top' => '10',
			'top_bar_right' => '10',
			'top_bar_bottom' => '10',
			'top_bar_left' => '10',
			'header_top' => '15',
			'header_right' => '5',
			'header_bottom' => '15',
			'header_left' => '5',
			'menu_item' => '16',
			'menu_item_height' => '55',
			'sub_menu_item_height' => '10',
			'content_top' => '40',
			'content_right' => '40',
			'content_bottom' => '40',
			'content_left' => '40',
			'mobile_content_top' => '30',
			'mobile_content_right' => '30',
			'mobile_content_bottom' => '30',
			'mobile_content_left' => '30',
			'separator' => '15',
			'left_sidebar_width' => '25',
			'right_sidebar_width' => '25',
			'widget_top' => '30',
			'widget_right' => '30',
			'widget_bottom' => '30',
			'widget_left' => '30',
			'footer_widget_container_top' => '30',
			'footer_widget_container_right' => '30',
			'footer_widget_container_bottom' => '30',
			'footer_widget_container_left' => '30',
			'footer_widget_separator' => '30',
			'footer_top' => '20',
			'footer_right' => '20',
			'footer_bottom' => '20',
			'footer_left' => '20',
		);

		if ( $filter ) {
			return apply_filters( 'bekko_spacing_option_defaults', $bekko_spacing_defaults );
		}

		return $bekko_spacing_defaults;
	}
}

if ( ! function_exists( 'bekko_typography_default_fonts' ) ) {
	/**
	 * Set the default system fonts.
	 *
	 */
	function bekko_typography_default_fonts() {
		$fonts = array(
			'inherit',
			'System Stack',
			'Arial, Helvetica, sans-serif',
			'Comic Sans MS',
			'Courier New',
			'Georgia, Times New Roman, Times, serif',
			'Helvetica',
			'Impact',
			'Josefin Sans',
			'Merriweather',
			'Open Sans',
			'Open Sans Condensed',
			'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
			'Tahoma, Geneva, sans-serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif'
		);

		return apply_filters( 'bekko_typography_default_fonts', $fonts );
	}
}
