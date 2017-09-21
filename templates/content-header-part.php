<!-- LARGE FEATURED VIDEO -->
 <div class="large-featured-video container-fluid hidden-sm-down">
    <div class="row">
      <div id="video_container" class="video-container">
        <video id="video" autoplay="autoplay">
          <source src="/app/themes/thepenttheme/assets/videos/migos_t-shirt.mp4" type="video/mp4">
        </video>
      </div> 
    </div>
  </div>

<?php 
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    if(1 == $paged):
?>
<section class="trending--section typography dark-theme">
  <div class="container">
    <header class="header-block">
      <h2>What's Trending?</h2>
    </header>
    <div class="row">
      <div class="col-sm-12 p-0">
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
            <? $is_hidden = ""; ?>
            <? if(($i + 1) % 5 == 0 || ($i + 1) % 6 == 0 ): $is_hidden = "hidden-lg-down"  ?>
            <? endif; ?>

            <? if($i == 0): ?>
            <div class="carousel-item active">
              <ul class="thumbnails">
                <div class="row gutter-10">
            <? endif; ?>
            <? echo '<li class="b-post-list__item col-md-12 col-lg-3 col-xl-2 '.$is_hidden.'">'; ?> 
            <? get_template_part('templates/content', 'recommend'); ?>
                    </li>
            <? if(($i + 1) % 6 == 0): ?> 
                </div>
              </ul>
            </div>
            <? endif; ?>

            <? if(($i + 1) % 6 == 0 && $i != 17): ?>            
            <div class="carousel-item">
              <ul class="thumbnails">
                <div class="row gutter-10">
            <? endif; ?>

            <? $i++; 
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
  </div><!-- /.container-fluid -->
</section>
<?php
    endif;
?>