<?php
/* filter-group-type.php
 *
 * the purpose of this file is to model the group-type search filter.
 *
 * @overrides openlab-theme/parts/sidebar/filter-group-type.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */

$current_group_types = openlab_get_current_filter( 'group-types' );

?>

<div class="sidebar-filter sidebar-filter-group-type">
	<div class="form-group">
		<?php foreach ( cboxol_get_group_types() as $group_type ) : ?>
			<div class="sidebar-filter-checkbox">
				<label for="checkbox-group-type-<?php echo esc_attr( $group_type->get_slug() ); ?>">
                                        <input type="checkbox" name="group-types[]" class="group-type-checkbox"
                                                id="checkbox-group-type-<?php echo esc_attr( $group_type->get_slug() ); ?>" 
                                                <?php checked( in_array( $group_type->get_slug(), $current_group_types, true ) ); ?> 
                                                value="<?php echo esc_attr( $group_type->get_slug() ); ?>" /> <?php echo esc_html( $group_type->get_name() ); ?>
				</label>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="custom-select">
        <label for="bp-group-type-select" class="sr-only"><?php echo esc_html_e( 'Select: Group Type', 'commons-in-a-box' ); ?></label>
        <select name="group-types[]" class="last-select" id="bp-group-type-select" multiple="multiple">
                <option value="type_all" <?php selected( 'type-all', $current_group_types ); ?>><?php esc_html_e('All', 'commons-in-a-box' ); ?></option>
                <?php foreach ( cboxol_get_group_types() as $group_type ): ?>
                        <option <?php selected( $current_group_types, $group_type->get_slug() ); ?> value="<?php echo esc_attr( $group_type->get_slug() ); ?>"><?php echo esc_html( $group_type->get_name() ); ?></option>
                <?php endforeach; ?>
        </select>
</div>
