<?php
/**
 * theme Theme Customizer
 *
 * @package theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_section( 'header' , array(
        'title'      => __( 'Header Section', 'Costa' ),
        'priority'   => 10,
    ) );

    $wp_customize->add_setting( 'logo' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label'      => __( 'Upload a logo', 'theme_name' ),
                'section'    => 'header',
                'settings'   => 'logo'
            )
        )
    );
}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function theme_customize_preview_js() {
	wp_enqueue_script( 'theme_customizer', get_template_directory_uri() . '/assets/scripts/customizer.js', array( 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );
