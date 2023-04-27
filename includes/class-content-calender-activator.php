<?php

/**
 * Fired during plugin activation
 *
 * @link       https://raghav.com
 * @since      1.0.0
 *
 * @package    Content_Calender
 * @subpackage Content_Calender/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Content_Calender
 * @subpackage Content_Calender/includes
 * @author     Raghav Sharma <raghavsharma0411@gmail.com>
 */
class Content_Calender_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb, $table_prefix;
		$content_calendar = $table_prefix . 'content_calendar';

		$sql = "CREATE TABLE IF NOT EXISTS `$content_calendar` (
			`id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`post_title` varchar(255) NOT NULL,
			`occassion` varchar(100) NOT NULL,
			`author` varchar(100) NOT NULL,
			`reviewer` varchar(100) NOT NULL,
			`date` date NOT NULL
		  ) ENGINE='MyISAM';";

		$wpdb->query($sql);
	}

}
