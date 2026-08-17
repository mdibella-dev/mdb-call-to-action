<?php
namespace MDB_Call_to_Action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Load the backend scripts and styles.
 *
 * @since 1.1.0
 */

function plugin_backend_scripts() {
    $parts       = explode( '/', plugin_basename( __FILE__ ) );
    $plugin_base = $parts[0];

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
        esc_url( plugins_url( $plugin_base . '/assets/build/css/metabox.min.css' ) ),
        [],
        PLUGIN_VERSION
    );

    wp_enqueue_script(
        'mdb-cta-metabox-script',
        esc_url( plugins_url( $plugin_base . '/assets/build/js/metabox.min.js' ) ),
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
        esc_url( plugins_url( $plugin_base . '/assets/build/css/post-type.min.css' ) ),
        [],
        PLUGIN_VERSION
    );

    wp_enqueue_script(
        'mdb-cta-backend-script',
        esc_url( plugins_url( $plugin_base . '/assets/build/js/post-type.min.js' ) ),
        [],
        PLUGIN_VERSION,
        true
    );

}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
