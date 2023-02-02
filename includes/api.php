<?php
/**
 * API functions.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Outputs a specific call-to-action.
 *
 * @since 1.0.0
 *
 * @param int $id The ID of the call-to-action to render.
 *
 * @return string The rendered call-to-action.
 */

function api_render_cta( $id )
{
    $output = '';
    $params = array();


    if( ! empty( $id ) and ( true === api_get_cta_params( $id, $params ) ) ) :

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
 * Determines the parameters necessary to display a call-to-action
 *
 * @since 1.0.0
 *
 * @see https://www.advancedcustomfields.com/resources/get_field_objects/
 *
 * @param int   $id     The ID of the call-to-action.
 * @param array $params Reference to an array that takes over the determined parameters.
 *
 * @return bool The outcome of the function call: true on success, otherwise false
 */

function api_get_cta_params( $id, &$params )
{
    $result = false;


    if( !empty( $id ) ) :

        $fields = get_field_objects( $id );

        if( $fields ):

            foreach( $fields as $field ) :

                // Simple data transfer
                if( ! empty( $field['value'] ) ) :
                    $params[ $field['name'] ] = $field['value'];
                endif;

            endforeach;

            $result = true;

        endif;

    endif;

    return $result;
}
