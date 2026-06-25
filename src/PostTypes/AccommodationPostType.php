<?php
/**
 * Accommodation post type registration.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\PostTypes;

use LutowiskaNoclegi\Contracts\Hookable;

/**
 * Registers the public accommodation custom post type.
 */
final class AccommodationPostType implements Hookable
{
    public const NAME = 'ln_accommodation';

    /**
     * Register WordPress hooks.
     */
    public function register(): void
    {
        add_action('init', [$this, 'register_post_type']);
    }

    /**
     * Register the accommodation custom post type.
     */
    public function register_post_type(): void
    {
        register_post_type(
            self::NAME,
            [
                'labels' => $this->labels(),
                'public' => true,
                'show_in_rest' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-home',
                'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
                'has_archive' => true,
                'rewrite' => [
                    'slug' => 'noclegi',
                    'with_front' => false,
                ],
                'capability_type' => 'post',
                'map_meta_cap' => true,
            ]
        );
    }

    /**
     * Return post type labels.
     *
     * @return array<string, string>
     */
    private function labels(): array
    {
        return [
            'name' => esc_html__('Noclegi', 'lutowiska-noclegi'),
            'singular_name' => esc_html__('Nocleg', 'lutowiska-noclegi'),
            'menu_name' => esc_html__('Noclegi', 'lutowiska-noclegi'),
            'name_admin_bar' => esc_html__('Nocleg', 'lutowiska-noclegi'),
            'add_new' => esc_html__('Dodaj nowy', 'lutowiska-noclegi'),
            'add_new_item' => esc_html__('Dodaj nowy nocleg', 'lutowiska-noclegi'),
            'edit_item' => esc_html__('Edytuj nocleg', 'lutowiska-noclegi'),
            'new_item' => esc_html__('Nowy nocleg', 'lutowiska-noclegi'),
            'view_item' => esc_html__('Zobacz nocleg', 'lutowiska-noclegi'),
            'search_items' => esc_html__('Szukaj noclegow', 'lutowiska-noclegi'),
            'not_found' => esc_html__('Nie znaleziono noclegow', 'lutowiska-noclegi'),
            'not_found_in_trash' => esc_html__('Nie znaleziono noclegow w koszu', 'lutowiska-noclegi'),
            'all_items' => esc_html__('Wszystkie noclegi', 'lutowiska-noclegi'),
            'archives' => esc_html__('Archiwum noclegow', 'lutowiska-noclegi'),
        ];
    }
}
