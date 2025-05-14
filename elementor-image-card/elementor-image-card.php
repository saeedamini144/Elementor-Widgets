<?php

/**
 * Plugin Name
 *
 * @package PluginPackage
 * @author Saeed Amini
 * @copyright 2025 Saeed Amini
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: elementor image card
 * Plugin URI: https://websemicolon.com/elementor-image-card
 * Description: Custom image card widget for Elementor.
 * Version: 1.0.0
 * Requires at least: 6.2
 * Requires PHP: 8.2
 * Author: Saeed Amini
 * Author URI: https://websemicolon.com
 * Text Domain: Elementor-image-card
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI: https://websemicolon.com/websemicolon-plugin/
 * Requires Plugins: Elementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.security. not allowed user to directly access the widgets
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */

function register_image_card($widgets_manager)
{
    require_once(__DIR__ . '/widgets/image-card.php');
    $widgets_manager->register(new \Elementor_Image_Card());
}
add_action('elementor/widgets/register', 'register_image_card');
