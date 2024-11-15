<footer id="<?= get_field("ancla_del_footer", "options") ? get_field("ancla_del_footer", "options") : 'site-footer' ?>" class="site-footer">

    <img src="<?= get_field("imagen_de_fondo", "options")["url"] ?>" alt="<?= get_field("imagen_de_fondo", "options")["alt"] ?>" class="bg-img">

    <div class="container">

        <div class="site-footer__inner">

            <div class="site-footer__box">
                <img src="<?= get_field("imagen_de_fondo_de_caja_de_contacto", "options")["url"] ?>" alt="<?= get_field("imagen_de_fondo_de_caja_de_contacto", "options")["alt"] ?>" class="bg-img">

                <div class="social">
                    <?php get_template_part('template-parts/social', 'networks') ?>
                </div>

                <div class="inner">

                    <a href="/" id="footer-logo">
                        <img src="<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>" alt="">
                    </a>
                    <p class="content">
                        <?= get_field("texto_de_caja_de_contacto", "options") ?>
                    </p>

                    <?php if (get_field('direccion', 'options')): ?>
                        <ul class="contact-links">

                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M224 32L64 32C46.3 32 32 46.3 32 64l0 64c0 17.7 14.3 32 32 32l377.4 0c4.2 0 8.3-1.7 11.3-4.7l48-48c6.2-6.2
                         6.2-16.4 0-22.6l-48-48c-3-3-7.1-4.7-11.3-4.7L288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32zM480 256c0-17.7-14.3-32-32-32l-160
                        0 0-32-64 0 0 32L70.6 224c-4.2 0-8.3 1.7-11.3 4.7l-48 48c-6.2 6.2-6.2 16.4 0 22.6l48 48c3 3 7.1 4.7 11.3 4.7L448 352c17.7 0 32-14.3 32-32l0-64zM288 480l0-96-64 0 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32z" />
                                </svg>
                                <a href="<?= get_field('enlace_de_direccion', 'options') ?>" class="address">
                                    <?= get_field('direccion', 'options') ?>
                                </a>
                            </li>

                            <?php if (have_rows("telefonos", "options")): ?>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 
                            448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 
                            11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                    </svg>

                                    <?php while (have_rows("telefonos", "options")): the_row() ?>
                                        <a href="tel:+1<?= preg_replace('/^0|[^a-zA-Z0-9+]+/', '', get_sub_field("telefono")) ?>" class="label">
                                            <span><?= get_sub_field("telefono") ?></span>
                                        </a>
                                    <?php endwhile ?>

                                </li>
                            <?php endif ?>

                            <?php if (have_rows("correos_electronicos", "options")): ?>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 
                                150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3
                                 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                    </svg>
                                    <?php while (have_rows("correos_electronicos", "options")): the_row() ?>
                                        <a href="mailto:<?= get_sub_field("correo") ?>" class="label">
                                            <span><?= get_sub_field("correo") ?></span>
                                        </a>
                                    <?php endwhile ?>
                                </li>
                            <?php endif ?>
                        </ul>
                    <?php endif ?>

                </div>

            </div>

            <div class="site-footer__menus">

                <?php
                $theme_locations = array_key_exists('first_footer_menu', get_nav_menu_locations()) ? get_nav_menu_locations()['first_footer_menu'] : '';
                $menu_obj = get_term($theme_locations, 'nav_menu');
                if ($theme_locations !== 0) :
                ?>
                    <div class="footer-menu-container">
                        <p class="footer-title"><?= $menu_obj->name ?></p>
                        <?php
                        $args = array(
                            'theme_location' => 'first_footer_menu',
                            'container' => 'nav',
                            'container_class' => 'footer_menu',
                            'before' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"/></svg>'
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                <?php endif ?>

                <?php
                $theme_locations = array_key_exists('second_footer_menu', get_nav_menu_locations()) ? get_nav_menu_locations()['second_footer_menu'] : '';
                $menu_obj = get_term($theme_locations, 'nav_menu');
                if ($theme_locations !== 0) :
                ?>
                    <div class="footer-menu-container">
                        <p class="footer-title"><?= $menu_obj->name ?></p>
                        <?php
                        $args = array(
                            'theme_location' => 'second_footer_menu',
                            'container' => 'nav',
                            'container_class' => 'footer_menu',
                            'before' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"/></svg>'
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                <?php endif ?>

            </div>

            <div class="site-footer__portfolio">

                <p class="footer-title"><?= get_field('titulo_de_portafolio', 'options') ?></p>

                <div class="portfolio">
                    <div class="portfolio__grid">
                        <?php if (have_rows('cuadricula_de_portafolio', 'options')) : while (have_rows('cuadricula_de_portafolio', 'options')): the_row() ?>

                                <a href="<?= get_sub_field('link') ?>" class="portfolio__item">
                                    <img src="<?= get_sub_field('imagen')['url'] ?>" alt="<?= get_sub_field('imagen')['alt'] ?>">
                                    <div class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                                        </svg>
                                    </div>
                                </a>

                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="site-footer__copy">
        <p>&copy; <?= date("Y") ?>. Todos los Derechos Reservados por <?= bloginfo("name") ?></p>
    </div>

</footer>

<a href="#top" id="go-top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
    </svg>
</a>

</div>
<?php wp_footer(); ?>
</body>

</html>