<?php
/**
 * Template for site footer
 * 
 * @package _themename
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
      <div id="footer-wrapper" class="footer">

        <div id="footer" role="site-footer">

        <?php 

        /**
         * Here each of the template-parts has <div class="row"> of it's own
         * 
         * _themename_any_widget_active() is in /lib/helpers and returns true if any of the footer widget is active
         */

        if(_themename_any_widget_active()) :
          get_template_part( '/template-parts/footer/footer', 'widgets' );
        endif; 

        get_template_part( '/template-parts/footer/footer', 'info' );

        ?>

        </div><!--container end -->
        
      </div><!--  #footer-wrapper end -->

    </div><!-- .wrapper end -->
  
  <?php wp_footer(); ?>
  </body>
</html>