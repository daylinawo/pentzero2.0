<form role="search" action="<?php bloginfo('url'); ?>/" id="searchform" class="navbar-form" method="get">
    <label for="s" class="sr-only">Search</label>
   <div class="media-body"> 
	   <div class="input-group input-group-sm">
	        <input type="text" class="form-control" id="s" name="s" placeholder="Search"<?php if( isset($search_terms) ){ if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; }} ?> />
	        <span class="input-group-btn">
	            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
	        </span>
	    </div> <!-- .input-group -->
	</div>
</form>