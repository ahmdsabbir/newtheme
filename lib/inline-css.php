<?php
$primary_color = get_theme_mod( '_themename_primary_color', '#13B140' );
$breadcrumb_height = get_theme_mod( '_themename_breadcrumb_height', '#13B140' );

$inline_styles = "
    :root {
        --clr-primary: {$primary_color};
    }
    .has-clr-secondary-background-color {
        background-color: var(--clr-secondary);
    }

    .breadcrumb {
        height: {$breadcrumb_height}rem;
    }

";