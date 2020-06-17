<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */


if (post_password_required()) {
    return;
}

function revo_comment($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag = 'div ';
        $add_below = 'comment';
    } else {
        $tag = 'li ';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_html($tag) ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
    <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo wp_kses_post(get_avatar($comment, 80)); ?>
        <?php printf('<b class="fn">%s</b> <span class="says"></span>', wp_kses_post(get_comment_author_link())); ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'revo'); ?></em>
    <br/>
<?php endif; ?>

    <div class="comment-metadata"><a
            href="<?php echo esc_url(htmlspecialchars(get_comment_link($comment->comment_ID))); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf(esc_html__('%1$s at %2$s', 'revo'), esc_html(get_comment_date()), esc_html(get_comment_time())); ?></a>
        <?php edit_comment_link(esc_html__('(Edit)', 'revo'), '  ', '');
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('add_below' => sanitize_text_field($add_below), 'depth' => sanitize_text_field($depth), 'max_depth' => sanitize_text_field($args['max_depth'])))); ?>
    </div>
    <?php if ('div' != $args['style']) : ?>
    </div>
<?php endif; ?>
    <?php
}

?>


<div class="comments">

    <?php
    /*
     * function to construct comments
     */


    ?>

    <?php if (have_comments()) : ?>

        <div class="comments-list-area">

            <ol class="comment-list">
                <?php
                //show comments
                wp_list_comments(array(

                    'type' => 'all',
                    'short_ping'  => true,
                   'callback' => 'revo_comment'


                ));
                ?>
            </ol>
        </div>
        <?php
    endif; // have_comments()
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'revo'); ?></p>
    <?php endif;
    ?>


</div><!-- .comments-area -->
<div class="comments-form">


    <div class="write_comment">
        <div id="comments-form">
            <?php
            //We get the option to comment form


            ob_start();
            $args = array(
                'title_reply_before' => '<header class="primary-title">
        <h2>',
                'title_reply_after' => '</h2>
    </header>',
                'title_reply' => esc_html__('Post a comment', 'revo'),
                'title_reply_to' => esc_html__('Leave a comment to %s', 'revo'),
                'fields' => array(
                    'author' => '
<div class="form-group">
       <div class="row-form row">
<div class="col-form col-md-6">
                                <input type="text" class="form-control" name="author" required="" placeholder=" ' . esc_html__('Name *', 'revo') . '" >
                            </div>
',
                    'email' => '
<div class="col-form col-md-6">
                                <input type="email" class="form-control" name="email" required="" placeholder=" ' . esc_html__('Email *', 'revo') . '">
                            </div>  </div>   </div>',
                ),
                'comment_field' => ' <div class="form-group ">
                                    <textarea class="form-control" rows="3" name="comment" id="comment-field"
                                              placeholder="Comment" maxlength="65525" required="required"></textarea>
                            </div>',
                'submit_button' => '   <button type="submit" class="btn" data-text-hover=" ' . esc_html__('Submit', 'revo') . '">
                                    <span class="btn-text">
                                    ' . esc_html__('Post comment', 'revo') . '</span>
                        <span class="line-top">
                          <span class="line-square-l-t line-square"></span>
                          <span class="line-square-r-t line-square"></span>
                        </span>
                        <span class="line-bottom">
                          <span class="line-square-l-b line-square"></span>
                          <span class="line-square-r-b line-square"></span>
                        </span>
                                </button>'

            );
            comment_form($args);

            $str = ob_get_clean();
            echo str_replace('comment-form', 'form-comment js-comment-form2  ', $str)
            ?>    </div>

    </div>
</div>



