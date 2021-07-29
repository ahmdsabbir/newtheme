
<?php
$footer_layout = sanitize_text_field(get_theme_mod( '_themename_footer_layout', '3,3,3,3' ));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
?>

<div class="row">

    <?php 

    foreach($columns as $index => $column) : ?>

        <div class="col-<?php echo $column ?>">
        <?php
        if( is_active_sidebar( 'footer-sidebar-' . ($index + 1) ) ) {
            dynamic_sidebar('footer-sidebar-' . ($index + 1));
        }
        ?>
        </div>

    <?php endforeach; ?>

</div><!-- .row end -->