
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-item">
      
        <?php if(has_post_thumbnail() ){ 
              $perma = array(
              'before' => '<a href="'.esc_url(get_permalink() ).'">',
              'after' => '</a>',
              ); // If thumbnail: link the thumbnail
            ?> 

            <div class="thumbnail-img">
              <? echo $perma['before']; ?>
                  <? the_post_thumbnail('full', array( 'class'  => 'img' ) );  ?>
              <? echo $perma['after'];
            } // closing if statement parentheses
            ?>
             </div>
    
        <header class="info">           
           <?php 
            /* $the_post_type = get_post_type();

            switch ($the_post_type){
              case 'videos':
                print 'This is a video!';
                break;
              case 'gallery':
                print 'This is a gallery!';
                break;
              default: 
                print 'nothing.';
                break;
            }
             */?>
           <?php the_title( sprintf('<h3 class="entry-header"><a href="%s">', esc_url(get_permalink() ) ),'</a></h3>'); ?>
            <p><time datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></p>
        </header>

    </div>
</article>
