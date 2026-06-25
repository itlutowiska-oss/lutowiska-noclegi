<?php
/**
 * Hookable service contract.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Contracts;

/**
 * Represents a service that registers itself into WordPress hooks.
 */
interface Hookable
{
    /**
     * Register WordPress hooks used by the service.
     */
    public function register(): void;
}
