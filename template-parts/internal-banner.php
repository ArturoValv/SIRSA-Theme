<?php
$post;
$id = $post->id;
$terms = get_the_terms(get_the_ID(), 'categoria-proyectos');
?>
<section class="internal-banner">
    <div class="container">
        <div class="internal-banner__inner">
            <h1 class="page-title"><?= get_the_title($id) ?></h1>


            <?php if (!empty($terms) && $terms): ?>

                <ul class="project-cats">

                    <?php foreach ($terms as $term) : ?>

                        <li class="cat"><a href="<?= get_term_link($term->term_id) ?>" ><?= $term->name ?></a></li>

                    <?php endforeach; ?>

                </ul>

            <?php endif; ?>
        </div>
    </div>
</section>