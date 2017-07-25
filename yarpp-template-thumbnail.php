<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()):

	$the_post_type = get_post_type();

?>
	<h2 class="psb-head">Recommended Posts</h2>
<ol class="recommended-posts">
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<a class="post-box" href="<?php the_permalink() ?>" el="bookmark" title="<?php the_title_attribute(); ?>">
			<?php if (has_post_thumbnail()):?>
				<div class="rpthumb">
					<?php the_post_thumbnail('yarpp-thumbnail'); ?>
					<? if($the_post_type == "videos"):?>
                  		<div class="overlay"><div class="thumb-icon"><span class="fa fa-play"></span></div></div>
          		  	<? elseif($the_post_type == "gallery"): ?>
                 		 <div class="overlay"><div class="thumb-icon"><span class="fa fa-camera"></span></div></div>
          		  	<? endif; ?>
				</div>
			<?php endif; ?>
			<h3 class="rp-title">

					<?php 
						if (strlen($post->post_title) > 45){
      				 		echo substr($post->post_title, 0, 45) . '...';
      					}
   				 		else{
      			 			the_title();
      			 		} 
      			 	?>
			</h3>
			<p class="m-0"><time class="updated"  datetime="<?= get_post_time('c', true); ?>"><?= get_the_date('d M Y'); ?></time></p>
			<div class="clear"></div>
			</a>
		</li>
	<?php endwhile; ?>
</ol>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
