<div class="panel panel-default">
	<div class="panel-heading"><?php esc_html_e( 'Add to My Portfolio', 'openlab-portfolio' ); ?></div>
	<div class="panel-body">
		<p><?php echo esc_html( $group_type->get_label( 'settings_help_text_add_to_portfolio' ) ); ?></p>

		<div class="checkbox">
			<label for="portfolio-sharing">
				<input name="portfolio-sharing" type="checkbox" id="portfolio-sharing" value="1" <?php checked( 'yes', $enabled ); ?> />
				<?php esc_html_e( 'Enable "Add to My Portfolio"', 'openlab-portfolio' ); ?>
			</label>
		</div>

		<?php wp_nonce_field( 'add_to_portfolio_toggle', 'add-to-portfolio-toggle-nonce', false ); ?>
	</div>
</div>
