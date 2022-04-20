<?php
function get_child_url() {
        return 'https://dhssatrit.cad.rit.edu/';
}

function get_child_template_directory_uri() {
        return get_child_url() . 'wp-content/themes/openlab-theme-child';
}

add_action( 'admin_bar_menu', 'custom_wpadminbar', 999 );
function custom_wpadminbar( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'my-account' );             //removes the "Hi, [user]" subemenu from the admin bar
        $wp_admin_bar->remove_node( 'bp-register' );            //removes the "Sign Up" from the admin bar
        //$wp_admin_bar->remove_node( 'my-openlab' );             //removes the "My Profile" submenu from the admin bar
        $wp_admin_bar->remove_node( 'wpa-logout' );             //removes the first "Logout" from the admin bar
        $wp_admin_bar->remove_node( 'edit' );                   //removes the edit button from the admin bar
        $wp_admin_bar->remove_node( 'invites' );                //removes the friend request and invitations submenu from the admin bar
        $wp_admin_bar->remove_node( 'messages' );               //removes the messages submenu from the admin bar
        $wp_admin_bar->remove_node( 'activity' );               //removes the activity submenu from the admin bar
        $wp_admin_bar->remove_node( 'site-name' );              //removes the "DHSS Showcase" submenu from the admin bar
        $wp_admin_bar->remove_node( 'comments' );               //removes the comments submenu from the admin bar
        $wp_admin_bar->remove_node( 'new-content' );            //removes the new content submenu from the admin bar
        $wp_admin_bar->remove_node( 'dashboard-link' );         //removes the Wordpress dashboard link from the mobile admin bar
        $wp_admin_bar->remove_menu( 'mobile-centered' );        //removes the mobile centered menu from the mobile admin bar
        $wp_admin_bar->remove_menu( 'my-hamburger-mol' );       //removes the profile-links submenu from the mobile admin bar
        //$wp_admin_bar->remove_menu( 'my-hamburger' );           //removes the main-nav-links submenu from the mobile admin bar 
        //$wp_admin_bar->remove_menu( 'top-secondary' );          //removes the "Login" / "Logout" from the admin bar
        
        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'home',
                'title'         => 'Home',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'projects',
                'title'         => 'Projects',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() . 'groups/type/project/' ), 
        ) );

         $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'courses',
                'title'         => 'Courses',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() . 'groups/type/course/' ), 
        ) );       

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'members',
                'title'         => 'Members',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() . 'members/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'tools',
                'title'         => 'Tools',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() . 'groups/type/club/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'subplans',
                'title'         => 'Subplans',
                'meta'          => array ( 'class' => 'hidden-xs', ),
                'href'          => esc_url( get_child_url() . 'subplans/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'search',
                'title'         => 'Search',
                'meta'          => array ( 'class' => 'visible-xs m-nav-item', ),
                'href'          => esc_url( get_child_url() . 'search-results/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'calendar',
                'title'         => 'Calendar',
                'meta'          => array ( 'class' => 'visible-xs m-nav-item', ),
                'href'          => esc_url( get_child_url() . 'about/calendar/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'about',
                'title'         => 'About',
                'meta'          => array ( 'class' => 'visible-xs m-nav-item', ),
                'href'          => esc_url( get_child_url() . 'about/' ), 
        ) );

        $wp_admin_bar->add_node( array(
                'parent'        => 'root-default',
                'id'            => 'help',
                'title'         => 'Help',
                'meta'          => array ( 'class' => 'visible-xs m-nav-item', ),
                'href'          => esc_url( get_child_url() . 'blog/help/dhss-showcase-help/' ), 
        ) );

}

/*
 * loads openlab-theme-child/style.css after openlab-theme css
 */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );
function my_theme_enqueue_styles() {
        wp_enqueue_style( 'child-style', get_stylesheet_uri(), 
                array( 'main-styles' ), wp_get_theme()->get('Version'));
}

add_action( 'init', 'rm_openlab_do_breadcrumbs' );
function rm_openlab_do_breadcrumbs() {
        remove_action( 'bp_before_footer', 'openlab_do_breadcrumbs', 5 );
}

/*
 * the purpose of this function is to remove help categories from automatically appearing in the help menu, so they can be added manually.
 * manual addition of help categories as links to the help menu keeps menu links highlighted after selection 
 */
add_action( 'init', 'rm_openlab_help_categories_menu', 0 );
function rm_openlab_help_categories_menu () {
        remove_filter( 'wp_nav_menu_items', 'openlab_help_categories_menu', 10, 2 );
}

/*
 * the purpose of this function is to remove the default registration of widgets by the OpenLab theme, so we can register our own by the next function
 */
add_action( 'widgets_init', 'remove_openlab_register_widgets', 9 );
function remove_openlab_register_widgets() {
        remove_action( 'widgets_init', 'openlab_register_widgets' );
}

