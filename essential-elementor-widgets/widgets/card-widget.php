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
            'title_link',
            [
                'label' => esc_html__('Link title', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
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
            'section_description_style',
            [
                'label' => esc_html__('Description Style', 'essential-elementor-widgets'),
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
        $this->end_controls_section();
        //style tab end


        //new tab style

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title Style', 'essential-elementor-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

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

        $this->add_control(
            'title_dimenstion',
            [
                'label' => esc_html__('Title Padding', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .card-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover',
            [
                'label' => esc_html__('title Hover', 'essential-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
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

        $card_title = $settings['card_title'];
        $Card_description = $settings['Card_description'];

        if (! empty($settings['title_link']['url'])) {
            $this->add_link_attributes('title_link', $settings['title_link']);
        }

        if (!empty($settings['title_hover'])) {
            $this->add_render_attribute(
                'card_title_element', // کلید
                'class', // نام ویژگی
                'elementor-animation-' . $settings['title_hover'] // مقدار ویژگی
            );
        }

        // if (!empty($settings['title_hover'])) {
        //     $card_title .=  'elementor-animation-' . $settings['title_hover'];
        // }
        // $this->add_render_attribute(
        //     'card_title_element', // کلید
        //     'class', // نام ویژگی
        //     'elementor-animation-' . $settings['title_hover'] // مقدار ویژگی
        // );
        // <?php $this->print_render_attribute_string('card_title_element') 
?>
        <div class="card">
            <!-- change it to string -->
            <a <?php $this->print_render_attribute_string('title_link'); ?>>
                <h3 class="card-title" <?php $this->print_render_attribute_string('card_title_element') ?>><?php echo esc_html($card_title); ?></h3>
            </a>
            <p class="card_descriptions"><?php echo esc_html($Card_description); ?></p>
        </div>
    <?php
    }

    protected function content_template(): void
    {
    ?>
        <div class="card">
            <a href="{{ settings.title_link.url }}">
                <h3 class="card-title elementor-animation-{{setting.title_hover}}">{{ settings.card_title }}</h3>
            </a>
            <p class="card_descriptions">{{ settings.Card_description }}</p>
        </div>
<?php
    }
}
