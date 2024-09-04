<?php

function excursion_type()
{

    $args = [
        'labels' => [
            'name' => 'Excursions',
            'singular_name' => 'Excursion',
            'add_new' => 'Add new Excursion'
        ],
        'hierarchical' => true,
        'public' => true,
        'menu_icon' => 'dashicons-palmtree',
        'has_archive' => true,
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            //'custom-fields'
        ],
    ];
    register_post_type('excursions', $args);
}

add_action('init', 'excursion_type');

function add_excursions_meta_boxes()
{
    add_meta_box(
        'excursion_details',
        'Excursion Details',
        'display_excursions_meta_box',
        'excursions',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'add_excursions_meta_boxes');

function display_excursions_meta_box($post)
{
    $availability = get_post_meta($post->ID, 'excursion_availability', true);
    $foodInclusion = get_post_meta($post->ID, 'excursion_food_inclusion', true);
    $startAt = get_post_meta($post->ID, 'excursion_start_at', true);
    $price = get_post_meta($post->ID, 'excursion_price', true);
    $ticket = get_post_meta($post->ID, 'excursion_ticket', true);
    ?>
    <table>
        <tr>
            <td>
                <label for="excursion_availability">Availability:</label>
            </td>
            <td>
                <input id="excursion_availability" type="text" name="excursion_availability"
                       value="<?php echo $availability; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="excursion_food_inclusion">Food inclusion:</label>
            </td>
            <td>
                <input id="excursion_food_inclusion" type="text" name="excursion_food_inclusion"
                       value="<?php echo $foodInclusion; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="excursion_start_at">Start At:</label>
            </td>
            <td>
                <input id="excursion_start_at" type="text" name="excursion_start_at" value="<?php echo $startAt; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="excursion_price">Price:</label>
            </td>
            <td>
                <input id="excursion_price" type="text" name="excursion_price" value="<?php echo $price; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="excursion_ticket">Ticket:</label>
            </td>
            <td>
                <input id="excursion_ticket" type="text" name="excursion_ticket" value="<?php echo $ticket; ?>"/>
            </td>
        </tr>
    </table>

    <?php
}

function save_excursion_meta($postId)
{
    if (isset($_POST['excursion_availability'])) {
        update_post_meta($postId, 'excursion_availability', sanitize_text_field($_POST['excursion_availability']));
    }
    if (isset($_POST['excursion_food_inclusion'])) {
        update_post_meta($postId, 'excursion_food_inclusion', sanitize_text_field($_POST['excursion_food_inclusion']));
    }
    if (isset($_POST['excursion_start_at'])) {
        update_post_meta($postId, 'excursion_start_at', sanitize_text_field($_POST['excursion_start_at']));
    }
    if (isset($_POST['excursion_price'])) {
        update_post_meta($postId, 'excursion_price', sanitize_text_field($_POST['excursion_price']));
    }
    if (isset($_POST['excursion_ticket'])) {
        update_post_meta($postId, 'excursion_ticket', sanitize_text_field($_POST['excursion_ticket']));
    }
}

add_action('save_post', 'save_excursion_meta');

function add_excursion_columns($columns)
{
    $columns['excursion_price'] = 'Price';
    $columns['excursion_start_at'] = 'Start At';
    $columns['excursion_availability'] = 'Availability';
    return $columns;
}

add_filter('manage_excursions_posts_columns', 'add_excursion_columns');

function fill_excursion_columns($column, $postId)
{
    switch ($column) {
        case 'excursion_price':
            $price = get_post_meta($postId, 'excursion_price', true);
            echo esc_html($price);
            break;
        case 'excursion_start_at':
            $startAt = get_post_meta($postId, 'excursion_start_at', true);
            echo esc_html($startAt);
            break;
        case 'excursion_availability':
            $availability = get_post_meta($postId, 'excursion_availability', true);
            echo esc_html($availability);
            break;
    }
}

add_action('manage_excursions_posts_custom_column', 'fill_excursion_columns', 10, 2);