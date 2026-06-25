<?php
/**
 * Main plugin kernel.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi;

use LutowiskaNoclegi\Providers\CoreServiceProvider;
use LutowiskaNoclegi\Support\ProviderRepository;
use LutowiskaNoclegi\Support\ServiceContainer;

/**
 * Coordinates core plugin services.
 */
final class Plugin
{
    private static ?self $instance = null;

    private ServiceContainer $services;

    private bool $registered = false;

    /**
     * Create a plugin kernel.
     */
    private function __construct()
    {
        $this->services = new ServiceContainer();

        $providers = new ProviderRepository(
            [
                CoreServiceProvider::class,
            ]
        );

        $providers->register($this->services);
    }

    /**
     * Return the shared plugin instance.
     */
    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Register all plugin services once.
     */
    public function register(): void
    {
        if ($this->registered) {
            return;
        }

        foreach ($this->services->hookable_services() as $service) {
            $service->register();
        }

        $this->registered = true;
    }
}
