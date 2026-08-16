<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; Call to Action (CTA)
 * Plugin URI:      https://github.com/mdibella-dev/mdb-call-to-action
 * Description:     This plugin provides a custom post type for managing and displaying so-called Call to Actions (CTA).
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * License:         MIT License
 * Version:         2.1.5
 * Text Domain:     mdb-call-to-action
 * Domain Path:     /languages
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace MDB_Call_to_Action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '2.1.5' );

define( __NAMESPACE__ . '\CTA_DATA_METAKEY', 'cta_data' );



/** Include files */

require_once 'vendor/autoload.php';

require_once 'includes/classes/index.php';
require_once 'includes/third-party/index.php';

require_once 'includes/api.php';
require_once 'includes/post-type-cta.php';
require_once 'includes/metabox.php';
require_once 'includes/backend.php';



/** Add hooks */

register_activation_hook( __FILE__, __NAMESPACE__ . '\plugin_activation' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\plugin_deactivation' );
register_uninstall_hook( __FILE__, __NAMESPACE__ . '\plugin_uninstall' );
add_action( 'init', __NAMESPACE__ . '\plugin_init', 9 );




/**
 * The init function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_init() {
    // Load text domain, use relative path to the plugin's language folder
    load_plugin_textdomain( 'mdb-call-to-action', false, plugin_basename( __FILE__ ) . '/languages' );
}



/**
 * The activation function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_activation() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }

    // Do something!
}



/**
 * The deactivation function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_deactivation() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }

    // Do something!
}



/**
 * The uninstall function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_uninstall() {

    if ( ! current_user_can( 'delete_plugins' ) ) {
        return;
    }

    // Do something!
    // Delete options!
    // Delete custom tables!
}
