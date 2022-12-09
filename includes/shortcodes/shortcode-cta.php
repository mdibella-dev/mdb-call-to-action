<?php
/**
 * Shortcode [cta]
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */


defined( 'ABSPATH' ) or exit;



/**
 * Erzeugt eine Call-to-Action-Schaltfläche.
 *
 * @since  1.0.0
 * @param  array  $atts       Die mit dem Shortcode übergegebenden Attribute (Parameter).
 * @param  string $content    Der vom Shortcode geklammerte Inhalt.
 * @return string             Die gerenderte Call-to-Action-Schaltfläche.
 */

function mdbcta__shortcode_cta( $atts, $content )
{
    // Parameter auslesen
    extract( shortcode_atts( array(
                'id' => '',
            ),
            $atts
        )
    );


    // Ausgabe durchführen
    $output = '';

    if( ! empty( $id ) and ( 'publish' == get_post_status ( $id ) ) ) :
        $output = mdbcta__render_cta( $id );
    else :
        $output = '';
    endif;

    return $output;
}

add_shortcode( 'cta', 'mdbcta__shortcode_cta' );
