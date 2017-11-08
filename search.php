<?php get_search_form(); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
<?php endif; ?>

<section class="b-posts-section searchpage">	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<ul class="global__list-reset b-posts-list row gutter-20">
					<?php while (have_posts()) : the_post(); ?>
						<li class="b-posts-list__item col-sm-12 col-md-4 col-lg-3">
							<?php get_template_part('templates/content', 'search'); ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</div><!-- end column -->
		</div><!-- end row -->
	</div><!-- end container -->
</section>

<?php the_posts_navigation(); ?>
