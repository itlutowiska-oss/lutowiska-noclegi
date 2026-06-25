<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core\Contracts;

interface BootableInterface
{
    public function boot(): void;
}
