<aside class="trending-stories hidden-md-down">
  <div class="container">
    
    <header class="header-block row">
      <div class="col-sm-12 p-0"> 
        <h2>What's Trending?</h2>
      </div>
    </header>

    <div class="row">
      <div class="col-sm-12 p-0">
        <div id="myCarousel" class="trending-stories__slide row carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <!-- Wrapper for slides -->
            <?php 
            $args = array( 
            'post_type' => array('videos','gallery'),
            'posts_per_page' => 12,
            'orderby' => 'rand',
            );

            $postsQuery = new WP_Query($args);

            if($postsQuery->have_posts() ): $i = 0;
              while($postsQuery->have_posts() ): $postsQuery->the_post(); ?>

              <? if($i == 0): ?>
                  <div class="carousel-item active">
                    <ul class="global__list-reset b-posts-list b-posts-list--trending-stories">
                      <div class="row">
              <? elseif( ($i + 1) == 5 || ($i + 1) == 9):  ?>
                  <div class="carousel-item">
                    <ul class="global__list-reset b-posts-list b-posts-list--trending-stories">
                      <div class="row">              
              <? endif ?>
                        <li class="b-posts-list__item col-md-12 col-lg-3 col-xl-3">
                          <? get_template_part('templates/content', 'trending'); ?>
                        </li>
                  <? if(($i + 1) % 4 == 0): ?> 
                      </div>
                    </ul>
                  </div>
              <? endif; ?>

            <?  $i++; 
              endwhile;
            endif; 
            wp_reset_postdata();
            ?>
          </div>
          <!-- Control box -->
          <div class="control-box">                            
            <a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">
              <img src="/app/themes/pentzero2.0/assets/images/left-arrow.png" style="width:auto; !important" width="40" height="42">
            </a>
            <a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">
              <img src="/app/themes/pentzero2.0/assets/images/right-arrow.png"  style="width:auto; !important" width="40" height="42">
            </a>
          </div> 
        </div>
      </div>
    </div>
</aside>