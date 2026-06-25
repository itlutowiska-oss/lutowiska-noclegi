<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

defined('ABSPATH') || exit;

final class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(
            static function (string $class): void {

                if (! str_starts_with($class, 'Lutowiska\\Noclegi\\')) {
                    return;
                }

                $class = str_replace(
                    'Lutowiska\\Noclegi\\',
                    '',
                    $class
                );

                $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

                $file = LN_PATH . 'includes/' . $class . '.php';

                if (is_readable($file)) {
                    require_once $file;
                }
            }
        );
    }
}
