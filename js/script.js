/**
 * File script.js.
 *
 * Theme scripts
 *
 */

// Masonry and imagesLoaded
( function( $ ) {

	var elem = document.querySelector('.grid');

	if(elem == null){
		return;
	}

	// Massonry first initiation script
	var msnry = new Masonry( elem, {
		// options
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		percentPosition: true
	});

	// imagesLoaded
	imagesLoaded( elem ).on( 'progress', function() {
		// layout Masonry after each image loads
		msnry.layout();
	});

	// Massonry second initiation script after infinite scroll loaded
    $( document.body ).on( 'post-load', function () {

		var msnry = new Masonry( elem, {
			// options
			itemSelector: '.grid-item',
			columnWidth: '.grid-sizer',
			percentPosition: true
		});

		imagesLoaded( elem ).on( 'progress', function() {
			// layout Masonry after each image loads
			msnry.layout();
		});
	});
	
} )( jQuery );


// Search toggle on off
( function() {
	
	s_toggle = document.querySelector('.search-toggle');

	s_toggle.onclick = function() {
		var that = this,
			wrapper = document.querySelector('#search-container'),
			container = that.querySelectorAll('a');

		that.classList.toggle('active');
		wrapper.classList.toggle('hide');

		if (that.classList.contains('active')){
			container[0].setAttribute('aria-expanded', 'true');
		} else {
			container[0].setAttribute('aria-expanded', 'false');
		}
	}

} )();