<nav role="navigation" area-label="<?php echo esc_html_e( 'Main Menu', '_themename' ) ?>">
  
  <div class="navbar">
  
    <div class="brand">
      <?php if(has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
      <h2>
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo('name') ); ?></a>
      </h2>
      <?php  endif; ?>
    </div>
    
    <?php
      
      wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'container' => '',
          'menu_class' => 'nav',
          'menu_id'   => 'nav',
      ));
      ?>
    
    <div id="menu" class="menu-toggle">
      <div class="hamburger"></div>
    </div>
  
  </div>

</nav>