<?php
/**
 * Functions to show the CTA Metabox.
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Registers the CTA metabox.
 */

function register_metabox() {

    add_meta_box(
        'cta-metabox',
        __( 'Call to Action', 'mdb-call-to-action' ),
        __NAMESPACE__ . '\render_metabox',
        'cta'
    );

}

add_action( 'add_meta_boxes', __NAMESPACE__ . '\register_metabox' );



/**
 * Displays the CTA metabox.
 */

function render_metabox( $post ) {

    $params = get_params( $post->ID );

    if( 0 === count( $params) ) :
        $params = get_default_params();
    endif;

    ?>
    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-headline"><?php echo __( 'Headline', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-headline" name="cta-data-headline" value="<?php echo esc_attr( $params['headline'] ); ?>" maxlength="100">
            <p><?php echo __( 'We recommend that you limit the headline to 100 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-summary"><?php echo __( 'Text', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-summary" name="cta-data-summary" value="<?php echo esc_attr( $params['summary'] ); ?>" maxlength="160">
            <p><?php echo __( 'We recommend that you limit the text to 160 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-button-text"><?php echo __( 'Button', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-button-text" name="cta-data-button-text" value="<?php echo esc_attr( $params['button-text'] ); ?>" maxlength="50">
            <p><?php echo __( 'We recommend that you limit the text to 50 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-link"><?php echo __( 'Link', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="url" id="cta-data-link" name="cta-data-link" value="<?php echo esc_url( $params['link'] ); ?>" maxlength="255">
            <p><?php echo __( 'The link to which the call-to-action should point.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-background-color"><?php echo __( 'Background color', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" class="cta-metabox-color-picker" name="cta-data-background-color" value="<?php echo $params['background-color']; ?>"/>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-text-color"><?php echo __( 'Text color', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" class="cta-metabox-color-picker" name="cta-data-text-color" value="<?php echo $params['text-color']; ?>"/>
        </div>
    </div>

    <?php
}



/**
 * Saves the CTA metabox.
 */

function save_metabox( $post_id ) {

    $params = [];


    // Detect and copy all posted params
    $keys = [
        'cta-data-headline'         => 'headline',
        'cta-data-summary'          => 'summary',
        'cta-data-button-text'      => 'button-text',
        'cta-data-link'             => 'link',
        'cta-data-background-color' => 'background-color',
        'cta-data-text-color'       => 'text-color',
    ];

    foreach( $keys as $post_key => $param_key ):
        if( isset( $_POST[$post_key] ) ) :
            $params[$param_key] = $_POST[$post_key];
        endif;
    endforeach;


    // Store params
    if( 0 !== count( $params ) ) :
        update_post_meta(
            $post_id,
            CTA_DATA_METAKEY,
            $params
        );
    endif;
}

add_action( 'save_post', __NAMESPACE__ . '\save_metabox' );
