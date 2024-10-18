<?php
$post;
$id = $post->id;
?>
<section class="internal-banner">
    <div class="container">
        <div class="internal-banner__inner">
            <h1 class="page-title"><?= get_the_title($id) ?></h1>
        </div>
    </div>
</section>