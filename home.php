<?php use Roots\Sage\Extras; ?>

<?php if( !is_paged() ): ?>
<!-- BEGIN FEATURED VIDEOS SECTION -->
<section class="f-video-section homepage">
	<div class="container-fluid">
		<div class="row">
			<!-- VID 1 -->
			<div class="f-video col-sm-12 col-md-6 p-0">
				<a href="https://www.youtube.com/embed/cZaJYDPY-YQ" class="f-video__thumb various fancybox">
					<img src="http://pentzero.dev/app/uploads/2017/09/When-all-my-old-friends-call-to-tell-me-theyre-married-w-kids-now.jpg" class="video_lightbox_anchor_image" />
					<div class="f-video__overlay">
						<div class="f-video__overlay__body-content">
							<div class="f-video__overlay__header">
								<div class="f-video__tag"><p>Featured video<p></div>
							</div>
							<div class="f-video__overlay__footer">
								<div class="f-video__icon"><span class="fa fa-play"></span></div>
								<div class="f-video__title-wrap">
									<h3 class="f-video__title">I Don't Fuck With You (Explicit) ft. E-40</h3>
									<p class="f-video__byline">Big Sean</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- VID 2 -->
			<div class="f-video col-sm-12 col-md-6 p-0">
				<a href="https://www.youtube.com/embed/PEGccV-NOm8" class="f-video__thumb various fancybox">
					<img src="http://pentzero.dev/app/uploads/2017/10/cardi-b-bodak-cover.png" class="video_lightbox_anchor_image" />
					<div class="f-video__overlay">
						<div class="f-video__overlay__body-content">
							<div class="f-video__overlay__header">
								<div class="f-video__tag"><p>Featured video<p></div>
							</div>
							<div class="f-video__overlay__footer">
								<div class="f-video__icon"><span class="fa fa-play"></span></div>
								<div class="f-video__title-wrap">
									<h3 class="f-video__title">Bodak Yellow</h3>
									<p class="f-video__byline">Cardi B</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section> <!-- END FEATURED VIDEOS SECTION -->

<?php 
$postsQuery = new WP_Query( array( 
	'posts_per_page' => 3,
	'post_type' => array('video', 'gallery', 'article'),
	'meta_key' => 'feature_on_home',
	'meta_value' => '1'
	) );
?>

<?php if($postsQuery->have_posts() ): $i = 0; ?>
<div id="f-posts-section" class="f-posts-section">
	<div class="f-posts-section__wrapper">
		<div class="f-posts-section__title-wrapper"><h2 class="f-posts-section__title"><span>Featured</span> Posts</p></h2></div>
		<div class="container-fluid p-0">
			<ul class="global__list-reset b-posts-list row gutter-20">
			<?php while($postsQuery->have_posts() ) : $postsQuery->the_post(); ?>
				<li class="b-posts-list__item col-sm-12 col-md-4 col-lg-4"> 
					<?php get_template_part('templates/content-featured' ); // Output posts ?>
				</li>
			<? $i++; endwhile; ?>
			</ul>
		</div>
	</div>
</div>
<? else: echo 'no posts found.'; endif; ?>

<?php endif; // End page is 1 ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php 
else: 
$i = 0; $bannerad_count = 0; $has_sidebar_ad = false;

while ( have_posts() ): the_post();
	$widget_interval = 15; // Set ad display interval
	$col_lg = 4; // Column size for post links on large desktop screens
	$col_md = 4; // Column size for post links on small dekstop screens and tablets
	$col_sm = 12; // Column size for post links on mobile devices

	if($i % $widget_interval === 0): // Create new section 
?>
	<section class="post-links-section">
		<?php if($i == 0): 	// Add section title at start of loop ?>
		<h3 class="post-links-section__title"><span><span class="highlight"><?php if (! is_paged() ):?>Latest<? else: ?>More<? endif; ?></span> Posts</span></h3>
		<?php endif; ?>
		
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-lg-9 col-md-12">
					<ul class="global__list-reset b-posts-list row gutter-40">
	<?php endif; ?>
						<li class="b-posts-list__item col-sm-<? echo $col_sm ?> col-md-<? echo $col_md; ?> col-lg-<? echo $col_lg; ?>"> 
							<?php get_template_part('templates/content', get_post_format() ); // Output posts ?>
						</li>
	<?php if( ($i + 1) % $widget_interval === 0): // Close the section  ?>
					</ul>
				</div>
				<?php if(!$has_sidebar_ad): // Display fixed sidebar ad ?>
					<aside class="post-links-section__sidebar col-lg-3 hidden-md-down">
			      	<?php dynamic_sidebar('sidebar-primary'); ?>
			      	</aside>
			  		<?php $has_sidebar_ad = true; ?>
				<?php endif; ?>
			</div>
		</div>
	</section> <!-- End of post links section -->					   
	<?php 
	$sidebar_elements = Extras\get_sidebar_elements("banner-ads__home");
	if (!empty($sidebar_elements)):
		echo $sidebar_elements[$bannerad_count]; 
		$bannerad_count++;
		// Restart after the last widget
		if ($bannerad_count == count($sidebar_elements)):
			$bannerad_count = 0;
		endif;
	endif;
	?>
	<?php endif; // end close section if statement ?>

<?php $i++; endwhile; ?>

<?php /*
elseif( $wp_query->max_num_pages == get_query_var('paged') ):
	// Closing tags for a last page section with less number of posts {widget_interval} 
	if(($wp_query->current_post + 1) == ($wp_query->post_count) && ($i + 1) % $widget_interval != 0 ): ?>
		</ul>
	</div>
		<?php 
		if (!$has_sidebar_ad): // Output fixed sidebar ad
		     echo $fixed_sidebar_ad_home['before_widget']; 
		       dynamic_sidebar('sidebar-primary'); 
		     echo $fixed_sidebar_ad_home['after_widget'];
			 $has_sidebar_ad = true;
		endif; 
		?>
		</div>
	</section> <!-- End of blog posts section -->	
		<?php 
	endif; 
endif; 
*/ ?>

<?php global $wp_query; ?>
	<?php if($wp_query->max_num_pages > 1): // Display pagination if number of pages is > 1 ?>	
		<div class="d-flex" id="pagination">
			<div class="col-sm-12 text-center">
				<?php 
				echo paginate_links( array(
					'total' => $wp_query->max_num_pages,
					) ); 
				wp_reset_postdata();
				?>
			</div>
		</div>
	<? endif; ?>
<? endif; ?>