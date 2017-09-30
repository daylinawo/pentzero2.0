<!-- LARGE FEATURED VIDEO -->
<div class="video-controls-container hidden-sm-down">
  <div id="video-container" class="video-container">
    <video preload="true" autoplay="autoplay" loop="loop" id="video">
      <source src="/app/themes/pentzero2.0/assets/videos/migos_t-shirt.mp4" type="video/mp4">
    </video>
  </div>
  <a href="#" id="video__overlay" class="video__overlay"></a>
  <button id="video__play_pause_btn" class="video__play-pause-btn"><i class="fa fa-pause"></i></button>
</div>

<? $paged = (get_query_var('page')) ? get_query_var('page') : 1;?>
<? if( !is_paged() ): // If page 1 ?>
  <? get_template_part('templates/sidebar', 'trending'); ?>
<? endif; ?>