/*
 * yanked from openlab-theme/lib/widgets.php
 * the purpose of this function is to allow registration of our own widgets in addition to some of the widget definitions provided by the OpenLab theme 
 */
add_action( 'widgets_init', 'register_widgets', 10 );
function register_widgets() {
        $widgets_dir = get_template_directory() . '/lib/widgets/';

	if ( function_exists( 'buddypress' ) ) {
                /* here */
                require_once 'widgets/whats-happening-widget.php';
		register_widget( 'OpenLab_Child_WhatsHappening_Widget' );

		require_once $widgets_dir . 'whos-online.php';
		register_widget( 'OpenLab_WhosOnline_Widget' );

		require_once $widgets_dir . 'new-members.php';
		register_widget( 'OpenLab_NewMembers_Widget' );

                /* and here */
		require_once 'widgets/group-type-widget.php';
		register_widget( 'OpenLab_Child_Group_Type_Widget' );
	}

}

/*
 * the purpose of this function is to remove the default registration of menu locations, so we can add our own
 */
add_action( 'init', 'remove_openlab_core_setup' );
function remove_openlab_core_setup() {
        remove_action( 'after_setup_theme', 'openlab_core_setup', 10);
}

/*
 * the purpose of this function is to add our own menu location, Main Menu Secondary, to the locations supplied by CBOX OpenLab
 */
add_action( 'after_setup_theme', 'openlab_child_core_setup' );
function openlab_child_core_setup() {
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	register_nav_menus(
		array(
			'main'        => __( 'Main Menu', 'openlab' ),
			'aboutmenu'   => __( 'About Menu', 'openlab' ),
			'helpmenu'    => __( 'Help Menu', 'openlab' ),
			'helpmenusec' => __( 'Help Menu Secondary', 'openlab' ),
                        'mainsec'     => __( 'Main Menu Secondary', 'openlab' ),
		)
	);
}

/*
 * the purpose of the following code is to remove the custom_breadcrumb_args filter of openlab-theme/lib/breadcrumbs.php, so we can hook our own
 */
//add_filter( 'init', 'remove_custom_breadcrumb_args' );
function remove_custom_breadcrumb_args() {
        add_filter( 'openlab_breadcrumb_args', 'custom_breadcrumb_args' );
}//?

/*
 * yanked from custom_breadcrumb_args of openlab-theme/lib/breadcrumbs.php
 * the purpose of the following code is to override the functionality of custom_breadcrumb_args to align the footer breadcrumb trail with the 'You are here' text
 */
add_filter( 'openlab_breadcrumb_args', 'openlab_child_custom_breadcrumb_args', 11 );
function openlab_child_custom_breadcrumb_args( $args ) {
        /*$args['labels']['prefix'] = '<div class="breadcrumb-inline prefix-label"><div class="breadcrumb-prefix-label">' 
                . esc_html__( 'You are here', 'commons-in-a-box' ) . '</div><i class="fa fa-caret-right"></i></div><div class="breadcrumb-inline">';
	$args['prefix']           = '<div style="margin-top:0px;" id="breadcrumb-container"><div class="breadcrumb-col semibold uppercase"><div class="breadcrumb-wrapper">';
        $args['suffix']           = '</div></div></div></div>';*/
        $args['prefix']           = '<div style="margin-top:0px;" id="breadcrumb-container"><div class="breadcrumb-col semibold uppercase"><div class="breadcrumb-wrapper">';
        $args['labels']['prefix'] = '<div style="padding-left:10px;" class="breadcrumb-inline">';	
        $args['suffix']           = '</div></div></div>';
	return $args;
}

/*
 * this function removes the default openlab nav bar from loading, so we can load our own
 */
add_action( 'init', 'rm_openlab_header_bar' );
function rm_openlab_header_bar() {
        remove_action( 'bp_before_header', 'openlab_header_bar', 10 );
}

/*
 * yanked from openlab_sitewide_header() of wp-content/plugins/cbox-openlab-core/includes/network-toolbar.php
 * the purpose of this code is to provide an alternative to that function that doesn't load the search in mobile
 */
function openlab_child_sitewide_header( $location = 'header' ) {
	$logo_url = openlab_get_logo_url();
	?>

	<div class="header-mobile-wrapper visible-xs">
		<div class="container-fluid">
			<div class="navbar-header clearfix">
				<header class="menu-title pull-left">
					<a href="<?php echo esc_attr( bp_get_root_domain() ); ?>" title="<?php echo esc_attr( _x( 'Home', 'Home page banner link title', 'commons-in-a-box' ) ); ?>" style="background-image: url('<?php echo esc_url( $logo_url ); ?>');"><span class="screen-reader-text"><?php bp_site_name(); ?></span></a>
				</header>	
			</div>
		</div>
	</div>

	<?php
}

