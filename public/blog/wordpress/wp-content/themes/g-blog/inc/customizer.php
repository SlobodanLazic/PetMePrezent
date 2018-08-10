<?php
/**
 * Theme Customizer.
 *
 * @package G_Blog
 */


/**
 * Sanitizing the select callback example
 *
 * @since  1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('g_blog_sanitize_select') ) :
    function g_blog_sanitize_select( $input, $setting ) 
   {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;


/**
 * Sanitize checkbox field
 *
 * @since  1.0.0
 *
 * @param $checked
 * @return Boolean
 */
if ( !function_exists('g_blog_sanitize_checkbox') ) :
    function g_blog_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
endif;
/**
 * Sanitize RGBA color field
 *
 * @since  1.0.0
 *
 * @param $checked
 * @return Boolean
 */
function g_blog_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}

/**
 * Sidebar layout options
 *
 * @since  1.0.0
 *
 * @param null
 * @return array $g_blog_sidebar_layout
 *
 */
if ( !function_exists('g_blog_sidebar_layout') ) :
    function g_blog_sidebar_layout()
    {
        $g_blog_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'g-blog'),
            'left-sidebar'  => __( 'Left Sidebar' , 'g-blog'),
            'no-sidebar'    => __( 'No Sidebar', 'g-blog')
        );
        return apply_filters( 'g_blog_sidebar_layout', $g_blog_sidebar_layout );
    }
endif;




/**
 *  Default Theme options
 *
 * @since  1.0.0
 *
 * @param null
 * @return array $g_blog_theme_layout
 *
 */
if ( !function_exists('g_blog_default_theme_options') ) :
    function g_blog_default_theme_options() 
   {

        $default_theme_options = array(
            /*feature section options*/
            'g-blog-feature-cat'             => 0,
            'g-blog-promo-cat'               => 0,
            'g-blog-footer-copyright'        => esc_html__( 'Copyright 2017, All rights reserved.', 'g-blog'),
            'g-blog-layout'                  => 'right-sidebar',   
            'breadcrumb_option'             => 'enable',
            'g-blog-realted-post'            => 0,
            'g-blog-realted-post-title'      => esc_html__( 'Related Posts', 'g-blog' ),
            'hide-breadcrumb-at-home'       => 1 ,
            'primary_color'                 => '#222222',
            'slider_caption_bg_color'       => 'rgba(249,244,242,0.64)',
            'hide-slider-post-at-category'  => 1,


        ); 

        return apply_filters( 'g_blog_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since  1.0.0
 *
 * @param null
 * @return array g_blog_theme_options
 *
 */
if ( !function_exists('g_blog_get_theme_options') ) :
    function g_blog_get_theme_options()
    {

        $g_blog_default_theme_options = g_blog_default_theme_options();
        

        $g_blog_get_theme_options = get_theme_mod( 'g_blog_theme_options');
        
        if( is_array( $g_blog_get_theme_options )){
          
            return array_merge( $g_blog_default_theme_options, $g_blog_get_theme_options );
        }

        else{

            return $g_blog_default_theme_options;
        }

    }
endif;

    /**
     * Load Update to Pro section
     */
     require get_template_directory() . '/inc/upgrade/class-customize.php';



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function g_blog_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


     $wp_customize->add_section( 'theme_detail', array(
            'title'    => __( 'About Theme', 'g-blog' ),
            'priority' => 9
        ) );
    
        
        $wp_customize->add_setting( 'upgrade_text', array(
            'default' => '',
            'sanitize_callback' => '__return_false'
        ) );
        
        $wp_customize->add_control( new G_Blog_cstmz_Static_Text_Control( $wp_customize, 'upgrade_text', array(
            'section'     => 'theme_detail',
            'label'       => __( 'Upgrade to PRO', 'g-blog' ),
            'description' => array('')
        ) ) );


	/*defaults options*/
    $defaults = g_blog_get_theme_options();

    
       
    
       
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer/custom-controls.php';

    /**
     * Load customizer feature section
     */
    require get_template_directory() . '/inc/customizer/theme-options.php';

}
add_action( 'customize_register', 'g_blog_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function g_blog_customize_preview_js() 
{
	wp_enqueue_script( 'g_blog_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'g_blog_customize_preview_js' );





