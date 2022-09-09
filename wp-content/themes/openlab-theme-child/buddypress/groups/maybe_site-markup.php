<?php
/* site-markup.php
 *
 * the purpose of site-markup.php is to define setting up or associating a site with a group during or after creation.
 *
 * @from openlab-theme/lib/group-funcs.php 
 * @for create.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */

        global $wpdb, $bp, $current_site, $base;

	$group_type = cboxol_get_edited_group_group_type();
	if ( is_wp_error( $group_type ) ) {
		return;
	}

	$the_group_id = null;
	if ( bp_is_group() ) {
		$the_group_id = bp_get_current_group_id();
	}

	$is_clone = false;
	if ( $group_type->get_can_be_cloned() ) {
		$clone_source_group_id = cboxol_get_clone_source_group_id( $the_group_id );
		if ( $clone_source_group_id ) {
			$clone_source_site_id = cboxol_get_group_site_id( $clone_source_group_id );
			if ( $clone_source_site_id ) {
				$is_clone = true;
			}
		}
	}

	?>

	<div class="ct-group-meta">

		<?php do_action( 'openlab_group_creation_extra_meta' ); ?>

		<?php $group_site_url = openlab_get_group_site_url( $the_group_id ); ?>

		<div class="panel panel-default">
			<div class="panel-heading"><?php esc_html_e( 'Associated Site Details', 'commons-in-a-box' ); ?></div>

			<div class="panel-body">
				<?php if ( ! empty( $group_site_url ) ) : ?>
					<div id="current-group-site">
						<?php
						$maybe_site_id = openlab_get_site_id_by_group_id( $the_group_id );

						if ( $maybe_site_id ) {
							$site_is_external   = false;
							$group_site_name    = get_blog_option( $maybe_site_id, 'blogname' );
							$group_site_text    = '<strong>' . esc_html( $group_site_name ) . '</strong>';
							$group_site_url_out = '<a class="bold" href="' . esc_url( $group_site_url ) . '">' . esc_html( $group_site_url ) . '</a>';
							$show_admin_bar     = cboxol_show_admin_bar_for_anonymous_users( $maybe_site_id );
						} else {
							$site_is_external   = true;
							$group_site_text    = esc_url( $group_site_url );
							$group_site_url_out = '<a class="bold" href="' . esc_url( $group_site_url ) . '">' . esc_html( $group_site_url ) . '</a>';
						}

						?>

						<p>
							<?php
							printf(
								// translators: site name or link
								esc_html__( 'This group is currently associated with the site "%s"', 'commons-in-a-box' ),
								 // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								$group_site_text
							);
							?>
						</p>

						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<ul id="change-group-site"><li><?php echo $group_site_url_out; ?> <a class="button underline confirm" href="<?php echo esc_attr( wp_nonce_url( bp_get_group_permalink( groups_get_current_group() ) . 'admin/site-details/unlink-site/', 'unlink-site' ) ); ?>" id="change-group-site-toggle"><?php esc_html_e( 'Unlink', 'commons-in-a-box' ); ?></a></li></ul>
						<input type="hidden" id="site-is-external" value="<?php echo intval( $site_is_external ); ?>" />

						<?php if ( ! $site_is_external ) : ?>
							<div class="show-admin-bar-on-site-setting">
								<p><input type="checkbox" name="show-admin-bar-on-site" id="show-admin-bar-on-site" <?php checked( $show_admin_bar ); ?>> <label for="show-admin-bar-on-site"><?php esc_html_e( 'Show WordPress admin bar to non-logged-in visitors to my site?', 'commons-in-a-box' ); ?></label></p>
								<p class="group-setting-note italics note"><?php esc_html_e( 'The admin bar appears at the top of your site. Logged-in visitors will always see it but you can hide it for site visitors who are not logged in.', 'commons-in-a-box' ); ?></p>
								<?php wp_nonce_field( 'openlab_site_admin_bar_settings', 'openlab-site-admin-bar-settings-nonce', false ); ?>
							</div>
						<?php endif; ?>
					</div><!-- #current-group-site -->

				<?php else : ?>

					<?php
					$template = $group_type->get_template_site_id();

					$blog_details = get_blog_details( $template );

					// Set up user blogs for fields below
					$user_blogs = get_blogs_of_user( get_current_user_id() );

					// Exclude blogs where the user is not an Admin
					foreach ( $user_blogs as $ubid => $ub ) {
						$role = get_user_meta( bp_loggedin_user_id(), $wpdb->base_prefix . $ub->userblog_id . '_capabilities', true );

						if ( ! array_key_exists( 'administrator', (array) $role ) ) {
							unset( $user_blogs[ $ubid ] );
						}
					}
					$user_blogs = array_values( $user_blogs );

					if ( $group_type->get_is_portfolio() ) {
						$portfolio_user_id = openlab_get_user_id_from_portfolio_group_id( $the_group_id );
						$suggested_path    = openlab_suggest_portfolio_path( $portfolio_user_id );
					} else {
						$suggested_path = groups_get_current_group()->slug;
					}

					?>
					<style type="text/css">
						.disabled-opt {
							opacity: .4;
						}
					</style>

					<input type="hidden" name="action" value="copy_blog" />
					<input type="hidden" name="source_blog" value="<?php echo intval( $blog_details->blog_id ); ?>" />

					<?php $group_site_display = ! empty( $group_site_url ) ? 'none' : 'auto'; ?>
					<div class="form-table groupblog-setup" style="display: <?php echo esc_attr( $group_site_display ); ?>">
						<?php if ( ! $group_type->get_requires_site() ) : ?>
							<?php $show_website = 'none'; ?>
							<div class="form-field form-required">
								<div class="row site-details-query">
									<label><input type="checkbox" id="set-up-site-toggle" name="set-up-site-toggle" value="yes" <?php checked( $is_clone ); ?> /> <?php esc_html_e( 'Associate a site?', 'commons-in-a-box' ); /*'Associate a site?' replaced 'Setup a site?'*/ ?></label>
								</div>
							</div>
						<?php else : ?>
							<?php $show_website = 'auto'; ?>
						<?php endif ?>

						<div id="site-options">
							<div id="wds-website-tooltips" class="form-field form-required" style="display:<?php echo esc_attr( $show_website ); ?>">
								<p class="ol-tooltip"><?php echo esc_html( $group_type->get_label( 'site_address_help_text' ) ); ?></p>
							</div>

							<?php if ( bp_is_group_create() && $is_clone ) : ?>
								<?php /* @todo get rid of all 'wds' */ ?>
								<div id="wds-website-clone" class="form-field form-required">
									<div id="noo_clone_options">
										<div class="row">
											<div class="radio">
												<label>
													<input type="radio" class="noo_radio" name="new_or_old" id="new_or_old_clone" value="clone" />
													<?php esc_html_e( 'Name your cloned site:', 'commons-in-a-box' ); ?>
												</label>
											</div>

											<?php if ( is_subdomain_install() ) : ?>
												<div class="site-label site-path site-path-subdomain">
													<input id="clone-destination-path" class="form-control domain-validate" size="40" name="clone-destination-path" type="text" title="<?php esc_html_e( 'Domain', 'commons-in-a-box' ); ?>" value="<?php echo esc_html( $suggested_path ); ?>" />

													<span>.<?php echo esc_html( cboxol_get_subdomain_base() ); ?></span>
												</div>

											<?php else : ?>
												<div class="site-label site-path site-path-subdirectory">
													<span><?php echo esc_html( $current_site->domain . $current_site->path ); ?></span>

													<input class="form-control domain-validate" size="40" id="clone-destination-path" name="clone-destination-path" type="text" title="<?php esc_html_e( 'Domain', 'commons-in-a-box' ); ?>" value="<?php echo esc_html( $suggested_path ); ?>" />
												</div>
											<?php endif; ?>

											<input id="blog-id-to-clone" name="blog-id-to-clone" value="<?php echo esc_attr( $clone_source_site_id ); ?>" type="hidden" />
										</div><!-- /.row -->

										<p id="cloned-site-url"></p>
									</div><!-- /#noo_clone_options -->
								</div><!-- /#wds-website-clone -->
							<?php endif; ?>

							<?php if ( ! $is_clone ) : ?>
								<div id="wds-website" class="form-field form-required">
									<div id="noo_new_options">
										<div id="noo_new_options-div" class="row">
											<div class="radio">
												<label>
													<input type="radio" class="noo_radio" name="new_or_old" id="new_or_old_new" value="new" checked />
													<?php esc_html_e( 'Create a new site:', 'commons-in-a-box' ); ?>
												</label>
											</div>

											<?php if ( is_subdomain_install() ) : ?>
												<div class="site-label site-path site-path-subdomain">
													<input id="new-site-domain" class="form-control domain-validate" size="40" name="blog[domain]" type="text" title="<?php esc_html_e( 'Domain', 'commons-in-a-box' ); ?>" value="<?php echo esc_html( $suggested_path ); ?>" />

													<span>.<?php echo esc_html( cboxol_get_subdomain_base() ); ?></span>
												</div>

											<?php else : ?>
												<div class="site-label site-path site-path-subdirectory">
													<span><?php echo esc_html( $current_site->domain . $current_site->path ); ?></span>

													<input id="new-site-domain" class="form-control domain-validate" size="40" name="blog[domain]" type="text" title="<?php esc_html_e( 'Domain', 'commons-in-a-box' ); ?>" value="<?php echo esc_html( $suggested_path ); ?>" />
												</div>
											<?php endif; ?>

										</div><!-- #noo_new_options-div -->
									</div><!-- #noo_new_options -->
								</div><!-- #wds-website -->
							<?php endif; ?>

							<?php if ( ! $is_clone ) : ?>
								<?php /* Existing blogs - only display if some are available */ ?>
								<?php
								// Exclude blogs already used as groupblogs
								global $wpdb, $bp;
								// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
								$current_groupblogs = $wpdb->get_col( "SELECT meta_value FROM {$bp->groups->table_name_groupmeta} WHERE meta_key = 'cboxol_group_site_id'" );
								$current_groupblogs = array_map( 'intval', $current_groupblogs );

								foreach ( $user_blogs as $ubid => $ub ) {
									if ( in_array( (int) $ub->userblog_id, $current_groupblogs, true ) ) {
										unset( $user_blogs[ $ubid ] );
									}
								}
								$user_blogs = array_values( $user_blogs );
								?>

								<?php if ( ! empty( $user_blogs ) ) : ?>
									<div id="wds-website-existing" class="form-field form-required">

										<div id="noo_old_options">
											<div class="row">
												<div class="radio">
													<label>
														<input type="radio" class="noo_radio" id="new_or_old_old" name="new_or_old" value="old" />
														<?php esc_html_e( 'Use an existing site:', 'commons-in-a-box' ); ?></label>
												</div>
												<div class="site-path">
													<label class="sr-only" for="groupblog-blogid"><?php esc_html_e( 'Choose a site', 'commons-in-a-box' ); ?></label>
													<select class="form-control" name="groupblog-blogid" id="groupblog-blogid">
														<option value="0"><?php esc_html_e( '- Choose a site -', 'commons-in-a-box' ); ?></option>
														<?php foreach ( (array) $user_blogs as $user_blog ) : ?>
															<option value="<?php echo esc_attr( $user_blog->userblog_id ); ?>"><?php echo esc_html( $user_blog->blogname ); ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endif; ?>

							<div id="wds-website-external" class="form-field form-required">
								<div id="noo_external_options">
									<div class="form-group row">
										<div class="radio">
											<label>
												<input type="radio" class="noo_radio" id="new_or_old_external" name="new_or_old" value="external" />
												<?php esc_html_e( 'Use an external site:', 'commons-in-a-box' ); ?>
											</label>
										</div>
										<div class="site-path">
											<label class="sr-only" for="external-site-url"><?php esc_html_e( 'Input external site URL', 'commons-in-a-box' ); ?></label>
											<input class="form-control pull-left" type="text" name="external-site-url" id="external-site-url" placeholder="http://" />
											<a class="btn btn-primary no-deco top-align pull-right" id="find-feeds" href="#" display="none"><?php echo esc_html_x( 'Check', 'External site RSS feed check button', 'commons-in-a-box' ); ?><span class="sr-only"><?php esc_html_e( 'Check external site for Post and Comment feeds', 'commons-in-a-box' ); ?></span></a>
										</div>
									</div><!-- .form-group.row -->
								</div><!-- #noo_external_options -->

								<div id="check-note-wrapper" style="display:<?php echo esc_attr( $show_website ); ?>">
									<div colspan="2">
										<p id="check-note" class="italics disabled-opt"><?php echo esc_html( $group_type->get_label( 'site_feed_check_help_text' ) ); ?></p>
									</div>
								</div>

							</div><!-- #wds-website-external -->
						</div><!-- $site-options -->
					</div><!-- .groupblog-setup -->
				<?php endif; ?>
			</div><!-- .panel-body -->
		</div><!-- .panel -->
	</div><!-- .ct-group-meta -->

	<?php wp_nonce_field( 'openlab_site_settings', 'openlab-site-settings-nonce', false ); ?>
