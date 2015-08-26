<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */

get_header(); ?>
<?php
$categories = get_the_category(get_the_ID());
foreach ($categories as $category ) {
    if (strtolower($category->name) == "news"){
        mq_get_content_news('single-post');
    } else {
?>
        <?php fruitful_get_content_with_custom_sidebar('single-post'); ?>
<?php
    }
}
?>
<?php get_footer(); ?>