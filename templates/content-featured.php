<?php
            $the_post_type = get_post_type();

?>
    <div class="blog-item mb-5">
    <?php echo '<a href="'.esc_url(get_permalink() ).'" class="post-box" style="display:block; width:auto;">'; ?>


        <?php if(has_post_thumbnail() ){ 
              $perma = array(
              'before' => '<a href="'.esc_url(get_permalink() ).'" class="overlay">',
              'after' => '</a>',
              );
            ?> 

            <div class="thumbnail-img">
                  <? the_post_thumbnail('full', array( 'class'  => 'img' ) );
            } // closing if statement parentheses
            ?>
            <? if($the_post_type == "videos"):?>
                  <div class="overlay"><div class="thumb-icon"><span class="fa fa-play"></span></div></div>
            <? elseif($the_post_type == "gallery"): ?>
                  <div class="overlay"><div class="thumb-icon"><span class="fa fa-camera"></span></div></div>
            <? endif; ?> 
          </div>

      <!-- IF POST_CAT IS VIDEOS -->
            <? if($the_post_type == "videos"):?>
        <!-- VIDEO INFO -->
        <header class="l-p-info video-info mt-3"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
            <div class="col-12">
            <div class="row">
                  <div class="col-12 m-0">
                    <?php the_title( sprintf('<p class="vid-title" href="%s">', esc_url(get_permalink() ) ),'</p>'); ?> 
                  </div>
                  <!-- MORE INFO -->
                  <div class="more col-12 m-0">
                      <p style="font-size:11px;">
                        <span style="font-family: Playfair Display;">by</span>
                        <span style="">Nnendi Afori</span>
                      </p>
                  </div> <!-- END MORE INFO -->
            </div>
           </div>
        </div> 
        </header>  <!-- END VIDEO INFO -->
    <!-- END IF POST_CAT IS VIDEO -->

      <!-- IF POST_CAT IS GALLERY -->
      <? elseif($the_post_type == "gallery"):?>
       
<!-- VIDEO INFO -->
        <header class="l-p-info gallery-info mt-3"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
            <div class="col-12">
            <div class="row">
                  <div class="col-12 m-0">
                    <?php the_title( sprintf('<p class="vid-title" href="%s">', esc_url(get_permalink() ) ),'</p>'); ?> 
                  </div>
                  <!-- MORE INFO -->
                  <div class="more col-12 m-0">
                      <p style="font-size: 11px;">
                        <span style="font-family: Playfair Display;"> by</span>
                        <span>Samuel L Johnson</span>
                      </p>
                  </div> <!-- END MORE INFO -->
            </div>
           </div>
        </div> 
        </header>  <!-- END VIDEO INFO -->
            <? endif; ?>
</a>
    </div>
