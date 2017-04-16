
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

                      switch ($the_post_type){
                        case 'videos':
                          print '<span class="post-type fa fa-play"></span>';
                          break;
                        case 'gallery':
                          print '<span class="post-type fa fa-camera"></span>';
                          break;
                        default: 
                          print 'nothing.';
                          break;
                      }
                      ?>
                <? echo $perma['after'];
            } // closing if statement parentheses
            ?>
             </div>
    
        <header class="l-p-info">   
              <?php the_title( sprintf('<a href="%s">', esc_url(get_permalink() ) ),'</a>'); ?> 
        </header>

    </div>
</article>

<!-- <span class="post-type icon icon-camera"><img src="/app/themes/thepenttheme/assets/images/Camera_icon.png" width="25" height="17"></span> -->
