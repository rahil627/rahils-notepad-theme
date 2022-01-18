<?php
	if ( is_active_sidebar( 'left-widget-area' ) ) : ?>

			<div class="sidebar-left">
				<?php dynamic_sidebar( 'left-widget-area' ); ?>
			</div>

<?php endif; ?>