/*
 * this function allows us load our own nav bar code, below
 */
add_action( 'bp_before_header', 'header_bar', 10 );
function header_bar() {
        main_menu( 'header' );
}

/*
 * yanked from openlab_main_menu of openlab-theme/lib/theme-hooks.php
 * the purpose of this code is to load the secondary menu like the primary menu, putting it on the top nav.
 * working with custom_wpadminbar(), a contracted display will apparently drop the menu into the header and load the actual main menu (defined in wordpress) in the hamburger
 * this is done, to avoid overwriting the plugins/cbox-openlab-core/indcludes/network-toolbar.php 
 */
function main_menu( $location = 'header' ) {
	$logo_html = openlab_get_logo_html();
	if ( 'header' === $location ) {
		$logo_html = preg_replace( '/height="[^"]+"/', '', $logo_html );
		$logo_html = preg_replace( '/width="[^"]+"/', '', $logo_html );
	}

	?>
	<nav style="z-index:1; margin-bottom:0px;" class="navbar navbar-default oplb-bs navbar-location-<?php echo esc_attr( $location ); ?>" role="navigation">
                <?php /*openlab_do_breadcrumbs();*/ openlab_child_sitewide_header( $location ); ?>
		<div style="border-bottom:none;" class="main-nav-wrapper">
			<div style="padding-left:0px; padding-right:0px;" class="container-fluid" id="main-nav">
				<div class="navbar-header hidden-xs">
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<header class="menu-title"><?php echo $logo_html; ?></header>
				</div>
				<div class="navbar-collapse collapse" id="main-nav-<?php echo esc_attr( $location ); ?>">
					<?php
					// this adds the main menu, controlled through the WP menu interface
					$args = array(
						'theme_location' => 'mainsec',
						'container'      => false,
						'menu_class'     => 'nav navbar-nav',
						'menu_id'        => 'menu-main-menu-' . $location,
					);

					wp_nav_menu( $args ); 
					?>
<!--
					<div class="navbar-right hidden-xs">
						<?php //openlab_mu_site_wide_bp_search( 'desktop', $location ); ?>
                                                <ul class="nav navbar-nav">
                                                        <li>
                                                        <?php //if ( is_user_logged_in() ): ?>
                                                                <a href="https://dhssatrit.cad.rit.edu/wp-login.php?action=logout&_wpnonce=56b4db4c50&redirect_to=https://dhssatrit.cad.rit.edu">Logout</a>
                                                        <?php //else: ?>
                                                                <a href="https://dhssatrit.cad.rit.edu/wp-login.php?saml_sso">Login</a>
                                                        <?php //endif; ?>
                                                        </li>
                                                </ul>
					</div> 
-->
                                </div>
<!--
                                <div class="navbar-collapse collapse" id="main-nav-sec-<?php /*echo esc_attr( $location );*/ ?>">
                                        <?php/*
                                        // this adds the main menu secondary
                                        $args_sec = array (
                                                'theme_location'        => 'mainsec',
                                                'container'             => false,
                                                'menu_class'            => 'nav navbar-nav',
                                                'menu_id'               => 'menu-main-menu-' . $location,
                                        );
                                        wp_nav_menu($args_sec);*/
                                        ?>
                                </div> 
                                <script>
                                        window.onscroll = function() { fixMenu() };
                                        var navbar = document.getElementById( "main-nav-sec-header" );
                                        var sticky = navbar.offsetTop;
                                        function fixMenu() {
                                                if ( window.pageYOffset >= sticky ) {
                                                        navbar.style["position"] = "fixed";
                                                        navbar.style["top"] = "0";
                                                        navbar.style["width"] = "100%";
                                                        navbar.style["max-width"] = "1155px";
                                                } else {
                                                        navbar.style["position"] = "";
                                                        navbar.style["top"] = "";
                                                        navbar.style["width"] = "";
                                                        navbar.style["max-width"] = "";
                                                }
                                        }
                                </script>
-->
                        </div>   
                </div> 
        </nav>
        <?php 
}

/*
 *yanked from openlab_calendar_submenu of openlab-theme/lib/menus.php
 *this function will help add Event Proposal to the Calendar functionality
 */
function calendar_submenu() {
	global $post;

	$links_out = array(
		array(
			'name'  => 'All Events',
			'slug'  => 'calendar',
			'link'  => get_site_url() . '/about/calendar/',
			'class' => 'calendar' === $post->post_name ? 'current-menu-item' : '',
		),
		array(
			'name'  => 'Upcoming',
			'slug'  => 'upcoming',
			'link'  => get_site_url() . '/about/calendar/upcoming/', 
			'class' => 'upcoming' === $post->post_name ? 'current-menu-item' : '',
		), 
	);

        if ( bp_loggedin_user_id() ) {
                array_push($links_out,
                        array(
                                'name'  => 'Event Proposal',
                                'slug'  => 'event-proposal',
                                'link'  => get_site_url() . '/about/calendar/event-proposal',
                                'class' => 'event-proposal' === $post->post_name ? 'current-menu-item' : '',
                        ),
                );
        } 

	return $links_out;
}

