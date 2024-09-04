<?php


function reservations_type()
{

    $args = [
        'labels' => [
            'name' => 'Reservations',
            'singular_name' => 'Reservation',
            'add_new' => 'Add new Reservation'
        ],
        'hierarchical' => true,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-pressthis',
        'has_archive' => true,
        'supports' => [
            'title',
            //'editor',
            //'custom-fields'
        ],
    ];

    register_post_type('reservations', $args);
}

add_action('init', 'reservations_type');

function add_reservations_meta_boxes()
{
    add_meta_box(
        'reservations_details',       // ID
        'Reservation Details',       // Title
        'display_reservations_meta_box', // Callback
        'reservations',               // Post Type
        'normal',                // Context
        'high'                   // Priority
    );
}

add_action('add_meta_boxes', 'add_reservations_meta_boxes');

function display_reservations_meta_box($post)
{
    $fullName = get_post_meta($post->ID, 'reservations_full_name', true);
    $email = get_post_meta($post->ID, 'reservations_email', true);
    $phoneNumber = get_post_meta($post->ID, 'reservations_phone_number', true);
    $pickupDate = get_post_meta($post->ID, 'reservations_pickup_date', true);
    $pickupTime = get_post_meta($post->ID, 'reservations_pickup_time', true);
    $address = get_post_meta($post->ID, 'reservations_pickup_address', true);
    $chamberNumber = get_post_meta($post->ID, 'reservations_pickup_chamber_number', true);
    $passengers = get_post_meta($post->ID, 'reservations_passengers', true);
    ?>
    <table>
        <tr>
            <td>
                <label for="reservations_full_name">Full Name:</label>
            </td>
            <td>
                <input type="text" name="reservations_full_name" value="<?php echo $fullName; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_email">Email:</label>
            </td>
            <td>
                <input type="email" name="reservations_email" value="<?php echo $email; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_phone_number">Phone Number:</label>
            </td>
            <td>
                <input type="tel" name="reservations_phone_number" value="<?php echo $phoneNumber; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_pickup_date">Pickup Date:</label>
            </td>
            <td>
                <input type="date" name="reservations_pickup_date" value="<?php echo $pickupDate; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_pickup_time">Pickup Time:</label>
            </td>
            <td>
                <input type="time" name="reservations_pickup_time" value="<?php echo $pickupTime; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_pickup_address">Pickup Address:</label>
            </td>
            <td>
                <input type="text" name="reservations_pickup_address" value="<?php echo $address; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_pickup_chamber_number">Pickup Chamber Number:</label>
            </td>
            <td>
                <input type="text" name="reservations_pickup_chamber_number" value="<?php echo $chamberNumber; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservations_passengers">Passengers:</label>
            </td>
            <td>
                <input type="number" name="reservations_passengers" value="<?php echo $passengers; ?>"/>
            </td>
        </tr>
    </table>

    <?php
}

function save_reservations_meta($postId)
{
    if (isset($_POST['reservations_full_name'])) {
        update_post_meta($postId, 'reservations_full_name', sanitize_text_field($_POST['reservations_full_name']));
    }
    if (isset($_POST['reservations_pickup_date'])) {
        update_post_meta($postId, 'reservations_pickup_date', sanitize_text_field($_POST['reservations_pickup_date']));
    }
    if (isset($_POST['reservations_email'])) {
        update_post_meta($postId, 'reservations_email', sanitize_text_field($_POST['reservations_email']));
    }
    if (isset($_POST['reservations_phone_number'])) {
        update_post_meta($postId, 'reservations_phone_number', sanitize_text_field($_POST['reservations_phone_number']));
    }
    if (isset($_POST['reservations_address'])) {
        update_post_meta($postId, 'reservations_pickup_address', sanitize_text_field($_POST['reservations_pickup_address']));
    }
    if (isset($_POST['reservations_chamber_number'])) {
        update_post_meta($postId, 'reservations_pickup_chamber_number', sanitize_text_field($_POST['reservations_pickup_chamber_number']));
    }
    if (isset($_POST['reservations_pickup_time'])) {
        update_post_meta($postId, 'reservations_pickup_time', sanitize_text_field($_POST['reservations_pickup_time']));
    }
    if (isset($_POST['reservations_price'])) {
        update_post_meta($postId, 'reservations_passengers', sanitize_text_field($_POST['reservations_passengers']));
    }
}

add_action('save_post', 'save_reservations_meta');

function add_reservations_columns($columns)
{
    $columns['reservations_full_name'] = 'Full Name';
    $columns['reservations_email'] = 'Email';
/*    $columns['reservations_phone_number'] = 'Phone Number';
    $columns['reservations_pickup_date'] = 'Pickup Date';
    $columns['reservations_pickup_time'] = 'Pickup Time';
    $columns['reservations_address'] = 'Address';
    $columns['reservations_chamber_number'] = 'Chamber Number';
    $columns['reservations_passengers'] = 'Passengers';*/
    return $columns;
}

add_filter('manage_reservations_posts_columns', 'add_reservations_columns');

function fill_reservations_columns($column, $postId)
{
    switch ($column) {
        case 'reservations_full_name':
            $fullName = get_post_meta($postId, 'reservations_full_name', true);
            echo esc_html($fullName);
            break;
        case 'reservations_email':
            $date = get_post_meta($postId, 'reservations_email', true);
            echo esc_html($date);
            break;
    }
}

add_action('manage_reservations_posts_custom_column', 'fill_reservations_columns', 10, 2);

// Make custom columns sortable
function reservations_sortable_columns($columns)
{
    $columns['reservations_email'] = 'reservations_email';
    $columns['reservations_full_name'] = 'reservations_full_name';
    return $columns;
}

add_filter('manage_edit-reservations_sortable_columns', 'reservations_sortable_columns');

// Set custom column sorting behavior
function reservations_column_orderby($vars)
{
    if (isset($vars['orderby']) && 'reservations_email' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => 'reservations_email',
            'orderby' => 'meta_value'
        ));
    }
    if (isset($vars['orderby']) && 'reservations_full_name' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => 'reservations_full_name',
            'orderby' => 'meta_value_num'
        ));
    }
    return $vars;
}

add_filter('request', 'reservations_column_orderby');