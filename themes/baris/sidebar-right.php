<?php
	if ( is_active_sidebar( 'right-widget-area' ) ) : ?>

			<div class="sidebar-right">
				<?php dynamic_sidebar( 'right-widget-area' ); ?>
			</div>

<?php endif; ?>