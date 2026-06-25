<?php
/**
 * Service provider repository.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Support;

use LutowiskaNoclegi\Contracts\ServiceProvider;

/**
 * Loads service providers into the plugin container.
 */
final class ProviderRepository
{
    /**
     * @var array<class-string<ServiceProvider>>
     */
    private array $provider_classes;

    /**
     * @param array<class-string<ServiceProvider>> $provider_classes Provider class names.
     */
    public function __construct(array $provider_classes)
    {
        $this->provider_classes = $provider_classes;
    }

    /**
     * Register all configured providers.
     *
     * @param ServiceContainer $container Plugin service container.
     */
    public function register(ServiceContainer $container): void
    {
        foreach ($this->provider_classes as $provider_class) {
            $provider = new $provider_class();

            $provider->register($container);
        }
    }
}
