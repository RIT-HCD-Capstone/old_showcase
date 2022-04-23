<?php
/*
 * yanked from openlab-theme/buddypress/members/index-directory.php
 * the purpose of this file is to provide a brief description of the members in addition to the functionality of that code
 */
/* Template Name: People Archive */
get_header();
?>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
?>
<div id="content" class="hfeed row">
	<?php get_template_part( 'parts/sidebar/groups' ); ?>
	<div <?php post_class( 'col-sm-18 col-xs-24' ); ?>>
		<div id="openlab-main-content" class="content-wrapper">
			<div class="entry-title">
				<h1><?php echo esc_attr( $post_obj->post_title ); ?></h1>

				<div class="directory-title-meta">
					<button data-target="#sidebar" class="mobile-toggle direct-toggle pull-right visible-xs" type="button"><span class="fa fa-binoculars"></span><span class="sr-only"><?php esc_html_e( 'Search', 'commons-in-a-box' ); ?></span></button>
				</div>
			</div>

			<div class="entry-content">
				<div id="people-listing">
                                        <div class="col-sm-16">
                                                These profiles represent our faculty, staff, students, alumni, and collaborators.
                                        </div>
					<?php openlab_list_members( 'more' ); ?>
				</div><!--people-listing-->
			</div><!--entry-content-->
		</div>
	</div><!--hentry-->
</div><!--content-->

<?php
get_footer();
