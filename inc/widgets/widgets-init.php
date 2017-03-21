<?php
/**
 * Theme file to regiser widgets 
 *
 * @since  1.0.0 [<description>]
 *
 * @package  nmnews
 */

/**
* Register Widgets Class
*
* @since  1.0.0 [<description>]
*/

if ( ! class_exists( 'Nmnews_Register_widgets' ) ) {

	class Nmnews_Register_widgets{
		
		function __construct()
		{

			$this->get_widgets();
			
			add_action( 'widgets_init', array( $this, 'register_all_widgets') );
		}


		/**
		* [register_all_widgets Register All defined widgets]
		* @return [type] [Register All defined widgets]
		*/

		public function register_all_widgets() {

			register_widget( 'Nmnews_News_Cat_Style_1' );

			register_widget( 'Nmnews_News_Cat_Style_2' );

			register_widget( 'Nmnews_News_Quick_List' );

			register_widget( 'Nmnews_Slider' );

		}

		/**
		 * [get_widgets Load widget Files]
		 */
		public function get_widgets() {

			// News Category widget Style 1.
			require get_template_directory() . '/inc/widgets/widget-news-cat-style-1.php';

			// News Category widget Style 2.
			require get_template_directory() . '/inc/widgets/widget-news-cat-style-2.php';

			// News Quick List Widget File.
			require 'widget-news-quick-list.php';

			// Simple News Slider.
			require 'widget-nmnews-slider.php';
		}


	}
}

$register_widgets = new Nmnews_Register_widgets();