<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function tax_and_offset_homepage( $query ) {
  if ( !is_admin() && $query->is_home() && $query->is_main_query() ) {
    $query->set( 'post_type', array( 'video', 'gallery', 'article' ) );

    $ppp = 45;
    $query->set( 'posts_per_page', $ppp );
  }
}
add_action('pre_get_posts', __NAMESPACE__ . '\\tax_and_offset_homepage');

function homepage_offset_pagination( $found_posts, $query ) {
    
    $offset = 12;

    if( $query->is_home() && $query->is_main_query() ) {
        $found_posts = $found_posts + $offset;
    }
    return $found_posts;
    
}
add_filter( 'found_posts', __NAMESPACE__ . '\\homepage_offset_pagination', 10, 2 );

/**
* Get custom post type icon
*/
function get_post_type_icon($post_type) {

  if ($post_type == "video"){
      $icon = "fa-play";
  } elseif ($post_type == "gallery") {
      $icon = "fa-clone";
  } elseif ($post_type == "article") {
      $icon = "fa-newspaper-o";
  } else {
    $icon = "";
  }
  return $icon;
}

/**
*  Get sidebar elements
*/
function get_sidebar_elements($sidebar_id){
  // Catch output of sidebar in string
  ob_start();
  dynamic_sidebar($sidebar_id);
  $sidebar_output = ob_get_clean();

  // Create DOMDocument with string (and set encoding to utf-8)
  $dom = new \DOMDocument;
  @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $sidebar_output);              

  // Get IDs of the elements in sidebar, e.g. "text-2"
  global $_wp_sidebars_widgets;
  $sidebar_element_ids = $_wp_sidebars_widgets[$sidebar_id]; // Use ID of your sidebar
  // Save single widgets as html string in array
  $sidebar_elements = [];

  foreach ($sidebar_element_ids as $sidebar_element_id):
    // Get widget by ID
    $element = $dom->getElementByID($sidebar_element_id);
    $sidebar_elements[] = return_dom_node_as_html($element);
  endforeach;

  return $sidebar_elements;
}