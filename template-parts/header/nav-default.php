<div class="nav__container">

  <div class="nav__mobile">

    <div class="nav__logo">
      <?php if(has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
      <h6>
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo('name') ); ?></a>
      </h6>
      <?php  endif; ?>
    </div><!-- logo -->

    <div class="nav__btn">
      <a aria-label="Mobile menu" class="nav-toggle fade"><span></span><span class="mrg"></span><span class="mrg"></span></a>
    </div>

  </div>

  <nav  class="menu-toggle" role="navigation" area-label="<?php echo esc_html_e( 'Main Menu', '_themename' ) ?>">
    <?php  
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => '',
        'menu_class' => 'nav__menu',
        'menu_id'   => 'nav',
    ));
    ?><!-- ul:nav-list -->
  </nav>

</div>