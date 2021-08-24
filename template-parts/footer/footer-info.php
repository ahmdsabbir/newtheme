<?php
$site_info = get_theme_mod( '_themename_site_info', '' );
?>

<?php if($site_info) : ?>

    <div class="container">
            <div class="sm-12 md-12 lg-12">

            <p id="footer-info" class="text-center text-uppercase">
                <?php 
                $allowed = [
                    'a' => [
                        'href' => [],
                        'title' => [],
        
                    ]
                ];
                echo wp_kses( $site_info, $allowed );
                ?>
            </p>

            </div><!-- .col-12 end -->
    </div><!-- .row end -->

<?php endif; ?>