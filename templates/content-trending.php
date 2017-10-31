<?php 
  $the_post_type = get_post_type(); 
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
<article class="b-post">    
  <?php echo '<a href="'.esc_url(get_permalink() ).'" class="b-post__link b-post__link--article"></a>'; ?> 
  <div class="b-post__obj row">
    <!-- Thumb -->
    <div class="b-post__obj__header col-6 col-md-4">
      <div class="b-post__thumb">
        <? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
      </div>
    </div>
    <!-- Info -->
    <div class="b-post__obj__body col-6 col-md-8 pl-0">
      <header class="b-post__header"> 
        <?php the_title('<p class="b-post__post-title">', '</p>'); ?> 
        <ul class="global__list-reset b-post__meta b-post__meta__header">
          <li class="b-post__meta-item b-post__meta-item--post-cat"> <span><? echo $category ?></span></li>
          <li class="b-post__meta-item b-post__meta-item--date"><span><?php echo meks_time_ago(); ?></span></li>
        </ul>
        <div class="clear"></div>
      </header> 
    </div>
  </div>
</article>
