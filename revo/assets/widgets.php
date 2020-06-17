<?php

add_action( 'widgets_init', 'revo_widgets_int' );


/*popular_places*/
function revo_widgets_int() {

	//sidibar widget


	register_widget( 'revo_Recent_posts' );
	register_widget( 'revo_Recent_comments' );
	register_widget( 'revo_TAG_Wigdet_class' );
	register_widget( 'revo_footer_info' );
	register_widget( 'revo_NEWS_LETTER_class' );
	register_widget( 'revo_menu_Wigdet_class' );
	register_widget( 'revo_author_class' );
	register_widget( 'revo_gallery_class' );


	//footer widget


}

class revo_gallery_class extends WP_Widget {

	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo gallery', 'revo' ),
			'description' => esc_html__( 'It displays gallery', 'revo' ),
			'classname'   => 'revo_gallery'
		);
		parent::__construct( 'revo_gallery', esc_html__( 'Revo gallery', 'revo' ), $args );

	}


	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Gallery', 'revo' ), // Legacy.
				'photo' => '',

			)
		);

		extract( $instance );

		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'photo' ) ); ?>"> <?php esc_html_e( 'Text:',
					'revo' ); ?></label>
            <textarea cols="10" rows="10" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'photo' ) ); ?>"
                      name="<?php echo esc_attr( $this->get_field_name( 'photo' ) ); ?>"
            ><?php if ( isset( $photo ) ) {
		            echo esc_attr( $photo );
	            } ?></textarea>
		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		//default values
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'gallery', 'revo' ), // Legacy.
				'photo' => '',

			)
		);

		extract( $args );
		extract( $instance );

		// Create a filter to the other plug-ins can change them
		$title = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		preg_match( '#ids="(.*?)"#', $photo, $math );


		$arr = explode( ',', $math[1] );

		$before_widget = str_replace( 'class="', 'class=" widget widget widget-gallery js-gallery  column col-sm-6 col-md-3" ', $before_widget );
		echo wp_kses_post( $before_widget . "" );
		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );


		?>


		<ul>

			<?php
			$params = array( 'width' => 80, 'height' => 80, 'crop' => true );
			//$params2 = array('full');

			foreach ( $arr as $shortcode ) {


				$img = wp_get_attachment_image_src( $shortcode, array( 80, 80 ) );

				if ( isset ( $img[0] ) ) {


					?>

					<li>
						<a href="<?php echo esc_url( $img[0] ); ?>" title="Gallery image 1">
							<span class="gallery-item-hover"><i class="fa fa-search-plus"></i></span>
							<?php $arr_img = revo_resize_image( $shortcode, 80, 80, true ); ?>
							<img alt="" src="<?php echo esc_url( $arr_img['url'] ); ?>">

						</a>
					</li>
					<?php

				}
			}
			?>

		</ul>


		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}


/*
 * revo_author_Wigdet_class
 */

class revo_author_class extends WP_Widget {

	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo author', 'revo' ),
			'description' => esc_html__( 'It displays information about the author', 'revo' ),
			'classname'   => 'revo_author_'
		);
		parent::__construct( 'revo_author_', esc_html__( 'Revo author', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'ABOUT ME', 'revo' ), // Legacy.
				'photo' => '',
				'name'  => esc_html__( 'TOM ROBBINS', 'revo' ),
				'prof'  => esc_html__( 'WEB DESIGNER', 'revo' ),
				'url'   => '',
			)
		);

		extract( $instance );

		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'photo' ) ); ?>"> <?php esc_html_e( 'Author photo:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'photo' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'photo' ) ); ?>" type="text"
			       value="<?php if ( isset( $photo ) ) {
				       echo esc_attr( $photo );
			       } ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"> <?php esc_html_e( 'Author photo(insert image url)', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text"
			       value="<?php if ( isset( $url ) ) {
				       echo esc_attr( $url );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"> <?php esc_html_e( 'Author name:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text"
			       value="<?php if ( isset( $name ) ) {
				       echo esc_attr( $name );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'prof' ) ); ?>"> <?php esc_html_e( 'Author profession:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'prof' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'prof' ) ); ?>" type="text"
			       value="<?php if ( isset( $prof ) ) {
				       echo esc_attr( $prof );
			       } ?>">
		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		//default values
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'ABOUT ME', 'revo' ), // Legacy.
				'photo' => '',
				'name'  => esc_html__( 'TOM ROBBINS', 'revo' ),
				'prof'  => esc_html__( 'WEB DESIGNER', 'revo' ),
				'url'   => '',
			)
		);

		extract( $args );
		extract( $instance );

		// Create a filter to the other plug-ins can change them
		$title = sanitize_text_field( apply_filters( 'widget_title', $title ) );

		echo wp_kses_post( $before_widget . "" );
		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );


		?>


		<?php
		if ( isset( $photo{5} ) ) {

			?>
			<img alt="" src="<?php echo esc_url( $photo ) ?>">
			<?php

		} else {
			$img = get_template_directory_uri() . "/img/blog/widget-text-img.jpg"; ?>
			<img alt="" src="<?php echo esc_url( $img ) ?>">
			<?php

		} ?>

		<h4 class="widget-about-title"> <?php echo esc_html( $name ) ?></h4>
		<a href="<?php echo esc_html( $url ) ?>" class="subtitle"><?php echo esc_html( $prof ) ?></a>


		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}


}


