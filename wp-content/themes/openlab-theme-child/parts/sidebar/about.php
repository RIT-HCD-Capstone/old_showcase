<!-- copied from openlab-theme/parts/sidebar/about.php -->
<!-- the purpose of this file is to replace the labelling of the about menu with &nbsp -->
<?php
$nav_menu_args = array(
	'theme_location' => 'aboutmenu',
	'container'      => 'div',
	'container_id'   => 'about-menu',
	'menu_class'     => 'sidebar-nav clearfix',
);
?>

<div id="sidebar" class="sidebar col-sm-6 col-xs-24 pull-right type-about">
	<div class="sidebar-wrapper">
		<h2 class="sidebar-title hidden-xs">&nbsp</h2>
		<div class="sidebar-block hidden-xs">
			<?php wp_nav_menu( $nav_menu_args ); ?>
		</div>
	</div>
</div>
