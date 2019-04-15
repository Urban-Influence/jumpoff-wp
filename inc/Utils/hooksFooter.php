<?php

/**
 * Bugherd JS
 * Adds the bugherd js to the footer
 */
add_action ( 'wp_footer', function() {
  ?>
  <script type='text/javascript'>
  (function (d, t) {
    var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
    bh.type = 'text/javascript';
    bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=xxxxxxxxxxx';
    s.parentNode.insertBefore(bh, s);
    })(document, 'script');
  </script>
<?php
});
