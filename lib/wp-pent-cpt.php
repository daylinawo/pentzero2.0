<?php
/** 
* Plugin Name: WP Pent Custom Post Types
* Plugin URI: http:\\pentzero.com
* Description: This plugin allows you to add simple video posts to your websites.
* Author: Franklin Mathurin
* Author URI: http:\\pentzero.com
* Version: 0.0.1
* License: GPLv2
*/

if(! defined( 'ABSPATH' )){
	exit;
}

    function pent_custom_post_type(){

/* VIDEOS CPT */     
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

/* GALLERY CPT */
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
    
/* ARTICLES CPT */     
      $labels = array(
        'name' => 'Articles',
        'singular_name' => 'Article',
        'add_new' => 'Add Article Post',
        'all_items' => 'All Article Posts',
        'add_new_item' => 'Add Article Post',
        'edit_item' => 'Edit Article Post',
        'new_item' => 'New Article Post',
        'view_item' => 'View Article Post',
        'search_item' => 'Search Article Posts',
        'not_found' => 'No Article founds',
        'not_found_in_trash' => 'No Article posts found in trash',
        'parent_item_colon' => 'Parent article post'
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
        'menu_position' => 7,
        'exclude_from_search' => false,
        'yarpp_support' => true
      );
      register_post_type('articles', $args);
    flush_rewrite_rules();
  }

  add_action('init','pent_custom_post_type');
