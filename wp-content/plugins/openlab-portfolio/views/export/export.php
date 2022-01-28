<div class="wrap nosubsub">
	<h1><?php esc_html_e( 'Export Portfolio', 'openlab-portfolio' ); ?></h1>

	<?php settings_errors(); ?>

	<p><?php esc_html_e( 'Use this tool to export your Portfolio.', 'openlab-portfolio' ); ?></p>
	<p><?php esc_html_e( 'A Portfolio Archive file (.zip) will be downloaded to your computer and can be used with Import Portfolio tool.', 'openlab-portfolio' ); ?></p>

	<form method="post" id="export-portfolio" action="<?php echo admin_url( 'admin-post.php' ); ?>">
		<input type="hidden" name="action" value="export-portfolio" />
		<?php wp_nonce_field( 'ol-export-portfolio' ); ?>
		<?php submit_button( __( 'Download Archive File', 'openlab-portfolio' ) ); ?>
	</form>
</div>
