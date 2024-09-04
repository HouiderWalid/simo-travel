<?php

function excursion_type_type()
{

    $args = [
        'labels' => [
            'name' => 'Excursion Types',
            'singular_name' => 'Excursion Type',
        ],
        'public' => true,
        'hierarchical' => true,
    ];

    register_taxonomy('excursion_types', ['excursions'], $args);
}

add_action('init', 'excursion_type_type');