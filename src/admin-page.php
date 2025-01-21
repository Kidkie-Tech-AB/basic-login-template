<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add submenu under Tools.
if(!function_exists('blt_add_tools_submenu')):
function blt_add_tools_submenu() {
    add_submenu_page(
        'tools.php',              // Parent menu slug.
        'Set Basic Colors',       // Page title.
        'Basic Login Settings',   // Menu title.
        'manage_options',         // Capability.
        'set-basic-colors',       // Menu slug.
        'blt_render_color_settings'   // Callback function.
    );
}
add_action( 'admin_menu', 'blt_add_tools_submenu' );
endif;

if(!function_exists('blt_render_color_settings')):
// Render the settings page.
function blt_render_color_settings() {
    // Check if user has permission.
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Handle form submission.
    if ( isset( $_POST['submit_colors'] ) ) {
        check_admin_referer( 'save_colors' ); // Security check.

        $bg_color   = sanitize_hex_color( $_POST['bg_color'] );
        $text_color = sanitize_hex_color( $_POST['text_color'] );

        update_option( 'blt_colors_bg', $bg_color );
        update_option( 'blt_colors_text', $text_color );

        echo '<div class="updated"><p>Colors saved successfully!</p></div>';
    }

    // Get the current color settings.
    $bg_color   = get_option( 'blt_colors_bg', '#ffffff' );
    $text_color = get_option( 'blt_colors_text', '#000000' );

    ?>
    <div class="wrap">
        <h1>Set Basic Colors</h1>
        <form method="POST">
            <?php wp_nonce_field( 'save_colors' ); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="bg_color">Background Color</label>
                    </th>
                    <td>
                        <input type="text" id="bg_color" name="bg_color" value="<?php echo esc_attr( $bg_color ); ?>" class="regular-text" />
                        <p class="description">Enter a hex color code for the background.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="text_color">Text Color</label>
                    </th>
                    <td>
                        <input type="text" id="text_color" name="text_color" value="<?php echo esc_attr( $text_color ); ?>" class="regular-text" />
                        <p class="description">Enter a hex color code for the text.</p>
                    </td>
                </tr>
            </table>

            <?php submit_button( 'Save Colors', 'primary', 'submit_colors' ); ?>
        </form>
    </div>
    <?php
}
endif;