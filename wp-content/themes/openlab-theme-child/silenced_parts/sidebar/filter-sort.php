<!-- copied from openlab-theme/parts/sidebar/filter-sort.php -->
<!-- the purpose of this file is to override the previous file to add a randomizing sorting option to the search feature of the site -->
<?php
$option_value = openlab_get_current_filter( 'sort' );
?>
<div class="custom-select">
	<label for="sequence-select" class="sr-only"><?php echo esc_html_e( 'Select: Order', 'commons-in-a-box' ); ?></label>
	<select name="sort" class="last-select" id="sequence-select">
                <option <?php selected( $option_value, 'active' ); ?> value='active'><?php esc_html_e( 'Last Active', 'commons-in-a-box' ); ?></option>
		<option <?php selected( $option_value, 'alphabetical' ); ?> value='alphabetical'><?php esc_html_e( 'Alphabetical', 'commons-in-a-box' ); ?></option>
		<option <?php selected( $option_value, 'newest' ); ?>  value='newest'><?php esc_html_e( 'Newest', 'commons-in-a-box' ); ?></option>	
                <option <?php selected( $option_value, 'random' ); ?> value='random'><?php esc_html_e( 'Random', 'commons-in-a-box' ); ?></option> <!-- this does that -->
	</select>
</div>
