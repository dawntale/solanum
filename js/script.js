/**
 * File script.js.
 *
 * Theme scripts
 *
 */

 /**
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();

/**
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

/**
 * Masonry and imagesLoaded.
 *
 */
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


/**
 * Search toggle
 *
 */
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