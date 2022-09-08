<!-- yanked from openlab_member_sidebar_menu() of openlab-theme/lib/sidebar-funcs.php -->
<!-- the purpose of this file is to bring the following code into the template directory -->
<?php   
        $mobile = false;        

        $dud = bp_displayed_user_domain();
	if ( ! $dud ) {
		$dud = bp_loggedin_user_domain(); // will always be the logged in user on my-*
	}

	if ( $mobile ) {
		$classes = 'visible-xs';
	} else {
		$classes = 'hidden-xs';
	}

	$group_types = cboxol_get_group_types(
		array(
			'exclude_portfolio' => true,
		)
	);

	$portfolio_group_type = cboxol_get_portfolio_group_type();

	$current_group_type = null;
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( ! empty( $_GET['group_type'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$current_group_type = wp_unslash( urldecode( $_GET['group_type'] ) );
	}

	if ( is_user_logged_in() && openlab_is_my_profile() ) :
		?>

		<div id="item-buttons<?php echo ( $mobile ? '-mobile' : '' ); ?>" class="mol-menu sidebar-block <?php echo esc_attr( $classes ); ?>">

			<ul class="sidebar-nav clearfix">

				<?php $selected_page = bp_is_user_activity() ? 'selected-page' : ''; ?>
				<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-profile my-profile"><a href="<?php echo esc_attr( $dud ); ?>"><?php esc_html_e( 'My Profile', 'commons-in-box' ); ?></a></li>

				<?php $selected_page = bp_is_user_settings() ? 'selected-page' : ''; ?>
				<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-settings my-settings"><a href="<?php echo esc_attr( $dud . bp_get_settings_slug() ); ?>/"><?php esc_html_e( 'My Settings', 'commons-in-a-box' ); ?></a></li>

				<?php if ( $portfolio_group_type ) : ?>
					<?php if ( openlab_user_has_portfolio( bp_displayed_user_id() ) && ( ! cboxol_group_is_hidden( openlab_get_user_portfolio_id() ) || openlab_is_my_profile() || groups_is_user_member( bp_loggedin_user_id(), openlab_get_user_portfolio_id() ) ) ) : ?>

						<li id="portfolios-groups-li<?php echo ( $mobile ? '-mobile' : '' ); ?>" class="visible-xs mobile-anchor-link"><a href="#portfolio-sidebar-inline-widget" id="portfolios<?php echo ( $mobile ? '-mobile' : '' ); ?>"><?php echo esc_html( $portfolio_group_type->get_label( 'my_portfolio' ) ); ?></a></li>

					<?php else : ?>

						<li id="portfolios-groups-li<?php echo ( $mobile ? '-mobile' : '' ); ?>" class="visible-xs mobile-anchor-link"><a href="#portfolio-sidebar-inline-widget" id="portfolios<?php echo ( $mobile ? '-mobile' : '' ); ?>"><?php echo esc_html( $portfolio_group_type->get_label( 'create_item' ) ); ?></a></li>

					<?php endif; ?>
				<?php endif; ?>

				<?php foreach ( $group_types as $group_type ) : ?>
					<?php
					$selected = '';
					if (
						( bp_is_user_groups() && $group_type->get_slug() === $current_group_type )
						||
						openlab_is_create_group( $group_type->get_slug() )
					) {
						$selected = 'selected-page';
					}
					?>
					<li class="sq-bullet <?php echo esc_attr( $selected ); ?> mol-courses my-<?php echo esc_attr( $group_type->get_slug() ); ?>"><a href="<?php echo esc_attr( cboxol_get_user_group_type_directory_url( $group_type, bp_loggedin_user_id() ) ); ?>"><?php echo esc_html( $group_type->get_label( 'my_groups' ) ); ?></a></li>
				<?php endforeach; ?>

				<?php /* Get a friend request count */ ?>
				<?php if ( bp_is_active( 'friends' ) ) : ?>
					<?php
					$request_ids   = friends_get_friendship_request_user_ids( bp_loggedin_user_id() );
					$request_count = intval( count( (array) $request_ids ) );
					$selected_page = bp_is_user_friends() ? 'selected-page' : '';
					?>

					<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-friends my-friends">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<a href="<?php echo esc_attr( $dud . bp_get_friends_slug() ); ?>/"><?php esc_html_e( 'My Friends', 'commons-in-a-box' ); ?> <?php echo openlab_get_menu_count_mup( $request_count ); ?></a>
					</li>
				<?php endif; ?>

				<?php /* Get an unread message count */ /*?>
				<?php if ( bp_is_active( 'messages' ) ) : ?>
					<?php
					$message_count = bp_get_total_unread_messages_count();
					$selected_page = bp_is_user_messages() ? 'selected-page' : '';
					?>

					<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-messages my-messages">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<a href="<?php echo esc_attr( $dud . bp_get_messages_slug() ); ?>/inbox/"><?php esc_html_e( 'My Messages', 'commons-in-a-box' ); ?> <?php echo openlab_get_menu_count_mup( $message_count ); ?></a>
					</li>
				<?php endif; */?><!-- removes My Messages from loading in the member-profile submenu -->

				<?php /* Get an invitation count */ ?>
				<?php if ( bp_is_active( 'groups' ) ) : ?>
					<?php
					$invites      = groups_get_invites_for_user();
					$invite_count = isset( $invites['total'] ) ? (int) $invites['total'] : 0;

					$selected_page = bp_is_current_action( 'invites' ) || bp_is_current_action( 'sent-invites' ) || bp_is_current_action( 'invite-new-members' ) ? 'selected-page' : '';
					?>

					<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-invites my-invites">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<a href="<?php echo esc_attr( $dud . bp_get_groups_slug() ); ?>/invites/"><?php esc_html_e( 'My Invitations', 'commons-in-a-box' ); ?> <?php echo openlab_get_menu_count_mup( $invite_count ); ?></a>
					</li>
				<?php endif ?>
			</ul>

		</div>

	<?php else : ?>

		<div id="item-buttons<?php echo ( $mobile ? '-mobile' : '' ); ?>" class="mol-menu sidebar-block <?php echo esc_attr( $classes ); ?>">

			<ul class="sidebar-nav clearfix">

				<?php $selected_page = bp_is_user_activity() ? 'selected-page' : ''; ?>
				<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-profile"><a href="<?php echo esc_attr( $dud ); ?>/"><?php esc_html_e( 'Profile', 'commons-in-a-box' ); ?></a></li>

				<?php if ( $portfolio_group_type ) : ?>
					<?php if ( openlab_user_has_portfolio( bp_displayed_user_id() ) && ( ! cboxol_group_is_hidden( openlab_get_user_portfolio_id() ) || openlab_is_my_profile() || groups_is_user_member( bp_loggedin_user_id(), openlab_get_user_portfolio_id() ) ) ) : ?>

						<li id="portfolios-groups-li<?php echo ( $mobile ? '-mobile' : '' ); ?>" class="visible-xs mobile-anchor-link"><a href="#portfolio-sidebar-inline-widget" id="portfolios<?php echo ( $mobile ? '-mobile' : '' ); ?>"><?php echo esc_html( $portfolio_group_type->get_label( 'single' ) ); ?></a></li>

					<?php endif; ?>
				<?php endif; ?>

				<?php foreach ( $group_types as $group_type ) : ?>
					<?php $selected_page = $group_type->get_slug() === $current_group_type ? 'selected-page' : ''; ?>
					<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-courses"><a href="<?php echo esc_attr( cboxol_get_user_group_type_directory_url( $group_type, bp_displayed_user_id() ) ); ?>"><?php echo esc_html( $group_type->get_label( 'plural' ) ); ?></a></li>
				<?php endforeach; ?>

				<?php $selected_page = bp_is_user_friends() ? 'selected-page' : ''; ?>
				<li class="sq-bullet <?php echo esc_attr( $selected_page ); ?> mol-friends"><a href="<?php echo esc_attr( $dud . bp_get_friends_slug() ); ?>/"><?php esc_html_e( 'Friends', 'commons-in-a-box' ); ?></a></li>

			</ul>

		</div>

		<?php
	endif;

