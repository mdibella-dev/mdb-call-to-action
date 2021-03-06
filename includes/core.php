<?php
/**
 * Kernfunktionen
 *
 * @author  Marco Di Bella <mdb@marcodibella.de>
 * @package call-to-action
 */


defined( 'ABSPATH' ) or exit;



/**
 * Gibt ein spezifisches Call-to-Action aus
 *
 * @since  1.0.0
 * @param  int $id    Die ID des zu rendernden Call-to-Action.
 * @return string     Das gerenderte Call-to-Action.
 */

function mdbcta__render_cta( $id )
{
    $output = '';
    $params = array();


    if( ! empty( $id ) and ( true === mdbcta__get_params( $id, $params ) ) ) :

        ob_start();


?>
<aside class="cta-box" style="<?php echo 'background-color:' . $params['cta_background_color'] . ' !important; color:' . $params['cta_text_color'] .' !important;'; ?>">

    <div class="cta-box-columns">

        <?php

            if( isset( $params['cta_add_image'] ) and ( true === (bool) $params['cta_add_image'] ) ) :
        ?>

        <div class="cta-box-column cta-box-column-image">
            <img src="<?php echo wp_get_attachment_url( $params['cta_image_id'] ); ?>" alt="<?php echo ( isset( $params['cta_image_alt_title'] )? $params['cta_image_alt_title'] : '' ); ?>">
        </div>
        <?php
            endif;
        ?>

        <div class="cta-box-column">

            <?php
                if( isset( $params['cta_headline'] ) ) :
            ?>
            <div class="cta-headline"><?php echo $params['cta_headline']; ?></div>
            <?php
                endif;
            ?>

            <?php
                if( isset( $params['cta_summary'] ) ) :
            ?>
            <div class="cta-summary"><?php echo $params['cta_summary']; ?></div>
            <?php
                endif;
            ?>

            <?php
                if( isset( $params['cta_button'] ) ) :
            ?>
            <div class="cta-button">
                <a href="<?php echo ( isset( $params['cta_link'] )? $params['cta_link'] : '' ); ?>" target="_blank">
                    <?php echo $params['cta_button']; ?>
                </a>
            </div>
            <?php
                endif;
            ?>

        </div>

    </div>

</aside>
<?php

        $output = ob_get_contents();
        ob_end_clean();

    endif;

    return $output;
}



/**
 * Ermittelt die zur Darstellung eines Call-to-Action notwendigen Parameter
 *
 * @since 1.0.0
 * @param int $id    Die ID des zu rendernden Call-to-Action.
 * @see   https://www.advancedcustomfields.com/resources/get_field_objects/
 */

function mdbcta__get_params( $id, &$params )
{
    $result = false;


    if( !empty( $id ) ) :

        $fields = get_field_objects( $id );

        if( $fields ):

            foreach( $fields as $field ) :

                // Einfache Daten??bertragung
                if( ! empty( $field['value'] ) ) :
                    $params[ $field['name'] ] = $field['value'];
                endif;

            endforeach;

            $result = true;

        endif;

    endif;

    return $result;
}
