<?php get_header(); ?>


<!-- Home -->


<main id="home" class="main masked main-404 parallax" data-stellar-background-ratio="0.7">
	<div class="opener">
		<div class="container">
			<div class="row">
				<?php $main_title = get_theme_mod( 'revo_404_main_title' );
				if ( isset( $main_title[0] ) ) {
					?>   <h1><?php echo wp_kses_post( $main_title ); ?> </h1>
					<?php
				} else { ?>

					<h1> <?php echo esc_html__( '404 Page', 'revo' ) ?></h1>
					<?php

				} ?>

				<?php $top_desc = get_theme_mod( 'revo_404_top_desc' );

				if ( isset( $top_desc[0] ) ) {
					?>
					<h2><?php echo wp_kses_post( $top_desc ); ?> </h2>
					<?php
				} else { ?>
					<h2> <?php echo esc_html__( 'Something is Wrong Here', 'revo' ) ?></h2>
					<?php

				} ?>

			</div>
		</div>
	</div>
</main>

<!-- Content -->

<div class="content">

	<!-- 404 -->

	<section class="section text-center">
		<div class="container">
			<?php $title_404 = get_theme_mod( 'revo_404_title_404' );
			if ( isset( $title_404[0] ) ) {
				?>
				<div class="title-404"><?php echo wp_kses_post( $title_404 ); ?></div>
				<?php
			} else { ?>
				<div class="title-404">
					<?php echo esc_html__( '404', 'revo' ); ?>
				</div>

				<?php

			} ?>

			<?php $subtitle = get_theme_mod( 'revo_404_subtitle' );
			$text_primary   = get_theme_mod( 'revo_404_text_primary' );

			if ( isset( $subtitle[0] ) || isset( $text_primary[0] ) ) {

				?>

				<div class="subtitle-404"> <?php echo wp_kses_post( $subtitle ); ?>
					<span class="text-primary"> <?php echo wp_kses_post( $text_primary ); ?></span>
				</div>

				<?php
			} else { ?>
				<div class="subtitle-404">  <?php echo esc_html__( 'We&rsquo;Re', 'revo' ); ?>
					<span class="text-primary"> <?php echo esc_html__( ' Sorry...', 'revo' ); ?></span>
				</div>

				<?php

			} ?>


			<?php $description_404 = get_theme_mod( 'revo_404_description_404' );
			if ( isset( $description_404[0] ) ) {
				?>

				<div class="description-404">
					<?php echo wp_kses_post( $description_404 ); ?>
				</div>
				<?php
			} else { ?>
				<div
					class="description-404"><?php echo esc_html__(' Don\'t  worry you will be back on track in no time!', 'revo' ); ?>

				</div>
				<?php

			} ?>


			<?php $info_404 = get_theme_mod( 'revo_404_info_404' );
			$url            = get_home_url( '/' );
			if ( isset( $info_404[0] ) ) {
				?>


				<div class="info-404"> <?php echo wp_kses_post( $info_404 ); ?></div>

				<?php
			} else { ?>
				<div class="info-404">
					<?php echo esc_html__(' You can start from the', 'revo' ); ?> <a
						href=" <?php echo esc_url( $url ); ?>"> <?php echo esc_html__(' home page', 'revo' ); ?></a>

				</div>

				<?php

			} ?>
		</div>
	</section>


	<!-- Scripts -->
	<!-- Footer -->
</div>

	<?php get_footer(); ?>
