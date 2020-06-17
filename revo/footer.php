<!-- Footer -->

<footer id="footer" class="footer text-white">
	<div class="footer-top">
		<div class="container">
			<div class="row row-columns">
				<?php dynamic_sidebar( 'revo_footer' ); ?>

			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="copy">
				<?php
				echo wp_kses_post(
					do_shortcode( ( get_theme_mod( 'footer_copyright', esc_html__( 'Revo', 'revo' ) . '</i> &copy; ' . date( 'Y' ) . esc_html__( '. All rights reserved ', 'revo' ) . ' ' ) ) ) ); ?>

			</div>

			<div class="social">
				<?php
				if ( strlen( get_theme_mod( 'sotial_networks_control_social_shortcode' ) ) > 8 ):
					echo do_shortcode( get_theme_mod( 'sotial_networks_control_social_shortcode' ) );
				endif; ?>
				<?php if ( strlen( get_theme_mod( 'sotial_networks_control_facebook' ) ) > 8 ): ?>
					<a href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_facebook' ) ); ?>"
					   class=" fa fa-facebook">

					</a>
				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'sotial_networks_control_twitter' ) ) > 8 ): ?>
					<a class="fa fa-twitter "
					   href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_twitter' ) ); ?>">

					</a>
				<?php endif; ?>
				<?php if ( strlen( get_theme_mod( 'sotial_networks_control_pinterest' ) ) > 8 ): ?>
					<a class="fa fa-pinterest"
					   href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_pinterest' ) ); ?>">

					</a>
				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'sotial_networks_control_youtube' ) ) > 8 ): ?>
					<a class="  fa fa-youtube-play"
					   href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_youtube' ) ); ?>">

					</a>
				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'sotial_networks_control_google' ) ) > 8 ): ?>
					<a class="fa fa-google-plus  "
					   href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_google' ) ); ?>">

					</a>
				<?php endif; ?>


			</div>
		</div>
	</div>

</footer>

<?php if ( ! is_page_template( 'template-fullwidth.php' ) ) { ?>
	</div>
<?php } else { ?>
	</div> </div>
<?php } ?>
<!-- Modals -->


<!-- Scripts -->

<?php wp_footer(); ?>
</body>
</html>
