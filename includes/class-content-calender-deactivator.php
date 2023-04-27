<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://raghav.com
 * @since      1.0.0
 *
 * @package    Content_Calender
 * @subpackage Content_Calender/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Content_Calender
 * @subpackage Content_Calender/includes
 * @author     Raghav Sharma <raghavsharma0411@gmail.com>
 */
class Content_Calender_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		global $wpdb, $table_prefix;
		$content_calendar = $table_prefix . 'content_calendar';

		$sql = "TRUNCATE `$content_calendar`;";
		$wpdb->query($sql);
	}

}
