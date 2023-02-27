<?php
/**
 * The 1 Darkside Theme Customizer
 *
 * @package The_1_Darkside
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the1_darkside_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'the1_darkside_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'the1_darkside_customize_partial_blogdescription',
			)
		);
	}

	// Header Banner Section
	$wp_customize -> add_section(
		'header_cta_slider',
		array (
			'title'							=> __('Header CTA Slider'),
			'description'				=> __(''),
			'priority'					=> 10,
			//'active_callback'		=> function() { return is_page_template('page-templates/blog-template.php');}
		)
	);

	// Add Header Banner Title One Setting
	$wp_customize -> add_setting ( 'title_one', array(
		'default'							=> __('Slider Title &#35;1'),
		'type'								=> 'theme_mod',
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'						=> 'postMessage',
	));
	// Add Header Banner Title One Control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'title_one', array (
				'label'				=> __( 'Slider Title &#35;1', 'the1-darkside' ),
				'section'			=> 'header_cta_slider',
				'settings'		=> 'title_one',
				'type'				=> 'text',
				'description'	=> __('Add CTA'),
				'priority' 		=> 10,
			)
		)
	);







}
add_action( 'customize_register', 'the1_darkside_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the1_darkside_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the1_darkside_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the1_darkside_customize_preview_js() {
	wp_enqueue_script( 'the1-darkside-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'the1_darkside_customize_preview_js' );
