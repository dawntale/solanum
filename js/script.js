/**
 * File script.js.
 *
 * Theme scripts
 *
 */

// Massonry initiation script
( function() {
	var elem = document.querySelector('.grid');

	if (elem != null){
		imagesLoaded( elem, function( instance ) {
			var msnry = new Masonry( elem, {
				// options
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});
		});
	}
} )();

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