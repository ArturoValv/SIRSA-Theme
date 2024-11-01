<?php if (get_field('mostrar_bloque')): ?>

    <section id="<?= preg_replace('/\s+/', '',get_field('id_ancla')) ?>" class="block-testimonials">
        <div class="block-testimonials__inner">

            <div class="col">

                <?php if (get_field('imagen_de_fondo')): ?>
                    <img src="<?= get_field('imagen_de_fondo')['url'] ?>" alt="<?= get_field('imagen_de_fondo')['alt'] ?>" class="bg-img">
                <?php endif ?>

                <div class="col__inner">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>
                    <div class="content formatted-content">
                        <?= get_field('contenido') ?>
                    </div>
                    <a href="<?= get_field('link')['url'] ?>" class="btn primary"><?= get_field('link')['title'] ?></a>
                </div>

            </div>

            <div class="col">
                <div class="col__inner swiper">
                    <div class="testimonials swiper-wrapper">

                        <?php while (have_rows('testimonios')) : the_row() ?>
                            <div class="testimonial swiper-slide">

                                <?php if (get_field('foto')): ?>
                                    <div class="photo">
                                        <img src="<?= get_sub_field('foto')['url'] ?>" alt="<?= get_sub_field('foto')['alt'] ?>">
                                    </div>
                                <?php endif ?>


                                <p class="name"><?= get_sub_field('nombre') ?></p>
                                <p class="content formatted-content"><?= get_sub_field('testimonio') ?></p>

                                <div class="stars">
                                    <?php for ($i = 0; $i < get_sub_field('estrellas'); $i++) : ?>

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>

                                    <?php endfor ?>
                                </div>

                            </div>
                        <?php endwhile ?>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>
            </div>

        </div>
    </section>

<?php endif ?>