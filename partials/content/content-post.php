<?php
/**
 * Post Content
 *
 * @author    Stephen Scaff
 * @package   partials/content
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$post_link = get_the_permalink();
$post_title = get_the_title();
$post_img = jumpoff_ft_img();
$post_excerpt = jumpoff_excerpt(150);

?>

<article class="post">
  <a class="post__link" href="<?php echo $post_link; ?>">
    <figure class="post__figure">
      <img class="post__img" src="<?php echo $post_img; ?>"/>
    </figure>
    <div class="post__content">
      <span class="post__date"><?php the_time('m/d/y'); ?></span>
      <h4 class="post__title"><?php echo $post_title; ?></h4>
      <p class="post__excerpt"><?php echo $post_excerpt; ?></p>
      <span class="post__btn btn-line">Read On</span>
    </div>
  </a>
</article>
