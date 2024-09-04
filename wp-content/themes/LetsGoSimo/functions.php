<?php
add_theme_support('post-thumbnails');

function load_css()
{
    wp_register_script('tailwind', 'https://cdn.tailwindcss.com/3.4.5', [], '3.4.5');
    wp_enqueue_script('tailwind');
    wp_register_style('main_css', get_template_directory_uri() . '/css/main.css', []);
    wp_enqueue_style('main_css');
}

add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'load_js');

require_once get_template_directory() . '/inc/excursion.php';
require_once get_template_directory() . '/inc/excursion_type.php';
require_once get_template_directory() . '/inc/reservation.php';
require_once get_template_directory() . '/inc/email.php';
require_once get_template_directory() . '/inc/create_reservation.php';

function my_custom_dashboard_menu()
{
    add_menu_page(
        'Site General Information',          // Page title
        'Site Info',          // Menu title
        'manage_options',           // Capability
        'settings',          // Menu slug
        'settings_page',  // Callback function to display the page content
        'dashicons-admin-generic',  // Icon URL (optional)
        90                          // Position (optional)
    );
}

add_action('admin_menu', 'my_custom_dashboard_menu');

function settings_page()
{
    ?>
    <div class="wrap">
        <h1>Site General Information</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('settings_group'); // Settings group name
            do_settings_sections('settings');     // Settings page slug
            submit_button();                            // Save button
            ?>
        </form>
    </div>
    <?php
}

function settings_init()
{
    // Register a new setting for the group
    register_setting('settings_group', 'settings');

    add_settings_section(
        'seo_settings_section',
        'SEO Settings',
        'seo_section_callback',
        'settings'
    );

    add_settings_field(
        'title',
        'Title',
        'title_callback',
        'settings',
        'seo_settings_section'
    );

    add_settings_field(
        'keywords',
        'Keywords',
        'keywords_callback',
        'settings',
        'seo_settings_section'
    );

    add_settings_field(
        'description',
        'Description',
        'description_callback',
        'settings',
        'seo_settings_section'
    );

    add_settings_section(
        'contact_settings_section',
        'Contact Settings',
        'contact_section_callback',
        'settings'
    );

    add_settings_field(
        'phone_number',
        'Phone number',
        'phone_number_callback',
        'settings',
        'contact_settings_section'
    );

    add_settings_field(
        'email',
        'Email',
        'email_callback',
        'settings',
        'contact_settings_section'
    );

    add_settings_section(
        'contact_email_settings_section',
        'Contact Email Settings',
        'contact_email_section_callback',
        'settings'
    );

    add_settings_field(
        'contact_email',
        'Contact Gmail',
        'contact_email_callback',
        'settings',
        'contact_email_settings_section'
    );

    add_settings_field(
        'contact_email_name',
        'Contact Email Name',
        'contact_email_name_callback',
        'settings',
        'contact_email_settings_section'
    );

    add_settings_field(
        'contact_email_password',
        'Contact Email Password',
        'contact_email_password_callback',
        'settings',
        'contact_email_settings_section'
    );

    add_settings_section(
        'social_media_settings_section',
        'Social Media Settings',
        'social_media_section_callback',
        'settings'
    );

    add_settings_field(
        'facebook_url',
        'Facebook URL',
        'facebook_url_callback',
        'settings',
        'social_media_settings_section'
    );

    add_settings_field(
        'instagram_url',
        'Instagram URL',
        'instagram_url_callback',
        'settings',
        'social_media_settings_section'
    );
}

add_action('admin_init', 'settings_init');

function seo_section_callback()
{
    echo '<p>Enter your custom SEO data:</p>';
}

function social_media_section_callback()
{
    echo '<p>Enter your social media URLs below:</p>';
}

function contact_section_callback()
{
    echo '<p>Enter your contact info below:</p>';
}

function contact_email_section_callback()
{
    echo '<p>Enter your contact email info below:</p>';
}

function title_callback()
{
    $options = get_option('settings');
    ?>
    <input type="text" style="width: 100%; max-width: 500px" name="settings[title]"
           value="<?php echo isset($options['title']) ? esc_attr($options['title']) : ''; ?>"/>
    <?php
}

function keywords_callback()
{
    $options = get_option('settings');
    ?>
    <input type="text" style="width: 100%; max-width: 500px" name="settings[keywords]"
           value="<?php echo isset($options['keywords']) ? esc_attr($options['keywords']) : ''; ?>"/>
    <?php
}

function description_callback()
{
    $options = get_option('settings');
    ?>
    <textarea rows="5" type="text" style="width: 100%; max-width: 500px"
              name="settings[description]"><?php echo isset($options['description']) ? esc_attr($options['description']) : ''; ?></textarea>
    <?php
}

function email_callback()
{
    $options = get_option('settings');
    ?>
    <input type="email" style="width: 100%; max-width: 500px" name="settings[email]"
           value="<?php echo isset($options['email']) ? esc_attr($options['email']) : ''; ?>"/>
    <?php
}

function phone_number_callback()
{
    $options = get_option('settings');
    ?>
    <input type="tel" style="width: 100%; max-width: 500px" name="settings[phone_number]"
           value="<?php echo isset($options['phone_number']) ? esc_attr($options['phone_number']) : ''; ?>"/>
    <?php
}

function facebook_url_callback()
{
    $options = get_option('settings');
    ?>
    <input type="url" style="width: 100%; max-width: 500px" name="settings[facebook_url]"
           value="<?php echo isset($options['facebook_url']) ? esc_attr($options['facebook_url']) : ''; ?>"/>
    <?php
}

function instagram_url_callback()
{
    $options = get_option('settings');
    ?>
    <input type="url" style="width: 100%; max-width: 500px" name="settings[instagram_url]"
           value="<?php echo isset($options['instagram_url']) ? esc_attr($options['instagram_url']) : ''; ?>"/>
    <?php
}

function contact_email_callback()
{
    $options = get_option('settings');
    ?>
    <input type="email" style="width: 100%; max-width: 500px" name="settings[contact_email]"
           value="<?php echo isset($options['contact_email']) ? esc_attr($options['contact_email']) : ''; ?>"/>
    <?php
}

function contact_email_name_callback()
{
    $options = get_option('settings');
    ?>
    <input type="text" style="width: 100%; max-width: 500px" name="settings[contact_email_name]"
           value="<?php echo isset($options['contact_email_name']) ? esc_attr($options['contact_email_name']) : ''; ?>"/>
    <?php
}

function contact_email_password_callback()
{
    $options = get_option('settings');
    ?>
    <input type="password" style="width: 100%; max-width: 500px" name="settings[contact_email_password]"
           value="<?php echo isset($options['contact_email_password']) ? esc_attr($options['contact_email_password']) : ''; ?>"/>
    <?php
}