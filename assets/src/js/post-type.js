jQuery( document ).ready( function( $ ) {

    $( '.copyCTAToClipboard').on( 'click', function( e ) {
        e.preventDefault();

        var theButton = $( this );
        var theCode   = theButton.prev( 'code' ).text();

        navigator.clipboard.writeText( theCode );

        theButton.after( '<span class="dashicons dashicons-saved"></span>' );
        theButton.hide();

        setTimeout( function() {
            theButton.show();
            theButton.next( 'span' ).remove();
        }, 2000 );
    } );

} );
