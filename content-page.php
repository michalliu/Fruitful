<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */
?>
<div class="share-buttons">
    <?php fruitful_the_sharebuttons(); ?>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-content">
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>
    <?php $doc_frontpage=preg_replace('/^https?:\/\//','',get_the_permalink());?>
    <?php if (!is_front_page() && // doc首页不显示标题，其它页面显示
        $doc_frontpage != $_SERVER['SERVER_NAME']."/doc/") {?>
        <header class="post-header">
            <h1 class="post-title entry-title"><?php the_title(); ?></h1>
        </header>
    <?php } ?>
    <div class="meta-section tags">
            <span class="meta-value">
                <span class="tutorial-date"><?php echo get_the_date(); ?></span>
            </span>
    </div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'fruitful' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'fruitful' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
