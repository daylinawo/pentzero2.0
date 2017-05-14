
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
            $the_post_type = get_post_type();

?>
    <div class="blog-item mb-3">


        <?php if(has_post_thumbnail() ){ 
              $perma = array(
              'before' => '<a href="'.esc_url(get_permalink() ).'" class="overlay">',
              'after' => '</a>',
              );
            ?> 

            <div class="thumbnail-img">
                  <? the_post_thumbnail('full', array( 'class'  => 'img' ) );  ?>
                      <? echo $perma['before']; ?>

                      <?php             

                      switch ($the_post_type){
                        case 'gallery':
                          echo '';
                          break;
                        default: 
                          print '';
                          break;
                        }
                      ?>
                <? echo $perma['after'];
            } // closing if statement parentheses
            ?>
             </div>

      <!-- IF POST_CAT IS VIDEOS -->
            <? if($the_post_type == "videos"):?>
       
        <header class="l-p-info video-info mt-2"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
            <div class="col-12">
              <div class="row">
                 <div class="col-3 m-0 pr-0"> 
                    <?php echo '<a href="'.esc_url(get_permalink() ).'" class="play-bttn" ><span class="fa fa-play fa-lg"></span></a>'; ?>
                     <span style="border-left: 1px solid #ddd; display: block; float:left; margin: 0px 0 0 12px; height: 25px;"></span>
                 </div>
                   <div class="col-9 m-0 pl-0 pb-2" style="font-size: 14px; "><?php the_title( sprintf('<a href="%s">', esc_url(get_permalink() ) ),'</a>'); ?> </div>
              </div>
              <!-- ADDITIONAL VIDEO INFO -->
              <div class="row align-items-end justify-content-end">
                  <div class="col-9 pt-2 pb-2 m-0 pl-0" style="font-size: 10px;">
                      <p class="m-0"><span class="fa fa-user mr-1" style="color:#777;"></span><span style="font-family: Playfair Display; color:#777; font-style:italic; font-weight: bold;">Submitted by</span> <span style="color:#333;">Joey Peterson</span></p>
                      <p class=""><span class="fa fa-play mr-1"></span>00:02:30</p>

                  </div>
             </div> <!-- END ADDITIONAL VIDEO INFO -->
            </div> 
          </div>
        </header>       <!-- END IF POST_CAT IS VIDEO -->

      <!-- IF POST_CAT IS GALLERY -->
      <? elseif($the_post_type == "gallery"):?>
       
        <header class="l-p-info gallery-info p-2"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
             <div class="col-12"  style="font-size: 14px; ">
              <?php the_title( sprintf('<a href="%s">', esc_url(get_permalink() ) ),'</a>'); ?>
             <!-- <div style="position: absolute; bottom: 0; left:0;"><span style="color:#CCC" class="fa fa-camera-retro fa-lg"></span></div> -->
            </div>
        </div> 
        </header>  <!-- END IF POST_CAT IS GALLERY -->
            <? endif; ?>

    </div>
</article>

<!-- <span class="post-type icon icon-camera"><img src="/app/themes/thepenttheme/assets/images/Camera_icon.png" width="25" height="17"></span> -->
