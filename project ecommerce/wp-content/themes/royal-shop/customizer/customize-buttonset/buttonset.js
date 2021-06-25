/**
 * Button control in customizer
 *
 * @package Royal Shop
 */
wp.customize.controlConstructor['royal-shop-buttonset'] = wp.customize.Control.extend({
	ready: function() {
		'use strict';
		var control = this;
		// Change the value
		this.container.on( 'click', 'input', function() {
			control.setting.set( jQuery( this ).val() );
		});
	}

});

