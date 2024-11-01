<?php

$col1 = get_field('columna_1');
$col2 = get_field('columna_2');
$col3 = get_field('columna_3');

if (get_field('mostrar_bloque')):
?>
    <section id="<?= preg_replace('/\s+/', '',get_field('id_ancla')) ?>" class="block-statistics">
        <div class="block-statistics__inner">

            <div class="col">

                <div class="col__inner">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h3"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>
                    <div class="content formatted-content">
                        <?= $col1['contenido'] ?>
                    </div>
                    <a href="<?= $col1['link']['url'] ?>" class="link"><?= $col1['link']['title'] ?><span>&#10095;</span></a>
                </div>

            </div>

            <div class="col">
                <div class="col__inner">
                    <span class="pretitle h5"><?= $col2['pre-encabezado'] ?></span>
                    <<?= $col2['etiqueta_del_encabezado'] ?> class="title h4"><?= $col2['encabezado'] ?></<?= $col2['etiqueta_del_encabezado'] ?>>

                    <div class="graphics">
                        <?php foreach ($col2['graficas'] as $item): ?>
                            <div class="graph">
                                <span><?= $item['concepto'] ?></span>
                                <span><?= $item['porcentaje'] ?>%</span>

                                <div class="bar" data-value="<?= $item['porcentaje'] ?>">
                                    <hr>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col__inner">
                    <span class="pretitle h5"><?= $col2['pre-encabezado'] ?></span>
                    <<?= $col3['etiqueta_del_encabezado'] ?> class="title h4"><?= $col3['encabezado'] ?></<?= $col3['etiqueta_del_encabezado'] ?>>
                    <div class="content formatted-content">
                        <?= $col3['contenido'] ?>
                    </div>

                    <div class="amounts">
                        <?php foreach ($col3['cifras_de_interes'] as $item): ?>
                            <div class="amount">
                                <span class="value" data-value="<?= $item['cifra'] ?>"><?= $item['cifra'] ?></span>
                                <span class="concept h4"><?= $item['concepto'] ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>

                </div>
            </div>

        </div>
    </section>

<?php endif ?>