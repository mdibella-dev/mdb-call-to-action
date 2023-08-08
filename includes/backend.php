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

function plugin_backend_scripts() {
    
    wp_enqueue_style(
        'mdb-cta-backend-style',
        PLUGIN_URL . 'assets/build/css/backend.min.css',
        [],
        PLUGIN_VERSION
    );

    wp_enqueue_script(
        'mdb-cta-backend-script',
        PLUGIN_URL . 'assets/build/js/backend.js',
        [
            'jquery'
        ],
        PLUGIN_VERSION,
        true
    );
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
