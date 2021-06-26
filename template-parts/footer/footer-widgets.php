<div class="row">

<?php
$footer_layout = '3,3,3,3,';
$columns = explode(',', $footer_layout);
?>

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