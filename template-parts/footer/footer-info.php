<?php
$site_info = get_theme_mod( '_themename_site_info', '' );
?>

<?php if($site_info) : ?>

    
    <div class="cr-text">

        <p id="footer-info">
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

<?php endif; ?>