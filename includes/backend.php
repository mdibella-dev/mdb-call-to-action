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

    /**
     * metabox related scripts and styles
     */

     // From WordPress: Adds scripts & styles to use media JS APIs
    wp_enqueue_media();


    // From WordPress: Add color picker
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );


    // The metabox scripts & styles
    wp_enqueue_style(
        'mdb-cta-metabox-style',
        PLUGIN_URL . 'assets/build/css/metabox.min.css',
        [],
        PLUGIN_VERSION
    );

    wp_enqueue_script(
        'mdb-cta-metabox-script',
        PLUGIN_URL . 'assets/build/js/metabox.min.js',
        [
            'jquery'
        ],
        PLUGIN_VERSION,
        true
    );


    /**
     * post-type related scripts and styles
     */

    wp_enqueue_style(
        'mdb-cta-backend-style',
        PLUGIN_URL . 'assets/build/css/post-type.min.css',
        [],
        PLUGIN_VERSION
    );

    wp_enqueue_script(
        'mdb-cta-backend-script',
        PLUGIN_URL . 'assets/build/js/post-type.min.js',
        [
            'jquery'
        ],
        PLUGIN_VERSION,
        true
    );

}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
