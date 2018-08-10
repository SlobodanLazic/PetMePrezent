<?php
/**
 * Vision Lite Theme Customizer
 *
 * @package Vision Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vision_lite_customize_register( $wp_customize ) {
	
function vision_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#ff8800',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','vision-lite'),
			'description'	=> __('Select color from here.','vision-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'vision-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will be visible only when you select static front page.','vision-lite'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','vision-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','vision-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','vision-lite'),
			'section'	=> 'slider_section'
	));	
	
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'vision_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','vision-lite'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	// Homepage Section Start		
	$wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('What We Do Section', 'vision-lite'),
            'priority' => null,
			'description'	=> __('Select pages for What We Do section. What We Do section will be visible only when you select static front page and uncheck the below checkbox.','vision-lite'),	
        )
    );
	
	$wp_customize->add_setting('section_title',array(
			'default' => 'What We Do',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section_title',array(
			'type'	=> 'text',
			'label'	=> __('Add section title','vision-lite'),
			'section'	=> 'homepage_section'
	));	
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for first box:','vision-lite'),
			'section'	=> 'homepage_section'
	));	
	
	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for second box:','vision-lite'),
			'section'	=> 'homepage_section'
	));	
	
	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page third box:','vision-lite'),
			'section'	=> 'homepage_section'
	));	
	
	$wp_customize->add_setting('hide_boxes',array(
			'default' => true,
			'sanitize_callback' => 'vision_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_boxes', array(
		   'settings' => 'hide_boxes',
    	   'section'   => 'homepage_section',
    	   'label'     => __('Check this to hide this section','vision-lite'),
    	   'type'      => 'checkbox'
     ));
	 
// Contact Section

$wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Donate Button Link', 'vision-lite'),
            'priority' => null,
			'description'	=> __('Add link for donate button.','vision-lite'),	
        )
    );
	
	$wp_customize->add_setting('donate_link',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('donate_link',array(
			'type'	=> 'text',
			'label'	=> __('Add donate button link here.','vision-lite'),
			'section'	=> 'contact_section'
	));		
	
}
	
	
add_action( 'customize_register', 'vision_lite_customize_register' );	

function vision_lite_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title {
					color:<?php echo esc_html("#0485a9"); ?>;
				}4";
				.main-nav ul li a:hover,
				.sitenav ul li a:hover, 
				.sitenav ul li.current_page_item a, 
				.sitenav ul li:hover a.parent,
				.sitenav ul li ul.sub-menu li a:hover, 
				.sitenav ul li.current_page_item ul.sub-menu li a:hover, 
				.sitenav ul li ul.sub-menu li.current_page_item a,
				a.morebutton{
					color:<?php echo esc_html("#5dd8b4"); ?>;
				}4";
				.header-top,
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				.header .header-inner .nav ul li:hover > ul,
			    a.read-more,
				.sitenav ul li:hover > ul{
					background-color:<?php echo esc_html(get_theme_mod('#fff')); ?>;
				}
				h2.section-title{
					border-bottom:2px solid <?php echo esc_html(get_theme_mod); ?>;
				}
				.bride-inner h2, .groom-inner h2{
					border-bottom:1px solid <?php echo esc_html(get_theme_mod('color_scheme','#ff8800')); ?>;
				}
				.sitenav ul li:hover > ul,
				a.morebutton{
					border-color:<?php echo esc_html(get_theme_mod('#fff')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','vision_lite_css');

function vision_lite_customize_preview_js() {
	wp_enqueue_script( 'vision-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'vision_lite_customize_preview_js' );