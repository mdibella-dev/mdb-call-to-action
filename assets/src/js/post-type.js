document.querySelectorAll( '.button-copy-cta-to-clipboard' ).forEach( singleButton => {

    singleButton.addEventListener( 'click', function( e ) {

        e.preventDefault();

        const theButton  = this;
        var   theCode    = theButton.previousElementSibling.textContent;
        const theMessage = theButton.nextElementSibling;

        navigator.clipboard.writeText( theCode );

        theMessage.style.display = 'flex';
        theButton.style.display = 'none';

        setTimeout( function() {
            theMessage.style.display = 'none';
            theButton.style.display = 'block';
        }, 2000 );
    } );
} );
