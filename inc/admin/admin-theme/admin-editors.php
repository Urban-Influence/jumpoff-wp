<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Editor Toolbars
 * Class for customizing Wp Editor Toolbars, for
 * Visual (TinyMCE), Text (Qtags) and ACF toolbars
 */
class AdminEditors {

  function __construct(){
    add_action( 'admin_print_footer_scripts', array( $this, 'text_editor_toolbar' ), 999 );
    add_filter( 'tiny_mce_before_init', array( $this, 'visual_editor_toolbar' ));
    add_filter('acf/fields/wysiwyg/toolbars' , array( $this, 'acf_toolbar') );
    //add_action( 'admin_init', array($this, 'hide_editor' ));
  }

  /**
   * Text Editor Toolbar
   * Used qtags editor
   */
  function text_editor_toolbar(){
    ?>
    <script type="text/javascript">
      QTags.addButton( 'h2-title', 'Title', '<h2>', '</h2>', '2', 'Title', 1 );
      QTags.addButton( 'h4-subtitle', 'Subtitle', '<h4>', '</h4>', '3', 'Subtitle', 1 );
      QTags.addButton( 'h4-subtitle-grey', 'Subtitle Grey', '<h4>', '</h4>', '4', 'Subtitle Grey', 1 );
      QTags.addButton( 'h5-title', 'Small Heading', '<h5>', '</h5>', '5', 'Small Heading', 1 );
      QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep sep--alpha"/>', '', 's', 'Seperator', 202 );
      QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
    </script>
    <?php
  }

  /**
   * Visual Editor Toolbar
   * Used Tiny MCE
   */
  function visual_editor_toolbar($toolbar){
    $toolbar['block_formats'] = "Title=h2; Subtitle=h3; Subtitle Grey=h4; Small Heading=h5; Paragraph=p";
    $toolbar['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,hr,alignleft,link,unlink,spellchecker,pastetext,removeformat,plyr,wp_fullscreen';
    $toolbar['toolbar2'] = '';

    return $toolbar;
  }

  /**
   * ACF Toolbars
   * For the ACF editor field.
   */
  function acf_toolbar( $toolbar ){
    $toolbar['Full'] = array();
    $toolbar['Full'][1] = array('formatselect', 'bold', 'italic', 'underline', 'alignleft', 'aligncenter', 'blockquote', 'hr', 'bullist', 'numlist', 'removeformat', );
    $toolbar['Full'][2] = array();

    // remove the 'Basic' toolbar completely (if you want)
    unset( $toolbar['Basic' ] );

    return $toolbar;
  }

  /**
   * Hide COntent Editor
   */
  function hide_editor() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
    $title = get_the_title($post_id);

    if( in_array($title, array('Home', 'Contact')) ) {
      remove_post_type_support('page', 'editor');
    }
  }
}

new AdminEditors;
