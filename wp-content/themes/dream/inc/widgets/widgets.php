<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
 
add_action( 'widgets_init', 'dream_widgets_init' );


function dream_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'dream' ),
		'id'            => 'dream_right_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'dream' ),
		'id'            => 'dream_left_sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	// Registering footer sidebar one
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar One', 'dream' ),
		'id' 					=> 'dream_footer_sidebar_one',
		'description'   	=> __( 'Shows widgets at footer sidebar one.', 'dream' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<div class="widget-title"><span>',
		'after_title'   	=> '</span></div>'
	) );

	// Registering footer sidebar two
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Two', 'dream' ),
		'id' 					=> 'dream_footer_sidebar_two',
		'description'   	=> __( 'Shows widgets at footer sidebar two.', 'dream' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<div class="widget-title"><span>',
		'after_title'   	=> '</span></div>'
	) );

	// Registering footer sidebar three
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Three', 'dream' ),
		'id' 					=> 'dream_footer_sidebar_three',
		'description'   	=> __( 'Shows widgets at footer sidebar three.', 'dream' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<div class="widget-title"><span>',
		'after_title'   	=> '</span></div>'
	) );
}
?>