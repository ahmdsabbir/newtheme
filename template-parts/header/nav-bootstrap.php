<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="<?php echo esc_html_e( 'Main Menu', '_themename' ); ?>">

    <div class="container">

      <?php if(has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo('name') ); ?></a>
      <?php  endif; ?>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php
      
      wp_nav_menu(array(
          'theme_location' => 'main-menu',
      ));
      ?>

      </div><!-- #navbarSupportedContent -->
    
    </div><!-- container end -->

</nav>