/*
 * yanked from openlab_custom_the_content of openlab-theme/lib/theme-hooks.php
 * runs after openlab_custom_the_content to included the Event Proposal template.
 */
function custom_the_content( $content ) {
	global $post;	
        if ( 'page' === $post->post_type && 'event-proposal' === $post->post_name && bp_loggedin_user_id() ) {
                
                $menu_items = calendar_submenu();
                include locate_template( 'parts/pages/calendar-event-proposal.php' );
                $content .= ob_get_clean();
        }

	return $content;
}
add_filter( 'the_content', 'custom_the_content' );

/* 
 * the purpose of this function is to remove openlab_custom_menu_items function from the wp_nav_menu_items hook, so we can hook our own version below.
 */
function remove_openlab_custom_menu() {
        remove_filter( 'wp_nav_menu_items', 'openlab_custom_menu_items', 10 );
}
add_action( 'init', 'remove_openlab_custom_menu' );

/*
 * yanked from openlab_custom_menu_items of openlab-theme/lib/theme-hooks.php
 * the purpose of this function is to replace openlab_custom_menu_items, so the 'My Profile' menu item doesn't load in the nav bar.
 */
function custom_menu_items( $items, $menu ) {
	global $post, $bp;

	if ( 'main' === $menu->theme_location ) {
		$opl_link = '';

                $opl_link_admin = '';

		$classes = '';

		if ( is_user_logged_in() ) {
			/*$class = '';
			if ( bp_is_my_profile() || bp_is_current_action( 'create' ) || is_page( 'my-courses' ) || is_page( 'my-projects' ) || is_page( 'my-clubs' ) ) {
				$class = 'class="current-menu-item"';
			}
			$opl_link  = '<li ' . $class . '>';
			$opl_link .= '<a href="' . esc_attr( bp_loggedin_user_domain() ) . '">' . esc_html__( 'My Profile', 'commons-in-a-box' ) . '</a>';
			$opl_link .= '</li>';

                        if( is_super_admin( get_current_user_id() ) ) {
                                $opl_link_admin = '<li>';
                                $opl_link_admin .= '<a href="' . esc_attr( 'https://dhssatrit.cad.rit.edu/wp-admin/' ) . '">' . esc_html( 'Dashboard' ) . '</a>';
                                $opl_link_admin .= '</li>';
                        }*/
		}
		return $opl_link . $items . $opl_link_admin;
	} elseif ( 'aboutmenu' === $menu->theme_location ) {

		$items = str_replace( 'Privacy Policy', '<i class="fa fa-external-link no-margin no-margin-left"></i>Privacy Policy', $items );

		return $items;
	} else {
		return $items;
	}
}
add_filter( 'wp_nav_menu_items', 'custom_menu_items', 10, 2 );

/*
 * yanked from openlab_get_group_activity_events_feed of openlab-theme/lib/group-funcs.php
 * the purpose of this function is to help integrate Event Proposal
 */
function get_group_activity_events_feed() {
	$events_out = '';

	// Non-public groups shouldn't show this to non-members.
	$group = groups_get_current_group();
	if ( 'public' !== $group->status && empty( $group->user_has_access ) ) {
		return $events_out;
	}

	if ( ! function_exists( 'bpeo_get_events' ) || ! openlab_is_calendar_enabled_for_group() ) {
		return $events_out;
	}

	$args = array(
		'event_start_after' => 'today',
		'bp_group'          => bp_get_current_group_id(),
		'numberposts'       => 5,
	);

	$events = eo_get_events( $args );

	$menu_items = calendar_submenu();

	ob_start();
	include locate_template( 'parts/sidebar/activity-events-feed.php' );
	$events_out .= ob_get_clean();

	return $events_out;
}

/*
*removes openlab_modify_options_nav defined in openlab-theme/lib/menu from the bp_screens action hook, so we can hook an updated one
*/
function remove_modify_options_nav() { 
        remove_action( 'bp_screens', 'openlab_modify_options_nav', 1 );
}
add_action( 'init', 'remove_modify_options_nav' );

/**yanked from openlab_modify_options_nav of openlab-theme/lib/menus.php
 *replaces the removed openlab_modify_options_nav, renaming 'Docs' to 'Posts' in the group profile submenu
 */
