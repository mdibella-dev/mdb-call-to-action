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
            <p class="cta-metabox-description"><?php echo __( 'We recommend that you limit the headline to 100 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-summary"><?php echo __( 'Text', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-summary" name="cta-data-summary" value="<?php echo esc_attr( $params['summary'] ); ?>" maxlength="160">
            <p class="cta-metabox-description"><?php echo __( 'We recommend that you limit the text to 160 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-button-text"><?php echo __( 'Button', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-button-text" name="cta-data-button-text" value="<?php echo esc_attr( $params['button-text'] ); ?>" maxlength="50">
            <p class="cta-metabox-description"><?php echo __( 'We recommend that you limit the text to 50 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-link"><?php echo __( 'Link', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="url" id="cta-data-link" name="cta-data-link" value="<?php echo esc_url( $params['link'] ); ?>" maxlength="255">
            <p class="cta-metabox-description"><?php echo __( 'The link to which the call-to-action should point.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label><?php echo __( 'Background color', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" class="cta-metabox-color-picker" name="cta-data-background-color" value="<?php echo $params['background-color']; ?>"/>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label><?php echo __( 'Text color', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" class="cta-metabox-color-picker" name="cta-data-text-color" value="<?php echo $params['text-color']; ?>"/>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label><?php echo __( 'Image', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <?php
            $has_image = ! empty( $params['image-id'] );
            $url       = '';

            if( true == $has_image ) :
                $image = wp_get_attachment_image_src( $params['image-id'], 'thumbnail' );
                $url   = $image[0];
            endif;
            ?>
            <div class="cta-metabox-with-image" style="display:<?php echo ( true == $has_image )? 'block' : 'none';?>">
                <div class="cta-metabox-image-preview" style="background-image:url(<?php echo $url; ?>);"></div>
                <div class="cta-metabox-image-buttons">
                    <button class="cta-metabox-image-add button"><?php echo __( 'Replace image', 'mdb-call-to-action' ); ?></button>
                    <button class="cta-metabox-image-remove button"><?php echo __( 'Remove image', 'mdb-call-to-action' ); ?></button>
                </div>
            </div>
            <div class="cta-metabox-without-image" style="display:<?php echo ( false == $has_image )? 'block' : 'none';?>">
                <button class="cta-metabox-image-add button"><?php echo __( 'Add image', 'mdb-call-to-action' ); ?></button>
            </div>
            <input type="hidden" value="<?php echo $params['image-id']; ?>" name="cta-data-image-id" >
            <p class="cta-metabox-description"><?php echo __( 'Note: Images are only displayed from a screen resolution > 800 px.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-data-image-alt-text"><?php echo __( 'ALT text', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-data-image-alt-text" name="cta-data-image-alt-text" value="<?php echo esc_attr( $params['image-alt-text'] ); ?>" maxlength="50">
            <p class="cta-metabox-description"><?php echo __( 'We recommend that you limit the text to 50 characters.', 'mdb-call-to-action' ); ?></p>
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
        'cta-data-image-alt-text'   => 'image-alt-text',
        'cta-data-image-id'         => 'image-id',
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
