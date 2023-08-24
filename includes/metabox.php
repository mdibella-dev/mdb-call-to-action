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
 * Registers the CTA metabox
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
 * Gets the CTA
 */


/**
 * Displays the CTA metabox
 */

function render_metabox() {

    $cta_component = [];
    $cta_component['headline'] = __( 'This is an expressive headline', 'mdb-call-to-action' );
    $cta_component['text']     = __( 'This text should inform the reader why they should follow the call-to-action', 'mdb-call-to-action' );
    $cta_component['btn-text'] = __( 'Click here!', 'mdb-call-to-action' );
    $cta_component['url']      = __( 'https://www.marcodibella.de' );

    ?>
    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-mb-headline"><?php echo __( 'Headline', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-mb-headline" value="<?php echo $cta_component['headline']; ?>" maxlength="100">
            <p><?php echo __( 'We recommend that you limit the headline to 100 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-mb-text"><?php echo __( 'Text', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-mb-text" value="<?php echo $cta_component['text']; ?>" maxlength="160">
            <p><?php echo __( 'We recommend that you limit the text to 160 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-mb-btn-text"><?php echo __( 'Button', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="text" id="cta-mb-btn-text" value="<?php echo $cta_component['btn-text']; ?>" maxlength="50">
            <p><?php echo __( 'We recommend that you limit the text to 50 characters.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <div class="cta-metabox-row">
        <div class="cta-metabox-col-label">
            <label for="cta-mb-url"><?php echo __( 'Link', 'mdb-call-to-action' ); ?></label>
        </div>
        <div class="cta-metabox-col-input">
            <input type="url" id="cta-mb-url" value="<?php echo $cta_component['url']; ?>" maxlength="255">
            <p><?php echo __( 'The link to which the call-to-action should point.', 'mdb-call-to-action' ); ?></p>
        </div>
    </div>

    <?php
}
