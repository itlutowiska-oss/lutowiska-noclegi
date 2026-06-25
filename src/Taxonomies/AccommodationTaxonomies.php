<?php
/**
 * Accommodation taxonomy registration.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Taxonomies;

use LutowiskaNoclegi\Contracts\Hookable;
use LutowiskaNoclegi\PostTypes\AccommodationPostType;

/**
 * Registers taxonomies used by accommodations.
 */
final class AccommodationTaxonomies implements Hookable
{
    public const TYPE = 'ln_accommodation_type';

    public const AMENITY = 'ln_amenity';

    public const LOCATION = 'ln_location';

    /**
     * Register WordPress hooks.
     */
    public function register(): void
    {
        add_action('init', [$this, 'register_taxonomies']);
    }

    /**
     * Register accommodation taxonomies.
     */
    public function register_taxonomies(): void
    {
        register_taxonomy(
            self::TYPE,
            [AccommodationPostType::NAME],
            [
                'labels' => $this->type_labels(),
                'public' => true,
                'hierarchical' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'rewrite' => [
                    'slug' => 'typ-noclegu',
                    'with_front' => false,
                ],
            ]
        );

        register_taxonomy(
            self::AMENITY,
            [AccommodationPostType::NAME],
            [
                'labels' => $this->amenity_labels(),
                'public' => true,
                'hierarchical' => false,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'rewrite' => [
                    'slug' => 'udogodnienia',
                    'with_front' => false,
                ],
            ]
        );

        register_taxonomy(
            self::LOCATION,
            [AccommodationPostType::NAME],
            [
                'labels' => $this->location_labels(),
                'public' => true,
                'hierarchical' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'rewrite' => [
                    'slug' => 'lokalizacja',
                    'with_front' => false,
                ],
            ]
        );
    }

    /**
     * Return type taxonomy labels.
     *
     * @return array<string, string>
     */
    private function type_labels(): array
    {
        return [
            'name' => esc_html__('Typy noclegow', 'lutowiska-noclegi'),
            'singular_name' => esc_html__('Typ noclegu', 'lutowiska-noclegi'),
            'menu_name' => esc_html__('Typy noclegow', 'lutowiska-noclegi'),
            'all_items' => esc_html__('Wszystkie typy', 'lutowiska-noclegi'),
            'edit_item' => esc_html__('Edytuj typ', 'lutowiska-noclegi'),
            'add_new_item' => esc_html__('Dodaj nowy typ', 'lutowiska-noclegi'),
        ];
    }

    /**
     * Return amenity taxonomy labels.
     *
     * @return array<string, string>
     */
    private function amenity_labels(): array
    {
        return [
            'name' => esc_html__('Udogodnienia', 'lutowiska-noclegi'),
            'singular_name' => esc_html__('Udogodnienie', 'lutowiska-noclegi'),
            'menu_name' => esc_html__('Udogodnienia', 'lutowiska-noclegi'),
            'all_items' => esc_html__('Wszystkie udogodnienia', 'lutowiska-noclegi'),
            'edit_item' => esc_html__('Edytuj udogodnienie', 'lutowiska-noclegi'),
            'add_new_item' => esc_html__('Dodaj nowe udogodnienie', 'lutowiska-noclegi'),
        ];
    }

    /**
     * Return location taxonomy labels.
     *
     * @return array<string, string>
     */
    private function location_labels(): array
    {
        return [
            'name' => esc_html__('Lokalizacje', 'lutowiska-noclegi'),
            'singular_name' => esc_html__('Lokalizacja', 'lutowiska-noclegi'),
            'menu_name' => esc_html__('Lokalizacje', 'lutowiska-noclegi'),
            'all_items' => esc_html__('Wszystkie lokalizacje', 'lutowiska-noclegi'),
            'edit_item' => esc_html__('Edytuj lokalizacje', 'lutowiska-noclegi'),
            'add_new_item' => esc_html__('Dodaj nowa lokalizacje', 'lutowiska-noclegi'),
        ];
    }
}
