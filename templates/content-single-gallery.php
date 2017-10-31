<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part('templates/post-nav'); ?>

	<div class="p-gallery">
		<div class="p-gallery__wrapper">
			<?php if( have_rows('slides') ): ?>
			<div id="slider" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			  	<?php $i = 0; while( have_rows('slides') ): the_row(); ?>
			    <li data-target="#slider" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0): ?>active<? endif; ?>"></li>
			    <?php $i++; endwhile; ?>
			  </ol>
			  <div class="carousel-inner" role="listbox">
			  	<?php $j = 0; while( have_rows('slides') ): the_row(); 
					// vars
					$image = get_sub_field('image');
					$caption = get_sub_field('caption');
				?>
			    <div class="carousel-item <? if($j == 0):?>active<? endif; ?>">
			    	<img src="<?php echo $image['url']; ?>" class="d-block img-fluid"  alt="<?php echo $image['alt'] ?>" />
			    </div>
			    <?php $j++; endwhile; ?>
			  </div>
			  <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			<?php endif; ?>
		    <?php dynamic_sidebar('sidebar-related-posts'); ?>
		</div>
	</div>

	<header class="p-header p-header--gallery">
		<div class="p-header__wrapper">
		  <div class="p-header__content">
		    <h2 class="p-header__title"><?php the_title(); ?></h2>
		    <h3 class="p-header__views">234,281 views</h3>
		    <?php get_template_part('templates/entry-meta'); ?>
		    <div class="clear"></div>
		    <?php echo do_shortcode('[ssba]'); ?> 
		  </div>
		</div>
	</header> <!-- end gallery header -->

	<div class="p-body p-body--gallery">
		<div class="p-body__wrapper">
			<div class="p-body__content">
		    	<?php the_field('description'); ?>
		  	</div>
		</div>
	</div> <!-- end post description --> 
    <?php get_template_part('templates/comments'); ?>

<?php endwhile; ?>
