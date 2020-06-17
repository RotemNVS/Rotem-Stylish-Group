<?php
/**
 * Theme Mode
 */
//add_filter('ot_theme_mode', '__return_true');
/**
 * Show Settings Pages
 */
add_filter('ot_show_pages', '__return_false');

/**
 * Show New Layout
 */
add_filter('ot_show_new_layout', '__return_false');

/*******************************************************/

/**
 * Initialize the custom Theme Options.
 */
add_action('init', 'revo_custom_theme_options');
/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.3.0
 */
function revo_custom_theme_options()
{
	/* OptionTree is not loaded yet, or this is not an admin request */
	if (!function_exists('ot_settings_id') || !is_admin())
		return false;
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option(ot_settings_id(), array());
	$custom_settings = array(
		'contextual_help' => array(
			'sidebar' => ''
		),
		'sections' => array(
			array(
				'id' => 'general',
				'title' =>  esc_html__(  'General Config', 'revo')
			),
			array(
				'id' => 'css',
				'title' =>  esc_html__(  'Custom CSS & JS', 'revo')
			),

			array(
				'id' => 'mask',
				'title' =>  esc_html__(  'Image mask', 'revo')
			),
			array(
				'id' => 'google_fonts',
				'title' =>  esc_html__(  'Google Fonts', 'revo')
			),
			array(
				'id' => 'typography',
				'title' =>  esc_html__(  'Typography', 'revo')
			),
			array(
				'id' => 'navigation',
				'title' =>  esc_html__(  'Navigation', 'revo')
			),

			array(
				'id' => 'sidebars_settings',
				'title' =>  esc_html__(  'Theme Sidebars Color Options', 'revo')
			),


		

			array(
				'id' => 'header',
				'title' =>  esc_html__(  'Blog/Page Header Options', 'revo')
			),
			array(
				'id' => 'header_color',
				'title' =>  esc_html__(  'Blog/Page Header Color Options', 'revo')
			),

			array(
				'id' => 'single_header',
				'title' =>  esc_html__(  'Single Page Header Options', 'revo')
			),
			array(
				'id' => 'archive_page',
				'title' =>  esc_html__(  'Archive Page Header Options', 'revo')
			),
			array(
				'id' => 'error_page',
				'title' =>  esc_html__(  '404 Page Header Options', 'revo')
			),
			array(
				'id' => 'search_page',
				'title' =>  esc_html__(  'Search Page Header Options', 'revo')
			),
		

		),
		'settings' => array(


			array(
				'id' => 'additionalcss',
				'label' =>  esc_html__(  'additional css', 'revo'),
				'desc' =>  esc_html__(  'You can add additional css ', 'revo'),
				'std' => '',
				'type' => 'css',
				'section' => 'css',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),

			array(
				'id' => 'additionaljs',
				'label' =>  esc_html__(  'additional javascript', 'revo'),
				'desc' =>  esc_html__(  'You can add additional javascript ', 'revo'),
				'std' => '',
				'type' => 'css',
				'section' => 'css',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),

			array(
				'id' => 'revo_mask',
				'label' =>  esc_html__(  'Background Black mask', 'revo'),
				'desc' => sprintf( esc_html__(  'Background Image Black mask %s or %s.', 'revo'), '<code>on</code>', '<code>off</code>'),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'mask',
				'operator' => 'and'
			),

			array(
				'id' => 'revo_m_c',
				'label' =>  esc_html__(  'Mask color', 'revo'),
				'desc' =>  esc_html__(  'Please select color with opacity', 'revo'),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'mask'
			),


			/**
			 * FRONTPAGE COLOR SETTINGS.
			 */
			array(
				'id' => 'revo_frontpage_header_heading_color',
				'label' =>  esc_html__(  'Frontpage heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_slogan_color',
				'label' =>  esc_html__(  'Frontpage paragraph / slogan color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_buttonbg_color',
				'label' =>  esc_html__(  'Frontpage button background color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_buttonbg_hover_color',
				'label' =>  esc_html__(  'Frontpage button background hover color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_button_title_color',
				'label' =>  esc_html__(  'Frontpage button title color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),

			array(
				'id' => 'revo_frontpage_header_button_title_hover_color',
				'label' =>  esc_html__(  'Frontpage button title hover color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_video_button_background_color',
				'label' =>  esc_html__(  'Frontpage video button background color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'revo_frontpage_header_video_button_background_hover_color',
				'label' =>  esc_html__(  'Frontpage video button background hover color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),


			/*** GENERAL SETTINGS. **/


			array(
				'id' => 'revo_logosize',
				'label' =>  esc_html__(  'Logo font size', 'revo'),
				'desc' =>  esc_html__(  'Logo font size', 'revo'),
				'std' => '25',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'general',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			

			/**
			 * GOOGLE FONTS SETTINGS.
			 */
			array(
				'id' => 'body_google_fonts',
				'label' =>  esc_html__(  'Google Fonts', 'revo'),
				'desc' => 'Add Google Font and after the save settings follow these steps Dashborevo > Appearance > Theme Options > Typography',
				'std' => '',
				'type' => 'google-fonts',
				'section' => 'google_fonts',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			/**
			 * TYPOGRAPHY SETTINGS.
			 */
			array(
				'id' => 'revo_tipigrof',
				'label' =>  esc_html__(  'Typography', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof1',
				'label' =>  esc_html__(  'Typography h1', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof2',
				'label' =>  esc_html__(  'Typography h2', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof3',
				'label' =>  esc_html__(  'Typography h3', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof4',
				'label' =>  esc_html__(  'Typography h4', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof5',
				'label' =>  esc_html__(  'Typography h5', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_tipigrof6',
				'label' =>  esc_html__(  'Typography h6', 'revo'),
				'desc' =>  esc_html__(  'The Typography option type is for adding typography styles to your site.', 'revo'),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			/**
			 * NAVIGATION SETTINGS.
			 */


			array(
				'id' => 'revo_navigationbg',
				'label' =>  esc_html__(  'Theme navigation background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color with opacity', 'revo'),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'navigation'
			),
			array(
				'id' => 'revo_navitem',
				'label' =>  esc_html__(  'Theme navigation menu item color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'navigation'
			),
			array(
				'id' => 'revo_navitemhover',
				'label' =>  esc_html__(  'Theme navigation menu item hover color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'navigation'
			),


			array(
				'id' => 'revo_sidebarwidgetgeneralcolor',
				'label' =>  esc_html__(  'Theme Sidebar widget general color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'revo_sidebarwidgettitlecolor',
				'label' =>  esc_html__(  'Theme Sidebar widget title color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'revo_sidebarlinkcolor',
				'label' =>  esc_html__(  'Theme Sidebar link title color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'revo_sidebarlinkhovercolor',
				'label' =>  esc_html__(  'Theme Sidebar link title hover color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'revo_sidebarsearchsubmittextcolor',
				'label' =>  esc_html__(  'Theme Sidebar search icon color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'revo_sidebarsearchsubmitbgcolor',
				'label' =>  esc_html__(  'Theme Sidebar search active border color', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),

			/**
			 * BLOG/PAGE HEADER SETTINGS.
			 */
			array(
				'id' => 'revo_mask_c_page_header',
				'label' =>  esc_html__(  'Pages header background image visibility', 'revo'),
				'desc' => sprintf( esc_html__(  'Heading visibility %s or %s.', 'revo'), '<code>on</code>', '<code>off</code>'),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),

			array(
				'id' => 'revo_blogheaderbgcolor',
				'label' =>  esc_html__(  'Blog Pages Header Section background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'header'
			),

			array(
				'id' => 'revo_blogheaderbgheight',
				'label' =>  esc_html__(  'Blog Pages Header height', 'revo'),
				'desc' =>  esc_html__(  'Blog Pages Header height', 'revo'),
				'std' => '50',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_blogheaderpaddingtop',
				'label' =>  esc_html__(  'Header padding top', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '250',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_blogheaderpaddingbottom',
				'label' =>  esc_html__(  'Header padding bottom', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '200',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			/**
			 * SINGLE HEADER SETTINGS.
			 */


			array(
				'id' => 'revo_singleheaderbgheight',
				'label' =>  esc_html__(  'Single Pages Header height', 'revo'),
				'desc' =>  esc_html__(  'Single Pages Header height', 'revo'),
				'std' => '50',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_singleheaderpaddingtop',
				'label' =>  esc_html__(  'Header padding top', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '250',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_singleheaderpaddingbottom',
				'label' =>  esc_html__(  'Header padding bottom', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '200',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_singleheadingcolor',
				'label' =>  esc_html__(  'Single Pages Heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'single_header'
			),
			array(
				'id' => 'revo_singleheaderparagraphcolor',
				'label' =>  esc_html__(  'Single Pages slogan color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'single_header'
			),

			array(
				'id' => 'revo_blogheaderbgcolor_single',
				'label' =>  esc_html__(  'Blog Single Header Section background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'single_header'
			),

			array(
				'id' => 'revo_mask_c_page_header_single',
				'label' =>  esc_html__(  'Single header background image visibility', 'revo'),
				'desc' => sprintf( esc_html__(  'Heading visibility %s or %s.', 'revo'), '<code>on</code>', '<code>off</code>'),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),

			/**
			 * ARCHIVE HEADER SETTINGS.
			 */



			array(
				'id' => 'revo_archiveheaderbgheight',
				'label' =>  esc_html__(  'Archive Pages Header height', 'revo'),
				'desc' =>  esc_html__(  'Archive Pages Header height', 'revo'),
				'std' => '50',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_archiveheaderpaddingtop',
				'label' =>  esc_html__(  'Header padding top', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '250',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_archiveheaderpaddingbottom',
				'label' =>  esc_html__(  'Header padding bottom', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '200',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),



			array(
				'id' => 'revo_archiveheadingcolor',
				'label' =>  esc_html__(  'Archive Pages Heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'archive_page'
			),
			array(
				'id' => 'revo_archiveheadingcolor_desc',
				'label' =>  esc_html__(  'Archive Pages description  color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'archive_page'
			),

			array(
				'id' => 'revo_blogheaderbgcolor_arhive',
				'label' =>  esc_html__(  'Blog Single Header Section background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'archive_page'
			),

			array(
				'id' => 'revo_mask_c_page_header_archive',
				'label' =>  esc_html__(  'Single header background image visibility', 'revo'),
				'desc' => sprintf( esc_html__(  'Heading visibility %s or %s.', 'revo'), '<code>on</code>', '<code>off</code>'),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'archive_page'
			),


			/**
			 * 404 PAGE HEADER SETTINGS.
			 */

			array(
				'id' => 'revo_errorheaderbgcolor',
				'label' =>  esc_html__(  '404 Pages Header Section background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'error_page'
			),

			array(
				'id' => 'revo_errorheaderbgheight',
				'label' =>  esc_html__(  '404 Pages Header height', 'revo'),
				'desc' =>  esc_html__(  '404 Pages Header height', 'revo'),
				'std' => '',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_errorheaderpaddingtop',
				'label' =>  esc_html__(  'Header padding top', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '250',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_errorheaderpaddingbottom',
				'label' =>  esc_html__(  'Header padding bottom', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '200',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),


			array(
				'id' => 'revo_error_heading_fontsize',
				'label' =>  esc_html__(  '404 Page Heading font size', 'revo'),
				'desc' =>  esc_html__(  'Enter 404 Page Heading font size', 'revo'),
				'std' => '65',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_errorheadingcolor',
				'label' =>  esc_html__(  '404 Pages Heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'error_page'
			),

			array(
				'id' => 'revo_error_slogan',
				'label' =>  esc_html__(  '404 Page Slogan', 'revo'),
				'desc' =>  esc_html__(  'Enter 404 Page Slogan', 'revo'),
				'std' => 'Oops! That page can’t be found.',
				'type' => 'text',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),
			array(
				'id' => 'revo_errorheaderparagraphcolor',
				'label' =>  esc_html__(  '404 Pages paragraph/slogan color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'error_page'
			),



			/**
			 * SEARCH PAGE HEADER SETTINGS.
			 */
			array(
				'id' => 'revo_searchpageheadbg',
				'label' =>  esc_html__(  'Search Header Section background image', 'revo'),
				'desc' =>  esc_html__(  'You can upload your image for parallax header', 'revo'),
				'std' => '',
				'type' => 'upload',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			array(
				'id' => 'revo_searchheaderbgcolor',
				'label' =>  esc_html__(  'Search Pages Header Section background color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'search_page'
			),

			array(
				'id' => 'revo_searchheaderbgheight',
				'label' =>  esc_html__(  'Search Pages Header height', 'revo'),
				'desc' =>  esc_html__(  'Search Pages Header height', 'revo'),
				'std' => '50',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_searchheaderpaddingtop',
				'label' =>  esc_html__(  'Header padding top', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '300',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_searchheaderpaddingbottom',
				'label' =>  esc_html__(  'Header padding bottom', 'revo'),
				'desc' =>  esc_html__(  'You can use this option for heading text vertical align', 'revo'),
				'std' => '300',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),


			array(
				'id' => 'revo_search_heading_fontsize',
				'label' =>  esc_html__(  'Search Page Heading font size', 'revo'),
				'desc' =>  esc_html__(  'Enter Search Page Heading font size', 'revo'),
				'std' => '',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'revo_searchheadingcolor',
				'label' =>  esc_html__(  'Search Pages Heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'search_page'
			),



	


			/**
			 * BLOG/PAGE HEADING COLOR SETTINGS.
			 */
			array(
				'id' => 'revo_blogheadingcolor',
				'label' =>  esc_html__(  'Blog Pages Heading color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'header_color'
			),
			array(
				'id' => 'revo_blogsubtitlecolor',
				'label' =>  esc_html__(  'Blog Pages  Heading Subtitle  color ', 'revo'),
				'desc' =>  esc_html__(  'Please select color', 'revo'),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'header_color'
			),
		

		)
	);
	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);
	/* settings are not the same update the DB */
	if ($saved_settings !== $custom_settings) {
		update_option(ot_settings_id(), $custom_settings);
	}
	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}