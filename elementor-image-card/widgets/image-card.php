<?php
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Elementor_Image_Card extends Widget_Base
{

    public function get_name()
    {
        return 'image-card';
    }

    public function get_title()
    {
        return __('Image Card', 'elementor-image-card');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['image', 'card', 'image card', 'image box'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-image-card'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'elementor-image-card'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-image-card'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'elementor-image-card'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elementor-image-card'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your description here', 'elementor-image-card'),
                'rows' => 6,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'elementor-image-card'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'elementor-image-card'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-card-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'elementor-image-card'),
                'selector' => '{{WRAPPER}} .image-card-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'elementor-image-card'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-card-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'elementor-image-card'),
                'selector' => '{{WRAPPER}} .image-card-description',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="elementor-image-card-wrapper">
            <?php if (!empty($settings['image']['url'])) : ?>
                <figure class="elementor-image-card-image">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </figure>
            <?php endif; ?>

            <div class="elementor-image-card-content">
                <?php if (!empty($settings['title'])) : ?>
                    <h2 class="image-card-title"><?php echo esc_html($settings['title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['description'])) : ?>
                    <p class="image-card-description"><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }

    protected function content_template()
    {
    ?>
        <div class="elementor-image-card-wrapper">
            <# if ( settings.image && settings.image.url ) { #>
                <figure class="elementor-image-card-image">
                    <img src="{{ settings.image.url }}" alt="{{ settings.title }}">
                </figure>
                <# } #>
                    <div class="elementor-image-card-content">
                        <# if ( settings.title ) { #>
                            <h2 class="image-card-title">{{{ settings.title }}}</h2>
                            <# } #>
                                <# if ( settings.description ) { #>
                                    <p class="image-card-description">{{{ settings.description }}}</p>
                                    <# } #>
                    </div>
        </div>
<?php
    }
}
