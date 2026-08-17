<?php
namespace MDB_Call_to_Action\Third_Party;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Plugin Rank Math
 * Filter to exclude post types from Analytics Index.
 *
 * @see https://rankmath.com/kb/filters-hooks-api-developer/
 *
 * @since 2.1.0
 *
 * @param array $post_types List of post types
 *
 * @return array
 */

add_filter( 'rank_math/analytics/post_types', function( $post_types = [] ) {
    $excludes = [
        'cta',
    ];

    return array_diff_key( $post_types, array_flip( $excludes ) );
});
