<?php
/**
 * Service container.
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

namespace LutowiskaNoclegi\Support;

use InvalidArgumentException;
use LutowiskaNoclegi\Contracts\Hookable;

/**
 * Creates and exposes plugin services.
 */
final class ServiceContainer
{
    /**
     * @var array<class-string>
     */
    private array $service_classes = [];

    /**
     * @var array<class-string, object>
     */
    private array $instances = [];

    /**
     * @param array<class-string> $service_classes Service class names.
     */
    public function __construct(array $service_classes = [])
    {
        foreach ($service_classes as $service_class) {
            $this->add($service_class);
        }
    }

    /**
     * Register a service class.
     *
     * @param class-string $service_class Service class name.
     */
    public function add(string $service_class): void
    {
        if (! class_exists($service_class)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Service class "%s" does not exist.',
                    $service_class
                )
            );
        }

        if (! in_array($service_class, $this->service_classes, true)) {
            $this->service_classes[] = $service_class;
        }
    }

    /**
     * Return all services implementing the Hookable contract.
     *
     * @return Hookable[]
     */
    public function hookable_services(): array
    {
        return array_values(
            array_filter(
                $this->services(),
                static fn (object $service): bool => $service instanceof Hookable
            )
        );
    }

    /**
     * Instantiate configured services.
     *
     * @return array<class-string, object>
     */
    private function services(): array
    {
        foreach ($this->service_classes as $service_class) {
            if (! isset($this->instances[$service_class])) {
                $this->instances[$service_class] = new $service_class();
            }
        }

        return $this->instances;
    }
}
