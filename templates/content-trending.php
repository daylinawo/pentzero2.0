<!-- Recommended Post -->
<?php 

  $the_post_type = get_post_type(); 
  $icon = "";
  $author = "";
  $category = "";
  $post_date = get_the_date('j F y');

  if($the_post_type == "videos"):
      $icon = "play";
      $author = "Pentzero";
  elseif ($the_post_type == "gallery"):
      $icon = "clone";
      $author = "Pentzero";
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
    <div class="b-post__obj__header col-6 col-md-3">
      <div class="b-post__thumb">
        <? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
      </div>
    </div>
    <!-- Info -->
    <div class="b-post__obj__body col-6 col-md-9 pl-0">
        <header class="b-post__header"> 
          <ul class="global__list-reset b-post__meta b-post__meta__header">
            <li class="b-post__meta-item b-post__meta-item--post-cat"> <span><? echo $category ?></span></li>
            <li class="b-post__meta-item b-post__meta-item--date"><span><? echo $post_date; ?></span></li>
          </ul>
          <div class="clear"></div>
          <?php the_title('<p class="b-post__post-title">', '</p>'); ?> 
        </header> 
    </div>
  </div>
</article>
