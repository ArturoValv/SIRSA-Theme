<?php if (get_field('mostrar_bloque')): ?>

    <section class="block-newsletter">

        <div class="container">

            <div class="block-newsletter__inner">


                <div class="heading">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>

                </div>

                <div class="form">

                    <div class="form-content">
                        <?= get_field('texto_de_formulario') ?>
                    </div>

                    <?= do_shortcode(get_field('shortcode_de_formulario')) ?>
                    
                </div>


            </div>

        </div>

    </section>

<?php endif ?>