<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://raghav.com
 * @since      1.0.0
 *
 * @package    Content_Calender
 * @subpackage Content_Calender/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Calender
 * @subpackage Content_Calender/admin
 * @author     Raghav Sharma <raghavsharma0411@gmail.com>
 */
class Content_Calender_Admin {

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
		 * defined in Content_Calender_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Calender_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-calender-admin.css', array(), $this->version, 'all' );

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
		 * defined in Content_Calender_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Calender_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-calender-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_menu()
	{
		add_menu_page("Content Calendar Settings", "Calendar", "manage_options", "content-calendar", array($this, "calendar_settings"), "dashicons-calendar-alt",25);

		add_submenu_page("content-calendar", "Plan Content", "Plan Content", "manage_options", "content-calendar1", array($this, "calendar_settings"));

		add_submenu_page("content-calendar", "WSDM Content Calendar", "Content Calendar", "manage_options", "content-calendar2", array($this, "calendar_sub_page"));
	}

	public function calendar_settings()
	{
		// echo "calendar_settings";wp-content\plugins\content-calender\admin\partials\content-calender-admin-display.php
		require_once 'partials/content-calender-admin-display.php';
	}

	public function calendar_sub_page()
	{
		// echo "calendar_sub_page";
		require_once 'partials/content-calender.php';
	}

}
