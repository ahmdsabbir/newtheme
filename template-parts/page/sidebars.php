<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-span-3 md-order-3">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-span-3 md-order-5">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>