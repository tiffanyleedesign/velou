<?php
/**
 * Velou functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Velou
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'velou_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function velou_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Velou, use a find and replace
		 * to change 'velou' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'velou', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'header' => esc_html__( 'Header Menu Location', 'velou' ),
				'social' => esc_html__( 'Social Menu Location', 'velou' ),
				'footer' => esc_html__( 'Footer Menu Location', 'velou' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'velou_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'velou_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function velou_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'velou_content_width', 640 );
}
add_action( 'after_setup_theme', 'velou_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function velou_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'velou' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'velou' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'velou_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function velou_scripts() {
	wp_enqueue_style( 'fwd-googlefonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null );
	wp_enqueue_style( 'velou-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'velou-style', 'rtl', 'replace' );

	wp_enqueue_script( 'velou-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// ACF 
	wp_enqueue_script( 'google-map', get_template_directory_uri() . '/js/google-map.js', array('jquery', 'google-server'), _S_VERSION, true );

	wp_enqueue_script( 'google-server', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBikYKlwTBF1oqJoGwS0guUr_UJgIqA13Y', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() || is_page(21)) {
		// wp_enqueue_style(
		// 	'swiper-styles',
		// 	get_template_directory_uri() .'/scss/swiper/swiper.scss',
		// 	array(),
		// 	'6.6.1'
		// );
		wp_enqueue_script(
			'swiper-scripts',
			get_template_directory_uri() .'/js/swiper-bundle.min.js',
			array(),
			'6.6.1',
			true
		);
		wp_enqueue_script(
			'swiper-settings',
			get_template_directory_uri() .'/js/swiper-settings.js',
			array( 'swiper-scripts' ),
			_S_VERSION,
			true
		);
	}

	// Gallery filtering effect
	if ( is_page(111)) {
		wp_enqueue_script(
			'gallery-filter',
			get_template_directory_uri() .'/js/gallery-filter.js',
		);
		
	}

	//service page and faq page
	if(is_page(array(106, 12))) {
		wp_enqueue_script ( 'accordion-menu', get_template_directory_uri() . '/js/accordion.js', array(), _S_VERSION, true );
	} 
}
add_action( 'wp_enqueue_scripts', 'velou_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
* Custom Post Types & Taxonomies
*/
require get_template_directory() . '/inc/cpt-taxonomy.php';


// Changes the Block Editor to Classic Editor for some Pages

// function velou_post_filter( $use_block_editor, $post ) {
//     $page_ids = array( 2 );
//     if ( in_array( $post->ID, $page_ids ) ) {
//         return false;
//     } else {
//         return $use_block_editor;
//     }
// }
// add_filter( 'use_block_editor_for_post', 'velou_post_filter', 10,  2 );

// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBikYKlwTBF1oqJoGwS0guUr_UJgIqA13Y';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function velou_excerpt_length(){
	return 50;
}

add_filter('excerpt_length', 'velou_excerpt_length', 999 );

// Edit the Read More link

function velou_excerpt_more( $more ){
	$more = '.. <a class="read-more" href="'.get_permalink() .'">View More</a>';
	return $more;
}
add_filter('excerpt_more', 'velou_excerpt_more');