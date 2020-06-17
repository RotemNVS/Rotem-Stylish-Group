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
				<h1><?php
					$categories = get_the_category();
					if ( isset( $categories[0]->cat_ID ) && ! is_home() && ! is_single() ) {
						$category_id = $categories[0]->cat_ID;
						echo esc_html( get_cat_name( $categories[0]->cat_ID ) );
					}
					if ( is_home() ) {
						echo esc_attr( get_bloginfo( 'name' ) );
					}
					if ( is_search() ) {
						?>

						<?php printf( esc_html( esc_html__( 'Search Results for: %s', 'revo' ) ), get_search_query() ); ?>

						<?php
					}

					?></h1>
				<h2>
					<?php

					if ( is_home() ) {
						bloginfo( 'description' );
					} elseif ( isset( $category_id ) ) {
						echo wp_kses_post( str_replace( array( '<p>', '</p>' ), array(
							'',
							''
						), category_description( $category_id ) ) );

					}


					?></h2>
			</div>
		</div>
	</div>
</main>

<!-- Blog -->
<!-- Blog -->
<div class="place_li_cont">
	<section class="section">
		<div class="container">
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
					<div class="col-md-8  text-center ">
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


				else :


				endif; ?>



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

<script>

    jQuery(document).ready(function ($) {


        var total =  <?php echo esc_html($wp_query->max_num_pages);?>;
        var ajax = true;
        var count = 2;

        $(window).scroll(function () {
            var scrollTop = jQuery(window).scrollTop();
            var ajaxheight = jQuery(".place_li_cont").height() - jQuery(window).height();

            if ((scrollTop + 1500) > ajaxheight && ajax) {
                console.log('11');
                jQuery(this).addClass('active2');
                if (ajax) {
                    if (count > total + count) {
                        return false;
                    } else {
                        if ($("div").is(".no_posts_1")) return;
                        console.log('gg');
                        loadArticle(count);
                        count++;


                    }
                    ajax = false;
                }
                return false;
            }
        });


        function loadArticle(pageNumber) {


            var ofset = $(".place_li_cont .post").length;
            var posttype = "<?php
				if (isset($wp_query->query['post_type']))
					echo esc_attr(sanitize_text_field($wp_query->query['post_type']));
				?>";
            var cat = "<?php
				if (is_front_page()) { // is the index page cat = 0
					echo 0;
				} else {
					if (get_the_category()) {
						echo esc_html($revo_cat);
					}

				} ?>";
            var is_sticky = "";
            var tag = '<?php
				if (isset($wp_query->query['tag']) && !empty($wp_query->query['tag']))
					echo esc_html($wp_query->query['tag']);
				?>';

            jQuery('.more_btn2').attr('disabled', true);

            $.ajax({
                url: "<?php echo esc_url(site_url()); ?>/wp-admin/admin-ajax.php",
                type: 'POST',
                data: "action=revo_infinite_scroll&page_no=" + pageNumber + "&ofset=" + ofset +
                "&cat=" + cat + '&tag=' + tag
                ,

                success: function (html) {
                    // alert(2);

                    if (html != '0')
                        jQuery(".ajax-content").append(html);

                    jQuery('.gallery-carousel').each(function () {
                        var carouselObj = ($(this).owlCarousel({
                            singleItem: true,
                            autoHeight: true,
                            pagination: false,
                            navigation: true,
                            transitionStyle: "fadeUp",
                            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
                        })).data('owlCarousel');
                        if (carouselObj && typeof carouselObj.onResize === "function") {
                            setTimeout(function () {
                                carouselObj.onResize();
                            }, 50);
                        }


                    });


                    ajax = true;


                }
            });
            return false;
        }


    });
</script>
<?php get_footer(); ?>
