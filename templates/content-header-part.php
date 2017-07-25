<!-- LARGE FEATURED VIDEO -->
 <div class="home-content large-featured-video container-fluid">
    <div class="row">
      <div id="video_container" class="video-container">
        <video id="video">
          <source src="/app/themes/thepenttheme/assets/videos/migos_t-shirt.mp4" type="video/mp4">
        </video>
        <h2>Video of the day</h2>
      </div> 
    </div>
  </div> <!-- END LARGE FEATURED VIDEO -->


<!-- (HOMEPAGE ONLY) -->
<?php 
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    if(1 == $paged):
?>

<!-- RECOMMENDED POSTS SLIDER -->
<section id="recommended-posts" class="d-recommended m-hide pb-3">
    <div class="container-fluid">
      <h2 class="default--hd-no-line"><span style="color:#ffffff;">What's Trending Now</span></h2>
      <div class="recommended pl-5 pr-5 mb-3">
          <div class="row">
              <div class="col-sm-12">

                <div id="myCarousel" class="row carousel slide" data-ride="carousel">
                  <div class="carousel-inner">

                  <!-- Wrapper for slides -->
                  <?php 

                  $args = array( 
                  'post_type' => array('videos','gallery'),
                  'posts_per_page' => 18,
                  'orderby' => 'rand',
                  );

                  $postsQuery = new WP_Query($args);
                      if($postsQuery->have_posts() ): $i = 0;
                          while($postsQuery->have_posts() ): $postsQuery->the_post(); ?>

                        <? if($i == 0): echo'
                        <div class="carousel-item active">
                        <ul class="thumbnails">
                        <div class="row no-gutters gutter-10">
                        '; 
                        endif; ?>

                      <? get_template_part('templates/content', 'recommend'); ?>
                       <? if(($i + 1) % 6 == 0): echo '</div></ul></div>';
                        endif; ?>
                       <? if(($i + 1) % 6 == 0 && $i != 17): 
                       echo'
                        <div class="carousel-item">
                        <ul class="thumbnails">
                        <div class="row no-gutters gutter-10">';
                        endif;
                        ?>

                  <?
                        $i++; 
                   endwhile;
                     endif; 
                     wp_reset_postdata();
                  ?>

                  </div><!-- /Wrapper for slides .carousel-inner -->

                  <!-- Control box -->
                  <div class="control-box">                            
                      <a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">
                      <img src="/app/themes/pentzero2.0/assets/images/left-arrow.png" style="width:auto; !important" width="40" height="42">
                      </a>
                      <a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">
                      <img src="/app/themes/pentzero2.0/assets/images/right-arrow.png"  style="width:auto; !important" width="40" height="42">
                      </a>
                  </div><!-- /.control-box -->   

                </div><!-- /#myCarousel -->

              </div><!-- /.col-sm-12 -->          
          </div><!-- /.row -->
      </div><!-- /.container -->

            </div>
        </div>
    </div>
</section> <!-- END RECOMMENDED POSTS SLIDER -->

<!-- SPONSORED ADVERTISEMENT 2 -->
<div class="container mt-4">
  <div class="row sponsored-ad">
    <div class="wrapper alt">
      <div class="maxWidth">
        <div class="ad strip">
          <img src="/app/uploads/2017/03/wg_ss11_campaign_main_5_web_1column-e1488843597457.jpg" maxwidth="100%" style="margin:auto; display:block;" />
        </div>
      </div>
    </div> 
  </div><!-- END SPONSORED ADVERTISEMENT 2  -->
</div>
<?php
    endif;
?><!-- END HOMEPAGE ONLY -->