<?php
/**
 * Namaskar News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Namaskar_News
 */

if ( ! function_exists( 'nmnews_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function nmnews_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Namaskar News, use a find and replace
		* to change 'nmnews' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'nmnews', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'nmnews' ),
			'social_menu' => esc_html__( 'Social Menu', 'nmnews' ),
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nmnews_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
		* Enable support for custom logo.
		*/
			add_theme_support( 'custom-logo', array(
				'flex-height' => true,
				'flex-width'  => true,
			) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'nmnews_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nmnews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nmnews_content_width', 640 );
}
add_action( 'after_setup_theme', 'nmnews_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nmnews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nmnews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nmnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Homepage Right Sidebar.
	register_sidebar( array(
		'name'          => esc_html__( 'Home Right Sidebar', 'nmnews' ),
		'id'            => 'home-right-sidebar',
		'description'   => esc_html__( 'Add widgets for Right Sidebar.', 'nmnews' ),
		'before_widget' => '<div id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title card-title">',
		'after_title'   => '</span >',
	) );

	// Homepage News Feed Sidebar.
	register_sidebar( array(
		'name'          => esc_html__( 'Home News Feed Sidebar', 'nmnews' ),
		'id'            => 'home-newsfeed-sidebar',
		'description'   => esc_html__( 'Add widgets Newsfeed', 'nmnews' ),
		'before_widget' => '<div id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title card-title">',
		'after_title'   => '</span >',
	) );

	// Homepage Left Sidebar.
	register_sidebar( array(
		'name'          => esc_html__( 'Home Left Sidebar', 'nmnews' ),
		'id'            => 'home-left-sidebar',
		'description'   => esc_html__( 'Add widgets for Left Sidebar.', 'nmnews' ),
		'before_widget' => '<div id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title card-title">',
		'after_title'   => '</span >',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'nmnews' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Add widgets here to display in the footer area', 'nmnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nmnews_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nmnews_scripts() {
	wp_enqueue_style( 'materialize-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_enqueue_style( 'materialize-style', get_template_directory_uri() . '/third-party/materialize/css/materialize.css' );
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/third-party/owl-carousel/dist/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-style', get_template_directory_uri() . '/third-party/owl-carousel/dist/assets/owl.theme.default.css' );
	wp_enqueue_style( 'malihu-scrollbar-style', get_template_directory_uri() . '/third-party/malihu-custom-scrollbar/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'nmnews-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nmnews-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/third-party/owl-carousel/dist/owl.carousel.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'nmnews-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'materialize-js', get_template_directory_uri() . '/third-party/materialize/js/materialize.js' , array( 'jquery' ), '', true );
	wp_enqueue_script( 'malihu-custom-scrollbar-js', get_template_directory_uri() . '/third-party/malihu-custom-scrollbar/js/jquery.mCustomScrollbar.min.js' , array( 'jquery' ), '', true );
	wp_enqueue_script( 'nmnews-js', get_template_directory_uri() . '/js/nmnews-js.js', array( 'jquery', 'materialize-js' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'nmnews_scripts' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/widgets/widgets-init.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/nmnews-custom-functions.php';

