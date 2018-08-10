<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'g_blog_theme_options', 
    	array(
        		'priority'       => 25,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => esc_html__( 'Theme Option', 'g-blog' ),
             ) 
);


   /*adding sections for Breadcrumbs for pages/posts*/
$wp_customize->add_section( 'breadcrumb_type',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Breadcrumb', 'g-blog' ),
        'panel'          => 'g_blog_theme_options',
      

      ) );

/* breadcrumb_option*/
$wp_customize->add_setting( 'g_blog_theme_options[breadcrumb_option]',
 array(
            'capability'        => 'edit_theme_options',
            'default'           => $defaults['breadcrumb_option'],
            'sanitize_callback' => 'g_blog_sanitize_select'
      ) );

$wp_customize->add_control('g_blog_theme_options[breadcrumb_option]',
    array(
        'label' => esc_html__('Breadcrumb Options', 'g-blog'),
         'section'   => 'breadcrumb_type',
        'settings'  => 'g_blog_theme_options[breadcrumb_option]',
        'choices'   => array(
        'disable'    => esc_html__('Disable', 'g-blog'),
        'enable'     => esc_html__('Enable', 'g-blog'),
        
          ),
        'type' => 'select',
        'priority' => 10
    )
);


    /*adding sections for category section in front page*/
$wp_customize->add_section( 'g-blog-feature-category',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Banner Slider', 'g-blog' ),
        'panel'          => 'g_blog_theme_options',
        'description'    => __( 'Recommended image for slider is 1920*700', 'g-blog' )

      ) );

/* feature cat selection */
$wp_customize->add_setting( 'g_blog_theme_options[g-blog-feature-cat]',
 array(
            'capability'		=> 'edit_theme_options',
            'default'			=> $defaults['g-blog-feature-cat'],
            'sanitize_callback' => 'absint'
      ) );

$wp_customize->add_control(
    new G_Blog_cstmz_Category_Dropdown_Control(
        $wp_customize,
        'g_blog_theme_options[g-blog-feature-cat]',
        array(
                'label'		=> __( 'Select Category', 'g-blog' ),
                'section'   => 'g-blog-feature-category',
                'settings'  => 'g_blog_theme_options[g-blog-feature-cat]',
                'type'	  	=> 'category_dropdown',
                'priority'  => 10
             )
    )
);



/*adding sections for category selection for promo section in homepage*/
$wp_customize        -> add_section( 'g-blog-site-layout',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'panel'          => 'g_blog_theme_options',
        'title'          => __( 'Sidebar Layout', 'g-blog' )
      ) );

/* Sidebar selection */
$wp_customize          -> add_setting( 'g_blog_theme_options[g-blog-layout]',
 array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['g-blog-layout'],
        'sanitize_callback' => 'g_blog_sanitize_select'
      ) );

$choices                = g_blog_sidebar_layout();
$wp_customize           -> add_control('g_blog_theme_options[g-blog-layout]',
            array(
                    'choices'   => $choices,
                    'label'		=> __( 'Select Sidebar', 'g-blog'),
                    'section'   => 'g-blog-site-layout',
                    'settings'  => 'g_blog_theme_options[g-blog-layout]',
                    'type'	  	=> 'select',
                    'priority'  => 10
                 )
    );


/*adding sections for footer options*/
    $wp_customize        -> add_section( 'g-blog-footer-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'g_blog_theme_options',
                'title'          => __( 'Footer Copyright', 'g-blog' )
             ) );

    /*copyright*/
    $wp_customize           -> add_setting( 'g_blog_theme_options[g-blog-footer-copyright]',
      array(
                'capability'        => 'edit_theme_options',
                'default'           => $defaults['g-blog-footer-copyright'],
                'sanitize_callback' => 'wp_kses_post'
            ) );
    $wp_customize   -> 
    add_control( 'g-blog-footer-copyright',
     array(
            'label'     => __( 'Copyright Text', 'g-blog' ),
            'section'   => 'g-blog-footer-option',
            'settings'  => 'g_blog_theme_options[g-blog-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
          ) );


