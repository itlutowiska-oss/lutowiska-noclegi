<?php
/**
 * Core service provider.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Providers;

use LutowiskaNoclegi\Contracts\ServiceProvider;
use LutowiskaNoclegi\PostTypes\AccommodationPostType;
use LutowiskaNoclegi\Support\ServiceContainer;
use LutowiskaNoclegi\Taxonomies\AccommodationTaxonomies;

/**
 * Registers core content model services.
 */
final class CoreServiceProvider implements ServiceProvider
{
    /**
     * Register core services in the container.
     *
     * @param ServiceContainer $container Plugin service container.
     */
    public function register(ServiceContainer $container): void
    {
        $container->add(AccommodationPostType::class);
        $container->add(AccommodationTaxonomies::class);
    }
}
