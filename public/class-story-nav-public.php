<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Story_Nav
 * @subpackage Story_Nav/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Story_Nav
 * @subpackage Story_Nav/public
 * @author     Your Name <email@example.com>
 */
class Story_Nav_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'wp_footer', [ &$this, 'story_nav_output' ] );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/story-nav-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/story-nav-public.js', array( 'jquery' ), $this->version, true );

	}

	public function story_nav_output() {


			$storynav_enable = carbon_get_the_post_meta('storynav_enable');
			$storynav_outline = carbon_get_the_post_meta('storynav_outline');
			$storynav_circle = carbon_get_the_post_meta('storynav_circle');
			$storynav_label = carbon_get_the_post_meta('storynav_label');
			$storynav_hover = carbon_get_the_post_meta('storynav_hover');
			$storynav_active = carbon_get_the_post_meta('storynav_active');
			$storynav_text = carbon_get_the_post_meta('storynav_text');
			$storynav_circle = get_hex_to_rgb($storynav_circle, '.25');
			$storynav_items = carbon_get_the_post_meta('storynav_items');



			if($storynav_enable == true)  {
				echo '<style>';
				echo '.tocible, .tocible .tocible_heading a { color: '.$storynav_text.';transition: all 0.5s ease;}';
				echo '.tocible .tocible_heading { background:'.$storynav_label.'; }';
				echo '.tocible li:not(:last-child) a::before { background-color: '.$storynav_outline.'; }';
				echo '.tocible li a::after { background-color: '.$storynav_circle.'; border-color: '.$storynav_outline.';}';
				echo ' .tocible li:hover { background: '.$storynav_hover.'; }';
				echo '.tocible li.toc_scrolled { background: '.$storynav_label.'; transition: all 0.5s ease;}';
				echo '.tocible li.toc_scrolled a::after { background: '.$storynav_active.';}';
				echo '.toc_scrolled { background: '.$storynav_label.' !important; }';
				echo '.toc_scrolled a { color: '.$storynav_text.' !important; }';
				echo '</style>';

				echo "<div class='tocible'>";
					echo "<ul>";
						foreach ($storynav_items as $storynav_item) {
							echo '<li class="tocible_heading"><a class="" href="'.$storynav_item['storynav_link'].'">'.$storynav_item['storynav_text_label'].'</a></li>';
						}
					echo "</ul>";
				echo "</div>";
			}

	}

}
