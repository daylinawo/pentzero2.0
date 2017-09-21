<div class="inner-container typography">
	<!-- PAGE 1 OF HOMEPAGE ONLY -->
	<?php $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	if(1 == $paged):
	?>	
	<!-- BEGIN FEATURED VIDEOS SECTION -->
		<section class="featured--section homepage">
			<div class="container-fluid">
				<header class="header-block"><h2><span>Featured Videos</span></h2></header>	
				<div class="row">
					<!-- VID 1 -->
					<div class="featured-video col-xs-12 col">
						<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=HzvzxytPUzg&width=640&height=480" class="featured-video__thumbnail">
							<img src="http://i68.tinypic.com/vevoes.jpg" class="video_lightbox_anchor_image" alt="">
							<div class="featured-video__thumbnail__overlay">
								<div class="featured-video__overlay__content">
									<div class="featured-video__icon"><span class="fa fa-play"></span></div>
									<h3 class="featured-video__title">Money on my Mind</h3>
									<p class="featured-video__byline">Nines</p>
								</div>
							</div>
						</a>
					</div>
					<!-- VID 2 -->
					<div class="featured-video col-xs-12 col">
						<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=_wiN9AkyHpI&width=640&height=480" class="featured-video__thumbnail">
							<img src="http://i68.tinypic.com/2hrpob9.jpg" class="video_lightbox_anchor_image" alt="">
							<div class="featured-video__thumbnail__overlay">
								<div class="featured-video__overlay__content">
									<div class="featured-video__icon "><span class="fa fa-play"></span></div>
									<h3 class="featured-video__title">Champions Freestyle</h3>
									<p class="featured-video__byline">Teyana Taylor</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section><!-- END FEATURED VIDEOS SECTION -->
	<?php endif?>

	<!-- BEGIN LATEST POSTS SECTION -->
		<section class="latest-posts--section homepage">
			<div class="container">
				<header class="header-block with-line"><h2><span>Latest Updates</span></h2></header>
				<div class="row">
					<div class="col-12 p-0">
						<ul class="global__list-reset latest-posts row gutter-20"><!-- FIRST SET OF LATEST UPDATES -->
					  	<?php
					  		$args = array(
					  			'post_type'=> array('videos', 'gallery'), // type of posts to be displayed
					  			'posts_per_page' => 30,	// number of posts per page
					  			'paged' => $paged, // current page
					  			);

					  		$postsQuery = new WP_Query($args);
					  			
					  		global $wp_query;
					  		$tmp_query = $wp_query;
					  		$wp_query = null;
					  		$wp_query = $postsQuery;


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

			       			$bannerad_count = 0;

				  			if($postsQuery->have_posts() ): $i = 0; $date_check = "";

				  				while($postsQuery->have_posts() ): $postsQuery->the_post();

						  				if($i <= 3): 
						  					$col_lg = 3;
						  					$col_md = 3;
						  					$widget_interval = 4; // After how many posts the 1st banner ad is displayed
						  				elseif($i > 5 && $i <= 17):
											$col_lg = 3;
											$col_md = 4;
						  					$widget_interval = 18; // After how many posts a banner ad is displayed thereafter
						  				else: 
						  					$col_lg = 3;
						  					$col_md = 4;
						  					$widget_interval = 30; // After how many posts a banner ad is displayed thereafter
						  				endif;

						  				if($i > 3):
						  					$latest_posts_sidebar = array( 
						  						'before_widget' => "<div class=\"latest-posts__sidebar hidden-md-down col-lg-3 pr-0\">",
						  						'after_widget' => "</div>"
						  						);
						  				endif;

						  				// POST DATE
						  				if($i >= 4):
						  					$date = get_the_date('j F Y'); 
					  							if($date != $date_check): // Check whether date of next post is different from date of last post, then output new date.
						  							?>	
						  						<section class="latest-posts--section homepage">
				  									<div class="container">
				  										<div class="row">
				  											<div class="col-md-12 col-lg-9 p-0">
						  					 					<ul class="global__list-reset latest-posts row gutter-20">
						  			<?			  	$date_check = $date;
						  						endif;
						  				endif; // END POST DATE
					  				?>
					  					<!-- OUTPUT POSTS -->
										<li class="b-post-list__item col-sm-12 col-md-<? echo $col_md; ?> col-lg-<? echo $col_lg; ?> "> 
											<? get_template_part('templates/content', 'featured'); ?>
										</li>
						<?php 
									$i++; 
					                if (!empty($sidebar_elements) && $i % $widget_interval === 0):

						            	echo '</ul></div>';
						            	if (isset($latest_posts_sidebar)): 
						            		echo $latest_posts_sidebar['before_widget']; 
						            	    	dynamic_sidebar('sidebar-primary'); 
						            	    echo $latest_posts_sidebar['after_widget'];
						            	endif;

						            	echo '</div></section>'; // CLOSE LATEST POSTS SECTION

					                    echo $sidebar_elements[$bannerad_count]; // Output the widget
					                    $bannerad_count++;

					                    // Restart after the last widget
					                    if ($bannerad_count == count($sidebar_elements)):
					                        $bannerad_count = 0;
					                    endif;

					                endif;
								endwhile; 
							endif;
						?>
</div><!-- END LATEST UPDATES INNER CONTAINER -->

	<? if($postsQuery->max_num_pages > 1): ?>	
		<div class="d-flex" id="pagination">
			<div class="col-sm-12 text-center">
				<?php 
				echo paginate_links( array(
					'total' => $postsQuery->max_num_pages,
					) ); 

				$wp_query = null;
				$wp_query = $tmp_query;
				
				wp_reset_postdata();
				?>
			</div>
		</div>
	<? endif; ?>