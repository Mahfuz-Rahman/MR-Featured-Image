<?php
/**
 * Acme Footer Image
 *
 * Append a featured image at the bottom of the content of a post or page. Used as a demo
 * for a test plugin.
 *
 * @package         Acme_Footer_Image
 * @author          Mahfuz Rahman
 * @license         GPL-2.0+
 * @link            http://mahfuzurrahman.me
 * @copyright       2017 Mahfuz Rahman
 *
 * @wordpress-plugin
 * Plugin Name: Acme Footer Image
 * Plugin URI: TODO
 * Description Appends a footer image at the bottom of the content of a post or page.
 * Version: 0.1.0
 * Author: Mahfuz Rahman
 * Author URI: http://mahfuzurrahman.me
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If the file is called directly, aboart.
if( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Includes the core plugin class for executing the plugin.
 */
require_once( plugin_dir_path( __FILE__ ) . 'admin/class-acme-footer-image.php' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks
 * then kicking off the plugin from this point in the file does
 * not affect on the life cycle.
 *
 * @since   0.1.0
 */
function run_acme_footer_image() {

    $plugin = new Acme_Footer_Image();
    $plugin->run();

}
run_acme_footer_image();
