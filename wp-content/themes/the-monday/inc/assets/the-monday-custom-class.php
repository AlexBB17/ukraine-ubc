<?php
/**
 * The Monday Custom calsses and definitions
 *
 * @package The Monday
 * 
 */
 
if ( class_exists( 'WP_Customize_Control' ) ) {
    
    class WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select Category &mdash;', 'the-monday' ),
                    'option_none_value' => '',
                    'selected'          => $this->value(),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
                $this->label,
                $this->description,
                $dropdown
            );
        }
    }
    
    class WP_Customize_Page_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_pages(
                array(
                    'name'              => '_customize-dropdown-pages-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select Pages &mdash;', 'the-monday' ),
                    'option_none_value' => '',
                    'selected'          => $this->value(),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
                $this->label,
                $this->description,
                $dropdown
            );
        }
    }
    
    /**
     * Class to create a custom post control
     */
    class Post_Dropdown_Custom_Control extends WP_Customize_Control {
        private $posts = false;
        public function __construct($manager, $id, $args = array(), $options = array())
        {
            $postargs = wp_parse_args($options, array('numberposts' => '-1'));
            $this->posts = get_posts($postargs);
            parent::__construct( $manager, $id, $args );
        }
        /**
        * Render the content on the theme customizer page
        */
        public function render_content()
        {
            if(!empty($this->posts))
            {
                ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                        <select data-customize-setting-link="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
                            <option value="" <?php if ( get_theme_mod($this->id) == '' ) echo 'selected="selected"'; ?>><?php _e( '--Select Post--', 'the-monday' ); ?></option>
                        <?php
                            foreach ( $this->posts as $post )
                            {
                                printf('<option value="%s" %s>%s</option>', $post->ID, selected($this->value(), $post->ID, false), $post->post_title);
                            }
                        ?>
                        </select>
                    </label>
                <?php
            }
        }
    }
    
    class Text_Editor_Custom_Control extends WP_Customize_Control
    {
          /**
           * Render the content on the theme customizer page
           */
          public function render_content()
           {
                ?>
                    <label>
                      <span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>
                      <?php
                        $settings = array(
                          'textarea_name' => $this->id
                          );
    
                        wp_editor($this->value(), $this->id, $settings );
                      ?>
                    </label>
                <?php
           }
    }
    
    /**
     * Cutomize control for switch option
     */
    
    class WP_Customize_Switch_Control extends WP_Customize_Control {
		public $type = 'switch';    
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <div class="switch_options">
                  <span class="switch_enable"> <?php _e('Enable', 'the-monday'); ?> </span>
                  <span class="switch_disable"> <?php _e('Disable', 'the-monday'); ?> </span>  
                  <input type="hidden" id="enable_switch_option" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />
                </div>
            </label>
		<?php
		}
	}
    
    /**
     * Cutomize control for switch option Yes/No
     */
    
    class WP_Customize_Switch_Yesno_Control extends WP_Customize_Control {
		public $type = 'yn_switch';    
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <div class="yes_no_switch_options">
                  <span class="switch_enable"> <?php _e('Yes', 'the-monday'); ?> </span>
                  <span class="switch_disable"> <?php _e('No', 'the-monday'); ?> </span>  
                  <input type="hidden" id="enable_switch_option_yesno" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />
                </div>
            </label>
		<?php
		}
	}
    
    /**
     * Theme info 
     */
     class The_Monday_Theme_Info extends WP_Customize_Control {
        public $type = 'theme_info';
        public $label = '';
        public function render_content() {
        ?>
            <label class="customize-control-select">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
            </label>
        <?php
        }
    }
    
    /**
     * Multiple settings seperatior
     */
    class The_Monday_Settings_Seperator extends WP_Customize_Control {
        public $type = 'settings_seperator';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border:1px solid;padding:5px;color:#58719E;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
    
    /**
     * Customize for textarea, extend the WP customizer
     */
    class Textarea_Custom_Control extends WP_Customize_Control{
    	/**
    	 * Render the control's content.
    	 * 
    	 */
    	public $type = 'the_monday_textarea';
      public function render_content() {
    		?>
    		<label>
    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
          <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
    				<?php echo esc_textarea( $this->value() ); ?>
    			</textarea>
    		</label>
    		<?php
    	}
    }
    
    /**
     * Image control by radtion button 
     */
    class The_Monday_Image_Radio_Control extends WP_Customize_Control {

 		public function render_content() {

			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<ul class="controls" id ="the-monday-img-container">
			<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ($this->value() == $value)?'the-monday-radio-img-selected the-monday-radio-img-img':'the-monday-radio-img-img';
					?>
					<li class="inc-radio-image">
					<label>
						<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
					</label>
					</li>
					<?php
				endforeach;
			?>
			</ul>
			<?php
		}
	}
    
    /**
     * Typography
     * 
     * A class to create a dropdown for all categories in your wordpress site
     * 
     */
     
    class Typography_Dropdown extends WP_Customize_Control
    {
      public $type = 'select';
        /**
         * Render the content of the category dropdown
         *
         * @return HTML
         */
        public function render_content()
        {
          ?>
          <label>
            <span class="customize-control-title"><?php echo ( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo ( $this->description ); ?></span>
            <select class="typography-selected" data-customize-setting-link="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
              <option value=" "><?php echo _( 'Choose Fonts', 'the-monday' );?></option>
              <option value="Open Sans">Open Sans</option>
              <option value="Roboto">Roboto</option>
              <option value="Arimo">Arimo</option>
              <option value="Oswald">Oswald</option>
              <option value="Lato">Lato</option>
              <option value="PT Sans">PT Sans</option>
              <option value="Raleway">Raleway</option>
              <option value="Ubuntu">Ubuntu</option>
              <option value="Montserrat">Montserrat</option>
              <option value="Merriweather">Merriweather</option>
              <option value="Lora">Lora</option>
              <option value="Bitter">Bitter</option>
              <option value="Lobster">Lobster</option>
              <option value="Arvo">Arvo</option>
              <option value="Oxygen">Oxygen</option>
              <option value="Dosis">Dosis</option>
              <option value="Cabin">Cabin</option>
              <option value="Muli">Muli</option>
            </select>
          </label>
          <?php
        }
    }
    
    /**
     * Adds multiple category selection support to the theme customizer via checkboxes
     *
     * The category IDs are saved in the database as a comma separated string.
     */
    class Cstmzr_Category_Checkboxes_Control extends WP_Customize_Control {
        public $type = 'category-checkboxes';
     
        public function render_content() {
            echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
            echo '<span class="description customize-control-description">' .esc_html( $this->description ) . '</span>';
     
            // Displays category checkboxes.
            foreach ( get_categories() as $category ) {
                echo '<label><input type="checkbox" name="category-' . $category->term_id . '" id="category-' . $category->term_id . '" class="cstmzr-category-checkbox"> ' . $category->cat_name . '</label><br>';    
            }
     
            // Loads the hidden input field that stores the saved category list.
            ?><input type="hidden" id="<?php echo $this->id; ?>" class="cstmzr-hidden-categories" <?php $this->link(); ?> value="<?php echo sanitize_text_field( $this->value() ); ?>"><?php
        }
    }
    
    /**
     * Customize Image Reloaded Class
     *
     * Extend WP_Customize_Image_Control allowing access to uploads made within
     * the same context
     */
    class My_Customize_Image_Reloaded_Control extends WP_Customize_Image_Control {
    	/**
    	 * Constructor.
    	 *
    	 * @since 3.4.0
    	 * @uses WP_Customize_Image_Control::__construct()
    	 *
    	 * @param WP_Customize_Manager $manager
    	 */
    	public function __construct( $manager, $id, $args = array() ) {
    		parent::__construct( $manager, $id, $args );
    	}
    	
    	/**
    	 * Search for images within the defined context
    	 */
    	public function tab_uploaded() {
    		$my_context_uploads = get_posts( array(
    		    'post_type'  => 'attachment',
    		    'meta_key'   => '_wp_attachment_context',
    		    'meta_value' => $this->context,
    		    'orderby'    => 'post_date',
    		    'nopaging'   => true,
    		) );
    		?>
    	
    		<div class="uploaded-target"></div>
    		
    		<?php
    		if ( empty( $my_context_uploads ) )
    		    return;
    		
    		foreach ( (array) $my_context_uploads as $my_context_upload ) {
    		    $this->print_tab_image( esc_url( $my_context_upload->guid ) );
    		}
    	}
    }
    
}