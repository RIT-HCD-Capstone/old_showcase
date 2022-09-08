<!-- yanked from openlab-theme/lib/widgets/group-type.php -->
<!-- the purpose of this file is to help override the definitions provided in that file by providing new definitions, integrate by functions.php -->
<?php

class OpenLab_Child_Group_Type_Widget extends WP_Widget {
	protected $group_type = null;

	public function __construct() {
		$this->default_args = array(
			'title'      => '',
			'group_type' => '',
		);

		parent::__construct(
			'openlab_group_type',
			__( 'Group Type', 'commons-in-a-box' ),
			array(
				'description' => __( 'Displays recently active groups of a specific Group Type', 'commons-in-a-box' ),
			)
		);
	}

	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundInExtendedClassBeforeLastUsed
	public function widget( $args, $instance ) {
               	$r = array_merge( $this->default_args, $instance );

		if ( ! bp_is_active( 'groups' ) ) {
			return;
		}

		$i = 1;

		$type = cboxol_get_group_type( $r['group_type'] );
		if ( is_wp_error( $type ) ) {
			return;
		}

		$groups_args = array(
			'max'         => 9,
			'type'        => 'random',
			'user_id'     => 0,
			'show_hidden' => false,
			'group_type'  => $type->get_slug(),
		);

		ob_start();

		?>
                <!-- <div class="col-sm-16 activity-list <?php //echo esc_attr( $type->get_slug() ); ?>-list"> -->
                <div class="activity-list" style="">
        		<div class="activity-wrapper">
				<div class="title-wrapper">
                                        <h2 class="title activity-title">
                                                <a class="no-deco" href="<?php echo esc_attr( bp_get_group_type_directory_permalink( $type->get_slug() ) ); ?>"><?php echo esc_html( $r['title'] ); ?>
                                                        <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
                                                </a>
                                        </h2>
				</div><!--title-wrapper-->

				<?php if ( bp_has_groups( $groups_args ) ) : ?>
					<?php
					global $groups_template;
					while ( bp_groups() ) :
						bp_the_group();
						$group = $groups_template->group;

						$activity = stripslashes( $group->description );

						$group_avatar = bp_core_fetch_avatar(
							array(
								'item_id' => $group->id,
								'object'  => 'group',
								'type'    => 'full',
								'html'    => false,
							)
						);

						?>

                                                <!-- <div class="box-1 row-<?php //echo esc_attr( $i ); ?> activity-item type-<?php //echo esc_attr( $type->get_slug() ); ?>"> -->
                                                <style>
                                                        .prjct {
                                                                border-style: solid;
                                                                border-width: 1px;
                                                                border-color: rgb(221,221,221);
                                                                max-width: 30%;
                                                                margin: 0px 6px 12px 6px;
                                                        }
                                                </style>
                                                <div class="group-item col-xs-12 box-1 prjct">
							<div class="item-avatar">
								<a href="<?php bp_group_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_attr( $group_avatar ); ?>" alt="<?php echo esc_attr( $group->name ); ?>"/></a>
							</div>

							<div class="item-content-wrapper">
								<h4 class="group-title overflow-hidden">
									<a class="no-deco truncate-on-the-fly hyphenate" style="white-space: nowrap; overflow: hidden; font-size: 70%;" href="<?php echo esc_attr( bp_get_group_permalink() ); ?>" data-basevalue="25" data-minvalue="15" data-basewidth="145"><?php echo esc_html( bp_get_group_name() ); ?></a>
									<span class="original-copy hidden"><?php echo esc_html( bp_get_group_name() ); ?></span>
								</h4>

							</div><!-- .item-content-wrapper -->
						</div>
						<?php $i++; ?>

					<?php endwhile; ?>
				<?php else : ?>
					<p class="group-widget-empty"><?php esc_html_e( 'Nothing to show.', 'commons-in-a-box' ); ?></p>
				<?php endif; ?>
			</div>
		</div><!--activity-list-->
		<?php

		$html = ob_get_clean();

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $html;
	}

	public function form( $instance ) {
		$r = array_merge( $this->default_args, $instance );

		$group_types = cboxol_get_group_types();

		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'commons-in-a-box' ); ?> <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $r['title'] ); ?>" style="width: 100%" /></label></p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'group_type' ) ); ?>"><?php esc_html_e( 'Group Type:', 'commons-in-a-box' ); ?>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'group_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'group_type' ) ); ?>" style="width: 100%">
					<option value="" <?php selected( ! $r['group_type'] ); ?>><?php esc_html_e( '- Select Group Type -', 'commons-in-a-box' ); ?></option>

					<?php foreach ( $group_types as $group_type ) : ?>
						<option value="<?php echo esc_attr( $group_type->get_slug() ); ?>" <?php selected( $r['group_type'], $group_type->get_slug() ); ?>><?php echo esc_html( $group_type->get_label( 'plural' ) ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</p>
		<?php
	}

	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundInExtendedClassAfterLastUsed
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
