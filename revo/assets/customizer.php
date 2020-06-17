<?php

/**
 * Adds sections and settings to customizer
 *
 * @param $wp_customize
 */

function revo_true_customizer_init( $wp_customize ) {
	//Panels
	$wp_customize->add_panel( 'panel_blog', array(
		'title'       => esc_html__( 'blog settings', 'revo' ),
		'description' => esc_html__( 'Settings of the Blog', 'revo' ),
	) );


	/*******************************************************************
	 * Main page settings
	 *******************************************************************/

	$tmp_sectionname = "revo";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'    => esc_html__( 'Location sidebar', 'revo' ),
		'priority' => 30,
		'panel'    => 'panel_blog'
	) );
	$tmp_tabel       = 'sidebar_position';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => 's2',
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Location sidebar', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'radio',
		'choices'  => array(
			's1' => esc_html__( 'Sidebar Left', 'revo' ),
			's2' => esc_html__( 'Sidebar Right', 'revo' ),
		)
	) );


	/*******************************************************************
	 * sidebar categories and search
	 *******************************************************************/


	$tmp_tabel       = 'sidebar_cat_position';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => 'c2',
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Location sidebar in categories and search page', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'radio',
		'choices'  => array(
			'c1' => esc_html__( 'Sidebar Left', 'revo' ),
			'c2' => esc_html__( 'Sidebar Right', 'revo' ),
			'c3' => esc_html__( 'Sidebar none', 'revo' ),
		)
	) );


	/*----------------------------------------------------------------
	 * Blog list sitting
	 -----------------------------------------------------------------*/
	$tmp_sectionname = "revo_blog_list";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'    => esc_html__( 'Blog list', 'revo' ),
		'priority' => 30,
		'panel'    => 'panel_blog'
	) );

	$tmp_tabel       = 'text';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Continue reading', 'revo' ),
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Button text Continue reading', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	$tmp_tabel       = 'limit_word';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => 40,
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Limit word in post blog list', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );


	/*******************************************************************
	 * mailchimp
	 *******************************************************************/
	$tmp_sectionname = "revo_mailchimp";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Mailchimp / Subscribe ', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( 'Specify api key and ID list', 'revo' )
	) );

	$tmp_settingname = $tmp_sectionname . 'api_key';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( ' API key', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_id_list';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( ' ID list', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );


	/*---------------------------------------------------Fonts----------------------*/
	$tmp_sectionname = "fonts";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Fonts', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( 'Enter the url font google and font name', 'revo' )
	) );

	$tmp_settingname = $tmp_sectionname . '_url';

	/*
	 * 1
	 */
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( '1) url google fonts', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html( 'default fonts Roboto' ),
		'type'        => 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_name';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( '1) name google fonts', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*
	 * 2
	 */
	$tmp_settingname = $tmp_sectionname . '_url_2';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( '2) url google fonts', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( 'default fonts Dancing+Script', 'revo' ),
		'type'        => 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_name_2';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( '2) name google fonts', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*******************************************************************
	 * Sotial networks
	 *******************************************************************/
	$tmp_sectionname = "sotial_networks";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Social networks', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( 'Enter url desired social networks so that they appear on the site', 'revo' )
	) );

	/*short*/

	$tmp_settingname = $tmp_sectionname . '_control_social_shortcode';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( ' Insert Social shortcode or another ', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'description' => esc_html__( 'its show in footer example shortcode [revo_social_links url="https://pinterest.com/" class="fa fa-pinterest"]', 'revo' ),
		'settings'    => $tmp_settingname,
		'type'        => 'textarea'
	) );

	/*Google */


	$tmp_settingname = $tmp_sectionname . '_control_google';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Google + url', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*facebook*/
	$tmp_settingname = $tmp_sectionname . '_control_facebook';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Facebook  url', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*twitter*/
	$tmp_settingname = $tmp_sectionname . '_control_twitter';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Twitter url', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*youtube*/
	$tmp_settingname = $tmp_sectionname . '_control_youtube';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'youtube url', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );

	/*pinterest*/
	$tmp_settingname = $tmp_sectionname . '_control_pinterest';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'pinterest url', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );


	/*******************************************************************
	 * mailchimp
	 *******************************************************************/
	$tmp_sectionname = "mail";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Setting email', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( '', 'revo' )
	) );
	$tmp_settingname = $tmp_sectionname . '_email';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => "",
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( '_control', array(
		'label'       => esc_html__( 'enter email', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( 'can specify  one email', 'revo' ),
		'type'        => 'text'
	) );


	/*******************************************************************
	 * logo
	 *******************************************************************/

	$wp_customize->add_section( 'themeslug_logo_section', array(
		'title'       => esc_html__( 'Logo', 'revo' ),
		'priority'    => 30,
		'description' => esc_html__( 'Insert a logo text to replace the default logo in header', 'revo' ),
	) );

	$tmp_sectionname = 'themeslug_logo_section';

	$tmp_settingname = $tmp_sectionname . '_small';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label'    => esc_html__( ' Small logo', 'vanessa' ),
			'section'  => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );


	$tmp_settingname = 'revo_logo_text';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html( 'Revo Studio', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Logo text', 'revo' ),
		'section'  => 'themeslug_logo_section',
		'settings' => $tmp_settingname,
		'type'     => 'text'
	) );




	$wp_customize->add_setting( 'revo_logo_image', array(
		'default'           =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label'    => esc_html__( 'Header logo ', 'vanessa' ),
			'section'  => 'themeslug_logo_section',
			'settings' => 'revo_logo_image',
		) ) );


	/*
	* Logo preloader
	*/


	$tmp_settingname = 'revo_logo_preloader';
	$wp_customize->add_setting( $tmp_settingname, array(
		'sanitize_callback' =>
			'revo_sanitize_temp'
	) );


	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'themeslug_logo2', array(
			'label'    => esc_html__( 'Preload Logo', 'revo' ),
			'section'  => 'themeslug_logo_section',
			'settings' => $tmp_settingname,
		) ) );


	$tmp_settingname = 'revo_logo_disable';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => false,
		'sanitize_callback' => 'esc_html'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Disable preload logo?', 'revo' ),
		'section'  => 'themeslug_logo_section',
		'settings' => $tmp_settingname,
		'type'     => 'checkbox'
	) );


	/*******************************************************************
	 * Map style
	 *******************************************************************/
	$tmp_sectionname = "revo_map";
	$tmp_default     = "";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Map style', 'revo' ),
		'priority'    => 30,
		'description' => esc_html__( 'Map style JSON config (see https://snazzymaps.com, http://www.mapstylr.com/showcase/ )', 'revo' )
	) );
	$tmp_tabel        = 'stylemap_json';
	$tmp_settingname  = $tmp_sectionname . '_' . $tmp_tabel;
	$tmp_settingtitle = esc_html__( 'stylemap_json', 'revo' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => $tmp_default,
		'sanitize_callback' => 'revo_sanitize_temp'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'stylemap json', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'textarea'
	) );

	$tmp_settingname = $tmp_sectionname . '_google_key';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert you google map api key', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(see https://developers.google.com/maps/documentation/javascript/get-api-key#key )', 'revo' ),
		'type'        => 'text',
	) );


	/********************************************************************
	 * colors
	 */
	$colors = array();
	if ( function_exists( 'revo_get_style_color' ) ) {
		$colors = revo_get_style_color();
	}

	foreach ( $colors as $k => $v ) {
		$grb = revo_Hex2RGB( $v );
		if ( $grb[0] == $grb[1] ) {
			continue;
		} //gray
		$tmp_sectionname = 'colors';
		$tmp_settingname = $tmp_sectionname . '_m_' . $v;
		$label           = $v;
		if ( $v == '67D5B5' ) {
			$label = esc_html__( 'primary ', 'revo' );
		}
		if ( $v == 'F0F5F7' ) {
			$label = esc_html__( 'border colors ', 'revo' );
		}

		if ( $v == 'F0F5F9' ) {
			$label = esc_html__( 'about  section  background', 'revo' );
		}

		if ( $v == '8A8888' ) {
			$label = esc_html__( 'link colors in blog', 'revo' );
		}


		if ( $v == '8A8888' ) {
			continue;
		}
		if ( $v == 'EFF4F8' ) {
			continue;
		}


		$wp_customize->add_setting( $tmp_settingname, array(
			'default'           => "#" . esc_html( $v ),
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $tmp_settingname,
			array(
				'label'    => esc_html__( 'Color ', 'revo' ) . esc_html( $label ) . '',
				'section'  => $tmp_sectionname,
				'settings' => $tmp_settingname,
			) ) );
	}


	/*******************************************************************
	 * 404
	 *******************************************************************/
	$tmp_sectionname = "revo_404";
	$tmp_default     = "";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'    => esc_html__( '404', 'revo' ),
		'priority' => 30,
	) );

	$tmp_settingname = $tmp_sectionname . '_top_img';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label'    => esc_html__( '404 page Top img', 'revo' ),
			'section'  => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );


	$tmp_tabel        = 'main_title';
	$tmp_settingname  = $tmp_sectionname . '_' . $tmp_tabel;
	$tmp_settingtitle = esc_html__( 'main_title', 'revo' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => $tmp_default,
		'sanitize_callback' => 'revo_sanitize_temp'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Top title', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( 'insert title (for example 404 Page) )', 'revo' ),
		'type'        => 'text'
	) );


	$tmp_settingname = $tmp_sectionname . '_top_desc';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Top description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );

	$tmp_settingname = $tmp_sectionname . '_title_404';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'title-404', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );


	$tmp_settingname = $tmp_sectionname . '_subtitle';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'subtitle-404', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$tmp_settingname = $tmp_sectionname . '_text_primary';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'text-primary', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );

	$tmp_settingname = $tmp_sectionname . '_description_404';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'description 404', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );

	$tmp_settingname = $tmp_sectionname . '_info_404';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'Insert your description', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'text',


	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'       => esc_html__( 'info-404', 'revo' ),
		'section'     => $tmp_sectionname . "_section",
		'settings'    => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'revo' ),
		'type'        => 'textarea',


	) );


	/*******************************************************************
	 * Performans
	 *******************************************************************/

	$tmp_sectionname = "revo_performans";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Performance', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( '', 'revo' )
	) );


	$tmp_settingname = $tmp_sectionname . '_preload';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => true,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Enable preload?', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'checkbox',
	) );


	/*
	 * pagination
	 */

	$tmp_settingname = $tmp_sectionname . '_pagination_ajax';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => false,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Enable ajax pagination?', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'checkbox',
	) );


	/*******************************************************************
	 * contact form shortcode
	 *******************************************************************/

	$tmp_sectionname = "revo_c_form_s";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Contact form shortcode', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( '', 'revo' )
	) );
	$tmp_settingname = $tmp_sectionname . '_txt';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Start with us', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Contact form text', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text',
	) );


	$tmp_settingname = $tmp_sectionname . '_val';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => '[revo_contact_form]',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Contact form shortcode', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'textarea',
	) );


	$tmp_settingname = $tmp_sectionname . '_susses_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Thank you', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Modal susses title', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text',
	) );
	/*
	 *
	 */
	$tmp_settingname = $tmp_sectionname . '_susses_sub_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Your message is successfully sent...', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Modal susses subtitle', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text',
	) );

	/*
	 *
	 */
	$tmp_settingname = $tmp_sectionname . '_error_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Sorry', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Modal error title', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text',
	) );
	/*
	 *
	 */
	$tmp_settingname = $tmp_sectionname . '_error_sub_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => esc_html__( 'Something went wrong', 'revo' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Modal error subtitle', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'text',
	) );

	/*********************************************************
	 * Footer
	 **************************************************************/
	$tmp_sectionname = "footer";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title'       => esc_html__( 'Footer', 'revo' ),
		'priority'    => 31,
		'description' => esc_html__( '', 'revo' )
	) );
	$tmp_settingname = $tmp_sectionname . '_copyright';

	$copy = '[revo-i]' . esc_html__( 'Revo', 'revo' ) . '[/revo-i] ' . esc_html__( ' © 2016 revo. All rights reserved by .', 'revo' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           => $copy,
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label'    => esc_html__( 'Footer copyright', 'revo' ),
		'section'  => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'     => 'textarea',
	) );


	/**
	 * footer img
	 */
	$tmp_settingname = $tmp_sectionname . '_img';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label'    => esc_html__( 'Footer img', 'revo' ),
			'section'  => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );


}

