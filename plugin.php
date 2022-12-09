<?php
/*
 * Plugin Name:     Marco Di Bella - Call to Action
 * Plugin URI:      https://github.com/mdibella-dev/mdb-call-to-action
 * Description:     Implementiert eine ACF-basierte Verwaltung für Call-to-Actions, die per Shortcode ausgegeben werden.
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         1.3.0
 * Text Domain:     mdbcta
 * Domain Path:     /languages
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */


namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Konstanten */

const PLUGIN_VERSION = '1.3.0';
const PLUGIN_DOMAIN  = 'mdbcta';



/** Funktionsbibliothek einbinden */

require_once( plugin_dir_path( __FILE__ ) . 'includes/post-types/post-type-cta.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/shortcodes/shortcode-cta.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/acf-fields.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/api.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/backend.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/setup.php' );
