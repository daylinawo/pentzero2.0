<?php
/** 
* Plugin Name: WP Pent Custom Post Types
* Plugin URI: http:\\pentzero.com
* Description: This plugin allows you to add simple video posts to your websites.
* Author: Franklin Mathurin
* Author URI: http:\\pentzero.com
* Version: 0.0.1
* License: GPLv2


if(! defined( 'ABSPATH' )){
	exit;
}

    function pent_custom_post_type(){

     
      $labels = array(
        'name' => 'Videos',
        'singular_name' => 'Video',
        'add_new' => 'Add Video Post',
        'all_items' => 'All Video Posts',
        'add_new_item' => 'Add Video Post',
        'edit_item' => 'Edit Video Post',
        'new_item' => 'New Video Post',
        'view_item' => 'View Video Post',
        'search_item' => 'Search Video Posts',
        'not_found' => 'No videos founds',
        'not_found_in_trash' => 'No video post found in trash',
        'parent_item_colon' => 'Parent videos post'
        );
      
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail',
            'comments'
          ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false,
        'yarpp_support' => true
      );
      register_post_type('videos', $args);

        $labels = array(
        'name' => 'Galleries',
        'singular_name' => 'Gallery',
        'add_new' => 'Add Gallery Post',
        'all_items' => 'All Gallery Posts',
        'add_new_item' => 'Add Gallery Post',
        'edit_item' => 'Edit Gallery Post',
        'new_item' => 'New Gallery Post',
        'view_item' => 'View Gallery Post',
        'search_item' => 'Search Gallery Posts',
        'not_found' => 'No Galleries founds',
        'not_found_in_trash' => 'No Gallery post found in trash',
        'parent_item_colon' => 'Parent Gallery post'
        );
      
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'thumbnail',
            'comments'
          ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 6,
        'exclude_from_search' => false,
        'yarpp_support' => true
      );
      register_post_type('gallery', $args);
      
    flush_rewrite_rules();
  }

  add_action('init','pent_custom_post_type');
*/