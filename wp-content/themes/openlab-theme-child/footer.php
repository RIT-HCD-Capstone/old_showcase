<?php
/* footer.php
 *
 * the purpose of this file is to define the structure of the site-wide footer.
 *
 * @overrides openlab-theme/footer.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */
?>
					</div><!--end .container-->

					<?php do_action( 'bp_after_container' ); ?>
					<?php do_action( 'bp_before_footer' ); ?>

					<?php do_action( 'bp_footer' ); ?>

					<?php do_action( 'bp_after_footer' ); ?>

					</div><!--.page-table-row-->

					<?php site_footer(); //function defined in functions.php ?>

					<?php wp_footer(); ?>

				</div><!--.page-table-->

	</body>

</html>
