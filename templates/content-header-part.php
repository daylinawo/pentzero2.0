<!-- LARGE FEATURED VIDEO -->
 <div class="home-content large-featured-video container-fluid">
    <div class="row">
      <div id="video_container" class="video-container">
        <video  id="video">
          <source src="/app/themes/thepenttheme/assets/videos/migos_t-shirt.mp4" type="video/mp4">
        </video>
      </div> 
    </div>
  </div>

<!-- RECOMMENDED POSTS LIST -->
<section id="recommended-posts" class="d-recommended m-hide">
    <div class="container-fluid p-4">
        <h2 class="default--hd-no-line" style="margin-top: 0 !important;">
          <span style="background-color: #000; color: #fff; border: 1px solid #292929;">Recommended Posts</span>
          </h2>
        <div class="row row-span">
                <?php 

                $args = array( 
                'post_type' => array('videos','gallery'),
                'posts_per_page' => 6,
                'orderby' => 'rand',
                );

                $postsQuery = new WP_Query($args);
                    if($postsQuery->have_posts() ): $i = 0;
                        while($postsQuery->have_posts() ): $postsQuery->the_post(); ?>

                <div class="col-xs-6 col-sm-2"> 
                      <? get_template_part('templates/content', 'recommend'); ?>
                </div>

                <? endwhile;
                   endif; 

                   wp_reset_postdata();

                ?>
            </div>
        </div>
    </div>
</section>