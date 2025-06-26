<?php
/**
 * Plugin Name: Custom Testimonials Slider
 * Description: Adds a responsive testimonial slider using shortcode and admin panel.
 * Version: 1.0
 * Author: Rohit Kumar
 */

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';

function cts_enqueue_assets() {
    wp_enqueue_style('cts-slider-style', plugin_dir_url(__FILE__) . 'assets/slider.css');
}
add_action('wp_enqueue_scripts', 'cts_enqueue_assets');
