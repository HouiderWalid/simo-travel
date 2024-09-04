<?php

/**
 * Plugin Name: SimoForm
 * Description: This plugin creates a form to submit data
 * Version: 1.0.0
 * Author: Houider Walid
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

add_action('elementor/widgets/widgets_registered', function ($widgets_manager) {
    require_once(__DIR__ . '/widgets/Form_Widget.php');
    $widgets_manager->register(new Form_Widget());
});