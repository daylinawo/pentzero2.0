
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-item">
      
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
                       $the_post_type = get_post_type();
                      ?>
                <? echo $perma['after'];
            } // closing if statement parentheses
            ?>
             </div>
    
  <? if($the_post_type == "videos"):?>
        <header class="l-p-info video-info mt-1"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
             <div class="col-12 pt-2" >
              <?php the_title( sprintf('<a href="%s">', esc_url(get_permalink() ) ),'</a>'); ?> 
                   <?php echo '<a href="'.esc_url(get_permalink() ).'" class="play-bttn" ><span class="fa fa-play"></span></a>'; ?>
            </div>
        </div> 
        </header>

      <? elseif($the_post_type == "gallery"):?>
        <header class="l-p-info gallery-info mt-1"> 
        <div class="d-flex flex-column no-gutters" style="height: 100%; position: relative;">  
             <div class="col-12 pt-2" >
              <?php the_title( sprintf('<a href="%s">', esc_url(get_permalink() ) ),'</a>'); ?> 
            </div>
        </div> 
        </header>
            <? endif; ?>
    </div>
</article>

<!-- <span class="post-type icon icon-camera"><img src="/app/themes/thepenttheme/assets/images/Camera_icon.png" width="25" height="17"></span> -->
