<?php if ( is_singular( array('videos', 'gallery') ) ): ?>
	<div id="posts-sidebar" class="widgets-area">
	<?php dynamic_sidebar('sidebar-recommend'); ?>
	</div>
<? endif; ?>