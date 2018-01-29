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
        <li class="menu-item navbar__dropdown navbar__dropdown--follow">
          <a href="#" class="navbar__dropdown-link">Follow<b class="caret"></b></a>
          <ul class="global__list-reset navbar__dropdown-menu navbar__dropdown-menu--right navbar__dropdown-menu--follow">
            <li class="navbar__dropdown-list-item">
              <div class="navbar__dropdown--follow__group">
              <?php 
                $socialMediaList = array('youtube','facebook','instagram','twitter');
                foreach($socialMediaList as $social):
              ?>
                <a href="#" class="navbar__dropdown__btn-share navbar__dropdown__btn-share--<? echo $social; ?>" title="<?echo $social;?>">
                <i class="fa fa-<? echo $social; ?><? if($social == "youtube"){ echo "-play";} ?>"></i></a>
              <? endforeach; ?>
              </div>
            </li>
          </ul>
        </li>
        <li class="menu-item navbar-nav__search">
          <label class="navbar-nav__search__icon"></label>
          <label class="navbar-nav__search__close-icon hidden"></label>
        </li>
      </ul>
    </div> <!-- /.navbar-collapse -->
  </nav>