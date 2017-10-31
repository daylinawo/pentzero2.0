<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>

<?php if (have_posts()):?>
<h3 class="sidebar-related-posts__title">More Posts Like This</h3>
<div class="sidebar-related-posts__list">
	<ol class="global__list-reset b-posts-list b-posts-list--related-posts">
		<?php while (have_posts()) : the_post(); 
			$the_post_type = get_post_type();
			$icon = "";
			if($the_post_type == "videos"):
			  $icon = "play";
			elseif ($the_post_type == "gallery"):
			  $icon = "clone";
			endif;
		?>
			<li class="b-posts-list__item">
				<article class="b-post b-post--related">    
					<a href="<?php the_permalink() ?>" class="b-post__link b-post__link--article" el="bookmark"></a>
					<div class="b-post__obj row">
						<!-- Thumb -->
						<div class="b-post__obj__header col-6 col-md-6">	
							<?php if (has_post_thumbnail()):?>
						 		<div class="b-post__thumb">	
									<? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
									<div class="b-post__thumb--icon"><span class="fa fa-<? echo $icon; ?>"></span></div>
						  		</div>
						  	<?php endif; ?>
						</div>
						<!-- Info -->
						<div class="b-post__obj__body col-6 col-md-6 pl-0">
						    <header class="b-post__header"> 
						    	<?php the_title('<p class="b-post__post-title">', '</p>'); ?> 
								<ul class="global__list-reset b-post__meta">
									<li class="b-post__meta-item b-post__meta-item--views"><span>615K views</span></li>
									<li class="b-post__meta-item b-post__meta-item--date"><span><?php echo meks_time_ago(); ?></span></li>
								</ul>
						    </header> 
						</div>
					</div>
				</article>
				<div class="clear"></div>
			</li>
		<?php endwhile; ?>
	</ol>
</div>
<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
