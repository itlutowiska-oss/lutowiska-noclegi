<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

use Lutowiska\Noclegi\Admin\Diagnostics;
use Lutowiska\Noclegi\Admin\Settings;
use Lutowiska\Noclegi\PostTypes\AccommodationPostType;
use Lutowiska\Noclegi\Taxonomies\LocationTaxonomy;
use Lutowiska\Noclegi\Taxonomies\ObjectTypeTaxonomy;

final class Plugin
{
    private static ?self $instance = null;

    private Loader $loader;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
        $this->loader = new Loader();
    }

    public function boot(): void
    {
        $this->loader
            ->add(new Assets())
            ->add(new Settings())
            ->add(new Diagnostics())
            ->add(new AccommodationPostType())
            ->add(new LocationTaxonomy())
            ->add(new ObjectTypeTaxonomy())
            ->boot();
    }
}
