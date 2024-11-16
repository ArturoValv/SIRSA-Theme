<?php if (get_field('mostrar_bloque')): ?>
    <section id="<?= preg_replace('/\s+/', '',get_field('id_ancla')) ?>" class="block-posts-form-carousel">
        <div class="container">
            <div class="block-posts-form-carousel__inner">
                <div class="block-posts-form-carousel__top">

                    <div class="posts-carousel">
                        <div class="posts-carousel__carousel swiper">

                            <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>

                            <div class="swiper-pagination"></div>

                            <div class="posts-carousel__wrapper swiper-wrapper">

                                <?php
                                if (have_rows('carrusel_de_publicaciones')) :
                                    while (have_rows('carrusel_de_publicaciones')) : the_row();
                                        $post_id = get_sub_field('post');
                                ?>

                                        <div class="swiper-slide post">
                                            <div class="post__inner">
                                                <img src="<?= get_the_post_thumbnail_url($post_id) ?>" alt="<?= get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', TRUE); ?>" class="post__pic">

                                                <div class="post__content">
                                                    <p class="post__title h3">
                                                        <a href="<?= get_the_permalink($post_id) ?>">
                                                            <?= get_the_title($post_id) ?>
                                                        </a>
                                                    </p>

                                                    <p class="post__excerpt"><?= get_the_excerpt($post_id) ?></p>

                                                    <a href="<?= get_the_permalink($post_id) ?>" class="post__permalink">Read More <span>&#10095;</span></a>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    endwhile;
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="posts-form">

                        <div class="form">
                            <p class="form__title h5"><?= get_field('titulo_de_formulario') ?></p>

                            <div class="form__wrapper">
                                <?= do_shortcode(get_field('shortcode_de_formulario')) ?>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="block-posts-form-carousel__bottom">

                    <div class="settlements">
                        <div class="settlements__inner">

                            <?php if (get_field("mostrar_cifras_de_interes")): ?>

                                <?php while (have_rows("cifras_de_interes")): the_row();
                                    $icon = get_sub_field("icono")['mime_type'] === "image/svg+xml" ? file_get_contents(get_sub_field("icono")['url']) : '<img src="' . get_sub_field("icono")['url'] . '">';
                                ?>

                                    <div class="settlement">

                                        <div class="icon-wrapper">
                                            <?= $icon ?>
                                        </div>

                                        <div class="content">
                                            <span class="amount" data-value="<?= get_sub_field('cifra') ?>"><?= get_sub_field('cifra') ?></span>

                                            <p class="concept"><?= get_sub_field('concepto') ?></p>
                                        </div>

                                    </div>

                                <?php endwhile ?>

                            <?php endif ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif ?>