<?php
/**
 * adamjang functions and definitions
 *
 * @package adamjang
 */


if ( ! function_exists( 'adamjang_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adamjang_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on adamjang, use a find and replace
	 * to change 'adamjang' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'adamjang', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'adamjang' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adamjang_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // adamjang_setup
add_action( 'after_setup_theme', 'adamjang_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function adamjang_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'adamjang' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'adamjang_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adamjang_scripts() {
	wp_enqueue_style( 'adamjang-style', get_stylesheet_uri() );

	wp_enqueue_script( 'adamjang-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20130111', true );
	
	wp_enqueue_script( 'adamjang-jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20130111', true );

	wp_enqueue_script( 'adamjang-easing', get_template_directory_uri() . '/js/easing.js', array(), '20130111', true );

	wp_enqueue_script( 'adamjang-nprogress', get_template_directory_uri() . '/js/nprogress.js', array(), '20130111', true );

	wp_enqueue_script( 'adamjang-app', get_template_directory_uri() . '/js/app.js', array(), '20130111', true );

	wp_enqueue_script( 'adamjang-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'adamjang-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adamjang_scripts' );

/**
* Custom Post Type for projects
*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'projects',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Project' )
			),
			'public' => true,
			'has_archive' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'project'),
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
		)
	);
}

/**
 * Change max length of excerpt
 */
function my_excerpt_length($length) {
  return 340; // Or whatever you want the length to be.
}
add_filter('excerpt_length', 'my_excerpt_length');


/**
 * Remove Auto P tags on images.
 */
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

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
