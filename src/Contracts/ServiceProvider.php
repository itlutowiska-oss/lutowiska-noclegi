<?php
/**
 * Service provider contract.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Contracts;

use LutowiskaNoclegi\Support\ServiceContainer;

/**
 * Registers services in the plugin container.
 */
interface ServiceProvider
{
    /**
     * Register services in the container.
     *
     * @param ServiceContainer $container Plugin service container.
     */
    public function register(ServiceContainer $container): void;
}
