<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(!function_exists('blt_custom_login_css')):
function blt_custom_login_css() {
    $text_color = get_option( 'blt_colors_text' );
    $bg_color = get_option( 'blt_colors_bg' );
?>
    <style type="text/css">
    :root {
        --bg-color: <?php echo $bg_color; ?>;
        --text-color: <?php echo $text_color; ?>;
    }
    body.login div#login::before {
        background-color: var(--text-color);       
    }

    body.login form#loginform .submit input[type="submit"] {
        color: var(--bg-color, #FFFFFF) !important;
        border-color: var(--text-color, #0073aa);
        background-color: var(--text-color, #0073aa) !important;
    }
    body.login form#loginform .forgetmenot label {
        color: var(--text-color, #0073aa) !important;
    }
    body.login #backtoblog a, .login #nav a {
        color: var(--text-color, #0073aa) !important;
    }
    body.login .notice.notice-info.message {
        color: var(--text-color, #0073aa);
        border-color: var(--text-color, #0073aa);
    }
    body.login .notice.notice-info.message::after {
        background-color: var(--text-color, #FFFFFF) !important;
    }
    body.login.wp-core-ui .button.button-large {
        color: var(--bg-color, #0073aa);
        border-color: var(--text-color, #0073aa);
        background-color: var(--text-color, #0073aa) !important;
    }
    </style>
<?php
}
add_action('login_head', 'blt_custom_login_css');
endif;