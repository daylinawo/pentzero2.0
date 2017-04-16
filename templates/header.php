
<header class="m-header" role="banner">

<div class="l-container l-c-style" style="height:272px; width:100%; background-color:#000;">
  <div class="l-space">
      <div class="l-block" style="height:272px; width:300px; display: inline-block;">
                <img src="/app/themes/thepenttheme/assets/images/pageadvert1.jpg" maxwidth="80%" style="margin:auto; display:block;\" />
      </div>
  </div>
</div>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <? $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
            <? $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
            <? if ( has_custom_logo() ) {
                  echo '<a href="" class="navbar-brand"><img src="'.esc_url( $logo[0] ).'" alt="Pentzero logo" ></a>';
            } else {
                  echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
            } ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu([
               'theme_location' => 'primary_navigation',
               'walker' => new wp_bootstrap_navwalker(),
               'menu_class' => 'nav navbar-nav'
                ]);
            endif;
            ?> 

        <ul id="menu-main-social-media-links" class="nav navbar-nav social">
            <li><a href="#" class="fa fa-facebook-f"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-youtube"></a></li>
            <li><a href="#" class="fa fa-instagram"></a></li>
        </ul>

         <div class="nav navbar-nav">
            <div class="dropdown dropdown-searchbox">
              <button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"><i class="fa fa-search" style="color: white;"></i><span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><?php  get_search_form(); ?></li>
              </ul>
            </div>
        </div>
  </div>
</nav>

</header>
<?php
if(is_front_page()){
     get_template_part('templates/content-header', 'part');

}
?>