<?php
/**
 * API functions.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;




/**
 * Returns a default set of CTA parameters.
 *
 * @return array The array with default parameters
 */

function get_default_params() {
    return [
        'headline'         => __( 'This is an expressive headline', 'mdb-call-to-action' ),
        'summary'          => __( 'This text should inform the reader why they should follow the call-to-action', 'mdb-call-to-action' ),
        'button-text'      => __( 'Click here!', 'mdb-call-to-action' ),
        'link'             => __( 'https://www.marcodibella.de' ),
        'background-color' => '#f9f9f9',        // light gray
        'text-color'       => '#1e73be',        // blue
        'image-alt-text'   => __( 'This text is a short description of the image', 'mdb-call-to-action' )
    ];
}



/**
 * Returns the set of CTA parameters stored in the post metadata by the key CTA_DATA_METAKEY.
 * Replacement for api_get_cta_params().
 *
 * @return array The array with CTA parameters
 */

function get_params( $post_id ) {

    $data   = [];
    $stored = get_post_meta( $post_id, CTA_DATA_METAKEY, true );

    if ( is_array( $stored ) and ( 0 !== count( $stored ) ) ) {
        $data = $stored;
    }

    return $data;

}
