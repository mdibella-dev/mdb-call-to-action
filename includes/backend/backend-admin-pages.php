<?php
namespace MDB_Call_to_Action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Prepares the admin pages
 *
 * @since 3.0.0
 */

function current_screen( $screen ) {

    $post_types = [
         'cta'
    ];

    if ( isset( $screen->post_type ) and in_array( $screen->post_type, $post_types ) ) {
        //add_action( 'in_admin_header', __NAMESPACE__ . '\in_admin_header' );
        add_filter( 'admin_footer_text', __NAMESPACE__ . '\admin_footer_text', 99, 0 );
    }
}

add_action( 'current_screen', __NAMESPACE__ . '\current_screen' );



/**
 * Shows plugin name, version and credits in the footer
 *
 * @since 3.0.0
 */

function admin_footer_text() {
    return sprintf(
        __( '<strong>Call to Action</strong> %1$s | Made by %2$s', 'congressomat' ),
        PLUGIN_VERSION,
        '<a href="https://www.marcodibella.de" target="_blank">Marco Di Bella</a>'
    );
}


/**
 * Remove months dropdown
 *
 * @since 3.0.0
 *
 * @see https://developer.wordpress.org/reference/hooks/disable_months_dropdown/
 */

function disable_months_dropdown( $disable, $type ) {
   $post_types = [
         'cta'
   ];

   if ( in_array( $type, $post_types ) ) {
       $disable = true;
   }

    return $disable;
}

add_filter( 'disable_months_dropdown', __NAMESPACE__ . '\disable_months_dropdown', 10, 2 );



/**
* Remove view link in row actions
*
* @since 3.0.0
*
* @see https://developer.wordpress.org/reference/hooks/post_row_actions/
*/

function modify_list_row_actions( $actions, $post ) {
   $post_types = [
       'cta'
   ];

   if ( in_array( $post->post_type, $post_types ) ) {
       unset( $actions['view'] );
   }
   return $actions;
}

add_filter( 'post_row_actions', __NAMESPACE__ . '\modify_list_row_actions', 10, 2 );
