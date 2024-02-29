<?php
/**
 * Post type 'cta'.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Performs the registration of the post type 'cta'.
 *
 * @since 1.0.0
 */

function cta__register_post_type() {

    $labels = [
        'name'          => __( 'Call to Actions', 'mdb-call-to-action' ),
        'singular_name' => __( 'Call to Action', 'mdb-call-to-action' ),
        'menu_name'     => __( 'CTA', 'mdb-call-to-action' ),
        'all_items'     => __( 'All CTAs', 'mdb-call-to-action' ),
        'add_new'       => __( 'Add new', 'mdb-call-to-action' ),
        'add_new_item'  => __( 'Add new', 'mdb-call-to-action' ),
        'edit_item'     => __( 'Edit CTA', 'mdb-call-to-action' ),
        'search_items'  => __( 'Search CTAs', 'mdb-call-to-action' ),
    ];

    $args = [
        'label'                   => __( 'Call to Actions', 'mdb-call-to-action' ),
        'labels'                  => $labels,
        'description'             => '',
        'public'                  => false,
        'publicly_queryable'      => true,
        'show_ui'                 => true,
        'show_in_rest'            => true,
        'rest_base'               => '',
        'rest_controller_class'   => 'WP_REST_Posts_Controller',
        'has_archive'             => false,
        'show_in_menu'            => true,
        'show_in_nav_menus'       => false,
        'delete_with_user'        => false,
        'exclude_from_search'     => true,
        'capability_type'         => 'post',
        'map_meta_cap'            => true,
        'hierarchical'            => false,
        'rewrite'                 => [
            'slug'       => 'cta',
            'with_front' => true
        ],
        'query_var'               => false,
        'menu_position'           => 10,
        'menu_icon'               => 'dashicons-align-center',
        'supports'                => [
            'title',
            'custom-fields'
        ],
        'show_in_graphql'         => false,
    ];

    register_post_type( 'cta', $args );
}

add_action( 'init', __NAMESPACE__ . '\cta__register_post_type' );



/**
 * Removes the "view" action from the list of row actions.
 *
 * @since 1.0.0
 */

function cta__remove_view_action( $actions, $post ) {

    if ( 'cta' == $post->post_type ) {
        unset( $actions['view'] );
    }

    return $actions;
}

add_filter( 'post_row_actions', __NAMESPACE__ . '\cta__remove_view_action', 10, 2 );
