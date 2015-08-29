<?php
/**
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */

get_header(); ?>

<?php
if (is_category()){
    $category = get_the_category();
    if (in_array(strtolower($category[0]->name) , ["news"])){
        fruitful_get_content_without_sidebar();
    } else {
?>
	<?php fruitful_get_content_with_custom_sidebar('blogright'); ?>
<?php
    }
}
?>
<?php get_footer(); ?>