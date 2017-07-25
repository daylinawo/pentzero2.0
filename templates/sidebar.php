<?php
if ( is_singular( array('videos', 'gallery') ) ){
		echo '<div id="posts-sidebar" class="widgets-area">';
			  dynamic_sidebar('sidebar-latest');
			  dynamic_sidebar('sidebar-recommend'); 
			  dynamic_sidebar('sidebar-blog');
		echo '</div>';
}
?>