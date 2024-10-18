<?php if (get_field('mostrar_bloque')): ?>

    <section class="block-practice-areas">
        <div class="container">
            <div class="block-practice-areas__inner">
                <div class="heading">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>
                    <div class="heading-text">
                        <p><?= get_field('texto_lateral') ?></p>
                    </div>
                </div>
                <div class="practice-areas">
                    <?php if (have_rows('areas_de_practica')) : while (have_rows('areas_de_practica')): the_row(); ?>
                            <div class="pa">

                                <?php if (get_sub_field("imagen_de_fondo")): ?>
                                    <img src="<?= get_sub_field("imagen_de_fondo")['url'] ?>" alt="<?= get_sub_field("imagen_de_fondo")['alt'] ?>" class="bg-img">
                                <?php endif ?>

                                <div class="pa-wrapper">

                                    <div class="content-wrapper">
                                        <p class="heading h3"><?= get_sub_field('titulo') ?></p>
                                        <p class="content"><?= get_sub_field('contenido') ?></p>
                                        <a href="<?= get_sub_field('link')['url'] ?>" class="link"><?= get_sub_field('link')['title'] ?><span>&#10095;</span></a>
                                    </div>

                                </div>

                                <div class="title">
                                    <a href="<?= get_sub_field('link')['url'] ?>" class="h3"><?= get_sub_field('titulo') ?></a>
                                </div>

                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>

    </section>

<?php endif ?>