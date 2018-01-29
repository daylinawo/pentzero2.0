<?php get_template_part('templates/sidebar', 'trending'); ?>

<header class="a-header">
	<div class="a-header__wrapper">
		<div class="a-header__content">
		<?php $tag = get_the_category(); $tag = $tag[0]->cat_name; ?>
			<div class="a-header__tag"><? echo $tag; ?></div>
			<h2 class="a-header__title"><?php the_title(); ?></h2>
			<hr class="a-header__seperator" />
			<div class="a-header__views"><span class="fa fa-eye"></span><?php echo " ".number_format( rand(230000, 800000) );?></div>
			<div class="a-header__date"><time datetime="<?= get_post_time('c', true); ?>"><?= get_the_date('l jS F Y'); ?></time></div>
		<?php echo do_shortcode('[ssba]'); ?>
		</div>
	</div>
</header>
<div class="a-body">
	<div class="a-body__wrapper">
		<div class="a-body__content">
			<div class="a-body__img">
			<?php $image = get_field('headline_image'); if($image): ?>
				<img src="<?php echo $image['url'] ?>" class="a-body__img-item img-fluid" alt="<?php echo $image['alt']; ?>" />
			<?php endif; ?>
			</div>
			<?php  $content = get_field('article_content'); echo $content; ?>
			<aside class="a-body__ad"><img src="https://tpc.googlesyndication.com/simgad/1188358423122841238" width="300" height="250" /></aside>
		</div>
	</div>
</div>
<?php get_template_part('templates/comments'); ?>

