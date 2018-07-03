<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 *   Nav Active Class.
 *   Adds active class, since we're not using native wp menus
 *
 *   @param    string $page_name
 *   @return   string 'is-active';
 */
function jumpoff_active_class( $page_name ){
  if (is_page( $page_name ) || is_post_type_archive( $page_name )) {
    return 'is-active';
  }
}


/**
 *   Gets page link.
 *   For use with our custom navigations
 *
 *   @param    string $page_name
 *   @return   string 'is-active';
 */
function jumpoff_page_url( $page_name, $cpt='' ){
  if ( $cpt == true ) {
    $page_url = esc_url( get_post_type_archive_link( $page_name ) );
  } else {
    $page_url = esc_url( get_permalink( get_page_by_title( $page_name ) ) );
  }
  return $page_url;
}


/**
 * Get Subpage Links
 * Outputs a post types subpages as nav items
 * @var $post_type sring - The desired post type
 * @var $klass string - class name for link
 * @return string
 */
function jumpoff_get_subpage_links( $post_type, $klass ){
  global $post ;

  $args = array(
   'posts_per_page'   => -1,
   'post_type'        => $post_type,
  );
  $links  = get_posts( $args );
  $output = '';

  foreach ( $links as $post ) : setup_postdata( $post );
    $url     = get_the_permalink();
    $title   = get_the_title();
    $output .= '<a class="'. $klass . '" href="' . $url . '">' . $title . '</a>';
  endforeach;
  wp_reset_postdata();

  return $output;
}
