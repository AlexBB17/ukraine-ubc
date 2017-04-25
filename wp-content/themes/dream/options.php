<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'dream_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'dream'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'dream' ),
		'two' => __( 'Two', 'dream' ),
		'three' => __( 'Three', 'dream' ),
		'four' => __( 'Four', 'dream' ),
		'five' => __( 'Five', 'dream' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'dream' ),
		'two' => __( 'Pancake', 'dream' ),
		'three' => __( 'Omelette', 'dream' ),
		'four' => __( 'Crepe', 'dream' ),
		'five' => __( 'Waffle', 'dream' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If udreamg image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Header', 'dream' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	$options[] = array(
		'name'  => __( 'Header Logo', 'dream' ),
		'desc' => __( 'Upload logo for your header.', 'dream' ),
		'id' => 'dream_header_logo_image',
		'type' => 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' => __( 'Header Logo Only', 'dream' ),
		'text_only' => __( 'Header Text Only', 'dream' ),
		'both' => __( 'Show Both', 'dream' ),
		'none' => __( 'Disable', 'dream' )
	);
	$options[] = array(
		'name' => __( 'Show', 'dream' ),
		'desc' => __( 'Choose the option that you want.', 'dream' ),
		'id' => 'dream_show_header_logo_text',
		'std' => 'text_only',
		'type' => 'radio',
		'options' => $header_display_array 
	);

	/*************************************************************************/
	
	$options[] = array(
		'name' => __( 'Design', 'dream' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' 		=> __( 'Default layout', 'dream' ),
		'desc' 		=> __( 'Select default layout. This layout will be reflected in whole site archives, search etc. The layout for a single post and page can be controlled from below options.', 'dream' ),
		'id' 			=> 'dream_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for pages only', 'dream' ),
		'desc' 		=> __( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'dream' ),
		'id' 			=> 'dream_pages_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for single posts only', 'dream' ),
		'desc' 		=> __( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'dream' ),
		'id' 			=> 'dream_single_posts_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);
	
	
	
	// Site primary color option
	$options[] = array(
		'name' 		=> __( 'Primary color option', 'dream' ),
		'desc' 		=> __( 'This will reflect in links, buttons and many others. Choose a color to match your site.', 'dream' ),
		'id' 			=> 'dream_primary_color',
		'std' 		=> '#ff8800',
		'type' 		=> 'color' 
	);
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Additional', 'dream' ),
		'type' => 'heading'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'dream' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'dream' ),
		'id' 			=> 'dream_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'dream' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'dream' ),
		'id' 		=> 'dream_favicon',
		'type' 	=> 'upload'
	);
	
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Slider', 'dream' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'dream' ),
		'desc' 		=> __( 'Check to activate slider.', 'dream' ),
		'id' 			=> 'dream_activate_slider',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Slide options
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'dream' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'dream' ),
			'id' 		=> 'dream_slider_image'.$i,
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'dream' ),
			'id' 		=> 'dream_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'dream' ),
			'id' 		=> 'dream_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'dream' ),
			'id' 		=> 'dream_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
	
	
	return $options;
}

add_action( 'optionsframework_after','dream_options_display_sidebar' );
/**
 * admin sidebar
 */
function dream_options_display_sidebar() { 
?>
<div id="optionsframework-sidebar">
    <div class="metabox-holder">
        <div class="postbox">
            <h3><?php esc_attr_e( 'About Dream', 'dream' ); ?></h3>
            <div class="inside">
                <div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://vsfish.com/demo/dream/' ); ?>"><?php esc_attr_e( 'View Demo' , 'dream' ); ?></a></div>
            </div>
        </div>
    </div>
</div>
<?php
}

?>