<aside class="trending-stories hidden-md-down">
  <h4 class="trending-stories__title">Trending</h4>
  <div class="container-fluid">
    <div class="row">
      <div class="col p-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php 
            $args = array( 
            'post_type' => array('video','gallery', 'article'),
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
              <? endif; ?>
                        <li class="b-posts-list__item col-md-12 col-lg-3 col-xl-3">
                          <? get_template_part('templates/content', 'trending'); ?>
                        </li>
                  <? if(($i + 1) % 4 == 0): ?> 
                      </div>
                    </ul>
                  </div>
                 <? endif; ?>
              <? $i++; ?>
            <? endwhile; ?>
          <? endif; ?>
          <? wp_reset_postdata(); ?>
          </div> 
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>    
    </div>  
  </div>    
</aside>