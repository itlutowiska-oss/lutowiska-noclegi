<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

use Lutowiska\Noclegi\PostTypes\AccommodationPostType;
use Lutowiska\Noclegi\Taxonomies\LocationTaxonomy;
use Lutowiska\Noclegi\Taxonomies\ObjectTypeTaxonomy;

defined('ABSPATH') || exit;

final class Loader
{
    public function boot(): void
    {
        (new Assets())->boot();

        (new AccommodationPostType())->boot();

        (new LocationTaxonomy())->boot();

        (new ObjectTypeTaxonomy())->boot();
    }
}
