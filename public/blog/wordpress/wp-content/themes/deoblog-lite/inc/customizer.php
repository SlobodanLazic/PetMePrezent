<?php
/**
 * Deoblog Theme Customizer
 *
 * @package Deoblog lite
 */


function deoblog_lite_customize_register( $wp_customize ) {

  // Customize Background Settings
  $wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'deoblog-lite');  
  $wp_customize->get_control('background_color')->section = 'background_image';


  // Custom Logo
  $wp_customize->add_section( 'deoblog_lite_custom_logo', array(
    'title'       => esc_html__('Add Logo', 'deoblog-lite' ),
    'panel'       => 'design_settings',
    'priority'    => 20,
    'description' => esc_html__('Upload your custom logo', 'deoblog-lite')
  ) );

  $wp_customize->add_setting( 'deoblog_lite_logo', array(
    'default'   => get_template_directory_uri() . '/img/logo_light.png',
    array(
      'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    )
  ) );

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'deoblog_lite_custom_logo',
      array(
        'label'     => esc_html__( 'Upload logo', 'deoblog-lite' ),
        'section'   => 'title_tagline',
        'settings'  => 'deoblog_lite_logo',
        'context'   => 'deoblog_lite_custom_logo'
      )
    )
  );


  // Footer Copyright
  $wp_customize->add_setting( 'deoblog_lite_footer_bottom_text', array(
    'capability' => 'edit_theme_options',
    'default' => sprintf(esc_html__( ' DeoBlog, made by %1$sDeoThemes%2$s' , 'deoblog-lite' ),
    '<a href="https://deothemes.com">',
    '</a>'),
    'sanitize_callback' => 'deoblog_lite_sanitize_html',
   ) );

  $wp_customize->add_control( 'deoblog_lite_footer_bottom_text', array(
    'type'        => 'text',
    'section'     => 'deoblog_lite_footer',
    'label'       => esc_html__( 'Footer bottom text', 'deoblog-lite' ),
    'description' => esc_html__( 'You can use HTML: a, span, i, em, strong', 'deoblog-lite' ),
    'priority'    => 30,
  ) );

  // Remove Custom Header Section
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'deoblog_lite_customize_register' );

