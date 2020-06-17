<?php


/**
 * Class revo
 */
class Revo_class {
	public function __construct() {
		// Include required files
		$this->includes();
		/**
		 * Hooks
		 */
		add_action( 'after_setup_theme', array( $this, 'revo_crucial_setup' ) );

		// widgets
		add_action( 'widgets_init', array( $this, 'revo_arphabet_widgets_init' ) );
	//filters
		add_filter( 'body_class', array( $this, 'revo_add_body_class' ) );
		//theme support
		$this->theme_support_setting();

	}

	/**
	 * theme support setting
	 */
	function theme_support_setting() {
		add_theme_support( "custom-background" );
		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "custom-header", array() );
		add_theme_support( 'post-thumbnails' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'title-tag' );


		set_post_thumbnail_size( 1111, 400, true );
		add_image_size( 'revo_163-40', 163, 40, true );
		
		register_nav_menus(
			array(
				'revo_topmenu' => esc_html__( 'Header menu', 'revo' ),
			) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'video',
			'gallery'
		) );


	}

	/**
	 * require files and function
	 */
	function includes() {
		//# Part 1. Includes

		require get_template_directory() . '/assets/widgets.php';
		require get_template_directory() . '/assets/customizer.php';
		require get_template_directory() . '/assets/style_scripts.php';
		require get_template_directory() . '/assets/tgm.php';
		require get_template_directory() . '/assets/categoris-image.php';
		require get_template_directory() . '/assets/ajax_comment.php';
		require get_template_directory() . '/assets/metabox.php';
		require get_template_directory() . '/assets/loadmore.php';
		require get_template_directory() . '/assets/mailchamp.php';

		/**OT*/
		require get_template_directory() . '/assets/ot_demo_function.php';

	}

	/************************************************************
	 *                           Hooks Action
	 ************************************************************/
	function revo_crucial_setup() {
		load_theme_textdomain( 'revo', get_template_directory() . '/languages' );

	}


	/**
	 *  widget register
	 */
	function revo_arphabet_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'sidebar', "revo" ),
			'id'            => 'revo_sidebar',
			'description'   => esc_html__( 'Blog sidebar', 'revo' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar_widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Categories and search page sidebar', "revo" ),
			'id'            => 'revo_sidebar_categories',
			'description'   => esc_html__( 'Categories and search page sidebar', 'revo' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar_widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'footer', "revo" ),
			'id'            => 'revo_footer',
			'description'   => esc_html__( 'footer', 'revo' ),
			'before_widget' => '<div id="%1$s" class="column col-sm-6 col-md-3    %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '  <h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

	}

	/*
	 *
	 */


	function revo_add_body_class( $classes ) {

		global $post;
		if ( isset( $post->ID ) ) {
			if ( (
				     is_archive()
				     || is_single()
				     || is_page() )
			     &&
			     get_page_template_slug( $post->ID ) != 'template-fullwidth.php'
			) {
				if ( is_page() ) {
					$classes[] = " revo_blog_page ";
				} elseif ( is_single() ) {
					$classes[] = " revo_blog_single ";
				} else {
					$classes[] = " revo_blog ";
				}
			}


		}


		if ( get_theme_mod( 'performans_s', false ) == false ) {
			$classes[] = " disable_s ";

		}

		return sanitize_html_class( $classes );
	}


	/**
	 *
	 * /************************************************************
	 *                          Metods
	 ************************************************************/

	/**
	 * @param $filter
	 *
	 * @return mixed
	 */

	/**
	 * @param $maxchar
	 */
	function truncate_str( $maxchar ) { //Specifies the number of characters
		$out = get_the_excerpt();
		$out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
		$out = preg_replace( '@(.*)\s[^\s]*$@s', '\\1 ', $out );
		echo wp_kses_post( $out );
	}

	/**
	 * @return string
	 */
	function revo_container_class() {
		$mod = get_theme_mod( "site_Identity_layout", 's2' );
		if ( $mod == "s2" ) {
			return "container-fluid container-fluid_pad_off";
		}

		return "container";
	}
	/****************************************************
	 *                  Helper methods
	 * **************************************************
	 */
	/**
	 * replace the [fa] to <i class="fa fa></i>
	 *
	 * @param $item
	 *
	 * @return string
	 */
	function icon_converter( $item, $count = false ) {
		$i = 0;
		preg_match_all( "#\[fa(.*?)\]#", $item, $arr );
		if ( isset( $arr[1][0] ) ) {
			foreach ( $arr[1] as $new_arr ) {
				$i ++;

				$item = str_replace( "[fa" . $new_arr . "]", ' <i class="fa fa' . $new_arr .
				                                             '"></i> ', $item . $i );
			}
		}

		return $item;
	}

	/**
	 *Check for the existence of posts on the second page
	 *
	 * @param $args
	 *
	 * @return bool
	 */
	function check_post_in_second_page( $args ) {
		$args['paged'] = 2;
		$c_query       = new WP_Query( $args );
		if ( $c_query->post_count > 0 ) {
			$return = true;
		} else {
			$return = false;
		}
		wp_reset_postdata();

		return $return;
	}

	/**
	 * return number of cats in category
	 * @return int|void
	 */
	function ajax_get_the_category() {
		$category = get_category( get_query_var( 'cat' ) );
		$revo_cat = (int) $category->cat_ID;
		$count    = (int) $category->count;
		if ( isset( $wp_query->query["pagename"] ) ) {
			if ( $wp_query->query["pagename"] == 'blogfeed' ) {
				return 0;
			} else {
				return $cat;
			}
		} else {
			return $cat;
		}
	}

	/**
	 * Prepares correct the url to google font
	 *
	 * @param $fonts_param
	 *
	 * @return string url google fonts
	 */
	function google_fonts_url( $fonts_param ) {
		$font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'revo' ) ) {
			$font_url = add_query_arg( 'family', urlencode( $fonts_param ), "//fonts.googleapis.com/css" );
		}
		$font_url = str_replace( '%2B', '+', $font_url );

		return $font_url;
	}

	function get_pots_image_url() {
		$thumbnail = get_the_post_thumbnail( get_the_id(), 'full' );

		preg_match_all( '#src="(.*?)"#si', $thumbnail, $thumb_url );
		if ( isset( $thumb_url[1][0] ) ) {
			return esc_url( $thumb_url[1][0] );
		} else {
			return false;
		}
	}

	/**
	 * @param $string
	 * @param bool|false $return
	 *
	 * @return string
	 */
	function get_fa_icons( $string, $return = false ) {
		preg_match_all( "#\[fa(.*?)\]#", $string, $arr );
		if ( isset( $arr[1][0] ) ) {
			$item = str_replace( "[fa" . $arr[1][0] . "]", ' <i class="fa fa' . $arr[1][0] .
			                                               '"></i> ', $string );
		} else {
			$item = $string;
		}
		$allowed_html = array( 'i' => array( 'class' => array() ) );
		if ( $return == false ) {
			echo wp_kses( $item, $allowed_html );
		} else {
			return wp_kses( $item, $allowed_html );
		}
	}


	/**
	 * @param null $theid
	 * @param int $widht
	 * @param int $height
	 * @param bool|false $big_src if is true the get full img
	 * @param bool|true $default if there is no plug pictures
	 * @param bool|false $return
	 *
	 * @return string url new img
	 */
	function get_post_thumbnail( $theid = null, $widht = 848, $height = 565, $big_src = false, $default = true, $return = false ) {

		if ( $theid == null ) {
			$theid = get_the_ID();
		}
		$thumbnail = get_the_post_thumbnail( $theid, 'full' );

		preg_match_all( '#src="(.*?)"#si', $thumbnail, $thumb_url );

		$thumb = "";


		if ( isset( $thumb_url[1][0] ) ) {
			$thumb = esc_url( $thumb_url[1][0] );
		} elseif ( $default ) {
			$thumb = '';
		}
		if ( $big_src ) {
			if ( $return ) {
				return esc_url( $thumb );
			} else {
				echo esc_url( $thumb );
			}

		} else {


			$thumb_arr = revo_resize_image( get_post_thumbnail_id( $theid ), $widht, $height, true );
			$thumb     = $thumb_arr['url'];


			if ( $return ) {
				return esc_url( ( $thumb ) );
			} else {
				echo esc_url( ( $thumb ) );
			}

		}


	}



	/**
	 * method return new size img
	 *
	 * @param int $widht
	 * @param int $height
	 *
	 * @return string
	 */
	function trim_img_by_url( $thumb, $widht = 848, $height = 400 ) {
		$thumb = revo_resize_image_by_url( $thumb, $widht, $height, 1 );

		return esc_url( $thumb );

	}

	/**
	 * @param string $before
	 * @param string $after
	 * @param bool|true $echo
	 * @param array $args
	 * @param null $wp_query
	 *
	 * @return int|string pagination in categorias
	 */
	function revo_pagenavi( $max_page = false, $before = '', $after = '', $echo = true, $args = array(), $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		// the default settings
		$default_args = array(
			'text_num_page'   => '',
			// Text before pagination. {current} - current; {last} - last (pr. 'Page {current} of {last}' get 'Page 4 of 60 ")
			'num_pages'       => 10,
			// how many links to display
			'step_link'       => 10,
			// Links increments (value - the number, the step size (at. 1,2,3 ... 10,20,30). Put 0 if such references are not needed.
			'dotright_text'   => '',
			// intermediate text "to".
			'dotright_text2'  => '',
			//intermediate text "after."
			'back_text'       => '<i class="fa fa-angle-double-left"></i> ' . esc_html__( 'Previous', 'revo' ),
			// text "go to the previous page." Put 0 if this reference is not needed
			'next_text'       => esc_html__( 'Next', 'revo' ) . ' <i class="fa fa-angle-double-right"></i>',
			// text "go to the next page." Put 0 if this reference is not needed.
			'first_page_text' => 0,
			// text "to the first page." Put 0 if instead of text you need to show a page number.
			'last_page_text'  => 0,
			// text "to the last page." Put 0 if instead of text you need to show a page number.
		);

		$default_args = apply_filters( 'revo_pagenavi_args', $default_args ); //to be able to establish their default values

		$args = array_merge( $default_args, $args );

		extract( $args );

		$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
		$paged          = (int) $wp_query->query_vars['paged'];
		if ( $max_page == false ) {
			$max_page = $wp_query->max_num_pages;
		}

		//check the need for navigation
		if ( $max_page <= 1 ) {
			return false;
		}

		if ( empty( $paged ) || $paged == 0 ) {
			$paged = 1;
		}

		$pages_to_show         = intval( $num_pages );
		$pages_to_show_minus_1 = $pages_to_show - 1;

		$half_page_start = floor( $pages_to_show_minus_1 / 2 ); // how many links to the current page
		$half_page_end   = ceil( $pages_to_show_minus_1 / 2 ); // how many links after current page

		$start_page = $paged - $half_page_start; //first page
		$end_page   = $paged + $half_page_end; // the last page (conditionally)

		if ( $start_page <= 0 ) {
			$start_page = 1;
		}
		if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if ( $end_page > $max_page ) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page   = (int) $max_page;
		}

		if ( $start_page <= 0 ) {
			$start_page = 1;
		}

		// display navigation
		$out = '';

		// Create a base to cause get_pagenum_link once
		$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
		$first_url = get_pagenum_link( 1 );
		if ( false === strpos( $first_url, '?' ) ) {
			$first_url = user_trailingslashit( $first_url );
		}

		$out .= $before . "<ul class='pagination'>\n";

		if ( $text_num_page ) {
			$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
			$out .= sprintf( "<li><span class='pages'>$text_num_page</span></li> ", $paged, $max_page );
		}


		// ago
		if ( $back_text && $paged != 1 ) {
			$out .= '<li><a class="prev" href="' . ( ( $paged - 1 ) == 1 ? $first_url : str_replace( '___', ( $paged - 1 ), $link_base ) ) . '">' . $back_text . '</a></li> ';
		} else {
			$out .= '<li class="disabled"><a>' . $back_text . '</a></li> ';

		}
		// to the begining
		if ( $start_page >= 2 && $pages_to_show < $max_page ) {
			$out .= '<li><a class="first" href="' . $first_url . '">' . ( $first_page_text ? $first_page_text : 1 ) . '</a></li> ';
			if ( $dotright_text && $start_page != 2 ) {
				$out .= '<li><span class="extend">' . $dotright_text . '</span> </li>';
			}
		}
		// pagination
		for ( $i = $start_page; $i <= $end_page; $i ++ ) {
			if ( $i == $paged ) {
				$out .= '<li class="active">' . '<a href="#">' . $i . ' <span class="sr-only">(current)</span></a>' . '</li> ';
			} elseif ( $i == 1 ) {
				$out .= '<li><a href="' . $first_url . '">1</li></a> ';
			} else {
				$out .= '<li><a href="' . str_replace( '___', $i, $link_base ) . '">' . $i . '</a></li> ';
			}
		}


		// links increments
		$dd = 0;
		if ( $step_link && $end_page < $max_page ) {
			for ( $i = $end_page + 1; $i <= $max_page; $i ++ ) {
				if ( $i % $step_link == 0 && $i !== $num_pages ) {
					if ( ++ $dd == 1 ) {
						$out .= '<span class="extend">' . $dotright_text2 . '</span> ';
					}
					$out .= '<li><a href="' . str_replace( '___', $i, $link_base ) . '">' . $i . '</a></li> ';
				}
			}
		}

		// In the end
		if ( $end_page < $max_page ) {
			if ( $dotright_text && $end_page != ( $max_page - 1 ) ) {
				$out .= '<span class="extend">' . $dotright_text2 . '</span> ';
			}
			$out .= '<li><a class="last" href="' . str_replace( '___', $max_page, $link_base ) . '">' . ( $last_page_text ? $last_page_text : $max_page ) . '</a></li> ';
		}
		// forward
		if ( $next_text && $paged != $end_page ) {
			$out .= '<li><a class="next" href="' . str_replace( '___', ( $paged + 1 ), $link_base ) . '">' . $next_text . '</a></li> ';
		} else {
			$out .= '<li class="disabled"><a class="next" href="' . '">' . $next_text . '</a> </li>';

		}

		$out .= "</ul>" . $after . "\n";

		$out = apply_filters( 'kama_pagenavi', $out );

		if ( $echo ) {
			return print $out;
		}

		return $out;
	}

	/**
	 * get avatar url
	 */
	function get_url_img_avatar( $user_ID, $width = 128, $height = 128, $class = "", $return = false ) {

		preg_match( "/src=(.*?) /i", get_avatar( $user_ID, 120 ), $matches );
		$img_url = substr( trim( $matches[1] ), 1, - 1 );
		if ( $return ) {
			return esc_url( $img_url );
		} else {
			echo '<img src="' . esc_url( $img_url ) . '" class="' . esc_attr( $class ) . '" height="' . esc_attr( $height ) . '" width="' . esc_attr( $width ) . '" alt="">';
		}
	}


}

