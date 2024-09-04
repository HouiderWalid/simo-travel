<?php

function create_reservation_ajax_script()
{
    wp_enqueue_script('create_reservation_ajax_script', get_template_directory_uri() . '/js/globals.js', ['jquery'], null, true);
    wp_localize_script('create_reservation_ajax_script', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);
}

add_action('wp_enqueue_scripts', 'create_reservation_ajax_script');

function handle_reservation_form_submission()
{
    if (isset($_POST['form_data'])) {
        parse_str($_POST['form_data'], $formData);


        $nonce = $formData['reservation_form_nonce'];
        if (!$nonce || !wp_verify_nonce($nonce, 'reservation_form_action')) {
            wp_send_json_error(['message' => 'Nonce verification failed.'], 500);
            exit;
        }

        $fullName = sanitize_text_field($formData['full_name'] ?? null);
        $phoneNumber = sanitize_text_field($formData['phone_number'] ?? null);
        $email = sanitize_text_field($formData['email'] ?? null);
        $pickupDate = sanitize_text_field($formData['pickup_date'] ?? null);
        $pickupTime = sanitize_text_field($formData['pickup_time'] ?? null);
        $pickupAddress = sanitize_text_field($formData['pickup_address'] ?? null);
        $pickupChamberNumber = sanitize_text_field($formData['pickup_chamber_number'] ?? null);
        $passengers = sanitize_text_field($formData['passengers'] ?? null);
        $postData = array(
            'post_title' => $fullName,
            'post_status' => 'publish', // Or 'draft', 'pending', etc.
            'post_type' => 'reservations',
        );

        // Insert the post into the database
        $postId = wp_insert_post($postData);

        // Add custom fields/meta data
        if ($postId) {
            update_post_meta($postId, 'reservations_full_name', $fullName);
            update_post_meta($postId, 'reservations_phone_number', $phoneNumber);
            update_post_meta($postId, 'reservations_email', $email);
            update_post_meta($postId, 'reservations_pickup_date', $pickupDate);
            update_post_meta($postId, 'reservations_pickup_time', $pickupTime);
            update_post_meta($postId, 'reservations_pickup_address', $pickupAddress);
            update_post_meta($postId, 'reservations_pickup_chamber_number', $pickupChamberNumber);
            update_post_meta($postId, 'reservations_passengers', $passengers);
            wp_send_json_success(['message' => 'Reservation created successfully.']);
        } else {
            wp_send_json_error(['message' => 'Failed to create Reservation.'], 500);
        }
    } else {
        wp_send_json_error(['message' => 'No form data received.'], 500);
    }
}

add_action('wp_ajax_handle_reservation_form_submission', 'handle_reservation_form_submission'); // For logged-in users
add_action('wp_ajax_nopriv_handle_reservation_form_submission', 'handle_reservation_form_submission'); // For non-logged-in users