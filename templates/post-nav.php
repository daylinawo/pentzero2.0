<nav class="p-nav">
  <div class="p-nav__wrapper">
    <?php  $post_type = get_post_type(); ?>
    <div class="p-nav__title">
      <?php 
        if($post_type == "videos"):
          get_template_part( 'templates/svg/inline', 'vid-logo.svg' ); 
        elseif ($post_type == "gallery"):
          get_template_part( 'templates/svg/inline', 'gallery-logo.svg' ); 
        endif;
      ?>
    </div>
    <?php previous_post_link('<div class="navbutton navbutton-left">%link</div>', '<i class="fa fa-chevron-left"></i>'); ?>
    <?php next_post_link('<div class="navbutton navbutton-right">%link</div>', '<i class="fa fa-chevron-right"></i>'); ?>
    <?php $prev_post = get_adjacent_post(false, '', true);  $next_post = get_adjacent_post(false, '', false); ?>
    <?php if(!empty($prev_post)) : 
      $prev_post_title = mb_strimwidth($prev_post->post_title, 0, 30, '...');
      echo '<div class="p-nav__post-title-wrap p-nav__post-title-wrap--prev"><p class="p-nav__post-title">' . $prev_post_title . '</p></div>';
    endif; ?>
    <?php if(!empty($next_post)) :
      $next_post_title = mb_strimwidth($next_post->post_title, 0, 30, '...');
      echo '<div class="p-nav__post-title-wrap p-nav__post-title-wrap--next"><p class="p-nav__post-title">' . $next_post_title . '</p></div>';
     endif; ?>
  </div>
</nav> <!-- end post nav -->
