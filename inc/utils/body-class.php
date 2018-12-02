<?php

  /**
   *  jumpoff_body_class
   *  Cleans up body classes, then adds custom, based on page or cpt names
   *  @return: $classes (string)
   */

  add_filter('body_class', function($classes) {

    global $post, $page;


    # Single Pages
    if ( is_single() || is_page() && !is_front_page() ) {

      $classes[] = 'page-' . basename(get_permalink());

    }

    if (is_front_page()) {
      $classes[] = 'page-home';
    }
    if (is_home() || is_singular('post') || is_post_type_archive( 'post' )) {

      $classes[] = 'page-news';

    }

    if ( is_post_type_archive() ) {

      $post_type_obj = get_queried_object();
      $classes[] = 'page-index-'.$post_type_obj->name;

    }

    if ( is_any_post_type() ) {

      $post_type_obj = get_queried_object();
      $post_type = get_post_type_object(get_post_type($post_type_obj));
      $classes[] = 'page-'.$post_type_obj->name;

    }

   $extra_classes = array('');

   $classes = array_merge( $classes, $extra_classes );



    // if(basename(get_page_template()) === 'page.php'){
    //   $classes[] = 'page-default';
    // }
    // if (is_single() || is_page() && !is_front_page()) {
    //   $classes[] = 'page-' . basename(get_permalink());
    // }
    // if (is_home() || is_singular('post') || is_post_type_archive( 'post' )) {
    //   $classes[] = 'page-news';
    // }
    // //Example for CPTs
    // if (is_post_type_archive()) {
    //   $post_type_name = $post->post_type;
    //   $classes[] = 'page-' . $post_type_name;
    // }

    // Remove Classes
    $home_id_class = 'page-id-' . get_option('page_on_front');
    $page_id_class = 'page-id-' . get_the_ID();
    $post_id_class = 'postid-' . get_the_ID();
    $page_template_name_class = 'page-template-page-' . basename(get_permalink());
    $page_template_name_php = 'page-template-page-' . basename(get_permalink()) . '-php';

    // Remove Classes Array
    $remove_classes = array(
      'page-template-default',
      'page-template',
      'single-format-standard',
      $home_id_class,
      $page_id_class,
      $post_id_class,
      $page_template_name_class,
      $page_template_name_php
    );

    // Add specific classes
    // $classes[] = 'is-loading';
    $classes = array_diff($classes, $remove_classes);
    //
    // $extra_classes = array('');
    //
    // $classes = array_merge( $classes, $extra_classes );

    return $classes;

  });
