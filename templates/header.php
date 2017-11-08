<header class="m-header" role="banner">
  <?php  if(is_front_page() ): ?>
    <!-- PROMOTIONAL AD 1 -->
    <div class="l-container l-c-style" style="height:123px; width:100%; background-color:#000;">
      <div class="l-space">
        <div class="l-block" style="height:123px; width:300px; display: inline-block;">
          <img src="http://www.musicology.uk.com/wp-content/uploads/2016/02/AGM_WEB_BANNER_1.png" maxwidth="80%" style="margin:auto; display:block;\" />
        </div>
      </div>
    </div><!-- END PROMOTIONAL AD 1 -->
  <?php endif; ?>
  <nav class="navbar navbar-toggleable-md navbar-light" role="navigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <? $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
    <? $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
        if ( has_custom_logo() ) {
            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand mr-auto w-50 d-flex"><img src="'.esc_url( $logo[0] ).'" alt="Pentzero logo" ></a>';
        } else {
            echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
            } ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <? if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'walker' => new wp_bootstrap_navwalker(),
          'menu_class' => 'navbar-nav mx-auto w-100 justify-content-center',
          'container' => false
          ]);
          endif; 
      ?>
      <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
        <li class="navbar-nav__search">
          <a href="#" class="navbar-nav__search__icon"></a>
          <a href="#" class="navbar-nav__search__close-icon hidden"></a>
        </li>
      </ul>
    </div> <!-- /.navbar-collapse -->
  </nav>
</header>

<div id="n-search">
  <?php get_search_form(); ?>
</div>

<?php
if(is_front_page()){
     get_template_part('templates/content-header', 'part');
}
?>