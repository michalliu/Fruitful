<?php
/**
 * Template Name: WOO Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div class="markdown-body">
<?php fruitful_get_content_with_custom_sidebar('page'); ?>
</div>
<?php get_footer(); ?>