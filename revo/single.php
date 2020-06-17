<?php get_header(); ?>
<main id="home" class="main masked main-blog parallax" data-stellar-background-ratio="0.7">
    <div class="opener">
        <div class="container">
            <div class="row">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <h2><?php
                    echo wp_kses_post(get_post_meta(get_the_ID(), '_revo_short_description', true));
                    ?></h2>
            </div>
        </div>
    </div>
</main>




<!-- Content -->

<div class="content">
    <section class="section">
        <div class="container">
            <div class="row">
                <?php

                $positin_sidebar = "";

                if (get_theme_mod('revo_sidebar_position', 's2') == 's1') {
                    $positin_sidebar = 'left';
                } else {
                    $positin_sidebar = 'right';
                }

                if (isset($_GET['showas']) && $_GET['showas'] == 'left') {
                    $positin_sidebar = 'left';
                } elseif (isset($_GET['showas']) && $_GET['showas'] == 'right') {
                    $positin_sidebar = 'right';
                }

                if ($positin_sidebar == 'left')
                    get_sidebar();
                ?>
                <div class="col-md-8">

                    <?php if (have_posts()) : ?>
                        <?php
                        // Start the Loop.
                        while (have_posts()) : the_post();

                            ?>
                            <?php get_template_part('partials/content', get_post_format()); ?>


                        <?php endwhile;


                    else :

                    endif; ?>
                    <section class="section-add-comment section-primary">


                        <?php
                        if (comments_open() || get_comments_number()) :
                           comments_template();
                        endif; ?>


                    </section>
                </div>
                <?php
                if ($positin_sidebar == 'right')
                    get_sidebar();
                ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
