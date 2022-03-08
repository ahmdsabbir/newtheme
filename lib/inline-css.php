<?php
$primary_color = get_theme_mod( '_themename_primary_color', '#13B140' );

$inline_styles = "
    :root {
        --clr-primary: {$primary_color};
    }
    .has-clr-secondary-background-color {
        background-color: var(--clr-secondary);
    }
";