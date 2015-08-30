<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */
?>
<?php $is_doc_frontpage=preg_replace('/^https?:\/\//','',get_the_permalink()) == $_SERVER['SERVER_NAME']."/doc/"; ?>
<?php if(!is_front_page() &&
    !$is_doc_frontpage) : ?>
<div class="share-buttons">
    <?php fruitful_the_sharebuttons(); ?>
</div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-content">
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>
    <?php if (!is_front_page() && // doc首页不显示标题，其它页面显示
        !$is_doc_frontpage) {?>
        <header class="post-header">
            <h1 class="post-title entry-title"><?php echo ucfirst(get_the_title()); ?></h1>
        </header>
        <div class="meta-section tags">
                <span class="meta-value">
                    <span class="tutorial-date"><?php echo get_the_date(); ?></span>
                </span>
        </div>
    <?php } ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'fruitful' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'fruitful' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
