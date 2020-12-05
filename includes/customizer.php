<?php
/**
 * Gianko Age Verification Customizer Options.
 *
 * @package    Gianko_Age_Verification
 * @since      1.1.0
 */

/**
 * Registers options with the Theme Customizer
 *
 * @param      object $wp_customize The WordPress Theme Customizer.
 */
function gc_register_theme_customizer( $wp_customize ) {
	/**
	 * Defining our own 'Display Options' section
	 */
	$wp_customize->add_section(
		'gc_display_options',
		array(
			'title'    => __( 'Age Verification by gianko.com', 'gianko-age-verification' ),
			'priority' => 55,
		)
	);

	/* minAge */
	$wp_customize->add_setting(
		'gc_minAge',
		array(
			'default'           => '18',
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_minAge',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Minimum age?', 'gianko-age-verification' ),
			'type'     => 'number',
			'priority' => 7,
		)
	);

	/* Add setting for background image uploader. */
	$wp_customize->add_setting( 'gc_bgImage' );

	/* Add control for background image uploader (actual uploader) */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'gc_bgImage',
			array(
				'label'    => __( 'Background image', 'gianko-age-verification' ),
				'section'  => 'gc_display_options',
				'settings' => 'gc_bgImage',
				'priority' => 8
			)
		)
	);

	/* Add setting for logo uploader. */
	$wp_customize->add_setting( 'gc_logo' );

	/* Add control for logo uploader (actual uploader) */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'gc_logo',
			array(
				'label'    => __( 'Logo image', 'gianko-age-verification' ),
				'section'  => 'gc_display_options',
				'settings' => 'gc_logo',
				'priority' => 9
			)
		)
	);

	/* title */
	$wp_customize->add_setting(
		'gc_title',
		array(
			'default'           => __( 'Age Verification', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_title',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Title', 'gianko-age-verification' ),
			'type'     => 'text',
			'priority' => 10,
		)
	);

	/* copy */
	$wp_customize->add_setting(
		'gc_copy',
		array(
			'default'           => __( 'You must be [age] years old to enter.', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_copy',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Copy', 'gianko-age-verification' ),
			'type'     => 'textarea',
			'priority' => 11,
		)
	);

	/* Yes button */
	$wp_customize->add_setting(
		'gc_button_yes',
		array(
			'default'           => __( 'YES', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_button_yes',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Button #1 text', 'gianko-age-verification' ),
			'type'     => 'text',
			'priority' => 12,
		)
	);

	/* No button */
	$wp_customize->add_setting(
		'gc_button_no',
		array(
			'default'           => __( 'NO', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_button_no',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Button #2 text', 'gianko-age-verification' ),
			'type'     => 'text',
			'priority' => 13,
		)
	);
	/* successTitle */
	$wp_customize->add_setting(
		'gc_successTitle',
		array(
			'default'           => __( 'Success!', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_successTitle',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Success Title', 'gianko-age-verification' ),
			'type'     => 'text',
			'priority' => 14,
		)
	);
	/* successText */
	$wp_customize->add_setting(
			'gc_successText',
			array(
				'default'           => __( 'Success Text', 'gianko-age-verification' ),
				'sanitize_callback' => 'gc_sanitize_input',
				'transport'         => 'refresh',
			)
	);
	$wp_customize->add_control(
			'gc_successText',
			array(
				'section'  => 'gc_display_options',
				'label'    => __( 'Success Text', 'gianko-age-verification' ),
				'type'     => 'textarea',
				'priority' => 15,
			)
	);
	/* failTitle */
	$wp_customize->add_setting(
		'gc_failTitle',
		array(
			'default'           => __( 'Fail Title', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
			'gc_failTitle',
			array(
				'section'  => 'gc_display_options',
				'label'    => __( 'Fail Title', 'gianko-age-verification' ),
				'type'     => 'text',
				'priority' => 16,
			)
	);
	/* failText */
	$wp_customize->add_setting(
		'gc_failText',
		array(
			'default'           => __( 'Fail Text', 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
			'gc_failText',
			array(
				'section'  => 'gc_display_options',
				'label'    => __( 'Fail Text', 'gianko-age-verification' ),
				'type'     => 'textarea',
				'priority' => 17,
			)
	);
	/* cookieDays */
	$wp_customize->add_setting(
		'gc_cookieDays',
		array(
			'default'           => __( 20, 'gianko-age-verification' ),
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
			'gc_cookieDays',
			array(
				'section'  => 'gc_display_options',
				'label'    => __( 'Days to save Cookies', 'gianko-age-verification' ),
				'type'     => 'number',
				'priority' => 18,
			)
	);	
	/* Show or Hide Blog Description */
	$wp_customize->add_setting(
		'gc_adminHide',
		array(
			'default'           => '',
			'sanitize_callback' => 'gc_sanitize_input',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'gc_adminHide',
		array(
			'section'  => 'gc_display_options',
			'label'    => __( 'Hide for admin users?', 'gianko-age-verification' ),
			'type'     => 'checkbox',
			'priority' => 99,
		)
	);

} // end gc_register_theme_customizer
add_action( 'customize_register', 'gc_register_theme_customizer' );

/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string $input    The string to sanitize.
 * @return     string              The sanitized string
 * @package    dav
 * @since      0.5.0
 * @version    1.0.2
 */
function gc_sanitize_input( $input ) {
	return strip_tags( stripslashes( $input ) );
}
