<?php
/**
 * myhome Theme Customizer
 *
 * @package myhome
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function myhome_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'myhome_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'myhome_customize_partial_blogdescription',
		) );
	}

	//custom settings
	$wp_customize->add_section( 'custom_settings' , array(
		'title'      => __( 'Contacts & video', 'myhome' ),
		'priority'   => 30,
	) );
	$wp_customize->add_setting( 'header_textcolor' , array(
		'default'   => '#999999',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => __( 'Set menu text colour ', 'myhome' ),
		'section'    => 'custom_settings',
		'settings'   => 'header_textcolor',
	) ) );
	//text fields
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('myhome_theme_options[text_tel]', array(
        'default'        => '+421 2/5249 5955',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_test', array(
        'label'      => __('Phone number', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[text_tel]',
	));

	$wp_customize->add_setting('myhome_theme_options[text_adress]', array(
        'default'        => 'Mytna 23/A, 811 07, Bratislava',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_adress', array(
        'label'      => __('Adress', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[text_adress]',
    ));

	$wp_customize->add_setting('myhome_theme_options[text_mail]', array(
        'default'        => 'reservations@my-home.sk',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_mail', array(
        'label'      => __('E-mail', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[text_mail]',
	));

	$wp_customize->add_setting('myhome_theme_options[text_fb]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_fb', array(
        'label'      => __('Facebook link', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[text_fb]',
	));
	
	$wp_customize->add_setting('myhome_theme_options[text_li]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_li', array(
        'label'      => __('Linkedin link', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[text_li]',
	));

    $wp_customize->add_setting('myhome_theme_options[video]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('myhome_text_video', array(
        'label'      => __('Video link', 'myhome'),
        'section'    => 'custom_settings',
        'settings'   => 'myhome_theme_options[video]',
    ));
    
   
 
}
add_action( 'customize_register', 'myhome_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function myhome_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function myhome_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function myhome_customize_preview_js() {
	wp_enqueue_script( 'myhome-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'myhome_customize_preview_js' );


//custom settings
function myhome_customize_css()
{
    ?>
         <style type="text/css">
             .menu li a { color: #<?php echo get_theme_mod('header_textcolor', '999999'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'myhome_customize_css');