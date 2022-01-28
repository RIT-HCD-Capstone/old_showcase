<div class="wrap nosubsub import-page">
	<?php $this->render_header(); ?>

	<p><strong><?php esc_html_e( 'Step 1: Choose and upload your Portfolio Archive file (.zip).', 'openlab-portfolio' ); ?></strong></p>
	<p><strong class="error"><?php echo $error->get_error_message(); ?></strong></p>

	<p>
		<a class="button button-primary" href="<?php echo esc_url( $this->get_url( 0 ) ); ?>">
			<?php esc_html_e( 'Try Again', 'openlab-portfolio' ); ?>
		</a>
	</p>
</div>
