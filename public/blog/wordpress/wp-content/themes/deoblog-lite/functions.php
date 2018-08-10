<?php
/**
 * Deoblog functions and definitions
 *
 * @package Deoblog lite
 */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
  $content_width = 1170; /* pixels */
}


if ( ! function_exists( 'deoblog_lite_setup_theme' ) ) :
// Sets up theme defaults and registers support for various WordPress features.
function deoblog_lite_setup_theme() {

  load_theme_textdomain( 'deoblog-lite', get_template_directory() . '/languages' );

  // Enable theme support
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'gallery', 'quote', 'link', ) );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'custom-background', apply_filters( 'deo_custom_background_args', array(
    'default-color' => 'f4f6f7',
    'default-image' => '',
  ) ) );
  add_theme_support( "custom-header" );
  add_editor_style();

  // Set size of thumbnails
  update_option( 'thumbnail_size_w', 70 );
  update_option( 'thumbnail_size_h', 56 );
  update_option( 'thumbnail_crop', 1 );

  update_option( 'large_size_w', 750 );
  update_option( 'large_size_h', 400 );
  update_option( 'large_crop', 1 );


  // Nav menus
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'deoblog-lite' ),
  ) );

}
endif; // deo_setup_theme
add_action( 'after_setup_theme', 'deoblog_lite_setup_theme' );


// Register widget areas
function deoblog_lite_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'deoblog-lite' ),
    'id'            => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Column 1', 'deoblog-lite' ),
    'id'            => 'footer-col-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Column 2', 'deoblog-lite' ),
    'id'            => 'footer-col-2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Column 3', 'deoblog-lite' ),
    'id'            => 'footer-col-3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Column 4', 'deoblog-lite' ),
    'id'            => 'footer-col-4',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'deoblog_lite_widgets_init' );


// Change Excerpt length
if ( ! is_admin() ) {
  function deoblog_lite_custom_excerpt_length( $length ) {
    $excerpt_length = get_theme_mod( 'deoblog_lite_posts_excerpt_settings', 55 );
    return $excerpt_length;
  }
  add_filter( 'excerpt_length', 'deoblog_lite_custom_excerpt_length', 999 );
}

// TGMPA plugins activation
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'deoblog_lite_tgmpa_register_required_plugins' );

function deoblog_lite_tgmpa_register_required_plugins() {

  $plugins = array(

    array(
      'name'      => 'Kirki',
      'slug'      => 'kirki',
      'required'  => true,
    ),

    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => false,
    ),

    array(
      'name'      => 'MailChimp for WordPress',
      'slug'      => 'mailchimp-for-wp',
      'required'  => false,
    ),

  );

  $config = array(
    'id'           => 'tgmpa',
    'default_path' => '',
    'menu'         => 'tgmpa-install-plugins',
    'capability'   => 'edit_theme_options',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic' => true,
    'message'      => '',

    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'deoblog-lite' ),
      'menu_title'                      => __( 'Install Plugins', 'deoblog-lite' ),
      'installing'                      => __( 'Installing Plugin: %s', 'deoblog-lite' ),
      'updating'                        => __( 'Updating Plugin: %s', 'deoblog-lite' ),
      'oops'                            => __( 'Something went wrong with the plugin API.', 'deoblog-lite' ),
      'return'                          => __( 'Return to Required Plugins Installer', 'deoblog-lite' ),
      'plugin_activated'                => __( 'Plugin activated successfully.', 'deoblog-lite' ),
      'activated_successfully'          => __( 'The following plugin was activated successfully:', 'deoblog-lite' ),
      'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'deoblog-lite' ),
      'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'deoblog-lite' ),
      'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'deoblog-lite' ),
      'dismiss'                         => __( 'Dismiss this notice', 'deoblog-lite' ),
      'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'deoblog-lite' ),
      'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'deoblog-lite' ),
      'nag_type'                        => 'updated',
    ),

  );

  tgmpa( $plugins, $config );
}




// Includes
require get_template_directory() . '/inc/functions-template.php';
require get_template_directory() . '/inc/class-nav-walker.php';
require get_template_directory() . '/inc/class-comments-walker.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';


// Theme scripts and styles
function deoblog_lite_theme_styles() {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'deo_font_icons', get_template_directory_uri() . '/css/font-icons.css' );
  wp_enqueue_style( 'deo_styles', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_style( 'deo_google_fonts', 'https://fonts.googleapis.com/css?family=Rubik:300,400,700%7COpen+Sans:400,400i,700' );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'deoblog_lite_theme_styles' );

function deoblog_lite_theme_js() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
  wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/easing.js', array('jquery'), '1.3', true );
  wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.7.1', true );
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '3.4.0', true );
  wp_enqueue_script( 'masonry' );
  wp_enqueue_script( 'deo_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'deoblog_lite_theme_js' );