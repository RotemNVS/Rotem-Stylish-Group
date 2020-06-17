<?php if ( ! is_single() ) {
	$class = '';
	$gallery = get_post_gallery_images( get_the_ID() );
	if ( ! has_post_thumbnail( get_the_ID() ) && ! isset( $gallery[1] ) ) {
		$class = ' no-thumbnail';
	}
	?>

	<div <?php post_class( 'post column col-sm-6 col-md-4' . $class ); ?> >
		<div class="blog-article">
			<div class="blog-article-thumbnail">
				<?php revo_post_gallery_slide( 360, 360 ); ?>
				<div class="date"><?php
					echo wp_kses_post( implode( '<br/>', explode( ' ', get_the_time( 'd M' ) ) ) );
					?></div>
			</div>
			<div class="blog-article-details">
				<h3 class="blog-article-title"><a
						href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
				<h4 class="blog-article-category">
					<?php revo_get_list_cats(); ?></h4>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>"
				   class="read-more"> <?php echo esc_html( get_theme_mod( 'revo_blog_list_text', esc_html__( 'Read More', 'revo' ) ) ); ?>
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>


<?php } else { ?>
	<div <?php post_class( 'post' ); ?> >
		<div class="blog-article-thumbnail">
			<div class="post-gallery">
				<?php revo_post_gallery_slide( 750, 441 ); ?>
			</div>
			<div class="date"><?php
				echo wp_kses_post( implode( '<br/>', explode( ' ', get_the_time( 'd M' ) ) ) );
				?></div>
		</div>

		<ul class="post-meta">
			<?php if ( ! has_post_thumbnail( get_the_ID() ) ) { ?>
				<li> <?php
					echo esc_html( get_the_time( 'd M  Y' ) ); ?>
				</li> <?php
			} ?>
			<li><?php esc_html_e( 'Posted by', 'revo' ); ?> <a href=""><?php the_author(); ?></a></li>
			<li><a href="" rel="category tag">
					<?php $category = get_the_category();
					if ( isset( $category[0]->cat_name ) ) {
						echo esc_html( $category[0]->cat_name );
					} ?>
				</a> <a href="<?php echo esc_url( get_the_permalink() ); ?>">
					<?php $category = get_the_category();
					if ( isset( $category[1]->cat_name ) ) {
						echo esc_html( ' ,', $category[1]->cat_name );
					} ?></a></li>
		</ul>
		<div class="post-entry">
			<?php
			echo preg_replace( array( '/\[gallery.*?\]/', '#<div.*?post-author.*?>.*?<\/div>#' ), array(
				'',
				''
			), get_the_content() ); ?>

		</div>
		<br>
		<div class="post_pagination">
			<?php
			echo revo_link_pages();
			?>
		</div>
		<br>
		<hr>
		<div class="post-tags">
			<?php
			$posttags = get_tags();
			if ( $posttags ) {
				foreach ( $posttags as $tag ) {
					?>

					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
					   class="b-tags-cloud__item"><?php echo esc_html( $tag->name ); ?></a>

					<?php
				}
			} ?>

		</div>
		<?php get_template_part( 'partials/post', 'autor' ); ?>
		<?php get_template_part( 'partials/single', 'meta' ); ?>

	</div>

<?php } ?>