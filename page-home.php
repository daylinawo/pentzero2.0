<section class="wrap--half" style="padding: 0 !important;">

<!-- {HOMEPAGE} ONLY -->
	<?php
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	if(1 == $paged):
	?>
		<!-- BEGIN FEATURED VIDEOS SECTION -->
		<section id="featured-videos" class="home-content wrapper alt" style="padding-top: 0 !important;">

					<div class="inner-container" style="margin: 0 !important;">			
						<div class="maxWidth">
							<header class="sub">
								<h2 class="default--hd-no-line">
									<span>Featured Videos</span>
								</h2>
							</header>
								<div class="d-flex">	
										<!-- VID 1 -->
										<div class="video-box col-xs-12 col-sm-6">
											<div class="thumbnail-img">
												<?php echo do_shortcode("[video_lightbox_youtube video_id=\"HzvzxytPUzg\" width=\"640\" height=\"480\" anchor=\"http://i65.tinypic.com/vevoes.jpg\"]");?>
												<a rel="wp-video-lightbox" class="overlay" href="https://www.youtube.com/watch?v=HzvzxytPUzg&width=640&height=480">
													<div class="cont">
														<div class="title">
															<small style="display:block;">Nines</small><h3>Money on my mind</h3><span class="fa fa-play"></span>
														</div>
													</div>
												</a>
											</div>
										</div>
										<!-- VID 2 -->
										<div class="video-box col-xs-12 col-sm-6">
											<div class="thumbnail-img">
												<?php echo do_shortcode("[video_lightbox_youtube video_id=\"_wiN9AkyHpI\" width=\"640\" height=\"480\" anchor=\"http://i68.tinypic.com/2hrpob9.jpg\"]");?>
												<a rel="wp-video-lightbox" class="overlay" href="https://www.youtube.com/watch?v=_wiN9AkyHpI&width=640&height=480">
													<div class="cont">
														<div class="title">
															<small style="display:block;">Teyana Taylor</small><h3>Champions Freestyle</h3><span class="fa fa-play"></span>
														</div>
													</div>
												</a>
											</div>
										</div>
										<br class="clear"/>
								</div>
						</div>
					</div>
		</section>
		<!-- END FEATURED VIDEOS SECTION -->
		

		<?php endif?><!-- END {HOMEPAGE} ONLY -->

	<!-- BEGIN LATEST UPDATES SECTION -->
	<section id="latest-updates" class="home-content">
		<div class="container-fluid">
			<div class="inner-container maxWidth clear">
					<div class="row d-flex gutter-20 no-gutters"> <!-- FIRST SET OF LATEST UPDATES -->
						<header class="sub">
							<h2 class="default--hd">
								<span style="background-color: #ffffff; color: #000000; border:1px solid #555555;">Latest Updates</span>
							</h2>
						</header>

		  	<?php
		  		$args = array(
		  			'post_type'=> array('videos', 'gallery'), // type of posts to be displayed
		  			'posts_per_page' => 25,	// number of posts per page
		  			'paged' => $paged, // current page
		  			);

		  		$postsQuery = new WP_Query($args);
		  			
		  		global $wp_query;
		  		$tmp_query = $wp_query;
		  		$wp_query = null;
		  		$wp_query = $postsQuery;


          	 	 // Catch output of sidebar in string
          		 ob_start();
           		 dynamic_sidebar("banner-ads-home");
           		 $sidebar_output = ob_get_clean();

     			 // Create DOMDocument with string (and set encoding to utf-8)
         		 $dom = new DOMDocument;
          		 @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $sidebar_output);          		 

          		  // Get IDs of the elements in sidebar, e.g. "text-2"
            			global $_wp_sidebars_widgets;
            			$sidebar_element_ids = $_wp_sidebars_widgets["banner-ads-home"]; // Use ID of your sidebar
            			// Save single widgets as html string in array
           				 $sidebar_elements = [];

           			foreach ($sidebar_element_ids as $sidebar_element_id):

           				// Get widget by ID
           				$element = $dom->getElementByID($sidebar_element_id);
           				$sidebar_elements[] = return_dom_node_as_html($element);

           			endforeach;

           			$bannerad_count = 0;

		  			if($postsQuery->have_posts() ): $i = 0; $day_check = "";
		  				while($postsQuery->have_posts() ): $postsQuery->the_post();


				  				if($i <= 5): $column = 4; $class = "most-recent"; 
				  				else: $column = 3; $class = "older";
				  				endif;

				  				if($i <= 5): $widget_interval = 6; // After how many posts the initial banner ad is displayed
				  				else: $widget_interval = 20; // After how many posts a banner ad is displayed thereafter
				  				endif;

				  				if($i >= 6):
				  						$day = get_the_date('j');
				  						$yesterday = 26;
				  							if($day != $day_check):
				  								$closeTag = "</div></div>";  
				  				?>		
				  						<div class="row">
				  								<div class="col-sm-12 p-0 mt-3 mb-3">
				  									<h6 class="pb-1 posts-date">
				  										<div class="mt-1 p-1">
				  										<? if($day == $yesterday):?>
				  											<p class="p-0 m-0" style="font-size: 22px;">
					  										<span >Today</span>
					  										</p>
				  										<? else: ?>
				  										<p class="p-0 m-0" style="font-size: 22px;">
					  										<span><? echo get_the_date('l');?></span>
					  										<span><?echo get_the_date('jS');?></span>
					  									</p>
					  						  			<p class="p-0 m-0" style="font-size:16px; color:#777;">
					  										<span><?echo get_the_date('F'); ?></span>
					  										<span><?echo get_the_date('Y');?></span>
				  										</p>
				  									<? endif; ?>
				  										</div>
				  									</h6>
				  								</div> <!-- DISPLAY POST DATE -->
				  					 					<div class="row no-gutters d-flex gutter-20 maxWidth">
				  				<?		
				  							endif;
				  				endif;
		  						$day_check = $day;
			  					?>

			  				<?php if($class == "most-recent"):?>

								<div class=" col-sm-12 col-md-<?php echo $column; echo " ".$class; ?> ">
										<? get_template_part('templates/content', 'featured'); ?>
								</div>

				

							<? else: ?>
								<div class="col-sm-12 col-md-<?php echo $column; echo " ".$class; ?> ">
										<? get_template_part('templates/content', 'featured-older'); ?>
								</div>
								

							<?php endif; ?>

					<?php 	
							$i++; 

			                if (!empty($sidebar_elements) && $i % $widget_interval === 0):

			                if 	(isset($closeTag)): echo $closeTag;
			            	else: echo '</div>'; // close row
			            	endif;
			                	// Echo the widget
			                    echo $sidebar_elements[$bannerad_count];
			                    $bannerad_count++;

			                    // Restart after the last widget
			                    if ($bannerad_count == count($sidebar_elements)):
			                        $bannerad_count = 0;
			                    endif;

			                endif;

					endwhile; 
					?>
					</div>
				</div>
			</div> <!-- END LATEST UPDATES INNER CONTAINER -->
			
			<?php endif;?>
			</div>
			<? if($postsQuery->max_num_pages > 1): ?>	
				<div class="container-fluid">				
					<div class="row mt-3" id="pagination" style="padding:20px; border: 0 !important;">
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
				</div>
			<? endif; ?>
	      	<div style="background: #000; height:272px; width:100%; border-top:1px solid #555;" class="pt-3">
	            <img src="/app/themes/thepenttheme/assets/images/pageadvert1.jpg" width="70%" style="margin:auto; display:block" />
	     	</div>
  		</div>
  	</div>
	</section>	<!-- END LATEST UPDATES SECTION -->
   <div class="clear"></div>
   
  
</section>	<!-- END SECOND HALF WRAP -->

