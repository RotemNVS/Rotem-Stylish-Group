<?php

/**
 * Template Name: Full width page with container
 * Preview:
 *
 */

get_header();
the_post();
$shotrcodes = get_the_content();
preg_match_all('#\[revo_header_v1.*?\].*?\[\/revo_header_v1\]#',$shotrcodes,$math);
preg_match_all('#\[revo_header_video.*?\].*?\[\/revo_header_video\]#',$shotrcodes,$math_v);
preg_match_all('#\[revo_header_slider.*?\]#',$shotrcodes,$math_slider);


if(isset($math[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math[0][0]));

if(isset($math_v[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math_v[0][0]));

if(isset($math_slider[0][0]))
    echo do_shortcode(apply_filters( 'the_content', $math_slider[0][0]));



?>

<div class="content">
<?php
$content = $shotrcodes;

if(isset($math[0][0]))
    $content = apply_filters( 'the_content', str_replace($math[0][0],'',$shotrcodes) );

if(isset($math_v[0][0]))
    $content = apply_filters( 'the_content', str_replace($math_v[0][0],'',$shotrcodes) );

if(isset($math_slider[0][0]))
    $content = apply_filters( 'the_content', str_replace($math_slider[0][0],'',$shotrcodes) );

echo do_shortcode(str_replace( ']]>', ']]&gt;', $content ));

get_footer();



