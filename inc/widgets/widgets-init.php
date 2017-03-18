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

if( !class_exists( 'Nmnews_Register_widgets' ) ) {

class Nmnews_Register_widgets
{
	
	function __construct()
	{

		$this->get_widgets();
		
		add_action( 'widgets_init', array( $this, 'register_all_widgets') );
	}


/**
 * [register_all_widgets Register All defined widgets]
 * @return [type] [Register All defined widgets]
 */

public function register_all_widgets(){

	
	register_widget('Nmnews_News_Cat_Style_1');

	register_widget('Nmnews_News_Cat_Style_2');



}

/**
 * [get_widgets Load widget Files]
 * @return [type] [Load widget Files]
 */
public function get_widgets(){

//News Category widget Style 1
require get_template_directory() . '/inc/widgets/widget-news-cat-style-1.php';

//News Category widget Style 2
require get_template_directory() . '/inc/widgets/widget-news-cat-style-2.php';



}


}
}

$register_widgets = new Nmnews_Register_widgets();