function modify_options_nav() {
	if ( bp_is_group() && ! bp_is_group_create() ) {
		$group_type = cboxol_get_group_group_type( bp_get_current_group_id() );
		if ( ! is_wp_error( $group_type ) ) {
			buddypress()->groups->nav->edit_nav(
				array(
					'name' => $group_type->get_label( 'group_home' ),
				),
				'home',
				bp_get_current_group_slug()
			);
		}

		if ( cboxol_is_portfolio() ) {
			// Keep the following tabs as-is
			$keepers   = array( 'home', 'admin', 'members' );
			$nav_items = buddypress()->groups->nav->get_secondary( array( 'parent_slug' => bp_get_current_group_slug() ) );
			foreach ( $nav_items as $nav_item ) {
				if ( ! in_array( $nav_item->slug, $keepers, true ) ) {
					buddypress()->groups->nav->delete_nav( $nav_item->slug, bp_get_current_group_slug() );
				}
			}
		}
	}

	if ( bp_is_group() && ! bp_is_group_create() ) {
		buddypress()->groups->nav->edit_nav(
			array(
				'position' => 95,
			),
			'admin',
			bp_get_current_group_slug()
		);

		buddypress()->groups->nav->edit_nav(
			array(
				'name' => 'Settings',
			),
			'admin',
			bp_get_current_group_slug()
		);

		$files_item = buddypress()->groups->nav->get_secondary(
			array(
				'slug'        => 'documents',
				'parent_slug' => bp_get_current_group_slug(),
			)
		);

		if ( $files_item ) {
			$first_files_item = reset( $files_item );
			if ( preg_match( '/<span>([0-9]+)<\/span>/', $first_files_item['name'], $matches ) ) {
				$files_name = sprintf(
					/* translators: 1. count span */
					__( 'Files %1$s', 'commons-in-a-box' ),
					sprintf( '<span class="mol-count pull-right count-%d gray">%d</span>', $matches[1], $matches[1] )
				);
			} else {
				$files_name = __( 'Files', 'commons-in-a-box' );
			}

			buddypress()->groups->nav->edit_nav(
				array(
					'name' => $files_name,
				),
				'documents',
				bp_get_current_group_slug()
			);
		}

		$nav_items     = buddypress()->groups->nav->get_secondary( array( 'parent_slug' => bp_get_current_group_slug() ) );
		$current_group = groups_get_current_group();

		// Docs should have count.
		$doc_item = buddypress()->groups->nav->get_secondary(
			array(
				'slug'        => 'docs',
				'parent_slug' => bp_get_current_group_slug(),
			)
		);
		if ( $doc_item ) {
			$group_doc_count = openlab_get_group_doc_count( $current_group->id );
			$docs_name       = sprintf(
				/* translators: 1. count span */
				__( 'Posts %1$s', 'commons-in-a-box' ), /*replaces 'Docs' with 'Posts'*/
				sprintf( '<span class="mol-count pull-right count-%d gray">%d</span>', $group_doc_count, $group_doc_count )
			);
			buddypress()->groups->nav->edit_nav(
				array(
					'name' => $docs_name,
				),
				'docs',
				bp_get_current_group_slug()
			);
		}

		foreach ( $nav_items as $nav_item ) {

			if ( 'events' === $nav_item->slug ) {

				$new_option_args = array(
					'name'            => $nav_item->name,
					'slug'            => $nav_item->slug . '-mobile',
					'parent_slug'     => $nav_item->parent_slug,
					'parent_url'      => trailingslashit( bp_get_group_permalink( $current_group ) ),
					'link'            => trailingslashit( $nav_item->link ) . 'upcoming/',
					'position'        => intval( $nav_item->position ) + 1,
					'item_css_id'     => $nav_item->css_id . '-mobile',
					'screen_function' => $nav_item->screen_function,
					'user_has_access' => $nav_item->user_has_access,
					'no_access_url'   => $nav_item->no_access_url,
				);

				$status = bp_core_create_subnav_link( $new_option_args, 'groups' );
			}
		}
	}
}
add_action( 'bp_screens', 'modify_options_nav', 1 );

/*
 * yanked from openlab_site_footer of openlab-theme/functions.php
 * the purpose of this function is to do what openlab_site_footer does without hidding the go-to-top button
 */
