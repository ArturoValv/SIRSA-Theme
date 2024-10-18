<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="body-wrapper">
        <header id="top" class="site-header">
            <div class="site-header__top">
                <div class="container">

                    <?php
                    $phone = get_field('telefono_principal', 'options');
                    $mail = get_field('correo_electronico_principal', 'options');
                    if ($phone || $mail):
                    ?>
                        <ul class="contact-links">
                            <?php if ($phone): ?>
                                <li>
                                    <a href="tel:+1<?= preg_replace('/^0|[^a-zA-Z0-9+]+/', '', $phone) ?>" class="label">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 
                                448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 
                                11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                        </svg>
                                        <span><?= $phone ?></span>
                                    </a>
                                </li>
                            <?php endif ?>

                            <?php if ($mail): ?>
                                <li>
                                    <a href="mailto:<?= $mail ?>" class="label">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 
                                    150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3
                                     0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                        </svg>
                                        <span><?= $mail ?></span>
                                    </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    <?php endif ?>

                    <?php if (get_field('horario_de_trabajo', 'options')): ?>

                        <div class="working-hours">
                            <span class="label">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M224 32L64 32C46.3 32 32 46.3 32 64l0 64c0 17.7 14.3 32 32 32l377.4 0c4.2 0 8.3-1.7 11.3-4.7l48-48c6.2-6.2
                             6.2-16.4 0-22.6l-48-48c-3-3-7.1-4.7-11.3-4.7L288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32zM480 256c0-17.7-14.3-32-32-32l-160
                            0 0-32-64 0 0 32L70.6 224c-4.2 0-8.3 1.7-11.3 4.7l-48 48c-6.2 6.2-6.2 16.4 0 22.6l48 48c3 3 7.1 4.7 11.3 4.7L448 352c17.7 0 32-14.3 32-32l0-64zM288 480l0-96-64 0 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32z" />
                                </svg>
                                Working hours - <?= get_field('horario_de_trabajo', 'options') ?>
                            </span>
                        </div>

                    <?php endif ?>


                    <?php get_template_part('template-parts/social', 'networks') ?>

                </div>
            </div>
            <div class="site-header__bottom">
                <div class="container">
                    <a href="/" id="logo">
                        <?php if (esc_url(wp_get_attachment_url(get_theme_mod('custom_logo')))): ?>
                            <img src="<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>" alt="">
                        <?php endif ?>
                    </a>

                    <div id="main-nav-section">


                        <div id="menu-mobile">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                            </svg>
                            <span>Menu</span>
                        </div>

                        <div id="nav-wrapper">

                            <div id="nav-buttons">

                                <div id="back-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                    </svg>
                                </div>

                                <div id="close-btn">
                                    <div></div>
                                    <div></div>
                                </div>

                            </div>

                            <?php
                            $args = array(
                                'theme_location' => 'main_menu',
                                'container' => 'nav',
                                'container_class' => 'main-menu',
                            );
                            wp_nav_menu($args);
                            ?>

                        </div>

                        <div id="action-buttons">

                            <div id="search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" stroke="#bcbcbc" stroke-width="10" />
                                </svg>
                            </div>

                            <div id="search-overlay">
                                <div id="overlay-close">
                                    <div></div>
                                    <div></div>
                                </div>
                                <form role="search" method="get" id="searchform" class="searchform" action="/">
                                    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search..." />
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </header>

        <!-- TLM End -->

        <?php if (is_page_template("page-templates/template-homepage.php")): ?>

            <?php get_template_part("template-parts/cover", "slider") ?>

        <?php else: ?>

            <?php get_template_part("template-parts/internal", "banner") ?>

        <?php endif ?>