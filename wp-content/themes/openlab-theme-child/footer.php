<!-- the purpose of this file is to remove an instance of the navigation menu from the footer -->
<!-- the purpose of this file is to show the go-to-top button for "desktop" viewing in addition to "mobile" and "tablet" viewing -->
<?php
/**
* footer template
*
*/ ?>
					</div><!--end .container-->

					<?php do_action( 'bp_after_container' ); ?>

                                        <?php remove_action ( 'bp_before_footer', 'openlab_footer_bar', 6 ); /*this does 1*/ ?>

					<?php do_action( 'bp_before_footer' ); ?>

					<?php do_action( 'bp_footer' ); ?>

					<?php do_action( 'bp_after_footer' ); ?>

					</div><!--.page-table-row-->

					<?php site_footer(); //openlab_site_footer(); /*this does 2*/?>

					<?php wp_footer(); ?>

				</div><!--.page-table-->

	</body>

</html>
