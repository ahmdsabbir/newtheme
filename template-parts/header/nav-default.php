<nav role="navigation" area-label="<?php echo esc_html_e( 'Main Menu', '_themename' ) ?>">
  
  <div class="navbar">
  
    <div class="logo">
      <?php if(has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
      <h2>
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo('name') ); ?></a>
      </h2>
      <?php  endif; ?>
    </div>

    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>

      <?php  
      wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'container' => '',
          'menu_class' => 'nav-links',
          'menu_id'   => 'nav',
      ));
      ?>
  
  </div>

</nav>