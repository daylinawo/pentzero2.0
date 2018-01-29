<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/post-nav'); ?>

  <div class="p-video">
    <div class="p-video__wrapper">     
      <div class="p-video__player">
          <?php $video = get_field('video'); 
          echo do_shortcode("[KGVID]".$video['url']."[/KGVID]"); // display video player ?>     
      </div>            
      <?php dynamic_sidebar('sidebar-related-posts'); ?>
    </div> <!-- end video wrapper --> 
  </div>

  <article class="p-main p-main--video">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-0">
          <div class="p-video__content-body">      

            <header class="p-header p-header--video">
              <div class="p-header__wrapper">
                <div class="p-header__content">
                  <h2 class="p-header__title"><?php the_title(); ?></h2>
                  <?php get_template_part('templates/entry-meta'); ?>
                  <div class="clear"></div>
                  <?php echo do_shortcode('[ssba]'); ?> 
                </div>
              </div>
            </header><!-- end video header -->

            <div class="p-body p-body--video">
              <div class="p-body__wrapper">
                <div class="p-body__content">
                  <?php the_field('video_description'); ?>
                </div>
              </div>
            </div><!-- end post description --> 
            <?php get_template_part('templates/comments'); ?>

            <div class="p-video__ad">
              <img src="https://tpc.googlesyndication.com/simgad/1188358423122841238" border="0" width="300" height="250" alt="" class="img_ad">
            </div><!-- end sidebar ad --> 

          </div><!-- end body content -->
        </div>
      </div>
    </div>
  </article>
<?php endwhile; ?>
