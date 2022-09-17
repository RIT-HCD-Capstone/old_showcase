<?php
/* home.php
 *
 * the purpose of home.php is to define the structure of the site's home / landing page.
 *
 * @overrides openlab-theme/home.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
/* front page
 *
 * Note to themers: home-right appears before home-left in this template file,
 * to make responsive styling easier
 * */
get_header();
?>

<!--<div id="openlab-main-content" class="clearfix row-home-top"></div>-->
<div class="row row-home-bottom">
	<div id="home-left" class="col-sm-8">
		<?php dynamic_sidebar( 'home-sidebar' ); ?>
	</div>

	<div id="home-right" class="col-sm-16">
		<div id="home-group-list-wrapper" class="row">

		<?php dynamic_sidebar( 'home-main' ); ?>

		<div class="clearfloat"></div>

		<script type='text/javascript'>(function ($) {
		$('.activity-list').css('visibility', 'hidden');
		$('#home-new-member-wrap').css('visibility', 'hidden');
		})(jQuery);</script>
		</div>
	</div>
</div>

<?php
get_footer();
