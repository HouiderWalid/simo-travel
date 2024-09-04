<?php

function custom_wp_mail_from($original_email_address)
{
    return 'test@test.com';
}

add_filter('wp_mail_from', 'custom_wp_mail_from');

function custom_wp_mail_from_name($original_email_from)
{
    return 'test';
}

add_filter('wp_mail_from_name', 'custom_wp_mail_from_name');

function log_wp_mail_error($wp_error)
{
    error_log('Mail error: ' . print_r($wp_error, true));
}

add_action('wp_mail_failed', 'log_wp_mail_error');

function custom_smtp_mailer($phpmailer)
{
    $options = get_option('settings');
    $contactEmail = $options['contact_email'] ?? null;
    $contactEmailPassword = $options['contact_email_password'] ?? null;
    $contactEmailName = $options['contact_email_name'] ?? null;
    if (!$contactEmail || !$contactEmailPassword) {
        return;
    }

    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = $contactEmail;
    $phpmailer->Password = $contactEmailPassword;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Port = 587;
    $phpmailer->From = $contactEmail;
    $phpmailer->FromName = $contactEmailName;
}

add_action('phpmailer_init', 'custom_smtp_mailer');

function handle_contact_us_form_submission()
{
    parse_str($_POST['form_data'] ?? null, $formData);
    if ($formData) {

        $options = get_option('settings');
        $to = sanitize_text_field($options['contact_email'] ?? null);
        if (!$to) {
            return;
        }

        $from = sanitize_text_field($formData['email'] ?? null);
        $subject = sanitize_text_field($formData['subject'] ?? null);
        $name = sanitize_text_field($formData['name'] ?? null);
        $message = "You have a new message from $name($from): " . sanitize_text_field($formData['message'] ?? null);
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        if (!wp_mail($to, $subject, $message, $headers)) {
            error_log('error send failure.');
        }

        wp_die();
    }
}

add_action('wp_ajax_handle_contact_us_form_submission', 'handle_contact_us_form_submission');
add_action('wp_ajax_nopriv_handle_contact_us_form_submission', 'handle_contact_us_form_submission');