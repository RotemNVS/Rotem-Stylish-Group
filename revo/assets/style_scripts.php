<?php

/**
 * We print the scripts and styles in the frontend
 */


add_action( 'wp_enqueue_scripts', 'revo_style_scripts', 500 );
add_action( 'customize_preview_init', 'revo_p', 500 );

function revo_p() {

	if ( strlen( get_theme_mod( 'colors_m_67D5B5' ) ) > 2 && get_theme_mod( 'colors_m_D4B068' ) != '#D4B068' ) {
		$OLD_CSS = '.navbar-nav li a:hover,
  .navbar-nav li a:focus,
  .navbar-nav .active > a,
  .navbar-nav .active > a:hover{   
    color:#D4B068; 
  } ::-webkit-scrollbar-thumb { cursor: pointer; background: #D4B068; } ::selection{ background-color:#D4B068; color:#fff; } -webkit-::selection{ background-color:#D4B068; color:#fff; } ::-moz-selection{ background-color:#D4B068; color:#fff; } .loader{ position: fixed; overflow: hidden; z-index: 11; left: 0; top: 0; width: 100%; height: 100%; background:#D4B068; color:#fff; text-align: center; }  .dancing-letter:first-letter{ font-family: \'Dancing Script\', cursive; font-size: 70px; font-weight: 100; color:#D4B068; display: inline-block; margin-right: 5px; }  blockquote{ margin:20px 0 20px 0; font-size: 17px; color:#777; border-left: 3px solid #D4B068; }  a { color:#D4B068; -webkit-transition: color .3s ease-out; -o-transition: color .3s ease-out; transition: color .3s ease-out; } a:hover, a:focus { color:#D4B068; outline: none; }  .form-control, textarea.form-control, select{ height: 45px; padding: 6px 18px; border-radius: 0; border:0; background-color: transparent; border:1px solid #D4B068; border-width: 0 0 1px; color: #9F9F9F; -webkit-box-shadow:none; box-shadow:none; -webkit-transition: all .15s; -o-transition: all .15s; transition: all .15s; } .form-control:focus, select:focus{ border-color: #D4B068; outline: 0; -webkit-box-shadow:none; box-shadow:none; }  .btn{  background:none; border:1px solid #D4B068;  }  .btn:hover .line-square{ border-color: #D4B068; } .btn:hover .line-top{ border-color: #D4B068; } .btn:hover .line-bottom{ border-color: #D4B068; }  .text-primary{ color:#D4B068; }  .bgc-primary{ background-color: #D4B068; }  .line-top, .line-bottom{ content:\'\'; position: absolute; z-index: 1; left:0; right: 0; border-top:1px solid #D4B068; -webkit-transition: all 0.5s linear; -o-transition: all 0.5s linear; transition: all 0.5s linear; }  .line-square{ content:\'\'; position: absolute; width: 8px; height: 8px; border:1px solid #D4B068; -webkit-transition: all 0.4s ease-out; -o-transition: all 0.4s ease-out; transition: all 0.4s ease-out; }  .navbar-toggle .icon-bar{ background-color: #D4B068; height: 2px; width: 30px; }  .navbar-nav li a:hover, .navbar-nav li a:focus, .navbar-nav .active > a{ background-color: transparent; color:#D4B068; }  .mouse{ position: absolute; z-index: 1; left: 50%; margin-left: -14px; bottom: 30px; width: 28px; height: 50px; text-align: center; border:1px solid #D4B068; opacity: 0.5; border-radius: 27px; }  .mouse:after{ content:\'\'; position: absolute; top: 29%; left: 50%; width: 6px; height: 6px; margin: -3px 0 0 -3px; border-radius: 50%; background: #D4B068; -webkit-animation: mouseScroll 1.8s linear infinite; -moz-animation: mouseScroll 1.8s linear infinite; animation: mouseScroll 1.8s linear infinite; }  .progress-bar .bar-line{ height: 100%; background-color: #D4B068; -webkit-transition: .5s ease; -o-transition: .5s ease; transition: .5s ease; }  .filter li a:hover, .filter li a:focus{ color:#D4B068; text-decoration: none; } .filter .active a, .filter .active a:focus{ color:#D4B068; }  .mfp-image-holder .mfp-close, .mfp-iframe-holder .mfp-close{ padding: 0; margin-top: -10px; font-family: inherit; font-size: 40px; font-weight: 300; line-height: 0; color:#D4B068; }  .mfp-title{ font-family: \'Dancing Script\', cursive; font-size: 20px; color:#D4B068; }  .mfp-arrow-left:after, .mfp-arrow-left .mfp-a{ border-right-color:#D4B068; } .mfp-arrow-right:after, .mfp-arrow-right .mfp-a{ border-left-color:#D4B068; }  .col-price.leading .price-box{ border-color:#D4B068; }  .owl-controls .owl-page.active span, .owl-controls .owl-page:hover span{ background-color:#D4B068; }  .breadcrumbs  li:hover a, .breadcrumbs .active{ color:#D4B068 }  .post-header h2 a:hover{ color:#D4B068; text-decoration:none; }  .gallery-carousel .owl-prev:hover, .gallery-carousel .owl-next:hover{ background: #D4B068; }  .label-default[href]:hover, .label-default[href]:focus{ background-color: #D4B068; }  .inherit-link-list a:hover{ color:#D4B068; text-decoration:none; }  .widget-title a:hover{ color:#D4B068; text-decoration:none; }  .revo_Recent_posts li a:hover, .car-categories li a:hover{ color:#D4B068; text-decoration:none; }  input[type="search"]:focus{ outline:none; border-color:#D4B068; }  caption{ background: #D4B068; padding-left:20px; padding-right:20px; font-weight: bold; color: #fff; }   .pagination>.active>a,  .pagination>.active>span,  .pagination>.active>a:hover,  .pagination>.active>span:hover,  .pagination>.active>a:focus,  .pagination>.active>span:focus{ background-color: #D4B068; border-color: #D4B068; } .pagination>li>a, .pagination>li>span{ color: #D4B068; }  .close{ display: inline-block; font-size: 12px; font-weight: 100; line-height: 1; color: #D4B068; text-align: center; text-shadow: none; cursor: pointer; border-radius: 50%; opacity: 1; filter: alpha(opacity=1); -webkit-transition: all 0.2s linear; -o-transition: all 0.2s linear; transition: all 0.2s linear; }  .navbar-nav li a:hover, .navbar-nav li a:focus, .navbar-nav .active > a, .navbar-nav .active > a:hover{ background-color: transparent; color:#D4B068; }  ::-webkit-scrollbar-thumb { background: #D4B068}::selection{ background-color:#D4B068}-webkit-::selection{ background-color:#D4B068}::-moz-selection{ background-color:#D4B068}.loader{ background:#D4B068} .dancing-letter:first-letter{ color:#D4B068} blockquote{ border-left: 3px solid #D4B068} a { color:#D4B068}a:hover, a:focus { color:#D4B068} .form-control, textarea.form-control, select{ border:1px solid #D4B068}.form-control:focus, select:focus{ border-color: #D4B068} .btn{ border:1px solid #D4B068} .btn:hover .line-square{ border-color: #D4B068}.btn:hover .line-top{ border-color: #D4B068}.btn:hover .line-bottom{ border-color: #D4B068} .text-primary{ color:#D4B068} .bgc-primary{ background-color: #D4B068} .line-top, .line-bottom{ border-top:1px solid #D4B068} .line-square{ border:1px solid #D4B068} .navbar-toggle .icon-bar{ background-color: #D4B068} .navbar-nav li a:hover, .navbar-nav li a:focus, .navbar-nav .active > a{ color:#D4B068} .mouse{ border:1px solid #D4B068} .mouse:after{ background: #D4B068} .progress-bar .bar-line{ background-color: #D4B068} .filter li a:hover, .filter li a:focus{ color:#D4B068}.filter .active a, .filter .active a:focus{ color:#D4B068} .mfp-image-holder .mfp-close, .mfp-iframe-holder .mfp-close{ color:#D4B068} .mfp-title{ color:#D4B068} .mfp-arrow-left:after, .mfp-arrow-left .mfp-a{ border-right-color:#D4B068}.mfp-arrow-right:after, .mfp-arrow-right .mfp-a{ border-left-color:#D4B068} .col-price.leading .price-box{ border-color:#D4B068} .owl-controls .owl-page.active span, .owl-controls .owl-page:hover span{ background-color:#D4B068} .breadcrumbs  li:hover a, .breadcrumbs .active{ color:#D4B068 } .post-header h2 a:hover{ color:#D4B068} .gallery-carousel .owl-prev:hover, .gallery-carousel .owl-next:hover{ background: #D4B068} .label-default[href]:hover, .label-default[href]:focus{ background-color: #D4B068} .inherit-link-list a:hover{ color:#D4B068} .widget-title a:hover{ color:#D4B068} .revo_Recent_posts li a:hover, .car-categories li a:hover{ color:#D4B068} input[type="search"]:focus{ border-color:#D4B068} caption{ background: #D4B068}  .pagination>.active>a,  .pagination>.active>span,  .pagination>.active>a:hover,  .pagination>.active>span:hover,  .pagination>.active>a:focus,  .pagination>.active>span:focus{ border-color: #D4B068}.pagination>li>a, .pagination>li>span{ color: #D4B068} .close{ color: #D4B068} .navbar-nav li a:hover, .navbar-nav li a:focus, .navbar-nav .active > a, .navbar-nav .active > a:hover{ color:#D4B068}';
		$new_css = str_replace( '#D4B068', sanitize_text_field( get_theme_mod( 'colors_m_67D5B5' ) ), $OLD_CSS );
		update_option( 'revo_color', wp_kses_post( $new_css ) );

	} else {
		delete_option( 'revo_color' );
	}


}

/**
 *
 */
function revo_style_scripts() {
	global $Revo_class, $wp_query;
	/*---------------------css------------------------------------------------*/

	wp_enqueue_style( 'revo_style.css', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome.min.css', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'hover.css', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'animate.css', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'magnific-popup.css', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'owl.transitions.css', get_template_directory_uri() . '/css/owl.transitions.css' );
	wp_enqueue_style( 'settings.css', get_template_directory_uri() . '/css/settings.css' );
	wp_enqueue_style( 'layers.css', get_template_directory_uri() . '/css/layers.css' );
	wp_enqueue_style( 'navigation.css', get_template_directory_uri() . '/css/navigation.css' );


	wp_enqueue_style( 'revo_style_new_color', get_template_directory_uri() . '/css/style.css' );


	wp_enqueue_style( 'revo_style_wp', get_stylesheet_directory_uri() . '/style.css' );


	if ( function_exists( 'revo_enqueue_url_base_style' ) && revo_enqueue_url_base_style() == true ) {

		wp_enqueue_style( 'revo_style_new_colors2', revo_enqueue_url_base_style() );
	}


	if ( is_customize_preview() && function_exists( 'revo_css_generator_custumize' ) ) {
		wp_add_inline_style( 'revo_style_new_colors', revo_css_generator_custumize() );
	}


	//************************************* Fonts ***********************************************/
	wp_enqueue_style( 'revo_fonts_google_Roboto', $Revo_class->google_fonts_url( 'Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic' ) );
	wp_enqueue_style( 'revo_fonts_google_Dancing+Script', $Revo_class->google_fonts_url( 'Dancing+Script:400,700' ) );
	wp_enqueue_style( 'revo_fonts_google_Great+Vibes', $Revo_class->google_fonts_url( 'Great+Vibes' ) );
	wp_enqueue_style( 'revo_fonts_google_Tangerine:400,700', $Revo_class->google_fonts_url( 'Tangerine:400,700' ) );


	$m            = get_theme_mod( 'fonts_url' );
	$custom_css_f = '';
	if ( isset( $m ) && strlen( get_theme_mod( 'fonts_name' ) ) > 3 ) {
		$url = explode( '=', $m );

		wp_enqueue_style( 'revo_fonts_google_custum', urldecode( $Revo_class->google_fonts_url( $url[1] ) ) );

		if ( preg_match( '/font-family/', get_theme_mod( 'fonts_name' ) ) ) {


			$custom_css_f .= " body{
               " . str_replace( ";", "", get_theme_mod( 'fonts_name' ) ) . "   !important;
           }";
		} else {
			$custom_css_f .= " body{
                 font-family: '" . get_theme_mod( 'fonts_name' ) . "' !important;
           }";
		}


	}
	$m         = get_theme_mod( 'fonts_url_2' );
	$font_name = get_theme_mod( 'fonts_name_2' );
	if ( isset( $m ) && isset( $font_name{3} ) ) {
		$url = explode( '=', $m );

		wp_enqueue_style( 'revo_fonts_google_custum_2', urldecode( $Revo_class->google_fonts_url( $url[1] ) ) );

		if ( preg_match( '/font-family/', $font_name ) ) {


			$custom_css_f .= " .dancing-letter:first-letter , i, .i , .mfp-title {
               " . str_replace( ";", "", $font_name ) . "   !important;           }";
		} else {
			$custom_css_f .= " .dancing-letter:first-letter , i, .i , .mfp-title {
                 font-family: '" . $font_name . "' !important;
           }";
		}


	}
	// cat image bg
	$bg = revo_taxonomy_image();
	if ( ! isset( $bg{8} ) ) {
		$bg = get_header_image();
	}


	if ( is_single() || is_page() ) {


		$image_id = get_post_meta( get_the_ID(), '_revo_image_id', true );
		//if issest id img
		if ( $image_id && get_post( $image_id ) ) {
			$image = wp_get_attachment_image_src( $image_id, 'full' );


			if ( isset( $image[0] ) ) {
				$bg = $image[0];
			}

		}

	}


	$css = '';
	if ( isset( $bg{8} ) ) {
		$css .= '.masked {
        background: url(' . $bg . ') 50%  no-repeat !important;
        background-size: cover !important;
        }';
	}

	$footer_bg = get_theme_mod( 'footer_img' );
	if ( isset( $footer_bg{8} ) ) {
		$footer_bg = esc_url( $footer_bg );
		$css .= '.footer-top{
        background: url(' . $footer_bg . ') 50%  no-repeat !important;
        background-size: cover !important;
        }';
	}


	wp_add_inline_style( 'revo_style_new_color', $custom_css_f );
	if ( strlen( get_theme_mod( 'colors_m_D4B068' ) ) > 2 ) {
		if ( strlen( get_option( 'revo_color' ) ) > 2 ) {
			wp_add_inline_style( 'revo_style_wp', wp_kses_post( get_option( 'revo_color' ) ) );
		}
	}

	wp_add_inline_style( 'revo_style.css', $css );
	/*---------------------------------------- JS --------------------------------------------------------------------------*/

	/* /*-- JS Global --*/
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1', true );


	if ( get_theme_mod( 'performans_scroll', false ) == true ) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '1', true );
	}

	wp_enqueue_script( 'jquery.viewport.js', get_template_directory_uri() . '/js/jquery.viewport.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'smoothscroll.js', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery.validate.min.js', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery.ajaxchimp.min.js', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jQuerySimpleCounter.js', get_template_directory_uri() . '/js/jQuerySimpleCounter.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'wow.min.js', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery.validate.min.js', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery.stellar.min.js', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery.magnific-popup.js', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'owl.carousel.min.js', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'imagesloaded.pkgd.js', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'isotope.pkgd.min.js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'revo_interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), '1', true );

	/**
	 * ajax load post params
	 */
	$total = 0;
	if ( isset( $wp_query->max_num_pages ) ) {
		$total = $wp_query->max_num_pages;
	}

	$posttype = '';
	if ( isset( $wp_query->query['post_type'] ) ) {
		$posttype = $wp_query->query['post_type'];
	}
	$cat = '';
	if ( is_front_page() ) { // is the index page cat = 0
		$cat = 0;
	} else {
		if ( get_the_category() ) {
			$revo_cat      = 0;
			$revo_category = get_category( get_query_var( 'cat' ) );
			if ( isset( $revo_category->cat_ID ) ) {
				$revo_cat = $revo_category->cat_ID;
			} else {
				$revo_cat = 0;
			}
			$cat = $revo_cat;
		}

	}
	$tag = '';
	if ( isset( $wp_query->query['tag'] ) && ! empty( $wp_query->query['tag'] ) ) {
		$tag = ( $wp_query->query['tag'] );
	}

	$enable_ajax = false;
	if ( is_archive() || is_search() || is_category() ) {
		if ( get_theme_mod( 'revo_performans_pagination_ajax', false ) == true ) {
			$enable_ajax = true;
		}
	}

	wp_localize_script( 'revo_interface', 'revo_obj', array(
		'ajaxurl'     => esc_url( admin_url( 'admin-ajax.php' ) ),
		'total'       => sanitize_text_field( $total ),
		'posttype'    => sanitize_text_field( $posttype ),
		'cat'         => sanitize_text_field( $cat ),
		'tag'         => sanitize_text_field( $tag ),
		's'           => sanitize_text_field( get_search_query() ),
		'enable_ajax' => sanitize_text_field( $enable_ajax )


	) );
	wp_enqueue_script( 'comment-reply' );

	if ( get_theme_mod( 'revo_map_google_key' ) != '' ) {
		wp_enqueue_script( 'mapsgoogle', 'http://maps.google.com/maps/api/js?key=' . get_theme_mod( 'revo_map_google_key' ), array( 'jquery' ), '1', true );

	} else {
		wp_enqueue_script( 'mapsgoogle', 'http://maps.google.com/maps/api/js', array( 'jquery' ), '1', true );

	}


	wp_enqueue_script( 'revo_gmap', get_template_directory_uri() . '/js/gmap.js', array( 'jquery' ), '1', true );


}


//init scripts and style


/**
 * init admin scripts and style
 */
function revo_style_scripts_admin() {
	//Geocoding google
	wp_enqueue_style( 'revo_admins', get_template_directory_uri() . '/css/admins.css' );
	wp_enqueue_script( 'revo_admins', get_template_directory_uri() . '/js/admin/admin.js', array( 'jquery' ), '1', true );
	wp_localize_script( 'revo_admins', 'revo_admin_obj',
		array(
			'version' => sanitize_text_field( esc_html( get_bloginfo( "version" ) ) )
		)
	);


	$T = get_the_tags();
}

add_action( 'admin_enqueue_scripts', 'revo_style_scripts_admin' );

