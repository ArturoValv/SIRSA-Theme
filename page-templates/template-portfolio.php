<?php
/*Template Name: Template Portfolio*/
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>

<main class="portfolio">

    <div class="portfolio__filter">
        <div class="container">
            <ul class="portfolio__categories">

                <li class="category selected" data-cat="0">Todas</li>


                <?php
                if ($terms = get_terms(array('taxonomy' => 'categoria-proyectos', 'orderby' => 'name'))) :
                    foreach ($terms as $term):
                ?>

                        <li class="category" data-cat="<?= $term->term_id ?>"><?= $term->name ?></li>

                <?php
                    endforeach;
                endif;
                ?>

            </ul>
        </div>
    </div>

    <section class="portfolio__inner" id="response">
        <div class="container">

            <?php
            $args = array(
                'post_type' => 'proyectos', // Define the post type
                'posts_per_page' => -1, // Display all posts
            );
            $the_query = new WP_Query($args);

            ?>

            <div class="projects">
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                        $terms = get_the_terms(get_the_ID(), 'categoria-proyectos');
                        $terms_array = array();

                        foreach ($terms as $term) {
                            array_push($terms_array, $term->term_id);
                        }

                        $term_str = implode("-", $terms_array);
                ?>

                        <div class="project visible" data-cat="<?= $term_str ?>">

                            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_post_meta(get_the_ID(), '_wp_attachment_image_alt', TRUE); ?>" class="bg-img">

                            <div class="project-wrapper">

                                <div class="content-wrapper">
                                    <a href="<?= get_the_permalink() ?>" class="heading h2"><?= get_the_title() ?></a>

                                    <div class="buttons">
                                        <a href="<?= get_the_permalink() ?>" class="icon-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" stroke-width="10" />
                                            </svg>
                                        </a>
                                        <a href="" class="icon-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" stroke-width="10" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="title">
                                <a href="<?= get_the_permalink() ?>" class="h3"><?= get_the_title() ?></a>
                            </div>

                        </div>

                <?php endwhile;
                endif; ?>
            </div>

            <?php wp_reset_postdata(); ?>

        </div>
    </section>
</main>

<?php get_footer() ?>