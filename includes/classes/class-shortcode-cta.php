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
     * Constructor: Adds the shortcode to the WordPress ecosystem.
     */

    function __construct() {
        if ( ! empty( $this->tag ) ) {
            add_shortcode( $this->tag, [$this, 'callback'] );
            add_action( 'wp_enqueue_scripts', [$this, 'register_styles_and_scripts'] );
        }
    }



    /**
     * Registers the frontend stylesheet for the shortcode.
     */

    function register_styles_and_scripts() {

        wp_register_style(
            'mdb-cta-style',
            PLUGIN_URL . 'assets/build/css/frontend.min.css',
            [],
            PLUGIN_VERSION
        );
    }



    /**
     * Gets the The default attributes of this shortcode.
     *
     * @return array The default attributes
     */

    protected function get_default_atts() {
        return [
            'id' => ''
        ];
    }



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

    public function prepare() {
        $ready = false;

        if ( ! empty( $this->get_id() ) and ( 'publish' == get_post_status ( $this->get_id() ) ) ) {
            $ready = true;

            // get params?
        }

        return $ready;
    }



    /**
     * Renders the shortcode (the shortcode output).
     */

    public function render() {

        $params = get_params( $this->get_id() );
        $style  = '';

        // Exit early when there's nothing to show
        if ( ! isset( $params['headline'] ) and ! isset( $params['summary'] ) and ! isset( $params['button-text'] ) ) {
            return;
        }


        // Go on, modify styling if necessary
        wp_enqueue_style( 'mdb-cta-style' );

        if ( isset( $params['background-color'] ) and isset( $params['text-color'] ) ) {
            $style = sprintf(
                'style="background-color:%1$s !important; color: %2$s !important;"',
                $params['background-color'],
                $params['text-color']
            );
        }


        // Render the CTA box
        ?>
        <aside class="cta-box" <?php echo $style; ?>>

            <div class="cta-box-columns">

                <?php
                if ( isset( $params['image-id'] ) and ! empty( $params['image-id'] ) ) {
                    $image = wp_get_attachment_image_src( $params['image-id'], 'thumbnail' );
                    $url   = $image[0];
                ?>
                    <div class="cta-box-column cta-box-column-with-image">
                        <div class="cta-image" style="background-image:url(<?php echo $url; ?>);"></div>
                    </div>
                <?php
                }
                ?>

                <div class="cta-box-column">

                    <?php
                    if ( isset( $params['headline'] ) ) {
                    ?>
                        <div class="cta-headline"><?php echo $params['headline']; ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if ( isset( $params['summary'] ) ) {
                    ?>
                        <div class="cta-summary"><?php echo $params['summary']; ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if ( isset( $params['button-text'] ) ) {
                    ?>
                        <div class="cta-button">
                            <a href="<?php echo ( isset( $params['link'] )? $params['link'] : '' ); ?>" target="_blank" rel="noopener"><?php echo $params['button-text']; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </aside>

        <?php
    }
}


new Shortcode_CTA();
