<?php
$site_info = get_theme_mod( '_themename_site_info', '' );
?>

<?php if($site_info) : ?>

    <div class="grid">
            <div class="sm-col-span-12 md-col-span-12">

            <p id="footer-info" class="">
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