<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Namaskar_News
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single" role="main">
			<div class="container">
				<div class="row">
					<div class="col s12 l9">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );
						echo get_nmnews_custom_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) : ?>
						<?php comments_template(); ?>
						<?php
						endif;

					endwhile; // End of the loop.
					?>
					</div>
					<div class="col s12 l3">
					<?php
					if ( is_active_sidebar( 'home-right-sidebar' ) ) :
						dynamic_sidebar( 'home-right-sidebar' );
					endif;
					?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
