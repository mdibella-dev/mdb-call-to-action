<?php
/**
 * Beyond Words Integration.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace MDB_Call_to_Action\Integrations;


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
