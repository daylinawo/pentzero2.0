<?php while (have_posts()) : the_post(); ?>

      <div class="ad_space container-fluid p-3 pl-0 pr-0" style="background-color:#222;">
        <div class="ad" style="width:960px; height:190px; overflow:hidden; margin:auto; border:1px solid #555;">
          <img src="https://blogs-images.forbes.com/carolinehoward/files/2016/12/30u30promo.jpg?width=960" width="auto" height="auto" style="margin:auto;"/>
        </div>
      </div>
<section id="video-strip">
    <div class="container post-page--container">
      <div class="d-flex pt-5">
        <div class="col-9 m-0 p-0">      
            <article <?php post_class(); ?>>

                  <!-- <a href="#" style="background-color:#fff; width:100%; color:#eeb781; font-weight:bold; text-align:center; text-transform: uppercase; display: block; padding:10px 0;">
                    <span class="glyphicon glyphicon-plus-sign" style="padding-right:5px;"></span>Subscribe to Pentzero</a> -->

                    <?php $video = get_field('video'); ?>
                    <div class="entry-content">
                        <!-- VIDEO -->
                         <?php $vdlink = $video['url']; ?>
                         <?php echo do_shortcode("[KGVID]".$vdlink."[/KGVID]"); // DISPLAY VIDEO PLAYER ?> 
                  
                    </div>            
            </article>        
        </div>  
            <div class="col-3 m-0 p-0">
                <?php include (TEMPLATEPATH . '/templates/sidebar.php'); ?>
            </div>
      </div>
    </div>
</section>

 <div class="container post-page--container">
      <div class="d-flex mt-4">
          <div class="col-9 m-0 pl-0 pr-5">      
                      <!-- VIDEO TITLE -->
                      <header class="post-page--title">
                          <h2 style="font-size:25px;"><?php the_title(); ?></h2>
                      </header><!-- END VIDEO TITLE -->


                      <!--  VIDEO POST INFO --> 
                      <div class="post-info">
                        <?php get_template_part('templates/entry-meta'); ?>
                        <?php echo do_shortcode('[ssba]'); ?>
                        <div class="description"><?php the_field('video_description'); ?></div>
                     </div><!-- END POST INFO --> 

                      <?php if( comments_open() ){ comments_template(); }?>
          </div>
          <div class="col-3" style="height: 1000px;">
                <?php dynamic_sidebar('post-page-ad'); ?>
          </div>

      </div>
</div>
<?php endwhile; ?>
