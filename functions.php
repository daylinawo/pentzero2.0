<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/wp-pent-cpt.php', // Custom post types
  'lib/wp-bootstrap-navwalker.php', // Bootstrap nav walker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/* 
  =================================
          SETUP CUSTOM LOGO
  =================================
*/
function penttheme_setup() {
  add_theme_support('custom-logo', array(
          'height'      => 240, 
          'width'       => 240,
          'flex-height' => true,
          'flex-width'  => true,
      ));
}
add_action('after_setup_theme', 'penttheme_setup');

// Create function to call logo in header

function penttheme_the_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('the_custom_logo'))
        $output = the_custom_logo();

    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    else
        $output = '<h1><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';

    echo $output;
}
/* --------------------------------
      CHANGE CUSTOM LOGO CLASS
   --------------------------------
*/
add_filter('get_custom_logo','change_logo_class');


function change_logo_class($html)
{
  $html = str_replace('class="custom-logo-link"', 'class="custom-logo-link navbar-brand"', $html);
  return $html;
}

/* ======================================
        DYNAMIC COPYRIGHT DATE FUNC
  ======================================
*/
function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
          if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
          }
        $output = $copyright;
    }
    return $output;
}

// Return dom node from other document as html string
function return_dom_node_as_html($element) {

    $newdoc = new DOMDocument();
    $newdoc->appendChild($newdoc->importNode($element, TRUE));

    return $newdoc->saveHTML();
}
// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
  global $post;
  $text = get_field('video_description'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 20; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}

/* Function which displays your post date in time ago format */
function meks_time_ago() {
  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

