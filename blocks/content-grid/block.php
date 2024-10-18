<?php if (get_field('mostrar_bloque')): ?>

    <section class="block-content-grid">

        <div class="block-content-grid__grid">
            <div class="col-image">
                <img src="<?= get_field('imagen_primer_columna')['url'] ?>" alt="<?= get_field('imagen_primer_columna')['alt'] ?>">
            </div>
            <div class="col-cite">
                <div class="quote">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h6"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>
                    <?php
                    $quote = get_field("cita");
                    if($quote):
                    ?>
                        <p class="cite"><q><?= $quote['texto'] ?></q></p>
                        <div class="photo">
                            <img src="<?= $quote['foto']['url'] ?>" alt="<?= $quote['foto']['alt'] ?>">
                        </div>
                        <p class="author">
                            <?= $quote['autor'] ?>
                            <span><?= $quote['posicion_o_puesto'] ?></span>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-squares">
                <?php if (have_rows('cuadricula_de_contenido')) : while (have_rows('cuadricula_de_contenido')): the_row();
                        $icon = get_sub_field("icono")['mime_type'] === "image/svg+xml" ? file_get_contents(get_sub_field("icono")['url']) : '<img src="' . get_sub_field("icono")['url'] . '">';
                ?>
                        <div class="item">

                            <img src="<?= get_sub_field("imagen_de_fondo")['url'] ?>" alt="<?= get_sub_field("imagen_de_fondo")['alt'] ?>" class="bg-img">

                            <div class="item-wrapper">

                                <div class="icon-wrapper">
                                    <?= $icon ?>
                                </div>

                                <div class="content-wrapper">
                                    <p class="heading h4">
                                        <?= get_sub_field('titulo') ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="arrow"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                        </svg>
                                    </p>
                                    <p class="content"><?= get_sub_field('contenido') ?></p>
                                </div>

                            </div>

                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>

    </section>

<?php endif ?>