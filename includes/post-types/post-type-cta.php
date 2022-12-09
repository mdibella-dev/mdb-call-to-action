<?php
/**
 * Post Type cta
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Führt die Registrierung des Post Types 'Call-to-Action' aus.
 *
 * @since 1.0.0
 */

function mdbcta__register_post_type()
{
    $labels = array(
        'name'              => __( 'Call-to-Actions', PLUGIN_DOMAIN ),
        'singular_name'     => __( 'Call-to-Action', PLUGIN_DOMAIN ),
        'menu_name'         => __( 'Call-to-Action', PLUGIN_DOMAIN ),
        'all_items'         => __( 'Alle Call-to-Actions', PLUGIN_DOMAIN ),
        'add_new'           => __( 'Erstellen', PLUGIN_DOMAIN ),
        'add_new_item'      => __( 'Erstellen', PLUGIN_DOMAIN ),
        'edit_item'         => __( 'Call-to-Action bearbeiten', PLUGIN_DOMAIN ),
        'search_items'      => __( 'Call-to-Action durchsuchen', PLUGIN_DOMAIN ),
    );

    $args = array(
        'label'                   => __( 'Call-to-Actions', PLUGIN_DOMAIN ),
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
        'rewrite'                 => ['slug' => 'cta', 'with_front' => true],
        'query_var'               => true,
        'menu_position'           => 10,
        'menu_icon'               => 'dashicons-align-center',
        'supports'                => ['title'],
        'show_in_graphql'         => false,
    );

    register_post_type( 'cta', $args );
}

add_action( 'init', 'mdb_call_to_action\mdbcta__register_post_type' );



/**
 * Bestimmt die Spalten in der CTA-Liste
 *
 * @since   1.0.0
 */

function mdbcta__manage_posts_columns( $default )
{
    $columns['cb']          = $default[ 'cb' ];
    $columns['title']       = $default[ 'title' ];
    $columns['id']          = __( 'ID', PLUGIN_DOMAIN );
    $columns['url']         = __( 'Link', PLUGIN_DOMAIN );
    $columns['shortcode']   = __( 'Shortcode', PLUGIN_DOMAIN );
    $columns['date']        = $default[ 'date' ];

    return $columns;
}

add_filter( 'manage_cta_posts_columns', 'mdb_call_to_action\mdbcta__manage_posts_columns', 10 );



/**
 * Erzeugt die Spaltenausgabe in der CTA-Liste.
 *
 * @since 1.0.0
 * @param string $column_name    Die anzuzeigende Spalte.
 * @param int    $post_id        Die ID des Beitrags (Datensatz), der für den Spalteninhalt herangezogen werden soll.
 */

function mdbcta__manage_posts_custom_column( $column_name, $post_id )
{
    $params = array();

    mdbcta__get_params( $post_id, $params );


    switch( $column_name ) :
        case 'id' :
            echo $post_id;
        break;

        case 'url' :
            if( isset( $params['cta_link'] ) ) :

	            echo sprintf(
	                '<a href="%1$s" target="_blank">%2$s</a>',
	                $params['cta_link'],
	                $params['cta_link'],  // todo: schema entfernen
	            );

            endif;
        break;

        case 'shortcode' :
            echo sprintf(
                '<code>[cta id="%1$s"]</code>',
                $post_id,
            );
            echo '<button class="button button-secondary copyCTAToClipboard">' . __( 'Kopieren', PLUGIN_DOMAIN ) . '</button>';
        break;
    endswitch;
}

add_action( 'manage_cta_posts_custom_column', 'mdb_call_to_action\mdbcta__manage_posts_custom_column', 10, 2 );
