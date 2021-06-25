/**
 * Customizer order control.
 *
 * @package Royal Shop
 */
( function ( $ ) {
	'use strict';
	wp.wztaHeadingAccordion = {
		init: function () {
			this.handleToggle();
		},
		handleToggle: function () {
			$( '.customize-control-customizer-heading.accordion .wzta-customizer-heading' ).on( 'click', function () {
				var accordion = $( this ).closest( '.accordion' );
				$( accordion ).toggleClass( 'expanded' );
				return false;
			} );
		},
	};

	$( document ).ready(
		function () {
			wp.wztaHeadingAccordion.init();
		}
	);
} )( jQuery );
