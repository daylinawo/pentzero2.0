<?php 
$category = get_the_category();
$firstCategory = $category[0]->cat_name;
?>
<ul class="global__list-reset p-header__meta ">
	<li class="p-header__meta-item p-header__meta-item--category"><span><? echo $firstCategory; ?></span></li>
	<li class="p-header__meta-item p-header__meta-item--date"><span><time datetime="<?= get_post_time('c', true); ?>"><?= get_the_date('d M Y'); ?></time></span></li>
</ul>
<div class="clear"></div>
