<section class="cover-slider">
    <div class="cover-slider__inner">

        <?php
        if (have_rows('slider')) :
            $i = 0;
            while (have_rows('slider')) : the_row();

                switch (get_sub_field('posicion_del_contenido_de_diapositiva')) {
                    case 'Centro Centro':
                        $content_position = 'center';
                        break;

                    case 'Centro Derecha':
                        $content_position = 'right';
                        break;

                    default:
                        $content_position = 'left';
                        break;
                }

        ?>

                <div class="slide" data-id="slide-<?= $i ?>">
                    <?php if (get_sub_field('imagen_de_fondo')): ?>
                        <img src="<?= get_sub_field('imagen_de_fondo')['url'] ?>" alt="<?= get_sub_field('imagen_de_fondo')['alt'] ?>" class="bg-img">
                    <?php endif ?>

                    <div class="slide__inner" style="background-color:<?= get_sub_field('color_de_capa_traslucida') ?>;">
                        <div class="container <?= $content_position ?>">
                            <div class="content">
                                <<?= get_sub_field('etiqueta_de_titulo') ?> class="title h1"><?= get_sub_field('titulo') ?></<?= get_sub_field('etiqueta_de_titulo') ?>>
                                <p class="subtitle hide-on-mobile formatted-text"><?= get_sub_field('subtitulo') ?></p>
                                <a href="<?= get_sub_field('boton')['url'] ?>" class="btn white">
                                    <span>
                                        <?= get_sub_field('boton')['title'] ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

        <?php
                $i++;
            endwhile;
        endif;
        ?>

    </div>
</section>