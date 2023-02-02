<?php
/**
 * Shortcode [cta]
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Generates a call-to-action button.
 *
 * @since 1.0.0
 *
 * @param array  $atts    The attributes (parameters) passed with the shortcode.
 * @param string $content The content bracketed by the shortcode.
 *
 * @return string The rendered call-to-action button.
 */

function shortcode_cta( $atts, $content )
{
    // Read out parameters
    extract( shortcode_atts( array(
                'id' => '',
            ),
            $atts
        )
    );


    // Perform output
    $output = '';

    if( ! empty( $id ) and ( 'publish' == get_post_status ( $id ) ) ) :
        $output = api_render_cta( $id );
    else :
        $output = '';
    endif;

    return $output;
}

add_shortcode( 'cta', 'mdb_call_to_action\shortcode_cta' );
