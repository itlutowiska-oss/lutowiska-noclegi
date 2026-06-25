<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Taxonomies;

use Lutowiska\Noclegi\PostTypes\AccommodationPostType;

defined('ABSPATH') || exit;

final class LocationTaxonomy
{
    public const TAXONOMY = 'miejscowosc';

    public function boot(): void
    {
        add_action('init', [$this, 'register']);
    }

    public function register(): void
    {
        register_taxonomy(

            self::TAXONOMY,

            AccommodationPostType::POST_TYPE,

            [

                'label' => __('Miejscowość', 'lutowiska-noclegi'),

                'hierarchical' => true,

                'show_admin_column' => true,

                'show_in_rest' => true,

                'rewrite' => [
                    'slug' => 'miejscowosc'
                ]

            ]

        );
    }
}
