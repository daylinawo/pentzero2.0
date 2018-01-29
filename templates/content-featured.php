<?php 

use Roots\Sage\Extras;

$post_type = get_post_type(); 
$date = get_the_date('j M Y');
$icon = Extras\get_post_type_icon($post_type);

// Get first category from post category
if (has_category()){
      $category = get_the_category();
      $category = $category[0]->cat_name;
    } else {
      $category = "";
    }
?>
    
<article <?php post_class( 'b-post' ); ?>>    
  <?php echo '<a href="'.esc_url(get_permalink() ).'" class="b-post__link b-post__link--article"></a>'; ?> 
  <div class="b-post__obj row align-items-center">
    <div class="b-post__obj__header col-6 col-md-12 ">
      <div class="b-post__thumb">
        <? the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
        <div class="b-post__thumb--icon"><span class="fa <? echo $icon; ?>"></span></div>
      </div>
    </div>

    <div class="b-post__obj__body col-6 col-md-12">
      <header class="b-post__header"> 
        <?php the_title('<h3 class="b-post__title">', '</h3>'); ?> 
      </header> 
      <footer class="b-post__footer">
        <ul class="global__list-reset b-post__meta">
          <li class="b-post__meta-item b-post__meta-item--cat"> <span><? echo $category ?></span></li>
          <li class="b-post__meta-item b-post__meta-item--date"><span><? echo $date; ?></span></li>
          <li class="b-post__meta-item b-post__meta-item--views"><span><?php echo rand(100, 900); ?>K views</span></li>
        </ul>
      </footer>
    </div>
  </div>
</article>


