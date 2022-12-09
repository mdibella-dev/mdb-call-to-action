<?php
/**
 * ACF-Feldgruppe
 *
 * @author  Marco Di Bella
 * @package mdb-call-to-action
 */

namespace mdb_call_to_action;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Installation der ACF-Felder
 *
 * @since 1.0.1
 */

function add_acf_fields()
{

    acf_add_local_field_group(array(
        'key' => 'group_61e7f4a0aeac9',
        'title' => 'Call-to-Action',
        'fields' => array(
            array(
                'key' => 'field_61e7f51946a85',
                'label' => 'Überschrift',
                'name' => 'cta_headline',
                'type' => 'text',
                'instructions' => 'Wir empfehlen die Beschreibung unter 100 Zeichen zu halten.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'title',
                'default_value' => 'Das ist eine ausdrucksstarke Überschrift',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 110,
            ),
            array(
                'key' => 'field_61e7f633ed38e',
                'label' => 'Beschreibung',
                'name' => 'cta_summary',
                'type' => 'text',
                'instructions' => 'Wir empfehlen die Beschreibung unter 160 Zeichen zu halten.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'title',
                'default_value' => 'Dieser zweite Text soll dem Leser möglichst darüber Aufschluss geben, warum er der Call-to-Action Folge leisten sollte.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 170,
            ),
            array(
                'key' => 'field_61e7f69dbc076',
                'label' => 'Schaltfläche',
                'name' => 'cta_button',
                'type' => 'text',
                'instructions' => 'Wir empfehlen die Schaltflächenbeschriftung unter 50 Zeichen zu halten.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'title',
                'default_value' => 'Hier klicken!',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 50,
            ),
            array(
                'key' => 'field_61e7f6eabc077',
                'label' => 'Link',
                'name' => 'cta_link',
                'type' => 'url',
                'instructions' => 'Der Link auf dem das Call-to-Action verweisen soll.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'none',
                'default_value' => 'https://www.marcodibella.de',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61e814b1ac3f9',
                'label' => 'Bild',
                'name' => 'cta_add_image',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'none',
                'message' => 'Dem CTA ein Bild hinzufügen',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_61e963febc980',
                'label' => 'Bild: Motiv',
                'name' => 'cta_image_id',
                'type' => 'image',
                'instructions' => 'Das Bildmotiv sollte nicht größer als 240px (Breite/Höhe) sein. Hinweis: Bilder werden erst ab einer Bildschirmauflösung > 800 px angezeigt.',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_61e814b1ac3f9',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'none',
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => 240,
                'max_height' => 240,
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_61e96434bc981',
                'label' => 'Bild: Alternative Beschriftung',
                'name' => 'cta_image_alt_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_61e814b1ac3f9',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'title',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 50,
            ),
            array(
                'key' => 'field_61e8193e97581',
                'label' => 'Stilklasse',
                'name' => 'cta_css',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wp-typography' => 'title',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'cta',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

}

// add_action('acf/init', 'mdb_call_to_action\add_acf_fields');
