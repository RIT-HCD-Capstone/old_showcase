<div class="calendar-wrapper action-events">
        <div id="item-body">
                <div class="submenu submenu-sitewide-calendar">
			<div class="submenu-text pull-left bold">Calendar:</div>
			<ul class="nav nav-inline">
				<?php foreach ( $menu_items as $item ) : ?>
					<li class="<?php echo esc_attr( $item['class'] ); ?>" id="<?php echo esc_attr( $item['slug'] ); ?>-groups-li"><a href="<?php echo esc_attr( $item['link'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
                
                <?php esc_html_e(
                        'You can use the following form to suggest DHSS events or that existing events be ' .
                        'represented on this site. If you are a member of a project or course profile admin, ' .
                        'then you can create related events from your project profile.'
                ); ?> 
                <?php echo do_shortcode( '[forminator_form id="602"]' ); ?>
        </div>
</div>
