<?php

// این خط برای جلوگیری از دسترسی مستقیم به فایل است.
// اگر فایل مستقیماً فراخوانی شود (نه از طریق وردپرس)، اسکریپت متوقف می‌شود.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * Elementor Image Card Widget.
 *
 * این کلاس یک ویجت المنتور را تعریف می‌کند که برای نمایش یک کارت تصویر همراه با عنوان و توضیحات استفاده می‌شود.
 * این ویجت از کلاس پایه Widget_Base المنتور ارث‌بری می‌کند.
 *
 * @since 1.0.0 - تاریخ ایجاد یا اولین انتشار ویجت.
 */

class Elementor_Image_Card extends \Elementor\Widget_Base
{

    // متد get_name نام داخلی و یونیک ویجت را برمی‌گرداند.
    // این نام برای شناسایی ویجت در المنتور استفاده می‌شود و نباید حاوی کاراکترهای خاص یا فاصله باشد.
    public function get_name()
    {
        return 'image-card';
    }

    // متد get_title عنوان قابل نمایش ویجت در پنل المنتور را برمی‌گرداند.
    // از تابع__() برای قابلیت ترجمه استفاده شده است.
    public function get_title()
    {
        return __('Image Card', 'elementor-image-card');
    }

    // متد get_icon آیکون ویجت را در پنل المنتور مشخص می‌کند.
    // از کلاس‌های آیکون المنتور (eicon-) استفاده می‌شود.
    public function get_icon()
    {
        return 'eicon-image-box';
    }

    // متد get_categories دسته‌بندی ویجت را در پنل المنتور مشخص می‌کند.
    // 'general' یک دسته‌بندی استاندارد است. می‌توانید دسته‌بندی‌های سفارشی نیز اضافه کنید.
    public function get_categories()
    {
        return ['general'];
    }

    // متد get_keywords کلمات کلیدی برای جستجوی ویجت در پنل المنتور را برمی‌گرداند.
    // این کمک می‌کند کاربران راحت‌تر ویجت شما را پیدا کنند.
    public function get_keywords()
    {
        return ['image', 'card', 'image card', 'image box'];
    }

    // متد get_custom_help_url یک URL برای لینک راهنمای ویجت در پنل المنتور برمی‌گرداند.
    // این لینک به کاربران کمک می‌کند مستندات ویجت شما را پیدا کنند.
    public function get_custom_help_url()
    {
        return 'https://websemicolon.com/elementor-image-card';
    }

    // متد get_upsale_data برای نمایش اطلاعات مرتبط با نسخه حرفه‌ای (Pro) یا افزونه‌های مرتبط استفاده می‌شود.
    // اگر ویجت شما دارای نسخه رایگان و حرفه‌ای باشد، می‌توانید در نسخه رایگان اطلاعات نسخه حرفه‌ای را نمایش دهید.
    // در اینجا یک مثال پایه پیاده‌سازی شده است.
    protected function get_upsale_data(): array
    {
        return [
            'condition' => true, // آیا این بخش نمایش داده شود؟
            'title' => __('Image Card', 'elementor-image-card'),
            'description' => __('Custom image card widget for Elementor.', 'elementor-image-card'),
            'url' => 'https://websemicolon.com/elementor-image-card', // لینک به صفحه محصول یا مستندات
            'image' => plugins_url('assets/images/image-card.png', __FILE__), // مسیر تصویر برای نمایش
        ];
    }

    /**
     * متد has_widget_inner_wrapper تعیین می‌کند که آیا ویجت نیاز به wrapper داخلی پیش‌فرض المنتور (.elementor-widget-container) دارد یا خیر.
     * برگرداندن false باعث حذف این wrapper می‌شود که می‌تواند برای بهینه‌سازی DOM مفید باشد اما ممکن است نیاز به مدیریت پدینگ/مارجین به صورت دستی داشته باشید.
     *
     * @since 1.0.0
     * @access public
     * @return bool
     */
    public function has_widget_inner_wrapper(): bool
    {
        return false; // wrapper پیش‌فرض المنتور را حذف می‌کند.
    }

    /**
     * متد is_dynamic_content تعیین می‌کند که آیا محتوای ویجت پویا است (مانند نمایش نام کاربر لاگین شده) یا ایستا.
     * اگر false باشد، المنتور می‌تواند خروجی ویجت را کش (cache) کند.
     * برای این ویجت که محتوای آن ثابت است (تصویر، عنوان، توضیحات)، false مناسب است.
     *
     * @since 1.0.0
     * @access protected
     * @return bool
     */
    protected function is_dynamic_content(): bool
    {
        return false; // محتوای ویجت پویا نیست و قابل کش کردن است.
    }