$GLOBALS['Revo_class'] = new Revo_class();


function revo_resize_image( $thumb_id, $width, $height, $crop ) {
	// Get the image source for the attachment, note the following:
	// $image_src[0] = the URL of the image
	// $image_src[1] = the width of the image
	// $image_src[2] = the height of the image
	$image_src = wp_get_attachment_image_src( $thumb_id, 'full' );

	// If either the width or height of the full size image is bigger than the target size, then we know we need to resize
	if ( $image_src[1] > $width || $image_src[2] > $height ) {
		$resized_image_path = '';
		$resized_image_url  = '';

		$file_path = get_attached_file( $thumb_id );

		// Get the file info and extension
		$file_info = pathinfo( $file_path );
		$extension = '.' . $file_info['extension'];

		// The image path without the extension
		$no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];

		// Build the cropped image path and URL with the width and height as part of the name
		$cropped_image_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
		$cropped_image_url  = str_replace( basename( $image_src[0] ), basename( $cropped_image_path ), $image_src[0] );

		// Check if resized cropped version already exists (for crop = true but will also work for crop = false if the sizes match)
		if ( file_exists( $cropped_image_path ) ) {
			return array(
				'url'    => esc_url( $cropped_image_url ),
				'width'  => esc_html( $width ),
				'height' => esc_html( $height )
			);
		} else {
			$resized_image_path = $cropped_image_path;
			$resized_image_url  = $cropped_image_url;
		}

		// If crop is false then check proportional image
		if ( $crop == false ) {
			// Calculate the size proportionally
			$proportional_size       = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$proportional_image_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
			$proportional_image_url  = str_replace( basename( $image_src[0] ), basename( $proportional_image_path ), $image_src[0] );

			// Check if resized proportional version already exists
			if ( file_exists( $proportional_image_path ) ) {
				return array(
					'url'    => esc_url( $proportional_image_url ),
					'width'  => esc_html( $proportional_size[0] ),
					'height' => esc_html( $proportional_size[1] )
				);
			} else {
				$resized_image_path = $proportional_image_path;
				$resized_image_url  = $proportional_image_url;
			}
		}

		// Getting this far means that neither the cropped resized image nor the proportional
		// resized image exists, so we use a WP_Image_Editor to do the resizing and save to disk


		$image_editor = wp_get_image_editor( $file_path );

		if ( ! is_wp_error( $image_editor ) ) {
			$resized   = $image_editor->resize( $width, $height, $crop );
			$new_image = $image_editor->save( $resized_image_path );
		} else {
			$resized   = null;
			$new_image = array( 'width' => 0, 'height' => 0 );
		}

		return array(
			'url'    => esc_url( $resized_image_url ),
			'width'  => esc_html( $new_image['width'] ),
			'height' => esc_html( $new_image['height'] )
		);
	}

	// Default output, no resizing
	return array(
		'url'    => esc_url( $image_src[0] ),
		'width'  => esc_html( $image_src[1] ),
		'height' => esc_html( $image_src[2] )
	);
}


