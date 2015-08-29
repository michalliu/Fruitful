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
$remove_sidebar = false;
foreach ($categories as $category ) {
    if (in_array(strtolower($category->name) , ["news","tutorials"])) {
        $remove_sidebar = true;
        break;
    }
}
    if ($remove_sidebar){
        fruitful_get_content_without_sidebar('single-post');
    } else {
?>
        <?php fruitful_get_content_with_custom_sidebar('single-post'); ?>
<?php
    }
?>
<?php get_footer(); ?>