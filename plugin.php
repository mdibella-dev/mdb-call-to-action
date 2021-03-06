<?php
/*
Plugin Name:     Marco Di Bella - Call to Action
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Implementiert eine ACF-basierte Verwaltung für Call-to-Actions, die per Shortcode ausgegeben werden.
Version:         1.2.0
*/


defined( 'ABSPATH' ) or exit;



/** Konstanten */

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'TEXTDOMAIN', 'mdbcta' );



/** Funktionsbibliothek einbinden */

require_once( PLUGIN_PATH . 'includes/post-types/post-type-cta.php' );
require_once( PLUGIN_PATH . 'includes/shortcodes/shortcode-cta.php' );
require_once( PLUGIN_PATH . 'includes/acf-fields.php' );
require_once( PLUGIN_PATH . 'includes/core.php' );



/**
 * Zentrale Aktivierungsfunktion für das Plugin
 *
 * @since   1.0.0
 */

function mdbcta__plugin_activation()
{
    mdbcta__add_acf_fields();
}

register_activation_hook( __FILE__, 'mdbcta__plugin_activation' );



/**
 * Lädt das Plugin-Script
 *
 * @since   1.1.0
 */

function mdbcta__plugin_scripts()
{
    wp_enqueue_style( 'mdbcta-style', plugins_url( 'assets/build/css/backend.min.css', __FILE__ ) );
    wp_enqueue_script( 'mdbcta-script', plugins_url( 'assets/build/js/backend.js', __FILE__ ) );
}

add_action( 'admin_enqueue_scripts','mdbcta__plugin_scripts' );
