<header class="m-header" role="banner">
<?php if(is_front_page() ): ?>
  <!-- PROMOTIONAL AD 1 -->
  <div class="l-container l-c-style" style="height:123px; width:100%; background-color:#000;">
    <div class="l-space">
      <div class="l-block" style="height:123px; width:300px; display: inline-block;">
        <img src="http://www.musicology.uk.com/wp-content/uploads/2016/02/AGM_WEB_BANNER_1.png" maxwidth="80%" style="margin:auto; display:block;" />
      </div>
    </div>
  </div><!-- END PROMOTIONAL AD 1 -->
<? endif; ?>
<?php get_template_part('templates/nav'); ?>
</header>

<div id="n-search">
  <?php get_search_form(); ?>
</div>

<?php
if(is_front_page()){
  get_template_part('templates/content-header');
}
?>