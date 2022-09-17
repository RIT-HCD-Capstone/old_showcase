<?php
/* taxonomy-help_category.php
 *
 * the purpose of taxonomy-help_category.php is to provide a template for the help categoization.
 *
 * @overrides openlab-theme/taxonomy-help_category.php  
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
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
