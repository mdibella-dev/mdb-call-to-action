jQuery( document ).ready( function( $ ) {

    // Assign WordPress color picker to the designated input fields
    $( '.cta-metabox-color-picker' ).each( function() {
        $( this ).wpColorPicker();
    } );


    if( $( '.cta-metabox-image-add' ).length > 0 ) {
        if( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            let id = $( 'input[name="cta-data-image-id"]' );

            $( '.cta-metabox-image-add' ).on( 'click', function( e ) {
                e.preventDefault();
                let theButton = $( this );
                wp.media.editor.send.attachment = function( props, attachment ) {
                    id.val( attachment.id ).change();
                };
                wp.media.editor.open( theButton );
                return false;
            } );

            $( '.cta-metabox-image-remove' ).on( 'click', function( e ) {
                e.preventDefault();
                id.val( '' ).change();
            } );

            id.on( 'change', function( e ) {
                if( '' == id.val() ) {
                    $( '.cta-metabox-with-image' ).hide();
                    $( '.cta-metabox-without-image' ).show();
                } else {
                    $( '.cta-metabox-image-preview' ).attr( 'src', wp.media.attachment( id.val() ).get( 'url' ) );
                    $( '.cta-metabox-with-image' ).show();
                    $( '.cta-metabox-without-image' ).hide();
                }

            } );
        }
    }

} );
