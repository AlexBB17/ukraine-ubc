<?php
/**
 * dream functions and definitions
 *
 * @package dream
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 670; /* pixels */
}

if ( ! function_exists( 'dream_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dream_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dream, use a find and replace
	 * to change 'dream' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dream', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => __( 'Primary Menu', 'dream' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dream_custom_background_args', array(
		'default-image' => get_template_directory_uri().'/images/bg.png',
		'default-repeat' => 'repeat-x',
		'default-position-x' => 'center',
	) ) );
	
	add_theme_support( 'post-thumbnails' );
	
	add_editor_style();
}
endif; // dream_setup
add_action( 'after_setup_theme', 'dream_setup' );

/**
 * Enqueue scripts and styles.
 */
function dream_theme_scripts() {
	wp_enqueue_style( 'dream-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dream-font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',array() );
	wp_enqueue_style( 'dream-google-fonts','//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700',array() );

	wp_enqueue_script( 'dream-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dream-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'dream-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'dream-fitvids-doc-ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	
	wp_enqueue_script( 'dream-basejs',get_template_directory_uri().'/js/base.js',array('jquery'),'' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dream_theme_scripts' );

/**
 * Fav icon for the site
 */
function dream_favicon() {
	if ( of_get_option( 'dream_activate_favicon', '0' ) == '1' ) {
		$dream_favicon = of_get_option( 'dream_favicon', '' );
		$dream_favicon_output = '';
		if ( !empty( $dream_favicon ) ) {
			$dream_favicon_output .= '<link rel="shortcut icon" href="'.esc_url( $dream_favicon ).'" type="image/x-icon" />';
		}
		echo $dream_favicon_output;
	}
}
add_action( 'admin_head', 'dream_favicon' );
add_action( 'wp_head', 'dream_favicon' );

/**
 * Hooks the Custom Internal CSS to head section
 */
function dream_custom_css() {

	$dream_internal_css = '';

	$primary_color = esc_attr(of_get_option( 'dream_primary_color', '#ff8800' ));	
	if( $primary_color != '#ff8800' ) {
		$dream_internal_css .= 'blockquote{border-left:2px solid '.$primary_color.';}pre{border-left:2px solid '.$primary_color.';}button,input[type="button"],input[type="reset"],input[type="submit"]{background:'.$primary_color.';}a:hover,a:focus,a:active{color:'.$primary_color.';}.main-navigation .current_page_item,.main-navigation .current-menu-item{background:'.$primary_color.';}.mr li:first-child{background:'.$primary_color.';}.main-navigation li a:hover{background:'.$primary_color.';}.main-navigation .sub-menu,.main-navigation .children{background:'.$primary_color.';}.nav-foot{background:'.$primary_color.';}.pagination .nav-links a:hover{color:'.$primary_color.';}.pagination .current{color:'.$primary_color.';}.entry-content a{color:'.$primary_color.';}.search-form .search-submit{background-color:'.$primary_color.';}.wp-pagenavi span.current{color:'.$primary_color.';}.main-navigation li a:hover{background:'.$primary_color.';}#controllers a:hover, #controllers a.active{color:'.$primary_color.';}#slider-title a{background:'.$primary_color.';}#controllers a:hover, #controllers a.active{background-color:'.$primary_color.';}';
	}

	if( !empty( $dream_internal_css ) ) {
		?>
		<style type="text/css"><?php echo $dream_internal_css; ?></style>
		<?php
	}
}
add_action('wp_head', 'dream_custom_css');

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


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );


require_once( get_template_directory() . '/inc/header-functions.php' );
require_once( get_template_directory() . '/inc/functions.php' );
require_once( get_template_directory() . '/inc/widgets/widgets.php' );
?>