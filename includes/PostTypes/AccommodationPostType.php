<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\PostTypes;

defined('ABSPATH') || exit;

final class AccommodationPostType
{
    public const POST_TYPE = 'noclegi';

    public function boot(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        $labels = [
            'name'               => __('Noclegi', 'lutowiska-noclegi'),
            'singular_name'      => __('Nocleg', 'lutowiska-noclegi'),
            'menu_name'          => __('Noclegi', 'lutowiska-noclegi'),
            'add_new'            => __('Dodaj', 'lutowiska-noclegi'),
            'add_new_item'       => __('Dodaj nocleg', 'lutowiska-noclegi'),
            'edit_item'          => __('Edytuj nocleg', 'lutowiska-noclegi'),
            'new_item'           => __('Nowy nocleg', 'lutowiska-noclegi'),
            'view_item'          => __('Zobacz nocleg', 'lutowiska-noclegi'),
            'search_items'       => __('Szukaj noclegów', 'lutowiska-noclegi'),
            'not_found'          => __('Brak noclegów', 'lutowiska-noclegi'),
            'not_found_in_trash' => __('Brak w koszu', 'lutowiska-noclegi'),
        ];

        register_post_type(self::POST_TYPE, [

            'labels' => $labels,

            'public' => true,

            'show_ui' => true,

            'show_in_rest' => true,

            'menu_icon' => 'dashicons-admin-home',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt'
            ],

            'rewrite' => [
                'slug' => 'noclegi'
            ],

            'has_archive' => true,

            'menu_position' => 25
        ]);
    }
}