function revo_resize_image_by_url( $url, $width, $height, $crop ) {
	// Get the image source for the attachment, note the following:
	// $image_src[0] = the URL of the image
	// $image_src[1] = the width of the image
	// $image_src[2] = the height of the image
	//$image_src = wp_get_attachment_image_src( $thumb_id, 'full' );

	// If either the width or height of the full size image is bigger than the target size, then we know we need to resize

	$resized_image_path = '';
	$resized_image_url  = '';
	$path               = parse_url( $url, PHP_URL_PATH );


	$file_path = $_SERVER['DOCUMENT_ROOT'] . $path;
	$extension = '';
	// Get the file info and extension
	$file_info = pathinfo( $file_path );
	if ( isset( $file_info['extension'] ) ) {
		$extension = '.' . $file_info['extension'];
	}

	// The image path without the extension
	$no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];

	// Build the cropped image path and URL with the width and height as part of the name
	$cropped_image_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
	$cropped_image_url  = str_replace( basename( $url ), basename( $cropped_image_path ), $url );

	// Check if resized cropped version already exists (for crop = true but will also work for crop = false if the sizes match)
	if ( file_exists( $cropped_image_path ) ) {
		return esc_url( $cropped_image_url );
	} else {
		$resized_image_path = $cropped_image_path;
		$resized_image_url  = $cropped_image_url;
	}

	// If crop is false then check proportional image
	if ( $crop == false ) {
		// Calculate the size proportionally
		$proportional_size       = wp_constrain_dimensions( $width, $height, $width, $height );
		$proportional_image_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
		$proportional_image_url  = str_replace( basename( $width ), basename( $proportional_image_path ), $width );

		// Check if resized proportional version already exists
		if ( file_exists( $proportional_image_path ) ) {
			return esc_url( $proportional_image_url );
		} else {
			$resized_image_path = $proportional_image_path;
			$resized_image_url  = $proportional_image_url;
		}
	}

	// Getting this far means that neither the cropped resized image nor the proportional
	// resized image exists, so we use a WP_Image_Editor to do the resizing and save to disk


	$image_editor = wp_get_image_editor( $file_path );

	if ( ! is_wp_error( $image_editor ) ) {
		$crop      = array( 'center', 'center' );
		$resized   = $image_editor->resize( $width, $height, $crop );
		$new_image = $image_editor->save( $resized_image_path );
	} else {
		$resized   = null;
		$new_image = array( 'width' => 0, 'height' => 0 );
	}

	return esc_url( $resized_image_url );


}

