/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	"use strict";

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize( 'kaira_related_posts_label', function( value ) {
		value.bind( function( to ) {
			$( '.related-post .section-title' ).text( to );
		} );
	} );

	wp.customize( 'kaira_category_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.slider .banner-text .text .category a' ).css( 'color', to );
			$( '.site-content .content-area .text-holder .entry-header .category a' ).css( 'color', to );
			$( '.site-content .content-area .post .entry-header .category a' ).css( 'color', to );
		} );
	} );

	wp.customize( 'kaira_nav_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .main-navigation li a' ).css( 'color', to );
		} );
	} );


	wp.customize( 'kaira_button_color', function( value ) {
		value.bind( function( to ) {
			$( '.comment-form input[type="submit"]' ).css( 'background', to );
			$( '.slider .banner-text .text .read-more' ).css( 'background', to );
			$( '.site-content .content-area .text-holder .entry-footer .read-more' ).css( 'background', to );
		} );
	} );

	wp.customize( 'kaira_header_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( 'background-color', to );
		} );
	} );


	wp.customize( 'kaira_front_featured_posts_label', function( value ) {
		value.bind( function( to ) {
			$( '.top-section .section-title' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
