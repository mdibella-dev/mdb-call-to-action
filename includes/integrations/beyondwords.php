<?php
/**
 * Beyond Words Integration.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Remove Meta Boxes
 */


add_action( 'do_meta_boxes', function() {
    // Remove panels from post-type cta
    remove_meta_box( 'beyondwords', 'cta', 'side' );
    remove_meta_box( 'beyondwords__inspect', 'cta', 'advanced' );
} );
