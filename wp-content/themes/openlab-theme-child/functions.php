<?php
/* functions.php
 *
 * the purpose of this file to define functions needed by the OpenLab Child Theme.
 *
 * @author Kadin Benjamin ktb1193
 * */

/* get_child_url
 *
 * @return the @link of the website, https://dhssatrit.cad.rit.edu/.
 * */
function get_child_url() {
        return 'https://dhssatrit.cad.rit.edu/';
}

/* get_child_template_directory_uri
 * 
 * @return the @link of the OpenLab Child Theme template directory,
 * https://dhssatrit.cad.rit.edu/wp-content/themes/openlab-theme-child/.
 * */
function get_child_template_directory_uri() {
        return get_child_url() . 'wp-content/themes/openlab-theme-child/';
}

/* my_theme_enqueue_styles
 *
 * - registers openlab-theme-child/style.css.
 * - loads openlab-theme-child/style.css after openlab-theme css.
 * - loads openlab-theme-child/openlab-theme-child.js.
 * */
function my_theme_enqueue_styles() {
        wp_register_style( 'child-style', get_stylesheet_uri(), array( 'main-styles' ), wp_get_theme()->get('Version') );
        wp_enqueue_style( 'child-style' );
        wp_enqueue_script( 'my_script', get_stylesheet_directory_uri() . '/openlab-theme-child.js' );
} add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/* site_footer
 *
 * creates the footer for the site.
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