function site_footer() {
	$footer = null;//get_site_transient( 'cboxol_network_footer' );

	if ( $footer ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $footer;
		return;
	}

	$left_heading   = get_theme_mod( 'openlab_footer_left_heading' );
	$left_content   = get_theme_mod( 'openlab_footer_left_content' );
	$middle_heading = get_theme_mod( 'openlab_footer_middle_heading' );
	$middle_content = get_theme_mod( 'openlab_footer_middle_content' );

        ob_start(); ?>

<div id="openlab-footer" class="oplb-bs page-table-row">
	<div class="oplb-bs">
		<div class="footer-wrapper">
			<div class="container-fluid footer-desktop">
				<div class="row row-footer">
                                        <div id="footer-left" class="footer-left footer-section col-md-10" style="">
                                                <h1 style="" id="footer-left-heading">DHSS Showcase</h1>
                                                <div style="">
                                                        <ul style="list-style:none;">
                                                                <li><a href="https://dhssatrit.cad.rit.edu/about/">About</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/about/contact-us/">Contact Us</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/about/terms-of-use/">Terms of Use</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/help/">Help</a></li>
                                                        </ul>
                                                </div>
                                                <div style="">
                                                        <ul style="list-style:none;">
                                                                <li><a href="https://dhssatrit.cad.rit.edu/groups/type/project/">Projects</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/groups/type/course/">Courses</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/members/">Members</a></li>
                                                                <li><a href="https://dhssatrit.cad.rit.edu/about/calendar/">Calendar</a></li>
                                                        </ul>
 
                                                </div>
					</div>

					<div id="footer-middle" class="footer-middle footer-section col-md-9" style="">
                                                <div class="cboxol-footer-logo">
                                                        <a href="https://www.rit.edu/liberalarts/"><img style="" src="<?php echo esc_attr( get_child_template_directory_uri() ); ?>/images/RIT_COLA_lockup.png" alt="RIT College of Liberal Arts lockup"/></a>
                                                </div>
					</div>

					<div id="footer-right" class="footer-right footer-section col-md-4">
						<div class="cboxol-footer-logo">
							<a href="https://commonsinabox.org/"><img style="" src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/cboxol-logo-noicon.png" alt="<?php esc_attr_e( 'CBOX-OL Logo', 'commons-in-a-box' ); ?>" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<a id="go-to-top" href="#"><span class="fa fa-chevron-circle-up"></span><br /><?php esc_html_e( 'top', 'commons-in-a-box' ); ?></a>
</div>

	<?php
	$footer = ob_get_contents();
	ob_end_clean();

	set_site_transient( 'cboxol_network_footer', $footer, DAY_IN_SECONDS );

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $footer;
}
/*
 * yanked from openlab_get_home_slider of openlab-theme/lib/media-funcs.php
 * the purpose of this function is to override that one (called in home.php)
 */
function get_home_slider() {
	$slider_mup    = '';
	$slider_sr_mup = '';

	$slider_args = array(
		'post_type'      => 'slider',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);

	$slider_query = new WP_Query( $slider_args );

	if ( $slider_query->have_posts() ) {
		$slider_mup    = '<div class="camera_wrap clearfix" tabindex="-1" aria-hidden="true">';
		$slider_sr_mup = '<div class="camera_wrap_sr" role="widget"><h2 class="sr-only">Slideshow Content</h2><ul class="list-unstyled">';
		while ( $slider_query->have_posts() ) :
			$slider_query->the_post();
			// if the featured image is not set, slider will not be added
			if ( get_post_thumbnail_id() ) {

				$img_obj = wp_get_attachment_image_src( get_post_thumbnail_id(), 'front-page-slider' );

				//$slider_mup    .= '<div data-alt="' . get_the_title() . '" data-src="' . $img_obj[0] . '"><div class="fadeIn camera_content"><h2 class="regular">' . get_the_title() . '</h2>' . get_the_content_with_formatting() . '</div></div>';
				//$slider_sr_mup .= '<li class="sr-only sr-only-focusable camera_content" tabindex="0"><h2 class="regular">' . get_the_title() . '</h2>' . get_the_content_with_formatting() . '</li>';

                                $slider_mup    .= '<div data-alt="' . get_the_title() . '" data-src="' . $img_obj[0] . '"></div>';
				$slider_sr_mup .= '<li class="sr-only sr-only-focusable camera_content" tabindex="0"><h2 class="regular">' . get_the_title() . '</h2>' . get_the_content_with_formatting() . '</li>';
			}
		endwhile;
		$slider_mup    .= '</div>';
		$slider_sr_mup .= '</ul></div>';
	} else {
		$slider_mup .= '<div class="slider-empty">' . esc_html__( 'You haven\'t added any slides yet!', 'commons-in-a-box' ) . '</div>';
	}

	wp_reset_postdata();

	return $slider_mup . $slider_sr_mup;
}

/*
 * yanked from openlab_help_loop of openlab-theme/lib/help-funcs.php
 * the purpose of this function is to replace openlab_help_loop
 */
