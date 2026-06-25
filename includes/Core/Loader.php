<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

use Lutowiska\Noclegi\Core\Contracts\BootableInterface;

final class Loader
{
    /**
     * @var BootableInterface[]
     */
    private array $services = [];

    public function add(BootableInterface $service): self
    {
        $this->services[] = $service;

        return $this;
    }

    public function boot(): void
    {
        foreach ($this->services as $service) {
            $service->boot();
        }
    }
}
