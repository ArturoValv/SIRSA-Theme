<?php if (get_field('mostrar_bloque')): ?>

    <section id="<?= preg_replace('/\s+/', '',get_field('id_ancla')) ?>" class="block-logos-grid">

        <div class="container">

            <div class="block-logos-grid__inner">

                <img src="<?= get_field('imagen_de_fondo')['url'] ?>" alt="<?= get_field('imagen_de_fondo')['alt'] ?>" class="bg-img">

                <div class="block-logos-grid__wrapper">

                    <div class="heading">
                        <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>

                        <div class="heading-content">
                            <?= get_field('contenido') ?>
                        </div>
                    </div>

                    <div class="logos">

                        <?php
                        if (have_rows('logos')) : while (have_rows('logos')): the_row();
                        ?>
                                <div class="logo">
                                    <img src="<?= get_sub_field('logo')['url'] ?>" alt="<?= get_sub_field('logo')['alt'] ?>">
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif ?>