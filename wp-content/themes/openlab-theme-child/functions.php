<?php
/* functions.php
 *
 * the purpose of this file to define functions needed by the OpenLab Child Theme.
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */

/* prefix_print_script_handle
 *
 * prints the handles of all registered scripts that load on a page
 * to the top of the page.
 *
 * @sourced from https://gist.github.com/robneu/8291089
 *
 * @author robneu
 * */
/*function prefix_print_script_handles() {
	global $wp_scripts;
	// Loop through and display all script handles.
	foreach( $wp_scripts->queue as $handle ) {
		echo $handle . ' | ';
	}
}
add_action( 'wp_print_scripts', 'prefix_print_script_handles' );*/

/* get_child_url
 *
 * @return the @link of the website, https://dhssatrit.cad.rit.edu/.
 *
 * @author Kadin Benjamin ktb1193
 * */
function get_child_url() {
        return 'https://dhssatrit.cad.rit.edu/';
}

/* get_child_template_directory_uri
 * 
 * @return the @link of the OpenLab Child Theme template directory,
 * https://dhssatrit.cad.rit.edu/wp-content/themes/openlab-theme-child/.
 *
 * @author Kadin Benjamin ktb1193
 * */
function get_child_template_directory_uri() {
        return get_child_url() . 'wp-content/themes/openlab-theme-child/';
}

/* my_theme_enqueue_styles
 *
 * - registers openlab-theme-child/style.css.
 * - loads openlab-theme-child/style.css after openlab-theme css.
 * - loads openlab-theme-child/js/openlab-theme-child.js.
 * - unloads openlab-theme/js/directory.js
 * - loads openlab-theme-child/js/directory.js
 *
 * @author Kadin Benjamin ktb1193
 * */
function my_theme_enqueue_scripts_n_styles() {
        wp_register_style( 'child-style', get_stylesheet_uri(), array( 'main-styles' ), wp_get_theme()->get('Version') );
        wp_enqueue_style( 'child-style' );
        wp_enqueue_script( 'my_script', get_stylesheet_directory_uri() . '/js/openlab-theme-child.js' );
        wp_dequeue_script( 'openlab-directory' );
        wp_deregister_script( 'openlab-directory' );
        //wp_register_script( 'openlab-child-directory', get_child_template_directory_uri() . 'js/child-directory.js', [ 'jquery' ], 1, true );
        //wp_enqueue_script( 'openlab-child-directory' );
} add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts_n_styles', 99 );

/* site_footer
 *
 * creates the footer for the site.
 *
 * @sourced from openlab_site_footer of openlab-theme/functions.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
function site_footer() {
        $footer = null;//get_site_transient( 'cboxol_network_footer' );

	if ( $footer ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $footer;
		return;
        }

	ob_start(); ?>

        <div id="openlab-footer" class="oplb-bs page-table-row">
                <div class="oplb-bs">
                        <div class="footer-wrapper">
                                <div class="container-fluid footer-desktop">
                                        <div class="row row-footer">
                                                <div id="footer-left" class="footer-left footer-section col-md-10">
                                                        <img src="https://dhssatrit.cad.rit.edu/wp-content/uploads/2021/03/cropped-DHSS_horizontal_logo-e1643637904315.png" alt="RIT DHSS logo"/>
                                                        <p>The DHSS Showcase is a living archive of the Digital Humanities and Social Sciences BS at RIT. Thank you for visiting :)
                                                        </p>
                                                </div>

                                                <div id="footer-middle" class="footer-middle footer-section col-md-10">
                                                        <div id="footer-middle-left">
                                                                <h1>Support</h1>
                                                                <ul> 
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/blog/help/dhss-showcase-help/">Help</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/about/contact-us/">Contact Us</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/about/terms-of-use/">Terms of Use</a></li> 
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/privacy-policy/">Privacy Policy</a></li>
                                                                </ul>
                                                        </div>
                                                        <div id="footer-middle-right">
                                                                <h1>DHSS</h1>
                                                                <ul>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/about/">About</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/groups/type/project/">Projects</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/groups/type/course/">Courses</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/members/">Members</a></li>
                                                                        <li><a href="https://dhssatrit.cad.rit.edu/groups/type/club">Tools</a></li>
                                                                        <!-- <li><a href="https://dhssatrit.cad.rit.edu/about/calendar/">Calendar</a></li> -->
                                                                        <li><a href="https://dhssatirt.cad.rit.edu/subplans/">Subplans</a></li>
                                                                </ul> 
                                                        </div>
                                                </div>

                                                <div id="footer-right" class="footer-right footer-section col-md-4">
                                                        <div class="cboxol-footer-logo">
                                                                <a href="https://commonsinabox.org/"><img style="" src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/cboxol-logo-noicon.png" alt="<?php esc_attr_e( 'CBOX-OL Logo', 'commons-in-a-box' ); ?>" /></a>
                                                        </div>
                                                        <div class="cboxol-footer-logo">
                                                                <a href="https://www.rit.edu/liberalarts/"><img style="max-width: 300px;" src="<?php echo esc_attr( get_child_template_directory_uri() ); ?>/images/RIT_COLA_lockup.png" alt="RIT College of Liberal Arts lockup"/></a>
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

/* help_loop
 *
 * the purpose of help_loop is to define the navigation and update cycles of the help section.
 *
 * @sourced from openlab_help_loop of openlab-theme/lib/help-funcs.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
/*function help_loop() {
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

        <?php endwhile; // end of the loop.
}*/

/* help_cats_loop
 *
 * the purpose of help_cats_loop is to define the help navigation and categorization.
 *
 * @sourced from openlab_help_cats_loop of openlab-theme/lib/help-funcs.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
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
