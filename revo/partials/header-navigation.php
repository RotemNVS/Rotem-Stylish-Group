<nav class="navigation closed clearfix">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <!-- navigation menu -->
            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
            <?php
            $revo_defaults = array(
                'theme_location' => 'revo_topmenu',
                'menu' => '',
                'container' => 'div',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'revo_topmenu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s nav sf-menu">%3$s</ul>',
                'depth' => 0,
                'walker' => new revo_top_menu_walker()

            );

            if (@has_nav_menu('revo_topmenu'))
                @wp_nav_menu($revo_defaults);

            ?>

        </div>

    </div>
    <!-- Add Scroll Bar -->
    <div class="swiper-scrollbar"></div>
</nav>
