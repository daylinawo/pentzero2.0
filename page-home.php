<div class="inner-container typography">
	<!-- PAGE 1 OF HOMEPAGE ONLY -->
	<?php $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	if(1 == $paged):
	?>	
	<!-- BEGIN FEATURED VIDEOS SECTION -->
	<section class="featured-section homepage">
		<div class="container-fluid">
			<header class="header-block"><h2><span>Featured Videos</span></h2></header>	
			<div class="row">
				<!-- VID 1 -->
				<div class="featured-video col-xs-12 col">
					<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=HzvzxytPUzg&width=640&height=480" class="featured-video__thumb">
						<img src="http://i68.tinypic.com/vevoes.jpg" class="video_lightbox_anchor_image" alt="">
						<div class="featured-video__overlay">
							<div class="featured-video__overlay__content">
								<div class="featured-video__icon"><span class="fa fa-play"></span></div>
								<div class="featured-video__video-title">
									<h3 class="featured-video__title">Money on my Mind</h3>
									<p class="featured-video__byline">Nines</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<!-- VID 2 -->
				<div class="featured-video col-xs-12 col">
					<a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=_wiN9AkyHpI&width=640&height=480" class="featured-video__thumb">
						<img src="http://i68.tinypic.com/2hrpob9.jpg" class="video_lightbox_anchor_image" alt="">
						<div class="featured-video__thumb__overlay">
							<div class="featured-video__overlay__content">
								<div class="featured-video__icon "><span class="fa fa-play"></span></div>
								<div class="featured-video__video-title">
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

	<!-- BEGIN LATEST POSTS SECTION -->
				  	<?php
				  	if($paged == 1):
				  		$ppp = 28;
				  	else: 
				  		$ppp = 12;
				  	endif;
				  		$args = array(
				  			'post_type'=> array('videos', 'gallery'), // type of posts to be displayed
				  			'posts_per_page' => $ppp,	// number of posts per page
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
					  				
				  				$col_lg = 3;
								$col_md = 4;
			  					$widget_interval = 12; // After how many posts a banner ad is displayed thereafter
							  		
			  					if($paged == 1):
							  		if($i <= 3): 
					  					$col_lg = 3;
					  					$col_md = 6;
					  					$widget_interval = 4; // After how many posts the 1st banner ad is displayed
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

				  				<? if($paged == 1): ?>
					  				<? if ($i == 0): ?>
										<section class="b-posts-section homepage">
										<div class="container">
										<header class="header-block with-line"><h2><span>Latest Updates</span></h2></header>
										<div class="row">
										<div class="col-12 p-0">
										<ul class="global__list-reset b-posts-list row gutter-20">
			  					 	<? elseif ($i > 3 && (($i + 1) - 5) % $widget_interval === 0): ?>
										<section class="b-posts-section homepage">
		  								<div class="container">
		  								<div class="row">
		  								<div class="col-md-12 col-lg-9 p-0">
				  					 	<ul class="global__list-reset b-posts-list row gutter-20">
			  					 	<? endif ?>
			  					<? else: ?> 
			  						<? if($i % $widget_interval === 0): ?>
			  							<section class="b-posts-section homepage" <? if($i == 0){ ?> style="margin-top:120px !important;" <? } ?>>
		  								<div class="container">
		  								<div class="row">
		  								<div class="col-md-12 col-lg-9 p-0">
				  					 	<ul class="global__list-reset b-posts-list row gutter-20">	
				  					<? endif; ?>	
				  				<? endif; ?>
									<li class="b-posts-list__item col-sm-12 col-md-<? echo $col_md; ?> col-lg-<? echo $col_lg; ?> "> 
										<? get_template_part('templates/content', 'featured'); ?>
									</li>
					<?php 
				                if (!empty($sidebar_elements)):
					            	 if( $wp_query->max_num_pages == get_query_var('paged') ):
					            	 	if(($wp_query->current_post + 1) == ($wp_query->post_count) && ($i + 1) % $widget_interval != 0 ):

					            	 	echo '</ul></div>';
							            	if (isset($b_posts_sidebar)): 
							            		echo $b_posts_sidebar['before_widget']; 
							            	    	dynamic_sidebar('sidebar-primary'); 
							            	    echo $b_posts_sidebar['after_widget'];
							            	endif;
							            	echo '</div></section>'; // CLOSE BLOG POSTS SECTION

						                    echo $sidebar_elements[$bannerad_count]; // Output the widget
						                    $bannerad_count++;

						                    // Restart after the last widget
						                    if ($bannerad_count == count($sidebar_elements)):
						                        $bannerad_count = 0;
						                    endif;
						                endif;    
									endif;

						            if($paged == 1):							            	
										if(($i + 1) <= 3 && ($i + 1) % $widget_interval === 0 || ($i + 1) > 3 && (($i + 1) - 4) % $widget_interval === 0):
									    	echo '</ul></div>';
									        if( ($i + 1) > 3 && (($i + 1) - 4) % $widget_interval === 0 && isset($b_posts_sidebar)):
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
									    endif;
									endif;

									$bannerad_count++;

									// Restart after the last widget
									if ($bannerad_count == count($sidebar_elements)):
									    $bannerad_count = 0;
									endif;
				              	endif;
				            $i++; 
							endwhile; 
						endif;
						?>
</div><!-- END INNER CONTAINER -->

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