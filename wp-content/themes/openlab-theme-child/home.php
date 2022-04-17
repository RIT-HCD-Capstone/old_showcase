<!-- the purpose of this file is to override openlab-theme/home.php to disable the parts/home/login feature -->
<!-- the purpose of this file is to expand the slider to a full-page element -->
<!-- the purpose of this file is to override the code of the default slider -->
<!-- the purpose of this file is to override the default homepage widget formatting -->
<?php
/**
 * front page
 *
 * Note to themers: home-right appears before home-left in this template file,
 * to make responsive styling easier
 */
get_header();
?>

<div id="openlab-main-content" class="clearfix row-home-top">
        <!--
        <div class="no-gutter no-gutter-right login">
		<div id="cuny_openlab_jump_start">
			<?php //get_template_part( 'parts/home/login' ); this does 1?>
		</div>
	</div>
	<div class="fill-gutter fill-gutter-left slider">
        -->
        <div class="slider" style="width: 100%;"> <!-- this does 2-->
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php echo get_home_slider(); //openlab_get_home_slider(); this does 3?>
	</div>

</div>
<div class="row row-home-bottom">
	<!-- <div id="home-left" class="col-sm-8"> this does 4 -->
        <div id="home-left" class="col-sm-16">
        <?php $inst = array( 'group_type' => 'project', 'title' => 'Projects', );?>
        <?php the_widget( 'OpenLab_Child_Group_Type_Widget', $inst ); //dynamic_sidebar( 'home-sidebar' ); ?>
	</div>

	<!-- <div id="home-right" class="col-sm-16"> this does 4 -->
        <div id="home-left" class="col-sm-8">
		<!-- <div id="home-group-list-wrapper" class="row"> -->

		<?php the_widget( 'OpenLab_Child_WhatsHappening_Widget' ); //dynamic_sidebar( 'home-main' ); ?>

		<div class="clearfloat"></div>
		<script type='text/javascript'>(function ($) {
		$('.activity-list').css('visibility', 'hidden');
		$('#home-new-member-wrap').css('visibility', 'hidden');
                })(jQuery);</script>
		<!-- </div> -->
	</div>
</div>

<?php
get_footer();