function revo_get_global_class() {
	global $Revo_class;

	return $Revo_class;
}

add_filter( 'get_the_excerpt', 'revo_exc', 90 );
/**
 * carves out a brief description of shortcodes
 *
 * @param $param
 *
 * @return mixed
 */
function revo_exc( $param ) {
	$param = preg_replace( "/\[.*?\].*?\[\/.*?\]/", "", $param );
	$param = preg_replace( "/<.*?>/", "", $param );

	return $param;
}

function revo_newBasename( $path = false, $is_page = false ) {
	if ( $path == false && $is_page = false ) {
		$path = get_page_template();
	}
	if ( $path == false && $is_page = true && is_page() ) {
		$path = get_page_template();
	}
	$path       = str_replace( '\\', '/', $path );
	$path_array = explode( '/', $path );

	return array_pop( $path_array );
}

function revo_wp_comments_corenavi() {
	$pages = '';
	$max   = get_comment_pages_count();
	$page  = get_query_var( 'cpage' );
	if ( ! $page ) {
		$page = 1;
	}
	$a['current']   = $page;
	$a['echo']      = false;
	$total          = 0; //1 - display text "Page N of N", 0 - not to withdraw
	$a['mid_size']  = 3; // how many links to display on the left and right of the current
	$a['end_size']  = 1; // how many links to show the beginning and the end
	$a['prev_text'] = '&laquo;'; // link text "Previous"
	$a['next_text'] = '&raquo;'; // link text "Next page"
	if ( $max > 1 ) {
		echo '<div class="commentNavigation">';
	}
	echo esc_attr( $pages ) . paginate_comments_links( $a );
	if ( $max > 1 ) {
		echo '</div>';
	}
}

