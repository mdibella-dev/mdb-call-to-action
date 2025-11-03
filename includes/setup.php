<?php
/**
 * Functions to activate, initiate and deactivate the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace MDB_Call_to_Action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * The init function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_init() {
    // Load text domain, use relative path to the plugin's language folder
    load_plugin_textdomain( 'mdb-call-to-action', false, plugin_basename( PLUGIN_DIR ) . '/languages' );
}

add_action( 'init', __NAMESPACE__ . '\plugin_init', 9 );



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
