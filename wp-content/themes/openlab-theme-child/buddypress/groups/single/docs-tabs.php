<!-- the purpose of this file is to bring the following code into the template hierarchy -->
<!-- yanked from openlab-theme/lib/menus.php -->
<?php   global $bp, $groups_template;

	$group = null;
        
	if ( bp_is_group() ) { 
		$group = groups_get_current_group();
	} elseif ( ! empty( $groups_template->group ) ) {
		$group = $groups_template->group;
	}

	$group_permalink = bp_get_group_permalink( $group );

	?>

	<li <?php echo ( 'list' === bp_docs_current_view() ? 'class="current-menu-item"' : '' ); ?> ><a href="<?php echo esc_url( $group_permalink . bp_docs_get_docs_slug() ); ?>/"><?php esc_html_e( 'View Posts'/*'View Docs'*/, 'commons-in-a-box' ); ?></a></li>
	<?php if ( current_user_can( 'bp_docs_create' ) && current_user_can( 'bp_docs_associate_with_group', bp_get_current_group_id() ) ) : ?>
		<li <?php echo ( 'create' === bp_docs_current_view() ? 'class="current-menu-item"' : '' ); ?> ><a href="<?php echo esc_url( $group_permalink . bp_docs_get_docs_slug() ); ?>/create/"><?php esc_html_e( 'New Post'/*'New Doc'*/, 'commons-in-a-box' ); ?></a></li>
	<?php endif; ?>
	<?php if ( ( 'edit' === bp_docs_current_view() || 'single' === bp_docs_current_view() ) && bp_docs_is_existing_doc() ) : ?>
		<?php $doc_obj = bp_docs_get_current_doc(); ?>
		<li class="current-menu-item"><?php echo esc_html( $doc_obj->post_title ); ?></li>
	<?php endif; ?>

