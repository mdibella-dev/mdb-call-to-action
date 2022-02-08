jQuery( document ).ready( function( $ ) {


    $( '.copyCTAToClipboard').click( function( e ) {
        e.preventDefault();

        var theCode = $( this ).prev( 'code' ).text();

        navigator.clipboard.writeText( theCode );
    } );


} );
