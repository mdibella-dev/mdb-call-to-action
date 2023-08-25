<?php
/**
 * Shortcode [cta]
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Generates a table with the schedule of a specific event.
 *
 * @since 2.0.0
 *
 * The attributes (parameters) of the shorcode:
 *
 * - set            The selected setlist.
 * - event          The identification number of the event.
 * - speaker        The identification number of a speaker; is used to filter the contributions of this speaker.
 * - show_details   Allow details to be displayed (TRUE, FALSE).
 */

class Shortcode_CTA extends \wordpress_helper\Shortcode {

    /**
     * The shortcode tag.
     *
     * @var string
     */

    protected $tag = 'cta';



    /**
     * The default shortcode attributes (parameters).
     *
     * @var array
     */

    protected $default_atts = [
        'id' => ''
    ];



    /**
     * Gets the selected set.
     *
     * @return int The setlist number.
     *
     */

     protected function get_id() {
        return (int) $this->atts['id'];
    }




    /**
     * Prepares the shortcode (the shortcode logic).
     *
     * @return bool true|false The outcome of the preparation process
     */

    function prepare() {
        $ready = false;

        if( ! empty( $this->get_id() ) and ( 'publish' == get_post_status ( $this->get_id() ) ) ) :
            $ready = true;

            // get params?
        endif;

        return $ready;
    }



    /**
     * Renders the shortcode (the shortcode output).
     */

    function render() {

        $params = get_cta_metadata( $this->get_id() );
        $style  = '';

    /*    if( isset( $params['cta_background_color'] ) and isset( $params['cta_text_color'] ) ) :
            $style = sprintf(
                'style="background-color:%1$s !important; color: %2$s !important;"',
                $params['cta_background_color'],
                $params['cta_text_color']
            );
        endif;
    */
        ?>
        <aside class="cta-box" <?php echo $style; ?>>

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
                        if( isset( $params['headline'] ) ) :
                    ?>
                    <div class="cta-headline"><?php echo $params['headline']; ?></div>
                    <?php
                        endif;
                    ?>

                    <?php
                        if( isset( $params['summary'] ) ) :
                    ?>
                    <div class="cta-summary"><?php echo $params['summary']; ?></div>
                    <?php
                        endif;
                    ?>

                    <?php
                        if( isset( $params['button-text'] ) ) :
                    ?>
                    <div class="cta-button">
                        <a href="<?php echo ( isset( $params['link'] )? $params['link'] : '' ); ?>" target="_blank"><?php echo $params['button-text']; ?></a>
                    </div>
                    <?php
                        endif;
                    ?>

                </div>

            </div>

        </aside>

        <?php
    }
}


$shortcode_cta_object = new Shortcode_CTA;
