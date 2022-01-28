 <div class="dialog" id="add-to-protfolio-dialog" aria-hidden="true">
	<div class="dialog__overlay" tabindex="-1" data-a11y-dialog-hide"></div>
	<dialog class="dialog__content" aria-labelledby="dialog-title" role="dialog">
		<div class="dialog__header">
			<h1 id="dialog-title"><?php echo esc_html( openlab_portfolio_get_label( 'add_to_portfolio' ) ); ?></h1>
			<button data-a11y-dialog-hide class="dialog__close" aria-label="<?php esc_attr_e( 'Close this dialog window', 'openlab-portfolio' ); ?>">×</button>
		</div>
		<div class="dialog__body"><?php esc_html_e( 'Loading...', 'openlab-portfolio' ); ?></div>
		<div class="dialog__footer">
			<button data-a11y-dialog-hide type="button" class="btn btn-link" data-dismiss="modal">
				<?php esc_html_e( 'Cancel','openlab-portfolio' ); ?>
			</button>
			<button type="button" class="btn btn-primary">
				<?php echo esc_html( openlab_portfolio_get_label( 'add_to_portfolio' ) ); ?>
			</button>
		</div>
	</dialog>
</div>

<script type="text/template" id="tmpl-add-to-portfolio">
	<form action="#" method="post">
		<div class="form-group">
			<legend><?php esc_html_e( 'Choose a Format:', 'openlab-portfolio' ); ?></legend>
			<div class="control-radio">
				<label for="type-posts">
					<input id="type-posts" type="radio" name="type" value="posts" <# if ( data.type === 'posts' || data.type === 'comments' ) { #>checked="checked"<# } #>/> <?php esc_html_e( 'Post', 'openlab-portfolio' ); ?>
				</label>
			</div>
			<div class="control-radio">
				<label for="type-pages">
					<input id="type-pages" type="radio" name="type" value="pages" <# if ( data.type === 'pages' ) { #>checked="checked"<# } #>/> <?php esc_html_e( 'Page', 'openlab-portfolio' ); ?>
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="title"><?php esc_html_e( 'Title', 'openlab-portfolio' ); ?></label>
			<input type="text" name="title" id="title" value="{{ data.title }}">
		</div>
		<div class="form-group">
			<label for="citation"><?php esc_html_e( 'Citation', 'openlab-portfolio' ); ?></label>
			<div id="citation"><?php echo wp_kses_post( 'This <a href="{{ data.url }}">entry</a> was originaly posted in "{{ data.site_name }}" on {{ data.date }}', 'openlab-portfolio' ); ?></div>
		</div>
		<div class="form-group">
			<label for="annotation"><?php esc_html_e( 'Annotation', 'openlab-portfolio' ); ?></label>
			<textarea id="annotation" name="annotation" rows="3"></textarea>
		</div>
	</form>
</script>
