  <div class="srch-container">
    <form role="search" action="<?php bloginfo('url'); ?>" method="get">
      <input type="search" class="srch-textbox" id="s" name="s" autocomplete="off" placeholder="Search"<?php if( isset($search_terms) ){ if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; }} ?>  />
    </form>
  </div>  
