<?php


/**
 * @return categorias
 */
function revo_wp_infinitepaginate() {


	$paged          = (int) sanitize_text_field( $_POST['page_no'] );
	$posts_per_page = (int) sanitize_text_field( get_option( 'posts_per_page' ) );

	if ( isset( $_POST['s']{0} ) ) {
		$args = array(
			'paged'       => $paged,
			'showposts'   => $posts_per_page,
			'post_status' => 'publish',
			's'           => sanitize_text_field( $_POST['s'] )
		);


	} else {
		$args = array(
			'paged'       => $paged,
			'showposts'   => $posts_per_page,
			'cat'         => sanitize_text_field( $_POST['cat'] ),
			'post_status' => 'publish',
			'post_type'   => sanitize_text_field( $_POST['posttype'] )
		);
	}


	$query = new WP_Query( $args );

	$n = 0;
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
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


		}
	}
	wp_reset_postdata();

	exit;
	die();
}

add_action( 'wp_ajax_revo_infinite_scroll', 'revo_wp_infinitepaginate' ); // for logged in user
add_action( 'wp_ajax_nopriv_revo_infinite_scroll', 'revo_wp_infinitepaginate' ); // if user not logged in ?>