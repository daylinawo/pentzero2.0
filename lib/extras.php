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
    $query->set( 'post_type', array( 'videos', 'gallery' ) );

    $ppp = get_option( 'posts_per_page' );
//$ppp = 48;
    $offset = 12;
    if ( !$query->is_paged() ) {
      $query->set( 'posts_per_page', $ppp - $offset );
    } else {
      $offset = ( ( $query->query_vars['paged']-1 ) * $ppp ) - $offset;
      $query->set( 'posts_per_page', $ppp );
      $query->set( 'offset', $offset );
    }
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