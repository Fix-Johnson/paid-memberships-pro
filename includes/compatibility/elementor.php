<?php 

/*
 * Load "the_content" filter later when elementor builder is activated.
 */

function pmpro_elementor_compatibility() {
 	if ( defined('PMPRO_VERSION') ) {

		// Remove the default the_content filter added to membership level descriptions and confirmation messages in PMPro.
		remove_filter( 'the_content', 'pmpro_level_description' );
		remove_filter( 'pmpro_level_description', 'pmpro_pmpro_level_description' );
		remove_filter( 'the_content', 'pmpro_confirmation_message' );
		remove_filter( 'pmpro_confirmation_message', 'pmpro_pmpro_confirmation_message' );
		// Filter members-only content later so that the builder's filters run before PMPro.
		remove_filter('the_content', 'pmpro_membership_content_filter', 5);
		add_filter('the_content', 'pmpro_membership_content_filter', 15);

	}
}
add_action( 'plugins_loaded', 'pmpro_elementor_compatibility', 15 );
