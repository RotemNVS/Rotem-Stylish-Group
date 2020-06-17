<?php
/**
 * Shop gallery
 * User: Pro
 * Date: 08.01.2016
 * Time: 13:23
 */

$image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
$image_link = wp_get_attachment_url(get_post_thumbnail_id());
$image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
    'title' => $image_title,
    'alt' => $image_title
));


?>




<div class="product-preview-shortcode light">
    <div class="preview">
        <div class="swiper-lazy-preloader"></div>
        <div class="entry full-size swiper-lazy active  " data-background="<?php echo esc_url($image_link); ?>"></div>
        <?php


        $arr_image_gallery = explode(',', get_post_meta($post->ID, '_product_image_gallery', true));
        $j = 0;
        foreach ($arr_image_gallery as $img_id) {
            $image_attributes = wp_get_attachment_image_src($img_id, array(570,570));

            ?>

            <div class="entry full-size swiper-lazy " data-background="<?php echo esc_url($image_attributes[0]); ?>"></div>
            <?php
            $j++;
        }

        ?>

    </div>
    <div class="sidebar valign-middle" data-swiper-parallax-x="-300">
        <div class="valign-middle-content">

            <div class="entry active   "><img src="<?php echo esc_url($image_link); ?>" alt="" /></div>
            <?php


            $arr_image_gallery = explode(',', get_post_meta($post->ID, '_product_image_gallery', true));
            $j = 0;
            foreach ($arr_image_gallery as $img_id) {
                $image_attributes = wp_get_attachment_image_src($img_id, array(68,68));

                ?>
                <div class="entry   "><img src="<?php echo esc_url($image_attributes[0]); ?>" alt="" /></div>

                <?php
                $j++;
            }

            ?>

        </div>
    </div>
</div>


