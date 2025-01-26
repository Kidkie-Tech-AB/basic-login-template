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
    body.login:not(.interim-login) {
        background: var(--text-color, rgb(238, 174, 202));
        background: -moz-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, var(--text-color, rgba(148, 187, 233, 1)) 100%);
        background: -webkit-radial-gradient(circle, rgba(238, 174, 202, 1) 0%, var(--text-color, rgba(148, 187, 233, 1)) 100%);
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, var(--text-color, rgba(148, 187, 233, 1)) 100%);
    }
    body.login:not(.interim-login) div#login::before {
        background-color: var(--text-color);       
    }
    body.login:not(.interim-login) form#loginform .submit input[type="submit"] {
        color: var(--bg-color, #FFFFFF) !important;
        border-color: var(--text-color, #0073aa);
        background-color: var(--text-color, #0073aa) !important;
    }
    body.login:not(.interim-login) form#loginform .forgetmenot label {
        color: var(--text-color, #0073aa) !important;
    }
    body.login:not(.interim-login) #backtoblog a, .login #nav a {
        color: var(--text-color, #0073aa) !important;
    }
    body.login:not(.interim-login) .notice.notice-info.message {
        color: var(--text-color, #0073aa);
        border-color: var(--text-color, #0073aa);
    }
    body.login:not(.interim-login) .notice.notice-info.message::after {
        background-color: var(--text-color, #FFFFFF) !important;
    }
    body.login.wp-core-ui:not(.interim-login) .button.button-large {
        color: var(--bg-color, #0073aa);
        border-color: var(--text-color, #0073aa);
        background-color: var(--text-color, #0073aa) !important;
    }
    body.login:not(.interim-login) a, body.login:not(.interim-login) a:hover {
        color: var(--text-color, #0073aa) !important;
    }
    </style>
<?php
}
add_action('login_head', 'blt_custom_login_css');
endif;