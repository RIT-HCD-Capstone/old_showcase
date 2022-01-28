<?php
/**
 * Portfolio export settings.
 */

namespace OpenLab\Portfolio\Export;

use const OpenLab\Portfolio\ROOT_DIR;
use OpenLab\Portfolio\Contracts\Registerable;

class Service implements Registerable {

	/**
	 * Register our settings page.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'admin_menu', [ $this, 'register_page' ] );
		add_action( 'admin_post_export-portfolio', [ $this, 'handle' ] );
	}

	/**
	 * Register custom tools page.
	 *
	 * @return void
	 */
	public function register_page() {
		$group_id = openlab_get_group_id_by_blog_id( get_current_blog_id() );

		if ( ! cboxol_is_portfolio( $group_id ) ) {
			return;
		}

		add_submenu_page(
			'tools.php',
			__( 'Export Portfolio', 'openlab-portfolio' ),
			__( 'Export Portfolio', 'openlab-portfolio' ),
			'export',
			'export_portfolio',
			[ $this, 'render' ]
		);
	}

	/**
	 * Generate export file for downloading.
	 *
	 * @return void
	 */
	public function handle() {
		check_admin_referer( 'ol-export-portfolio' );

		$exporter = new Exporter( wp_get_upload_dir() );
		$filename = $exporter->run();

		if ( is_wp_error( $filename ) ) {
			add_settings_error(
				'failed_export',
				'failed_export',
				$filename->get_error_message()
			);

			wp_safe_redirect( wp_get_referer() );
		}

		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename="' . basename( $filename ) . '"');
		header('Content-length: ' . filesize( $filename ) );
		readfile( $filename );

		// Remove file.
		unlink( $filename );

		exit;
	}

	/**
	 * Render export page.
	 *
	 * @return void
	 */
	public function render() {
		require ROOT_DIR . '/views/export/export.php';
	}
}
