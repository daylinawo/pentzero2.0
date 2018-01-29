 <?php 
 /**
 * The template for displaying posts in the Link post format
 */

use Roots\Sage\Extras;
?>
    
<article id="post-<?php the_ID(); ?>" <?php post_class( 'b-post' ); ?>> 

  <?php echo '<a href="'.esc_url(get_permalink() ).'" class="b-post__link b-post__link--article"></a>'; ?> 
  <div class="b-post__obj row align-items-center">
    <div class="b-post__obj__header col-6 col-md-12 ">
      <div class="b-post__thumb">
      <?php the_post_thumbnail('full', array( 'class'  => 'img' ) ); ?>
    	<div class="b-post__thumb--icon">
    		<?php $icon = Extras\get_post_type_icon( get_post_type() ); ?>
    		<span class="fa <?php echo $icon; ?>"></span>
    	</div>
      </div>
    </div>

    <div class="b-post__obj__body col-6 col-md-12">
      <header class="b-post__header"> 
        <?php the_title('<h3 class="b-post__title">', '</h3>'); ?> 
      </header> 
      <footer class="b-post__footer">
        <ul class="global__list-reset b-post__meta">
          <li class="b-post__meta-item b-post__meta-item--cat"><span>
          <?php
    			// Get first category from post category
    			if (has_category()):
    			      $category = get_the_category();
    			      echo $category = $category[0]->cat_name;
    			endif;
          ?></span></li>
          <li class="b-post__meta-item b-post__meta-item--date"><span><?php echo get_the_date('j M Y'); ?></span></li>
          <li class="b-post__meta-item b-post__meta-item--views"><span><?php echo rand(100, 900); ?>K views</span></li>
        </ul>
      </footer>
    </div>
  </div>
</article>