    // متد register_controls کنترل‌ها (تنظیمات) ویجت را در پنل المنتور تعریف می‌کند.
    // این متد جایی است که شما فیلدهایی مانند انتخاب تصویر، وارد کردن عنوان و متن را اضافه می‌کنید.
    protected function register_controls(): void
    {
        // شروع یک بخش جدید در پنل تنظیمات ویجت (تب Content).
        $this->start_controls_section(
            'content_section', // نام یونیک بخش
            [
                'label' => esc_html__('Content', 'elementor-image-card'), // عنوان قابل نمایش بخش
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // مشخص کردن تب (در اینجا تب محتوا)
            ]
        );

        // اضافه کردن کنترل انتخاب تصویر.
        $this->add_control(
            'image', // نام کنترل
            [
                'label' => esc_html__('choose image', 'elementor-image-card'), // عنوان قابل نمایش کنترل
                'type' => \Elementor\Controls_Manager::MEDIA, // نوع کنترل (انتخاب فایل رسانه)
                // کد زیر برای تنظیم تصویر پیش‌فرض است که فعلاً کامنت شده.
                // 'default' => [
                //     'url' => \Elementor\Utils::get_placeholder_image_src(),
                // ],
            ]
        );

        // اضافه کردن کنترل فیلد متنی برای عنوان.
        $this->add_control(
            'title', // نام کنترل
            [
                'label' => esc_html__('title', 'elementor-image-card'), // عنوان قابل نمایش کنترل
                'type' => \Elementor\Controls_Manager::TEXT, // نوع کنترل (فیلد متنی ساده)
                // کد زیر برای تنظیم مقدار پیش‌فرض است که فعلاً کامنت شده.
                // 'default' => esc_html__('Image Card Title', 'elementor-image-card'),
                'placeholder' => esc_html__('Type your title here', 'elementor-image-card'), // متن راهنما در فیلد خالی
            ]
        );

        // اضافه کردن کنترل فیلد متنی چند خطی (textarea) برای توضیحات.
        $this->add_control(
            'description', // نام کنترل
            [
                'label' => esc_html__('description', 'elementor-image-card'), // عنوان قابل نمایش کنترل
                'type' => \Elementor\Controls_Manager::TEXTAREA, // نوع کنترل (جعبه متن)
                'placeholder' => esc_html__('Type your description here', 'elementor-image-card'), // متن راهنما در فیلد خالی
                'rows' => 10, // تعداد سطر قابل نمایش در جعبه متن
            ]
        );

        // پایان بخش تنظیمات محتوا.
        $this->end_controls_section();
    }

    // متد render خروجی نهایی HTML ویجت را برای نمایش در فرانت‌اند (وبسایت برای کاربران) تولید می‌کند.
    // این کد با PHP خالص نوشته می‌شود.
    protected function render(): void
    {
        // گرفتن تنظیماتی که کاربر در پنل المنتور وارد کرده است.
        $settings = $this->get_settings_for_display();

        echo '<div class="elementor-image-card-wrapper">';

        // تولید کد HTML تصویر.
        // توجه: برای URL بهتر است از esc_url به جای esc_html استفاده شود.
        // متن جایگزین (alt) تصویر از عنوان ویجت گرفته شده است.
        echo '<img src="' . esc_url($settings['image']['url'])  . '" alt="' . esc_attr($settings['title']) . '">';

        // تولید کد HTML عنوان.
        // از تابع esc_html برای جلوگیری از مشکلات امنیتی احتمالی (مثل XSS) در نمایش متن استفاده شده است.
        echo '<h2 class="img-card">' . esc_html($settings['title']) . '</h2>';


        // این یک کامنت و مثال برای روش دیگر نمایش عنوان با سینتکس PHP است که غیرفعال است.
        //<h2>
        /*<?php echo $settings['title']; ?>*/
        //</h2> //another way of the rendering the title

        // تولید کد HTML توضیحات.
        // از تابع esc_html برای توضیحات استفاده شده است.
        echo '<p class="img-card">' . esc_html($settings['description']) . '</p>';
        echo '</div>';
    }

    //tab style section
    // protected function register_controls(): void{

    // }


    // متد content_template خروجی HTML ویجت را برای نمایش در پیش‌نمایش ویرایشگر المنتور (live preview) تولید می‌کند.
    // این کد از سینتکس Handlebars (قالب‌بندی المنتور) استفاده می‌کند.
    protected function content_template(): void
    {
        // گرفتن تنظیمات (این متد در پیش‌نمایش نیازی به فراخوانی صریح get_settings_for_display ندارد،
        // اما برای هماهنگی و خوانایی بهتر نگه داشته شده است).
        $settings = $this->get_settings_for_display();
?>
        <div class="elementor-image-card-wrapper">
            <img src="{{settings.image.url}}" alt="{{settings.title}}">
            <h2 class="image-card-title">{{settings.title}}</h2>
            <p class="image-card-description">{{settings.description}}</p>
        </div>
<?php
        $this->end_controls_section();
    }
}
