<!-- copied from openlab-theme/taxonomy-help_category.php -->
<!-- the purpose of this file is to override that one to invoke help_cats_loop() defined in functions.php -->
<?php
/*
Template Name: Help
*/
/**begin layout**/
get_header(); ?>
	<div id="content" class="hfeed row">
			<div class="col-sm-18 col-xs-24 col-help">
				<div id="openlab-main-content" class="content-wrapper">
					<?php help_cats_loop(); ?>
				</div>
			</div>
			<?php get_template_part( 'parts/sidebar/help' ); ?>
	</div>
<?php
get_footer();
/**end layout**/
