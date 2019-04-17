<?php
/**
 *  Views/Shared/Welcome
 *  Trash me
 *
 *  @author    Stephen Scaff
 *  @package   jumpoff
 */

namespace Jumpoff;

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<main>

<section class="mast pad-xl">
  <div class="grid-sm">
    <h1 class="mast__title">
      The Jumpoff - <span class="color-grey">Just a simple Wp + Gulp project starter to set it off.</span>
    </h2>
    <p class="mast__text">
      Contains some intergrated wp functionalitythat I use a good bit (see inc directory), StoutLogic's ACF builder, an ACF module class, an admin theme, and a tiny front-end framework of sorts.
    </p>
  </div>
</section>

</main>

<?php get_footer(); ?>