class revo_menu_Wigdet_class extends WP_Widget {

	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
	public function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo  Menu', 'revo' ),
			'description' => esc_html__( 'It displays Menu', 'revo' ),
			'classname'   => 'revo_Menu'
		);
		parent::__construct( 'nav_menu', esc_html__( 'Revo  Menu', 'revo' ), $args );


	}

	/**
	 * Outputs the content for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );


		?>
		<div class="col-md-2 column col-sm-6">
			<div class="widget-links">
				<?php
				if ( ! empty( $instance['title'] ) ) {
					echo wp_kses_post( $args['before_title'] . $instance['title'] . $args['after_title'] );
				}

				$nav_menu_args = array(
					'fallback_cb' => '',
					'menu'        => $nav_menu
				);

				wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );

				?>
			</div>
		</div>
		<?php

	}

	/**
	 * Handles updating settings for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( stripslashes( $new_instance['title'] ) );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}

		return $instance;
	}

	/**
	 * Outputs the settings form for the Custom Menu widget.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) {

		} ?>>
			<?php
			if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( esc_html__( 'No menus have been created yet.', "revo" ) . '<a href="%s">' . esc_html__( "Create some", "revo" ) . '</a>.', esc_url( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) {

		} ?>>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'revo' ) ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				       value="<?php echo esc_attr( $title ); ?>"/>
			</p>

			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"><?php esc_html_e( 'Select Menu:', 'revo' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"
				        name="<?php echo esc_attr( $this->get_field_name( 'nav_menu' ) ); ?>">
					<option value="0"><?php esc_html_e( '&mdash; Select &mdash;', 'revo' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option
							value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
		</div>
		<?php
	}
}


class revo_NEWS_LETTER_class extends WP_Widget {

	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo NEWS LETTER', 'revo' ),
			'description' => esc_html__( 'It displays NEWS LETTER', 'revo' ),
			'classname'   => 'revo_news_letter'
		);
		parent::__construct( 'revo_NEWS_LETTER_', esc_html__( 'Revo NEWS_LETTER', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'       => esc_html__( 'NEWS LETTER', 'revo' ), // Legacy.
				'text'        => '', // Legacy URL field.
				'placeholder' => 'Enter Email',
				'text_button' => esc_html__( 'Subscribe', 'revo' )
			)
		);

		extract( $instance );

		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'placeholder' ) ); ?>"> <?php esc_html_e( 'Text placeholder:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'placeholder' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'placeholder' ) ); ?>" type="text"
			       value="<?php if ( isset( $placeholder ) ) {
				       echo esc_attr( $placeholder );
			       } ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text_button' ) ); ?>"> <?php esc_html_e( 'Text button:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_button' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text_button' ) ); ?>" type="text"
			       value="<?php if ( isset( $text_button ) ) {
				       echo esc_attr( $text_button );
			       } ?>">
		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		//default values
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'       => esc_html__( 'SUBSCRIBE NEWSLETTER', 'revo' ), // Legacy.
				'placeholder' => 'Enter Your Email Address ',
				'text_button' => esc_html__( 'SUBSCRIBE', 'revo' )
			)
		);

		extract( $args );
		extract( $instance );

		// Create a filter to the other plug-ins can change them
		$title = sanitize_text_field( apply_filters( 'widget_title', $title ) );

		$before_widget = str_replace( 'class="', 'class=" widget  column col-sm-6 col-md-3" ', $before_widget );
		echo wp_kses_post( $before_widget . "" );

		?>
		<div class="widget widget subscribe">
			<?php

			echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );

			?>


			<form id="js-subscribe-form" action="#" method="post">
				<div class="form-group-sm">
					<input id="mc-email" type="email" name="q" value="" class="btn-block form-control-sm"
					       maxlength="128"
					       placeholder="<?php echo esc_attr( $placeholder ); ?>">
					<label class="mc-label" for="mc-email" id="mc-notification"></label>
				</div>
				<button type="submit" title="subscribe"
				        class="btn btn-sm btn-white hvr-pulse-grow"><?php echo esc_attr( $text_button ); ?></button>
			</form>

		</div>
		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}


}


class revo_footer_info extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo footer info', 'revo' ),
			'description' => esc_html__( 'It displays footer information', 'revo' ),
			'classname'   => 'revo_footer_info'
		);
		parent::__construct( 'revo_footer_info', esc_html__( 'revo footer_info', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(

				'text'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at purus varius odio tempus cursus. Donec quis nibh luctus, posuere velit vitae, commodo dui. Nullam eu blandit orci. Pellentesque sit amet enim sapien. Fusce nec mauris pellentesque, lacinia quam eu, molestie elit.', 'revo' ),
				'logo'  => esc_attr( 'REVO STUDIO', 'revo' ),
				'title' => esc_attr( 'REVO STUDIO HTML TEMPLATE', 'revo' ),


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( ' Insert title',
					'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'logo' ) ) ); ?>"> <?php esc_html_e( ' Insert logo text',
					'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'logo' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'logo' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $logo ) ) {
				       echo esc_attr( $logo );
			       } ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'text' ) ) ); ?>"> <?php esc_html_e( ' Insert text:',
					'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'text' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'text' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       } ?>">
		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {

		extract( $args );
		$instance         = wp_parse_args(
			(array) $instance,
			array(
				'text'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at purus varius odio tempus cursus. Donec quis nibh luctus, posuere velit vitae, commodo dui. Nullam eu blandit orci. Pellentesque sit amet enim sapien. Fusce nec mauris pellentesque, lacinia quam eu, molestie elit.', 'revo' ),
				'logo'  => esc_attr( '', 'revo' ),
				'title' => esc_attr( '', 'revo' ),


			)
		);
		$result           = mb_substr( $instance['logo'], 0, 2 );
		$instance['logo'] = str_replace( $result, '<span class="text-primary">' . $result . '</span>', $instance['logo'] );

		$arr               = explode( ' ', $instance['title'] );
		$arr_h             = implode( " ", array_splice( $arr, 0, 2 ) );
		$instance['title'] = str_replace( $arr_h, '<span class="text-primary">' . $arr_h . '</span>', $instance['title'] );


		// Create a filter to the other plug-ins can change them

		$before_widget = str_replace( 'class="', 'class=" widget  column col-sm-6 col-md-4" ', $before_widget );
		echo wp_kses_post( $before_widget . "" );


		?>
		<h5 class="widget-title">
			<?php echo wp_kses_post( $instance['title'] ); ?>
		</h5>

		<p><?php echo wp_kses_post( $instance['text'] ); ?></p>
		<a href="<?php echo esc_url( get_home_url( '/' ) . '/#home' ) ?> " class="brand js-target-scroll">
			<?php echo wp_kses_post( $instance['logo'] ); ?>
		</a>


		<?php
		echo wp_kses_post( $after_widget );


	}
}


class revo_Recent_posts extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo  Recent posts', 'revo' ),
			'description' => esc_html__( 'It displays a list of tweets', 'revo' ),
			'classname'   => 'revo_Recent_posts'
		);
		parent::__construct( 'revo_Recent_posts', esc_html__( 'Revo Tweets2', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent posts', 'revo' ), // Legacy.
				'text'  => 3


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:',
					'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"> <?php esc_html_e( 'How many show post?',
					'revo' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
			       value="<?php
			       if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       }
			       ?>">

		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );


		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent posts', 'revo' ), // Legacy.
				'Name'  => '',
				'text'  => 3


			)
		);
		extract( $instance );
		// Create a filter to the other plug-ins can change them
		$title         = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		$before_widget = str_replace( 'class="', 'class=" widget shadow widget-twitter ', $before_widget );
		echo wp_kses_post( $before_widget . "" );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );

		$args = array(
			'post_type'           => 'post',
			'orderby'             => 'date',
			'post_status'         => 'publish',
			'posts_per_page'      => $text,
			'ignore_sticky_posts' => true,
			'meta_query'          => array( array( 'key' => '_thumbnail_id' ) )

		);

		global $Revo_class;

		?>


		<?php
		$rent_blog_query = new WP_Query( $args );
		if ( $rent_blog_query->have_posts() ):
			while ( $rent_blog_query->have_posts() ) {
				$rent_blog_query->the_post();
				?>
				<article class="post-item">
					<div class="post-thumb">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>">
							<img alt="<?php the_title(); ?>"
							     src="<?php $Revo_class->get_post_thumbnail( get_the_ID(), 100, 90 ); ?>"
							     width="100" height="90">
						</a>
					</div>
					<div class="post-body">
						<h4>
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
						</h4>

						<div class="post-time"><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?> </div>
						<a href="" class="subtitle">
							<?php $category = get_the_category();
							if ( isset( $category[0]->cat_name ) ) {
								echo esc_html( $category[0]->cat_name );
							} ?></a>
					</div>
				</article>
				<?php

			}
			wp_reset_postdata();
		endif; ?>


		<?php

		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = ! empty( $new_instance['title'] ) ? esc_attr( $new_instance['title'] ) :
			esc_html__( 'Recent posts', 'revo' );
		$new_instance['text']  = ( (int) $new_instance['text'] ) ? $new_instance['text'] : 3;

		return $new_instance;
	}


}

class revo_Recent_comments extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo Recent comments', 'revo' ),
			'description' => esc_html__( 'It displays a list of tweets', 'revo' ),
			'classname'   => 'revo_Recent_comments_noppp'
		);
		parent::__construct( 'revo_Recent_comments', esc_html__( 'Revo Tweets2', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent comments', 'revo' ), // Legacy.
				'text'  => 4


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:',
					'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"> <?php esc_html_e( 'How many show post?',
					'revo' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
			       value="<?php
			       if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       }
			       ?>">

		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );


		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent comments', 'revo' ), // Legacy.
				'Name'  => '',
				'text'  => 4


			)
		);
		extract( $instance );
		// Create a filter to the other plug-ins can change them
		$title = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		echo wp_kses_post( $before_widget . "" );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );


		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $text,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );
		if ( is_array( $comments ) && $comments ) {


			?>

			<ul class="widget-comment-list widget-list">
				<?php

				foreach ( (array) $comments as $comment ) {


					?>

					<li>
						<span class="media-left"><i class="icon icon-chat"></i></span>
                        <span class="media-body"><?php echo esc_html( $comment->comment_author ); ?> <a
		                        href="<?php echo esc_url( get_permalink( $comment->comment_post_ID ) ); ?>"><?php echo esc_html( get_the_title( $comment->comment_post_ID ) ); ?></a></span>
					</li>
					<?php

				}

				?>
			</ul>

			<?php
		}


		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = ! empty( $new_instance['title'] ) ? esc_attr( $new_instance['title'] ) :
			esc_html__( 'Recent comments', 'revo' );
		$new_instance['text']  = ( (int) $new_instance['text'] ) ? $new_instance['text'] : 4;

		return $new_instance;
	}


}


class revo_TAG_Wigdet_class extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Revo TAG', 'revo' ),
			'description' => esc_html__( 'It displays a list of TAG', 'revo' ),
			'classname'   => 'widget-tag-cloud'
		);
		parent::__construct( 'widget-tag-cloud', esc_html__( 'Revo TAG', 'revo' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'    => '',
				'type_tag' => '0',
				'number'   => 20
			) );
		extract( $instance );
		$title = sanitize_text_field( $instance['title'] );
		?>
		<p><label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"><?php esc_html_e( 'Title:', 'revo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>"
			       type="text" value="<?php echo esc_attr( esc_attr( $title ) ); ?>"/></p>
		<p>

		<?php

	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		extract( $args );
		extract( $instance );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Tags', 'revo' ) : $instance['title'], $instance, $this->id_base );
		echo wp_kses_post( $before_widget );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );
		?>
		<div class="post-tags">
			<?php
			$posttags = get_tags();
			if ( $posttags ) {
				foreach ( $posttags as $tag ) {
					?>

					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
					><?php echo esc_html( $tag->name ); ?></a>

					<?php
				}
			}

			?>
		</div>
		<?php

		echo wp_kses_post( $after_widget );
	}

	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$new_instance         = wp_parse_args( (array) $new_instance, array(
			'title'    => '',
			'count'    => 0,
			'dropdown' => ''
		) );
		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['number']   = $new_instance['number'] ? (int) sanitize_title( $new_instance['number'] ) : 20;
		$instance['type_tag'] = $new_instance['type_tag'] ? (int) sanitize_title( $new_instance['type_tag'] ) : '0';

		return $instance;
	}


}






