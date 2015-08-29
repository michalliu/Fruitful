<?php
/**
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */

get_header(); ?>

<?php
if (is_category()){
    $categories = get_the_category();
    $remove_sidebar = false;
    foreach ($categories as $category ) {
        if (in_array(strtolower($category->name) , ["news","tutorials"])) {
            $remove_sidebar = true;
            break;
        }
    }
    if ($remove_sidebar){
        fruitful_get_content_without_sidebar();
    } else {
?>
	<?php fruitful_get_content_with_custom_sidebar('blogright'); ?>
<?php
    }
}
?>
<?php get_footer(); ?>