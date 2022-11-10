<?php
/* filter-sort.php
 *
 * the puspose of filter-sort.php is to customize sorting filters.
 *
 * @overrides openlab-theme/parts/sidebar/filter-sort.php
 *
 * @author OpenLab Team
 * @author Kadin Benjamin ktb1193
 * */

$option_value = openlab_get_current_filter( 'sort' );
?>
<div class="custom-select">
	<label for="sequence-select" class="sr-only"><?php echo esc_html_e( 'Select: Order', 'commons-in-a-box' ); ?></label>
        <select name="sort" class="last-select" id="sequence-select"> 
                <option></option>
		<option <?php selected( $option_value, 'alphabetical' ); ?> value='alphabetical'><?php esc_html_e( 'Alphabetical', 'commons-in-a-box' ); ?></option>
                <option <?php selected( $option_value, 'active' ); ?> value='active'><?php esc_html_e( 'Last Active', 'commons-in-a-box' ); ?></option>
		<option <?php selected( $option_value, 'newest' ); ?> value='newest'><?php esc_html_e( 'Newest', 'commons-in-a-box' ); ?></option>	
                <!-- <option <?php //selected( $option_values, 'oldest' ); ?> value='oldest'><?php //esc_html_e( 'Oldest', 'commons-in-a-box' ); ?></option> -->
                <option <?php selected( $option_value, 'random' ); ?> value='random'><?php esc_html_e( 'Random', 'commons-in-a-box' ); ?></option>
	</select>
</div>
