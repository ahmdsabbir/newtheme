<nav role="navigation">

<div class="container">

  <div class="sm-col-span-12 md-col-span-4">
    <?php if(has_custom_logo()) : ?>
      <?php the_custom_logo(); ?>
    <?php else: ?>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo('name') ); ?></a>
    <?php  endif; ?>
  </div>

  <div class="sm-col-span-12 md-col-span-8">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'main-menu',
    ));
    ?>
  </div>

</div>

</nav>