add_filter( 'single_cat_title', 'revo_get_fa_icons_cat_title', 10, 1 );
function revo_get_fa_icons_cat_title( $n ) {
	return $GLOBALS['Revo_class']->get_fa_icons( $n, true );
}

function revo_get_url_by_avatar( $get_avatar ) {
	preg_match( '/src="(.*?)"/i', $get_avatar, $matches );

	return $matches[1];
}


function revo_link_pages() {
	/* ================ Settings ================ */
	$text_num_page   = ''; // The text for the number of pages. {current} is replaced by the current, and {last} the last. Example: "Page {current} of {last} '= Page 4 of 60
	$num_pages       = 10; // how many links to display
	$stepLink        = 10; // after the navigation links to specific step (value = the number (a pitch) or '' if you do not need to show). Example: 1,2,3 ... 10,20,30
	$dotright_text   = '...';
	$dotright_text2  = '...';
	$backtext        = '&#171; ';
	$nexttext        = '&raquo;';
	$first_page_text = ''; //  text "to the first page" or put '', instead of the text if you need to show a page number.
	$last_page_text  = ''; // text "to the last page 'or write' 'if, instead of the text you need to show a page number.
	/* ================ End Settings ================ */
	global $page, $numpages;
	$paged    = (int) $page;
	$max_page = $numpages;
	if ( $max_page <= 1 ) {
		return false;
	} //check the need for navigation
	if ( empty( $paged ) || $paged == 0 ) {
		$paged = 1;
	}
	$pages_to_show         = intval( $num_pages );
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start       = floor( $pages_to_show_minus_1 / 2 ); //how many links to the current page
	$half_page_end         = ceil( $pages_to_show_minus_1 / 2 ); //how many links after current page
	$start_page            = $paged - $half_page_start; //first page
	$end_page              = $paged + $half_page_end; //last page (conditionally)
	if ( $start_page <= 0 ) {
		$start_page = 1;
	}
	if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if ( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page   = (int) $max_page;
	}
	if ( $start_page <= 0 ) {
		$start_page = 1;
	}
	$out = '';
	$out .= "<ul class='pagination'>\n";
	if ( $text_num_page ) {
		$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
		$out .= sprintf( " <li class=\"active\"><a href=\"#\"><span class='sr-only'>$text_num_page</span></a></li>", $paged, $max_page );
	}
	if ( $backtext && $paged != 1 ) {
		$out .= '<li>' . _wp_link_page( ( $paged - 1 ) ) . $backtext . '</a>';
	}
	if ( $start_page >= 2 && $pages_to_show < $max_page ) {
		$out .= _wp_link_page( 1 ) . ( $first_page_text ? $first_page_text : 1 ) . '</a>';
		if ( $dotright_text && $start_page != 2 ) {
			$out .= '<span class="extend">' . $dotright_text . '</span>';
		}
	}
	for ( $i = $start_page; $i <= $end_page; $i ++ ) {
		if ( $i == $paged ) {
			$out .= '<li class="active"><a href="#">' . $i . ' <span class="sr-only"></span></a></li>
';
		} else {
			$out .= '<li><a href="' . _wp_link_page( $i ) . '">' . $i . '</a></li>';
		}
	}
	//Links increments
	if ( $stepLink && $end_page < $max_page ) {
		for ( $i = $end_page + 1; $i <= $max_page; $i ++ ) {
			if ( $i % $stepLink == 0 && $i !== $num_pages ) {
				if ( ++ $dd == 1 ) {
					$out .= '<span class="extend">' . $dotright_text2 . '</span>';
				}
				$out .= '<li><a href="' . _wp_link_page( $i ) . '">' . $i . '</a></li>';
			}
		}
	}
	if ( $end_page < $max_page ) {
		if ( $dotright_text && $end_page != ( $max_page - 1 ) ) {
			$out .= '<span class="extend">' . $dotright_text2 . '</span>';
		}
		$out .= '<li>' . _wp_link_page( $max_page ) . ( $last_page_text ? $last_page_text : $max_page ) . '</a></li>';
	}
	if ( $nexttext && $paged != $end_page ) {
		$out .= '<li>' . _wp_link_page( ( $paged + 1 ) ) . $nexttext . '</a></li>';
	}
	$out .= "</ul>";
	$out = str_replace( '"<a href="', '"', $out );
	$out = str_replace( '">">', '">', $out );

	return wp_kses_post( $out );
}

