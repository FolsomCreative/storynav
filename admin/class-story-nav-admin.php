<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Story_Nav
 * @subpackage Story_Nav/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Story_Nav
 * @subpackage Story_Nav/admin
 * @author     Your Name <email@example.com>
 */
class Story_Nav_Admin {



	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Story_Nav_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Story_Nav_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/story-nav-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Story_Nav_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Story_Nav_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/story-nav-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function crb_load() {
			require_once plugin_dir_path( __DIR__ ) . 'vendor/autoload.php';
			\Carbon_Fields\Carbon_Fields::boot();
	}

	public function crb_attach_theme_options() {
			$default_value = '#ffffff';
			Container::make( 'post_meta', 'Story Navigation' )
		    ->where( 'post_type', '=', 'page' )
				->add_fields( array(
		        Field::make( 'checkbox', 'storynav_enable', 'Enable Story Navigation' ),
						Field::make( 'color', 'storynav_outline', 'Outline Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'color', 'storynav_circle', 'Circle Background Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'color', 'storynav_label', 'Label Background Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'color', 'storynav_hover', 'Hover Background Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'color', 'storynav_active', 'Active Background Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'color', 'storynav_text', 'Text Color' )
							->set_default_value( $default_value )
							->set_conditional_logic( array( array('field' => 'storynav_enable', 'value' => true,))),
						Field::make( 'complex', 'storynav_items', 'Nav Items' )
                ->add_fields( array(
                    Field::make( 'text', 'storynav_text_label', 'Text Label' ),
										Field::make( 'text', 'storynav_link', 'Section ID' ),
                ) ),
		    ));
	}

}
