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
 * Generates a call-to-action button.
 *
 * @since 2.0.0
 *
 * The attributes (parameters) of the shorcode:
 *
 * - id     The post_id of the desired CTA
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

        $params = get_params( $this->get_id() );
        $style  = '';

        if( isset( $params['background-color'] ) and isset( $params['text-color'] ) ) :
            $style = sprintf(
                'style="background-color:%1$s !important; color: %2$s !important;"',
                $params['background-color'],
                $params['text-color']
            );
        endif;

        ?>
        <aside class="cta-box" <?php echo $style; ?>>

            <div class="cta-box-columns">

                <?php
                if( isset( $params['cta_add_image'] ) and ( true === (bool) $params['cta_add_image'] ) ) :
                ?>
                <div class="cta-box-column cta-box-column-image">
                    <img src="<?php echo wp_get_attachment_url( $params['cta_image_id'] ); ?>" alt="<?php echo ( isset( $params['image-alt-text'] )? $params['image-alt-text'] : '' ); ?>">
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