function help_loop() {
	global $paged, $post;

	$post_id  = get_the_ID();
	$hp_query = new WP_Query(
		array(
			'post_type' => 'help',
			'p'         => $post_id,
		)
        );  

       	while ( $hp_query->have_posts() ) :
		$hp_query->the_post();
                ?>

		<?php 
		$help_cats = get_the_terms( $post_id, 'help_category' );

		if ( ! empty( $help_cats ) ) {
                
				sort( $help_cats );

			if ( 0 === $help_cats[0]->parent ) {
				$parent_cat_name = $help_cats[0]->name;
				$parent_cat      = $help_cats[0];
			} else {
				$parent_cat      = get_term( $help_cats[0]->parent, 'help_category' );
				$parent_cat_name = $parent_cat->name;
			}
		}

		$back_next_nav = '';

		$prev_post = get_adjacent_post( false, '', true );
		$next_post = get_adjacent_post( false, '', false );

		$back_next_nav .= '<nav id="help-title-nav"><!--';

		if ( $prev_post ) {
			$back_next_nav .= '--><span class="nav-previous">';
			$back_next_nav .= '<span class="fa fa-chevron-circle-left"></span>';
			$back_next_nav .= sprintf( '<a href="%s">Back</a>', esc_url( get_permalink( $prev_post ) ) );
			$back_next_nav .= '</span><!--';
		}

		if ( $next_post ) {
			$back_next_nav .= '--><span class="nav-previous">';
			$back_next_nav .= sprintf( '<a href="%s">Next</a>', esc_url( get_permalink( $next_post ) ) );
			$back_next_nav .= '<span class="nav-next fa fa-chevron-circle-right"></span>';
			$back_next_nav .= '</span><!--';
		}

		$back_next_nav .= '--></nav><!-- #nav-single -->';

		?>

		<?php if ( $help_cats ) : ?>
			<div class="entry-title">
				<h1 class="help-entry-title"><a class="no-deco" href="<?php echo esc_attr( get_term_link( $parent_cat ) ); ?>"><span class="profile-name hyphenate"><?php echo esc_html( $parent_cat_name ); ?></span></a>
				</h1>

				<div class="directory-title-meta">
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo openlab_toggle_button( '#sidebar-menu-wrapper', true ); ?>
					<span class="print-link pull-right hidden-xs"><a class="print-page" href="#"><span class="fa fa-print"></span> <?php esc_html_e( 'Print this page', 'commons-in-a-box' ); ?></a></span>
				</div>
			</div>

			<?php
			$nav_links = array(
				'<span class="page-title">' . get_the_title() . '</span>',
				$back_next_nav,
			);

			$this_term = openlab_get_primary_help_term_name();
			if ( 0 !== $this_term->parent ) {
				$nav_links = array_merge( array( '<a class="regular" href="' . get_term_link( $this_term ) . '">' . esc_html( $this_term->name ) . '</a>' ), $nav_links );
			}

			?>

			<div class="row help-nav">
				<div class="col-md-24">
					<div class="submenu">
						<div class="submenu-text pull-left bold"><?php esc_html_e( 'Topics:', 'commons-in-a-box' ); ?></div>
						<ul class="nav nav-inline">
							<?php foreach ( $nav_links as $nav_link ) : ?>
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<li><?php echo $nav_link; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

		<?php elseif ( 'dhss-showcase-help' === $post->post_name ) : ?>
			<div class="entry-title">
				<h1><span class="profile-name hyphenate"><?php the_title(); ?></span></h1>

				<div class="directory-title-meta">
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo openlab_toggle_button( '#sidebar-menu-wrapper', true ); ?>
				</div>
			</div>

			<div id="help-title"><h2 class="page-title"><?php esc_html_e( 'Do you have a question? You\'re in the right place!', 'commons-in-a-box' ); ?></h2></div>
		<?php else : ?>
			<div class="entry-title">
				<h1><span class="profile-name hyphenate"><?php the_title(); ?></span></h1>

				<div class="directory-title-meta">
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo openlab_toggle_button( '#sidebar-menu-wrapper', true ); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php echo ( 'dhss-showcase-help' === $post->post_name || 'contact-us' === $post->post_name ? '' : openlab_get_help_tag_list( $post_id ) ); ?>
		</div>

		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php echo ( 'dhss-showcase-help' === $post->post_name || 'contact-us' === $post->post_name ? '' : openlab_help_navigation() ); ?>

	<?php endwhile; // end of the loop. ?>
<?php }

/*
 * yanked from openlab_help_cats_loop of openlab-theme/lib/help-funcs.php
 * the purpose of this function is to remove double line from help categories' pages and include the name of the category / categories after "Topic: "
 */