function revo_get_member_permalink( $uid ) {
	$pgs = get_pages( array(
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'template-members-list.php'
	) );
	if ( ! isset( $pgs[0]->ID ) ) {
		return "#";
	}
	$editlink = add_query_arg( 'page', $uid, get_permalink( $pgs[0]->ID ) );

	return $editlink;
}

if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

function revo_get_permalink_by_template( $template, $pageid = null ) {
	$pgs = get_pages( array(
		'meta_key'   => '_wp_page_template',
		'meta_value' => $template
	) );
	if ( ! isset( $pgs[0]->ID ) ) {
		return false;
	}
	if ( $pageid == null ) {
		return get_permalink( $pgs[0]->ID );
	}
	if ( '' != get_option( 'permalink_structure' ) ) {
		// using pretty permalinks, append to url
		return user_trailingslashit( get_permalink( $pgs[0]->ID ) . $pageid ); // www.example.com/pagename/test
	} else {
		return add_query_arg( 'page', $pageid, get_permalink( $pgs[0]->ID ) );
	}


}


if ( ! function_exists( 'revo_get_youtube_id' ) ) {

	function revo_get_youtube_id( $value ) {
		$id = null;
		if ( preg_match( '/youtu.be\/(.*)/', $value, $math ) ) {
			$id = $math[1];
		} elseif ( preg_match( '/youtube.com.*?v=(.*)/', $value, $math ) ) {
			$id = $math[1];
		} else {
			$id = $value;
		}

		$id = str_replace( "http://", '', $id );
		$id = str_replace( "https://", '', $id );

		return $id;
	}
}

function revo_video_patern( $carry, $item ) {
	if ( strpos( $item, '#' ) === 0 ) {
		// Assuming '#...#i' regexps.
		$item = substr( $item, 1, - 2 );
	} else {
		// Assuming glob patterns.
		$item = str_replace( '*', '(.+)', $item );
	}

	return $carry ? $carry . ')|(' . $item : $item;
}

if ( ! function_exists( 'revo_theme_oembed_videos' ) ) :
	function revo_theme_oembed_videos( $default = false ) {
		global $post;
		if ( $post && $post->post_content ) {
			global $shortcode_tags;
			// Make a copy of global shortcode tags - we'll temporarily overwrite it.
			$theme_shortcode_tags = $shortcode_tags;
			// The shortcodes we're interested in.
			$shortcode_tags = apply_filters( 'revo_vide_embed_tags', array(
				'video' => $theme_shortcode_tags['video'],
				'embed' => $theme_shortcode_tags['embed']
			), $theme_shortcode_tags );
			// Get the absurd shortcode regexp.
			$video_regex = '#' . get_shortcode_regex() . '#i';
			// Restore global shortcode tags.
			$shortcode_tags = $theme_shortcode_tags;
			$pattern_array  = array( $video_regex );

			if ( function_exists( 'revo_video_arr' ) ) {
				$pattern_array = array_merge( $pattern_array, array_keys( $providers =
					revo_video_arr()
				) );
			}

			// Or all the patterns together.

			$pattern = '#(' . array_reduce( $pattern_array, "revo_video_patern" ) . ')#is';
			// Simplistic parse of content line by line.
			$lines = explode( "\n", $post->post_content );
			$i     = 0;
			foreach ( $lines as $line ) {
				$line = trim( $line );
				if ( preg_match( $pattern, $line, $matches ) && $i == 0 ) {
					if ( strpos( $matches[0], '[' ) === 0 ) {
						$ret = do_shortcode( $matches[0] );
					} elseif ( preg_match( '#youtu#', $matches[0] ) ) {

						if ( $default ) {
							$url = 'https://www.youtube.com/embed/' . ( revo_get_youtube_id( $matches[0] ) ) . '?feature=oembed';
							$ret = '<' . 'iframe' . ' src="' . esc_url_raw( $url ) . ' " class="youtube_video"  allowfullscreen></iframe>';

						} else {

							ob_start();
							?>
							<div class="video-mask">
								<a href="<?php echo esc_url( 'http://youtu.be/' . revo_get_youtube_id( $matches[0] ) ); ?>"
								   class="fa fa-play-circle js-play"></a>
							</div>
							<img class="video_thumb" width="360" height="360" alt=""
							     src="<?php $img = 'http://img.youtube.com/vi/' . esc_attr( revo_get_youtube_id( $matches[0] ) ) . '/sddefault.jpg';
							     echo esc_url( $img ); ?> ">

							<?php
							$ret = ob_get_clean();
						}
						$i ++;

					} else {
						$i ++;
						$ret = wp_video_shortcode( array( 'src' => $matches[0] ) );
						$ret .= $matches[0];
					}
					$ret = preg_replace( '/width=".*?"/', '', $ret );
					$ret = preg_replace( '/height=".*?"/', '', $ret );
					if ( preg_match( '#http://wordpress.tv/#', $ret ) ) {

						$img = get_template_directory_uri() . '/img/blog/thumb.jpg';
						$ret = '<img src=" ' . esc_url( $img ) . '"
							alt="' . get_the_title() . ' ">';
					} else {
						$ret = '<div class="embed-responsive embed-responsive-16by9">' . $ret;
						$ret = $ret . '</div>';
					}

					print( $ret );
				}
			}
			if ( ! isset( $ret ) ) {
				$img = get_template_directory_uri() . '/img/blog/thumb.jpg';
				$ret = '<img src=" ' . esc_url( $img ) . '"
							alt="' . get_the_title() . ' ">';
				print( $ret );
			}
		}
	}
