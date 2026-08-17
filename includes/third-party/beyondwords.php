<?php
namespace MDB_Call_to_Action\Third_Party;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Remove Beyond Words Panels from post type 'cta'
 *
 * @since 2.1.5
 */

add_action( 'do_meta_boxes', function() {
    remove_meta_box( 'beyondwords', 'cta', 'side' );
    remove_meta_box( 'beyondwords__inspect', 'cta', 'advanced' );
} );
