<?php 
  $the_post_type = get_post_type();   
  $post_date = get_the_date('j F Y');
  $icon = "";
  $category = "";

  if($the_post_type == "videos"):
      $icon = "play";
  elseif ($the_post_type == "gallery"):
      $icon = "clone";
  endif;

  if (has_category()){
       $category = get_the_category();
       $category = $category[0]->cat_name;      
      }
?>

<article <?php post_class( 'b-post' ); ?>>    
  <?php echo '<a href="'.esc_url(get_permalink() ).'" class="b-post__link b-post__link--article"></a>'; ?> 
  <div class="b-post__obj row align-items-center">
    <!-- Thumb -->
    <div class="b-post__obj__header col-6 col-md-12 ">
      <div class="b-post__thumb">
        <? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
        <div class="b-post__thumb--icon"><span class="fa fa-<? echo $icon; ?>"></span></div>
      </div>
    </div>
    <!-- Info -->
    <div class="b-post__obj__body col-6 col-md-12">
        <header class="b-post__header"> 
          <ul class="global__list-reset b-post__meta b-post__meta__header">
            <li class="b-post__meta-item b-post__meta-item--post-cat"> <span><? echo $category ?></span></li>
            <li class="b-post__meta-item b-post__meta-item--date"><span><? echo $post_date; ?></span></li>
          </ul>
          <div class="clear"></div>
          <?php the_title('<p class="b-post__post-title">', '</p>'); ?> 
        </header> 

        <footer class="b-post__footer mt-auto">
          <ul class="global__list-reset b-post__meta b-post__meta__footer">
            <li class="b-post__meta-item b-post__meta-item--views"><span class="fa fa-eye"></span><span> 184,600</span></li>
            <li class="b-post__meta-item b-post__meta-item--comments"><span class="fa fa-comments"></span><span> 26</span></li>
          </ul>
          <div class="clear"></div>
        </footer>
    </div>
  </div>
</article>
