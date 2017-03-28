<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Namaskar_News
 */

 $i = rand(1, 15);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
<?php
if ( has_post_thumbnail() ) { ?>
	<div class="image-holder">
		<div class="card-image">
			<div class="featured-image">
			<?php //the_post_thumbnail(); ?>
			<img src="https://unsplash.it/1366/800?random=<?php echo $i; ?>">
			</div>
		</div>
	</div>
<?php } ?>
	<div class="entry">
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php nmnews_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if ( is_archive() ) {
				the_excerpt(); ?>
				<a class="more-link" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><span><?php _e( 'Read more', 'colormag' ); ?></span></a>
			<?php } else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nmnews' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nmnews' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php if ( is_archive() ) : ?>
		<a href="#" class="secondary-content vm"><i class="material-icons">expand_more</i></a>
		<?php endif; ?>
		<footer class="entry-footer">
			<?php //nmnews_entry_footer();
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				/* translators: %s: post title */
				comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nmnews' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
				echo '</span>';
			} ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->

