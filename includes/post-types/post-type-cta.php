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
        'menu_name'     => __( 'Call to Action (CTA)', 'mdb-call-to-action' ),
        'all_items'     => __( 'All Call to Actions', 'mdb-call-to-action' ),
        'add_new'       => __( 'Add new', 'mdb-call-to-action' ),
        'add_new_item'  => __( 'Add new', 'mdb-call-to-action' ),
        'edit_item'     => __( 'Edit Call to Action', 'mdb-call-to-action' ),
        'search_items'  => __( 'Search Call to Actions', 'mdb-call-to-action' ),
    ];

    $args = [
        'label'                   => __( 'Call to Actions', 'mdb-call-to-action' ),
        'labels'                  => $labels,
        'description'             => '',
        'public'                  => true,
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
        'query_var'               => true,
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
 * Determines the columns in the CTA list.
 *
 * @since 1.0.0
 *
 * @param array $default The columns.
 *
 * @return array The modified columns.
 */

function cta__manage_posts_columns( $default ) {

    $columns['cb']        = $default['cb'];
    $columns['title']     = $default['title'];
    $columns['id']        = __( 'ID', 'mdb-call-to-action' );
    $columns['link']      = __( 'Link', 'mdb-call-to-action' );
    $columns['shortcode'] = __( 'Shortcode', 'mdb-call-to-action' );
    $columns['date']      = $default['date'];

    return $columns;
}

add_filter( 'manage_cta_posts_columns', __NAMESPACE__ . '\cta__manage_posts_columns', 10 );



/**
 * Generates the column output in the CTA list.
 *
 * @since 1.0.0
 *
 * @param string $column_name The column to be displayed.
 * @param int    $post_id     The ID of the post (record) to be used for the column content.
 *
 */

function cta__manage_posts_custom_column( $column_name, $post_id ) {

    $params = get_params( $post_id );


    switch( $column_name ) :
        case 'id' :
            echo $post_id;
            break;

        case 'link' :
            if( isset( $params['link'] ) ) :

	            echo sprintf(
	                '<a href="%1$s" target="_blank">%2$s</a>',
	                esc_url( $params['link'] ),
	                $params['link'],  // todo: remove scheme
	            );

            endif;
            break;

        case 'shortcode' :
            echo sprintf(
                '<code>[cta id="%1$s"]</code>',
                esc_attr( $post_id ),
            );
            echo '<button class="button button-secondary copyCTAToClipboard">' . __( 'Copy', 'mdb-call-to-action' ) . '</button>';
            break;
    endswitch;
}

add_action( 'manage_cta_posts_custom_column', __NAMESPACE__ . '\cta__manage_posts_custom_column', 10, 2 );
