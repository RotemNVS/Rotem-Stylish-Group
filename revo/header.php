

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();
	?>
</head>
<body <?php body_class(); ?>>


<div class="layout">

	<!-- Loader -->

	<?php


	if ( get_theme_mod( 'revo_performans_preload', true ) ) {
		?>
		<div class="loader">
			<div class="loader-brand">
				<?php


				if ( get_theme_mod( 'revo_logo_disable' ) == false ) {

					$img_p = get_theme_mod( 'revo_logo_preloader' );
					if ( isset( $img_p{5} ) ) {
						$img_p_l = $img_p;
					} else {
						$img_p_l = get_template_directory_uri() . "/img/brand.png";

					}
					?>
					<img alt="" class="img-responsive center-block"
					     src="<?php echo esc_url( $img_p_l ); ?>">
				<?php } ?>


			</div>
		</div>
	<?php } ?>
	<!-- Header -->

	<header id="top" class="navbar js-navbar-affix">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
				        data-target="#navbar-collapse">
					<span class="sr-only"> <?php esc_html_e( 'Toggle navigation', 'revo' ) ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<?php $logo_img = get_theme_mod( 'revo_logo_image' ); ?>
				<a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" class="brand js-target-scroll">

					<?php if ( isset( $logo_img{1} ) ) { ?>
						<img src="<?php echo get_theme_mod( 'revo_logo_image' ); ?>" alt="" class="header_logo">

						<?php
					} else {


						$logo_text = ( get_theme_mod( 'revo_logo_text' ) );
						$result    = mb_substr( $logo_text, 0, 2 );
						$logo_text = str_replace( $result, '<span class="text-primary">' . $result . '</span>', $logo_text );
						if ( isset( $logo_text{1} ) ) {
							echo wp_kses_post( $logo_text );
							?>
						<?php } else {
							?>

							<span
								class="text-primary"><?php echo esc_html( 'Re', 'revo' ) ?>  </span><?php echo esc_html( 'vo Studio', 'revo' ) ?>
							<?php
						}
					}
					?>


				</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">


				<?php
				$revo_defaults = array(
					'theme_location'  => 'revo_topmenu',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'navigate head_nav',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
					'depth'           => 0
				);


				if ( @has_nav_menu( 'revo_topmenu' ) ) {
					@wp_nav_menu( $revo_defaults );

				} else {

					if ( get_option( 'revo_one_page_menu' ) == true || get_option( 'revo_one_page_menu_right' ) ) {
						?>
						<div class="menu-home-container">
							<ul id="menu-home" class="nav navbar-nav navbar-right navigate head_nav">
								<?php echo wp_kses_post( get_option( 'revo_one_page_menu' ) . get_option( 'revo_one_page_menu_right' ) ); ?>
							</ul>
						</div>
						<?php
					} else {
						$revo_args = array(
							'depth'        => 0,
							'show_date'    => '',
							'date_format'  => sanitize_text_field( get_option( 'date_format' ) ),
							'child_of'     => 0,
							'exclude'      => '',
							'exclude_tree' => '',
							'title_li'     => '',
							'echo'         => 1,
							'authors'      => '',
							'sort_column'  => 'menu_order, post_title',
							'sort_order'   => 'ASC',
							'link_before'  => '',
							'link_after'   => '',
							'meta_key'     => '',
							'meta_value'   => '',
							'number'       => 5,
							'offset'       => '',
							'walker'       => ''
						);

						?>
						<ul id="menu-home" class="nav navbar-nav navbar-right navigate head_nav">
							<?php
							@wp_list_pages( $revo_args );
							?>
						</ul>

						<?php
					}
				}
				?>

			</div>


		</div>
	</header>

	<!-- Home -->


