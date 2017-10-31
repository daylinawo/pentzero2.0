<?php 
// IF PAGE IS 1
if( !is_paged() ):

$args = array(
	'post_type'  => 'featured_video',
	'posts_per_page' => 2 
	);

$loop = new WP_Query ($args);
?>
<!-- BEGIN FEATURED VIDEOS SECTION -->
<section class="b-featured-section homepage">
	<div class="container-fluid">
		<div class="row">
			<?php  while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="b-featured-video col-md-12 col-lg-6 p-0">
					<a rel="wp-video-lightbox" href="<? the_field('featured_video_url'); ?>" class="b-featured-video__thumb">
						<? the_post_thumbnail('full', array( 'class'  => 'video_lightbox_anchor_image' ) ); ?>
						<div class="b-featured-video__overlay">
							<div class="b-featured-video__overlay__body-content">
								<div class="b-featured-video__overlay__header">
									<div class="b-featured-video__tag"><p>Featured video<p></div>
								</div>
								<div class="b-featured-video__overlay__footer">
									<div class="b-featured-video__icon"><span class="fa fa-play"></span></div>
									<div class="b-featured-video__title-wrap">
										<h3 class="b-featured-video__title"><? the_title() ?></h3>
										<p class="b-featured-video__byline"><? the_field('featured_video_author'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section> <!-- END FEATURED VIDEOS SECTION -->
<?php endif ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<? else: ?>
<?php 
// Catch output of sidebar in string
	ob_start();
	dynamic_sidebar("banner-ads__home");
	$sidebar_output = ob_get_clean();

	// Create DOMDocument with string (and set encoding to utf-8)
	$dom = new DOMDocument;
	@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $sidebar_output);          		 

	// Get IDs of the elements in sidebar, e.g. "text-2"
	global $_wp_sidebars_widgets;
	$sidebar_element_ids = $_wp_sidebars_widgets["banner-ads__home"]; // Use ID of your sidebar
	// Save single widgets as html string in array
	$sidebar_elements = [];

	foreach ($sidebar_element_ids as $sidebar_element_id):
		// Get widget by ID
		$element = $dom->getElementByID($sidebar_element_id);
		$sidebar_elements[] = return_dom_node_as_html($element);
	endforeach;

	$i = 0; $bannerad_count = 0;
	$has_sidebar_ad = false;

	while ( have_posts() ): the_post();
		
		$widget_interval = 16; // Default Posts Per Section
		$col_lg = 3; // Default column size for posts on large screens
		$col_md = 4; // Default column size for posts on medium screens
		$posts_section_col = "col-lg-9 col-md-12"; // Default column size for Posts section 	

		// Decrease PPS for last 4 posts, only if Page is 1
		if( !is_paged() && ($i + 1) <= 4): 	
			$widget_interval = 4;
			$col_lg = 3;
			$col_md = 6;
			$posts_section_col = "col-lg-12";
		endif; 

		// Fixed sidebar ad wrap
		$fixed_sidebar_ad_home = array( 
			'before_widget' => "<aside class=\"b-posts__sidebar col-lg-3 pr-0 hidden-md-down\">",
			'after_widget' => "</aside>"
			); 
		
		// Posts section wrap
		$posts_section_wrap = array (
			'before_section' => '<section class="b-posts-section homepage">',
			'after_section' => '</section>',
			'before_title' => '<header class="header-block header-block--b-posts-section"><h2><span>',
			'after_title' => '</span></h2></header>',
			'before_posts' => '<div class="container-fluid">
							   <div class="row">
							   <div class="%1$s">
							   <ul class="global__list-reset b-posts-list row gutter-20">',
			'after_posts' => '</ul></div></div></div>'
			);
