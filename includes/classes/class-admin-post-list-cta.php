<?php
/**
 * Class Admin_Post_List_CTA
 *
 * @author  Marco Di Bella
 * @package cm-theme-core
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * A class for the implementation of the admin post list for post type "cta".
 *
 * @since 2.1.0
 */

class Admin_Post_List_CTA extends \wordpress_helper\Admin_Post_List {

    /**
     * Determines the columns of the admin post list.
     *
     * @param array $default The defaults for columns
     *
     * @return $array An associative array describing the columns to use
     */

    public function manage_columns( $default ) {

        $columns['cb']        = $default['cb'];
        $columns['id']        = __( 'ID', 'mdb-call-to-action' );
        $columns['title']     = $default['title'];
        $columns['link']      = __( 'Link', 'mdb-call-to-action' );
        $columns['shortcode'] = __( 'Shortcode', 'mdb-call-to-action' );
        $columns['date']      = $default['date'];

        return $columns;
    }



    /**
     * Generates the column output.
     *
     * @param string $column_name Designation of the column to be output
     * @param int    $post_id     ID of the post (aka record) to be output
     */

    public function manage_custom_column( $column_name, $post_id ) {

        $params = get_params( $post_id );

        switch ( $column_name ) {
            case 'id' :
                echo $post_id;
                break;

            case 'link' :
                if ( isset( $params['link'] ) ) {
                    echo sprintf(
                        '<a href="%1$s" target="_blank">%2$s</a>',
                        esc_url( $params['link'] ),
                        $params['link'],  // todo: remove scheme
                    );
                }
                break;

            case 'shortcode' :
                echo sprintf(
                    '<code>[cta id="%1$s"]</code>',
                    esc_attr( $post_id ),
                );
                echo '<button class="button button-secondary copyCTAToClipboard">' . __( 'Copy', 'mdb-call-to-action' ) . '</button>';
                break;
        }
    }

}


$apl_cta = new Admin_Post_List_CTA( 'cta' );
