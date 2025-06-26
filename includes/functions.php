<?php

function cts_render_testimonials() {
    $testimonials = get_option('cts_testimonials', []);
    ob_start(); ?>

    <div class="cts-slider">
        <?php foreach ($testimonials as $testimonial): ?>
            <div class="cts-slide">
                <p class="cts-message"><?php echo esc_html($testimonial['message']); ?></p>
                <h4 class="cts-author">– <?php echo esc_html($testimonial['author']); ?></h4>
            </div>
        <?php endforeach; ?>
    </div>

    <?php return ob_get_clean();
}

add_shortcode('testimonial_slider', 'cts_render_testimonials');
