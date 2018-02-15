<?php
/**
 * Limit Posts
 * Creates a filter for offsetting posts and ajaxed pagination.
 */
function jumpoff_limit_posts($limit) {
  // globals
  global $paged, $postOffset;

  if (empty($paged)) {
    $paged = 1;
  }

  // Posts Per Page
  $ppp = intval( get_option('posts_per_page') );

  // Create offset
  $pagedStart = ((intval($paged) -1) * $ppp) + $postOffset . ', ';

  // Limit Posts
  $limit = 'LIMIT '.$pagedStart.$ppp;

  return $limit;
}
