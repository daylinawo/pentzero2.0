<? if( !is_paged() ): // If page 1 ?>

	<!-- BEGIN FEATURED VIDEOS SECTION -->
	<section class="featured-section homepage">
		<div class="container-fluid">
			<header class="header-block row"><h2><span>Featured Videos</span></h2></header>	
			<div class="row">
				<!-- VID 1 -->
				<div class="featured-video col-md-12 col-lg-6 p-0">
					<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=HzvzxytPUzg&width=1280&height=720" class="featured-video__thumb">
						<img src="http://i68.tinypic.com/vevoes.jpg" class="video_lightbox_anchor_image" alt="">
						<div class="featured-video__overlay">
							<div class="featured-video__overlay__content">
								<div class="featured-video__icon"><span class="fa fa-play"></span></div>
								<div class="featured-video__title-wrap">
									<h3 class="featured-video__title">Money on my Mind</h3>
									<p class="featured-video__byline">Nines</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<!-- VID 2 -->
				<div class="featured-video col-md-12 col-lg-6 p-o">
					<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=_wiN9AkyHpI&width=1280&height=720" class="featured-video__thumb">
						<img src="http://i68.tinypic.com/2hrpob9.jpg" class="video_lightbox_anchor_image" alt="">
						<div class="featured-video__thumb__overlay">
							<div class="featured-video__overlay__content">
								<div class="featured-video__icon "><span class="fa fa-play"></span></div>
								<div class="featured-video__title-wrap">
									<h3 class="featured-video__title">Champions Freestyle</h3>
									<p class="featured-video__byline">Teyana Taylor</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section><!-- END FEATURED VIDEOS SECTION -->
	<?php endif?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<? else: ?>
<?
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
?>

	<?php while ( have_posts() ): the_post();
		
		$widget_interval = 16;
		$col_md = 4;
		$col_lg = 3;

		if( !is_paged() ):	
			if(($i + 1) <= 4):
				$widget_interval = 4;
				$col_md = 6;
				$col_lg = 3;
			endif;
			if($i > 3):
				$b_posts_sidebar = array( 
					'before_widget' => "<div class=\"b-posts__sidebar hidden-md-down col-lg-3 pr-0\">",
					'after_widget' => "</div>"
					);			
			endif;
		else:
			$b_posts_sidebar = array( 
				'before_widget' => "<div class=\"b-posts__sidebar hidden-md-down col-lg-3 pr-0\">",
				'after_widget' => "</div>"
				);		
		endif; 
		?>
		<? if( !is_paged() ): // If page 1 ?>
			<? if ($i == 0 || ($i + 1) > 4 && (($i + 1) - 5) % $widget_interval === 0): ?>
				<section class="b-posts-section homepage">
					<div class="container">
						<? if($i == 0): ?>
							<header class="header-block with-line"><h2><span>Latest Updates</span></h2></header>
						<?	endif; ?>
						<div class="row">
							<div class="<? if ($i == 0): echo 'col-12 p-0'; else: echo 'col-md-12 col-lg-9 p-0'; endif; ?>">
								<ul class="global__list-reset b-posts-list row gutter-20">
			<? endif; ?>
		<? else: // if page > 1 ?>
			<? if($i == 0 || $i % $widget_interval === 0): ?>
			<section class="b-posts-section homepage" >
				<div class="container">
					<? if($i == 0): ?>
						<header class="header-block with-line"><h2><span>Latest Updates</span></h2></header>
					<?	endif; ?>
					<div class="row">
						<div class="col-md-12 col-lg-9 p-0">
							<ul class="global__list-reset b-posts-list row gutter-20">
			<? endif; ?>
		<? endif; ?>

		<li class="b-posts-list__item col-sm-12 col-md-<? echo $col_md; ?> col-lg-<?echo $col_lg; ?>"> 
			<? get_template_part('templates/content', 'featured'); ?>
		</li>

		<?
		if (!empty($sidebar_elements)):

			if( !is_paged() ): // If page 1
				if(($i + 1) == 4 || ($i + 1) > 4 && (($i + 1) - 4) % $widget_interval === 0):
					echo '</ul></div>';
				    if( (($i + 1) - 4) == $widget_interval && isset($b_posts_sidebar)):
						echo $b_posts_sidebar['before_widget']; 
					    	dynamic_sidebar('sidebar-primary'); 
					    echo $b_posts_sidebar['after_widget'];
				    endif;
					echo '</div></section>'; // CLOSE BLOG POSTS SECTION								   
				    echo $sidebar_elements[$bannerad_count]; // Output the widget	
				endif;  
			else:
				if( ($i + 1) % $widget_interval === 0):
					echo '</ul></div>';
					if (isset($b_posts_sidebar)): 
						echo $b_posts_sidebar['before_widget']; 
					    	dynamic_sidebar('sidebar-primary'); 
					    echo $b_posts_sidebar['after_widget'];
					endif;
					echo '</div></section>'; // CLOSE BLOG POSTS SECTION
				    echo $sidebar_elements[$bannerad_count]; // Output the widget

	 			elseif( $wp_query->max_num_pages == get_query_var('paged') ):
					if(($wp_query->current_post + 1) == ($wp_query->post_count) && ($i + 1) % $widget_interval != 0 ):
						echo '</ul></div>';
						if (isset($b_posts_sidebar)): 
							echo $b_posts_sidebar['before_widget']; 
						    	dynamic_sidebar('sidebar-primary'); 
						    echo $b_posts_sidebar['after_widget'];
						endif;
						echo '</div></section>'; // CLOSE BLOG POSTS SECTION
					    echo $sidebar_elements[$bannerad_count]; // Output the widget	
					endif;
				endif;

			endif;

			$bannerad_count++;

			// Restart after the last widget
			if ($bannerad_count == count($sidebar_elements)):
				$bannerad_count = 0;
			endif;
		endif;	
	
	$i++; endwhile; ?>
<? global $wp_query; ?>
<? if($wp_query->max_num_pages > 1): ?>	
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
<? endif; endif; ?>