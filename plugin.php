<?php
/*
Plugin Name:     Marco Di Bella - Call to Action
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Implementiert eine ACF-basierte Verwaltung für Call-to-Actions, die per Shortcode ausgegeben werden.
Version:         1.0.0
*/


defined( 'ABSPATH' ) or exit;



/* Konstanten */

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'TEXTDOMAIN', 'mdb-cta' );



/* Funktionsbibliothek einbinden */

require_once( PLUGIN_PATH . 'inc/post-types/post-type-cta.php' );
require_once( PLUGIN_PATH . 'inc/shortcodes/shortcode-cta.php' );
require_once( PLUGIN_PATH . 'inc/core.php' );



/**
 * Zentrale Aktivierungsfunktion für das Plugin
 *
 * @since   1.0.0
 */

function mdbcta__plugin_activation()
{
    // Mache nichts
}

register_activation_hook( __FILE__, 'mdbcta__plugin_activation' );
