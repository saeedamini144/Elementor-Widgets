<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.security. not allowed user to directly access the widgets
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Essential_Elementor_Card_Widget extends \Elementor\Widget_Base
{
    //the widget code must be here


    /**
     * Get widget name.
     *
     * Retrieve card widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name(): string
    {
        return 'card';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title(): string
    {
        return esc_html__('Essential Card', 'essential-elementor-widgets'); //must add the text domain name (use it special when someone wants to translate) , and the first string show the widgets name in elementor when the user wants to use
    }
}
