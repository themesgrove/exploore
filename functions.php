<?php
/**
 * exploore functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package exploore
 */

if ( ! function_exists( 'exploore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exploore_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on exploore, use a find and replace
	 * to change 'exploore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'exploore', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'exploore' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'caption',
	) );



	// Custom logo enable 
	add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'max-width'   => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        ) 
	);

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'audio',
		'gallery',
		'link',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exploore_custom_background_args', array(
		'default-color' => '#f5f5f5',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'exploore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function exploore_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'exploore_custom_excerpt_length', 999 );

function exploore_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'exploore_excerpt_more' );


function exploore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exploore_content_width', 640 );
}
add_action( 'after_setup_theme', 'exploore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function exploore_scripts() {


	$headings_font = esc_html(get_theme_mod('heading_google_font'));
	$body_font = esc_html(get_theme_mod('body_google_font'));
	if( $headings_font ) {
		wp_enqueue_style( 'headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style('Lato-fonts',  get_template_directory_uri() . '/assets/css/lato-fonts.css');
	}
	if( $body_font ) {
		wp_enqueue_style( 'body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style('Muli-fonts',  get_template_directory_uri() . '/assets/css/muli-fonts.css');
	}




	// Bootstap Stylesheet
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');

	// Ionsicon Stylesheet
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/css/ionicons.css');

	// Fontawesome Stylesheet
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	
	// Site Stylesheet
	wp_enqueue_style( 'exploore-style', get_stylesheet_uri() );
	




	// Bootstrap Script
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '20151215', true );
	
	// Theme Main Script
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/exploore.js', array('jquery'), '20151217', true );

	// Navigation Script
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151218', true );

	// Focus Link Script
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151219', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exploore_scripts' );


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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * theme reent post
 */
require get_template_directory() . '/inc/widgets/recent-post.php';

/**
 * about us widget
 */
require get_template_directory() . '/inc/widgets/widget-about.php';

/**
 * theme about us
 */
require get_template_directory() . '/inc/widgets.php';



/**
 * Google font sanitize callback
 */
require get_template_directory() . '/inc/font.php';


/*
 * tgm plugin
 * */
require get_template_directory() . '/plugin/class-tgm-plugin-activation.php';

require get_template_directory() . '/inc/plugin-activation.php';





