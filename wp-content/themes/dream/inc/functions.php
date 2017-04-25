<?php
add_action( 'wp_enqueue_scripts', 'dream_scripts_styles_method' );
/**
 * Register jquery scripts
 */
function dream_scripts_styles_method() {
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery_cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( of_get_option( 'dream_activate_slider', '0' ) == '1' ) { 
		if ( is_home() || is_front_page() ) {
			wp_enqueue_script( 'dream_slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery_cycle' ), false, true );

		}
	}
	
	echo "<!--[if lt IE 9]>\n";
	echo "<script type='text/javascript' src='".get_template_directory_uri()."/js/html5shiv.min.js'></script>\n";
	echo "<![endif]-->\n";
}


add_action('admin_print_styles', 'dream_admin_styles');
/**
 * Enqueuing some styles.
 *
 * @uses wp_enqueue_style to register stylesheets.
 * @uses wp_enqueue_style to add styles.
 */
function dream_admin_styles() {
	wp_enqueue_style( 'dream-fontawesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', array() );
	wp_enqueue_style( 'dream-admin-style', get_template_directory_uri(). '/inc/css/admin.css' );
}



if ( ! function_exists( 'dream_sidebar_select' ) ) :
/**
 * Fucntion to select the sidebar
 */
function dream_sidebar_select() {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_dream_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_dream_layout', true ); 
	}
	
	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$dream_default_layout = of_get_option( 'dream_default_layout', 'right_sidebar' );

	$dream_default_page_layout = of_get_option( 'dream_pages_default_layout', 'right_sidebar' );
	$dream_default_post_layout = of_get_option( 'dream_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $dream_default_page_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $dream_default_page_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( is_single() ) {
			if( $dream_default_post_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $dream_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( $dream_default_layout == 'right_sidebar' ) { get_sidebar(); }
		elseif ( $dream_default_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
	}
	elseif( $layout_meta == 'right_sidebar' ) { get_sidebar(); }
	elseif( $layout_meta == 'left_sidebar' ) { get_sidebar( 'left' ); }
}
endif;


add_filter( 'body_class', 'dream_body_class' );
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function dream_body_class( $dream_classes ) {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_dream_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_dream_layout', true ); 
	}

	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$dream_default_layout = of_get_option( 'dream_default_layout', 'right_sidebar' );

	$dream_default_page_layout = of_get_option( 'dream_pages_default_layout', 'right_sidebar' );
	$dream_default_post_layout = of_get_option( 'dream_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $dream_default_page_layout == 'right_sidebar' ) { $dream_classes[] = ''; }
			elseif( $dream_default_page_layout == 'left_sidebar' ) { $dream_classes[] = 'left-sidebar'; }
			elseif( $dream_default_page_layout == 'no_sidebar_full_width' ) { $dream_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( is_single() ) {
			if( $dream_default_post_layout == 'right_sidebar' ) { $dream_classes[] = ''; }
			elseif( $dream_default_post_layout == 'left_sidebar' ) { $dream_classes[] = 'left-sidebar'; }
			elseif( $dream_default_post_layout == 'no_sidebar_full_width' ) { $dream_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( $dream_default_layout == 'right_sidebar' ) { $dream_classes[] = ''; }
		elseif( $dream_default_layout == 'left_sidebar' ) { $dream_classes[] = 'left-sidebar'; }
		elseif( $dream_default_layout == 'no_sidebar_full_width' ) { $dream_classes[] = 'no-sidebar-full-width'; }

	}
	elseif( $layout_meta == 'right_sidebar' ) { $dream_classes[] = ''; }
	elseif( $layout_meta == 'left_sidebar' ) { $dream_classes[] = 'left-sidebar'; }
	elseif( $layout_meta == 'no_sidebar_full_width' ) { $dream_classes[] = 'no-sidebar-full-width'; }


	return $dream_classes;
}
?>