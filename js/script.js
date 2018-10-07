/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
		// options
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		percentPosition: true
	});

	$( '.search-toggle' ).on( 'click.twentyfourteen', function( event ) {
		var that    = $( this ),
			wrapper = $( '#search-container' ),
			container = that.find( 'a' );

		that.toggleClass( 'active' );
		wrapper.toggleClass( 'hide' );

		if ( that.hasClass( 'active' ) ) {
			container.attr( 'aria-expanded', 'true' );
		} else {
			container.attr( 'aria-expanded', 'false' );
		}

		if ( that.is( '.active' ) || $( '.search-toggle .screen-reader-text' )[0] === event.target ) {
			wrapper.find( '.search-field' ).focus();
		}
	} );
} )();