?>

		<?php if( !is_paged() ): ?>
			<? // Create a new section after every nth post {widget_interval} after the 4 most recent posts --- PAGE 1 ONLY.
			if($i == 0 || ($i + 1) > 4 && (($i + 1) - 5) % $widget_interval === 0): ?>
				<? echo $posts_section_wrap['before_section']; ?>
				<? if($i == 0): ?>
					<? echo $posts_section_wrap['before_title']; ?> Latest Updates <? echo $posts_section_wrap['after_title']; ?>
				<? endif; ?> 
				<? echo sprintf($posts_section_wrap['before_posts'], $posts_section_col); ?>
			<? endif; ?>
		<? else: ?>
			<? // Create a new section after every Nth post {widget_interval} --- PAGE 2+.
			if($i % $widget_interval === 0): ?>
				<? echo $posts_section_wrap['before_section']; ?>
				<? if($i == 0): ?>
					<? echo $posts_section_wrap['before_title']; ?> More Updates <? echo $posts_section_wrap['after_title']; ?>
				<? endif; ?> 
				<? echo sprintf($posts_section_wrap['before_posts'], $posts_section_col); ?>
			<? endif; ?>
		<? endif; ?>

		<li class="b-posts-list__item col-sm-12 col-md-<? echo $col_md; ?> col-lg-<? echo $col_lg; ?>"> 
			<? get_template_part('templates/content', 'featured');	// Output posts ?>
		</li>

			<?php if( !is_paged() ): ?>
				<? // Closing tags for section, row, col and ul --- PAGE 1 ONLY. 
				if(($i + 1) == 4 || ($i + 1) > 4 && (($i + 1) - 4) % $widget_interval === 0): ?>
					  </ul></div>
					  <? if( ($i + 1) > 4 && !$has_sidebar_ad): // Output fixed sidebar ad
					  	  echo $fixed_sidebar_ad_home['before_widget']; 
						    dynamic_sidebar('sidebar-primary');
						  echo $fixed_sidebar_ad_home['after_widget']; 
						  $has_sidebar_ad = true;
						endif; ?> 
					  </div></section> <!-- End of blog posts section -->					   
					  <? if(!empty($sidebar_elements)): // Output banner ad 
					  	  echo $sidebar_elements[$bannerad_count]; 
					  	endif; ?>
				<? endif; ?>
			<?php else: ?>
				<?  // Closing tags for section, row, col and ul --- PAGE 2+
				if( ($i + 1) % $widget_interval === 0): ?>
				    </ul></div>
					<? if(!$has_sidebar_ad): // Display fixed sidebar ad
						echo $fixed_sidebar_ad_home['before_widget']; 
					      dynamic_sidebar('sidebar-primary'); 
					    echo $fixed_sidebar_ad_home['after_widget'];
					  $has_sidebar_ad = true;
					endif; ?>
				    </div></section> <!-- End of blog posts section -->					   
				  <? if(!empty($sidebar_elements)): // Display banner ad 
				  	  echo $sidebar_elements[$bannerad_count]; 
				  	endif; ?>

				<? elseif( $wp_query->max_num_pages == get_query_var('paged') ): ?>
					<? // Closing tags for section, row, col and ul --- LAST PAGE with < nth number posts {widget_interval} 
					if(($wp_query->current_post + 1) == ($wp_query->post_count) && ($i + 1) % $widget_interval != 0 ): ?>
						</ul></div>
						<? if (!$has_sidebar_ad): // Output fixed sidebar ad
						     echo $fixed_sidebar_ad_home['before_widget']; 
						       dynamic_sidebar('sidebar-primary'); 
						     echo $fixed_sidebar_ad_home['after_widget'];
							 $has_sidebar_ad = true;
						endif; ?>
						</div></section> <!-- End of blog posts section -->	
						<? if(!empty($sidebar_elements)): // Display banner ad ?>
							<? echo $sidebar_elements[$bannerad_count]; ?>
						<? endif; ?>
					<? endif; ?>
				<? endif; ?>
			<? endif; ?>

			<?php if (!empty($sidebar_elements)):
					$bannerad_count++;
					// Restart after the last widget
					if ($bannerad_count == count($sidebar_elements)):
						$bannerad_count = 0;
					endif;
			endif; ?>
		<? $i++; ?>
	<? endwhile; ?>

	<? global $wp_query;?>
	<? if($wp_query->max_num_pages > 1): // Display pagination if number of pages is > 1?>	
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