<?php
/*Template Name: Template Homepage*/
?>
<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}
?>

<?php get_footer() ?>