<?php
/**
 * Post Type cta
 *
 * @author  Marco Di Bella <mdb@marcodibella.de>
 * @package call-to-action
 */


defined( 'ABSPATH' ) or exit;



/**
 * Führt die Registrierung des Post Types aus
 *
 * @since   1.0.0
 */

function mdbcta__register_post_type()
{
	$labels = [
		'name'            => __( 'Call-to-Actions', TEXTDOMAIN ),
		'singular_name'   => __( 'Call-to-Action', TEXTDOMAIN ),
		'menu_name'       => __( 'Call-to-Action', TEXTDOMAIN ),
		'all_items'       => __( 'Alle Call-to-Actions', TEXTDOMAIN ),
		'add_new'         => __( 'Erstellen', TEXTDOMAIN ),
		'add_new_item'    => __( 'Erstellen', TEXTDOMAIN ),
		'edit_item'		  => __( 'Call-to-Action bearbeiten', TEXTDOMAIN ),
		'search_items'	  => __( 'Call-to-Action durchsuchen', TEXTDOMAIN ),
	];

	$args = [
		'label'                   => __( 'Call-to-Actions', TEXTDOMAIN ),
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
	];

	register_post_type( 'cta', $args );
}

add_action( 'init', 'mdbcta__register_post_type' );



/**
 * Bestimmt die Spalten in der CTA-Liste
 *
 * @since   1.0.0
 */

function mdbcta__manage_posts_columns( $default )
{
    $columns['cb']          = $default[ 'cb' ];
    $columns['title']       = $default[ 'title' ];
    $columns['id']          = __( 'ID', TEXTDOMAIN );
    $columns['url']         = __( 'Link', TEXTDOMAIN );
    $columns['shortcode']   = __( 'Shortcode', TEXTDOMAIN );
    $columns['date']        = $default[ 'date' ];

 	return $columns;
}

add_filter( 'manage_cta_posts_columns', 'mdbcta__manage_posts_columns', 10 );



/**
 * Erzeugt die Spaltenausgabe in der CTA-Liste
 *
 * @since   1.0.0
 */

function mdbcta__manage_posts_custom_column( $column_name, $post_id )
{
    $params = array();

    mdbcta__get_params( $id, $params );


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
        break;

        case 'shortcode' :
            echo sprintf(
                '<code>[cta id="%1$s"]</code>',
                $post_id,
            );
        break;
    endswitch;
}

add_action( 'manage_cta_posts_custom_column', 'mdbcta__manage_posts_custom_column', 10, 2 );
