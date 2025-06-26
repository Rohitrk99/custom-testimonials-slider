<?php

add_action('admin_menu', 'cts_admin_menu');
function cts_admin_menu() {
    add_menu_page('Testimonials Slider', 'Testimonials Slider', 'manage_options', 'cts_settings', 'cts_settings_page');
}

function cts_settings_page() {
    if (isset($_POST['cts_save'])) {
        $testimonials = array_map(null, $_POST['cts_message'], $_POST['cts_author']);
        $formatted = [];

        foreach ($testimonials as $index => $entry) {
            $formatted[] = [
                'message' => sanitize_text_field($entry[0]),
                'author'  => sanitize_text_field($entry[1]),
            ];
        }

        update_option('cts_testimonials', $formatted);
        echo '<div class="updated"><p>Saved!</p></div>';
    }

    $testimonials = get_option('cts_testimonials', []);
    ?>
    <div class="wrap">
        <h1>Testimonials</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Message</th>
                    <th>Author</th>
                </tr>
                <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <td><input type="text" name="cts_message[]" value="<?php echo esc_attr($testimonials[$i]['message'] ?? ''); ?>"></td>
                    <td><input type="text" name="cts_author[]" value="<?php echo esc_attr($testimonials[$i]['author'] ?? ''); ?>"></td>
                </tr>
                <?php endfor; ?>
            </table>
            <input type="submit" name="cts_save" class="button-primary" value="Save Testimonials">
        </form>
    </div>
    <?php
}
