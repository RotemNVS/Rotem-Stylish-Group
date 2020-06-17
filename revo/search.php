<?php get_header();

$revo_cat      = 0;
$revo_category = get_category( get_query_var( 'cat' ) );
if ( isset( $revo_category->cat_ID ) ) {
	$revo_cat = $revo_category->cat_ID;
} else {
	$revo_cat = 0;
}

?>

	<main id="home" class="main masked main-blog parallax" data-stellar-background-ratio="0.7">
		<div class="opener">
			<div class="container">
				<div class="row">
					<h1>
						<?php printf( esc_html( esc_html__( 'Search Results for: %s', 'revo' ) ), get_search_query() ); ?>

					</h1>
				</div>
			</div>
		</div>
	</main>


	<div class="container rel-1">
		<div class="row">
			<div class="text-center col-lg-6 col-lg-offset-3">

				<div class="lead">
					<p class="lead-text">
						<?php
						if ( isset( $category_id{0} ) ) {
							echo esc_html( category_description( $category_id ) );
						}
						if ( is_home() ) {
							bloginfo( 'description' );
						}
						?></p>
				</div>
			</div>
		</div>
	</div>


	<!-- Content -->


	<div class="place_li_cont">
		<section class="section">
			<div class="container ">
				<div class="row ajax-content">
					<?php

					$positin_sidebar = "";

					if ( get_theme_mod( 'revo_sidebar_cat_position', 'c2' ) == 'c1' ) {
						$positin_sidebar = 'left';
					} else {
						$positin_sidebar = 'right';
					}

					if ( isset( $_GET['showas'] ) && $_GET['showas'] == 'left' ) {
						$positin_sidebar = 'left';
					} elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'right' ) {
						$positin_sidebar = 'right';
					}

					if ( $positin_sidebar == 'left' && get_theme_mod( 'revo_sidebar_cat_position', 'c2' ) != 'c3' ) {
						get_sidebar( 'cat' );
					}

					if ( is_active_sidebar( 'revo_sidebar_categories' ) && get_theme_mod( 'revo_sidebar_cat_position', 'c2' ) != 'c3' ) {
						$n = 0
						?>
						<div class="col-md-8  text-center">
							<div class="row row-columns">
								<?php if ( have_posts() ) : ?>
									<?php
									// Start the Loop.
									while ( have_posts() ) : the_post();
										$n ++;

										get_template_part( 'partials/content', get_post_format() );
										if ( $n % 3 == 0 ) {
											?>
											<div class="clearfix visible-md visible-lg"></div>
											<?php
										}
										if ( $n % 2 == 0 ) {
											?>
											<div class="clearfix visible-sm"></div>
											<?php
										}
										?>


									<?php endwhile;
									wp_reset_postdata();


								else :
									?>
									<article <?php post_class( 'post' ); ?>>

										<header class="post-header">
											<h2><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'revo' ); ?></p>
											</h2>

										</header>

										<div class="post-entry text-left col-md-12">
											<?php get_search_form(); ?>
										</div>

									</article>

									<?php

								endif; ?>

							</div>
						</div>
						<?php
					} else if ( have_posts() ) : ?>
						<?php
						$n = 0;
						// Start the Loop.
						while ( have_posts() ) : the_post();
							$n ++;
							get_template_part( 'partials/content', get_post_format() );
							if ( $n % 3 == 0 ) {
								?>
								<div class="clearfix visible-md visible-lg"></div>
								<?php
							}
							if ( $n % 2 == 0 ) {
								?>
								<div class="clearfix visible-sm"></div>
								<?php
							}
							?>

						<?php endwhile;
						wp_reset_postdata();


					else : ?>
						<article <?php post_class( 'post' ); ?>>

							<header class="post-header">
								<h2><?php
									esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'revo' ); ?></p>
								</h2>

							</header>

							<div class="post-entry text-left col-md-12">
								<?php get_search_form(); ?>
							</div>

						</article>

					<?php endif; ?>


					<?php
					if ( get_theme_mod( 'revo_performans_pagination_ajax', false ) == false ) {
						?>


						<div class="row">
							<div class="col-md-12">
								<br><br><br>
								<?php
								$revo_class = revo_get_global_class();
								$revo_class->revo_pagenavi(); ?>
							</div>
						</div>
						<?php
					}


					ob_start();
					the_posts_pagination();
					wp_link_pages();
					ob_get_clean();
					if ( $positin_sidebar == 'right' && get_theme_mod( 'revo_sidebar_cat_position', 'c2' ) != 'c3' ) {
						get_sidebar( 'cat' );
					}
					?>

				</div>
			</div>

		</section>

	</div>


	<!-- Footer -->


<?php get_footer(); ?>