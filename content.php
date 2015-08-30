<?php
/**
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */
?>
<?php $options = fruitful_get_theme_options(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog_post' . (is_single() ? ' single-post' : '')); ?>>
	<?php $day 		 = get_the_date('d'); 
		  $month_abr = get_the_date('M');
	?>
	<?php if (get_the_title() == '') : ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
	<?php endif; ?>	
	
    <?php if (is_single()) { ?>
        <div class="share-buttons" style="float:right;">
            <?php fruitful_the_sharebuttons(); ?>
        </div>
    <?php } else { ?>

	<div class="date_of_post updated">
		<span class="day_post"><?php print $day; ?></span>
		<span class="month_post"><?php print $month_abr; ?></span>
	</div>
    <?php } ?>
	<?php if (get_the_title() == '') : ?>
		</a>
	<?php endif; ?>
	
	<div class="post-content">	
	<header class="post-header">
		<?php if ( is_single() ) : ?>
			<h1 class="post-title entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<?php if (get_the_title() != '') : ?>
			<h2 class="post-title entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'fruitful' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php endif; ?>
		<?php endif; // is_single() ?>		
		
		
		<?php if ( !is_single() ) : ?>
			<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
		<?php endif; // is_single() ?>
		<?php if ( is_single() ) : 
				if ($options['show_featured_single'] == 'on'){
					if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php endif;
				} ?>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->
    <?php if (is_single()) : ?>
        <div class="meta-section tags">
                <span class="meta-value">
                    <span class="tutorial-date"><?php echo get_the_date(); ?></span>
                </span>
            <?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', __( ', ', 'fruitful' ) );
            if ( $tags_list ) : ?>
                <span class="tag-links">
			            <?php // printf( __( 'Tagged %1$s', 'fruitful' ), $tags_list ); ?>
                        <?php echo $tags_list; ?>
		            </span>
            <?php endif; // End if $tags_list ?>
        </div>
    <?php endif; ?>
	<?php if ( (is_search())) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
        <?php if (!is_single()) {
            the_excerpt();
        } else { ?>
		<?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'fruitful' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'fruitful' ), 'after' => '</div>' ) ); ?>
	    <?php } ?>
    </div><!-- .entry-content -->
	<?php endif; ?>
    <?php if (is_single()) { ?>
	<footer class="entry-meta">
		<?php fruitful_entry_meta(); ?>
		
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'fruitful' ), __( '1 Comment', 'fruitful' ), __( '% Comments', 'fruitful' ) ); ?></span>
		<?php } ?>
		
		<?php edit_post_link( __( 'Edit', 'fruitful' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
    <?php } ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
