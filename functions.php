<?php
/**
 * bootscore functions and definitions.
 *
 *
 * @package bootscore
 */

if ( ! function_exists( 'bootscore_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootscore_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootscore, use a find and replace
	 * to change 'bootscore_wp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bootscore_wp', get_template_directory() . '/languages' );

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
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_waker in bootscore location.
	register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bootscore_wp' ),
    'footer-links' => esc_html__( 'Footer Links', 'bootscore_wp' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bootscore_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bootscore_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootscore_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootscore_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootscore_wp_content_width', 0 );

/**
 * Register widget area.
 *
 */
// function bootscore_wp_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'bootscore_wp' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'bootscore_wp' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'bootscore_wp_widgets_init' );

/**
 * Register widget area.
 *
 */
function bootscore_wp_widgets_init() {

	function create_bootscore_wp_widget($name, $id, $desc ){
		register_sidebar( array(
			'name'          => $name,
			'id'            => $id,
			'description'   => $desc,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	create_bootscore_wp_widget('Main Sidebar', 'main', 'Default Sidebar');
	//create_bootscore_wp_widget('Left Sidebar', 'left', 'Sidebar widget will be displayed in left sidebar template only');
	create_bootscore_wp_widget('Footer Left Widget', 'footer_left', 'Widget will be displayed in footer left widget area');
	create_bootscore_wp_widget('Footer Middle Widget', 'footer_middle', 'Widget will be displayed in footer middle widget area');
	create_bootscore_wp_widget('Footer Right Widget', 'footer_right', 'Widget will be displayed in footer right widget area');

}
add_action( 'widgets_init', 'bootscore_wp_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function bootscore_wp_scripts() {

	wp_enqueue_style('bootscore_wp-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootscore_wp-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	
	wp_enqueue_style( 'bootscore_wp-style', get_stylesheet_uri() );

	
	wp_enqueue_script( 'bootscore_wp-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

	wp_enqueue_script( 'bootscore_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootscore_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
 * Custome post type register
 */
require get_template_directory() . '/inc/custom-posts/cpt-functions.php';


/**
 * cmb2 metabox framework added
 */
require get_template_directory() . '/inc/metaboxes/cmb-functions.php';


/**
 * Option tree support added
 */

require get_template_directory() . '/inc/admin/ot-functions.php';


/**
 * shortcodes added
 */
require get_template_directory() . '/inc/shortcodes/sc-functions.php';