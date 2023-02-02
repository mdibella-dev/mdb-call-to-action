<?php
/*
 * Plugin Name:     Marco Di Bella - Call to Action (CTA)
 * Plugin URI:      https://github.com/mdibella-dev/mdb-call-to-action
 * Description:     This plugin provides a custom post type for managing and displaying so-called Call to Actions (CTA).
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         1.3.0
 * Text Domain:     mdb-call-to-action
 * Domain Path:     /languages
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */


namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '<PLUGIN-VERSION>' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/** Include files */

require_once( PLUGIN_DIR . 'includes/post-types/post-type-cta.php' );
require_once( PLUGIN_DIR . 'includes/shortcodes/shortcode-cta.php' );
require_once( PLUGIN_DIR . 'includes/api.php' );
require_once( PLUGIN_DIR . 'includes/backend.php' );
require_once( PLUGIN_DIR . 'includes/setup.php' );
