<?php
/**
 * Insert new css
 */
function writing_gem_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array( $parent_style ),
      wp_get_theme()->get('Version')
      );
  }
  add_action( 'wp_enqueue_scripts', 'writing_gem_enqueue_styles' );


/**
 * New Custom Header  
 */
require_once( get_stylesheet_directory() . '/inc/custom-header.php' );


/**
 * Hide Creative Gem theme page  
 */
function writing_gem_cg_themepage_removal() {
  remove_action('admin_menu', 'creative_gem_subpage_sidebar');
}
add_action('wp_loaded', 'writing_gem_cg_themepage_removal', 99);



/**
 * Hide Creative Gem widgets  
 */
function writing_gem_cg_widgets_removal(){
  unregister_sidebar( 'top-widget-first' );
  unregister_sidebar( 'top-widget-second' );
  unregister_sidebar( 'top-widget-third' );
}
add_action( 'widgets_init', 'writing_gem_cg_widgets_removal', 99 );


/**
 * Hide Creative Gem customizer sections
 */
function writing_gem_remove_custom($wp_customize) {
 $wp_customize->remove_section('creative_gem');
 $wp_customize->remove_control('header_left_button_text');
 $wp_customize->remove_control('header_left_button_link');
 $wp_customize->remove_control('header_left_button_bg');
 $wp_customize->remove_control('header_left_button_text_color');
 $wp_customize->remove_control('header_right_button_text');
 $wp_customize->remove_control('header_right_button_link');
 $wp_customize->remove_control('header_right_button_bg');
 $wp_customize->remove_control('header_right_button_text_color');
}
add_action( 'customize_register', 'writing_gem_remove_custom', 9999999 );



function writing_gem_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'top_header_background_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_background_color', array(
        'label'       => __( 'Header Background Colors', 'creative-gem' ),
        'description' => __( 'Applied to header background.', 'creative-gem' ),
        'section'     => 'header_image',
        'priority'   => 10,
        'settings'    => 'top_header_background_color',
        ) ) );
}
add_action( 'customize_register', 'writing_gem_customize_register', 99999999 );





if(! function_exists('writing_gem_color_output' ) ):
  function writing_gem_color_output(){

    ?>
    <style type="text/css">
        #site-header { background-color: <?php echo esc_attr(get_theme_mod( 'top_header_background_color')); ?> !important; }

    </style>
    <?php }
    add_action( 'wp_head', 'writing_gem_color_output', 999 );
    endif;




/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */
require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/upgrade/class-customize.php' );


/**
 * Writing Gem Links Page
 */
add_action( 'admin_menu', 'writing_gem_subpage_sidebar' );
function writing_gem_subpage_sidebar() {
  add_theme_page( __('Writing Gem Links', 'writing-gem'), __('Writing Gem Links', 'writing-gem'), 'edit_theme_options', 'writing_gem-subpage.php', 'writing_gem_subpage_contents');
}

function writing_gem_subpage_contents(){ ?>


<div class="wrap">
  <div class="welcome-panel">
    <div class="welcome-panel-content">
      <h1><strong><?php echo __('Get Started With Writing Gem', 'writing-gem') ?></strong>

      </h1>
      <p class="about-description"><?php echo __('Here is some links to help you get going with the theme!', 'writing-gem') ?></p>
      <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
          <h3><?php echo __('Helpdesk and Feedback', 'writing-gem') ?></h3>
          <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('http://businessclassthemes.com/contact/') ?>"><?php echo __('Theme Help And Feedback', 'writing-gem') ?></a>
        </div>
        <div class="welcome-panel-column">
          <h3><?php echo __('Writing Gem Pro', 'writing-gem') ?></h3>
          <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('http://businessclassthemes.com/writing-gem/') ?>"><?php echo __('View Pro Features', 'writing-gem') ?></a>
        </div>
        <div class="welcome-panel-column">
          <h3><?php echo __('Writing Gem Demo', 'writing-gem') ?></h3>
          <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('http://businessclassthemes.com/themes/writing-gem/') ?>"><?php echo __('View Demo', 'writing-gem') ?></a>
        </div>
      </div>

      <p>&nbsp;</p>

      <p class="hide-if-no-customize">
        <?php echo __('In case you did not find what you were looking for, you can visit our website', 'writing-gem') ?>
        <a href="<?php echo esc_url('http://businessclassthemes.com/writing-gem/') ?>" target="_blank"><?php echo __('here.', 'writing-gem') ?></a></p>
      </div>

    </div>
  </div>
  <?php }