endif;


if ( ! function_exists( 'revo_post_gallery_slide' ) ) :


	/**
	 * its diplay gallery in posts
	 *
	 * @param bool $cut
	 * @param int $width
	 * @param int $height
	 */
	function revo_post_gallery_slide( $width = 360, $height = 360 ) {


		global $post;

		global $Revo_class;
		$gallery = get_post_gallery_images( $post );

		$params = array( 'width' => $width, 'height' => $height, 'crop' => true );

		?>

		<div class="gallery-carousel carousel">
			<?php
			if ( has_post_thumbnail() ) {
				$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
				$feature_src       = wp_get_attachment_image_src( $post_thumbnail_id, 'fullsize' );
				$img               = $Revo_class->get_post_thumbnail( $post->ID, $width, $height, false, true, true );

				if ( $img{1} ) {


					?>
					<div class="gallery-item  ">
						<img alt="<?php the_title(); ?>"
						     src=<?php echo esc_url( $img ); ?>>
					</div>
					<?php
				} else {
					?>
					<div class="gallery-item  ">
						<img alt="<?php the_title(); ?>"
						     src=<?php echo esc_url( $feature_src[0] ); ?>>
					</div>
					<?php
				}

			}

			foreach ( $gallery as $image_url ) {
				if ( $image_url ) {
					?>
					<div class="gallery-item ">
						<img alt="<?php the_title(); ?>"
						     src=<?php echo esc_url( revo_resize_image_by_url( $image_url, $width, $height, 1 ) ); ?>>
					</div>
					<?php
				}


			}
			?>
		</div>

		<?php


	}
endif;

function revo_shortcode_atts_galler() {

}


if ( ! function_exists( 'revo_limit_excerpt' ) ) :
	function revo_limit_excerpt( $limit, $content = null ) {

		if ( empty( $content ) ) {
			$content = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', get_the_excerpt() );
		}
		$out = $content;
		$out = preg_replace( "#\<code\>.*?\<\/code\>#s", '', $out );
		$out = preg_replace( "#<pre>.*?</pre>#im", '', $out );
		$out = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $out );
		$out = preg_replace( "#\[.*?\]#", '', $out );
		$out = preg_replace( "#\<.*?\>#", '', $out );

		$excerpt = explode( ' ', $content, $limit + 1 );
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( " ", $excerpt );

		} else {
			$excerpt = implode( " ", $excerpt );

		}
		$excerpt .= '...';
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

		$output = $excerpt;

		return $output;

	}
endif;


if ( ! function_exists( 'revo_words_limit' ) ) :

	function revo_words_limit() {
		$limit = get_theme_mod( 'revo_blog_list_limit_word' );

		if ( empty( $limit ) ) {
			return 50;
		}

		return $limit;
	}

endif;