// Check if Kirki is installed
if ( class_exists( 'Kirki' ) ) {

  // Selector Vars 
  $selector = array(
    'main_color'      => '
        a,
        a:focus,
        blockquote > span,
        .entry-title a:hover,
        .entry-meta li a:hover,
        .widget_categories li a:hover,
        .entry-tags a:hover,
        .comment-edit-link,
        .widget ul li a:hover,
        .entry-navigation a:hover,
        .recent-posts-title a:hover
    ',
    'main_background_color' => '
        .nav-icon-toggle:focus .nav-icon-toggle-bar,
        .nav-icon-toggle:hover .nav-icon-toggle-bar,
        #back-to-top:hover,
        .pagination-link > a:hover,
        .widget_tag_cloud a:hover,
        .btn-transparent:hover,
        .btn-white:hover,
        .btn-stroke:hover,
        .btn-color,
        .btn-light:hover,
        .social-icons a:hover,
        .btn-button.btn-color,
        .footer.bg-dark .widget_tag_cloud a:hover,
        .footer.bg-dark .social-icons a:hover,
        .mc4wp-form-fields input[type=submit],
        .hero__entry__category
    ',
    'main_border_color' => '
        input:focus,
        textarea:focus
    ',
    'headings_color'  => 'h1,h2,h3,h4,h5,h6',
    'text_color'  => 'body, p,',
    'meta_color'  => '.entry-meta li',
    'headings'        => 'h1,h2,h3,h4,h5,h6',  
    'h1'              => 'h1',
    'h2'              => 'h2',
    'h3'              => 'h3',
    'h4'              => 'h4',
    'h5'              => 'h5',
    'h6'              => 'h6',
    'text'            => '.entry-content p, .entry-article p',
  );


  // Kirki
  Kirki::add_config( 'deoblog_lite_config', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
    'option_name'   => 'deoblog_lite_config',
  ) );


  /**
  * SECTIONS
  **/

  // Posts
  Kirki::add_section( 'deoblog_lite_posts', array(
    'title'          => esc_html__( 'Posts', 'deoblog-lite' ),
    'description'    => esc_html__( 'Posts options', 'deoblog-lite' ),
    'priority'       => 21,
    'capability'     => 'edit_theme_options',
  ) );

  Kirki::add_section( 'deoblog_lite_colors', array(
    'title'          => esc_html__( 'Colors', 'deoblog-lite' ),
    'description'    => esc_html__( 'Change colors settings', 'deoblog-lite'  ),
    'priority'       => 22,
    'capability'     => 'edit_theme_options',
  ) );

  Kirki::add_section( 'deoblog_lite_socials', array(
    'title'          => esc_html__( 'Socials', 'deoblog-lite' ),
    'description'    => esc_html__( 'Socials options. Paste your social profile links here', 'deoblog-lite'  ),
    'priority'       => 24,
    'capability'     => 'edit_theme_options',
  ) );

  Kirki::add_section( 'deoblog_lite_navigation', array(
    'title'          => esc_html__( 'Navigation', 'deoblog-lite' ),
    'description'    => esc_html__( 'Navigation options', 'deoblog-lite' ),
    'priority'       => 26,
    'capability'     => 'edit_theme_options',
  ) );

  Kirki::add_section( 'deoblog_lite_footer', array(
    'title'          => esc_html__( 'Footer', 'deoblog-lite' ),
    'description'    => esc_html__( 'Footer options', 'deoblog-lite' ),
    'priority'       => 27,
    'capability'     => 'edit_theme_options',
  ) );


  /**
  * CONTROLS
  **/

  // Posts Excerpt control
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'number',
    'settings'    => 'deoblog_lite_posts_excerpt_settings',
    'label'       => esc_html__( 'Posts excerpt options', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_posts',
    'default'     => 55,
    'priority'    => 10,
    'choices'     => array(
      'min'  => 0,
      'max'  => 9999,
      'step' => 1,
    ),
  ) );


  // Socials controls
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_facebook',
    'label'       => esc_html__( 'Facebook', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_twitter',
    'label'       => esc_html__( 'Twitter', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'description' => esc_html__( 'Add your twitter username without @ symbol', 'deoblog-lite' ),
    'default'     => esc_url( '' ),
    'priority'    => 10,
    'sanitize_callback' => 'deoblog_lite_sanitize_twitter_handler'
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_google_plus',
    'label'       => esc_html__( 'Google +', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_linkedin',
    'label'       => esc_html__( 'Linkedin', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_dribbble',
    'label'       => esc_html__( 'Dribbble', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_tumblr',
    'label'       => esc_html__( 'Tumblr', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_reddit',
    'label'       => esc_html__( 'Reddit', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_behance',
    'label'       => esc_html__( 'Behance', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_pinterst',
    'label'       => esc_html__( 'Pinterest', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_instagram',
    'label'       => esc_html__( 'Instagram', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_vkontakte',
    'label'       => esc_html__( 'Vkontakte', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_slack',
    'label'       => esc_html__( 'Slack', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_github',
    'label'       => esc_html__( 'Github', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_flickr',
    'label'       => esc_html__( 'Flickr', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_youtube',
    'label'       => esc_html__( 'Youtube', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_xing',
    'label'       => esc_html__( 'Xing', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );

  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'text',
    'settings'    => 'deoblog_lite_socials_settings_vimeo',
    'label'       => esc_html__( 'Vimeo', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_socials',
    'default'     => esc_url( '' ),
    'priority'    => 10,
  ) );


  // Footer widgets control
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'select',
    'settings'    => 'deoblog_lite_footer_widgets_settings',
    'label'       => esc_html__( 'How many widgets to show', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_footer',
    'default'     => 'four_col',
    'priority'    => 10,
    'choices'     => array(
      'one_col'    => esc_attr__( 'One Column', 'deoblog-lite' ),
      'two_col'    => esc_attr__( 'Two Columns', 'deoblog-lite' ),
      'three_col'  => esc_attr__( 'Three Columns', 'deoblog-lite' ),
      'four_col'   => esc_attr__( 'Four Columns', 'deoblog-lite' ),
    ),
  ) );

  // Back to top control
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'checkbox',
    'settings'    => 'deoblog_lite_back_to_top_settings',
    'label'       => esc_html__( 'Back to top arrow', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_footer',
    'default'     => 1,
    'priority'    => 20,
  ) );


  // Sticky nav control
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'checkbox',
    'settings'    => 'deoblog_lite_sticky_nav_settings',
    'label'       => esc_html__( 'Sticky Navbar', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_navigation',
    'default'     => 1,
    'priority'    => 20,
  ) );


  // Main color control
  Kirki::add_field( 'deoblog_lite_config', array(
    'type'        => 'color',
    'settings'    => 'deoblog_lite_color_settings',
    'label'       => esc_html__( 'Main color of theme', 'deoblog-lite' ),
    'section'     => 'deoblog_lite_colors',
    'default'     => '#2eb84c',
    'priority'    => 10,
    'output' => array(
      array(
        'element'  => $selector['main_color'],
        'property' => 'color',
      ),
      array(
        'element' => $selector['main_background_color'],
        'property' => 'background-color',
      ),
      array(
        'element' => $selector['main_border_color'],
        'property' => 'border-color',
      ),
    ),
  ) );

} // endif Kirki check


//Sanitization settings
function deoblog_lite_sanitize_twitter_handler( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@', '', $output);
  return $output;
}


// Sanitize text 
function deoblog_lite_sanitize_text( $text ) {    
  return sanitize_text_field( $text );
}

function deoblog_lite_sanitize_html( $input ) {
  return wp_kses( $input, array(
    'a' => array(
      'href' => array(),
      'target' => array(),
    ),
    'i' => array(),
    'span' => array(),
    'em' => array(),
    'strong' => array(),
) );
};