<?php
/**
 * Functions to activate, initiate and deactivate the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Zentrale Aktivierungsfunktion für das Plugin
 *
 * @since   1.0.0
 */

function mdbcta__plugin_activation()
{
    mdbcta__add_acf_fields();
}

register_activation_hook( __FILE__, 'mdb_call_to_action\mdbcta__plugin_activation' );



/**
 * Lädt das Plugin-Script
 *
 * @since   1.1.0
 */

function mdbcta__plugin_scripts()
{
    wp_enqueue_style(
        'mdbcta-style',
        plugins_url( 'assets/build/css/backend.min.css', __FILE__ )
    );

    wp_enqueue_script(
        'mdbcta-script',
        plugins_url( 'assets/build/js/backend.js', __FILE__ ),
        'jquery',
        PLUGIN_VERSION,
        true
    );
}

add_action( 'admin_enqueue_scripts','mdb_call_to_action\mdbcta__plugin_scripts' );
