<?php

/**
 * Plugin Name
 *
 * @package PluginPackage
 * @author Saeed Amini
 * @copyright 2024 Saeed Amini
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: essential elementor widgets
 * Plugin URI: https://websemicolon.com/essential-elemntor-widgets
 * Description:Custom Widgets essential apps
 * Version: 1.0.0
 * Requires at least: 6.2
 * Requires PHP: 8.2
 * Author: saeed Amini
 * Author URI: https://websemicolon.com
 * Text Domain: essential-elementor-widgets
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI: https://websemicolon.com/my-plugin/
 * Requires Plugins: Eelementor
 */

if (! defined('ABSPATH')) {
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
// this is the function add the widgets to elementor
function register_essential_custom_widgets($widgets_manager)
{

    require_once(__DIR__ . '/widgets/card-widget.php'); //include the widget file

    $widgets_manager->register(new \Essential_Elementor_Card_Widget()); //register the widget class that use in widget file
}
add_action('elementor/widgets/register', 'register_essential_custom_widgets');


// in this function it checked if the elementor is installed or not , dosent allowd to install the plugin whithout the elementor
//and you must callBack the 'Plugins_loaded' Functions
// function essential_elementor_widgets_init()
// {
//     if (defined('ELEMENTOR_VERSION')) {
//         add_action('elementor/widgets/register', 'register_essential_custom_widgets');
//     }
// }
// add_action('plugins_loaded', 'essential_elementor_widgets_init');