<?php

if ( ! function_exists( 'openlab_get_filesystem' ) ) {
	/**
	 * Retrieve the instance of the WP_Filesystem.
	 *
	 * @todo Extract as utility function.
	 *
	 * @return mixed An instance of WP_Filesystem_* depending on method.
	 */
	function openlab_get_filesystem() {
		global $wp_filesystem;

		if ( ! $wp_filesystem ) {
			// Make sure the WP_Filesystem function exists.
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once untrailingslashit( ABSPATH ) . '/wp-admin/includes/file.php';
			}

			WP_Filesystem();
		}

		return $wp_filesystem;
	}
}

/**
 * Gets a button label.
 *
 * We use this function to allow other plugins, such as cbox-openlab-core, to
 * filter the user-facing strings.
 *
 * @param string $type Type of the label.
 * @return string
 */
function openlab_portfolio_get_label( $type ) {
	switch ( $type ) {
		case 'add_to_portfolio':
			$label = __( 'Add to Portfolio', 'openlab-portfolio' );
		break;

		case 'added_to_my_portfolio':
			$label = __( 'Added to my Portfolio', 'openlab-portfolio' );
		break;

		default:
			$label = '';
		break;
	}

	/**
	 * Filters the label.
	 *
	 * @param string $label
	 * @param string $type
	 */
	return apply_filters( 'openlab_portfolio_get_label', $label, $type );
}
