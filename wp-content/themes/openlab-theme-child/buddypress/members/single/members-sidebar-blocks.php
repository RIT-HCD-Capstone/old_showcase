<!-- the purpose of this file is to bring the following code into the template directory -->
<!-- yanked from openlab_members_sidebar_blocks() of openlab-theme/lib/sidebar-funcs.php-->
<?php
        $mobile_hide = false;        

        $portfolio_group_type = cboxol_get_portfolio_group_type();

	$block_classes = '';

	if ( $mobile_hide ) {
		$block_classes = ' hidden-xs';
	}

	if ( is_user_logged_in() && openlab_is_my_profile() ) :
		?>
		<h2 class="sidebar-header top-sidebar-header hidden-xs"><?php esc_html_e( 'Profile Menu', 'commons-in-a-box' ); ?></h2>
	<?php else : ?>
		<h2 class="sidebar-header top-sidebar-header hidden-xs"><?php esc_html_e( 'Profile Menu', 'commons-in-a-box' ); ?></h2>
	<?php endif; ?>	
