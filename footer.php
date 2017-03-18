<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Namaskar_News
 */

?>

	</div><!-- #content -->

	<footer class="page-footer">
		<div class="container">
		<div class="row">
			<div class="col l6 s12">
			<h5 class="white-text">Footer Content</h5>
			<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col l4 offset-l2 s12">
			<h5 class="white-text">Links</h5>
			<ul>
				<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
			</ul>
			</div>
		</div>
		</div>
		<div class="footer-copyright">
		<div class="container">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nmnews' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nmnews' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'nmnews' ), 'nmnews', '<a href="https://automattic.com/" rel="designer">Restrology</a>' ); ?>
		</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
