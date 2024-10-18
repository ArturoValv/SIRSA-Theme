<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>

<div class="page page__wrapper">

    <div class="container">

        <div class="content">
            <div class="formatted-text">

                <?php while (have_posts()) : the_post(); ?>

                    <?php the_content() ?>

                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>
        </div>

    </div>

</div>

<?php get_footer() ?>