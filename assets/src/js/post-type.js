document.querySelectorAll( '.copyCTAToClipboard' ).forEach( singleButton => {

    singleButton.addEventListener( 'click', function( e ) {

        e.preventDefault();

        const theButton = this;
        var   theCode   = theButton.previousElementSibling.textContent;

        navigator.clipboard.writeText( theCode );

        // Creates a checkmark symbol next to the button
        const theCheckMark = document.createElement( 'span' );
        theCheckMark.className = 'dashicons dashicons-saved';
        theButton.parentElement.appendChild( theCheckMark );
        theButton.style.display = 'none';

        setTimeout( function() {
            theButton.parentElement.removeChild( theCheckMark );
            theButton.style.display = 'block';
        }, 2000 );
    } );
} );
