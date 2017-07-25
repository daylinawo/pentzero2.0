<header class="m-header" role="banner">
<?php  if(is_front_page() ): ?>
<!-- PROMOTIONAL AD 1 -->
<div class="l-container l-c-style" style="height:272px; width:100%; background-color:#000;">
  <div class="l-space">
      <div class="l-block" style="height:272px; width:300px; display: inline-block;">
                <img src="/app/themes/thepenttheme/assets/images/pageadvert1.jpg" maxwidth="80%" style="margin:auto; display:block;\" />
      </div>
  </div>
</div><!-- END PROMOTIONAL AD 1 -->
<? endif; ?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded" role="navigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container">
    <? $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
              <? $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
                  if ( has_custom_logo() ) {
                      echo '<a href="" class="navbar-brand"><img src="'.esc_url( $logo[0] ).'" alt="Pentzero logo" ></a>';
                  } else {
                      echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
                      } ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
           <? if (has_nav_menu('primary_navigation')) :
                wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'walker' => new wp_bootstrap_navwalker(),
                'menu_class' => 'nav navbar-nav'
                ]);
            endif; ?> 
            
            <ul id="menu-main-social-media-links" class="nav navbar-nav social ">
                <li><a href="#" class="fa fa-facebook-f"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-youtube"></a></li>
                <li><a href="#" class="fa fa-instagram"></a></li>
            </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#search">Search</a></li>
                </ul>
        </div> <!-- /.navbar-collapse -->
    </div> <!-- /.container -->
</nav>
</header>

<div id="search">
    <button type="button" class="close">×</button>
    <form role="search" action="<?php bloginfo('url'); ?>" method="get">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<?php
if(is_front_page()){
     get_template_part('templates/content-header', 'part');
}
?>