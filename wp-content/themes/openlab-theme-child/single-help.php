<!-- copied from openlab-theme/single-help.php -->
<!-- the purpose of this file is to override the latter to replace openlab_help_loop of openlab-theme/lib/help-funcs.php with our own -->
<?php
/**begin layout**/
get_header(); ?>
	<div id="content" class="hfeed row">
			<div class="col-sm-18 col-xs-24 col-help">
				<div id="openlab-main-content" class="content-wrapper">
					<?php help_loop(); ?>
				</div>
			</div>

			<?php get_template_part( 'parts/sidebar/help' ); ?>

	</div>
<?php get_footer();
/**end layout**/
?>