if ( ! function_exists( 'revo_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 */
	function revo_post_thumbnail( $widht = 360, $height = 360, $thumb = true ) {
		global $Revo_class;
		$img = $Revo_class->get_post_thumbnail( get_the_ID(), $widht, $height, false, true, true );

		// default
		if ( ! isset( $img{5} ) && $thumb == true ) {
			$img = get_template_directory_uri() . '/img/blog/thumb.jpg';

		}

		if ( isset( $img{5} ) ) {
			?>

			<img
				src=" <?php echo esc_url( $img ); ?>"
				alt="<?php the_title(); ?> ">

			<?php
		}
	}
endif;


function revo_get_option( $id ) {
	global $revo_opt;

	return $revo_opt[ $id ];
}


//
add_action( 'save_post', 'revo_my_save_post_function', 10, 3 );

/*
 * generate one page menu
 */
function revo_my_save_post_function( $post_ID, $post, $update ) {

	if ( ( isset( $_POST["revo_menu_name"] ) && ! empty( $_POST["revo_menu_name"] ) ) || ( isset( $_POST["revo_munu_url"] ) && ! empty( $_POST["revo_munu_url"] ) ) ) {

	} else {


		$frontpage_id = get_option( 'page_on_front' );
		//front page/*
		if ( $post_ID == $frontpage_id ) {
			$post_content = wp_unslash( ! empty( $_REQUEST['content'] ) ? $_REQUEST['content'] : $post_data['content'] );

			preg_match_all( '#\[revo_one_page_section.*?title="(.*?)".*?id="(.*?)".*?\]#', $post_content, $math );


			if ( isset( $math[2] ) ) {

				$arr_items  = array();
				$i          = 0;
				$right_menu = false;
				$left_menu  = false;
				foreach ( $math[2] as $item ) {
					if ( preg_match( '#right_s="1"#', $math[0][ $i ] ) ) {
						$right_menu .= '<li><a hre' . 'f="' . esc_attr( "#" . $item ) . '">' .
						               esc_html( $math[1][ $i ] ) . '</a></li>';


					} else {

						$left_menu .= '<li><a hre' . 'f="' . esc_attr( "#" . $item ) . '">' .
						              esc_html( $math[1][ $i ] ) . '</a></li>';

					}
					$i ++;
				}

				update_option( 'revo_one_page_menu', $left_menu );
				update_option( 'revo_one_page_menu_right', $right_menu );

			} else {
				delete_option( 'revo_one_page_menu' );
				delete_option( 'revo_one_page_menu_right' );

			}


		} else {
			//custum page generate menu
			$content = "";
			if ( isset( $post_data['content'] ) ) {
				$content = $post_data['content'];
			}

			$post_content = wp_unslash( ! empty( $_REQUEST['content'] ) ? $_REQUEST['content'] : $content );

			preg_match_all( '#\[revo_one_page_section.*?title="(.*?)".*?id="(.*?)".*?\]#', $post_content, $math );


			if ( isset( $math[2] ) ) {

				$arr_items  = array();
				$i          = 0;
				$right_menu = false;
				$left_menu  = false;
				foreach ( $math[2] as $item ) {
					if ( preg_match( '#right_s="1"#', $math[0][ $i ] ) ) {
						$right_menu .= '<li><a hre' . 'f="' . esc_attr( "#" . $item ) . '">' .
						               esc_html( $math[1][ $i ] ) . '</a></li>';


					} else {

						$left_menu .= '<li><a hre' . 'f="' . esc_attr( "#" . $item ) . '">' .
						              esc_html( $math[1][ $i ] ) . '</a></li>';

					}
					$i ++;
				}

				update_option( 'revo_one_page_menu_' . $post_ID, $left_menu );
				update_option( 'revo_one_page_menu_right_' . $post_ID, $right_menu );


			} else {
				delete_option( 'revo_one_page_menu_' . $post_ID );
				delete_option( 'revo_one_page_menu_right_' . $post_ID );

			}
		}
	}
}


/** add menu elements
 *
 * @param $items
 * @param $args
 *
 * @return string
 */
function revo_social_menu_item( $items, $args ) {

	$frontpage_id = get_option( 'page_on_front' );
	$post_ID      = get_the_ID();
	$newitems     = $items;

	if ( get_option( 'revo_one_page_menu' ) == true && ( $args->theme_location == 'revo_topmenu' || $args->theme_location == 'revo_topmenu_blog' ) ) {

		if ( ! is_front_page() && get_option( 'revo_one_page_menu_' . $post_ID ) == false ) {
			$menu = get_option( 'revo_one_page_menu' );
			$menu = str_replace( '#', get_home_url( '/' ) . '/#', $menu );

		} else {


			$menu = get_option( 'revo_one_page_menu_' . $post_ID );

		}
		if ( is_front_page() ) {
			$menu = get_option( 'revo_one_page_menu' );
		}

		$newitems = $menu . $newitems;
	}
	if ( get_option( 'revo_one_page_menu_right' ) == true && ( $args->theme_location == 'revo_topmenu' || $args->theme_location == 'revo_topmenu_blog' ) ) {


		if ( ! is_front_page() && get_option( 'revo_one_page_menu_right_' . $post_ID ) == false ) {
			$menu = get_option( 'revo_one_page_menu_right' );;
			$menu = str_replace( '#', get_home_url( '/' ) . '/#', $menu );

		} else {


			$menu = get_option( 'revo_one_page_menu_right_' . $post_ID );

		}
		if ( is_front_page() ) {
			$menu = get_option( 'revo_one_page_menu' );
		}

		$newitems .= $menu;
	}

	return $newitems;
}

add_filter( 'wp_nav_menu_items', 'revo_social_menu_item', 10, 2 );


/*
 *  it display lis of post cat
 */
function revo_get_list_cats() {
	global $post;
	$categories = get_the_category( $post->ID );
	foreach ( $categories as $category ) {
		?>

		<a href="<?php esc_url( get_category_link( $category->term_id ) ); ?> ">
			<?php echo esc_attr( $category->name ); ?> </a>
		<?php
	}
}


