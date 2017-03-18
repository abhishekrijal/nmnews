<?php
if ( ! class_exists( 'Nmnews_News_Cat_Style_1' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Nmnews_News_Cat_Style_1 extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'                   => 'Nmnews_News_Cat_Style_1',
				'description'                 => esc_html__( 'News Listing Style 1', 'nmnews' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'nmnews-news-cat-1', esc_html__( 'News Listing Style 1', 'nmnews' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			extract( $args );
			extract( $instance );

			global $post;
			$number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
			$type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
			$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

			if( $type == 'latest' ) {
				 $get_featured_posts = new WP_Query( array(
						'posts_per_page'        => $number,
						'post_type'             => 'post',
						'ignore_sticky_posts'   => true
				 ) );
			}
			else {
				 $get_featured_posts = new WP_Query( array(
						'posts_per_page'        => $number,
						'post_type'             => 'post',
						'category__in'          => $category
				 ) );
			}
			echo $before_widget;
			?>
			<?php
			while ( $get_featured_posts->have_posts() ) : $get_featured_posts->the_post();
			?>
			<div class="card">
				<div class="card-image">
				<?php the_post_thumbnail( array(500, 225) ); ?>
				<span class="card-title"><?php the_title(); ?></span>
				</div>
				<div class="card-content">
				<p><?php the_excerpt(); ?></p>
				</div>
				<div class="card-action">
				<a href="<?php the_permalink(); ?>">This is a link</a>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
			<?php echo $after_widget;


		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;
			$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
			$instance[ 'type' ] = $new_instance[ 'type' ];
			$instance[ 'category' ] = $new_instance[ 'category' ];

			return $instance;
			

		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

		$tg_defaults['number'] = 4;
		$tg_defaults['type'] = 'latest';
		$tg_defaults['category'] = '';
		$instance = wp_parse_args( (array) $instance, $tg_defaults );
		$number = $instance['number'];
		$type = $instance['type'];
		$category = $instance['category'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'nmnews' ); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'nmnews' );?><br />
		<input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'nmnews' );?><br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'nmnews' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
		</p>

		<?php

			}
		}

endif;
