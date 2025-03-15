<?php

use function PHPSTORM_META\type;

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

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon(): string
    {
        return 'eicon-elementor'; //for choose the icon widget must use the eicon (Elementor icon)
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url(): string
    {
        return 'https://websemicolon.com/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories(): array
    {
        return ['general']; // choose witch category widget must be in
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords(): array
    {
        return ['oembed', 'url', 'Link', 'card_text', 'card', 'services'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        //content tab start
        //contorl function code must be here
        $this->start_controls_section(
            'content_section', //the section that has the kept teh content
            [
                'label' => esc_html__('Content', 'essential-elementor-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Card title', 'essential-elementor-widgets'),
                'placeholder' => esc_html__('Type your title here', 'essential-elementor-widgets'),
            ]
        );

        $this->add_control(
            'Card_description',
            [
                'label' => esc_html__('Card Description', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'essential-elementor-widgets'),
                'placeholder' => esc_html__('Type your description here', 'essential-elementor-widgets'),
            ]
        );

        //input field control goes here
        $this->end_controls_section();
        //content tab end

        //style tab start
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Card Content Color', 'essential-elementor-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'Description_color',
            [
                'label' => esc_html__('Card Description', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_descriptions' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Card Title', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-title' => ' color: {{VALUE}} ',
                ],
            ]
        );

        $this->end_controls_section();
        //style tab end
    }


    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render(): void
    {
        $settings = $this->get_settings_for_display();

        //get the individual value of input
        $card_title = $settings['card_title'];
        $Card_description = $settings['Card_description'];

        // if (empty($settings['url'])) {
        //     return;
        // }

        // $html = wp_oembed_get($settings['url']);

        //start rendering the output
?>
        <div class="card">
            <h3 class="card-title"><?php echo $card_title ?></h3>
            <p class="card_descriptions"><?php echo $Card_description ?></p>
        </div>
<?php
        //end rendering the output
    }
}
