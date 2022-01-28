<?php
/**
 * Commons In A Box polyfills.
 */

if ( ! function_exists( 'cboxol_get_asset_version' ) ) {
	function cboxol_get_asset_version() {
		return \OpenLab\Portfolio\VERSION;
	}
}

if ( ! function_exists( 'cboxol_get_group_site_type') ) {
	function cboxol_get_group_site_type( $site_id ) {
		return openlab_get_site_type( $site_id );
	}
}

if ( ! function_exists( 'cboxol_is_portfolio' ) ) {
	function cboxol_is_portfolio( $group_id = 0 ) {
		return openlab_is_portfolio( $group_id );
	}
}
