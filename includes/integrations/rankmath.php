<?php
/**
 * Rank Math Integration.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Filter to exclude post types from Analytics Index.
 *
 * @see https://rankmath.com/kb/filters-hooks-api-developer/
 */

add_filter( 'rank_math/analytics/post_types', function( $post_types = [] ) {
    $excludes = [
        'cta',
    ];

    return array_diff_key( $post_types, array_flip( $excludes ) );
});
