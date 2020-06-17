
<div class="post-controls">
    <div class="post-share">
        <ul>
            <li>
               <?php esc_html_e(' Share:', 'revo') ?>
            </li>
            <li>
                <a href="<?php echo esc_url( ' https://www.facebook.com/sharer/sharer.php?u=' .get_the_permalink()); ?>"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="<?php echo esc_url( 'https://twitter.com/home?status=' . get_permalink()); ?>"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="<?php echo esc_url( 'https://plus.google.com/share?url='. get_permalink()); ?>"><i class="fa fa-google-plus"></i></a>
            </li>
        </ul>
    </div>
    <div class="comments-info">
        <?php
        $number = get_comments_number() > 0 ? get_comments_number() : 0;

        ?>
        <a href="#">
            <i class="fa fa-comment"></i> <?php  echo esc_html($number); ?> </a>
    </div>
</div>