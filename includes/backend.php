<?php
/**
 * Functions to handle the backend.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Load the backend scripts and styles.
 *
 * @since 1.1.0
 */

function plugin_backend_scripts()
{
    wp_enqueue_style(
        'mdbcta-style',
        PLUGIN_DIR . 'assets/build/css/backend.min.css'
    );

    wp_enqueue_script(
        'mdbcta-script',
        PLUGIN_DIR . 'assets/build/js/backend.js',
        'jquery',
        PLUGIN_VERSION,
        true
    );
}

add_action( 'admin_enqueue_scripts','mdb_call_to_action\plugin_backend_scripts' );