<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/
use Roots\Sage\Extras;
 ?>

<?php if (have_posts()):?>
<h3 class="sidebar-related-posts__title">More Posts Like This</h3>
<div class="sidebar-related-posts__list">
	<ol class="global__list-reset b-posts-list b-posts-list--related-posts">
		<?php 
			while (have_posts()) : the_post(); 
			$post_type = get_post_type(); 
			$icon = Extras\get_post_type_icon($post_type);
		?>
			<li class="b-posts-list__item">
				<article class="b-post b-post--related">    
					<a href="<?php the_permalink() ?>" class="b-post__link b-post__link--article" el="bookmark"></a>
					<div class="b-post__obj row">
						<div class="b-post__obj__header col-6 col-md-6">	
							<?php if (has_post_thumbnail()):?>
						 		<div class="b-post__thumb">	
									<? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
									<div class="b-post__thumb--icon"><span class="fa <? echo $icon; ?>"></span></div>
						  		</div>
						  	<?php endif; ?>
						</div>
						<div class="b-post__obj__body col-6 col-md-6 pl-0">
						    <header class="b-post__header"> 
						    	<?php the_title('<p class="b-post__post-title">', '</p>'); ?> 
						    </header> 
						    <footer class="b-post__footer">
								<ul class="global__list-reset b-post__meta">
									<li class="b-post__meta-item b-post__meta-item--views"><span><? echo rand(100, 900);?>K views</span></li>
									<li class="b-post__meta-item b-post__meta-item--date"><span><?= get_the_date('d M Y'); ?></span></li>
								</ul>
						    </footer>
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