function revo_sanitize_to_int( $value ) {
	return (int) $value;
}


function revo_sanitize_temp( $value ) {
	return $value;
}

///add color controller site
if ( class_exists( 'WP_Customize_Control' ) ):
	class revo_Customize_color_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span
						class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>
				<input class="color_value" type="hidden" <?php $this->input_attrs(); ?>
				       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			</label>
			<div class="color-panel clearfix">
				<a href="" data-rel="" data-map="#gmap"
				   data-brand-img="img/brand.png" class="active color styleswitch default">
				</a>
				<a href="" data-rel="green"
				   data-brand-img="img/brand-green.png" data-map="#gmap-green" class="color styleswitch green">
				</a>
				<a href="" data-rel="red"
				   data-brand-img="img/brand-red.png" data-map="#gmap-red" class="color styleswitch red">
				</a>
				<a href="" data-rel="blue"
				   data-brand-img="img/brand-blue.png" data-map="#gmap-blue" class="color styleswitch blue">
				</a>

			</div>

			<?php
		}
	}
endif;


function revo_color_hack( $css ) {
	$css = str_ireplace( "322F44", "33244A", $css );
	$css = str_ireplace( "47A5F5", "009ECC", $css );
	$css = str_ireplace( "45C3E8", "009ECC", $css );
	$css = str_ireplace( "7CCB18", "AAC600", $css );
	$css = str_ireplace( "62B50A", "AAC600", $css );
	$css = str_ireplace( "006EC6", "0081DB", $css );
	$css = str_ireplace( array(
		"7CCB18",
		"1B2027",
		"191A22",
		"1F1C2D",
		"191A22"
	), array(
		"97C900",
		"030102",
		"011222",
		"011222"
	), $css );
	//green
	$css = str_ireplace( "AAC600", "97C900", $css );
	//orange
	$css = str_ireplace( array(
		"FF9C00",
		"FFAC00",
		"FF5700",
		"FFCB00"
	), "FF9100", $css );
	//dark red
	$css = str_ireplace( array(
		"D82E26",
		"CC130A",
		"A1201A"
	), "D82E26", $css );
	//light red
	$css = str_ireplace( array(
		"E51616",
		"F54100",
		"E73931"
	), "FF9100", $css );

	return $css;


}

function revo_Hex2RGB( $color ) {
	$color = str_replace( '#', '', $color );
	if ( strlen( $color ) != 6 ) {
		return array(
			0,
			0,
			0
		);
	}
	$vanessa_rgb = array();
	for ( $x = 0; $x < 3; $x ++ ) {
		$vanessa_rgb[ $x ] = hexdec( substr( $color, ( 2 * $x ), 2 ) );
	}

	return $vanessa_rgb;
}

/**
 *Plug in  script to customize
 */
function revo_custom_customize_enqueue() {
	wp_enqueue_script( 'revo_styleswitch.js', get_template_directory_uri() . '/js/styleswitch.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'revo_styleswitch-demo.js', get_template_directory_uri() . '/js/admin/styleswitch-demo.js', array( 'jquery' ), '1', true );

	wp_enqueue_style( 'revo_switcher.css', get_template_directory_uri() . '/css/switcher.css' );
}


add_action( 'customize_controls_enqueue_scripts',
	'revo_custom_customize_enqueue' );
add_action( 'customize_register', 'revo_true_customizer_init' );
?>