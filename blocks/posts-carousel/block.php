<?php if (get_field('mostrar_bloque')): ?>

    <section id="<?= preg_replace('/\s+/', '',get_field('id_ancla')) ?>" class="block-posts-carousel">

        <div class="container">

            <div class="block-posts-carousel__inner swiper">

                <div class="heading">
                    <<?= get_field('etiqueta_de_titulo_del_bloque') ?> class="block-title h2"><?= get_field('titulo_del_bloque') ?></<?= get_field('etiqueta_de_titulo_del_bloque') ?>>
                    <div class="swiper-navigation">
                        <div class="swiper-button-prev arrow"></div>
                        <div class="swiper-button-next arrow"></div>
                    </div>
                </div>

                <div class="posts swiper-wrapper">

                    <?php
                    if (have_rows('posts')) : while (have_rows('posts')): the_row();
                            $postid = get_sub_field('post');
                    ?>
                            <article class="post swiper-slide">

                                <div class="post__inner">

                                    <a href="<?= get_the_permalink($postid) ?>" class="post__thumbnail">
                                        <?= get_the_post_thumbnail($postid) ?>
                                    </a>

                                    <div class="post__wrapper">

                                        <div class="post__meta">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z" />
                                            </svg>
                                            <span><?= get_the_time('F j, Y', $postid) ?></span>
                                        </div>

                                        <div class="post__content">
                                            <p class="title h3">
                                                <a href="<?= get_the_permalink($postid) ?>" class="link">
                                                    <?= get_the_title($postid) ?>
                                                </a>
                                            </p>
                                            <p class="excerpt"><?= get_the_excerpt($postid) ?></p>
                                            <a class="permalink" href="<?= get_the_permalink($postid) ?>" class="link">Leer Más<span>&#10095;</span></a>
                                        </div>

                                    </div>

                                </div>

                            </article>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </div>

            </div>

        </div>

    </section>

<?php endif ?>