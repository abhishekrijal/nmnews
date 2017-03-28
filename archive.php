<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Namaskar_News
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main archive" role="main">
			<div class="container">
				<div class="row">
					<div class="col s12 m8">
					<?php
					if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
								$title = sprintf( __( '%s' ), single_cat_title( '', false ) );
								printf( '<h1 class="page-title">%s</h1>' , $title );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_format() );
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					</div>
					<div class="col s12 m4">
					<?php
					if ( is_active_sidebar( 'home-right-sidebar' ) ) :
						dynamic_sidebar( 'home-right-sidebar' );
					endif;
					?>
					</div>
				</div>
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
