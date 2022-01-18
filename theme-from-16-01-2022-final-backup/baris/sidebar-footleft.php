<?php
	if ( is_active_sidebar( 'left-foot-widget-area' ) ) : ?>

			<div class="sidebar-foot-left">
				<?php dynamic_sidebar( 'left-foot-widget-area' ); ?>
			</div>

<?php endif; ?>