function help_cats_loop() {
	?>

	<div id="help-top"></div>

	<?php
	// first display the parent category
	$parent_cat_name = single_term_title( '', false );
	$term            = get_query_var( 'term' );
	$parent_term     = get_term_by( 'slug', $term, 'help_category' );

	$args = array(
		'tax_query'      => array(
			array(
				'taxonomy'         => 'help_category',
				'field'            => 'slug',
				'include_children' => false,
				'terms'            => array( $parent_term->slug ),
				'operator'         => 'IN',
			),
		),
		'post_type'      => 'help',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'posts_per_page' => '-1',
	);

	$help_query = new WP_Query( $args );
	?>

	<?php if ( 0 === $parent_term->parent ) : ?>
		<div class="entry-title">
			<h1 class="parent-cat"><span class="profile-name hyphenate"><?php echo esc_html( $parent_cat_name ); ?></span></h1>

			<div class="directory-title-meta">
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo openlab_toggle_button( '#sidebar-menu-wrapper', true ); ?>
			</div>
		</div>

	        <div id="help-title">
                        <h2 class="page-title clearfix submenu">
                                <div class="submenu-text pull-left bold"><?php esc_html_e( 'Topics:', 'commons-in-a-box' ); ?></div><span><?php echo esc_html( $parent_term->name ); ?></span>
                        </h2>
	        </div>
		<?php
	else :
		$head_term = get_term_by( 'id', $parent_term->parent, 'help_category' );
		?>
		<div class="entry-title">
			<h1 class="parent-cat"><a class="no-deco" href="<?php echo esc_attr( get_term_link( $head_term ) ); ?>"><span class="profile-name hyphenate"><?php echo esc_html( $head_term->name ); ?></span></a></h1>

			<div class="directory-title-meta">
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo openlab_toggle_button( '#sidebar-menu-wrapper', true ); ?>
			</div>
		</div>

	        <div id="help-title">
		        <h2 class="page-title clearfix submenu">
				<div class="submenu-text pull-left bold"><?php esc_html_e( 'Topics:', 'commons-in-a-box' ); ?> </div><span><?php echo esc_html( $parent_term->name ); ?></span>
			</h2>
	        </div>
		<?php
	endif;
	?>

	<?php if ( $help_query->have_posts() ) : ?>
	<div>
		<div class="child-cat-container help-cat-block">
			<h2 class="child-cat child-cat-num-0"><?php echo esc_html( $parent_cat_name ); ?></h2>
		<ul>
		<?php
		while ( $help_query->have_posts() ) :
			$help_query->the_post();

			$post_id = get_the_ID();
			?>
		<li>
			<h3 class="help-title no-margin no-margin-bottom"><a href="<?php echo esc_attr( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
			<div class="help-tags"><?php esc_html_e( 'Tags:', 'commons-in-a-box' ); ?> <?php echo get_the_term_list( $post_id, 'help_tags', '', ', ', '' ); ?></div>
		</li>

			<?php
		endwhile; // end of the loop.
		$help_query->reset_postdata();
		?>
		</ul>
	</div>
	</div>
	<?php endif; ?>

	<?php
	// Now get child cats and sort into two arrays for the two columns.
	$child_cats  = get_categories(
		array(
			'child_of' => $parent_term->term_id,
			'taxonomy' => 'help_category',
		)
	);
	$cols        = array(
		'left'  => array(),
		'right' => array(),
	);
	$current_col = 'left';
	foreach ( $child_cats as $child_cat ) {
		$cols[ $current_col ][] = $child_cat;
		$current_col            = 'left' === $current_col ? 'right' : 'left';
	}

	$count = 0;

	foreach ( $cols as $col_name => $col_cats ) {
		echo '<div>';
		foreach ( $col_cats as $child ) {
			$child_cat_id = $child->cat_ID;
			echo '<div class="child-cat-container child-cat-container-' . intval( $child_cat_id ) . '">';
			echo '<h2 class="child-cat child-cat-num-' . esc_attr( $count ) . '"><a href="' . esc_attr( get_term_link( $child ) ) . '">' . esc_html( $child->name ) . '</a></h2>';

			$args = array(
				'tax_query'      => array(
					array(
						'taxonomy'         => 'help_category',
						'field'            => 'slug',
						'include_children' => false,
						'terms'            => array( $child->slug ),
						'operator'         => 'IN',
					),
				),
				'post_type'      => 'help',
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'posts_per_page' => '-1',
			);

			$child_query = new WP_Query( $args );

			echo '<ul>';
			while ( $child_query->have_posts() ) :
				$child_query->the_post();
				?>
				<li>
				<h3 class="help-title no-margin no-margin-bottom"><a href="<?php echo esc_attr( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
				<div class="help-tags">Tags: <?php echo get_the_term_list( $post_id, 'help_tags', '', ', ', '' ); ?></div>
				</li>
				<?php
		endwhile; // end of the loop.
			echo '</ul>';
			$child_query->reset_postdata();
			?>

			<?php
			$count++;
			echo '</div>';
		}//ecnd child_cats for each
		echo '</div>';
	}
	?>

	<div style="clear:both;"></div>

	<a class="pull-right" href="#help-top">Go To Top <span class="fa fa-angle-up"></span></a>

	<?php
}
?>
