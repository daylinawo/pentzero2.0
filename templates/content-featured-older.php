<?php 

  $the_post_type = get_post_type(); 
  $icon = "";
  $author = "";
  $category = "";
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
  <!-- THUMBNAIL -->
  <div class="b-post__thumbnail">
    <? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
    <div class="b-post__thumbnail--overlay"></div>
    <div class="b-post__thumbnail--icon"><span class="fa fa-<? echo $icon; ?>"></span></div>
  </div>
  <!-- POST INFO -->
  <div class="b-post__info d-flex flex-column align-items-start no-gutters">
    <header class="b-post__info--header"> 
      <p class="b-post__info--post-cat"><? echo $category ?></p>      
      <?php the_title('<p class="b-post__info--post-title">', '</p>'); ?> 
    </header>  
    <footer class="b-post__info__footer mt-auto">
      <ul class="global__list-reset b-post__info__meta">
        <li class="b-post__info__meta-item b-post__info__meta-item--views"><span>84,113 views</span></li>
      </ul>
    </footer>
  </div>
</article>
